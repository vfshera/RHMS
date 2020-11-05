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
                                    <th>Engineer</th>
                                    <th>Contractor</th>
                                    <th>Starting</th>
                                    <th>Span</th>
                                    <th>Location</th>
                                    <th>Ending</th>
                                    <th>Progress</th>
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
                                                    <td>  <span class="name">{{ $project->engineer->name ?? '***' }}</span> </td>
                                                    <td> <span class="product">{{ $project->contractor->name ?? '***' }}</span> </td>
                                                    <td><span class="count">{{ $project->starting_date ?? '***' }}</span></td>
                                                    <td><span class="count">{{ $project->project_span ?? '***'}}</span></td>
                                                    <td><span class="count">{{ $project->location ?? '***' }}</span></td>
                                                    <td><span class="count">{{ $project->date_finished ?? '***' }}</span></td>
                                                    <td>
                                                        <a href="/edit-{{ str_replace(' ','_', strtolower($project->title)) }}-{{ $project->id }}-{{ str_replace(' ','-', strtolower($project->location)) }}">
                                                              <span class="badge @if($project->status == 1) badge-complete @else badge-pending @endif">
                                                                    @if($project->progress == 1) Complete @else Pending @endif
                                                              </span>
                                                        </a>
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
    <!-- /.orders -->
@endsection
