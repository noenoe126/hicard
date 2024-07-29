<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('/img/1609823498ousc-logo.png') }}">

    <!-- <title>Dropdown Button</title> -->
    <!-- Include Bootstrap CSS -->
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css') }}">

    <title>USC Car Information</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/buttons.dataTables.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

@include('layouts.partials.navbar')


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

           

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

            

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="{{ Auth::user()->fullname }}" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth:: user() ->fullname }} </span>
                        <img class="img-profile rounded-circle"
                            src="../../img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('home.show') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                      
                        <a class="dropdown-item" href="{{ route('change.password.post') }}">
                            <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                            Change Password
                        </a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="{{ route('logout.perform') }}" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                        
                    </div>
                </li>

            </ul>
           
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
       
        @yield('content')
        </div>
        <!-- /.container-fluid -->

    </div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy;2024 USC Car Information System</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>

<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>

    
<!-- Include Select2 JS -->

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script src="{{ asset('/js/select2.min.js') }}"></script>

<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('/js/bootstrap-datepicker.en-GB.min.js') }}"></script>

<script src="{{ asset('/js/dataTables.buttons.min.js') }}"></script>

<script src="{{ asset('/js/jszip.min.js') }}"></script>

<script src="{{ asset('/js/buttons.html5.min.js') }}"></script>

<script src="{{ asset('/js/buttons.print.min.js') }}"></script>


<script>
$(document).ready(function() {
    // Apply Select2 to the element
    $(".js-example-basic-multiple-limit").select2({
        maximumSelectionLength: 2
    });
});
</script>
<script>
$(document).ready(function(){
    $('#construction').datepicker({
        format: 'yyyy', // Show only the year
        viewMode: 'years', // Set the initial view mode to years
        minViewMode: 'years', // Only show years in the view
        autoclose: true,
        orientation: 'bottom auto'
    });

    // Show the date picker when the button is clicked
    $('#constructionPicker').click(function(){
        $('#construction').focus();
    });
});

$(document).ready(function(){
    $('#completed').datepicker({
        format: 'yyyy', // Show only the year
        viewMode: 'years', // Set the initial view mode to years
        minViewMode: 'years', // Only show years in the view
        autoclose: true,
        orientation: 'bottom auto'
    });

    // Show the date picker when the button is clicked
    $('#completedPicker').click(function(){
        $('#completed').focus();
    });
});

$(document).ready(function(){
    $('#year').datepicker({
        format: 'yyyy', // Show only the year
        viewMode: 'years', // Set the initial view mode to years
        minViewMode: 'years', // Only show years in the view
        autoclose: true,
        orientation: 'bottom auto'
    });

    // Show the date picker when the button is clicked
    $('#yearPicker').click(function(){
        $('#year').focus();
    });

    
});

</script>
<script>
    $(document).ready(function() {
        $('#proc_date').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    });
</script>

<script>
$(document).ready(function() {
    // Initialize the date picker for start date
    $('#startDatePicker').datepicker({
        format: 'dd-mm-yyyy', // Set the date format to year-month-day
        autoclose: true, // Automatically close the datepicker after selection
        todayHighlight: true, // Highlight today's date
        orientation: 'bottom auto' // Automatically adjust the position of the datepicker
    });

    // Show the date picker when the button is clicked for start date
    $('#startDateButton').click(function(){
        $('#start_date').focus();
    });

    // Initialize the date picker for end date
    $('#endDatePicker').datepicker({
        format: 'dd-mm-yyyy', // Set the date format to year-month-day
        autoclose: true, // Automatically close the datepicker after selection
        todayHighlight: true, // Highlight today's date
        orientation: 'bottom auto' // Automatically adjust the position of the datepicker
    });

    // Show the date picker when the button is clicked for end date
    $('#endDateButton').click(function(){
        $('#end_date').focus();
    });

    $('#slicensExpPicker').datepicker({
        format: 'dd-mm-yyyy', // Set the date format to year-month-day
        autoclose: true, // Automatically close the datepicker after selection
        todayHighlight: true, // Highlight today's date
        orientation: 'bottom auto' // Automatically adjust the position of the datepicker
    });

    // Show the date picker when the button is clicked for start date
    $('#slicensExpButton').click(function(){
        $('#license_exp').focus();
    });
});
</script>

<script type="text/javascript">
    
    $('#uscdatatable').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
</script>
<script type="text/javascript">
    
    $('#car_address_table').DataTable();
</script>
<script type="text/javascript">
    
    $('#car_user_table').DataTable();
</script>

<!-- <script>
    $(document).ready(function() {
        $('#reportdatatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'print'
            ]
        });
    });
</script> -->
<script>
    $(document).ready(function() {
        var table = $('#reportdatatable1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'မော်တော်ယာဉ်ပြန်တမ်းစာရင်း',
                    text: 'Export to Excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                
            ]
        });

       
    });
</script>



<script>
        $(document).ready(function() {
            $('#reportdatatable2').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'စုစုပေါင်းမော်တော်ယာဉ်စာရင်း',
                        text: 'Export to Excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                        // messageTop: 'Date ' + new Date().toLocaleDateString()
                    },
                    // {
                    //     extend: 'print',
                    //     title: 'Vehicle Report',
                    //     text: 'Print',
                    //     messageTop: 'Date ' + new Date().toLocaleDateString()
                    // }
                ]
            });
        });
</script>

<script>
        $(document).ready(function() {
            $('#reportdatatable3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'ပြည်ထောင်စုတရားလွှတ်တော်ရုံးချုပ်မှလက်ရှိသုံးစွဲနေသောမော်တော်ယာဉ်များ',
                        text: 'Export to Excel',
                        exportOptions: {
                            columns: ':visible'
                        },
                        // messageTop: 'Date ' + new Date().toLocaleDateString()
                    },
                    // {
                    //     extend: 'print',
                    //     title: 'Vehicle Report',
                    //     text: 'Print',
                    //     messageTop: 'Date ' + new Date().toLocaleDateString()
                    // }
                ]
            });
        });
</script>


</body>
</html>
