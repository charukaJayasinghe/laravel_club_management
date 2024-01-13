<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class UserCommentController extends Controller
{
    public function postComment(Request $request)
    {
        $res = "";
        $comment = $request->input("comment");
        if (empty(trim($comment))) {
            $res = "Your Comment is Empty";
        } else {
            $postId = $request->input("id");
            $userId = $request->session()->get('user')["id"];
            $commentObj = new comment();
            $commentObj->comment = $comment;
            $commentObj->nalanda_user_id = $userId;
            $commentObj->post_id = $postId;
            $commentObj->save();
            $res = "Success";
        }

        return $res;
    }
}
