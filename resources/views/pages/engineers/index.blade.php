@extends('layouts.auth')


@section('content')
    <!-- Contractors -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Engineers</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($engineers as $key => $engineer)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="/storage/profiles/{{ $engineer->image }}" alt=""></a>
                                            </div>
                                        </td>
                                        <td>  <span class="name">{{ $engineer->name }}</span> </td>
                                        <td> <span class="product">{{ $engineer->email }}</span> </td>

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
