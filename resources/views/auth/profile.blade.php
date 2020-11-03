@extends('layouts.auth')


@section('content')

  <div class="profilebox">
      <div class="myinfo">
         <div class="img-side">
             <img class="@if($my->image != 'no-profile.png') circle-profile @endif" src="/storage/profiles/{{ $my->image }}" alt="">
             <div class="change-profile">
                 <label for="">Change Profile Picture</label>
                 <input type="file" name="profile" >
                 <butto class="rhms-upload-btn">Upload </butto>
             </div>
         </div>
            <div class="my-data">
                <h1>{{ $my->name }}</h1>
                <h3> {{ $my->email }}</h3>
                <h3 class="acc-type"> ENGINEER</h3>
            </div>
      </div>
      <div class="actions"></div>
  </div>
@endsection
