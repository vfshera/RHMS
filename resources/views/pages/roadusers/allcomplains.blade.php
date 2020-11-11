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
                                    <th class="avatar"></th>
                                    <th class="avatar">Caption</th>
                                    <th>Location</th>
                                    <th>Sender</th>
                                    <th>Received</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($complains as $key => $complain)
                                    <tr  >

                                            <td class="serial">{{ $key + 1 }}</td>
                                             <td class="serial {{$key + 1}}-cmp" onclick="showComplain({{ json_encode($complain) }})" onmouseenter="toolTip(true,{{$key + 1}})" onmouseleave="toolTip(false,{{$key + 1}})" data-toggle="tooltip" data-placement="top" title="Click To View Image"><i class="fa fa-picture-o" id="icon"></i></td>
                                            <td>

                                                    <span class="name">{{ $complain->caption }}</span>

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



    <div class="modal fade" id="complain-modal" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="complainModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                <img id="modal-img" src="" alt="">
            </div>
        </div>
    </div>

@endsection
@section('extra-scripts')
    <script>

        function toolTip(type,value) {
            let cls = value+"-cmp";

          if(type){
              $(cls).tooltip('show')
          }else{
              $(cls).tooltip('hide')
          }
        }


        function showComplain(complain) {
            console.log(complain);

            $('#complain-modal').modal('show');
            let folder = "/storage/complains/";
            document.querySelector('#modal-img').src = "/storage/complains/"+complain.image;

            setTimeout(closeModal,5000);

        }


        function closeModal() {
            $('#complain-modal').modal('hide');
        }
    </script>
@endsection
