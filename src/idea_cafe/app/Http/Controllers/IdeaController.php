<?php

namespace IdeasCafe\Http\Controllers;

use Illuminate\Http\Request;
use IdeasCafe\Idea;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    function index(Request $request)
    {
        //\Debugbar::info('IdeaController@create');

        $user = Auth::user();

        $ideas_temp = Idea::orderBy('updated_at', 'DESC')->get();

        $ideas = Array();
        foreach($ideas_temp as $idea)
        {
            if(strlen($idea->idea) > 10)
            {
                $ideas[] = mb_substr($idea->idea, 0, 10) . "...";
            }
            else
            {
                $ideas[] = $idea->idea;
            }
        }
        return view('idea.index', ['ideas' => $ideas, 'user' => $user]);
    }

    function add(Request $request)
    {
        return view('idea.add');
    }

    function create(Request $request)
    {
        $this->validate($request, Idea::$rules);
        $idea = new Idea;
        $form = $request->all();
        unset($form['_token']);
        $idea->fill($form)->save();
        return redirect('/');
    }
}
