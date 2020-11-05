@extends('layouts.auth')

@section('content')
    <div class="container ">
        <div class="project-nav m-t-120" >
            <li>
                <a href="/projects-view" class="@if (\Request::is('projects-view')) project-nav-active @endif mr-2">COMPLETED</a>
            </li>
            <li>
                <a href="/projects-pending" class="ml-2 @if (\Request::is('projects-pending')) project-nav-active @endif">PENDING</a>
            </li>
        </div>
        <div class="row " id="projects-listing">
            @foreach($showcases as $showcase)
                <div class="card mr-2"
                     style="width: 12rem;height: 16rem; background: url({{ '/storage/showcases/' . $showcase->after_img }}) no-repeat;background-size: cover; object-position: center;object-fit: cover">



                    <div  style="background: rgba(255,255,255,.7);position: absolute;bottom: 0;left: 0;right: 0;display: flex;justify-content: center;align-items: center">
                        <h5 class="card-title  ">{{ $showcase->caption }}</h5>
                    </div>

                </div>

            @endforeach
        </div>
    </div>
@endsection
