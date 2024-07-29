@extends('layouts.app-master')

@section('content')
    <div class="container">
        
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-sm-12">
                <!-- Remark button and text box -->
                <form method="post" action="{{ route('remarks.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="remark">Remark:</label>
                        <textarea class="form-control" name="remark" id="remark" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Add Remark</button>
                </form>
            </div>
        
    </div>
    
@endsection
