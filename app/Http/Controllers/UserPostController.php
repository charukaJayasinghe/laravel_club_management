<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function viewCreatePost(Request $request)
    {
        $full_name = $request->session()->get('user')["full_name"];
        $name = explode(" ", $full_name)[0];

        return view('user.createPost', ['data' => $name]);
    }

    public function makePost(Request $request)
    {
        $res =  "";
        $title = $request->input('title');
        $description = $request->input('description');

        if (!$request->hasFile('i')) {
            $res = "Please Upload an image";
        } else {
            $file = $request->file('i');
            if ($file->isValid()) {
                $extension = $file->getClientOriginalExtension();


                if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    $res = "Please Select a valid Image";
                } else {
                    if (empty(trim($title))) {
                        $res = "Please Enter Post Title";
                    } else if (empty(trim($description))) {
                        $res = "Enter Post Description";
                    } else {
                        $path = $file->store('images', 'public');
                        $post = new post();
                        $post->title = $title;
                        $post->description = $description;
                        $post->image = $path;
                        $post->nalanda_user_id = $request->session()->get('user')["id"];
                        $post->save();
                        $res = "success";
                    }
                }
            } else {
            }
        }

        return $res;
    }

    public function viewMyPosts(Request $request){
        $full_name = $request->session()->get('user')["full_name"];
        $name = explode(" ", $full_name)[0];
        $post = post::where('nalanda_user_id',"=",$request->session()->get('user')['id'])->orderBy('updated_at','desc')->get();

        if(count($post) == 0){
          $post = "none";
        }
        return view('user.viewMyPost',['data' => $name,'post'=>$post]);
    }
}
