<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;


class CommentsController extends Controller
{
    //

    public function __construct()
    {

    }

    public function index(){

        $comnet = Comment::orderBy("created_at","desc")->paginate(10);

        return view('backend.comments.index',compact('comnet'));
    }

    public function indexWeb(Request $request){
        return view('backend.comments.index_web');

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'sometimes|nullable',
            'message' => 'required',
        ]);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->phone = $request->phone;
        $comment->message = $request->message;
        $comment->save();

        $subject = 'Cảm ơn phản hồi của bạn!';
        $name = $request->name; // Lấy tên để sử dụng trong email

         \Mail::send('emails.feedback_thankyou', [
            'name' => $name,
            'messageContent' => $data['message']
        ], function ($message) use ($comment, $subject) {
            $message->to($comment->email, $comment->name)
                ->subject($subject)
                ->from(config('mail.from.address'), config('mail.from.name'));
        });

        return response()->json(['success' => 'Góp ý đã được gửi thành công']);
    }


}
