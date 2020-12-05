<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' =>['required'],
            'event_id' => ['required'],
            'content' => ['required','max:400'],
        ]);
        $commnet = new Comment;
        $commnet->user_id = Auth::id();
        $commnet->event_id = $id;
        $commnet->content = $request->content;
        $commnet->save();

        return redirect()
             ->action('EventController@show', ['event' => Event::findOrFail($id)])
             ->with('success','コメントを投稿しました');
    }
    public function destroy($event_id, $comment_id) {
        $event = Event::findOrFail($event_id);
        $event->comments()->findOrFail($comment_id)->delete();
  
        return redirect()
               ->action('EventController@show', ['event' => Event::findOrFail($event_id)])
               ->with('danger','コメントを削除しました');
      }
}
