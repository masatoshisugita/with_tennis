@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success text-center" role="alert">{{ $message }}</div>
@endif
@if ($message = Session::get('danger'))
  <div class="alert alert-danger text-center" role="alert">{{ $message }}</div>
@endif
<h1 class="text-center">詳細画面</h1>

<div class="container">
  <div class="row text-center">
      <table class="table">     
        <tbody>
          <tr>
            <td>id</td>
            <td>{{ $user->id }}</td>
          </tr>
          <tr>
            <td>name</td>
            <td>{{ $user->name}}</td>
          </tr>
          <tr>
            <td>email</td>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <td>created_at</td>
            <td>{{ $user->created_at }}</td>
          </tr>
          <tr>
            <td>updated_at</td>
            <td>{{ $user->updated_at }}</td>
          </tr>
        </tbody>
      </table>
      <div class="row">
        <p><a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary mb-2">編集</a></p>
        <form action="{{ route('user.destroy', $user->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <input type="submit" value="削除" class="btn btn-danger" id="user_destroy">
        </form>
      </div>
      
  </div>
</div>
@endsection