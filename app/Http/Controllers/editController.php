<?php

namespace App\Http\Controllers;

use App\Models\class_room;
use App\Models\grade;
use Hamcrest\Type\IsInteger;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class editController extends Controller
{
    public function index(Request $request)
    {

        $type  = $request->get('type');
        if ($type == "class") {

            return editController::class();
        }
    }

    public function saveClass(Request $request)
    {
        $res = "";
        $name = $request->input('name') ;
        $grade = $request->input('grade');
        if (empty(trim($name))) {
            $res = "Please Enter a Class";
        } else if ($grade == "0") {
            $res = "Please Select a Grade";
        } else if (empty(trim($grade))) {
            $res = "Please Select a Grade";
        } else if (!preg_match('/^\d+$/', trim($grade))) {
            $res = "Please Select a valid Grade";
        }else if(!preg_match('/^[A-Za-z\s]+$/', trim($name))){
            $res = "Please Enter a valid Classsss";
        }else {
            $result = grade::find($grade);
            if ($result) {

                $exist = class_room::where('name', '=', $name)
                    ->where('grade_id', '=', $grade)
                    ->count();
                if ($exist != 0) {
                    $res = "A Record Like this Already Exists";
                } else {
                    $class = new class_room;
                    $class->name = $name;
                    $class->grade_id = $grade;
                    $class->admin_id = "1";
                    $class->save();
                    $res = "Success";
                }
            } else {
                $res = "Please Select a Valid Grade";
            }
        }
        return $res;
    }

    public function removeClass(Request $request)
    {
        $res = "";
        $id = $request->input('id');
        if($id == "0"){
          $res = "Please Select a Class to Delete";
        }else{
            if (preg_match('/^\d+$/', $id)) {
                $result = class_room::find($id);
                if ($result) {
                    $result->delete();
                    echo "Success";
                } else {
                    $res = "Please Select a Valid Class";
                }
            } else {
                $res = "Please Select a Valid Class";
            }
        }
        return response($res);
    }

    public function viewClass()
    {

        $data = class_room::with('grade', 'admin')->get();
        return view("admin.viewClass", ["data" => $data]);

    }

    function class()
    {
        //    $data = class_room::join('grades','class_rooms.grade_id','=','grades.id')->select('class_rooms.id AS id','class_rooms.name AS className','grades.name AS gradeName');
        $data = class_room::with('grade', 'admin')->get();
        $grade = grade::all();
        return view("admin.editClass", ["data" => $data, "grade" => $grade]);
    }


}
