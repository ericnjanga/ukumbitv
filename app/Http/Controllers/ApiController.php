<?php

namespace App\Http\Controllers;

use App\AdminVideo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $password = $request->input('password');
        $email = $request->input('email');

        $user = User::where([
            'email' => $email
        ])->first();

        if(!$user) {
            return response()->json(['error' => 'user not found'], 404);
        }

        if (!Hash::check($password, $user->password))  {
            return response()->json(['error' => 'user not found'], 404);
        }

        $user->api_token = str_random(60);
        $user->save();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'api_token' => $user->api_token
        ], 200);
    }

    public function getAllVideos()
    {
        $videos = AdminVideo::with('videoimage', 'category', 'likes')->orderby('id' , 'desc')->get();
        return response()->json($videos, 200);
    }
}
