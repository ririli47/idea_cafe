<?php

namespace IdeasCafe;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'idea_id' => 'required',
        'like_user_id' => 'required'
    );
}
