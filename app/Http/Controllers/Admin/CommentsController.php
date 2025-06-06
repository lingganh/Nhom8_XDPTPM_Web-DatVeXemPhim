<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Comment;
class CommentsController
{
    public function __construct()
    {

    }

    public function index(){

        $comnet = Comment::orderBy("created_at","desc")->paginate(10);

        return view('admin.comments.index',compact('comnet'));
    }
    public function indexWeb(Request $request){
        return view('admin.comments.index_web');

    }

    public function store(Request $request){

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->phone = $request->phone;
        $comment->message = $request->message;
        $comment->created_at = now();
        $comment->updated_at = now();
        $comment->save();
        return response()->json(['success' => 'Góp ý đã được gửi thành công']);
    }
}
