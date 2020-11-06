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
                    <div>{{ $avgRating }}</div>
                    <div>Rating</div>
                </div>
               <div class="stars">
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star"></span>
                   <span class="fa fa-star"></span>
               </div>
                @if($canRate == 0)
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RateModal">
                   RATE
                </button>

                <!-- Modal -->
                <div class="modal fade" id="RateModal" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="RateModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="RateModalLabel">Rate <span class="text-danger">* Only One Time Rating *</span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/rate" method="POST" >
                                    @csrf
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="rating" step="0.1" max="5" placeholder="Rate Between 1 - 5" required>
                                        <input type="number" name="project_id" value="{{ $project->id }}" hidden>
                                    </div>
                                    <button class="btn btn-primary">SUBMIT</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                @endif
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
@section('extra-scripts')

    <script>
        // document.addEventListener('DOMContentLoaded' , alert("Loaded"));
    </script>
@endsection
