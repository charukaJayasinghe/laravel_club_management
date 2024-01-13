<?php

namespace App\Http\Controllers;

use App\Models\board_member;
use App\Models\board_position;
use Illuminate\Http\Request;
use stdClass;

class AdminBoardController extends Controller
{
    public function viewManageBoard()
    {
        $members = board_member::join('board_positions','board_members.board_position_id',"=","board_positions.id")->select("board_members.name as Bname","board_positions.name as Pname","board_members.image as Bimage","board_positions.index as index","board_members.mobile as mobile","board_members.email as email","board_members.id as Bid")->orderBy('board_positions.index','asc')->get();
        $positions = board_position::select("*")->orderBy("index")->get();
        return view('admin.manageBoard',["members"=>$members,"positions"=>$positions]);
    }

    public function viewManagePosition()
    {
        $data = board_position::select("*")->orderBy('index', 'asc')->get();
        return view('admin.managePosition', ["data" => $data]);
    }
    public function addPosition(Request $request)
    {
        $name = $request->input("name");
        $res = "";
        $index = $request->input("index");
        if (empty($index)) {
            $res = "Please Enter Position Index";
        } else if (!preg_match('/^(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/', $index)) {
            $res = "Please Select a Valid Index for position";
        } else if (empty($name)) {
            $res = "Please Enter Position Name";
        } else {
            $indexCount = board_position::where('index', "=", $index)->get()->count();
            $nameCount = board_position::where("name", "=", $name)->get()->count();
            if ($nameCount != 0) {
                $res = "The Board Position Already Exists";
            } else if ($indexCount != 0) {
                $res = "Position Index Already Exists";
            } else {
                $position = new board_position;
                $position->name = $name;
                $position->index = $index;
                $position->admin_id = $request->session()->get('admin')['id'];
                $position->save();
                $res = "Success";
            }
        }
        return $res;
    }

    public function removePosition(Request $request)
    {
        $res = "";
        $id = $request->input('id');
        if ($id == "0") {
            $res = "Please Select a Position to Delete";
        } else {
            if (preg_match('/^\d+$/', $id)) {
                $result = board_position::find($id);

                if ($result) {
                    $memberCount = board_member::where("board_position_id","=",$result->id)->get()->count();
                    if($memberCount != 0){
                       $res = "Board Member(s) are assigned to this position. Please Remove them to Delete the position";
                    }else{
                        $result->delete();
                        echo "Success";
                    }

                } else {
                    $res = "Please Select a Valid Position";
                }
            } else {
                $res = "Please Select a Valid Position";
            }
        }
        return response($res);
    }

    public function viewAddBoardMember()
    {
        $positions = board_position::select("*")->orderBy('index', 'asc')->get();
        return view('admin.addMember', ["positions" => $positions]);
    }

