<!-- resources/views/home/show.blade.php -->
@extends('layouts.app-master')

@section('content')

    <h2>Profile</h2> <br>
    <div class="row">
        <div class="col-sm-4">
            <h5><strong>Name:</strong> {{ Auth::user()->fullname }}</h5> <!-- Use Auth::user()->fullname directly -->
            <h5><strong>Username:</strong> {{ Auth::user()->username }}</h5> <!-- Use Auth::user()->username directly -->
            <h5><strong>Email:</strong> {{ Auth::user()->email }}</h5> <!-- Use Auth::user()->email directly -->
            
        </div>
    </div>               
                
@endsection
