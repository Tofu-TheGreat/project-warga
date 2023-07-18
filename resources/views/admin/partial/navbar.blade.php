<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="/">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('images/logo-sidawar-icon.png') }}" alt="homepage" width="45px"
                        class="logo dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('images/logo-sidawar-icon.png') }}" alt="homepage" width="45px"
                        class="logo light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src="{{ asset('images/logo-sidawar-nama.png') }}" alt="homepage" width="115px"
                        class="dark-logo" />
                    <!-- Light Logo text -->
                    <img src="{{ asset('images/logo-sidawar-nama.png') }}" class="light-logo" width="115px"
                        alt="homepage" />
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href=""><i
                    class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href=""><i
                            class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                            class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                    </form>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../image_save/{{ auth()->user()->foto }}" alt="user" class="rounded-circle"
                            width="40" style="border: 3px solid rgba(189, 189, 241, 0.87); aspect-ratio: 1/1;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item fs-5" href="/profile"><i
                                class="ti-user text-warning m-r-5 m-l-5 fs-3 p-1"></i>
                            Profile</a>
                        <a class="dropdown-item fs-5" href=""><i
                                class="mdi mdi-account-key m-r-5 m-l-5 fs-3 p-1"></i>
                            Ubah Password</a>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item fs-5 text-danger"><i
                                    class="mdi mdi-arrow-left-box m-r-5 m-l-5 fs-3 p-1 "></i>Logout</button>
                        </form>
                    </ul>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
