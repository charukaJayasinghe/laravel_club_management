<?php

namespace App\Http\Controllers;

use App\Models\class_room;
use App\Models\grade;
use App\Models\nalanda_user;
use App\Models\user_approvement;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function login()
    {
        return view("user.login");
    }
    public function signup()
    {
        $grade = grade::all();
        $class = class_room::select('name')->distinct()->get();
        return view("user.signup", ["grade" => $grade, "class" => $class]);
    }

    public function loginprocess(Request $request)
    {
        $res = "";
        $email = $request->input('email');
        $password = $request->input('password');
        if (empty(trim($email))) {
            $res = "Please Enter Email";
        } else if (empty(trim($password))) {
            $res = "Please Enter Password";
        } else {

            $results = nalanda_user::where('email', '=', $email)
                ->where('password', '=', md5($password))
                ->get();

            if (count($results) != 1) {
                $res = "Invalid Username or Password";
            } else {
                $result  = nalanda_user::where('email', '=', $email)->where('password', '=', md5($password))->first();
                 if($result->user_approvement_id != "2"){
                   $res = "Please Wait till an Admin Approves you<br> Admin Whatsapp : 0712837212";
                 }else{
                    $request->session()->put('user', $result);
                   $res = "Login Success";

                 }

            }
        }
        return $res;
    }
    public function checkOtherThanAlpha($varchar)
    {
        $text =  str_replace(' ', '', $varchar);
        $isThereOther = false;
        for ($i = 0; $i < strlen($text); $i++) {
            if (!ctype_alpha($text[$i])) {
                $isThereOther = true;
                break;
            }
        }
        return $isThereOther;
    }


    public function signupProcess(Request $request)
    {
        $type = $request->input("utype");
        $res = "";
        if ($type == "Nalanda") {

            $fullName = $request->input("fullName");
            $index = $request->input("index");
            $grade = $request->input("grade");
            $class = $request->input("class");
            $email = $request->input("email");
            $mobile = $request->input("mobile");
            $password = $request->input("password");
            $repassword = $request->input("repassword");
            $address = $request->input("address");
            if (empty($fullName)) {
                $res = "Please Enter Your Full Name";
            } else if (strlen($fullName) < 5) {
                $res = "Please Enter a valid Full Name";
            } else if ($this->checkOtherThanAlpha($fullName)) {
                $res = "Please Enter a valid Full Name";
            } else if ($grade == "Grade") {
                $res = "Please Select Your Grade";
            } else if (strlen($index) != 5) {
                $res = "Please Enter a valid Index Number";
            } else if ($class == "Class") {
                $res = "Please Select Your Class";
            } else if (empty($email)) {
                $res = "Please Enter Your Email Address";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $res = "Please Enter a Valid Email Address";
            } else if (empty($mobile)) {
                $res = "Please Enter Your Mobile";
            }else if (empty($address)) {
                $res = "Please Enter Your Address";
            } else if (!preg_match("/(?:0|94|\+94|0094)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|91)(0|2|3|4|5|7|9)|7(0|1|2|4|5|6|7|8)\d)\d{6}/", $mobile)) {
                $res = "Please Enter a Valid phone number";
            } else if (empty($password)) {
                $res = "Please Enter Your password";
            } else if (strlen($password) < 8) {
                $res = "Password Should be More Than 7 Characters";
            } else if (empty($repassword)) {
                $res = "Please Re Enter Your Password";
            } else if ($password != $repassword) {
                $res = "Passwords Does Not Match";
            } else {

                $classRs = class_room::whereHas('grade', function ($query) use ($grade) {
                    $query->where('name', '=', $grade);
                })->where("name", "=", $class)->get();

                if (count($classRs) != 1) {
                    $res = "Please Enter Valid Grade and Class";
                } else {
                    $results = nalanda_user::where("email", "=", $email)->orWhere("mobile", "=", $mobile)->orWhere("addno", "=", $index)->count();
                    if ($results != 0) {
                        $res = "A User Like This Aleady Exists";
                    } else {
                        $classData = $classRs->first();
                        $approvement = new nalanda_user();
                        $approvement->full_name = $fullName;
                        $approvement->mobile = $mobile;
                        $approvement->password = md5($password);
                        $approvement->addno = $index;
                        $approvement->address = $address;
                        $approvement->email = $email;
                        $approvement->class_room_id = $classData->id;
                        $approvement->email = $email;
                        $approvement->user_status_id = 2;
                        $approvement->user_approvement_id = 1;
                        $approvement->save();
                        $res = "Success";
                    }
                }
            }
            // $res = $fullName . " " . $index . " ".$grade . " ".$class." ".$email." ".$mobile." ".$password." ".$repassword;

        } else if ($type == "Other") {
            $res = "its Other";
        }
        return $res;
    }
}
