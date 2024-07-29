@extends('layouts.auth-master')

@section('content')
    <div class="login-box" style="width:360px; margin:auto"> 
        <div class="card"> 
            <div class="card-body login-card-body">
                <div class="row text-center">
                    <div class="col">
                        <div >
                            <p class="login-box-msg">Welcome!</p>
                            <form method="post" action="{{ route('login.perform') }}" class="user">
                                <img class="mb-4" src="{{ asset('img/usclogo.png') }}" alt="" width="100%" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <h1 class="h3 mb-3 fw-normal">Login</h1>
                                @include('layouts.partials.messages')
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autocomplete="off">
                                    <!-- <label for="floatingName">Email or Username</label> -->
                                    @if ($errors->has('username'))
                                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" autocomplete="off" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                                    <!-- <label for="floatingPassword">Password</label> -->
                                    @if ($errors->has('password'))
                                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>  <br> <br> 
                                <!-- <a href="#">Register</a> -->
                                @include('auth.partials.copy')
                            </form>
                            
                        </div>
                    </div>
                </div>      
            </div>
        </div>
    </div>
    
@endsection

<!--<div class="login-box"> 
    <div class="card"> <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
    <form method="post" action="https://directory.koneloneshin.com/login">
        
        <input type="hidden" name="_token" value="2ZrJOwTu2MF6H1ZDOjb3iXB85IA89T81BjTm5uTH" />
        <img class="mb-4" src="https://directory.koneloneshin.com/images/usclogo.png" alt="" width="100%" >
        
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email or Username</label>
                    </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
                    </div>

        <div class="form-group mb-3">
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" value="1">
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

        
      
    </form>
</div>
</div>
</div> -->
