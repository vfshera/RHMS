@extends('layouts.auth')


@section('content')
    <!-- Contractors -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Complains </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Caption</th>
                                    <th>Location</th>
                                    <th>Sender</th>
                                    <th>Received</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($complains as $key => $complain)
                                    <tr>

                                            <td class="serial">{{ $key + 1 }}</td>
                                            <td>
{{--                                                <a href="/complain/{{ $complain->id }}/{{ $complain->caption }}">--}}
                                                <span class="name">{{ $complain->caption }}</span>
{{--                                                </a>--}}
                                            </td>

                                            <td>  <span class="name">{{ $complain->location }}</span> </td>
                                            <td>  <span class="name">{{ $complain->user->name }}</span> </td>
                                            <td>  <span class="name">{{ $complain->created_at }}</span> </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
                {{$complains->links()}}
            </div>  <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /.contractors -->
@endsection
