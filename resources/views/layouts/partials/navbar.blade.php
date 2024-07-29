
<!-- Sidebar -->
<nav class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
<ul class="navbar-nav  sidebar " id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center " href="{{ route('home.index') }}">
        
            <div class="sidebar-brand-icon">
                <!-- <i class="fas fa-laugh-wink"></i> -->
                <img width="100%"  src="{{ asset('img/ousc-logo.png') }}" alt="Logo">
            </div>
             <!-- <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>  -->
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        
        <li class="nav-item">
                <a class="nav-link" href="{{ route('home.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>


        <li class="nav-item">
    <a class="nav-link collapsed {{ request()->is([
            'cars', 'cars/*', 
            'manufacturers', 'manufacturers/*',
            'models', 'models/*', 'models/create',
            'makes', 'makes/*', 'makes/create',
            'wheels', 'wheels/create',
            'engine_powers', 'engine_powers/create',
            'capacities', 'capacities/create',
            'fuel_types', 'fuel_types/create',
            
            
            'grades', 'grades/create',
            'receives', 'receives/create',
            'budget_years', 'budget_years/create',
            'vehicle_types', 'vehicle_types/create',
            'reports', 'reports/usingcarreport',
            'reports/carreport', 'reports/totalcarreport'
        ]) ? 'active' : '' }}" 
        href="#" data-toggle="collapse" data-target="#collapseCars" aria-expanded="true" aria-controls="collapseCars">
        <i class="fas fa-fw fa-car"></i>
        <span>မော်တော်ယာဉ်များ</span>
        </a>
        <div id="collapseCars" class="collapse {{ request()->is([
            'cars', 'cars/*', 'cars/create', 
            'manufacturers', 'manufacturers/create', 'manufacturers/*', 
            'models/*', 'models', 'models/create', 'models/*',
            'makes', 'makes/create', 'makes/*',
            'wheels', 'wheels/create', 'wheels/*',
            'engine_powers', 'engine_powers/create', 'engine_powers/*',
            'capacities', 'capacities/create', 'capacities/*',
            'fuel_types', 'fuel_types/create', 'fuel_types/*',
            
            'grades', 'grades/create', 'grades/*',
            'receives', 'receives/create', 'receives/*',
            'budget_years', 'budget_years/create', 'budget_years/*',
            'vehicle_types', 'vehicle_types/create', 'vehicle_types/*',
            'reports', 'reports/usingcarreport', 'reports/*',
            'reports/carreport', 'reports/*',
            'reports/totalcarreport', 'reports/*'
        ]) ? 'show' : '' }}" 
        aria-labelledby="headingCars" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Information:</h6>
            <a class="collapse-item {{ request()->is('cars') ? 'active' : '' }}" href="{{ route('cars.index') }}">မော်တော်ယာဉ်စာရင်း</a>
            <a class="collapse-item {{ request()->is('cars/create') ? 'active' : '' }}" href="{{ route('cars.create') }}">မော်တော်ယာဉ်အသစ်ထည့်ရန်</a>
            <a class="collapse-item {{ request()->is('reports/usingcarreport') || request()->is('reports/usingcarreport') ? 'active' : '' }}" href="{{ route('reports.usingcarreport') }}">လက်ရှိသုံးစွဲနေသောစာရင်း</a>
            <a class="collapse-item {{ request()->is('reports/carreport') || request()->is('reports/carreport') ? 'active' : '' }}" href="{{ route('reports.carreport') }}">ပြန်တမ်းစာရင်း</a>
            <a class="collapse-item {{ request()->is('reports/totalcarreport') || request()->is('reports/totalcarreport') ? 'active' : '' }}" href="{{ route('reports.totalcarreport') }}">စုစုပေါင်းမော်တော်ယာဉ်စာရင်း</a>

            @if (Auth::user()->role == 'admin')
            <a class="collapse-item {{ request()->is('manufacturers') || request()->is('manufacturers/*') ? 'active' : '' }}" href="{{ route('manufacturers.index') }}">ထုတ်လုပ်သူ</a>
            <a class="collapse-item {{ request()->is('models') || request()->is('models/*') ? 'active' : '' }}" href="{{ route('models.index') }}">မော်ဒယ်</a>
            <a class="collapse-item {{ request()->is('makes') || request()->is('makes/*') ? 'active' : '' }}" href="{{ route('makes.index') }}">ထုတ်လုပ်သည့်နိုင်ငံ</a>
            <a class="collapse-item {{ request()->is('vehicle_types') || request()->is('vehicle_types/*') ? 'active' : '' }}" href="{{ route('vehicle_types.index') }}">မော်တော်ယာဉ်အမျိုးအစား</a>
            <!-- <a class="collapse-item {{ request()->is('wheels') || request()->is('wheels/*') ? 'active' : '' }}" href="{{ route('wheels.index') }}">ဘီးအရေအတွက်</a>
            <a class="collapse-item {{ request()->is('engine_powers') || request()->is('engine_powers/*') ? 'active' : '' }}" href="{{ route('engine_powers.index') }}">အင်ဂျင်ပါဝါ</a>
            <a class="collapse-item {{ request()->is('capacities') || request()->is('capacities/*') ? 'active' : '' }}" href="{{ route('capacities.index') }}">လူဦးရေ</a> -->
            <a class="collapse-item {{ request()->is('fuel_types') || request()->is('fuel_types/*') ? 'active' : '' }}" href="{{ route('fuel_types.index') }}">လောင်စာအမျိုးအစား</a>
            
            
            <a class="collapse-item {{ request()->is('grades') || request()->is('grades/*') ? 'active' : '' }}" href="{{ route('grades.index') }}">ကလပ်</a>
            <a class="collapse-item {{ request()->is('receives') || request()->is('receives/*') ? 'active' : '' }}" href="{{ route('receives.index') }}">Receives</a>
            <a class="collapse-item {{ request()->is('budget_years') || request()->is('budget_years/*') ? 'active' : '' }}" href="{{ route('budget_years.index') }}">Budget Year</a>
            @endif
        </div>
    </div>
