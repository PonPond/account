<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Account Management
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">

</head>

<body class="g-sidenav-show   bg-gray-100">
    <style>
        * {
            font-family: 'Prompt', sans-serif;
            font-weight: 1000;
            font-size: 18px;
            color: black;

        }

        .form-group input {
            color: black;
            font-weight: 1000;
            font-size: 18px;
        }



        #myForm {
            display: flex;
            align-items: center;
        }

        .input-group {
            display: flex;
            align-items: center;
            width: 100%;
            /* Make the input group span the full width */
        }

        #confirmation_code {
            flex: 1;
            margin-right: 10px;
            /* Adjust the margin as needed */
        }
    </style>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
                target="_blank">

                <span class="ms-1 font-weight-bold">Account Management</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                @if (request()->routeIs('dashboard'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fas fa-align-justify text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">หน้าหลัก</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('dashboard') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fas fa-align-justify text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">หน้าหลัก</span>
                        </a>
                    </li>
                @endif

                @if (request()->routeIs('debtor.index'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('debtor.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fas fa-align-justify text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">ข้อมูลลูกหนี้</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('debtor.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fas fa-align-justify text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">ข้อมูลลูกหนี้</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-md font-weight-bolder opacity-6">ข้อมูลการชำระหนี้</h6>
                </li>

                @if (request()->routeIs('debtorm.index'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('debtorm.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fas fa-align-justify text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">รายเดือน</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('debtorm.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fas fa-align-justify text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">รายเดือน</span>
                        </a>
                    </li>
                @endif




            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <div class="card card-plain shadow-none" id="sidenavCard">

                <div class="card-body text-center p-3 w-100 pt-9">
                    <div class="docs-info">


                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class=" btn btn-primary btn-sm mb-0 w-100  " href="{{ route('logout') }}"
                    onclick="event.preventDefault();
            this.closest('form').submit();">
                    ออกจากระบบ
                </a>
            </form>

        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">

                @include('include.content')

            </div>

        </div>

    </main>




    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>


<!-- @include('include.content') -->
