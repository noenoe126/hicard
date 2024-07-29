@extends('layouts.app-master')
@section('content')
    <div class="container-fluid">
            <h2>အဆောက်အဦစာရင်း</h2>
            <!-- @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="uscdatatable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th width="5%">စဥ်</th>
                                        <th>အဖွဲ့အစည်း</th>
                                        <th>ရုံး/ ဦးစီးဌာန</th>
                                        <th>ပြည်နယ်/ တိုင်း</th>
                                        <th>မြို့နယ်</th>
                                        <th>လိပ်စာ</th>
                                        <th>လူနေအဆောက်အဦ</th>
                                        <th>အဆောက်အဦအမျိုးအစား</th>
                                        <th>အဆောက်အဦအချက်အလက်</th>
                                        <th>အဆောက်အဦတန်ဖိုး</th>
                                        <th width="25%">Actions</th>
            
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach($buildings as $building)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $building->organization->name ?? 'N/A' }}</td>
                                            <td>{{ $building->office->name ?? 'N/A' }}</td>
                                            <td>{{ $building->state_division->name ?? 'N/A' }}</td>
                                            <td>{{ $building->township->name ?? 'N/A' }}</td>
                                            <td>{{ $building->address }}</td>
                                            <td>{{ $building->live_building->name ?? 'N/A' }}</td>
                                            <td>{{ $building->building_type->name ?? 'N/A' }}</td>
                                            <td>{{ $building->building_fact->name ?? 'N/A' }}</td>
                                            <td>{{ $building->cost }}</td>
                                            <td>
                                            <a href="{{ route('buildings.show', $building->id) }}" class="btn btn-info">View</a>
                                             <a href="{{ route('buildings.edit', $building->id) }}" class="btn btn-warning">Edit</a>
                                            <form method="post" action="{{ route('buildings.destroy', $building->id) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete?');">
                                            
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
