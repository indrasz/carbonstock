<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags -->

    <title>Carbon Stock Admin</title>



    @stack('before-style')

    @include('includes.style')

    @stack('after-style')

</head>

<body>
    <!-- Preloader -->
    <div id="preloader-area">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="flapt-page-wrapper">

        <!-- Sidemenu Area -->
        @include('includes.sidebar')

        <!-- Page Content -->
        <div class="flapt-page-content pt-0">

            <style>
                .top-header-area {
                    position: relative !important;
                    left: 0;
                    top: 0;
                    box-shadow: none;
                    border-radius: 0px;
                    border: none;
                    width: 100%;
                }
            </style>
            <!-- Top Header Area -->
            <header class="top-header-area d-flex align-items-center justify-content-between">
                <div class="left-side-content-area d-flex align-items-center">
                    <!-- Mobile Logo -->
                    <div class="mobile-logo">
                        <a href="index.html"><img src="/assets/img/core-img/small-logo.png" alt="Mobile Logo"></a>
                    </div>

                    <!-- Triggers -->
                    <div class="flapt-triggers">
                        <div class="menu-collasped" id="menuCollasped">
                            <i class='bx bx-grid-alt'></i>
                        </div>
                        <div class="mobile-menu-open" id="mobileMenuOpen">
                            <i class='bx bx-grid-alt'></i>
                        </div>
                    </div>

                </div>

                <div class="right-side-navbar d-flex align-items-center justify-content-end">
                    <!-- Mobile Trigger -->
                    <div class="right-side-trigger" id="rightSideTrigger">
                        <i class='bx bx-menu-alt-right'></i>
                    </div>

                    <!-- Top Bar Nav -->
                    <ul class="right-side-content d-flex align-items-center">

                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img src="/assets/img/bg-img/person_1.jpg"
                                    alt=""></button>

                        </li>
                    </ul>
                </div>
            </header>

            <!-- Body Content -->
            @yield('content')

        </div>
    </div>

    @stack('before-script')

    @include('includes.script')

    @stack('after-script')



</body>

</html>
