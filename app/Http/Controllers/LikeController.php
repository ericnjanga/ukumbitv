<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function checkLike(Request $request)
    {
        $check = Like::where('user_id', Auth::id())->where('admin_video_id', $request->video_id)->first();

        return response()->json($check, 200);
    }

    public function like(Request $request)
    {
        $check = 0;
        if($request->type == 'like') {
            $checkDisLike = Like::where('user_id', Auth::id())->where('admin_video_id', $request->id)->where('type', 'dislike')->first();
            if($checkDisLike != null){
                $checkDisLike->delete();
                $check = 1;
            }
        } elseif ($request->type == 'dislike') {
            $checkLike = Like::where('user_id', Auth::id())->where('admin_video_id', $request->id)->where('type', 'like')->first();
            if($checkLike != null){
                $checkLike->delete();
                $check = 1;
            }
        }

        $like = Like::Create([
            'user_id' => Auth::id(),
            'admin_video_id' => $request->id,
            'type' => $request->type
        ]);

        return response()->json(['check' => $check], 200);
    }

    public function unLike(Request $request)
    {
        $like = Like::where('user_id', Auth::id())->where('admin_video_id', $request->id);
        $like->delete();

        return response()->json($like, 200);
    }
}
