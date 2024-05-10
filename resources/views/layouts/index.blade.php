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
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=3.0.4" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css" />


    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">สถิติ</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('dashboard') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">สถิติ</span>
                        </a>
                    </li>
                @endif

                @if (request()->routeIs('debtor.index'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('debtor.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-hand-holding-usd text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">ข้อมูลลูกหนี้</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('debtor.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-hand-holding-usd text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">ข้อมูลลูกหนี้</span>
                        </a>
                    </li>
                @endif

                @if (request()->routeIs('debtors.index'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('debtors.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-search text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">ค้นหาข้อมูลลูกหนี้</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('debtors.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-search text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">ค้นหาข้อมูลลูกหนี้</span>
                        </a>
                    </li>
                @endif


                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M311 196.8v81.3c0 2.1-1.6 3.7-3.7 3.7h-13c-1.3 0-2.4-.7-3-1.5l-37.3-50.3v48.2c0 2.1-1.6 3.7-3.7 3.7h-13c-2.1 0-3.7-1.6-3.7-3.7V196.9c0-2.1 1.6-3.7 3.7-3.7h12.9c1.1 0 2.4 .6 3 1.6l37.3 50.3V196.9c0-2.1 1.6-3.7 3.7-3.7h13c2.1-.1 3.8 1.6 3.8 3.5zm-93.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 2.1 1.6 3.7 3.7 3.7h13c2.1 0 3.7-1.6 3.7-3.7V196.8c0-1.9-1.6-3.7-3.7-3.7zm-31.4 68.1H150.3V196.8c0-2.1-1.6-3.7-3.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 1 .3 1.8 1 2.5c.7 .6 1.5 1 2.5 1h52.2c2.1 0 3.7-1.6 3.7-3.7v-13c0-1.9-1.6-3.7-3.5-3.7zm193.7-68.1H327.3c-1.9 0-3.7 1.6-3.7 3.7v81.3c0 1.9 1.6 3.7 3.7 3.7h52.2c2.1 0 3.7-1.6 3.7-3.7V265c0-2.1-1.6-3.7-3.7-3.7H344V247.7h35.5c2.1 0 3.7-1.6 3.7-3.7V230.9c0-2.1-1.6-3.7-3.7-3.7H344V213.5h35.5c2.1 0 3.7-1.6 3.7-3.7v-13c-.1-1.9-1.7-3.7-3.7-3.7zM512 93.4V419.4c-.1 51.2-42.1 92.7-93.4 92.6H92.6C41.4 511.9-.1 469.8 0 418.6V92.6C.1 41.4 42.2-.1 93.4 0H419.4c51.2 .1 92.7 42.1 92.6 93.4zM441.6 233.5c0-83.4-83.7-151.3-186.4-151.3s-186.4 67.9-186.4 151.3c0 74.7 66.3 137.4 155.9 149.3c21.8 4.7 19.3 12.7 14.4 42.1c-.8 4.7-3.8 18.4 16.1 10.1s107.3-63.2 146.5-108.2c27-29.7 39.9-59.8 39.9-93.1z" />
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Line Notify</span>
                    </a>
                </li>



                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-md font-weight-bolder opacity-6">ข้อมูลการชำระหนี้</h6>
                </li>


                @if (request()->routeIs('debtord.index'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('debtord.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-tasks text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">รายวัน</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('debtord.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-tasks text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">รายวัน</span>
                        </a>
                    </li>
                @endif


                @if (request()->routeIs('debtorm.index'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('debtorm.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-tasks text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">รายเดือน</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('debtorm.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-tasks text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">รายเดือน</span>
                        </a>
                    </li>
                @endif


                @if (request()->routeIs('debtory.index'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('debtory.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-tasks text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">รายปี</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('debtory.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-tasks text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">รายปี</span>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>

    @stack('js')
</body>

</html>


<!-- @include('include.content') -->
