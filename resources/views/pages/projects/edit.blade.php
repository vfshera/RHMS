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
        </div>
        <div class="side right-side mt-5">
            <div class="row mb-5">
                <div class="col-md-6">
                    <label for="">Engineer</label>
                    <p class="col-md-12 detail">
                        {{ $project->engineer ?? '***' }}
                    </p>
                </div>
                <div class="col-md-6">
                    <label for="">Contractor</label>
                    <p class="col-md-12 detail">
                        {{ $project->contactor ?? '***' }}
                    </p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <span>Starting Date</span>
                    <p class="col-md-12 detail">
                        {{ $project->starting_date ?? '***' }}
                    </p>
                </div>

                <div class="col-md-6">
                     <span>Project Span</span>
                    <p class="col-md-12 detail">
                        {{ $project->project_span ?? '***'}}
                    </p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <span>Date Finished</span>
                    <p class="col-md-12 detail">
                        {{ $project->date_finished ?? '***' }}
                    </p>
                </div>
                <div class="col-md-6">
                     <span>Progress</span>
                    <p class="col-md-12 detail">
                        @if($project->progress == 1) Complete @else Pending @endif
                    </p>
                  </div>
            </div>
            <button type="submit">UPDATE</button>
        </div>
    </div>
</div>
@endsection
