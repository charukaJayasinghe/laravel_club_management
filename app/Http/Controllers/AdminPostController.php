<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use stdClass;

class AdminPostController extends Controller
{
    public function approve()
    {
        $data = post::where('approval', '=', '0')->where('delete', '=', '0')->orderBy('created_at', 'desc')->get();
        return view("admin.approvePosts", ["data" => $data]);
    }

    public function viewPost(Request $request)
    {
        $post = post::find($request->input("id"));
        $json = new stdClass();
        $json->title = $post->title;
        $json->user = $post->nalanda_user->full_name;
        $subdatetime = explode(" ", $post->created_at);
        $json->description =  nl2br(strip_tags($post->description));
        $json->image = asset('storage/' . $post->image);
        $json->created_date = $subdatetime[0];
        $json->created_time = $subdatetime[1];
        return json_encode($json);
    }

    public function approvePost(Request $request)
    {
        $id = $request->input("id");
        $post = post::find($id);
        $post->approval = 1;
        $post->save();
        return "Success";
    }
    public function deletePost(Request $request)
    {
        $id = $request->input("id");
        $post = post::find($id);
        $post->delete = 1;
        $post->save();
        return "Success";
    }

    public function viewManagePost(Request $request){
        $data = post::where('approval', '=', '1')->where('delete', '=', '0')->orderBy('created_at', 'desc')->get();
        return view("admin.managePosts",["data" => $data]);

    }
}
