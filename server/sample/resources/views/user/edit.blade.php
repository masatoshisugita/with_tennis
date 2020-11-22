@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success text-center" role="alert">{{ $message }}</div>
@endif
@if ($message = Session::get('danger'))
  <div class="alert alert-danger text-center" role="alert">{{ $message }}</div>
@endif

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <h1 class="card-header text-center">ユーザー編集画面</h1>
              <div class="card-body mt-5">
                @if ($errors->any())
                <div class="alert alert-danger">
                 <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                  </ul>
                </div>
                @endif
                  <form method="POST" action="{{ route('user.update',$user->id)}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group text-center">
                        <label for="name">名前</label>
                        <input id="name" type="text" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      </div>

                      <div class="form-group text-center">
                        <label for="email">メールアドレス</label>
                        <input id="email" type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                      </div>

                      <div class="form-group text-center">
                        <label for="password">パスワード</label>                          
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      </div>
                     
                      <div class="form-group text-center">
                        <label for="password-confirm">パスワード（確認用）</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                      
                      <div class="form-group text-center">                         
                        <button type="submit" class="btn btn-primary">
                            編集する
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection