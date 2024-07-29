@extends('layouts.app-master')

@section('content')

<h2>မြို့ ပြင်ရန်</h2> <br>

@if ($errors->any())
   <div>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

<form method="post" action="{{ route('townships.update', $township->id) }}">
   @csrf
   @method('PUT')
   <label for="name">အမည်</label>
   <input type="text" name="name" id="name" value="{{ $township->name }}" required>
   <br>
   <br>
   <button type="submit" class="btn btn-info">Update</button>
   <a href="{{ route('townships.index') }}" class="btn btn-secondary">Back</a>

</form>
@endsection