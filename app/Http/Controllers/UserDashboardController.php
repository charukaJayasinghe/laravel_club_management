<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function viewHome(){
           return view('user.dashboard');
    }
}
