@extends('layouts.app-master')

@section('content')
@php
    use Carbon\Carbon;
@endphp

<div class="container">
    <div class="text-center">
        <h2>Edit Car User</h2>
    </div>
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

    <form method="post" action="{{ route('carusers.update', $caruser->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="staff_id"><strong>Choose User:</strong></label>
                <select name="staff_id" class="form-control js-example-basic-multiple-limit" id="staff_id" required>
                    @foreach ($staffs as $staff)
                    <option value="{{ $staff->id }}" {{ $staff->id == $caruser->name_id ? 'selected' : '' }}>
                        {{ $staff->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- <div class="col-sm-6">
                <label for="user_name"><strong>Name:</strong></label>
                <input type="text" class="form-control form-control-user" name="user_name" id="user_name"
                    value="{{ $caruser->user_name ?? '' }}" required>
            </div> -->
        </div>

        

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="start_date"><strong>Start Date:</strong></label>
                <div class="input-group date" id="startDatePicker">
                    <input type="text" class="form-control form-control-user" name="start_date" id="start_date"
                        value="{{ old('start_date', isset($caruser) ? \Carbon\Carbon::parse($caruser->start_date)->format('d-m-Y') : '') }}"
                        autocomplete="off" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary" id="startDateButton"><i
                                class="fa fa-calendar"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <label for="end_date"><strong>End Date:</strong></label>
                <div class="input-group date" id="endDatePicker">
                    <input type="text" class="form-control form-control-user" name="end_date" id="end_date"
                        value="{{ old('end_date', isset($caruser) && $caruser->end_date ? \Carbon\Carbon::parse($caruser->end_date)->format('d-m-Y') : '') }}" autocomplete="off">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary" id="endDateButton"><i
                                class="fa fa-calendar"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="{{ route('carusers.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
