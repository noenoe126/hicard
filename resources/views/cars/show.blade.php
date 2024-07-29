<!-- resources/views/cars/show.blade.php -->
@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="row justify-content-between mb-4">
        <div class="col">
            <h3 class="d-inline-block">မော်တော်ယာဥ်၏ အချက်အလက်အသေးစိတ် </h3>
        </div>
        <div class="col text-right">
            <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 mb-3">
            <img src="{{ asset('uploads/car_photos/' . $car->photo) }}" class="img-fluid" alt="Car Photo">
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ယာဉ်အမှတ်-</strong> {{ $car->plate_number }}</p>
                    <p><strong>ယာဉ်အမျိုးအမည်-</strong> {{ $manufacturerName }} {{ $modelName }}</p>
                    
                    <p><strong>ယာဉ်အမျိုးအစား-</strong> {{ $buildTypeName }}</p>
                    <p><strong>လိုင်စင်-</strong> 
                        @if ($car->licence == '1')
                            ရှိ
                        @elseif ($car->licence == '0')
                            မရှိ
                        @else
                            {{ $car->licence }}
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <p><strong>ထုတ်လုပ်သည့်ခုနှစ်-</strong> {{ $car->year }}</p>
                    <p><strong>ဘီးအရေအတွက်-</strong> {{ $car->wheel }} W</p>
                    <p><strong>အင်ဂျင်ပါဝါ-</strong> {{ $car->engine_power }} CC</p>
                    <p><strong>လူဦးရေ-</strong> {{ $car->capacity }} P</p>
                    <p><strong>အလေးချိန်-</strong> {{ $car->weight }} Kg</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <p><strong>လောင်စာအမျိုးအစား-</strong> {{ $fuelTypeName }}</p>
                    <p><strong>ကိုယ်ထည်နံပါတ်-</strong> {{ $car->body_no }}</p>
                    <p><strong>အင်ဂျင်နံပါတ်-</strong> {{ $car->engine_no }}</p>
                    <p><strong>ဝယ်ယူသောနှစ်-</strong> {{ $car->proc_date }}</p>
                    <p><strong>လိုင်စင်သက်တမ်းကုန်ဆုံးရက်-</strong> {{ \Carbon\Carbon::parse($car->license_exp)->format('d-m-Y') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>မြို့-</strong> {{ $townshipName }}</p>
                    <p><strong>ပြည်နယ်/တိုင်းဒေသကြီး-</strong> {{ $stateDivisionName }}</p>
                    <!-- <p><strong>ယာဉ်အခြေအနေ-</strong> 
                        @if ($car->condition == '1')
                            RN
                        @elseif ($car->condition == '0')
                            RP
                        @else
                            {{ $car->condition }}
                        @endif
                    </p> -->
                    <p><strong>ယာဉ်အခြေအနေ-</strong> {{ $car->condition }}</p>
                    <p><strong>Vehicle Use-</strong> {{ $car->vehicle_use }}</p>
                    <p><strong>ကလပ်-</strong> {{ $gradeName }}</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <p><strong>Budget Year-</strong> {{ $BudgetyrName }}</p>
                    <p><strong>Receive-</strong> {{ $receiveName }}</p>
                    <p><strong>Mileage (km/l)-</strong> {{ $car->mileage }}</p>
                    <p><strong>အရောင်-</strong> {{ $car->color }}</p>
                </div>
            </div>
        </div>
    </div>

    <hr>

<!-- ======================Address================================ -->
<div class="row mb-3">
    <div class="col-sm-6">
        <h3>Address</h3>
    </div>
    <div class="col-sm-6 text-right">
        @if($car_address_count > 0)
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addCarAddressModal">
                Transfer Address
            </button>
        @else
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addCarAddressModal">
                Add Address
            </button>
        @endif
    </div>
</div>
<table class="table table-bordered" id='car_address_table'>
    <thead>
        <tr>
            <th>စဉ်</th>
            <th>လိပ်စာ</th>
            <th>ဌာန</th> 
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($car_addresses as $car_address)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $car_address->car_address }}</td>
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
                                    @endif</td>
                                    <td>
    @if($car_address->status != 0)
        <a href="{{ route('car_addresses.edit', $car_address->id) }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editCarAddressModal-{{ $car_address->id }}">Edit</a>
        <form action="{{ route('car_addresses.destroy', $car_address->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <input type="hidden" name="car_id" value="{{ $car->id }}">
            <input type="hidden" name="id" value="{{ $car_address->id }}">
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
        </form>
    @endif
