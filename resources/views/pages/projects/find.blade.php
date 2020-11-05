@extends('layouts.auth')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Find Projects</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Image</th>
                                    <th>Title</th>
                                    <th>Starting</th>
                                    <th>Span</th>
                                    <th>Location</th>
                                    <th>Ending</th>
                                    <th>Apply</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($projects as $key => $project)

                                    <tr>

                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <img class="rounded-circle" src="/storage/projects/images/{{ $project->image }}" alt="NO IMAGE">
                                            </div>
                                        </td>
                                        <td> {{ $project->title ?? '***' }} </td>
                                        <td><span class="count">{{ $project->starting_date ?? '***' }}</span></td>
                                        <td><span class="count">{{ $project->project_span ?? '***'}}</span></td>
                                        <td><span class="count">{{ $project->location ?? '***' }}</span></td>
                                        <td><span class="count">{{ $project->date_finished ?? '***' }}</span></td>
                                        <td>

                                                <form action="/apply-project" method="post">
                                                    @csrf
                                                    <input type="text" value="{{ $project->id }}" hidden name="project_id">
                                                    <input type="text" value="{{ strtolower($project->location) }}" hidden name="location">

                                                    <button type="submit" class=" @if(strtolower($project->location) == strtolower($location) ) apply-btn-success @else  apply-btn-danger @endif"><i class="fa  fa-arrow-right"></i></button>

                                                </form>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->
        </div>
    </div>
@endsection
