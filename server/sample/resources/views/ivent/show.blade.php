@extends('layouts.app')

@section('content')

<h1 class="text-center">詳細画面</h1>

<div class="container">
  <div class="row text-center">
      <table class="table">     
        <tbody>
          <tr>
            <td>ユーザーの名前</td>
            <td>{{ $ivent->user->name }}</td>
          </tr>
          <tr>
            <td>イベントID</td>
            <td>{{ $ivent->id }}</td>
          </tr>
          <tr>
            <td>タイトル</td>
            <td>{{ $ivent->title}}</td>
          </tr>
          <tr>
            <td>場所</td>
            <td>{{ $ivent->place }}</td>
          </tr>
          <tr>
            <td>日時</td>
            <td>{{ $ivent->date }}</td>
          </tr>
          <tr>
            <td>詳細</td>
            <td>{{ $ivent->detail }}</td>
          </tr>
        </tbody>
      </table>
      <div class="row">
        @if(Auth::user()->id === $ivent->user_id)
        <p><a href="{{ route('ivent.edit',$ivent->id)}}" class="btn btn-primary mb-2">編集</a></p>
        <form action="{{ route('ivent.destroy', $ivent->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <input type="submit" name="" value="削除" class="btn btn-danger">
        </form>
        @endif
      </div>

      <div class="row text-center">
      <form method="POST" action="/ivents/{{ $ivent->id }}/comments">
          @csrf
          <label for="user_id"></label>
          <input type="hidden" name="user_id" value="user_id">
          <label for="ivent_id"></label>
          <input type="hidden" name="ivent_id" value="ivent_id">
          <label for="content" class="block">コメント</label>
          <textarea name="content" id="" cols="100" rows="8"></textarea>
          <button type="submit" class="btn btn-success">コメントする</button>
        </form>
      </div>

      {{-- <div>{{ $ivent->comments->content }}</div> --}}

      
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
    'address': '{{ $ivent->place }}' //住所
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
    content: '<h4>{{ $ivent->place }}</h4>'
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
