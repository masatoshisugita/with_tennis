<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Comment;

class EventController extends Controller
{   
    public function index()
    {
        if(Auth::check()){
            $events = Event::all();
            return view('event.index', compact('events'));
        }else{
            return redirect('/login');
        }
        
    }
    public function create()
    {    
        return view('event.create');
    }
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'user_id' =>['required'],
            'title' => ['required','max:100'],
            'place' => ['required','max:100'],
            'date' => ['required','date_format:Y-m-d H:i'],
            'detail' => ['required','max:400'],
    
        ]);
        
        $event = new Event;
        $event->user_id = Auth::id();
        $event->title = $request->title;
        $event->place = $request->place;
        $event->date = $request->date;
        $event->detail = $request->detail;
        $event->save();
        return redirect('/event')->with('success', 'イベントの投稿を完了しました');
    }
    public function show(Request $request,$id)
    {
        $event = Event::find($id);
        $comments = Comment::where('event_id',$event->id)->get();
        return view('event.show', compact('event','comments'));
    }
    public function edit(Request $request,$id)
    {   
        $event = Event::find($id);
        if(Auth::user()->id == $event->user_id){
            return view('event.edit', compact('event'));
        }else{
            return redirect('/event');
        }
    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'user_id' =>['required'],
            'title' => ['required','max:100'],
            'place' => ['required','max:100'],
            'date' => ['required','date_format:Y-m-d H:i'],
            'detail' => ['required','max:400'],    
        ]);

        $update = [
            'user_id' => auth()->id(),
            'title' => $request->title,
            'place' => $request->place,
            'date' => $request->date,
            'detail' => $request->detail
        ];
        
        Event::where('id', $id)->update($update);
        return back()->with('success', 'イベントの編集を完了しました');
    }
    public function destroy(Request $request,$id)
    {
        Event::where('id', $id)->delete();
        return redirect()->route('event.index')->with('danger', 'イベントの削除を完了しました');
    }
}
