<!-- buildings-table.blade.php -->

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead>
    <tr>
        <th>No</th>
        <th>Address</th>
        <th>Type</th>
        <th>Construction</th>
        <th>Completed</th>
        <th>Cost</th>
        <th>Photo</th> 

    </tr>
</thead>
<tbody>
    <!-- Using for loop to iterate over cars -->
    @for ($i = 0; $i < count($buildings); $i++)
        <tr>
            <td>{{ $i + 1 }}</td> <!-- Incrementing number -->
            <td>{{ $buildings[$i]->address }}</td>
            <td>{{ $buildings[$i]->type_id }}</td>
            <td>{{ $buildings[$i]->construction }}</td>
            <td>{{ $buildings[$i]->completed }}</td>
            <td>{{ $buildings[$i]->cost }}</td>
            <td>
                @if ($buildings[$i]->photo)
                    <img src="{{ asset('uploads/building_photos/' . $buildings[$i]->photo) }}" alt="Building Photo" width= "50">
                @else
                    No Photo Available
                @endif
            </td>
            <td>
                <a href="{{ route('buildings.show', $buildings[$i]->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('buildings.edit', $buildings[$i]->id) }}" class="btn btn-warning">Edit</a>
                <form method="post" action="{{ route('buildings.destroy', $buildings[$i]->id) }}" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>  
                </form>
            </td>
        </tr>
    @endfor
</tbody>

</table>
