@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="text-center">
        <h2>အဆောက်အဦ ပြင်ရန်</h2>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{ route('buildings.update', $building->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="organization"><strong>အဖွဲ့အစည်း</strong><span style="color: red;" >*</span></label>
                <select name="organization_id" class="form-control js-example-basic-multiple-limit" id="organization_id" required>
                    @foreach ($organizations as $organization)
                    <option value="{{ $organization->id }}" {{ $building->organization_id == $organization->id ? 'selected' : '' }}>
                        {{ $organization->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="office"><strong>ရုံး/ ဦးစီးဌာန</strong><span style="color: red;" >*</span></label>
                <select name="office_id" class="form-control js-example-basic-multiple-limit" id="office_id" required>
                    @foreach ($offices as $office)
                    <option value="{{ $office->id }}" {{ $building->office_id == $office->id ? 'selected' : '' }}>
                        {{ $office->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="township"><strong>မြို့နယ်</strong><span style="color: red;" >*</span></label>
                <select name="township_id" class="form-control js-example-basic-multiple-limit" id="township_id" required>
                    @foreach ($townships as $township)
                    <option value="{{ $township->id }}" {{ $building->township_id == $township->id ? 'selected' : '' }}>
                        {{ $township->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="state_division"><strong>ပြည်နယ်/ တိုင်း</strong><span style="color: red;" >*</span></label>
                <select name="state_division_id" class="form-control js-example-basic-multiple-limit" id="state_division_id" required>
                    @foreach ($state_divisions as $state_division)
                    <option value="{{ $state_division->id }}" {{ $building->state_division_id == $state_division->id ? 'selected' : '' }}>
                        {{ $state_division->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="address"><strong>လိပ်စာ</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="address" id="address" value="{{ $building->address }}" required>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="live_building"><strong>လူနေအဆောက်အဦ</strong><span style="color: red;" >*</span></label>
                <select name="live_building_id" class="form-control js-example-basic-multiple-limit" id="live_building_id" required>
                    @foreach ($live_buildings as $live_building)
                    <option value="{{ $live_building->id }}" {{ $building->live_building_id == $live_building->id ? 'selected' : '' }}>
                        {{ $live_building->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="building_type"><strong>အဆောက်အဦအမျိုးအစား</strong><span style="color: red;" >*</span></label>
                <select name="building_type_id" class="form-control js-example-basic-multiple-limit" id="building_type_id" required>
                    @foreach ($building_types as $building_type)
                    <option value="{{ $building_type->id }}" {{ $building->building_type_id == $building_type->id ? 'selected' : '' }}>
                        {{ $building_type->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="building_fact"><strong>အဆောက်အဦအချက်အလက်</strong><span style="color: red;" >*</span></label>
                <select name="building_fact_id" class="form-control js-example-basic-multiple-limit" id="building_fact_id" required>
                    @foreach ($building_facts as $building_fact)
                    <option value="{{ $building_fact->id }}" {{ $building->building_fact_id == $building_fact->id ? 'selected' : '' }}>
                        {{ $building_fact->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
            <label><strong>လက်ရှိအသုံးပြုမှု</strong><span style="color: red;" >*</span></label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="with_use" name="current_use" value="1" {{ $building->current_use == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="with_use">ရှိ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="without_use" name="current_use" value="0" {{ $building->current_use == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="without_use">မရှိ</label>
                </div>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="construction"><strong>ဆောက်လုပ်သည့်ခုနှစ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="construction" id="construction" value="{{ $building->construction }}" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="use_period"><strong>ဆက်လက်အသုံးပြုနိုင်မည့်ကာလ</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="use_period" id="use_period" value="{{ $building->use_period }}" required>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="cost"><strong>အဆောက်အဦတန်ဖိုး</strong><span style="color: red;" >*</span></label>
                <input type="number" step="0.01" class="form-control" name="cost" id="cost" value="{{ $building->cost }}" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="building_old"><strong>အဆောက်အဦသက်တမ်း</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="building_old" id="building_old" value="{{ $building->building_old }}" required>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="building_situation"><strong>လူနေအဆောက်အဦ</strong><span style="color: red;" >*</span></label>
                <select name="building_situation_id" class="form-control js-example-basic-multiple-limit" id="building_situation_id" required>
                    @foreach ($building_situations as $building_situation)
                    <option value="{{ $building_situation->id }}" {{ $building->building_situation_id == $building_situation->id ? 'selected' : '' }}>
                        {{ $building_situation->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
            <label for="fund"><strong>ဆောင်ရွက်ခဲ့သည့်ဘဏာရန်ပုံငွေ</strong><span style="color: red;" >*</span></label>
                <select name="fund_id" class="form-control js-example-basic-multiple-limit" id="fund_id" required>
                    @foreach ($funds as $fund)
                    <option value="{{ $fund->id }}" {{ $building->fund_id == $fund->id ? 'selected' : '' }}>
                        {{ $fund->name }}
                    </option>
                    @endforeach
                </select>
            
            </div>
            <div class="col-sm-6 mb-3">
                <label for="own_type"><strong>လူနေအဆောက်အဦ</strong><span style="color: red;" >*</span></label>
                <select name="own_type_id" class="form-control js-example-basic-multiple-limit" id="own_type_id" required>
                    @foreach ($own_types as $own_type)
                    <option value="{{ $own_type->id }}" {{ $building->own_type_id == $own_type->id ? 'selected' : '' }}>
                        {{ $own_type->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
            <label><strong>လက်ရှိအသုံးပြုမှု</strong><span style="color: red;" >*</span></label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="yes" name="own_list" value="1" {{ $building->own_list == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="yes">ဟုတ်</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="no" name="own_list" value="0" {{ $building->own_list == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="no">မဟုတ်</label>
                </div>
            
            </div>
            <div class="col-sm-6 mb-3">
            <label><strong>ရှေ့ဟောင်းသမိုင်းဝင်</strong><span style="color: red;" >*</span></label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="yes" name="history" value="1" {{ $building->history == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="yes">ဟုတ်</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="no" name="history" value="0" {{ $building->history == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="no">မဟုတ်</label>
                </div>
                
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <label for="photo"><strong>Photo:</strong></label>
                @if ($building->photo)
                <img src="{{ asset('uploads/car_photos/' . $building->photo) }}" alt="Photo" width="40">
                @else
                No Photo Available
                @endif
                <input type="file" class="form-control-file" name="photo" id="photo">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="{{ route('buildings.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
