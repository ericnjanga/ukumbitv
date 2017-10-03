<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','contact', 'showVideo', 'sendContactForm', 'getAllVideos']]);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        return response()->json($user->api_token);
    }

    public function test()
    {
        $user = Auth::guard('api')->user();
        return response()->json($user, 200);
    }
}
