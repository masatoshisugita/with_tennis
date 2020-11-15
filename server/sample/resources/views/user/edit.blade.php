@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
  <h3 class="text-center">{{ $message }}</h3>
@endif

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <h1 class="card-header text-center">ユーザー編集画面</h1>

              <div class="card-body mt-5">
                  <form method="POST" action="{{ route('user.update',$user->id)}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group text-center">
                          <label for="name" class="">名前</label>
                          <div class="">
                              <input id="name" type="text" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group text-center">
                          <label for="email" class="">メールアドレス</label>
                          <div class="">
                              <input id="email" type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group text-center">
                          <label for="password" class="">パスワード</label>
                          <div class="">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                     
                      <div class="form-group text-center">
                          <label for="password-confirm" class="">パスワード（確認用）</label>
                          <div class="">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          </div>
                      </div>
                      
                      <div class="form-group text-center">
                          <div class="">
                              <button type="submit" class="btn btn-primary">
                                  編集する
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection