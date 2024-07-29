@extends('layouts.app-master')

@section('content')

<h2>grades ပြင်ရန်</h2> <br>

@if ($errors->any())
   <div>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

<form method="post" action="{{ route('grades.update', $grade->id) }}">
   @csrf
   @method('PUT')
   <label for="name">အမည်</label>
   <input type="text" name="name" id="name" value="{{ $grade->name }}" required>
   <br>
   <br>
   <button type="submit" class="btn btn-info">Update</button>
   <a href="{{ route('grades.index') }}" class="btn btn-secondary">Back</a>

</form>
@endsection
