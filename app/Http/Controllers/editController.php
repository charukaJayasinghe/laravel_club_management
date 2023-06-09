<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class editController extends Controller
{
    public function index(Request $request)
    {

        $type  = $request->get('type');
        if ($type == "class") {
            return editController::class();
        } else if($type == "grade"){
            return editController::grade();
        }
    }

    function class()
    {
        return view("admin.editClass");
    }

    function grade(){
        return view("admin.editGrade");
    }
}
