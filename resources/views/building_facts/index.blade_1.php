@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <h2>BuildingFact Lists</h2>
        <br>
        <a href="{{ route('building_facts.create') }}" class="btn btn-primary mb-3">
          <i class="fas fa-plus"></i> Add LivingBuilding
        </a>
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
                            <th>Name</th>
                            <th width="25%">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($building_facts as $building_fact)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $building_fact->name }}</td>
                                    <td>
                                        <a href="{{ route('building_facts.edit', $building_fact->id) }}" class="btn btn-info">Edit</a>
                                        <form method="post" action="{{ route('building_facts.destroy', $building_fact->id) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete?');">
                                    
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