</td>

            
        </tr>
    @endforeach
    </tbody>
</table>

<!-- Add/Transfer Address Button -->
<!-- @if($car_address_count > 0)
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCarAddressModal">
        Transfer Address
    </button>
@else
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCarAddressModal">
        Add Address
    </button>
@endif -->
<!-- Modal -->
<div class="modal fade" id="addCarAddressModal" tabindex="-1" role="dialog" aria-labelledby="addCarAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarAddressModalLabel">Add Car Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('car_addresses.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="car_address"><strong>လိပ်စာ-</strong></label>
                        <textarea class="form-control" name="car_address" id="car_address" rows="3"></textarea>
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <input type="hidden" name="created_user" value="{{ Auth::user()->username }}">
                    </div>
                    <div class="form-group">
                        <label for="car_user_dept"><strong>ဌာန-</strong></label>
                        <select class="form-control js-example-basic-multiple-limit" name="car_user_dept" id="car_user_dept">
                                <option value="">တိုင်းဒေသကြီး/ပြည်နယ်တရားလွှတ်တော်များ/ခရိုင်တရားရုံးများရွေးရန်</option>
                                <option value="66">ပြည်ထောင်စုလွှတ်တော်တရားချုပ်ရုံး</option>
                                <option value="67">ကချင်ပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="68">ကယားပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="69">ကရင်ပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="70">ချင်းပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="71">စစ်ကိုင်းတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="72">တနင်္သာရီတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="73">ပဲခူးတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="74">မကွေးတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="75">မန္တလေးတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="76">မွန်ပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="77">ရခိုင်ပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="78">ရန်ကုန်တိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="79">ရှမ်းပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="80">ဧရာဝတီတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                            </select>
                           
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach ($car_addresses as $car_address)
<div class="modal fade" id="editCarAddressModal-{{ $car_address->id }}" tabindex="-1" role="dialog" aria-labelledby="editCarAddressModalLabel-{{ $car_address->id }}" aria-hidden="true">
        
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCarAddressModalLabel">Edit Car Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        
            <form method="post" action="{{ route('car_addresses.update', $car_address->id) }}">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="car_address"><strong>လိပ်စာ-</strong></label>
                        
                        <textarea class="form-control" name="car_address" id="car_address" required>{{ $car_address->car_address }}</textarea>

                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <input type="hidden" name="updated_user" value="{{ Auth::user()->username }}">
                    </div>
                    <div class="form-group">
                        <label for="car_user_dept"><strong>ဌာန-</strong></label>
                        <select class="form-control js-example-basic-multiple-limit" name="car_user_dept" id="car_user_dept">
                                <option value="">တိုင်းဒေသကြီး/ ပြည်နယ်တရားလွှတ်တော်များ/ခရိုင်တရားရုံးများရွေးရန်</option>
                                <option value="union" {{ $car_address->car_user_dept == 'union' ? 'selected' : '' }}>ပြည်ထောင်စုလွှတ်တော်တရားချုပ်ရုံး</option>
                                <option value="kachin" {{ $car_address->car_user_dept == 'kachin' ? 'selected' : '' }}>ကချင်ပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="kayah" {{ $car_address->car_user_dept == 'kayah' ? 'selected' : '' }}>ကယားပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="kayin" {{ $car_address->car_user_dept == 'kayin' ? 'selected' : '' }}>ကရင်ပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="chin" {{ $car_address->car_user_dept == 'chin' ? 'selected' : '' }}>ချင်းပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="sagaing" {{ $car_address->car_user_dept == 'sagaing' ? 'selected' : '' }}>စစ်ကိုင်းတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="tanintharyi" {{ $car_address->car_user_dept == 'tanintharyi' ? 'selected' : '' }}>တနင်္သာရီတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="bago" {{ $car_address->car_user_dept == 'bago' ? 'selected' : '' }}>ပဲခူးတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="magway" {{ $car_address->car_user_dept == 'magway' ? 'selected' : '' }}>မကွေးတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="mandalay" {{ $car_address->car_user_dept == 'mandalay' ? 'selected' : '' }}>မန္တလေးတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="mon" {{ $car_address->car_user_dept == 'mon' ? 'selected' : '' }}>မွန်ပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="yakhaing" {{ $car_address->car_user_dept == 'yakhaing' ? 'selected' : '' }}>ရခိုင်ပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="yangon" {{ $car_address->car_user_dept == 'yangon' ? 'selected' : '' }}>ရန်ကုန်တိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                                <option value="shan" {{ $car_address->car_user_dept == 'shan' ? 'selected' : '' }}>ရှမ်းပြည်နယ်တရားလွှတ်တော်</option>
                                <option value="ayeyarwady" {{ $car_address->car_user_dept == 'ayeyarwady' ? 'selected' : '' }}>ဧရာဝတီတိုင်းဒေသကြီးတရားလွှတ်တော်</option>
                            </select>
                           
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<hr>
<!-- ======================Add User================================ -->


<div class="row mb-3">
    <div class="col-sm-6">
        <h3>Car Users</h3>
    </div>
    <div class="col-sm-6 text-right">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createCarUserModal">
            Add User
        </button>
    </div>
</div>

<table class="table table-bordered" id="car_user_table">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Department</th>
            <th>Position</th>
            <th>NRC No</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($car->carusers as $caruser)
            @if ($caruser->staff)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $caruser->staff->name }}</td>
                    <td>{{ $caruser->staff->department->name }}</td>
                    <td>{{ $caruser->staff->position->name }}</td>
                    <td>{{ $caruser->staff->nrc_no }}</td>
                    <td>{{ \Carbon\Carbon::parse($caruser->start_date)->format('d-m-Y') }}</td>
                    <!-- <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($caruser->staff->start_date)->format('d-m-Y') }}</p> -->
                    <td>{{ $caruser->end_date ? \Carbon\Carbon::parse($caruser->end_date)->format('d-m-Y') : '' }}</td>
                    <td>
                            <a href="#" class="btn btn-primary btn-sm edit-car-user" data-toggle="modal" data-target="#editCarUserModal-{{ $caruser->id }}">Edit</a>
                            <form action="{{ route('carusers.destroy', $caruser->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="car_id" value="{{ $car->id }}">
                                <input type="hidden" name="id" value="{{ $caruser->id }}">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                     
                    </td>

                </tr>
            @endif
        @endforeach
    </tbody>
