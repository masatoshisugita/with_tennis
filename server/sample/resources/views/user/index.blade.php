@extends('layouts.app')

@section('content')
<h1>一覧画面</h1>
<p><a href="{{ route('user.create') }}">新規追加</a></p>
 
@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif
 
<table border="1">
    <tr>
        <th>title</th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <th><a href="{{ route('user.show',$user->id)}}">詳細</a></th>
        <th><a href="{{ route('user.edit',$user->id)}}">編集</a></th>
        <th>
            <form action="{{ route('user.destroy', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="" value="削除">
            </form>
        </th>
    </tr>
    @endforeach
</table>
@endsection