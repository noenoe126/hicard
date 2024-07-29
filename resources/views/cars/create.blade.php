@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="text-center">
        <h2>မော်တော်ယာဥ်အသစ်ထည့်ရန် </h2>
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

    <form method="post" action="{{ route('cars.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-4 mb-3">
                <label for="plate_number"><strong>ယာဉ်အမှတ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="plate_number" id="plate_number" autocomplete="off" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="manufacturer_id"><strong>ထုတ်လုပ်သူ</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="manufacturer_id" id="manufacturer_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="model_id"><strong>မော်ဒယ်</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="model_id" id="model_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($models as $model)
                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="make_id"><strong>ထုတ်လုပ်သည့်နိုင်ငံ</strong></label>
                <select class="form-control js-example-basic-multiple-limit" name="make_id" id="make_id">
                    <option value="">ရွေးရန်</option>
                    @foreach ($makes as $make)
                    <option value="{{ $make->id }}">{{ $make->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
              <label for="build_type_id"><strong>ယာဉ်အမျိုးအစား</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="build_type_id" id="build_type_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($build_types as $build_type)
                    <option value="{{ $build_type->id }}">{{ $build_type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="year"><strong>ထုတ်လုပ်သည့်ခုနှစ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="year" id="year" autocomplete="off" required>
            </div>


            <div class="col-sm-4 mb-3">
                <label for="wheel"><strong>ဘီးအရေအတွက်</strong><span style="color: red;" >*</span></label>
                <input type="number" class="form-control" step="0.01" name="wheel" id="wheel" autocomplete="off" required>
            </div>

            <div class="col-sm-4 mb-3">
            <label for="engine_power"><strong>အင်ဂျင်ပါဝါ</strong><span style="color: red;" >*</span></label>
            <input type="number" class="form-control" step="0.01" name="engine_power" id="engine_power" autocomplete="off" required>
            </div>

            <div class="col-sm-4 mb-3">
            <label for="capacity"><strong>လူဦးရေ</strong><span style="color: red;" >*</span></label>
            <input type="number" class="form-control" step="0.01" name="capacity" id="capacity" autocomplete="off" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="weight"><strong>အလေးချိန်</strong><span style="color: red;" >*</span></label>
                <input type="number" class="form-control" step="0.01" name="weight" id="weight" autocomplete="off" required>
            </div>

            <div class="col-sm-4 mb-3">
             <label for="fuel_type_id"><strong>လောင်စာအမျိုးအစား</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="fuel_type_id" id="fuel_type_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($fuel_types as $fuel_type)
                    <option value="{{ $fuel_type->id }}">{{ $fuel_type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="body_no"><strong>ကိုယ်ထည်နံပါတ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="body_no" id="body_no" autocomplete="off" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="engine_no"><strong>အင်ဂျင်နံပါတ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="engine_no" id="engine_no" autocomplete="off" required>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="proc_date"><strong>ဝယ်ယူသောနှစ်</strong><span style="color: red;" >*</span></label>
                <input type="text" class="form-control" name="proc_date" id="proc_date" autocomplete="off" required>
            </div>

            
            <div class="col-sm-4 mb-3">
               <label for="license_exp"><strong>လိုင်စင်သက်တမ်းကုန်ဆုံးရက်</strong><span style="color: red;" >*</span></label>
                    <div class="input-group date" id="slicensExpPicker">
                    <input type="text" class="form-control form-control-user" name="license_exp" id="license_exp" autocomplete="off" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary" id="slicensExpButton"><i class="fa fa-calendar"></i></button>
                    </div>
                    </div>   
            </div>

            <div class="col-sm-4 mb-3">
                <label for="township_id"><strong>မြို့</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="township_id" id="township_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($townships as $township)
                    <option value="{{ $township->id }}">{{ $township->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="state_division_id"><strong>ပြည်နယ်/တိုင်းဒေသကြီး</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="state_division_id" id="state_division_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($state_divisions as $state_division)
                    <option value="{{ $state_division->id }}">{{ $state_division->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                
                <label for="condition"><strong>ယာဉ်အခြေအနေ</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="condition" id="condition" required>
                    <option value="">ရွေးရန်</option>
                    <option value="RN">RN</option>
                    <option value="RP">RP</option>
                    <option value="SW">SW</option>
                    <option value="US">US</option>
                    <option value="S">S</option>
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="vehicle_use"><strong>Use Of Vehicle</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="vehicle_use" id="vehicle_use" required>
                    <option value="">ရွေးရန်</option>
                    <option value="A">A</option>
                    <option value="F">F</option>
                    <option value="J">J</option>
                    <option value="R">R</option>
                    <option value="S">S</option>
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="grade_id"><strong>ကလပ်</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="grade_id" id="grade_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="budget_year_id"><strong>Budget Year</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="budget_year_id" id="budget_year_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($budget_years as $budget_year)
                    <option value="{{ $budget_year->id }}">{{ $budget_year->name }}</option>
                    @endforeach
                </select>
                
            </div>

            <div class="col-sm-4 mb-3">
                <label for="receive_id"><strong>Receive</strong><span style="color: red;" >*</span></label>
                <select class="form-control js-example-basic-multiple-limit" name="receive_id" id="receive_id" required>
                    <option value="">ရွေးရန်</option>
                    @foreach ($receives as $receive)
                    <option value="{{ $receive->id }}">{{ $receive->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label for="photo"><strong>ပုံ ( jpeg,png,jpg/ max:2048, 2MB )</strong></label>
                <input type="file" class="form-control" name="photo" id="photo" >
            </div>
            
            <div class="col-sm-4 mb-3">
                <label for="mileage"><strong>မိုင်နှုန်း(km/l)</strong></label>
                <input type="number" class="form-control" step="0.01" name="mileage" id="mileage" autocomplete="off">
            </div>

            <div class="col-sm-4 mb-3">
                <label for="color"><strong>အရောင်</strong></label>
                <select class="form-control js-example-basic-multiple-limit" name="color" id="color">
                    <option value="">ရွေးရန်</option>
                    <option value="Black">Black</option>
                    <option value="Blue">Blue</option>
                    <option value="Dark Blue">Dark Blue</option>
                    <option value="Grey">Grey</option>
                    <option value="Green">Green</option>
                    <option value="Pearl Gold">Pearl Gold</option>
                    <option value="Pearl White">Pearl White</option>
                    <option value="Red">Red</option>
                    <option value="Silver">Silver</option>
                    <option value="White">White</option>
                </select>
            </div>

            <div class="col-sm-4 mb-3">
                <label><strong>လိုင်စင်</strong></label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="with_licence" name="licence" value="1" checked>
                    <label class="form-check-label" for="with_licence">ရှိ</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="without_licence" name="licence" value="0">
                    <label class="form-check-label" for="without_licence">မရှိ</label>
                </div>
            </div> 
            
            
            <div class="col-sm-12">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
       
    </form>
    <hr>
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
                                        <!-- <th>Car to</th> -->
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