</table>





<div class="col-sm-6">
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createCarUserModal">
        Add User
    </button> -->

    <!-- The Modal -->
    <div class="modal fade" id="createCarUserModal" tabindex="-1" role="dialog" aria-labelledby="createCarUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCarUserModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('carusers.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="staff_id"><strong>Choose User:</strong></label>
                            <select class="form-control js-example-basic-multiple-limit" name="staff_id">
                                <option value="">Select User</option>
                                @foreach ($staffs as $staff)
                                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Include a hidden input field to pass car_id -->
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="start_date"><strong>Start Date:</strong></label>
                                <div class="input-group date" id="startDatePicker">
                                    <input type="text" class="form-control form-control-user" name="start_date" id="start_date"
                                        value="{{ old('start_date', isset($caruser) ? \Carbon\Carbon::parse($caruser->start_date)->format('d-m-Y') : '') }}"
                                        autocomplete="off" required>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary" id="startDateButton"><i
                                                class="fa fa-calendar"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="end_date"><strong>End Date:</strong></label>
                                <div class="input-group date" id="endDatePicker">
                                    <input type="text" class="form-control form-control-user" name="end_date" id="end_date"
                                        value="{{ old('end_date', isset($caruser) && $caruser->end_date ? \Carbon\Carbon::parse($caruser->end_date)->format('d-m-Y') : '') }}" autocomplete="off">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary" id="endDateButton"><i
                                                class="fa fa-calendar"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <input type="hidden" name="create_by" value="{{ Auth::user()->username }}">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($carusers as $caruser)
