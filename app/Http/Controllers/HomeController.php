<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entry;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth','exept');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        // Get the entries ordered by created_at and then taking just users
        $entries = Entry::orderBy('created_at','desc')->paginate(5)->unique('user_id');
        
        return view('public.index', compact('entries'));
    }
}
