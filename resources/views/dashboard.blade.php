@extends('layouts.index')
<script src="/../assets/js/plugins/chartjs.min.js" type="text/javascript"></script>

@section('content')
    <h5 class="card-title " style="color: white">Version 1.0.0</h5>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                                    <h5 class="font-weight-bolder">
                                        $53,000
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                                        since yesterday
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                                    <h5 class="font-weight-bolder">
                                        2,300
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                                    <h5 class="font-weight-bolder">
                                        +3,462
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                        since last quarter
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                                    <h5 class="font-weight-bolder">
                                        $103,430
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+5%</span> than last
                                        month
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cotainer-fluid py-4">


            <body>

                <div class="ct-docs-main-container">
                    <div class="ct-docs-main-content-row">
                        <div class="ct-docs-sidebar-col">

                            <div class="ct-docs-toc-col">

                            </div>
                            <main class="ct-docs-content-col" role="main">

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5>รายงานจำนวนการใช้งานแบ่งตามประเภท</h5>
                                    </div>
                                    <div class="card-body p-3">

                                        <div class="chart">
                                            <canvas id="bar-chart" class="chart-canvas" height="300px"></canvas>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-6">

                                        <div class="card mb-3">
                                            <div class="card-header">
                                                <h5>ตัวอย่าง </h5>
                                            </div>
                                            <div class="card-body p-3">
                                                <div class="chart">
                                                    <canvas id="doughnut-chart" class="chart-canvas"
                                                        height="300px"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative">

                                        </div>

                                    </div>

                                    <div class="col-6">

                                        <div class="card mb-3">
                                            <div class="card-header">
                                                <h5>ตัวอย่าง</h5>
                                            </div>
                                            <div class="card-body p-3">

                                                <div class="chart">
                                                    <canvas id="pie-chart" class="chart-canvas" height="300px"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative">

                                        </div>

                                    </div>
                                </div>
                            </main>
                        </div>
                        <div class="ct-docs-main-footer-row">
                            <div class="ct-docs-main-footer-blank-col"></div>
                            <div class="ct-docs-main-footer-col">

                            </div>
                        </div>
                    </div>


                    <script type="text/javascript">
                        // Line chart
                        // Line chart with gradient
                        // Doughnut chart
                        var ctx3 = document.getElementById("doughnut-chart").getContext("2d");

                        new Chart(ctx3, {
                            type: "doughnut",
                            data: {
                                labels: ['Creative Tim', 'Github', 'Bootsnipp', 'Dev.to', 'Codeinwp'],
                                datasets: [{
                                    label: "Projects",
                                    weight: 9,
                                    cutout: 60,
                                    tension: 0.9,
                                    pointRadius: 2,
                                    borderWidth: 2,
                                    backgroundColor: [
                                        "#8D5EE4",
                                        "#5EB5E4",
                                        "#E48D5E",
                                        "#B5E45E",
                                        "#E4D05E"
                                    ],
                                    data: [15, 20, 12, 60, 20],
                                    fill: false
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: true
                                    }
                                },
                                interaction: {
                                    intersect: false,
                                    mode: "index"
                                },
                                scales: {
                                    y: {
                                        grid: {
                                            drawBorder: false,
                                            display: false,
                                            drawOnChartArea: false,
                                            drawTicks: false
                                        },
                                        ticks: {
                                            display: false
                                        }
                                    },
                                    x: {
                                        grid: {
                                            drawBorder: false,
                                            display: false,
                                            drawOnChartArea: false,
                                            drawTicks: false
                                        },
                                        ticks: {
                                            display: false
                                        }
                                    }
                                }
                            }
                        });

                        // Pie chart
                        var ctx4 = document.getElementById("pie-chart").getContext("2d");

                        new Chart(ctx4, {
                            type: "pie",
                            data: {
                                labels: ["กลางแจ้ง", "ห้องประชุม", "ห้องอเนกประสงค์"],
                                datasets: [{
                                    label: "Projects",
                                    weight: 9,
                                    cutout: 0,
                                    tension: 0.9,
                                    pointRadius: 2,
                                    borderWidth: 2,
                                    backgroundColor: ["#5EB5E4", "#E48D5E", "#72E45E", "#a8b8d8"],
                                    data: [15, 60, 20, 20],
                                    fill: false
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: true
                                    }
                                },
                                interaction: {
                                    intersect: false,
                                    mode: "index"
                                },
                                scales: {
                                    y: {
                                        grid: {
                                            drawBorder: false,
                                            display: false,
                                            drawOnChartArea: false,
                                            drawTicks: false
                                        },
                                        ticks: {
                                            display: false
                                        }
                                    },
                                    x: {
                                        grid: {
                                            drawBorder: false,
                                            display: false,
                                            drawOnChartArea: false,
                                            drawTicks: false
                                        },
                                        ticks: {
                                            display: false
                                        }
                                    }
                                }
                            }
                        });

                        // Bar chart
                        var ctx5 = document.getElementById("bar-chart").getContext("2d");

                        new Chart(ctx5, {
                            type: "bar",
                            data: {
                                labels: ['16-20', '21-25', '26-30', '31-36', '36-42', '42+'],
                                datasets: [{
                                    label: "Sales by age",
                                    weight: 5,
                                    borderWidth: 0,
                                    borderRadius: 4,
                                    backgroundColor: '#3A416F',
                                    data: [15, 20, 12, 60, 20, 15],
                                    fill: false,
                                    maxBarThickness: 35
                                }],
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false,
                                    }
                                },
                                scales: {
                                    y: {
                                        grid: {
                                            drawBorder: false,
                                            display: true,
                                            drawOnChartArea: true,
                                            drawTicks: false,
                                            borderDash: [5, 5]
                                        },
                                        ticks: {
                                            display: true,
                                            padding: 10,
                                            color: '#9ca2b7'
                                        }
                                    },
                                    x: {
                                        grid: {
                                            drawBorder: false,
                                            display: false,
                                            drawOnChartArea: true,
                                            drawTicks: true,
                                        },
                                        ticks: {
                                            display: true,
                                            color: '#9ca2b7',
                                            padding: 10
                                        }
                                    },
                                },
                            },
                        });
                        // Mixed chart

                        // Bubble chart
                    </script>



                </div>


        </div>

        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Sales by Country</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="../assets/img/icons/flags/US.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">United States</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">2500</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$230,900</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">29.9%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="../assets/img/icons/flags/DE.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Germany</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">3.900</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$440,000</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">40.22%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="../assets/img/icons/flags/GB.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Great Britain</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">1.400</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$190,700</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">23.44%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="../assets/img/icons/flags/BR.png" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Brasil</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">562</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$143,960</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">32.14%</h6>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Categories</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-mobile-button text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                        <span class="text-xs">250 in stock, <span class="font-weight-bold">346+
                                                sold</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-tag text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                                        <span class="text-xs">123 closed, <span class="font-weight-bold">15
                                                open</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-box-2 text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                                        <span class="text-xs">1 is active, <span class="font-weight-bold">40
                                                closed</span></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-satisfied text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                                        <span class="text-xs font-weight-bold">+ 430</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endsection
