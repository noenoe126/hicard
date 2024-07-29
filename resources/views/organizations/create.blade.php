@extends('layouts.app-master')

@section('content')
    <div class="container">
        <h2>အဖွဲ့အစည်း အသစ်ထည့်ရန်</h2>
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

        <form method="post" action="{{ route('organizations.store') }}">
            
            @csrf

            <div class="form-group">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="name">အမျိုးအမည်</label>
                    <input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
                </div>
            </div>

            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ route('organizations.create') }}" class="btn btn-secondary">Back</a>
        </form>
     
        
    </div>
    <br>
    <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="uscdatatable" width="100%" cellspacing="0">
                    <thead>    
                    <tr>
                            <th width="5%">စဉ်</th>
                            <th>အမျိုးအမည်</th>
                            <th width="25%">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($organizations as $organization)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $organization->name }}</td>
                                    <td>
                                        <a href="{{ route('organizations.edit', $organization->id) }}" class="btn btn-info">Edit</a>
                                        <form method="post" action="{{ route('organizations.destroy', $organization->id) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete?');">
                                    
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div> 
            </div>
        </div>
@endsection
