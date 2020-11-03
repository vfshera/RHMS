@extends('layouts.auth')


@section('content')
<div class="project-container">
    <div class="project">
        <div class="side left-side">
            <div class="project-img">
                <img src="/storage/projects/images/{{ $project->image }}" alt="{{ $project->title }}">
            </div>
            <p class="project-info">
                <span class="title">{{ $project->title }}</span>
                <span class="location">{{ $project->location }}</span>
            </p>
            <div class="rating">
                <div class="value">
                    <div>0.0</div>
                    <div>Rating</div>
                </div>
               <div class="stars">
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star"></span>
                   <span class="fa fa-star"></span>
               </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
{{--                end modal--}}
            </div>
        </div>
        <div class="side right-side mt-5">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="">Engineer</label>
                        <p class="col-md-12 detail">
                               {{$project->engineer->name }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <label for="">Contractor</label>
                        <p class="col-md-12 detail">
                          {{ $project->contractor->name }}</option>

                        </p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <span>Starting Date</span>
                        <p class="col-md-12 detail">{{ $project->starting_date ?? '***' }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <span>Project Span</span>
                        <p class="col-md-12 detail">
                            {{ $project->project_span ?? '***'}}
                        </p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <span>Date Finished</span>
                        <p class="col-md-12 detail">
                            {{ $project->date_finished ?? '***' }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <span>Progress</span>
                        <p class="col-md-12 detail">
                                @if($project->progress == 1)
                                    COMPLETE
                                @else
                                   PENDING
                                @endif

                        </p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <span>Project Title</span>
                        <p class="col-md-12 detail">
                           {{ $project->title ?? '***' }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <span>Project Location</span>
                        <p class="col-md-12 detail">
                           {{ $project->location ?? '***'}}
                        </p>
                    </div>
                </div>

        </div>
    </div>

</div>


@endsection
