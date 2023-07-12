<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function viewHome(Request $request){
           $full_name = $request->session()->get('user')["full_name"];
           $name = explode(" ",$full_name)[0];
           $post = post::all();
           return view('user.dashboard',['data'=>$name,'post'=>$post]);
    }
}
