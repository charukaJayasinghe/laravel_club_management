<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\news;
use App\Models\post;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function viewHome(Request $request){
           $full_name = $request->session()->get('user')["full_name"];
           $name = explode(" ",$full_name)[0];
           $post = post::where("approval","=","1")->where('delete', '=', '0')->limit('3')->orderBy('updated_at', 'desc')->get();
           $date = date("Y");
           $news = news::where('delete', '=', '0')->limit('3')->orderBy('updated_at', 'desc')->get();
           $final = '%'.$date.'%';
           $event = event::where("date","LIKE",$final)->orderBy('date', 'asc')->get();
           return view('user.dashboard',['data'=>$name,'post'=>$post,'event'=>$event,'date'=>$date,'news'=>$news]);
    }
}
