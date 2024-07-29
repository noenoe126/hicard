<!-- resources/views/cars/show.blade.php -->
@extends('layouts.app-master')

@section('content')

    <h2>Staff Overview</h2>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Name:</strong> {{ $staff->name }}</p> 
            <p><strong>NRC Number:</strong> {{ $staff->nrc_no }}</p>
            
        </div>
        <div class="col-sm-4">
        <p><strong>Department:</strong> {{ $deptName}}</p> 
            <p><strong>Position:</strong> {{ $positionName}}</p>
            
            <p><strong>Status:</strong> {{ $staff->status == 1 ? 'Active' : 'Inactive' }}</p>
        </div>
        
    </div>                
    

   
   
@endsection
