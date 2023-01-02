<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>show Employee details</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}" />


    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>
<link rel="stylesheet" href="{{ asset('css/table.css') }} ">
<title>Employee Page</title>
</head>
<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgb(101, 162, 246), rgb(133, 187, 253))
    }

    h6 {
        font-weight: bold;
    }

    .tr_table {
        color: black;
        font-weight: bold;
        border: black;
        font-size: 16px;
        background-color: #f6d365;
    }

    i {
        color: #f0c538;
        font-size: 4px;
    }
</style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class=" d-flex align-items-center justify-content-center" href="employee_profile.php">
                <div class="sidebar-brand-icon w-10 ">
                    <img src="/img/mq1.jpg" alt=""class="w-10">
                </div>
                <!-- <div class="sidebar-brand-text mx-3">SmartGramming</div> -->
            </a>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="employee_profile.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    Dashboard</a>

            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    Employees
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Options</h6>
                        <a class="collapse-item" href="registration">Add New Employee</a>
                        <a class="collapse-item" href="cards.html">Display Employees </a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Positions</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="job">Add New Posistion</a>
                        <a class="collapse-item" href="display-job">Display Positions</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Attendance
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="attendance">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    Attendance</a>

            </li>




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>




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




                        <!-- admin name and photo -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Mayar Mansour</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- profile of the admin standard-->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <!-- logout for admin -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <section>
                        <div class="container h-100">


                                      
                                        <section class="vh-100 w-15" style="background-color: #f4f5f7;">
                                            <div class="container py-5 h-100 w-100">
                                                <div
                                                    class="row d-flex justify-content-center align-items-center h-200">
                                                    <div class="col col-lg-14 mb-4 mb-lg-0 ">
                                                        <div class="card mb-3" style="border-radius: .5rem;">
                                                            <form action="{{ route('show_user_details') }}"
                                                                method="get">
                                                                <div class="row g-0">
                                                                    <div class="col-md-4 gradient-custom text-center text-white"
                                                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                                        <img src="/image/{{ $employees->image }}"
                                                                            class="img-fluid my-5"
                                                                            style="width: 150px;" />
                                                                        <h5>{{ $employees->name }}</h5>
                                                                        @if ($employees->position)
                                                                            <h5 style="color: #f0c538;">
                                                                                {{ $employees->position->title }}</h5>
                                                                        @else
                                                                            <td> -- </td>
                                                                        @endif

                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="card-body p-4">
                                                                            <h6>Information</h6>
                                                                            <hr class="mt-0 mb-4">
                                                                            <div class="row pt-1">
                                                                                <div class="col-6 mb-3">
                                                                                    <h6>Email</h6>
                                                                                    <p class="text-muted">
                                                                                        {{ $employees->email }}</p>
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <h6>Phone</h6>
                                                                                    <p class="text-muted">
                                                                                        {{ $employees->phone }}</p>
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <h6>Adress</h6>
                                                                                    <p class="text-muted">
                                                                                        {{ $employees->adress }}</p>
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <h6>Birth Date</h6>
                                                                                    <p class="text-muted">
                                                                                        {{ $employees->birthdate }}</p>
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <h6>Hire Date</h6>
                                                                                    <p class="text-muted">
                                                                                        {{ $employees->date_hired }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                </div>

                                                        </div>
                                                        <table class="table table-striped table-hover">
                                                            <thead>
                                                                <tr class="tr_table">
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">attendance</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            @if ($employees->attendance)
                                                                @foreach ($attends as $attend)
                                                                    <tr>
                                                                        <td class="col-md-4">
                                                                            {{ $attend->time_in_out }}</td>

                                                                        <td class="col-md-4">
                                                                            {{ $attend->check_in_out }}</td>

                                                                        <form>
                                                                            <td> <a
                                                                                    href="{{ route('edit_employee_attendance', $attend->id) }}">
                                                                                    <i class="far fa-edit "></i></a>
                                                                            </td>
                                                                        </form>
                                                                @endforeach
                                                            @else
                                                                <td>null</td>
                                                            @endif

                                                            </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>


                                                <div class="mt-3 mb-4 pagging">{{ $attends->links() }} </div>

                                                </form>
                                            </div>

                                    </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
    
    </section>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
