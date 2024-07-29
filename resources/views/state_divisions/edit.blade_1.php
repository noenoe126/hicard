@extends('layouts.app-master')

@section('content')

<h2>ပြည်နယ်/တိုင်းဒေသကြီး ပြင်ရန်</h2> <br>

@if ($errors->any())
   <div>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

<form method="post" action="{{ route('state_divisions.update', $state_division->id) }}">
   @csrf
   @method('PUT')
   <label for="name">အမည်</label>
   <input type="text" name="name" id="name" value="{{ $state_division->name }}" required>
   <br>
   <br>
   <button type="submit" class="btn btn-info">Update</button>
   <a href="{{ route('state_divisions.index') }}" class="btn btn-secondary">Back</a>

</form>
@endsection
