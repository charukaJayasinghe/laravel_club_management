<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Mail\testMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function test()
    {
        return view("mail.verificationMail");
    }

    public function sendEmail(Request $request)
    {
        $res = "";
        $data = [

            'subject' => 'Test Subject',
            'body' => 'test body'
        ];
        $result =     Mail::to('charukadhananjana@gmail.com')->send(new testMailer($data));


        // $res = "EMail Sent";
        if ($result) {
            $res = "success";
            Log::info('The email was sent successfully.');
        } else {
            $res = "fail";
        }
        return $res;
    }
}
