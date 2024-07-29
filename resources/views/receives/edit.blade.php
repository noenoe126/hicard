@extends('layouts.app-master')

@section('content')

<h2>receives ပြင်ရန်</h2> <br>

@if ($errors->any())
   <div>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

<form method="post" action="{{ route('receives.update', $receive->id) }}">
   @csrf
   @method('PUT')
   <label for="name">အမည်</label>
   <input type="text" name="name" id="name" value="{{ $receive->name }}" required>
   <br>
   <br>
   <button type="submit" class="btn btn-info">Update</button>
   <a href="{{ route('receives.index') }}" class="btn btn-secondary">Back</a>

</form>
@endsection
