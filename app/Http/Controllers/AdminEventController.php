<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index()
    {
        return view('admin.createEvent');
    }
    public function create(Request $request)
    {
        $res = "";
        $title = $request->input("title");
        $stime = $request->input("stime");
        $etime = $request->input("etime");
        $date = $request->input("date");
        $location = $request->input("location");
        $description =  $request->input("description");

        if (empty(trim($title))) {
            $res = "Please Enter Event Title";
        } else if (empty($stime)) {
            $res = "Please Enter Start Time";
        } else if (empty($etime)) {
            $res = "Please Enter End Time";
        } else if ($stime == "00:00" && $etime == "00:00") {
            $res = "Please Select Vaid Time duration";
        } else if (empty($date)) {
            $res = "Please Select a date";
        } else if (empty($location)) {
            $res = "Please Enter Event Location";
        } else if (empty($description)) {
            $res = "Please Enter Description for the event";
        } else {

            $event = new event;
            $event->title = $title;
            $event->start_time = $stime;
            $event->end_time = $etime;
            $event->date = $date;
            $event->description = $description;
            $event->location = $location;
            $event->save();

            $res = "Success";
        }

        return $res;
    }

    public function viewManage()
    {
        $events = event::where("delete","=","0")->orderBy('date', 'asc')->get();
        return view('admin.manageEvent', ["data" => $events]);
    }

    public function deleteEvent(Request $request)
    {
        $res = "";
        $id = $request->input("id");
        if (preg_match('/^\d+$/', $id)) {
            $result = event::find($id);
            if ($result) {
                $result->delete = 1;
                $result->save();
                $res = "Success";
            } else {
                $res = "Please Select a Valid Event";
            }
        } else {
            $res = "Please Select a Valid Event";
        }
        return $res;
    }
}
