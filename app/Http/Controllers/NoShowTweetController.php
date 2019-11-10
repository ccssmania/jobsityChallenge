<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoShowTweet;
use App\User;

class NoShowTweetController extends Controller
{

	/**
     * Just Users Logged in
     *
     * @return void
     */
    public function __construct(){
        $this->middleware("auth");
    }
    
    /**
	 * hide a  tweet
	 *
	 */

	public function hide($tweet_id, $user_id){
		$tweet = new NoShowTweet; //creating a new record to hide tweets
		$this->authorize('update-tweet',$user_id); //Access Controll using policies
		$tweet->user_id = $user_id;
		$tweet->tweet_id = $tweet_id;
		if ($tweet->save()) {
			return response('OK',200);
		}else{
			return response('error',500);
		}
	}

	/**
	 * show a  tweet
	 *
	 */

	public function show($tweet_id, $user_id){
		$this->authorize('update-tweet',$user_id); //Access Controll using policies
		$tweet =  NoShowTweet::where('user_id',$user_id)->where('tweet_id', $tweet_id)->first();
		if ($tweet->delete()) {
			return response('OK',200);
		}else{
			return response('error',500);
		}
	}
}
