<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Ivent;
use App\Comment;

class IventController extends Controller
{   
    public function index()
    {
        if(Auth::check()){
            $ivents = Ivent::all();
            return view('ivent.index', compact('ivents'));
        }else{
            return redirect('/login');
        }
        
    }
    public function create()
    {    
        return view('ivent.create');
    }
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'user_id' =>['required'],
            'title' => ['required','max:100'],
            'place' => ['required','max:100'],
            'date' => ['required','date'],
            'detail' => ['required','max:400'],
    
        ]);
        
        $ivent = new Ivent;
        $ivent->user_id = Auth::id();
        $ivent->title = $request->title;
        $ivent->place = $request->place;
        $ivent->date = $request->date;
        $ivent->detail = $request->detail;
        $ivent->save();
        return back()->with('success', 'イベントの投稿を完了しました');
    }
    public function show(Request $request,$id)
    {
        $ivent = Ivent::find($id);
        return view('ivent.show', compact('ivent'));
    }
    public function edit(Request $request,$id)
    {   
        $ivent = Ivent::find($id);
        if(Auth::user()->id == $ivent->user_id){
            return view('ivent.edit', compact('ivent'));
        }else{
            return redirect('/ivent');
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
        
        Ivent::where('id', $id)->update($update);
        return back()->with('success', 'イベントの編集を完了しました');
    }
    public function destroy(Request $request,$id)
    {
        Ivent::where('id', $id)->delete();
        return redirect()->route('ivent.index')->with('success', '削除完了しました');
    }
}
