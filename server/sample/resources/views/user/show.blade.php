@extends('layouts.app')

@section('content')

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
          <input type="submit" name="" value="削除" class="btn btn-danger">
        </form>
      </div>
      
  </div>
</div>
@endsection