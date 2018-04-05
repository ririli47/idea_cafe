<?php

namespace IdeasCafe\Http\Controllers;

use Illuminate\Http\Request;
use IdeasCafe\Idea;
use IdeasCafe\User;
use IdeasCafe\Like;
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

            $liked = 0;
            if($user != null)
            {
                $liked = Like::where('like_user_id', $user->id)->where('idea_id', $idea->id)->exists();
            }

            $ideas[] = [
                'id' => $idea->id,
                'user_id' => $idea->user_id,
                'user_name' => $idea_user->name,
                'liked' => $liked,
                'idea' => $idea->idea,
            ];
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
