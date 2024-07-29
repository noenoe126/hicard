@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="text-center">
        <h2>Create Land</h2>
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

    <form method="post" action="{{ route('lands.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="name"><strong>Name:</strong></label>
                <input type="text" class="form-control" name="name" id="name" autocomplete="off" required>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="address"><strong>Address:</strong></label>
                <input type="text" class="form-control" name="address" id="address" autocomplete="off" required>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="photo"><strong>Photo:</strong></label>
                <input type="file" class="form-control" name="photo" id="photo" required accept="image/*">
            </div>
            <div class="col-sm-6 mb-3">
                <label for="area"><strong>Area:</strong></label>
                <input type="text" class="form-control" name="area" id="area" autocomplete="off" required>
            </div>
            <div class="col-sm-6">
                <label><strong>Owner:</strong></label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="government_land" name="owner" value="government_land" checked>
                    <label class="form-check-label" for="government_land">Government Land</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="department_land" name="owner" value="department_land">
                    <label class="form-check-label" for="department_land">Department Land</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
        <a href="{{ route('lands.index') }}" class="btn btn-secondary">Back</a>
    </form>
    <hr>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="uscdatatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Address</th>
                            <th>Owner</th>
                            <th>Area</th>
                            <th>Photo</th>
                            <th width="25%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($lands); $i++)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $lands[$i]->address }}</td>
                            <td>{{ $lands[$i]->owner }}</td>
                            <td>{{ $lands[$i]->area }}</td>
                            <td>
                                @if ($lands[$i]->photo)
                                <img src="{{ asset('uploads/land_photos/' . $lands[$i]->photo) }}" alt="Land Photo" width="50">
                                @else
                                No Photo Available
                                @endif
                            </td>
                            <td>
                                            <a href="{{ route('lands.show', $lands[$i]->id) }}" class="btn btn-info">View</a>
                                             <a href="{{ route('lands.edit', $lands[$i]->id) }}" class="btn btn-warning">Edit</a>
                                            <form method="post" action="{{ route('lands.destroy', $lands[$i]->id) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete?');">
                                            
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>  
                                            </form>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
