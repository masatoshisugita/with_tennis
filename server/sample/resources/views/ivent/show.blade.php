@extends('layouts.app')

@section('content')

<h1 class="text-center">詳細画面</h1>

<div class="container">
  <div class="row text-center">
      <table class="table">     
        <tbody>
          <tr>
            <td>イベントID</td>
            <td>{{ $ivent->id }}</td>
          </tr>
          <tr>
            <td>タイトル</td>
            <td>{{ $ivent->title}}</td>
          </tr>
          <tr>
            <td>場所</td>
            <td>{{ $ivent->place }}</td>
          </tr>
          <tr>
            <td>日時</td>
            <td>{{ $ivent->date }}</td>
          </tr>
          <tr>
            <td>詳細</td>
            <td>{{ $ivent->detail }}</td>
          </tr>
        </tbody>
      </table>
      <div class="row">
        <p><a href="{{ route('ivent.edit',$ivent->id)}}" class="btn btn-primary mb-2">編集</a></p>
        <form action="{{ route('ivent.destroy', $ivent->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <input type="submit" name="" value="削除" class="btn btn-danger">
        </form>
      </div>
      
  </div>
</div>
@endsection