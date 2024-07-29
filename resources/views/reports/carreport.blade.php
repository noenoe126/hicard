@extends('layouts.app-master')
@section('content')
<div class="container-fluid">

    <h2 style="text-align: center;">မော်တော်ယာဉ်ပြန်တမ်းစာရင်း</h2>
     <br><br>

    <div class="row justify-content-between mb-4">
        <div class="col">
            <h6>MINISTART:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;SUPREME  COURT OF THE UNION</h6>
            <h6>DEPARTMENT:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;SUPREME  COURT OF THE UNION</h6>
        </div>
        <div class="col text-right">
            <a href="{{ url('/export_car_reports') }}" class="btn btn-primary">Export to Excel</a>
        </div>   
    </div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
                <div class="card-body">
                    
                        <table class="table table-bordered table-responsive" id="reportdatatable1" width="100%" cellspacing="0">
                            <thead class="table-header-bold-center">
                                <tr>
                                    <th rowspan="2">SR NO</th>
                                    <th rowspan="2">REGISTRATION NO</th>
                                    <th rowspan="2">VEHICLE NAME</th>
                                    <th rowspan="2">TYPE OF VEHICLE</th>
                                    <th rowspan="2">MODEL YEAR</th>
                                    <th rowspan="2">NO OF WHEEL</th>
                                    <th rowspan="2">ENGINE POWER</th>
                                    <th rowspan="2">CAPACITY (PAYLOAD)</th>
                                    <th rowspan="2">WEIGHT (KG)</th>
                                    <th rowspan="2">TYPE OF FUEL</th>
                                    <th rowspan="2">CHASSIS NO</th>
                                    <th rowspan="2">ENGINE NO</th>
                                    <th rowspan="2">DATE OF PROCUREMENT</th>
                                    <th rowspan="2">LICENSE EXPIRE DATE</th>
                                    <th colspan="2">LOCATION</th>
                                    <th rowspan="2">USE OF VEHICLE</th>
                                    <th rowspan="2">CONDITION</th>
                                    <th rowspan="2">GRADE/CLASS</th>
                                    <th rowspan="2">BUDGET YEAR</th>
                                    <th rowspan="2">RECEIVE BY</th>
                                    <th rowspan="2">REMARKS</th>
                                </tr>
                                <tr>
                                    <!-- location -->
                                    <td>(TOWNSHIP)</td>
                                    <td>(STATE DIVISION)</td>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach($cars as $i => $car)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $cars[$i]->plate_number }}</td>
                                        <td>{{ $cars[$i]->manufacturer->name ?? 'N/A' }} {{ $cars[$i]->model->name ?? 'N/A'  }}</td>
                                        <td>{{ $cars[$i]->build_type->name ?? 'N/A'  }}</td>
                                        <td>{{ $cars[$i]->year }}</td>
                                        <td>{{ $cars[$i]->wheel }} W</td>
                                        <td>{{ $cars[$i]->engine_power }} CC</td>
                                        <td>{{ $cars[$i]->capacity }} P</td>
                                        <td>{{ $cars[$i]->weight }} Kg</td>
                                        <td>{{ $cars[$i]->fuel_type->name ?? 'N/A'  }}</td>
                                        <td>{{ $cars[$i]->body_no }}</td>
                                        <td>{{ $cars[$i]->engine_no }}</td>
                                        <td>{{ $cars[$i]->proc_date }}</td>
                                        <td>{{ $cars[$i]->license_exp }}</td>
                                        <td>{{ $cars[$i]->township->name ?? 'N/A' }}</td>
                                        <td>{{ $cars[$i]->state_division->name ?? 'N/A' }}</td>
                                        <td>{{ $cars[$i]->vehicle_use }}</td>
                                        <td>{{ $cars[$i]->condition }}</td>
                                        <td>{{ $cars[$i]->grade->name ?? 'N/A' }}</td>
                                        <td>{{ $cars[$i]->budget_year->name ?? 'N/A'}}</td>
                                        <td>{{ $cars[$i]->receive->name ?? 'N/A' }}</td>
                                        <td>
                                            @if($cars[$i]->carremarks->isNotEmpty())
                                                @foreach($cars[$i]->carremarks as $remark)
                                                    <p>{{ $remark->remark }}</p>
                                                @endforeach
                                            @else
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>      
                        </table>

                        
                    
                </div>
           
</div>      
@endsection

