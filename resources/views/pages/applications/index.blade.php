@extends('layouts.auth')


@section('content')
    <!-- Contractors -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Applications</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Project</th>
                                    <th>Position</th>
                                    <th>Name</th>
                                    <th>ACTION </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applications as $key => $application)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>

                                        <td>  <span class="name">{{ $application->project->title }}</span> </td>
                                        <td> <span class="product">{{ $application->type }}</span> </td>
                                        <td> <span class="name">{{ $application->user->name }}</span> </td>
                                        <td> <span class="product">
                                        @if( $application->project->engineer_id !== '' &&  $application->user->access == 1)
                                                    @if( $application->project->progress == '1' )
                                                              <span class="name">CLOSED</span>
                                                        @elseif( $application->project->progress == '0' && $application->project->engineer_id != $application->user->id)
                                                            <span style="cursor: pointer"  class="badge badge-pending"   onclick="event.preventDefault();
                                                                 document.getElementById('toggle-status').submit();">ASSIGN</span>
                                                            <form  action="/assign" method="POST" id="toggle-status">
                                                                @csrf
                                                                <input type="text" value="{{ $application->project->id }}" hidden name="project_id">
                                                                <input type="text" value="{{ $application->user->id }}" hidden name="user_id">
                                                                <input type="text" value="{{ $application->user->access }}" hidden name="access">
                                                            </form>
                                                         @elseif( $application->project->progress == '0' && $application->project->engineer_id == $application->user->id)

                                                            <span class="badge badge-complete" >ASSIGNED</span>
                                                   @endif
                                        @elseif( $application->project->contractor_id !== '' &&  $application->user->access == 2)
                                                    @if( $application->project->progress == '1' )
                                                        <span class="name">CLOSED</span>
                                                    @elseif( $application->project->progress == '0' && $application->project->contractor_id != $application->user->id)
                                                        <span style="cursor: pointer" class="badge badge-pending"   onclick="event.preventDefault();
                                                         document.getElementById('toggle-status').submit();">ASSIGN</span>
                                                        <form  action="/assign" method="POST" id="toggle-status">
                                                            @csrf
                                                            <input type="text" value="{{ $application->project->id }}" hidden name="project_id">
                                                            <input type="text" value="{{ $application->user->id }}" hidden name="user_id">
                                                            <input type="text" value="{{ $application->user->access }}" hidden name="access">
                                                        </form>
                                                    @elseif( $application->project->progress == '0' && $application->project->contractor_id == $application->user->id)
                                                        <span class="badge badge-pending" >ASSIGNED</span>
                                                    @endif

                                        @else

                                            <span class="badge badge-pending"   onclick="event.preventDefault();
                                                                 document.getElementById('toggle-status').submit();">ASSIGN</span>
                                            <form  action="/assign" method="POST" id="toggle-status">
                                                @csrf
                                                <input type="text" value="{{ $application->project->id }}" hidden name="project_id">
                                                <input type="text" value="{{ $application->user->id }}" hidden name="user_id">
                                            </form>
                                        @endif
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
    <!-- /.contractors -->
@endsection
