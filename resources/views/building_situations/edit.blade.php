@extends('layouts.app-master')

@section('content')

<h2>အခြေအနေ ပြင်ရန်</h2>
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

<form method="post" action="{{ route('building_situations.update', $building_situation->id) }}">
   @csrf
   @method('PUT')
   <label for="name">အမျိုးအမည်</label>
   <input type="text" name="name" id="name" value="{{ $building_situation->name }}" required>
   <br><br>
   
   <button type="submit" class="btn btn-info">Update</button>
   <a href="{{ route('building_situations.index') }}" class="btn btn-secondary">Back</a>

</form>
@endsection
