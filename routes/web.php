<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\LiveBuildingController;
use App\Http\Controllers\BuildingTypeController;
use App\Http\Controllers\BuildingFactController;
use App\Http\Controllers\BuildingSituationController;
use App\Http\Controllers\OwnTypeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OfficeController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\RemarkController;
use App\Http\Controllers\CarAddressController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarUserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WheelController;
use App\Http\Controllers\EnginePowerController;
use App\Http\Controllers\CapacityController;
use App\Http\Controllers\FuelTypeController;
use App\Http\Controllers\TownshipController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\BudgetYearController;
use App\Http\Controllers\FileController;
use App\Exports\CarReportsExport;
use App\Exports\TotalCarReportsExport;
use Maatwebsite\Excel\Facades\Excel;


Route::group(['namespace' => 'App\Http\Controllers'], function() {  
 
    /**
     * Home Routes
     */
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        // Route::get('/register', 'RegisterController@show')->name('register.show');
        

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Homepage Route
         */
        Route::get('/', 'HomeController@index')->name('home.index');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        

        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        

        Route::resource('cars', CarController::class);
        Route::resource('carusers', CarUserController::class);
        Route::resource('manufacturers', ManufacturerController::class);
        Route::resource('wheels', WheelController::class);
        Route::resource('engine_powers', EnginePowerController::class);
        Route::resource('capacities', CapacityController::class);
        Route::resource('fuel_types', FuelTypeController::class);
        Route::resource('townships', TownshipController::class);
        Route::resource('state_divisions', StateDivisionController::class);
        Route::resource('grades', GradeController::class);
        Route::resource('receives', ReceiveController::class);
        Route::resource('vehicle_types', VehicleTypeController::class);

        Route::get('manufacturers/data', 'ManufacturerController@getData')->name('manufacturers.data');
        Route::resource('departments', DepartmentController::class);
        Route::resource('positions', PositionController::class);
        Route::resource('staffs', StaffController::class);
        Route::resource('locations', LocationController::class);
        Route::resource('models', ModelController::class);
        Route::resource('makes', MakeController::class);
        Route::resource('lands', LandController::class);
        Route::resource('buildings', BuildingController::class);
        Route::resource('funds', FundController::class);
        Route::resource('live_buildings', LiveBuildingController::class);
        Route::resource('building_types', BuildingTypeController::class);
        Route::resource('building_facts', BuildingFactController::class);
        Route::resource('building_situations', BuildingSituationController::class);
        Route::resource('own_types', OwnTypeController::class);
        Route::resource('organizations', OrganizationController::class);
        Route::resource('offices', OfficeController::class);


        Route::resource('remarks', RemarkController::class);
        Route::resource('landremarks', LandRemarkController::class);
        Route::resource('car_addresses', CarAddressController::class);
        Route::resource('buildingremarks', BuildingRemarkController::class);
        Route::resource('budget_years', BudgetYearController::class);
        
        

        Route::resource('home', HomeController::class);

        Route::get('/home/show', 'HomeController@show')->name('home.show');

        // routes/web.php
        //Route::post('/cars/{car}/store-remark', [CarController::class, 'storeRemark'])->name('cars.store-remark');
        Route::get('/remarks/create', [RemarkController::class, 'create'])->name('remarks.create');

        Route::get('/home', [HomeController::class, 'index'])->name('home');

       

        Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change.password.form');
        Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password.post');

       

        Route::get('/users/create', 'UserController@create')->name('users.create');
        Route::post('/users', 'UserController@store')->name('users.store');
        Route::get('/users', 'UserController@index')->name('users.index');
                
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        
        Route::get('/users/create', 'UserController@create')->name('users.create')->middleware('admin');
        Route::get('users/data', 'UserController@getData')->name('users.data');
        
        Route::get('/manufacturers/create', [ManufacturerController::class, 'create'])->name('manufacturers.create');
        Route::get('/cars/{car}/remark', [CarController::class, 'carRemark'])->name('cars.car_remark');
        

        
    
        Route::get('reports/usingcarreport', [CarController::class, 'usingcarreport'])->name('reports.usingcarreport');
        Route::get('reports/carreport', [CarController::class, 'carreport'])->name('reports.carreport');
        Route::get('reports/totalcarreport', [CarController::class, 'totalcarreport'])->name('reports.totalcarreport');

        //Export Excel
        Route::get('/export_car_reports', function () {
            return Excel::download(new CarReportsExport, 'မော်တော်ယာဉ်ပြန်တမ်းစာရင်း.xlsx');
        });
        Route::get('/export_total_car_reports', function () {
            return Excel::download(new TotalCarReportsExport, 'စုစုပေါင်းမော်တော်ယာဉ်စာရင်း.xlsx');
        });


        

       
        Route::get('test-route', function () {
            return 'Test route works!';
        });
    });
    
});
