@extends('layouts.app-master')

@section('content') 
    <div class="container">
            <div class="text-center">
                <h2>Create Car User</h2>
            </div>  
            <br>          
            @if ($errors->any())
                <div >
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('carusers.store') }}" enctype="multipart/form-data">
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="staff_id"><strong>Choose User:</strong></label>
                            <select class="form-control js-example-basic-multiple-limit" name="staff_id">
                                <option value="">Select User</option>
                                @foreach ($staffs as $staff)
                                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="start_date"><strong>Start Date:</strong></label>
                            <div class="input-group date" id="startDatePicker">
                                <input type="text" class="form-control form-control-user" name="start_date" id="start_date" autocomplete="off" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="startDateButton"><i class="fa fa-calendar"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="end_date"><strong>End Date:</strong></label>
                            <div class="input-group date" id="endDatePicker">
                                <input type="text" class="form-control form-control-user" name="end_date" id="end_date" autocomplete="off">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="endDateButton"><i class="fa fa-calendar"></i></button>
                                </div>
                            </div>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-info">Submit</button>
                    <a href="{{ route('carusers.index') }}" class="btn btn-secondary">Back</a>
         </form>
    </div>  
     
   

@endsection

