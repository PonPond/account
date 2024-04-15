@extends('layouts.index')
@inject('ThaiFormat', 'App\Services\ThaiDate')
@section('content')
    <div class="col-8">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>ยอดค้างรายเดือน</h6>



                @if ($deb3->count() > 0)
                    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        disabled>
                        เพิ่มรายการยอดค้าง
                    </button>
                @else
                    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        เพิ่มรายการยอดค้าง
                    </button>
                @endif



                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการหนี้รายเดือน</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('debtorsM.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ยอดเงิน</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="total_price">
                                    </div>

                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">วันที่เริ่ม</label>
                                        <input class="form-control" type="date" name="created_date">
                                    </div>


                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">วันครบกำหนด</label>
                                        <input class="form-control" type="date" name="end_date">
                                    </div>


                                    <input type="hidden" class="form-control" name="debt_rounds_id"
                                        value="{{ $deb5->id }}">
                                    <input type="hidden" class="form-control" name="debt_id" value="{{ $deb5->debt_id }}">
                                    <button type="button" class="btn bg-gradient-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                            </div>

                            </form>


                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">จำนวนเงินต้น/ดอกเบี้ย</th>
                                <th class="text-center">วันที่เริ่ม</th>
                                <th class="text-center">วันครบกำหนด</th>
                                <th class="text-center">เวลากำหนดครบชำระ</th>
                                <th class="text-center">แก้ไขข้อมูล</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deb3 as $item)
                                <tr>
                                    <td class="text-center">
                                        <h6 class="mb-0 text-md">{{ $item->total_price }} / {{ $deb6->per }} % เดือน</h6>
                                    </td>

                                    <td class="text-center">
                                        <h6 class="mb-0 text-md">{{ $ThaiFormat->makeFormat2($item->created_at) }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0 text-md">{{ $ThaiFormat->makeFormat2($item->end_date) }}</h6>
                                    </td>

                                    <td class="text-center">
                                        <h6 class="mb-0 text-md">{{ $fullM }} เดือน {{ $fullD }} วัน</h6>
                                    </td>

                                    <td class="text-center">


                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalEdit{{ $item->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <div class="modal fade" id="exampleModalEdit{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            แก้ไขข้อมูลการค้างชำระ </h5>

                                                    </div>
                                                    <div class="modal-body">


                                                        <form action="{{ url('/debtors-m/store/update/' . $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf


                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">จำนวนเงินต้น
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="debtors_name"
                                                                            style="color: black; font-weight: bold;"
                                                                            value="{{ $item->total_price }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">วันที่เริ่ม
                                                                        </label>

                                                                        <input class="form-control" type="date"
                                                                            name="created_at"
                                                                            value="{{ date('Y-m-d', strtotime($item->created_at)) }}"
                                                                            style="color: black; font-weight: bold;">

                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">วันครบกำหนด
                                                                        </label>
                                                                        <input class="form-control" type="date"
                                                                            name="end_date" value="{{ $item->end_date }}"
                                                                            style="color: black; font-weight: bold;">
                                                                    </div>
                                                                </div>


                                                            </div>


                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn bg-gradient-primary">Save
                                                                changes</button>
                                                    </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>


                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>


    <div class="col-4">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>ยอดจ่าย</h6>

                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal1">
                    เพิ่มการจ่ายหนี้
                </button>


                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการหนี้รายเดือน</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('payment.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ยอดเงิน</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="amount">
                                    </div>


                                    <input type="hidden" class="form-control" name="debt_rounds_id"
                                        value="{{ $deb5->id }}">
                                    <input type="hidden" class="form-control" name="debt_id"
                                        value="{{ $deb5->debt_id }}">
                                    <input type="hidden" class="form-control" id="exampleFormControlInput1"
                                        name="amount_d" value="{{ $totalint }}">
                                    <button type="button" class="btn bg-gradient-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                            </div>

                            </form>


                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>

                                <th class="text-center">วันที่จ่าย</th>
                                <th class="text-center">ยอดเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deb2 as $item)
                                <tr>
                                    <td class="text-center">
                                        <h6 class="mb-0 text-md">{{ $ThaiFormat->makeFormat2($item->created_at) }}</h6>
                                    </td>

                                    <td class="text-center">
                                        <h6 class="mb-0 text-md">{{ $item->amount }}</h6>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h5 style="margin-left: 60%">รวม: {{ $totalsum }} บาท</h5>
                </div>
            </div>

        </div>
    </div>


    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>สรุปยอดรวม</h6>

                <br>
                <div class="row">
                    <div class="col-6">
                        จำนวนวันติดค้างทั้งหมด : {{ $day }} วัน
                        <br>
                        จำนวนเงินดอกเบี้ยคิดรายเดือน : {{ $fullper }} บาท

                    </div>
                    <div class="col-6">

                        จำนวนเงินดอกเบี้ยคิดรายวัน : {{ $rday }} บาท
                        <br>
                        จำนวนเงินรวมของดอกเบี้ย : {{ $totalint }} บาท
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-6">

                        @if ($deb8)
                            <h4>จำนวนเงินต้นติดค้างคงเหลือ: {{ $deb8->amount }} บาท</h4>
                        @else
                            <h4>ไม่พบข้อมูลเงินต้นติดค้าง</h4>
                        @endif
                        <br>


                    </div>
                    <div class="col-6">
                        <h4>จำนวนดอกเบี้ยติดค้างคงเหลือ: {{ $totalAmountD }}</h4>
                        <br>

                    </div>


                </div>

                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">อัปเดทรายการ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('summary.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- <div class="form-group">
                                        <label for="exampleFormControlInput1">ยอดเงิน</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            name="amount">
                                    </div> --}}

                                    <input type="hidden" class="form-control" id="exampleFormControlInput1"
                                        name="amount_d" value="{{ $totalint }}">

                                    <input type="hidden" class="form-control" name="debt_rounds_id"
                                        value="{{ $deb5->id }}">
                                    <input type="hidden" class="form-control" name="debt_id"
                                        value="{{ $deb5->debt_id }}">
                                    <button type="button" class="btn bg-gradient-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                            </div>

                            </form>


                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>

                                <th class="text-center">วันที่จ่าย</th>
                                <th class="text-center">จำนวนเงิน</th>
                                <th class="text-center">ดอกเบี้ย</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deb7 as $item)
                                <tr>
                                    <td class="text-center">
                                        <h6 class="mb-0 text-md">{{ $ThaiFormat->makeFormat2($item->created_at) }}</h6>
                                    </td>

                                    <td class="text-center">
                                        <h6 class="mb-0 text-md">{{ $item->amount }}</h6>
                                    </td>

                                    <td class="text-center">
                                        <h6 class="mb-0 text-md">{{ $item->amount_d }}</h6>
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
