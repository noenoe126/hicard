@extends('layouts.app-master')
@section('content')
    <div class="container-fluid">
            <h2>မော်တော်ယာဉ်စာရင်း</h2>
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
                                        <th width="3%">စဥ်</th>
                                        <th>ယာဉ်အမှတ်</th>
                                        <th>ယာဉ်အမျိုးအမည်</th>                        
                                        <th>ယာဉ်အမျိုးအစား</th>
                                        <th>အင်ဂျင်နံပါတ်</th>
                                        <th>ကိုယ်ထည်နံပါတ်</th>
                                        <th>ထုတ်လုပ်သည့်ခုနှစ်</th>
                                        <!-- <th>Car Photo</th> -->
                                        <th width="25%">Actions</th>
                                    </tr>
                                </thead>

                                    <!-- Using for loop to iterate over cars -->
                                    @for ($i = 0; $i < count($cars); $i++)
                                        <tr>
                                            <td>{{ $i + 1 }}</td> <!-- Incrementing number -->                                           
                                            <td>{{ $cars[$i]->plate_number }}</td>
                                            
                                            
                                            <td>{{ $cars[$i]->manufacturer->name ?? 'N/A' }} {{ $cars[$i]->model->name ?? 'N/A'  }}</td>
                                            
                                            
                                            <td>{{ $cars[$i]->build_type->name ?? 'N/A'  }}</td>
                                            
                                            
                                            <td>{{ $cars[$i]->engine_no }}</td>
                                            <td>{{ $cars[$i]->body_no }}</td>
                                            <td>{{ $cars[$i]->year }}</td>
                                            <!-- <td>
                                                @if ($cars[$i]->photo)
                                                    <img src="{{ asset('uploads/car_photos/' . $cars[$i]->photo) }}" alt="Car Photo" width= "50">
                                                @else
                                                    No Photo Available
                                                @endif
                                            </td> -->
                                            <!-- <td>
                                                <a href="{{ route('cars.show', $cars[$i]->id) }}" class="btn btn-info">View</a>
                 
                                            </td> -->

                                            <td>
                                <a href="{{ route('cars.show', $cars[$i]->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('cars.edit', $cars[$i]->id) }}" class="btn btn-warning">Edit</a>
                                <form method="post" action="{{ route('cars.destroy', $cars[$i]->id) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete?');">
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
