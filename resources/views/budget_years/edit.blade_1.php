@extends('layouts.app-master')

@section('content')

<h2>Budget Year ပြင်ရန်</h2> <br>

@if ($errors->any())
   <div>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

<form method="post" action="{{ route('budget_years.update', $budget_year->id) }}">
   @csrf
   @method('PUT')
   <label for="name">အမည်</label>
   <input type="text" name="name" id="name" value="{{ $budget_year->name }}" required>
   <br> <br>
   
   <button type="submit" class="btn btn-info">Update</button>
   <a href="{{ route('budget_years.index') }}" class="btn btn-secondary">Back</a>

</form>
@endsection



