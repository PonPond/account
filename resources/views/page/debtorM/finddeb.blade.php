@extends('layouts.index')
@inject('ThaiFormat', 'App\Services\ThaiDate')
@section('content')
    <div class="col-8">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>ยอดค้างรายเดือน</h6>



                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    เพิ่มรายการยอดค้าง
                </button>


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


                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                                <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
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
                </div>
            </div>
        </div>
    </div>


    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>สรุปยอดรวม</h6>

                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal2">
                    อัปเดทรายการ
                </button>

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
                </div>
            </div>
        </div>
    </div>
@endsection
