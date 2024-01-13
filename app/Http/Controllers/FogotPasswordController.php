<?php

namespace App\Http\Controllers;

use App\Mail\verficationCodeMailer;
use App\Models\nalanda_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FogotPasswordController extends Controller
{
    public function index()
    {
        return view('user.fogotPassword');
    }

    public function sendEmail(Request $request)
    {
        $res = "";
        $email = $request->input("email");

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $res = "Please Enter a valid Email";
        } else {
            $result = nalanda_user::where("email", "=", $email)->get()->count();
            if ($result != 1) {
                $res = "Your Email does not exist";
            } else {
                $code =  strval(mt_rand(100000, 999999));
                $data = [
                    'subject' => 'Password Reset Verification Code',
                    'code' => $code,
                ];
                // $check = Mail::to($email)->send(new verficationCodeMailer($data));
                $check = true;
                Log::info('code is : ' . $code);


                if ($check) {
                    $nc_user = nalanda_user::where("email", "=", $email)->get()->first();
                    $nc_user->code =  md5($code);
                    $nc_user->save();
                    $res = "Success";
                } else {
                    $res = "Failed";
                }
            }
        }
        return $res;
    }

    public function verify()
    {
        return view("user.userVerify");
    }

    public function viewUpdatePassword(Request $request)
    {
        if ($request->hasSession()) {

            if ($request->session()->has('resetPassword')) {
                //  $code = $request->session()->get('resetPassword');
                return view("user.updatePassword");
            } else {

                return redirect()->route('Userlogin');
            }
        } else {

            return redirect()->route('Userlogin');
        }
    }

    public function verifyProcess(Request $request)
    {
        $res = "";
        $code = $request->input("code");
        if (strlen($code) != 6) {
            $res = "Please Enter All Digits";
        } else {
            $result = nalanda_user::where("code", "=", md5($code))->get()->count();
            if ($result != 1) {
                $res = "Invalid Code";
            } else {
                $request->session()->put('resetPassword', ['code'=>$code,'time'=>time()]);
                $res = "Success";
            }
        }
        return $res;
    }

    public function updatePasswordProcess(Request $request)
    {

        $res = "";

        if ($request->hasSession()) {

            if ($request->session()->has('resetPassword')) {
                $pass1 = $request->input('pass1');
                $pass2 = $request->input('pass2');
                if (empty($pass1)) {
                    $res = "Please Enter Your new password";
                } else if (strlen($pass1) < 8) {
                    $res = "Password Should be More Than 7 Characters";
                } else if (empty($pass2)) {
                    $res = "Please Re Enter Your new Password";
                } else if ($pass1 != $pass2) {
                    $res = "Passwords Does Not Match";
                } else {
                     $data = $request->session()->get('resetPassword');

                     if( $data["time"]+(60*60) < time() ){
                        $res = "expired";
                     }else{
                         $code = $data["code"];
                         $nc_user = nalanda_user::where("code","=",md5($code))->get()->first();
                         $nc_user->password = md5($pass1);
                         $nc_user->code = "";
                         $nc_user->save();
                         $request->session()->forget('resetPassword');
                         $res ="Success";
                     }
                }

            } else {

                return redirect()->route('Userlogin');
            }
        } else {

            return redirect()->route('Userlogin');
        }


        return $res;
    }
}