</li>




        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link collapsed {{ request()->is('lands/*')  ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseLand" aria-expanded="true" 
                aria-controls="collapseLand">
                <i class="fas fa-fw fa-map"></i>
                <span>မြေများ</span>
            </a>
            <div id="collapseLand" class="collapse {{ request()->is('lands') || request()->is('lands/create') || request()->is('lands/*') ? 'show' : '' }}" aria-labelledby="headingLand" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Information:</h6>
                    <a class="collapse-item {{ request()->is('lands') ? 'active' : '' }}" href="{{ route('lands.index') }}" >Land List</a>
                    <a class="collapse-item {{ request()->is('lands/*') ? 'active' : '' }}" href="{{ route('lands.create') }}" >Create Land</a>
                </div>
            </div> 
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed {{ request()->is('buildings') || request()->is('buildings/create') 
            || request()->is('funds') || request()->is('funds/create') 
            || request()->is('live_buildings') || request()->is('live_buildings/create') 
            || request()->is('building_types') || request()->is('building_types/create')
            || request()->is('building_facts') || request()->is('building_facts/create')
            || request()->is('building_situations') || request()->is('building_situations/create')
            || request()->is('own_types') || request()->is('own_types/create')
            || request()->is('organizations') || request()->is('organizations/create')
            || request()->is('offices') || request()->is('offices/create') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseBuild"
                aria-expanded="true" aria-controls="collapseBuild">
                <i class="fas fa-fw fa-building"></i>
                <span>အဆောက်အဦများ</span>
            </a>
            <div id="collapseBuild" class="collapse {{ request()->is('buildings') || request()->is('buildings/create') || 
            request()->is('funds') || request()->is('funds/create') || request()->is('funds/*') 
            || request()->is('buildings/*') || request()->is('live_buildings') || request()->is('live_buildings/create') || request()->is('live_buildings/*')
            || request()->is('building_types') || request()->is('building_types/create') || request()->is('building_types/*')
            || request()->is('building_facts') || request()->is('building_facts/create') || request()->is('building_facts/*')
            || request()->is('building_situations') || request()->is('building_situations/create') || request()->is('building_situations/*')
            || request()->is('own_types') || request()->is('own_types/create') || request()->is('own_types/*')
            || request()->is('organizations') || request()->is('organizations/create') || request()->is('organizations/*')
            || request()->is('offices') || request()->is('offices/create') || request()->is('offices/*') ? 'show' : '' }}" aria-labelledby="headingBuild" data-parent="#accordionSidebar">

                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Information:</h6>
                    <a class="collapse-item {{ request()->is('buildings') ? 'active' : '' }}" href="{{ route('buildings.index') }}" >အဆောက်အဦအရေအတွက်</a>
                    <a class="collapse-item {{ request()->is('buildings/*') ? 'active' : '' }}" href="{{ route('buildings.create') }}" >အဆောက်အဦအသစ်ထည့်ရန်</a>
                    <a class="collapse-item {{ request()->is('live_buildings/*') ? 'active' : '' }}" href="{{ route('live_buildings.create') }}">လူနေအဆောက်အဦ</a>
                    <a class="collapse-item {{ request()->is('building_types/*') ? 'active' : '' }}" href="{{ route('building_types.create') }}">အမျိုးအစား</a>
                    <a class="collapse-item {{ request()->is('building_facts/*') ? 'active' : '' }}" href="{{ route('building_facts.create') }}">အချက်အလက်</a>
                    <a class="collapse-item {{ request()->is('building_situations/*') ? 'active' : '' }}" href="{{ route('building_situations.create') }}">လက်ရှိအခြေအနေ</a>
                    <a class="collapse-item {{ request()->is('own_types/*') ? 'active' : '' }}" href="{{ route('own_types.create') }}">ပိုင်ဆိုင်မှုအမျိုးအစား</a>
                    <a class="collapse-item {{ request()->is('funds/*') ? 'active' : '' }}" href="{{ route('funds.create') }}">ဆောင်ရွက်ခဲ့သည့်ရန်ပုံငွေ</a>
                    <a class="collapse-item {{ request()->is('organizations/*') ? 'active' : '' }}" href="{{ route('organizations.create') }}">အဖွဲ့အစည်း</a>
                    <a class="collapse-item {{ request()->is('offices/*') ? 'active' : '' }}" href="{{ route('offices.create') }}">ရုံး/ ဦးစီးဌာန</a>
                </div>
            </div>   
        </li> 

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link collapsed {{ request()->is('townships') || request()->is('townships/create') || request()->is('state_divisions') || request()->is('state_divisions/create')  ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseLocation"
                aria-expanded="true" aria-controls="collapseLocation">
                <i class='fas fa-location-arrow'></i>
                <span>တည်နေရာ</span>
            </a>
            <div id="collapseLocation" class="collapse {{ request()->is('townships') || request()->is('townships/create') || request()->is('townships/*') || request()->is('state_divisions') || request()->is('state_divisions/create') || request()->is('state_divisions/*') ? 'show' : '' }}" aria-labelledby="headingLocation" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Information:</h6>
                    <a class="collapse-item {{ request()->is('townships') || request()->is('townships/*') ? 'active' : '' }}" href="{{ route('townships.index') }}">မြို့</a>
                    <a class="collapse-item {{ request()->is('state_divisions') || request()->is('state_divisions/*') ? 'active' : '' }}" href="{{ route('state_divisions.index') }}">ပြည်နယ်/ တိုင်းဒေသကြီး</a>
                    
                    
                    
                </div>
            </div> 
            <hr class="sidebar-divider d-none d-md-block">

        @if (Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link collapsed {{ request()->is('departments') || request()->is('departments/create') || request()->is('positions') || request()->is('positions/create') || request()->is('staffs') || request()->is('staffs/create') || request()->is('staffs/*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseStaff"
                aria-expanded="true" aria-controls="collapseStaff">
                <i class="fas fa-fw fa-users"></i>
                <span>ဝန်ထမ်းများ</span>
            </a>
            <div id="collapseStaff" class="collapse {{ request()->is('departments') || request()->is('departments/create') || request()->is('departments/*') || request()->is('positions') || request()->is('positions/create') || request()->is('positions/*') || request()->is('staffs') || request()->is('staffs/create') || request()->is('staffs/*') ? 'show' : '' }}" aria-labelledby="headingStaff" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Information:</h6>
                    <a class="collapse-item {{ request()->is('staffs/create') ? 'active' : '' }}" href="{{ route('staffs.create') }}" >Staff Create</a>
                    <a class="collapse-item {{ request()->is('staffs') ? 'active' : '' }}" href="{{ route('staffs.index') }}" >Staff List</a>
                    <a class="collapse-item {{ request()->is('departments') ? 'active' : '' }}" href="{{ route('departments.index') }}" >Department List</a>
                    <a class="collapse-item {{ request()->is('positions') ? 'active' : '' }}" href="{{ route('positions.index') }}" >Position List</a>
                    <!-- <a class="collapse-item {{ request()->is('departments/create') ? 'active' : '' }}" href="{{ route('departments.create') }}" >departments Create</a> -->
                    
                </div>
            </div> 

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link collapsed {{ request()->is('users') || request()->is('users/create') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseUser"
                aria-expanded="true" aria-controls="collapseUser">
                <i class="fas fa-fw fa-cogs"></i>
                <span>သတ်မှတ်ချက်များ</span>
            </a>
            <div id="collapseUser" class="collapse {{ request()->is('users') || request()->is('users/create') || request()->is('users/*') ? 'show' : '' }}" aria-labelledby="headingUser" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Information:</h6>
                    <a class="collapse-item {{ request()->is('users') ? 'active' : '' }}" href="{{ route('users.index') }}" >User List</a>
                    <a class="collapse-item {{ request()->is('users/create') ? 'active' : '' }}" href="{{ route('users.create') }}" >User Create</a>
                    
                </div>
            </div> 
        @endif  
        </li> 
</ul>

<div class="container">
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout.perform') }}">Logout</a>
                </div>
                
            </div>
        </div>
        
        
    </div>
   
    </div>
</nav>
    

