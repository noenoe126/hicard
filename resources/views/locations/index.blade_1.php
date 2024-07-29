@extends('layouts.app-master')

@section('content')
<div class="container-fluid">
    <h2>Location Lists</h2>
    <br>

    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Add Location
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
                            <th width="70%">Name</th>
                            <th width="15%"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($locations as $location)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $location->name }}</td>

                            <td>
                                <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-info">Edit</a>
                                <form method="post" action="{{ route('locations.destroy', $location->id) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete?');">
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
