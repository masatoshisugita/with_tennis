<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ivent;

class IventController extends Controller
{
    public function index()
    {
        $ivents = Ivent::all();

        return view('ivent.index', compact('ivents'));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $ivents = new Ivent;
        $ivents->user_id = auth()->id();
        $ivents->title = $request->title;
        $ivents->place = $request->place;
        $ivents->date = $request->date;
        $ivents->detail = $request->detail;
        $ivents->save();
    }
    public function show(Request $request,$id)
    {
        $ivent = Ivent::find($id);
        //$user = Ivent::find($id)->user;
        return view('ivent.show', compact('ivent'));
    }
    public function edit(Request $request,$id)
    {
        $ivent = Ivent::find($id);
        return view('ivent.edit', compact('ivent'));
    }
    public function update(Request $request,$id)
    {
        $update = [
            'user_id' => auth()->id(),
            'title' => $request->title,
            'place' => $request->place,
            'date' => $request->date,
            'detail' => $request->detail
        ];
        Ivent::where('id', $id)->save($update);
        return back()->with('success', 'イベントの編集を完了しました');
    }
    public function destroy(Request $request,$id)
    {
    }
}
