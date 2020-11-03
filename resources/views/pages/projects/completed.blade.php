@extends('layouts.auth')


@section('content')

    <!-- Orders -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Projects </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Image</th>
                                    <th>Title</th>
                                    @if(Auth::user()->access == 1)
                                        <th>Contractor</th>
                                    @elseif(Auth::user()->access == 2)
                                        <th>Engineer</th>
                                    @endif
                                    <th>Starting</th>
                                    <th>Span</th>
                                    <th>Location</th>
                                    <th>Ending</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($applications as $key => $application)
                                    @if($application->project->progress == '1')
                                        <tr>
                                            <td class="serial">{{ $key + 1 }}</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <img class="rounded-circle" src="/storage/projects/images/{{ $application->project->image }}" alt="NO IMAGE">
                                                </div>
                                            </td>
                                            <td> {{ $application->project->title ?? '***' }} </td>
                                            @if(Auth::user()->access == 2)
                                                <td>  <span class="name">{{ $application->project->engineer->name ?? '***' }}</span> </td>
                                            @elseif(Auth::user()->access == 1)
                                                    <td> <span class="product">{{ $application->project->contractor->name ?? '***' }}</span> </td>
                                             @endif
                                            <td><span class="count">{{ $application->project->starting_date ?? '***' }}</span></td>
                                            <td><span class="count">{{ $application->project->project_span ?? '***'}}</span></td>
                                            <td><span class="count">{{ $application->project->location ?? '***' }}</span></td>
                                            <td><span class="count">{{ $application->project->date_finished ?? '***' }}</span></td>

                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /.orders -->
@endsection
