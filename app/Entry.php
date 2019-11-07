<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];


    //********************Relationships*******************

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
