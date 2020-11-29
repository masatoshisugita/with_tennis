@extends('layouts.app')

@section('content')
<h1 class="text-center">投稿一覧画面</h1>
 
@if ($message = Session::get('success'))
  <div class="alert alert-success text-center" role="alert">{{ $message }}</div>
@endif
@if ($message = Session::get('danger'))
  <div class="alert alert-danger text-center" role="alert">{{ $message }}</div>
@endif

<div class="container">
  <div class="row">
    <form action="{{ route('event.index') }}" method="post">  
      {{ csrf_field()}}  
      {{method_field('get')}}
      <input type="search" name="search" placeholder="イベント名を入力してください">
      <input type="submit" value="検索">
    </form>
  </div>
</div>

<div class="container">
  <div class="row">
    <table class="table col-md-10">
      <tr>
          <th>イベント名</th>
          <th>場所</th>
          <th>日時</th>
          <th>詳細</th>
      </tr>
      @foreach ($events as $event)
      <tr>
          <td>{{ $event->title }}</td>
          <th>{{ $event->place }}</th>
          <th>{{ $event->date }}</th>
          <th><a href="{{ route('event.show',$event->id)}}" class="btn btn-success">詳細</a></th>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection