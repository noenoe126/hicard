@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="text-center">
        <h2>အဆောက်အဦအသစ်ထည့်ရန် </h2>
    </div>
    <br>
    <h6 style="color: red;"> (<span style="color: red;" >*</span>) ပြထားသည်များကို မဖြစ်မနေဖြည့်သွင်းပေးပါရန်။</h6> <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{ route('buildings.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="organization"><strong>အဖွဲ့အစည်း</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="organization_id" autocomplete="off" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($organizations as $organization)
                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                    @endforeach
                </select>        
            </div>
            <div class="col-sm-6 mb-3">
                <label for="office"><strong>ရုံး/ ဦးစီးဌာန</strong><span style="color: red;" >*</span></label>
                    <select class="form-control js-example-basic-multiple-limit" name="office_id" autocomplete="off" required>
                        <option value="">ရွေးရန်</option>
                        @foreach ($offices as $office)
                        <option value="{{ $office->id }}">{{ $office->name }}</option>
                        @endforeach
                    </select>  
                </div>
            </div>

            <div class="form-group row">
            <div class="col-sm-6">
                <label for="township"><strong>မြို့နယ်</strong><span style="color: red;" >*</span></label>
                    <select class="form-control js-example-basic-multiple-limit" name="township_id" autocomplete="off" required>
                        <option value="">ရွေးရန်</option>
                        @foreach ($townships as $township)
                        <option value="{{ $township->id }}">{{ $township->name }}</option>
                        @endforeach
                    </select>          
            </div>
            <div class="col-sm-6 mb-3">
                <label for="state_division"><strong>ပြည်နယ်/ တိုင်း</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="state_division_id" autocomplete="off" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($state_divisions as $state_division)
                    <option value="{{ $state_division->id }}">{{ $state_division->name }}</option>
                    @endforeach
                </select>   
                </div>
            </div>

            <div class="form-group row">
            <div class="col-sm-6">
                <label for="address"><strong>လိပ်စာ</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="address" id="address" autocomplete="off" required>      
            </div>
            <div class="col-sm-6 mb-3">
                <label for="live_building"><strong>လူနေအဆောက်အဦ</strong><span style="color: red;" >*</span></label>
                    <select class="form-control js-example-basic-multiple-limit" name="live_building_id" autocomplete="off" required>
                        <option value="">ရွေးရန်</option>
                        @foreach ($live_buildings as $live_building)
                        <option value="{{ $live_building->id }}">{{ $live_building->name }}</option>
                        @endforeach
                    </select>  
                </div>
            </div>

            <div class="form-group row">
            <div class="col-sm-6">
                <label for="building_type"><strong>အဆောင်အဦအမျိုးအစား</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="building_type_id" autocomplete="off" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($building_types as $building_type)
                    <option value="{{ $building_type->id }}">{{ $building_type->name }}</option>
                    @endforeach
                </select>        
            </div>
            <div class="col-sm-6 mb-3">
                <label for="building_fact"><strong>အဆောက်အဦအချက်အလက်</strong><span style="color: red;" >*</span></label>
                    <select class="form-control js-example-basic-multiple-limit" name="building_fact_id" autocomplete="off" required>
                        <option value="">ရွေးရန်</option>
                        @foreach ($building_facts as $building_fact)
                        <option value="{{ $building_fact->id }}">{{ $building_fact->name }}</option>
                        @endforeach
                    </select>  
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label><strong>လက်ရှိအသုံးပြုမှု</strong><span style="color: red;" >*</span></label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="use" name="current_use" value="1" checked>
                        <label class="form-check-label" for="use">ရှိ</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="without_use" name="current_use" value="0">
                        <label class="form-check-label" for="without_use">မရှိ</label>
                    </div>
                </div>
           
                <div class="col-sm-6 mb-3">
                    <label for="construction"><strong>ဆောက်လုပ်သည့်ခုနှစ်</strong><span style="color: red;" >*</span></label>
                    <input type="text" class="form-control" name="construction" id="construction" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group row">
            <div class="col-sm-6">
                <label for="use_period"><strong>ဆက်လက်အသုံးပြုနိုင်မည့်ကာလ</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="use_period" id="use_period" autocomplete="off" required>      
            </div>
            <div class="col-sm-6 mb-3">
                <label for="cost"><strong>အဆောက်အဦတန်ဖိုး</strong><span style="color: red;" >*</span></label>
                <input type="number" step="0.01" class="form-control" name="cost" id="cost" autocomplete="off" required>
            </div>
            </div>

            <div class="form-group row">
            <div class="col-sm-6">
                <label for="building_old"><strong>အဆောက်အဦသက်တမ်း</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="building_old" id="building_old" autocomplete="off" required>      
            </div>
            <div class="col-sm-6 mb-3">
                <label for="building_situation"><strong>အဆောက်အဦလက်ရှိအခြေအနေ</strong><span style="color: red;" >*</span></label>
                    <select class="form-control js-example-basic-multiple-limit" name="building_situation_id" autocomplete="off" required>
                        <option value="">ရွေးရန်</option>
                        @foreach ($building_situations as $building_situation)
                        <option value="{{ $building_situation->id }}">{{ $building_situation->name }}</option>
                        @endforeach
                    </select>  
                </div>
            </div>

            <div class="form-group row">
            <div class="col-sm-6">
                    <label for="fund"><strong>ဆောင်ရွက်ခဲ့သည့်ဘဏာရန်ပုံငွေ</strong><span style="color: red;" >*</span></label>
                    <select class="form-control js-example-basic-multiple-limit" name="fund_id" autocomplete="off" required>
                        <option value="">ရွေးရန်</option>
                        @foreach ($funds as $fund)
                        <option value="{{ $fund->id }}">{{ $fund->name }}</option>
                        @endforeach
                    </select>  
                     
            </div>
            <div class="col-sm-6 mb-3">
                <label for="own_type"><strong>ပိုင်ဆိုင်မှုအမျိုးအစား</strong><span style="color: red;" >*</span></label>
                    <select class="form-control js-example-basic-multiple-limit" name="own_type_id" autocomplete="off" required>
                        <option value="">ရွေးရန်</option>
                        @foreach ($own_types as $own_type)
                        <option value="{{ $own_type->id }}">{{ $own_type->name }}</option>
                        @endforeach
                    </select>  
                </div>
            </div>

            <div class="form-group row">
            <div class="col-sm-6">
                <label><strong>ပုံသေပိုင်ပစ္စည်း</strong><span style="color: red;" >*</span></label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="yes" name="own_list" value="1" checked>
                        <label class="form-check-label" for="yes">ဟုတ်</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="no" name="own_list" value="0">
                        <label class="form-check-label" for="no">မဟုတ်</label>
                    </div>
                </div>
            <div class="col-sm-6 mb-3">
                    <label><strong>ရှေ့ဟောင်းသမိုင်းဝင်</strong><span style="color: red;" >*</span></label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="yes" name="history" value="1" checked>
                        <label class="form-check-label" for="yes">ဟုတ်</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="no" name="history" value="0">
                        <label class="form-check-label" for="no">မဟုတ်</label>
                    </div>
                    </div>
                
            </div>
        
        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="photo"><strong>ပုံ ( jpeg,png,jpg/ max:2048, 2MB )</strong></label>
                <input type="file" class="form-control-file" name="photo" id="photo">
            </div>
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
        <a href="{{ route('buildings.index') }}" class="btn btn-secondary">Back</a>
    </form>
    <hr>
    <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="uscdatatable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>အဖွဲ့အစည်း</th>
                                        <th>ရုံး/ ဦးစီးဌာန</th>
                                        <th>ပြည်နယ်/ တိုင်း</th>
                                        <th>မြို့နယ်</th>
                                        <th>လိပ်စာ</th>
                                        <th>လူနေအဆောက်အဦ</th>
                                        <th>အဆောက်အဦအမျိုးအစား</th>
                                        <th>အဆောက်အဦအချက်အလက်</th>
                                        <th>အဆောက်အဦတန်ဖိုး</th>
                                        <th>Photo</th> 
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
                                                @if ($building->photo)
                                                    <img src="{{ asset('uploads/building_photos/' . $building->photo) }}" alt="Building Photo" width= "50">
                                                @else
                                                    No Photo Available
                                                @endif
                                            </td>
                                           
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
