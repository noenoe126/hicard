@extends('layouts.app-master')

@section('content')
    <div class="container">
        <h2>ဘီးအရေအတွက် အသစ်ထည့်ရန်</h2>

        
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('wheels.store') }}">
            
            @csrf

            <div class="form-group">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="name">အမျိုးအမည်</label>
                    <input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
                </div>
            </div>

            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ route('wheels.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
     
@endsection