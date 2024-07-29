@extends('layouts.app-master')

@section('content')

                        

    

    <h2>Land Overview</h2>
    <br>
    <div class="row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <p><img src="{{ asset('uploads/land_photos/' . $land->photo) }}" width= "200"></p>
        </div>
        <div class="col-sm-4">
            <p><strong>Name:</strong> {{ $land->name }}</p> 
            <p><strong>Owner:</strong> {{ $land->owner }}</p>
        </div>
        <div class="col-sm-4">
            <p style="overflow-wrap: break-word;"><strong>Address:</strong> {{ $land->address }}</p> 
            <p><strong>Area:</strong> {{ $land->area }}</p>
        </div>
       
    </div> 
<hr>
    <label for="remark"><strong>Remark:</strong></label>
    @foreach($landremarks as $landremark)
        <div class="row">
            <div class="col-sm-10">
                <p>{{ $landremark->landremark }}</p>
            </div>
            <div class="col-sm-2">
                <form method="post" action="{{ route('landremarks.destroy', $landremark->id) }}" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this remark?');">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="landid" value="{{ $land->id }}">
                    <input type="hidden" name="id" value="{{ $landremark->id }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    <br>

    <div class="col-sm-12">
        <!-- Remark button and text box -->
        <form method="post" action="{{ route('landremarks.store') }}">
            @csrf
            <div class="form-group">
                <!-- <label for="remark">Remark:</label> -->
                <textarea class="form-control" name="landremark" id="landremark" rows="3"></textarea>
                <input type="hidden" name="landid" value="{{ $land->id }}">
                <input type="hidden" name="created_user" value="{{ Auth::user()->username }}">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            
        <a href="{{ route('lands.index') }}" class="btn btn-secondary">Back</a> 
   
        </form>
    </div>          
        
@endsection
