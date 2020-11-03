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
            <form action="/set-project" method="POST" enctype="multipart/form-data" class="project-form">
                @csrf
                <input type="text" name="project_id" hidden value="{{ $project->id }}">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="">Engineer</label>
                        <p class="col-md-12 detail">
                            <select name="engineer_id" id="engineer">
                                @if($project->engineer_id)
                                    <option value="{{ $project->engineer_id }}"  selected>{{$project->engineer->name }}</option>

                                    @foreach($engineers as $engineer)
                                        @if($engineer->name != $project->engineer->name)
                                            <option value="{{ $engineer->engineer->id }}"  >{{ $engineer->name }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value=""  selected>CHOOSE...</option>
                                    @foreach($engineers as $engineer)
                                        <option value="{{ $engineer->engineer->id }}"  >{{ $engineer->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <label for="">Contractor</label>
                        <p class="col-md-12 detail">
                            <select name="contractor_id" id="contractor">
                                @if($project->contractor_id)
                                    <option value="{{ $project->contractor_id }}"  selected>{{ $project->contractor->name }}</option>

                                    @foreach($contractors as $contractor)
                                        @if($contractor->name != $project->contractor->name)
                                            <option value="{{ $contractor->contractor->id }}"  >{{ $contractor->name }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value=""  selected>CHOOSE...</option>
                                    @foreach($contractors as $contractor)
                                        <option value="{{ $contractor->contractor->id }}" >{{ $contractor->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <span>Starting Date</span>
                        <p class="col-md-12 detail">
                            <input type="date" name="starting_date" value="{{ $project->starting_date ?? '' }}" placeholder="Enter Start Date">
                        </p>
                    </div>

                    <div class="col-md-6">
                        <span>Project Span</span>
                        <p class="col-md-12 detail">
                            <input type="text" name="project_span" value="{{ $project->project_span ?? ''}}" placeholder="Enter Project Span">
                        </p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <span>Date Finished</span>
                        <p class="col-md-12 detail">
                            <input type="date" name="date_finished" value="{{ $project->date_finished ?? '' }}" placeholder="Enter Date Finished">
                        </p>
                    </div>
                    <div class="col-md-6">
                        <span>Progress</span>
                        <p class="col-md-12 detail">
                            <select name="progress" id="progress">
                                @if($project->progress == 1)
                                    <option value="1"  selected>COMPLETE</option>
                                    <option value="0"  >PENDING</option>
                                @else
                                    <option value="1"  >COMPLETE</option>
                                    <option value="0"  selected>PENDING</option>
                                @endif
                            </select>
                        </p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <span>Project Title</span>
                        <p class="col-md-12 detail">
                            <input type="text" name="title" value="{{ $project->title ?? '' }}" placeholder="Enter Project title">
                        </p>
                    </div>

                    <div class="col-md-6">
                        <span>Project Location</span>
                        <p class="col-md-12 detail">
                            <input type="text" name="location" value="{{ $project->location ?? ''}}" placeholder="Enter Project title">
                        </p>
                    </div>
                </div>
                <button type="submit"  class="rhms-theme-btn">UPDATE</button>
            </form>
        </div>
    </div>
</div>
@endsection
