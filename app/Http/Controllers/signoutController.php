<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class signoutController extends Controller
{
    public function signout(Request $request){
        $res = "";
        $request->session()->flush();
        $res = "Success";
        return response($res);
    }
}
