<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class signinController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $res = "";
        $email = $request->input("email");
        $password = $request->input("password");
        if (empty(trim($email))) {
            $res = "Please Enter Your Email";
        } else if (empty(trim($password))) {
            $res = "Please Enter Your Password";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $res = "Please Enter a valid email";
        } else {
            $results = admin::where('email', '=', $email)
                ->where('password', '=', $password)
                ->count();
            if ($results != 1) {
                $res = "Incorrect Login Detais";
            } else {
                $result  = admin::where('email', '=', $email)->where('password', '=', $password)->first();


                $request->session()->put('admin', $result);
                $res = "Success";
            }
        }


        return response($res);
    }
}
