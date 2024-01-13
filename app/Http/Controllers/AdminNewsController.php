<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use stdClass;

class AdminNewsController extends Controller
{
    public function index(){

       return view('admin.createNews');
    }

    public function createNews(Request $request){

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
                        $res = "Please Enter News Title";
                    } else if (empty(trim($description))) {
                        $res = "Enter News Description";
                    } else {
                        $path = $file->store('images', 'public');
                        $post = new news();
                        $post->title = $title;
                        $post->description = $description;
                        $post->image = $path;
                        $post->admin_id = $request->session()->get('admin')["id"];
                        $post->save();
                        $res = "success";
                    }
                }
            } else {
            }
        }

        return $res;
    }

    public function manageNews(){

        $data = news::where('delete', '=', '0')->orderBy('created_at', 'desc')->get();
        return view("admin.manageNews",["data" => $data]);
    }

    public function viewNews(Request $request){
        $post = news::find($request->input("id"));
        $json = new stdClass();
        $json->title = $post->title;
        $json->user = $post->admin->full_name;
        $subdatetime = explode(" ", $post->created_at);
        $json->description =  nl2br(strip_tags($post->description));
        $json->image = asset('storage/' . $post->image);
        $json->created_date = $subdatetime[0];
        $json->created_time = $subdatetime[1];
        return json_encode($json);
    }

    public function deleteNews(Request $request){
        $id = $request->input("id");
        $post = news::find($id);
        $post->delete = 1;
        $post->save();
        return "Success";
    }


}
