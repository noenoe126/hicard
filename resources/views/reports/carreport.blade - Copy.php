@extends('layouts.app-master')
@section('content')
    <div class="container-fluid">
    <h2 style="text-align: center;">မော်တော်ယာဉ်ပြန်တမ်းစာရင်း</h2>


<br><br>
<div class="group-body">
<h6>MINISTART:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;SUPREME  COURT OF THE UNION</h6>
<h6>DEPARTMENT:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;SUPREME  COURT OF THE UNION</h6>

</div>
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

                    
                        <table class="table table-bordered" id="reportdatatable1" width="100%" cellspacing="0">
                       
                        
                                <thead>
                                    <tr>
                                        <th width="3%">SR NO</th>
                                        <th>REGISTRATION NO</th>
                                        <th>VEHICLE NAME</th>
                                        
                                    
                                        <th>TYPE OF VEHICLE</th>
                                        <th>MODEL YEAR</th>
                                        <th>NO OF WHEEL</th>
                                        <th>ENGINE POWER</th>
                                        <th>CAPACITY (PAYLOAD)</th>
                                        <th>WEIGHT</th>
                                        <th>TYPE OF FUEL</th>
                                        <th>CHASSID NO</th>
                                        <th>ENGINE NO</th>
                                        <th>DATE Of PROCUREMENT</th>
                                        <th>LICENSE EXPIRE DATE</th>
                                        <th>LOCATION (TOWNSHIP)</th>
                                        <th>LOCATION (STATE/ DIVISION)</th>
                                        <th>USE OF VEHICLE</th>
                                        <th>CONDISION</th>
                                        <th>GRADE/ CLASS</th>
                                        <th>BUDGET YEAR</th>
                                        <th>RECEIIVE</th>
                                        <th>REMARK</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>

                                    <!-- Using for loop to iterate over cars -->
                                    @foreach($cars as $i => $car)
                                        <tr>
                                        
                                            <td>{{ $i + 1 }}</td> <!-- Incrementing number -->                                           
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
            </div>
    </div>  
    
    
@endsection

