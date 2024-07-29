@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="text-center">
        <h2>Edit Staff</h2>
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

    <form method="post" action="{{ route('staffs.update', $staff->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="name"><strong>Name:</strong></label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $staff->name }}" required>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="dept_id"><strong>Department:</strong></label>
                <select name="dept_id" class="form-control js-example-basic-multiple-limit" id="dept_id" required>
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $staff->dept_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="position_id"><strong>Position:</strong></label>
                <select name="position_id" class="form-control js-example-basic-multiple-limit" id="position_id" required>
                    <option value="">Select Position</option>
                    @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ $staff->position_id == $position->id ? 'selected' : '' }}>
                        {{ $position->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="nrc_no"><strong>NRC Number:</strong></label>
                <input type="text" class="form-control" name="nrc_no" id="nrc_no" value="{{ $staff->nrc_no }}" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="status"><strong>Status:</strong></label>
                <select name="status" class="form-control" id="status" required>
                    <option value="1" {{ $staff->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $staff->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="{{ route('staffs.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
