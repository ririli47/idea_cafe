<?php

namespace IdeasCafe;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'idea' => 'required'
    );

    public function user()
    {
        return $this->belongsTo('IdeasCafe\User');
    }
}
