@extends('layouts.beforeAuth')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-75 p-r-75 p-t-45 p-b-45">
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="/register-users" enctype="multipart/form-data">
                    @csrf
                    <span class="login100-form-title p-b-32">
						<a href="/"><i class="ti-arrow-left mr-5"></i></a>REGISTER
					</span>

                    <span class="txt1 p-b-11">
						Profile Image
					</span>
                        <input class="input100"  name="image"  type="file"  required autocomplete="image">

                    <span class="txt1 p-b-11">
						Name
					</span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Name is required">
                        <input class="input100"  name="name"  type="text" value="{{ old('name') }}" required autocomplete="name">
                        <span class="focus-input100"></span>
                    </div>

                    <span class="txt1 p-b-11">
						Email
					</span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Email is required">
                        <input class="input100"  name="email"  type="email" value="{{ old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
                    </div>

                    <span class="txt1 p-b-11">
						ACCOUNT TYPE
					</span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Type is required">
                        <select name="access" id="account_type">
                            <option value="1">ENGINEER</option>
                            <option value="2">CONSTRUCTOR</option>
                            <option value="3">NORMAL</option>
                        </select>
                        <span class="focus-input100"></span>
                    </div>

                    <span class="txt1 p-b-11">
						Password
					</span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
                        <input class="input100" type="password"  name="password" required autocomplete="password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

