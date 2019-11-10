<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'twitter_username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //********************Relationships*******************

    public function entries(){
    	return $this->hasMany('App\Entry')->orderBy('entries.created_at','DESC');
    }

    public function noShowTweets(){
    	return $this->hasMany('App\NoShowTweet');
    }
    //********************Scopes*************************

    public static function scopeAllOrdered($query){ //get the users ordered by recent post
		return $query->join('entries','users.id','=','entries.user_id')->orderBy('entries.created_at', 'desc')->select('users.*')->get()->unique('users.id');
	}
}