<div class="modal fade" id="editCarUserModal-{{ $caruser->id }}" tabindex="-1" role="dialog" aria-labelledby="editCarUserModalLabel-{{ $caruser->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCarUserModalLabel">Edit Car User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCarUserForm-{{ $caruser->id }}" method="post" action="{{ route('carusers.update', $caruser->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="staff_id"><strong>Choose User:</strong></label>
                        <select name="staff_id" class="form-control js-example-basic-multiple-limit" id="staff_id" required>
                            @foreach ($staffs as $staff)
                            <option value="{{ $staff->id }}" {{ $staff->id == $caruser->staff_id ? 'selected' : '' }}>
                                {{ $staff->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="start_date"><strong>Start Date:</strong></label>
                            <div class="input-group date" id="editStartDatePicker-{{ $caruser->id }}">
                                <input type="text" class="form-control form-control-user" name="start_date" id="edit_start_date_{{ $caruser->id }}" value="{{ old('start_date', isset($caruser) ? \Carbon\Carbon::parse($caruser->start_date)->format('d-m-Y') : '') }}" autocomplete="off" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="editStartDateButton-{{ $caruser->id }}"><i class="fa fa-calendar"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="end_date"><strong>End Date:</strong></label>
                            <div class="input-group date" id="editEndDatePicker-{{ $caruser->id }}">
                                <input type="text" class="form-control form-control-user" name="end_date" id="edit_end_date_{{ $caruser->id }}" value="{{ old('end_date', isset($caruser) && $caruser->end_date ? \Carbon\Carbon::parse($caruser->end_date)->format('d-m-Y') : '') }}" autocomplete="off">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="editEndDateButton-{{ $caruser->id }}"><i class="fa fa-calendar"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <input type="hidden" name="create_by" value="{{ Auth::user()->username }}">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach





<hr>
<!-- ======================Remarks================================ -->
<div class="col-sm-12">
        <label for="remark"><strong>Remark:</strong></label>
        @foreach($remarks as $remark)
            <div class="row">
                <div class="col-sm-10">
                    <p>{{ $remark->remark }}</p>
                </div>
                <div class="col-sm-2">
                <!-- Delete Button -->
                <form method="post" action="{{ route('remarks.destroy', $remark->id) }}" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this remark?');">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="carid" value="{{ $car->id }}">
                    <input type="hidden" name="id" value="{{ $remark->id }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    <br>

    <div class="col-sm-12">
        <form method="post" action="{{ route('remarks.store') }}">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="remark" id="remark" rows="3"></textarea>
                <input type="hidden" name="carid" value="{{ $car->id }}">
                <input type="hidden" name="created_user" value="{{ Auth::user()->username }}">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            
        </form>
    </div>
</div>
<script src="https://www.unionsupremecourt.gov.mm/Backend/js/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.en-GB.min.js"></script>

@foreach ($carusers as $car_user)
<script>
    $(document).ready(function() {
        // Date picker initialization for start date
        $('#editStartDatePicker-{{ $car_user->id }}').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });

        // Date picker initialization for end date
        $('#editEndDatePicker-{{ $car_user->id }}').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });

    });
</script>
@endforeach
@endsection

