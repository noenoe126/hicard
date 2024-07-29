@extends('layouts.app-master')
@section('content')
    <div class="container-fluid">

            <h5 style="text-align: center;">ပြည်ထောင်စုတရားလွှတ်တော်ရုံးချုပ်၊ တိုင်းဒေသကြီး/ ပြည်နယ်တရားလွှတ်တော်များ/ခရိုင်တရားရုံးများ <br><br>လက်ရှိသုံးစွဲနေသောမော်တော်ယာဉ်များ</h5>
            <br>
        <a href="{{ url('/export_total_car_reports') }}" class="btn btn-primary">Export to Excel</a>
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
            
                <div class="card-body">
                        <table class="table table-bordered responsive" id="reportdatatable2" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th width="3%">စဉ်</th>
                                        <th>တိုင်းဒေသကြီး/ ပြည်နယ်</th>
                                        <th>ကားစီးရေ</th>
                                        <th>မှတ်ချက်</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reportData as $car_address)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                            @if ($car_address->car_user_dept == '66')
                                                ပြည်ထောင်စုလွှတ်တော်တရားချုပ်ရုံး
                                    @elseif ($car_address->car_user_dept == '67')
                                        ကချင်ပြည်နယ်တရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '68')
                                        ကယားပြည်နယ်တရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '69')
                                        ကရင်ပြည်နယ်တရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '70')
                                        ချင်းပြည်နယ်တရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '71')
                                        စစ်ကိုင်းတိုင်းဒေသကြီးတရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '72')
                                        တနင်္သာရီတိုင်းဒေသကြီးတရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '73')
                                        ပဲခူးတိုင်းဒေသကြီးတရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '74')
                                        မကွေးတိုင်းဒေသကြီးတရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '75')
                                        မန္တလေးတိုင်းဒေသကြီးတရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '76')
                                        မွန်ပြည်နယ်တရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '77')
                                        ရခိုင်ပြည်နယ်တရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '78')
                                        ရန်ကုန်တိုင်းဒေသကြီးတရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '79')
                                        ရှမ်းပြည်နယ်တရားလွှတ်တော်
                                    @elseif ($car_address->car_user_dept == '80')
                                        ဧရာဝတီတိုင်းဒေသကြီးတရားလွှတ်တော်
                                    
                                    @else
                                        {{ $car_address->car_user_dept }}  {{-- Handle unexpected values --}}
                                    @endif
                            </td>
                            <td>{{ $car_address->count }}</td>
                            <td> </td>
                        </tr>
                        @endforeach
                                    
                        </tbody>
                                
                        </table>
                      
                </div>
           
    </div>          
@endsection
