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

    //********************Scopes*************************

    public static function scopeAllOrdered($query){ //get the users ordered by recent post
		return $query->join('users','users.id','=','entries.user_id')->orderBy('entries.created_at', 'desc')->select('users.*',\DB::raw('COUNT(users.id) as user_count WHERE users.id = entries.user_id'))->having('user_count', '<=',3)->get();
	}
}
