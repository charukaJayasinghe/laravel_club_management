<?php

namespace App\Http\Controllers;

use App\Models\nalanda_user;
use App\Models\post;
use Illuminate\Http\Request;

class loginController extends Controller
{
   public function login(){
    $userCount = nalanda_user::all()->count();
    $postCount = post::all()->count();
    return view("admin.dashboard",["userCount"=>$userCount,'postCount'=>$postCount]);
   }



}
