<!-- resources/views/cars/show.blade.php -->
@extends('layouts.app-master')
@section('content')
@php
use Carbon\Carbon;
@endphp
<h2>Car User Overview</h2>
   <br> 
<div class="row justify-content-between"> <!-- Use justify-content-between to align content to the right -->
    
    <div class="col-sm-3">
        <p><strong>User:</strong>{{ $staffName }}</p>
    </div> 
    
    <div class="col-sm-3">  
    <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($caruser->start_date)->format('d-m-Y') }}</p>
    <p><strong>End Date:</strong> {{ $caruser->end_date ? \Carbon\Carbon::parse($caruser->end_date)->format('d-m-Y') : '' }}</p>
</div>
</div>  

   
@endsection
