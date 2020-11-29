
@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
  <div class="alert alert-danger text-center" role="alert">{{ $message }}</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h1 class="card-header text-center">ログイン画面</h1>

                <div class="card-body mt-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group text-center mt-3">
                            <label for="email">メールアドレス</label>
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <label for="password">パスワード</label>

                            <div class="">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        ログイン情報を保存しますか？
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    ログインする
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        パスワードをお忘れですか
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
