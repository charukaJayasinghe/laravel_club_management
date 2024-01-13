<?php

namespace App\Http\Controllers;

use App\Models\nalanda_user;
use App\Models\news;
use App\Models\news_comment;
use Illuminate\Http\Request;

class UserNewsController extends Controller
{
    public function singleNewsView(Request $request)
    {
        $id = $request->input('id');
        $full_name = $request->session()->get('user')["full_name"];
        $name = explode(" ", $full_name)[0];
        $comment = news_comment::where('news_id',"=",$id)->orderBy('created_at','desc')->get();
        if(count($comment) == 0){
          $comment = "none";
        }
        $uid = $request->session()->get('user')["id"];
        $res = nalanda_user::where("id","=",$uid)->get()->first();
        $image = $res["profileImg"];
        $news = news::find($id);
        $description = nl2br(strip_tags($news->description));
        return view("user.singleNewsView", ['data' => $name, 'post' => $news, 'des' => $description,'image'=>$image,'comment'=>$comment]);
    }

    public function postNewsComment(Request $request){
        $res = "";
        $comment = $request->input("comment");
        if (empty(trim($comment))) {
            $res = "Your Comment is Empty";
        } else {
            $postId = $request->input("id");
            $userId = $request->session()->get('user')["id"];
            $commentObj = new news_comment();
            $commentObj->comment = $comment;
            $commentObj->nalanda_user_id = $userId;
            $commentObj->news_id = $postId;
            $commentObj->save();
            $res = "Success";
        }

        return $res;
    }
}
