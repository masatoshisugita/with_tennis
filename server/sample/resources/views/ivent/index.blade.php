@extends('layouts.app')

@section('content')
<h1 class="text-center">投稿一覧画面</h1>
 
@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<div class="container">
  <div class="row">
    <table class="table col-md-10">
      <tr>
          <th>title</th>
          <th>詳細</th>
          <th>場所</th>
          <th>日時</th>
      </tr>
      @foreach ($ivents as $ivent)
      <tr>
          <td>{{ $ivent->title }}</td>
          <th><a href="{{ route('ivent.show',$ivent->id)}}" class="btn btn-success">詳細</a></th>
          <th>{{$ivent->place}}</th>
          <th>{{$ivent->date}}</th>
      </tr>
      @endforeach
    </table>
  </div>
</div>

@endsection