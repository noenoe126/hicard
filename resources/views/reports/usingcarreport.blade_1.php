@extends('layouts.app-master')
@section('content')
<div class="container-fluid">
    <h2>ပြည်ထောင်စုတရားလွှတ်တော်ရုံးချုပ်မှလက်ရှိသုံးစွဲနေသောမော်တော်ယာဉ်များ</h2>
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
                <table class="table table-bordered" id="reportdatatable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="3%">စဉ်</th>
                            <th>ယာဉ်အမှတ်</th>
                            <th>ယာဉ်အမျိုးအမည်</th>
                            
                            <th>ယာဉ်အမျိုးအစား</th>
                            <th>အင်ဂျင်နံပါတ်</th>
                            <th>ကိုယ်ထည်နံပါတ်</th>
                            <th>ထုတ်လုပ်သည့်ခုနှစ်</th>
                            <th>အသုံးပြုသူ</th>
                            <th>မှတ်ချက်</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $i => $car)
                        <tr>
                            <td>{{ $i + 1 }}</td>                                           
                            <td>{{ $car->plate_number }}</td>
                            <td>{{ $car->manufacturer->name ?? 'N/A' }} {{ $car->model->name ?? 'N/A' }}</td>
                            <td>{{ $car->build_type->name ?? 'N/A' }}</td>
                            <td>{{ $car->engine_no }}</td>
                            <td>{{ $car->body_no }}</td>
                            <td>{{ $car->year }}</td>
                            <td>
                                @if($car->carusers)
                                    @foreach($car->carusers as $caruser)
                                        {{ $caruser->staff->name ?? 'N/A' }} <br>
                                         {{ $caruser->staff->department->name ?? 'N/A' }}
                                        ({{ $caruser->staff->position->name ?? 'N/A' }})
                                        
                                        
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($car->carremarks->isNotEmpty())
                                    @foreach($car->carremarks as $remark)
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



<!-- Initialize DataTable with Buttons -->
<script>
    $(document).ready(function() {
        $('#uscdatatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'print'
            ]
        });
    });
</script>
