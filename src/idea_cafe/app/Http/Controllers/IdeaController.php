<?php

namespace IdeasCafe\Http\Controllers;

use Illuminate\Http\Request;
use IdeasCafe\Idea;

class IdeaController extends Controller
{
    function index() {
      $ideas = Idea::all();
      return view('idea/index', ['ideas' => $ideas]);
    }
}
