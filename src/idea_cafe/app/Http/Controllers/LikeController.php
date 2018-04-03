<?php

namespace IdeasCafe\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use IdeasCafe\Like;
use IdeasCafe\Idea;

class LikeController extends Controller
{
    function add_like(Request $request)
    {
        $this->validate($request, Like::$rules);
        $like = new Like;
        $form = $request->all();
        unset($form['_token']);
        $like->fill($form)->save();

        return redirect('/');
    }

    function remove_like(Request $request)
    {
        $this->validate($request, Like::$rules);
        $like = Like::where('like_user_id', $request->like_user_id)
                    ->where('idea_id', $request->idea_id)->delete();
        return redirect('/');
    }
}
