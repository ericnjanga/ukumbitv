<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function sendComment(Request $request)
    {
        $comment = Comment::create([
            'text' => $request->text,
            'user_id' => Auth::id(),
            'admin_video_id' => $request->video_id
        ]);

        $comment->user;

        return response()->json($comment, 201);
    }
}
