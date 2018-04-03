<?php

namespace IdeasCafe\Http\Controllers;

use Illuminate\Http\Request;
use IdeasCafe\Idea;
use IdeasCafe\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index (Request $request)
    {
        $user = User::find($request->id);

        $ideas = Idea::with('user')->where('user_id', $user->id)->get();

        return view('user.index', ['ideas' => $ideas, 'user' => $user]);
    }
}
