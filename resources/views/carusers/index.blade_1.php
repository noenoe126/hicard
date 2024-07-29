@extends('layouts.app-master')
@section('content')
    <div class="container-fluid">
            <h2>Car User Lists</h2>
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
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="uscdatatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>User</th>
                                
                                <th>Start Date</th>
                                <th>End Date</th>
                               
                                <th width="25%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carusers as $caruser)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $caruser->staff->staff_id ?? 'N/A' }}</td>
                                    
                                    <td>{{ \Carbon\Carbon::parse($caruser->start_date)->format('d-m-Y') }}</td>
                                    <td>{{ $caruser->end_date ? \Carbon\Carbon::parse($caruser->end_date)->format('d-m-Y') : '-' }}</td>
                                    
                                    <td>
                                        <a href="{{ route('carusers.show', $caruser->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('carusers.edit', $caruser->id) }}" class="btn btn-warning">Edit</a>
                                        <form method="post" action="{{ route('carusers.destroy', $caruser->id) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete?');">
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
