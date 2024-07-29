@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="text-center">
        <h2>မော်တော်ယာဥ်ပြင်ရန်</h2>
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

    <form method="post" action="{{ route('cars.update', $car->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="col-sm-4 mb-3">
                <label for="plate_number"><strong>ယာဉ်အမှတ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="plate_number" id="plate_number" value="{{ $car->plate_number }}" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="manufacturer_id"><strong>ထုတ်လုပ်သူ</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="manufacturer_id" id="manufacturer_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}" {{ $car->manufacturer_id == $manufacturer->id ? 'selected' : '' }}>
                        {{ $manufacturer->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="model_id"><strong>မော်ဒယ်</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="model_id" id="model_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($models as $model)
                    <option value="{{ $model->id }}" {{ $car->model_id == $model->id ? 'selected' : '' }}>
                        {{ $model->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="make_id"><strong>ထုတ်လုပ်သည့်နိုင်ငံ</strong></label>
                <select class="form-control js-example-basic-multiple-limit" name="make_id" id="make_id">
                    <option value="">ရွေးရန်</option>
                    @foreach ($makes as $make)
                    <option value="{{ $make->id }}" {{ $car->make_id == $make->id ? 'selected' : '' }}>
                        {{ $make->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="build_type_id"><strong>ယာဉ်အမျိုးအစား</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="build_type_id" id="build_type_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($build_types as $build_type)
                    <option value="{{ $build_type->id }}" {{ $car->build_type_id == $build_type->id ? 'selected' : '' }}>
                        {{ $build_type->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="year"><strong>ထုတ်လုပ်သည့်ခုနှစ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="year" id="year" value="{{ $car->year }}" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="wheel"><strong>ဘီးအရေအတွက်</strong><span style="color: red;" >*</span></label>
                <input type="number" class="form-control" step="0.01" name="wheel" id="wheel" value="{{ $car->wheel }}" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="engine_power"><strong>အင်ဂျင်ပါဝါ</strong><span style="color: red;" >*</span></label>
                <input type="number" class="form-control" step="0.01" name="engine_power" id="engine_power" value="{{ $car->engine_power }}" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="capacity"><strong>လူဦးရေ</strong><span style="color: red;" >*</span></label>
                <input type="number" class="form-control" step="0.01" name="capacity" id="capacity" value="{{ $car->capacity }}" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="weight"><strong>အလေးချိန်</strong><span style="color: red;" >*</span></label>
                <input type="number" class="form-control" step="0.01" name="weight" id="weight" value="{{ $car->weight }}" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="fuel_type_id"><strong>လောင်စာအမျိုးအစား</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="fuel_type_id" id="fuel_type_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($fuel_types as $fuel_type)
                    <option value="{{ $fuel_type->id }}" {{ $car->fuel_type_id == $fuel_type->id ? 'selected' : '' }}>
                        {{ $fuel_type->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="body_no"><strong>ကိုယ်ထည်နံပါတ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="body_no" id="body_no" value="{{ $car->body_no }}" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="engine_no"><strong>အင်ဂျင်နံပါတ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="engine_no" id="engine_no" value="{{ $car->engine_no }}" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="proc_date"><strong>ဝယ်ယူသောနှစ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="proc_date" id="proc_date" value="{{ $car->proc_date }}" required>
            </div>

            <div class="col-sm-4 mb-3 ">
                <label for="license_exp"><strong>လိုင်စင်သက်တမ်းကုန်ဆုံးရက်-</strong><span style="color: red;" >*</span></label>
                <div class="input-group date" id="slicensExpPicker">
                    <input type="text" class="form-control form-control-user" name="license_exp" id="license_exp"
                    value="{{ old('license_exp', isset($car) ? \Carbon\Carbon::parse($car->license_exp)->format('d-m-Y') : '') }}"
                    autocomplete="off" required>
                
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary" id="slicensExpButton">
                        <i
                    class="fa fa-calendar"></i></button>
                </div>
                </div>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="township_id"><strong>မြို့</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="township_id" id="township_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($townships as $township)
                    <option value="{{ $township->id }}" {{ $car->township_id == $township->id ? 'selected' : '' }}>
                        {{ $township->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="state_division_id"><strong>ပြည်နယ်/တိုင်းဒေသကြီး</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="state_division_id" id="state_division_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($state_divisions as $state_division)
                    <option value="{{ $state_division->id }}" {{ $car->state_division_id == $state_division->id ? 'selected' : '' }}>
                        {{ $state_division->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="condition"><strong>ယာဉ်အခြေအနေ</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="condition" id="condition" required>
                    <option value="">ရွေးရန်</option>
                    <option value="RN" {{ $car->condition == 'RN' ? 'selected' : '' }}>RN</option>
                    <option value="RP" {{ $car->condition == 'RP' ? 'selected' : '' }}>RP</option>
                    <option value="SW" {{ $car->condition == 'SW' ? 'selected' : '' }}>SW</option>
                    <option value="US" {{ $car->condition == 'US' ? 'selected' : '' }}>US</option>
                    <option value="S" {{ $car->condition == 'S' ? 'selected' : '' }}>S</option>
                    
                </select>
                <!-- <label><strong>ယာဉ်အခြေအနေ</strong></label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="new" name="condition" value="1" {{ $car->condition == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="new">RN</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="used" name="condition" value="0" {{ $car->condition == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="used">RP</label>
                </div> -->
            </div>

            <div class="col-sm-4 mb-3">
                <label for="vehicle_use"><strong>Use Of Vehicle</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="vehicle_use" id="vehicle_use" required>
                    <option value="">ရွေးရန်</option>
                    <option value="A" {{ $car->vehicle_use == 'A' ? 'selected' : '' }}>A</option>
                    <option value="F" {{ $car->vehicle_use == 'F' ? 'selected' : '' }}>F</option>
                    <option value="J" {{ $car->vehicle_use == 'J' ? 'selected' : '' }}>J</option>
                    <option value="R" {{ $car->vehicle_use == 'R' ? 'selected' : '' }}>R</option>
                    <option value="S" {{ $car->vehicle_use == 'S' ? 'selected' : '' }}>S</option>
                    
                </select>
            </div>




            <div class="col-sm-4 mb-3">
             <label for="grade_id"><strong>ကလပ်</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="grade_id" id="grade_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}" {{ $car->grade_id == $grade->id ? 'selected' : '' }}>
                        {{ $grade->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="budget_year_id"><strong>Budget Year</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="budget_year_id" id="budget_year_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($budget_years as $budget_year)
                    <option value="{{ $budget_year->id }}" {{ $car->budget_year_id == $budget_year->id ? 'selected' : '' }}>
                        {{ $budget_year->name }}
                    </option>
                    @endforeach
                </select>
                
            </div>

            <div class="col-sm-4 mb-3">
                <label for="receive_id"><strong>Receive</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="receive_id" id="receive_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($receives as $receive)
                    <option value="{{ $receive->id }}" {{ $car->receive_id == $receive->id ? 'selected' : '' }}>
                        {{ $receive->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="mileage"><strong>Mileage (km/l)</strong></label>
                <input type="number" class="form-control" step="0.01" name="mileage" id="mileage" value="{{ $car->mileage }}">
            </div>

           

            <div class="col-sm-4 mb-3">
                <label for="color"><strong>အရောင်</strong></label>
                <select class="form-control js-example-basic-multiple-limit" name="color" id="color">
                    <option value="">ရွေးရန်</option>
                    <option value="Black" {{ $car->color == 'Black' ? 'selected' : '' }}>Black</option>
                    <option value="Blue" {{ $car->color == 'Blue' ? 'selected' : '' }}>Blue</option>
                    <option value="Dark Blue" {{ $car->color == 'Dark Blue' ? 'selected' : '' }}>Dark Blue</option>
                    <option value="Grey" {{ $car->color == 'Grey' ? 'selected' : '' }}>Grey</option>
                    <option value="Green" {{ $car->color == 'Green' ? 'selected' : '' }}>Green</option>
                    <option value="Pearl Gold" {{ $car->color == 'Pearl Gold' ? 'selected' : '' }}>Pearl Gold</option>
                    <option value="Pearl White" {{ $car->color == 'Pearl White' ? 'selected' : '' }}>Pearl White</option>
                    <option value="Red" {{ $car->color == 'Red' ? 'selected' : '' }}>Red</option>
                    <option value="Silver" {{ $car->color == 'Silver' ? 'selected' : '' }}>Silver</option>
                    <option value="White" {{ $car->color == 'White' ? 'selected' : '' }}>White</option>
                </select>
            </div>
            
            <div class="col-sm-4 mb-3">
                <label><strong>လိုင်စင်</strong></label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="with_licence" name="licence" value="1" {{ $car->licence == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="with_licence">ရှိ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="without_licence" name="licence" value="0" {{ $car->licence == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="without_licence">မရှိ</label>
                </div>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="photo"><strong>ပုံ</strong></label>
                @if ($car->photo)
                <div class="mb-2">
                    <img src="{{ asset('uploads/car_photos/' . $car->photo) }}" alt="Car Photo" width="50">
                </div>
                @else
                No Photo Available
                @endif
                <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>

@endsection