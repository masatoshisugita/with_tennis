@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success text-center" role="alert">{{ $message }}</div>
@endif

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <h1 class="card-header text-center">イベント編集画面</h1>
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
                  <form method="POST" action="{{ route('ivent.update',$ivent->id)}}">
                      @csrf
                      @method('PUT')
                      <label for="user_id"></label>
                      <input type="hidden" name="user_id" value="{{ $ivent->user_id }}">

                      <div class="form-group text-center">
                        <label for="title" class="">タイトル</label>    
                        <input id="title" type="text" value="{{ $ivent->title }}" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                      </div>

                      <div class="form-group text-center">
                        <label for="place" class="">場所</label>    
                        <input id="place" type="text" value="{{ $ivent->place }}" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ old('place') }}" required autocomplete="place">    
                      </div>

                      <div class="form-group text-center">
                        <label for="date" class="">日時</label>
                        <input id="date" type="datetime" value="{{ $ivent->date }}" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}"　required autocomplete="date"> 
                      </div>
                     
                      <div class="form-group text-center">
                          <label for="detail" class="">詳細</label>
                          <input id="detail" type="text" value="{{ $ivent->detail }}" class="form-control" name="detail" value="{{ old('detail') }}" required autocomplete="detail">
                      </div>

                      <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                          編集する
                        </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection