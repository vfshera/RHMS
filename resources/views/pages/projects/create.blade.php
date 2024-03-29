@extends('layouts.auth')


@section('content')




    <div class="container-contact100 ">

            <form class="contact100-form validate-form" method="POST" action="/projects" enctype="multipart/form-data">
                @csrf
				<span class="contact100-form-title">
					Create Project
				</span>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100">Title</span>
                    <input class="input100" type="text" name="title" placeholder="Enter project title">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Choose  a valid location">
                    <span class="label-input100">Location</span>
{{--                    <input class="input100" type="text" name="location" placeholder="Enter project location">--}}
                    <select name="location" id="" class="form-control" required>
                        @foreach(counties() as $county)
                            <option value="{{ $county['name'] }}"> {{ $county['name'] }} </option>
                        @endforeach
                    </select>
{{--                    <span class="focus-input100"></span>--}}
                </div>


                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Valid Date is required: 12/30/2020">
                    <span class="label-input100">Startin Date</span>
                    <input class="input100" type="date" name="start_date" >
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid Date is required: 12/30/2020">
                    <span class="label-input100">Project Span</span>
                    <input class="input100" type="text" name="project_span" placeholder="Enter project span">
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input" data-validate = "Image is required">
                    <span class="label-input100" id="material-file">Add Project Image
                    </span>
                    <input class="input100" type="file" name="image" id="material-file-input">

                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
						<span>
							CREATE
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                    </button>
                </div>
            </form>



    </div>


@endsection
