<?php

namespace IdeasCafe\Http\Controllers;

use Illuminate\Http\Request;
use IdeasCafe\Idea;
use IdeasCafe\User;
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
            $idea_user = User::where('id', $idea->user_id)->first(['name']);

            if(mb_strlen($idea->idea) > 20)
            {
                $ideas[] = [
                    'id' => $idea->id,
                    'user_id' => $idea->user_id,
                    'user_name' => $idea_user->name,
                    'idea' => $idea->idea = mb_substr($idea->idea, 0, 20) . "...",
                ];
            }
            else
            {
                $ideas[] = [
                    'id' => $idea->id,
                    'user_id' => $idea->user_id,
                    'user_name' => $idea_user->name,
                    'idea' => $idea->idea,
                ];
            }

        }

        return view('idea.index', ['ideas' => $ideas, 'user' => $user]);
    }

    function show(Request $request)
    {
        $idea = Idea::find($request->id);
        $idea->idea = str_replace("\r", "<br>", $idea->idea);
        return view('idea.show', ['idea' => $idea]);
    }

    function edit(Request $request)
    {
        $user = Auth::user();
        $idea = Idea::find($request->id);

        return view('idea.edit', ['idea' => $idea, 'user' => $user]);
    }

    function update(Request $request)
    {
        $user = Auth::user();

        $idea = Idea::find($request->id);
        if($idea->user_id != $user->id)
        {
            return redirect('/');
        }

        $this->validate($request, Idea::$rules);
        $form = $request->all();
        unset($form['_token']);
        $idea->fill($form)->save();
        return redirect('/');
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

    function delete(Request $request)
    {
        $idea = Idea::find($request->id);

        return view('idea.delete', ['idea' => $idea]);
    }

    function remove(Request $request)
    {
        Idea::find($request->id)->delete();
        return redirect('/');
    }
}
