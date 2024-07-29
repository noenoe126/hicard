<!-- resources/views/cars/show.blade.php -->
@extends('layouts.app-master')

@section('content')

<div class="container">
    <div class="row justify-content-between mb-4">
        <div class="col">
            <h3 class="d-inline-block">အဆောက်အဦ၏ အချက်အလက်အသေးစိတ် </h3>
        </div>
        <div class="col text-right">
            <a href="{{ route('buildings.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <p><img src="{{ asset('uploads/car_photos/' . $building->photo) }}" width= "200"></p>
        </div> 
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>အဖွဲ့အစည်း-</strong> {{ $organizationName }}</p>
                    <p><strong>ရုံး/ ဦးစီးဌာန-</strong> {{ $officeName }}</p>
                    <p><strong>ပြည်နယ်/ တိုင်း-</strong> {{ $stateDivisionName }}</p>
                    <p><strong>မြို့နယ်-</strong> {{ $townshipName }}</p>
                    <p style="overflow-wrap: break-word;"><strong>လိပ်စာ-</strong> {{ $building->address }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>လူနေအဆောက်အဦ-</strong> {{ $liveBuildingName }}</p>
                    <p><strong>အဆောက်အဦအမျိုးအစား-</strong> {{ $buildingTypeName }}</p>
                    <p><strong>အဆောက်အဦအချက်အလက်-</strong> {{ $buildingFactName }}</p>
                    <p><strong>လက်ရှိအသုံးပြုမှု-</strong> 
                        @if ($building->current_use == '1')
                            ရှိ
                        @elseif ($building->current_use == '0')
                            မရှိ
                        @else
                            {{ $building->current_use }}
                        @endif
                    </p>
                    <p><strong>ဆောက်လုပ်သည့်ခုနှစ်-</strong> {{ $building->construction }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ဆက်လက်အသုံးပြုနိုင်မည့်ကာလ-</strong> {{ $building->use_period }}</p>
                    <p><strong>အဆောက်အဦတန်ဖိုး-</strong> {{ $building->cost }} သန်း(ကျပ်)</p>
                    <p><strong>ဆောက်အဦသက်တမ်း-</strong> {{ $building->building_old }}</p>
                    <p><strong>အဆောက်အဦလက်ရှိအခြေအနေ-</strong> {{ $buildingSituationName }}</p>
                    <p><strong>ပုံသေပိုင်ပစ္စည်း-</strong> 
                        @if ($building->own_list == '1')
                            ဟုတ်
                        @elseif ($building->own_list == '0')
                            မဟုတ်
                        @else
                            {{ $building->own_list }}
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <p><strong>ပိုင်ဆိုင်မှုအမျိုးအစား-</strong> {{ $ownTypeName }}</p>
                    <p><strong>ဆောင်ရွက်ခဲ့သည့်ဘဏ္ဍာရန်ပုံငွေ-</strong> {{ $fundName }}</p>
                    <p><strong>ရှေ့ဟောင်းသမိုင်းဝင်-</strong> 
                        @if ($building->history == '1')
                            ဟုတ်
                        @elseif ($building->history == '0')
                            မဟုတ်
                        @else
                            {{ $building->history }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="mt-4">
        <h4>Remarks</h4>
        @foreach($buildingremarks as $buildingremark)
            <div class="row mb-2">
                <div class="col-md-10">
                    <p>{{ $buildingremark->buildingremark }}</p>
                </div>
                <div class="col-md-2 text-right">
                    <form method="post" action="{{ route('buildingremarks.destroy', $buildingremark->id) }}" onsubmit="return confirm('Are you sure you want to delete this remark?');">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="buildingid" value="{{ $building->id }}">
                        <input type="hidden" name="id" value="{{ $buildingremark->id }}">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        <form method="post" action="{{ route('buildingremarks.store') }}" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="buildingremark"><strong>Add Remark:</strong></label>
                <textarea class="form-control" name="buildingremark" id="buildingremark" rows="3"></textarea>
                <input type="hidden" name="buildingid" value="{{ $building->id }}">
                <input type="hidden" name="created_user" value="{{ Auth::user()->username }}">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
           
        </form>
    </div>
</div>

@endsection
