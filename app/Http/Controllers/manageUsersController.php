<?php

namespace App\Http\Controllers;

use App\Models\class_room;
use App\Models\grade;
use App\Models\nalanda_user;
use Illuminate\Http\Request;

class manageUsersController extends Controller
{
    public function index(){
         $data = nalanda_user::all();
         $grade = grade::all();
         $class = class_room::select('name')->distinct()->get();
         return view("admin.manageUsers",["data" => $data,"grade"=>$grade,"class"=>$class]);
    }
}
