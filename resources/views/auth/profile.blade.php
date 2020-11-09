@extends('layouts.auth')


@section('content')

  <div class="profilebox">
      <div class="myinfo">
         <div class="img-side">
             <img class="@if($my->image != 'no-profile.png') circle-profile @endif" src="/storage/profiles/{{ $my->image }}" alt="">
             <div class="change-profile">
                 <label for="">Change Profile Picture</label>
                 <form class="proform" action="/change-profile" method="POST" enctype="multipart/form-data">
                     <input type="file" name="profile_pic"  required>
                     @csrf
                     <button type="submit" class="rhms-upload-btn">Upload </button>
                 </form>
             </div>
         </div>
            <div class="my-data">
                <h1>{{ $my->name }}</h1>
                <h3> {{ $my->email }}</h3>
                <h3 class="acc-type mb-5">
                    @if(Auth::user()->access == 0)
                        ADMIN
                    @elseif(Auth::user()->access == 1)
                        ENGINEER
                    @elseif(Auth::user()->access == 2)
                        CONTRACTOR
                    @elseif(Auth::user()->access == 3)

                    @endif
                </h3>
                @if(Auth::user()->access !== 0 && Auth::user()->access !== 3)

                    <h5 class="@if(Auth::user()->engineer->cv ?? Auth::user()->contractor->cv  ?? false) text-success @else text-danger @endif">
                        @if(Auth::user()->engineer->cv ?? Auth::user()->contractor->cv  ?? false) CV Verified @else Please Upload Your CV @endif
                    </h5>
                    <h5 class="@if(Auth::user()->engineer->location ?? Auth::user()->contractor->location  ?? false) text-success @else text-danger @endif">
                        @if(Auth::user()->engineer->location ?? Auth::user()->contractor->location  ?? false) {{ Auth::user()->engineer->location ?? Auth::user()->contractor->location }} @else Please Add Location To Apply For Jobs @endif
                    </h5>
                    <h5 class="@if(Auth::user()->engineer->qualification ?? Auth::user()->contractor->qualification  ?? false) text-success @else text-danger @endif">
                        @if(Auth::user()->engineer->qualification ?? Auth::user()->contractor->qualification  ?? false) Qualification Verified @else Please Upload Qulification Documents @endif
                    </h5>

                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#updateProfileInfo">
                        Complete Profile
                    </button>
                @endif

            </div>
      </div>
  </div>

  <div class="modal fade" id="updateProfileInfo" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="updateProfileInfoTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="updateProfileInfoTitle">Profile Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="/profile-update" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="">Location</label>
                          <select name="location" id="" class="form-control" required>
                              @foreach(counties() as $county)
                                  <option value="{{ $county['name'] }}"> {{ $county['name'] }} </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="">CV</label>
                          <input type="file" class="form-control" name="cv" required>
                      </div>
                      <div class="form-group">
                          <label for="">Qualification</label>
                          <input type="file" class="form-control" name="qualification" required>
                      </div>
                      <button type="submit" class="btn btn-primary">UPDATE</button>
                  </form>
              </div>

          </div>
      </div>
  </div>
@endsection
