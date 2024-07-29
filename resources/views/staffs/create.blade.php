@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="text-center">
        <h2>Create Staff</h2>
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

    <form method="post" action="{{ route('staffs.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="name"><strong>Name:</strong></label>
                <input type="text" class="form-control" name="name" id="name" autocomplete="off" required>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="dept"><strong>Department:</strong></label>
                        <select class="form-control js-example-basic-multiple-limit" name="dept_id" >
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                </div>
            </div>
        <div class="form-group row">
                <div class="col-sm-6">
                <label for="position"><strong>Position:</strong></label>
                        <select class="form-control js-example-basic-multiple-limit" name="position_id" >
                            <option value="">Select Position</option>
                            @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select> 
                </div>
            <div class="col-sm-6 mb-3">
            <label for="nrc_no"><strong>NRC number:</strong></label>
            <input type="text" class="form-control" name="nrc_no" id="nrc_no" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="status"><strong>Status:</strong></label>
                <select class="form-control" name="status" id="status"required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
        <a href="{{ route('buildings.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
 
@endsection
