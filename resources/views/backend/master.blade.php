<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="{{ asset('toastr.min.css') }}">
</head>

<body>



    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <img src="{{ asset('backend/images/logo.svg') }}" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="{{ asset('backend/images/logo-mini.svg') }}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                        <div class="me-3">
                            <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                                data-bs-toggle="minimize">
                                <span class="icon-menu"></span>
                            </button>
                        </div>
                        <div>
                            <a class="navbar-brand brand-logo" href="index.html">
                                <img src="{{ asset('backend/images/logo.svg') }}" alt="logo" />
                            </a>
                            <a class="navbar-brand brand-logo-mini" href="index.html">
                                <img src="{{ asset('backend/images/logo-mini.svg') }}" alt="logo" />
                            </a>
                        </div>
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-top">
                        <ul class="navbar-nav">
                            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                                <h1 class="welcome-text">Hello, <span class="text-black fw-bold">{{\Illuminate\Support\Facades\Auth::user()->name}}</span></h1>

                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img class="img-xs rounded-circle"
                                        src="{{ asset('backend/images/faces/face8.jpg') }}" alt="Profile image">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                    aria-labelledby="UserDropdown">
                                    <div class="dropdown-header text-center">
                                        <img class="img-md rounded-circle" src="images/faces/face8.jpg"
                                            alt="Profile image">
                                        <p class="mb-1 mt-3 font-weight-semibold">
                                            {{ Auth::user()->team_name ?? 'null' }}
                                        </p>
                                        <p class="fw-light text-muted mb-0">{{ Auth::user()->email ?? 'null' }}</p>
                                    </div>

                                    <a class="dropdown-item">Account Settings</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>


                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-bs-toggle="offcanvas">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </nav>
            </div>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link"
                            @if (Auth::user()->status == null) href="home" @else href="{{ route('user-home') }}" @endif>
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            @if (Auth::user()->status == null) href="home" @else href="{{ route('group-members') }}" @endif>
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Group Members</span>
                        </a>
                    </li>


                    <li class="nav-item nav-category">Sections</li>


                </ul>
            </nav>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                {{--                For Error message Showing--}}
                                @if ($errors->any())
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show z-index-1 w-auto error-alert" role="alert">
                                            @foreach ($errors->all() as $error)
                                                <div>{{$error}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                {{--                For Insert message Showing--}}
                                @if (session('success'))
                                    <div class="col-12">
                                        <div class="alert alert-success alert-dismissible fade show z-index-1 w-auto error-alert" role="alert">
                                            <div>{{session('success')}}</div>
                                        </div>
                                    </div>
                                @endif
                                {{--                For Insert message Showing--}}
                                @if (session('error'))
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show z-index-1 w-auto error-alert" role="alert">
                                            <div>{{session('error')}}</div>

                                        </div>
                                    </div>
                                @endif
                                @if (session('warning'))
                                    <div class="col-12">
                                        <div class="alert alert-warning alert-dismissible fade show z-index-1 w-auto error-alert" role="alert">
                                            <div>{{session('warning')}}</div>

                                        </div>
                                    </div>
                                @endif
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a
                                    href="" target="_blank"></a> </span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021.
                                All rights reserved.</span>
                        </div>
                    </footer>

                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
    </div>



    <!-- plugins:js -->
    <script src="{{ asset('backend/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/progressbar.js/progressbar.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend/js/off-canvas.js') }}"></script>
    <script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('backend/js/template.js') }}"></script>
    <script src="{{ asset('backend/js/settings.js') }}"></script>
    <script src="{{ asset('backend/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('backend/js/jquery.cookie.js" type="text/javascript') }}"></script>
    <script src="{{ asset('backend/js/dashboard.js') }}"></script>
    <script src="{{ asset('backend/js/Chart.roundedBarCharts.js') }}"></script>
    <script src="{{ asset('toastr.min.js') }}"></script>
    <!-- End custom js for this page-->
    <script type="text/javascript">
        @if (Session::has('message'))

            var type = "{{ Session::get('alert-type', 'success') }}";

            switch (type) {
                case "success":
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case "error":
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

</body>

</html>
