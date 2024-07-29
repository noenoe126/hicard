@extends('layouts.app-master')

@section('content')

<h2>ပိုင်ဆိုင်မှုအမျိုးအစား ပြင်ရန်</h2>
<br>
@if ($errors->any())
   <div>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

<form method="post" action="{{ route('own_types.update', $own_type->id) }}">
   @csrf
   @method('PUT')
   <label for="name">အမျိုးအမည်</label>
   <input type="text" name="name" id="name" value="{{ $own_type->name }}" required>
   <br><br>
   
   <button type="submit" class="btn btn-info">Update</button>
   <a href="{{ route('own_types.index') }}" class="btn btn-secondary">Back</a>

</form>
@endsection
