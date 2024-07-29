@extends('layouts.app-master')

@section('content')

<h2>Edit Department</h2> <br>

@if ($errors->any())
   <div>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

<form method="post" action="{{ route('departments.update', $department->id) }}">
   @csrf
   @method('PUT')
   <label for="name">Name:</label>
   <input type="text" name="name" id="name" value="{{ $department->name }}" required>
   <br>
   <br>
   <button type="submit" class="btn btn-info">Update</button>
   <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>

</form>
@endsection
