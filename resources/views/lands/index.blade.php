@extends('layouts.app-master')
@section('content')
    <div class="container-fluid">
            <h2>Land Lists</h2>
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
                                        <th width="3%">No</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Owner</th>
                                        <th>Area</th>
                                        <th>Photo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Using for loop to iterate over cars -->
                                    @for ($i = 0; $i < count($lands); $i++)
                                        <tr>
                                            <td>{{ $i + 1 }}</td> <!-- Incrementing number -->
                                            <td>{{ $lands[$i]->name }}</td>
                                            <td>{{ $lands[$i]->address }}</td>
                                            <td>{{ $lands[$i]->owner }}</td>
                                            <td>{{ $lands[$i]->area }}</td>
                                            <td>
                                                @if ($lands[$i]->photo)
                                                    <img src="{{ asset('uploads/land_photos/' . $lands[$i]->photo) }}" alt="Land Photo" width= "50">
                                                @else
                                                    No Photo Available
                                                @endif
                                            </td>
                                            <!-- <td>
                                                <a href="{{ route('lands.show', $lands[$i]->id) }}" class="btn btn-info">View</a>
                                                
                                            </td> -->
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
