<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntryController extends Controller
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
     * show the view to create an entry
     *
     * @return view
     */
    public function create(){
        $entry = new Entry;
        $this->authorize('create', Entry::class); //Access Controll using policies
        return view('entries.create',compact('entry'));
    }
    /**
     * show the view to edit an entry
     *
     * @return view
     */
    public function edit($id){
        $entry = Entry::find($id);
        $this->authorize('update', $entry); //Access Controll using policies
        return view('entries.edit',compact('entry'));
    }

    /**
     * store a new Entry
     *
     */
    public function store(Request $request){

        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);
        $entry = new Entry($request->all());

        $entry->user_id = \Auth::user()->id; //Save the user auth id
        $this->authorize('create', Entry::class); //Access Controll using policies
        if($entry->save()){
            \Session::flash('message', 'Entry Created');
            return redirect('/');
        }else
        {
            \Session::flash('errorMessage', 'Something was wrong');
            return redirect('/');
        }
    }

    /**
     * update a  entry
     *
     */
    public function update(Request $request, $id){

        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $entry = Entry::find($id);
        $this->authorize('update', $entry); //Access Controll using policies
        if($entry->update($request->all())){
            \Session::flash('message', 'Entry Updated!');
            return redirect('/');
        }else
        {
            \Session::flash('errorMessage', 'Something was wrong');
            return redirect('/');
        }
    }

}
