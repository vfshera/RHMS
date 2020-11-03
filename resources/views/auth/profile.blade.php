@extends('layouts.auth')


@section('content')

  <div class="profilebox">
      <div class="myinfo">
         <div class="img-side">
             <img class="@if($my->image != 'no-profile.png') circle-profile @endif" src="/storage/profiles/{{ $my->image }}" alt="">
             <div class="change-profile">
                 <label for="">Change Profile Picture</label>
                 <form class="proform" action="/change-profile" method="POST" enctype="multipart/form-data">
                     <input type="file" name="profile_pic" >
                     @csrf
                     <button type="submit" class="rhms-upload-btn">Upload </button>
                 </form>
             </div>
         </div>
            <div class="my-data">
                <h1>{{ $my->name }}</h1>
                <h3> {{ $my->email }}</h3>
                <h3 class="acc-type">
                    @if(Auth::user()->access == 0)
                        ADMIN
                    @elseif(Auth::user()->access == 1)
                        ENGINEER
                    @elseif(Auth::user()->access == 2)
                        CONTRACTOR
                    @elseif(Auth::user()->access == 3)

                    @endif
                </h3>
            </div>
      </div>
      <div class="actions"></div>
  </div>
@endsection
