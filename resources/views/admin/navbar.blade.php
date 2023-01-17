<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ADMIN</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('../assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ url('../assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ url('../assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ url('../assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <br>
                    <div class="user-details">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="sidebar-profile-img">
                                        <img src="{{ url('assets/images/faces-clipart/pic-3.png') }}" alt="image">
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-profile-text">
                                <p class="mb-1">Alaa Ibrahim Amer</p>
                            </div>
                            <div class="badge badge-danger">3</div>
                        </div>
                    </div>
                    <ul class="nav">
                        <li class="nav-item nav-category">Main</li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/categories') }}">
                                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                                <span class="menu-title">Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/products') }}">
                                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                                <span class="menu-title">Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('') }}">
                                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                                <span class="menu-title">Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('') }}">
                                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                                <span class="menu-title">Sizes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('') }}">
                                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                                <span class="menu-title">Colors</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('') }}">
                                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                                <span class="menu-title">Logout</span>
                            </a>
                        </li>

                    </ul>
                </nav>
 
                @yield('content')
       
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ url('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ url('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('assets/vendors/jquery-circle-progress/js/circle-progress.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('assets/js/off-canvas.js') }}"></script>
    <script src="{{ url('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ url('assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
</body>
