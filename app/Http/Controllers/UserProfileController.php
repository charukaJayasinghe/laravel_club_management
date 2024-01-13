<?php

namespace App\Http\Controllers;

use App\Models\class_room;
use App\Models\grade;
use App\Models\nalanda_user;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function view(Request $request)
    {
        $full_name = $request->session()->get('user')["full_name"];
        $id = $request->session()->get('user')['id'];
        $classes = class_room::select('name')->distinct()->orderBy('name', 'ASC')->get();
        $grades = grade::select("name")->distinct()->get();
        $profile = nalanda_user::where('id', '=', $id)->first();
        $name = explode(" ", $full_name)[0];
        return view("user.profile", ["data" => $name, 'profile' => $profile, 'class' => $classes, 'grade' => $grades]);
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

    public function update(Request $request)
    {
        $res = "";
        $fullName = $request->input("full_name");
        $index = $request->input("index");
        $grade = $request->input("grade");
        $class = $request->input("class");
        $email = $request->input("email");
        $mobile = $request->input("mobile");
        $address = $request->input("address");
        $isset = $request->input("isset");
        $unset = $request->input("unset");
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
        } else if (empty($address)) {
            $res = "Please Enter Your Address";
        } else if (!preg_match("/(?:0|94|\+94|0094)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|91)(0|2|3|4|5|7|9)|7(0|1|2|4|5|6|7|8)\d)\d{6}/", $mobile)) {
            $res = "Please Enter a Valid phone number";
        } else {
            if ($isset == 1 && $unset == 0) {
                if (!$request->hasFile('i')) {
                    $res = "There Was an Error Please Try again";
                } else {

                    $file = $request->file('i');
                    if ($file->isValid()) {
                        $extension = $file->getClientOriginalExtension();


                        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            $res = "Please Select a valid Image";
                        } else {
                            $classRs = class_room::whereHas('grade', function ($query) use ($grade) {
                                $query->where('name', '=', $grade);
                            })->where("name", "=", $class)->get();

                            if (count($classRs) != 1) {
                                $res = "Please Enter Valid Grade and Class";
                            } else {
                                $classData = $classRs->first();
                                $path = $file->store('profile', 'public');
                                $user =  nalanda_user::where("id", "=", $request->session()->get('user')['id'])->first();
                                $user->full_name = $fullName;
                                $user->addno = $index;
                                $user->email = $email;
                                $user->mobile = $mobile;
                                $user->address = $address;
                                $user->profileImg = $path;
                                $user->class_room_id = $classData->id;
                                $user->save();
                                $request->session()->put('user', $user);
                                $res = "success";
                            }
                        }
                    }
                }
            } else if ($isset == 0 && $unset == 1) {

                $classRs = class_room::whereHas('grade', function ($query) use ($grade) {
                    $query->where('name', '=', $grade);
                })->where("name", "=", $class)->get();

                if (count($classRs) != 1) {
                    $res = "Please Enter Valid Grade and Class";
                } else {
                    $classData = $classRs->first();

                    $user =  nalanda_user::where("id", "=", $request->session()->get('user')['id'])->first();
                    $user->full_name = $fullName;
                    $user->addno = $index;
                    $user->email = $email;
                    $user->mobile = $mobile;
                    $user->address = $address;
                    $user->profileImg = "";
                    $user->class_room_id = $classData->id;
                    $user->save();
                    $request->session()->put('user', $user);
                    $res = "success";
                }
            } else if ($isset == 0 && $unset == 0) {
                $classRs = class_room::whereHas('grade', function ($query) use ($grade) {
                    $query->where('name', '=', $grade);
                })->where("name", "=", $class)->get();
                if (count($classRs) != 1) {
                    $res = "Please Enter Valid Grade and Class";
                } else {
                    $classData = $classRs->first();
                    $user =  nalanda_user::where("id", "=", $request->session()->get('user')['id'])->first();
                    $user->full_name = $fullName;
                    $user->addno = $index;
                    $user->email = $email;
                    $user->mobile = $mobile;
                    $user->address = $address;
                    $user->class_room_id = $classData->id;
                    $user->save();
                    $request->session()->put('user', $user);
                    $res = "success";
                }
            }
        }
        return $res;
    }
}
