@extends('layouts.app-master')
@section('content')
    <div class="container-fluid">
            <h1>Staff Lists</h1>
           
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="uscdatatable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>NRC Number</th>
                                        <th>Status</th>
                                        <th width="25%">Actions</th>
            
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach($staffs as $staff)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            
                                            <td>{{ $staff->name }}</td>
                                            <td>{{ $staff->department->name ?? 'N/A' }}
                                            <td>{{ $staff->position->name ?? 'N/A' }}</td>
                                            <td>{{ $staff->nrc_no }}</td>
                                            <td>{{ $staff->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                            <a href="{{ route('staffs.show', $staff->id) }}" class="btn btn-info">View</a>
                                             <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-warning">Edit</a>
                                            <form method="post" action="{{ route('staffs.destroy', $staff->id) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete?');">
                                            
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
    </div> 
           
@endsection
