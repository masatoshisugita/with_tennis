@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success text-center" role="alert">{{ $message }}</div>
@endif

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <h1 class="card-header text-center">イベント投稿画面</h1>
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
                  <form method="POST" action="{{ route('ivent.store') }}">
                      @csrf
                      <label for="user_id"></label>
                      <input type="hidden" name="user_id" value="user_id">

                      <div class="form-group text-center">
                        <label for="title">タイトル</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" 
                        placeholder="例）初心者歓迎！あと4人でダブルスしませんか？" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>                          
                      </div>

                      <div class="form-group text-center">
                        <label for="place">場所</label>                          
                        <input id="place" type="text" class="form-control @error('place') is-invalid @enderror" 
                        placeholder="正式な名称、または住所を書いてください" name="place" value="{{ old('place') }}" required autocomplete="place">                                                        
                      </div>

                      <div class="form-group text-center">
                        <label for="date">日時</label>                          
                        <input id="date" type="datetime" class="form-control @error('date') is-invalid @enderror" 
                        placeholder="次のフォーマットで書いてください)　2020/11/10 11:00:00" name="date" value="{{ old('date') }}" required autocomplete="date">                          
                      </div>
                     
                      <div class="form-group text-center">
                          <label for="detail">詳細</label>                          
                          <input id="detail" type="text" class="form-control @error('date') is-invalid @enderror" 
                          placeholder="例）初心者でも歓迎です。すでに2人決まっているので、後二人入れてダブルスをしたいです！料金は..." name="detail" value="{{ old('detail') }}" required autocomplete="detail">                          
                      </div>

                      <div class="form-group text-center">                          
                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>                         
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection