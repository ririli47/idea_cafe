<?php

namespace IdeasCafe\Http\Controllers;

use Illuminate\Http\Request;
use IdeasCafe\Idea;
use IdeasCafe\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        //$ideas_temp = Idea::orderBy('updated_at', 'DESC')->get();

        $ideas = Idea::with('user')->where('user_id', $user->id)->get();

        return view('home', ['ideas' => $ideas, 'user' => $user]);
    }
}
