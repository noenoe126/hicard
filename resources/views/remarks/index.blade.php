@extends('layouts.app-master')

@section('content')
<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($remarks as $remark)
                        <tr>
                            <td width=30%>{{ $remark->remark }}</td>
                            <td width=30%>{{ $remark->carid }}</td>
                            <td width=30%>{{ $remark->created_user }}</td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
