<?php

namespace App\Http\Controllers;

use App\Models\class_room;
use App\Models\grade;
use App\Models\nalanda_user;
use App\Models\user_approvement;
use App\Models\user_status;
use Illuminate\Http\Request;
use stdClass;

class manageUsersController extends Controller
{
    public function index()
    {
        $data = nalanda_user::all();
        $grade = grade::all();
        $class = class_room::select('name')->distinct()->get();
        return view("admin.manageUsers", ["data" => $data, "grade" => $grade, "class" => $class]);
    }

    public function statusChange(Request $request)
    {
        $userId = $request->input("id");
        $user = nalanda_user::find($userId);
        $currentStatus = $user->user_status->name;
        if ($currentStatus == "Blocked") {
            $record =  user_status::where('name', '=', "Active")->first();
            $newStatus = $record->id;
            $user->user_status_id = $newStatus;
            $user->save();
            return "unblocked";
        } else if ($currentStatus == "Active") {
            $record =  user_status::where('name', '=', "Blocked")->first();
            $newStatus = $record->id;
            $user->user_status_id = $newStatus;
            $user->save();
            return "blocked";
        }
    }

    public function viewUser(Request $request)
    {
        $user = nalanda_user::find($request->input("id"));
        $json = new stdClass();
        if($user->profileImg != null){
            $json->image = asset('storage/'.$user->profileImg) ;
        }else{
            $json->image = asset('images/emptyUser.jpg');
        }

        $json->fullName = $user->full_name;
        $json->addno = $user->addno;
        $json->mobile = $user->mobile;
        $json->class = $user->class_room->name;
        $json->grade = $user->class_room->grade->name;
        $json->address = $user->address;
        $json->email = $user->email;
        return json_encode($json);
    }

    public function searchUser(Request $request)
    {
        $users = "";
        $word = $request->input("word");
        $class = $request->input("class");
        $grade = $request->input("grade");
        if ($request->input("grade") != "0" && $request->input("class") != "0") {
            $users = nalanda_user::whereHas('class_room.grade', function ($query) use ($request) {
                $query->where('name', '=', $request->input("grade"));
            })->whereHas('class_room', function ($query) use ($request) {
                $query->where('name', '=', $request->input("class"));
            })->where(function ($query) use ($word) {
                    $query->where('full_name', 'like', '%' . $word . '%')
                        ->orWhere('addno', 'like', '%' . $word . '%')
                        ->orWhere('email', 'like', '%' . $word . '%')
                        ->orWhere('mobile', 'like', '%' . $word . '%');
            })
                ->get();
        } else if ($request->input("grade") != "0" && $request->input("class") == "0") {

            $users = nalanda_user::whereHas('class_room.grade', function ($query) use ($request) {
                $query->where('name', '=', $request->input("grade"));
            })
                ->where(function ($query) use ($word) {
                    $query->where('full_name', 'like', '%' . $word . '%')
                        ->orWhere('addno', 'like', '%' . $word . '%')
                        ->orWhere('email', 'like', '%' . $word . '%')
                        ->orWhere('mobile', 'like', '%' . $word . '%');
                })
                ->get();
        } else if ($request->input("grade") == "0" && $request->input("class") != "0") {

            $users = nalanda_user::whereHas('class_room', function ($query) use ($request) {
                $query->where('name', '=', $request->input("class"));
            })
                ->where(function ($query) use ($word) {
                    $query->where('full_name', 'like', '%' . $word . '%')
                        ->orWhere('addno', 'like', '%' . $word . '%')
                        ->orWhere('email', 'like', '%' . $word . '%')
                        ->orWhere('mobile', 'like', '%' . $word . '%');
                })
                ->get();
        } else if ($request->input("grade") == "0" && $request->input("class") == "0") {

            $users = nalanda_user::where('full_name', 'like', '%' . $word . '%')->orWhere('addno', 'like', '%' . $word . '%')->orWhere('email', 'like', '%' . $word . '%')->orWhere('mobile', 'like', '%' . $word . '%')->get();
        }

        $data = $users;
        return view("admin.viewUser", ["data" => $data]);
    }

    public function approveUser(){
        $data = nalanda_user::where("user_approvement_id","=","1")->get();
        return view("admin.approveUsers",["data"=>$data]);
    }

    public function approveUserProcess(Request $request){
        $userId = $request->input("id");
        $user = nalanda_user::find($userId);
        $currentApprove = $user->user_approvement->name;
        if ($currentApprove == "Disaproved") {
            $record =  user_approvement::where('name', '=', "Approved")->first();
            $newApprove = $record->id;
            $user->user_approvement_id = $newApprove;
            $user->save();
            return "Approved";
        }
    }
}
