@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
  <h3 class="text-center">{{ $message }}</h3>
@endif
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <h1 class="card-header text-center">イベント編集画面</h1>
              <div class="card-body mt-5">
                  <form method="POST" action="{{ route('ivent.update',$ivent->id)}}">
                      @csrf
                      @method('PUT')
                      <label for="user_id"></label>
                      <input type="hidden" value="{{ $ivent-> user_id }}">

                      <div class="form-group text-center">
                          <label for="title" class="">タイトル</label>
                          <div class="">
                              <input id="title" type="text" value="{{ $ivent->title }}" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                              @error('title')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group text-center">
                          <label for="place" class="">場所</label>
                          <div class="">
                              <input id="place" type="text" value="{{ $ivent->place }}" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ old('place') }}" required autocomplete="place">
                              @error('place')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group text-center">
                          <label for="date" class="">日時</label>
                          <div class="">
                              <input id="date" type="datetime" value="{{ $ivent->date }}" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}"　required autocomplete="date">
                              @error('date')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                     
                      <div class="form-group text-center">
                          <label for="detail" class="">詳細</label>
                          <div class="">
                          <input id="detail" type="text" value="{{ $ivent->detail }}" class="form-control" name="detail" value="{{ old('detail') }}" required autocomplete="detail">
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