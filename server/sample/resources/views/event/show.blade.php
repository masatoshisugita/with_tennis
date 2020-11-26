@extends('layouts.app')

@section('content')

<h1 class="text-center">詳細画面</h1>

<div class="container">
  <div class="row text-center">
      <table class="table">     
        <tbody>
          <tr>
            <td>ユーザーの名前</td>
            <td>{{ $event->user->name }}</td>
          </tr>
          <tr>
            <td>イベントID</td>
            <td>{{ $event->id }}</td>
          </tr>
          <tr>
            <td>タイトル</td>
            <td>{{ $event->title}}</td>
          </tr>
          <tr>
            <td>場所</td>
            <td>{{ $event->place }}</td>
          </tr>
          <tr>
            <td>日時</td>
            <td>{{ $event->date }}</td>
          </tr>
          <tr>
            <td>詳細</td>
            <td>{{ $event->detail }}</td>
          </tr>
        </tbody>
      </table>
      <div class="row">
        @if(Auth::user()->id === $event->user_id)
        <p><a href="{{ route('event.edit',$event->id)}}" class="btn btn-primary mb-2">編集</a></p>
        <form action="{{ route('event.destroy', $event->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <input type="submit" name="" value="削除" class="btn btn-danger">
        </form>
        @endif
      </div>
      
      @if ($message = Session::get('success'))
        <div class="alert alert-success text-center" role="alert">{{ $message }}</div>
      @endif
      @if ($message = Session::get('danger'))
        <div class="alert alert-danger text-center" role="alert">{{ $message }}</div>
      @endif
      
      @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
        </div>
      @endif
      <div class="row text-center">
        <form method="POST" action="/events/{{ $event->id }}/comments">
          @csrf
          <label for="user_id"></label>
          <input type="hidden" name="user_id" value="user_id">
          <label for="event_id"></label>
          <input type="hidden" name="event_id" value="event_id">
          <p><label for="content" class="block">コメント</label></p>
          <p><textarea name="content" id="" cols="100" rows="3"></textarea></p>
          <button type="submit" class="btn btn-success text-center">コメントする</button>
          <hr>
        </form>
      </div>

      <div class="row">
        @foreach ($comments as $comment)
          <h4>名前：{{ $comment->event->user->name }}</h4>
          <h4>内容：{{ $comment->content }}</h4>
          @if (Auth::user()->id == $comment->user_id)
            <form method="POST" action="/events/{{ $event->id }}/comments/{{ $comment->id }}">
              @csrf
              @method('DELETE')
              <input type="submit" name="" value="削除" class="btn btn-danger">
            </form>
          @endif
          <hr>      
        @endforeach
      </div>
  </div>
</div>

<div id="map" style="height:500px; width:1000px; margin: 0 auto;"></div>
@endsection

<script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDPWOBSYswyNyMPG49fGx-b4phi1VLmIYs&callback=initMap" async defer></script>
<script>
  var map;
  var marker;
  var geocoder;
  function initMap() {
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({
    'address': '{{ $event->place }}' //住所
    }, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
      map = new google.maps.Map(document.getElementById('map'), {
        center: results[0].geometry.location,
        zoom: 17 //ズーム
     });
     marker = new google.maps.Marker({
    position: results[0].geometry.location,
    map: map
    });
    infoWindow = new google.maps.InfoWindow({
    content: '<h4>{{ $event->place }}</h4>'
    });
    marker.addListener('click', function() {
      infoWindow.open(map, marker);
    });
    } else {
      alert(status);
    }
  });
}
</script>
