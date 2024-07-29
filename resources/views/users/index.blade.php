@extends('layouts.app-master')

@section('content')
    <div class="container">
        <h2>Users List</h2>
        <br>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

       

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">

        
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th width="20%">Actions</th>
                </tr>
            </thead>
            <tbody>
        <!-- DataTables will populate rows here -->
    </tbody>
        </table>
        </div>
        </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
$(document).ready(function() {
    $('#userTable').DataTable({
        "processing": false, // Show processing indicator
        "serverSide": true, // Assuming data is fetched from the server side
        "ajax": "{{ route('users.data') }}", // Replace with your route for fetching data
        "columns": [
            { 
                "data": null, 
                "name": "index",
                "render": function (data, type, row, meta) {
                    return meta.row + 1; // This is where the serial number is generated
                }
            },
            { "data": "fullname", "name": "fullname" },
            { "data": "username", "name": "username" },
            { "data": "email", "name": "email" },
            { "data": "position", "name": "position" },
            { "data": "dept", "name": "dept" },
            { "data": "role", "name": "role" },
            {
                "data": null,
                "orderable": false, // Disable ordering on this column
                "searchable": false, // Disable searching on this column
                "render": function(data, type, full, meta) {
                    return '<a href="/users/' + full.id + '/edit" class="btn btn-sm btn-primary">Edit</a>'
                         + '<form action="/users/' + full.id + '" method="POST" style="display: inline;">'
                         + '@csrf'
                         + '@method('DELETE')'
                         + '<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this user?\')">Delete</button>'
                         + '</form>';
                }
            }
        ]
    });
});
</script>


@endsection
