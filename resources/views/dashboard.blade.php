@extends('layouts.index')
<script src="/../assets/js/plugins/chartjs.min.js" type="text/javascript"></script>

@section('content')
<h5 class="card-title " style="color: white">Version 1.0.0</h5>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 py-2">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">รายวัน</p>
                                <h5 class="font-weight-bolder">
                                    {{ number_format($totalDebtsDay) }} บาท
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">จำนวนลูกหนี้</span>
                                    {{ number_format(count($daily)) }} คน
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

        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 py-2">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">รายเดือน</p>
                                <h5 class="font-weight-bolder">
                                    {{ number_format($totalDebtsMonth) }} บาท
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">จำนวนลูกหนี้</span>
                                    {{ number_format(count($monthly)) }} คน
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
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 py-2">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">รายปี</p>
                                <h5 class="font-weight-bolder">
                                    {{ number_format($totalDebtsYear) }} บาท
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">จำนวนลูกหนี้</span>
                                    {{ number_format(count($yearly)) }} คน
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
        <div class="col-xl-4 col-sm-6 py-2">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">ยอดค้างชำระทั้งหมดในระบบ</p>
                                <h5 class="font-weight-bolder">
                                    {{ number_format($totalDebts) }}
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">จำนวนลูกหนี้</span>
                                    {{ number_format(count($data)) }} คน
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
        <div class="col-xl-4 col-sm-6 py-2">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">ยอดเงินต้นที่ชำระมาแล้วทั้งหมดในระบบ</p>
                                <h5 class="font-weight-bolder">
                                    {{ number_format($sumpayment) }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                               <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 py-2">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">ยอดดอกเบี้ยที่ชำระมาแล้วทั้งหมดในระบบ</p>
                                <h5 class="font-weight-bolder">
                                    {{ number_format($suminterest) }}
                                </h5>
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
    </div>



    <div class="row mt-4">
        <div class="col-lg mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">รายชื่อผู้ที่มีกำหนดใกล้นัดชำระ</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center ">
                        <thead>
                            <tr>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7">ชื่อ-ที่อยู่</th>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">
                                    เบอร์โทร</th>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">
                                    ดอกเบี้ย/เปอร์เซ็น</th>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">ประเภท
                                </th>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">วันที่ครบกำหนด
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                                <td class="w-30 ">
                                    <p class="text-md px-2 font-weight-bold mb-0">{{ $item->debtors_name }}</p>
                                    <h6 class="text-md px-2 mb-0">{{ $item->debtors_address }}</h6>
                                </td>
                                <td>
                                    <p class="text-md text-center px-2 font-weight-bold mb-0">{{ $item->debtors_phone }}</p>
                                </td>
                                <td>
                                    <p class="text-md text-center px-2 font-weight-bold mb-0">{{ $item->per }}</p>
                                </td>
                                <td>
                                    <div align="center">
                                        @if ($item->type == 'รายวัน')
                                        <p class="text-md text-center badge bg-gradient-warning mb-0">{{ $item->type }}</p>

                                        @endif
                                        @if ($item->type == 'รายเดือน')
                                        <p class="text-md text-center badge bg-gradient-success mb-0">{{ $item->type }}</p>

                                        @endif

                                        @if ($item->type == 'รายปี')
                                        <p class="text-md text-center badge bg-gradient-info mb-0">{{ $item->type }}</p>

                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <p class="text-md text-center px-2 font-weight-bold mb-0">{{ $item->end_date }}</p>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @endsection