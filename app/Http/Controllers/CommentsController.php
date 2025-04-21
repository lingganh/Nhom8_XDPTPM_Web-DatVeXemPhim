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

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->phone = $request->phone;
        $comment->message = $request->message;
        $comment->created_at = now();
        $comment->updated_at = now();
        $comment->save();
        $brevoApiKey = "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";
        $senderEmail = "885fae005@smtp-brevo.com";

        Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $brevoApiKey,
            'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => ['name' => 'FIVE star cinema ', 'email' => $senderEmail],
            'to' => [
                ['email' => $comment->email]
            ],
            'subject' => 'From FIVE STAR WITH LOVE  ',
            'htmlContent' => "<h1> Phản hồi về Góp Ý của Bạn</h1>", "<a> Trước hết , chúng tôi vô cùng cảm kích vì bạn đã gửi góp ý đến chúng tôi . Chúng tôi đã xem và sẽ xem xét về góp ý của bạn  Cảm ơn bạn !</a>",

        ]);
       return response()->json(['success' => 'Góp ý đã được gửi thành công']);

    }


}
