<?php

namespace App\Http\Controllers;

use App\Models\board_member;
use App\Models\daily_visit;
use App\Models\news;
use App\Models\post;
use App\Models\subscription;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class guestController extends Controller
{
    public function index(Request $request)
    {
        $data = post::where("approval", "=", "1")->orderBy('updated_at', 'desc')->limit(5)->get();
        $news = news::where("delete", "=", "0")->orderBy('updated_at', 'desc')->limit(4)->get();
        $board = board_member::join('board_positions', 'board_members.board_position_id', "=", "board_positions.id")->select("board_members.name as Bname", "board_positions.name as Pname", "board_members.image as Bimage")->orderBy('board_positions.index', 'asc')->get();
        if (!$request->session()->has('guest')) {

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("y-m-d");
            $request->session()->put('guest', $date);
            $visits = new daily_visit();
            $visits->date = $date;
            $visits->save();
            //upadet COunt
        } else {
            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("y-m-d");
            if ($request->session()->get('guest') ==  $date) {
            } else {
                $request->session()->put('guest', $date);
                $visits = new daily_visit();
                $visits->date = $date;
                $visits->save();
            }
        }



        return view('home',['data'=>$data,"news"=>$news,"board"=>$board]);
    }
    public function subscribe(Request $request)
    {
        $res = "";
        $name = $request->input("name");
        $email = $request->input("email");
        if (empty(trim($name)) && empty(trim($email))) {
            $res = "name email";
        } else if (empty(trim($email))) {
            $res = "email";
        } else if (empty(trim($name))) {
            $res = "name";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $res = "email";
        } else {
            $count = subscription::where("email", "=", $email)->get()->count();
            if ($count == 0) {
                $subs = new subscription();
                $subs->name = $name;
                $subs->email = $email;
                $subs->save();
                $res = "sucess";
            } else {
                $res = "You have Already Subscribed";
            }
        }

        return $res;
    }

    public function viewNews(Request $request)
    {
        $id = $request->input("id");
        $news = news::find($id);
        $description = nl2br(strip_tags($news->description));
        $upDescription = preg_replace_callback(
            "#(https?://\S+)#",
            function ($matches) {
                $url = $matches[0];
                return '<a target="_blank" href="' . $url . '">' . $url . '</a>';
            },
            $description
        );
        return view("viewNews", ["news" => $news, "description" => $upDescription]);
    }
}
