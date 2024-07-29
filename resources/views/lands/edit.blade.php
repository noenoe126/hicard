@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="text-center">
        <h2>Edit Land</h2>
    </div>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{ route('lands.update', $land->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="name"><strong>Name:</strong></label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $land->name }}" required>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="address"><strong>Address:</strong></label>
                <input type="text" class="form-control" name="address" id="address" value="{{ $land->address }}" required>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="photo"><strong>Photo:</strong></label>
                <div class="mb-2">
                    @if ($land->photo)
                    <img src="{{ asset('uploads/land_photos/' . $land->photo) }}" alt="Photo" width="50">
                    @else
                    No Photo Available
                    @endif
                </div>
                <input type="file" class="form-control" name="photo" id="photo">
                
            </div>
            <div class="col-sm-6 mb-3">
                <label for="area"><strong>Area:</strong></label>
                <input type="text" class="form-control" name="area" id="area" value="{{ $land->area }}" required>
            </div>
            <div class="col-sm-6">
                <!-- <label><strong>Owner:</strong></label>
                <div class="form-control">
                    <input type="radio" id="government_land" name="owner" value="government_land" {{ $land->owner == 'government_land' ? 'checked' : '' }}>
                    <label for="government_land"> Government Land</label>
                    <input type="radio" id="department_land" name="owner" value="department_land" {{ $land->owner == 'department_land' ? 'checked' : '' }}>
                    <label for="department_land"> Department Land</label>
                </div> -->
                <div class="col-sm-6 mb-3">
                <label><strong>Owner:</strong></label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="government_land" name="owner" value="government_land" {{ $land->owner == 'government_land' ? 'checked' : '' }}>
                    <label class="form-check-label" for="government_land">Government Land</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="department_land" name="owner" value="department_land" {{ $land->owner == 'department_land' ? 'checked' : '' }}>
                    <label class="form-check-label" for="department_land"> Department Land</label>
                </div>
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Update</button>
        <a href="{{ route('lands.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
