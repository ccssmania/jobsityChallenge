<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Thujohn\Twitter\Facades\Twitter;
use App\Entry;

class ProfileController extends Controller
{
    public function index($user_id){
    	$user = User::find($user_id); //get the user
    	$entries = $user->entries()->paginate(9); //paginating the entries
    	$tweets = Twitter::getUserTimeline(['screen_name' => $user->twitter_username, 'count' => 20, 'format' => 'object']); //getting the timeline of twitter_username 

    	$noShowTweets = $user->noShowTweets->pluck('tweet_id');

    	
    	return view('profile.index', compact('user','entries', 'noShowTweets', 'tweets'));
    }

    /**
     * show a  entry in profile
     *
     */

    public function show($entry_id, $user_id){
    	$entry = Entry::find($entry_id);
    	$user  = User::find($user_id);
    	$tweets = Twitter::getUserTimeline(['screen_name' => $user->twitter_username, 'count' => 20, 'format' => 'object']); //getting the timeline of twitter_username 

    	$noShowTweets = $user->noShowTweets->pluck('tweet_id');
    	return view('entries.show', compact('entry', 'user', 'noShowTweets', 'tweets'));
    }
}
