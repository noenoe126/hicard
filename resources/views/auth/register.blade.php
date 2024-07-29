@extends('layouts.auth-master')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
              <div class="col-lg-5 d-none d-lg-block"> 
              <img src="{{ asset('img/ousc.jpg') }}" alt="" width="100%" style="justify-content:center; align:center; margin-top: 100px;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
            </div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"></h1>
                    </div>
                    <form class="user" method="post" action="#">
                        @csrf
                        <div class="form-group row">
                        <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                               <input type="text" class="form-control form-control-user" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                                @error('name')
                                <span class="text-danger text-left">{{ $message }}</span>
                                @enderror 
                            </div> -->
                            <div class="col-sm-6 mb-3 mb-sm-0">
                               <input type="text" class="form-control form-control-user" name="fullname" value="{{ old('fullname') }}" placeholder="Name" required autofocus>
                                @error('fullname')
                                <span class="text-danger text-left">{{ $message }}</span>
                                @enderror 
                            </div> 
                            <div class="col-sm-6">
                                
                            <input type="text" class="form-control form-control-user" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
                                @error('username')
                                <span class="text-danger text-left">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                @error('email')
                                <span class="text-danger text-left">{{ $message }}</span>
                                @enderror 
                            </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                                @error('password')
                                <span class="text-danger text-left">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-user btn-block" type="submit">Register</button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="login.html">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('auth.partials.copy')
@endsection
