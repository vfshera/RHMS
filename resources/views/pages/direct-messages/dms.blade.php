@extends('layouts.auth')


@section('content')
    <!-- Contractors -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Direct Messages </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Sender</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $key => $msg)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>

                                        <td>  <span class="name">{{ $msg->name }}</span> </td>
                                        <td>  <span class="name">{{ $msg->phone }}</span> </td>
                                        <td>  <span class="name">{{ $msg->email }}</span> </td>
                                        <td>  <span class="name">{{ $msg->message }}</span> </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->

                    </div>
                </div> <!-- /.card -->
                {{ $messages->links() }}
            </div>  <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /.contractors -->
@endsection

