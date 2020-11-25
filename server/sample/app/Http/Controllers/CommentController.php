<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Ivent;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $commnet = new Comment;

        $commnet->user_id = Auth::id();
        $commnet->ivent_id = $id;
        $commnet->content = $request->content;
        $commnet->save();

        // Comment::create(
        //   array(
        //     'user_id' => Auth::user()->id,
        //     'ivent_id' => $id,
        //     'content' => $request->content,
        //   )
        // );

        $ivent = Ivent::findOrFail($id);

        return redirect()
             ->action('IventController@show', ['ivent' => Ivent::findOrFail($id)]);
    }
    public function destroy($ivent_id, $comment_id) {
        $ivent = Ivent::findOrFail($ivent_id);
        $ivent->comment_by()->findOrFail($comment_id)->delete();
  
        return redirect()
               ->action('IventController@show', ['id' => $ivent_id]);
      }
}
