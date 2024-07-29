@extends('layouts.auth-master')

@section('content')
<div class="login-box" style="width:360px; margin:auto"> 
    <div class="card"> 
        <div class="card-body login-card-body">
            <div class="row text-center">
                <div class="col">
                    <div>
                        <p>Change Your Password</p>
                        <form method="POST" action="{{ route('change.password.post') }}" class="user">
                            @csrf
                            <div class="form-group">
                                <!-- <label for="current_password">Current Password</label> -->
                                <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password" required>
                            </div>
                            <div class="form-group">
                                <!-- <label for="new_password">New Password</label> -->
                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <!-- s -->
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Confirm New Password" required>
                            </div>
                            <button type="submit" class="w-100 btn btn-lg btn-primary">Change</button>
                        </form>
                        @include('auth.partials.copy')
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>
@endsection
