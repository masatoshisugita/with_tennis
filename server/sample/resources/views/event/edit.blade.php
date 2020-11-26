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
                  <form method="POST" action="{{ route('event.update',$event->id)}}">
                      @csrf
                      @method('PUT')
                      <label for="user_id"></label>
                      <input type="hidden" name="user_id" value="{{ $event->user_id }}">

                      <div class="form-group text-center">
                        <label for="title" class="">タイトル</label>    
                        <input id="title" type="text" value="{{ $event->title }}" class="form-control @error('title') is-invalid @enderror"
                         name="title" value="{{ old('title') }}" placeholder="例)　初心者歓迎！あと4人でダブルスしませんか？" required autocomplete="title" autofocus>
                      </div>

                      <div class="form-group text-center">
                        <label for="place" class="">場所</label>    
                        <input id="place" type="text" value="{{ $event->place }}" class="form-control @error('place') is-invalid @enderror"
                         name="place" value="{{ old('place') }}" placeholder="正式な名称、または住所を書いてください" required autocomplete="place">    
                      </div>

                      <div class="form-group text-center">
                        <label for="date" class="">日時<span class="text-danger"> (注)2020-11-10 12:00の形で入力してください</span></label>
                        <input id="date" type="datetime" value="{{ $event->date }}" class="form-control @error('date') is-invalid @enderror"
                         name="date" value="{{ old('date') }}"　placeholder="次のフォーマットで書いてください)　2020-11-10 11:00" required autocomplete="date"> 
                      </div>
                     
                      <div class="form-group text-center">
                          <label for="detail" class="">詳細</label>
                          <input id="detail" type="text" value="{{ $event->detail }}" class="form-control"
                           name="detail" value="{{ old('detail') }}" placeholder="例）初心者でも歓迎です。すでに2人決まっているので、後二人入れてダブルスをしたいです！料金は..." required autocomplete="detail">
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