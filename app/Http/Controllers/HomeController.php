<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entry;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();

        $entries = new \Illuminate\Database\Eloquent\Collection;

        /**
         * iterate each user
         * take the last three entries
         * merge in a collection
         * @return Collection
         */
        $users->each(function($item, $key) use (&$entries){
        	$entries = $entries->merge($item->entries_limit_3);
        });

        $entries = $entries->sortByDesc('created_at')->paginate(12); //sorting by created_at and paginating
        return view('public.index', compact('entries'));
    }
}
