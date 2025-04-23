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

    public function store(Request $request){

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
        $comment->created_at = now();
        $comment->updated_at = now();
        $comment->save();
        $subject = 'Cảm ơn phản hồi của bạn!';
        $messageContent = "<h1>Xin chào " . e($data['name']) . ",</h1>";
        $messageContent .= "<p>Cảm ơn bạn đã gửi góp ý cho chúng tôi:</p>";
        $messageContent .= "<p>\"" . e($data['message']) . "\"</p>";
        $messageContent .= "<p>Chúng tôi sẽ xem xét phản hồi này và liên hệ lại với bạn nếu cần thiết.</p>";
        $messageContent .= "<p>Trân trọng,</p>";
        $messageContent .= "<p>Đội ngũ của bạn</p>";

        \Mail::raw($messageContent, function ($message) use ($data, $subject) {
            $message->to($data['email'], $data['name'])
            ->subject($subject);
        });

        return response()->json(['success' => 'Góp ý đã được gửi thành công']);

    }


}
