<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoShowTweet extends Model
{
    protected $fillable = ['user_id', 'tweet_id'];

    public $timestamps = null;
}