    public function addBoardMemberProcess(Request $request)
    {
        $res = "";
        $name = $request->input("name");
        $email = $request->input("email");
        $mobile = $request->input("mobile");
        $isset = $request->input("isset");
        $position = $request->input("position");

        if (empty(trim($name))) {
            $res =  "Please Enter Member Name";
        } else if (empty(trim($email))) {
            $res =  "Please Enter Member EMail";
        } else if (empty(trim($mobile))) {
            $res =  "Please Enter Member Mobile";
        } else if ($isset != 1) {
            $res =  "Please Select a Profile Picture";
        } else if ($position == 0) {
            $res = "Please Select a Board Member Position";
        } else {
            $nameCount = board_member::where("name", "=", $name)->where("delete", "=", "0")->get()->count();
            $positionCount = board_position::where("id", "=", $position)->get()->count();
            if ($positionCount == 0) {
                $res = "There was a System Error Please try again or call system administrator";
            } else if ($nameCount != 0) {
                $res = "This Member already has a position assigned.";
            } else {

                if (!$request->hasFile('i')) {
                    $res = "There Was an Error Please Try again";
                } else {
                    $file = $request->file('i');
                    if (!$file->isValid()) {
                        $res = "There Was an Error Please Try again";
                    } else {
                        $extension = $file->getClientOriginalExtension();
                        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            $res = "Please Select a valid Image";
                        } else {
                            $path = $file->store('boardImg', 'public');
                            $board_member = new board_member;
                            $board_member->image = $path;
                            $board_member->name = $name;
                            $board_member->email = $email;
                            $board_member->mobile = $mobile;
                            $board_member->board_position_id = $position;
                            $board_member->admin_id = $request->session()->get('admin')['id'];
                            $board_member->save();
                            $res = "Success";
                        }
                    }
                }
            }
        }
        return $res;
    }

    public function getMemberDetails(Request $request){
      $res = "";
      $id = $request->input("id");
      $MemberCount = board_member::where("id","=",$id)->where("delete","=","0")->get()->count();
      if($MemberCount == 1){
        $Member = board_member::find($id);
        $json = new stdClass();
        $json->image = asset('storage/'.$Member->image) ;
        $json->name = $Member->name;
        $json->email = $Member->email;
        $json->mobile = $Member->mobile;
        $json->id = $Member->id;
        $json->position = $Member->board_position_id;

        return json_encode($json);
      }else{
         $res ="Error";
      }

      return $res;
    }

    public function updateMemberDetails(Request $request){
        $res ="";
        $id =  $request->input("id");
        $email =  $request->input("email");
        $mobile =  $request->input("mobile");
        $position =  $request->input("position");
        $name =  $request->input("name");
        $isset =  $request->input("isset");

        if (empty(trim($name))) {
            $res =  "Please Enter Member Name";
        } else if (empty(trim($email))) {
            $res =  "Please Enter Member EMail";
        } else if (empty(trim($mobile))) {
            $res =  "Please Enter Member Mobile";
        }  else if ($position == 0) {
            $res = "Please Select a Board Member Position";
        } else {
            $MemberCount = board_member::where("id","=",$id)->where("delete","=","0")->get()->count();
            $positionCount = board_position::where("id","=",$position)->get()->count();
            if($MemberCount != 1 && $positionCount != 1){
               $res ="There Was an Error Please Try Again";
            }else{

                if($isset == 1){
                    if (!$request->hasFile('i')) {
                        $res = "There Was an Error Please Try again";
                    }else{
                        $file = $request->file('i');
                        if (!$file->isValid()) {
                            $res = "There Was an Error Please Try again";
                        }else{
                            $extension = $file->getClientOriginalExtension();
                            if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                $res = "Please Select a valid Image";
                            }else{
                                $path = $file->store('boardImg', 'public');
                                $member = board_member::find($id);
                                $member->name = $name;
                                $member->board_position_id =$position;
                                $member->mobile = $mobile;
                                $member->email =$email;
                                $member->image = $path;
                                $member->save();
                                $res = "Success";
                            }
                        }
                    }

                }else{
                    $member = board_member::find($id);
                    $member->name = $name;
                    $member->board_position_id =$position;
                    $member->mobile = $mobile;
                    $member->email =$email;
                    $member->save();
                    $res = "Success";
                }


            }
        }
        return $res;
    }

    public function deleteMember(Request $request){
        $res ="";
        $id =  $request->input("id");
        $memberCount = board_member::where("id","=",$id)->where("delete","=","0")->get()->count();
        if($memberCount != 1){
            $res ="There was an Errpr Please Try again";
        }else{
            $member = board_member::find($id);
            $member->delete();
            $res = "Success";
        }
        return $res;
    }

    public function updatePosition(Request $request){
     $res ="";
     $id = $request->input("id");
     $position  = board_position::find($id);
     if(!$position){
         $res ="Error";
     }else{
        $obj = new stdClass();
        $obj->id = $position->id;
        $obj->index = $position->index;
        $obj->name =$position->name;
        $res = json_encode($obj);
     }
     return $res;
    }

    public function updatePositionProcess(Request $request){
        $res ="";
        $id = $request->input("id");
        $name = $request->input("name");
        $index = $request->input("index");

        if (empty($index)) {
            $res = "Please Enter Position Index";
        } else if (!preg_match('/^(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/', $index)) {
            $res = "Please Select a Valid Index for position";
        } else if (empty($name)) {
            $res = "Please Enter Position Name";
        }else{
           $position = board_position::find($id);
           if($position){

             $indexCount = board_position::where("index","=",$index)->get()->count();
             if($indexCount != 0 && $position->index != $index){
                 $res = "This Index is already in use. Please Enter another index";
             }else{
                $nameCount = board_position::where("name","=",$name)->get()->count();
                if($nameCount != 0 && $position->name != $name ){
                    $res = "This Position Name is already in use. Please Enter another Position Name or remove the exiting One.";
                }else{
                     $position->index = $index;
                     $position->name = $name;
                     $position->admin_id = $request->session()->get('admin')['id'];
                     $position->save();
                     $res ="Success";
                }
             }
           }else{
             $res ="Error";
           }

        }


        return $res;
    }

}
