@extends('layouts.auth')


@section('content')


    <div class="container-contact100 ">

        <form class="contact100-form validate-form" method="POST" action="/complains" enctype="multipart/form-data">
            @csrf
            <span class="contact100-form-title">
					Complains
            </span>

            <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Caption is required">
                <span class="label-input100">Caption</span>
                <input class="input100" type="text" name="caption" placeholder="Enter project title">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Choose  a valid location">
                <span class="label-input100">Location</span>
                <select name="location" id="" class="form-control" required>
                    @foreach(counties() as $county)
                        <option value="{{ $county['name'] }}"> {{ $county['name'] }} </option>
                    @endforeach
                </select>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Image is required">
                    <span class="label-input100" id="material-file">Add  Image
                    </span>
                <input class="input100" type="file" name="image" id="material-file-input">

            </div>

            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
						<span>
							POST
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                </button>
            </div>
        </form>



    </div>


@endsection
