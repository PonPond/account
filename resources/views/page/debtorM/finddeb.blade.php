@extends('layouts.index')
@inject('ThaiFormat', 'App\Services\ThaiDate')
@section('content')
    <div class="col-12">
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

                <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModalRemark">
                    รายการ
                </button>


                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>สำเร็จ !</strong> เพิ่มข้อมูลเรียบร้อย
                    </div>
                @endif


                @if (session('delete'))
                    <div class="alert alert-danger" role="alert">
                        <strong>สำเร็จ !</strong> ลบข้อมูลเรียบร้อย
                    </div>
                @endif




                <div class="modal fade" id="exampleModalRemark" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('remark.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">รายละเอียด</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    name="title">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">ราคา</label>
                                                <input class="form-control" type="text" name="price">
                                            </div>

                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-12">

                                            <div class="card-body px-0 pt-0 pb-2">
                                                <div class="table-responsive p-0">
                                                    <table class="table align-items-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">รายการ</th>
                                                                <th class="text-center">ราคา</th>
                                                                <th class="text-center">วันที่เพิ่ม</th>
                                                                <th class="text-center">จัดการ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($remark as $item)
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <h6 class="mb-0 text-md">{{ $item->title }}

                                                                        </h6>
                                                                    </td>

                                                                    <td class="text-center">
                                                                        <h6 class="mb-0 text-md">
                                                                            {{ $item->price }} บาท
                                                                        </h6>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <h6 class="mb-0 text-md">
                                                                            {{ $ThaiFormat->makeFormat2($item->created_at) }}
                                                                        </h6>
                                                                    </td>


                                                                    <td class="text-center">



                                                                        <a href="{{ url('/remark/delete/' . $item->id) }}"
                                                                            class=" btn btn-danger"
                                                                            onclick="return confirm('ลบหรือไม่ ?')">
                                                                            ลบข้อมูล</a>

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

    <input type="hidden" class="form-control" name="debt_rounds_id" value="{{ $deb5->id }}">
    <input type="hidden" class="form-control" name="debt_id" value="{{ $deb5->debt_id }}">
    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
    </div>

    </form>


    </div>
    </div>
    </div>

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
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="total_price">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">วันที่เริ่ม</label>
                            <input class="form-control" type="date" name="created_date">
                        </div>


                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">วันครบกำหนด</label>
                            <input class="form-control" type="date" name="end_date">
                        </div>


                        <input type="hidden" class="form-control" name="debt_rounds_id" value="{{ $deb5->id }}">
                        <input type="hidden" class="form-control" name="debt_id" value="{{ $deb5->debt_id }}">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
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
                                <h6 class="mb-0 text-md">{{ $item->total_price }} / {{ $deb6->per }} % เดือน
                                </h6>
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


                                @if ($deb5->status == 'complete')
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalEdit{{ $item->id }}" disabled>
                                        <i class="fas fa-edit"></i>
                                    </button>
                                @else
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalEdit{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                @endif


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
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="amount">
                        </div>


                        <input type="hidden" class="form-control" name="debt_rounds_id" value="{{ $deb5->id }}">
                        <input type="hidden" class="form-control" name="debt_id" value="{{ $deb5->debt_id }}">
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" name="amount_d"
                            value="{{ $totalint }}">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save
                            changes</button>
                    </form>

                    </form>


                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="exampleModalDD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการดอกเบี้ย
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('dd_payment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ยอดเงิน</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="amount">
                        </div>


                        <input type="hidden" class="form-control" name="debt_rounds_id" value="{{ $deb5->id }}">
                        <input type="hidden" class="form-control" name="debt_id" value="{{ $deb5->debt_id }}">


                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save
                            changes</button>
                </div>

                </form>


            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-12" style=" display: flex;">
                        <h3 style="margin-right: 10px">สรุปยอดรวม</h3>


                        <form action="{{ url('/debtors-m/update/money/' . $deb5->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @if ($deb8)
                                @if ($deb2->count() <= 0)
                                    <input type="hidden" name="round_amount" value="{{ $deb8->total_price }}">
                                @else
                                    <input type="hidden" name="round_amount" value="{{ $deb8->amount }}">
                                @endif


                                @if ($deb2->count() <= 0)
                                    <input type="hidden" class="form-control" name="round_interest"
                                        value="{{ $totalint }}">
                                @else
                                    <input type="hidden" class="form-control" name="round_interest"
                                        value="{{ $totalAmountD }}">
                                @endif


                                <button type="submit" class="btn bg-gradient-danger" style="margin-right: 10px"
                                    onclick="return confirm('ปรับปรุงยอดหรือไม่ ?')">ปรับปรุงยอด</button>
                            @else
                                <button type="submit" class="btn bg-gradient-danger" style="margin-right: 10px"
                                    onclick="return confirm('ปรับปรุงยอดหรือไม่ ?')" disabled>ปรับปรุงยอด</button>
                            @endif




                        </form>

                        <form id="myForm" action="{{ url('/debtors-m/update/final/' . $deb5->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="password" class="form-control" id="confirmation_code" name="confirmation_code"
                                placeholder="กรอกรหัสยืนยัน"
                                style="margin-bottom: 10px; color: rgb(2, 2, 2); font-weight: 1000;font-size: 18px;">

                            @if ($deb5->status == 'complete')
                                <button type="submit" class="btn bg-gradient-dark" disabled
                                    onclick="return customConfirm()">ปิดบิล</button>
                            @else
                                <button type="submit" class="btn bg-gradient-dark"
                                    onclick="return customConfirm()">ปิดบิล</button>
                            @endif


                        </form>
                        @if (session('complete'))
                            <div class="alert alert-success" role="alert">
                                <strong>สำเร็จ !</strong> ปิดบิลเรียบร้อย
                            </div>
                        @endif
                        <script>
                            function customConfirm() {
                                // ดึงค่ารหัสยืนยันจาก input field
                                var confirmationCode = document.getElementById("confirmation_code").value;

                                // ตรวจสอบว่ารหัสยืนยันเป็น 1234 หรือไม่
                                if (confirmationCode === '1234') {
                                    // ถ้ารหัสยืนยันถูกต้อง ให้ submit ฟอร์ม
                                    document.getElementById("myForm").submit();
                                    return true; // ส่งค่า true กลับไปยังการเรียกใช้งาน onclick เพื่อทำการ submit ฟอร์ม
                                } else {
                                    // ถ้ารหัสยืนยันไม่ถูกต้อง ให้แจ้งเตือนและไม่ submit ฟอร์ม
                                    alert('รหัสยืนยันไม่ถูกต้อง');
                                    return false; // ส่งค่า false กลับไปยังการเรียกใช้งาน onclick เพื่อไม่ทำการ submit ฟอร์ม
                                }
                            }
                        </script>



                    </div>

                </div>


                @if (session('update'))
                    <div class="alert alert-success" role="alert">
                        <strong>สำเร็จ !</strong> ปรับปรุงยอดเรียบร้อย
                    </div>
                @endif


                <br>
                <div class="row">
                    <div class="col-6">
                        จำนวนวันติดค้างทั้งหมด : {{ $day }} วัน
                        <br>
                        จำนวนเงินดอกเบี้ยคิดรายเดือน : {{ $fullper }} บาท

                    </div>
                    <div class="col-6">

                        จำนวนเงินดอกเบี้ยคิดรายวัน: {{ number_format($rday, 2) }} บาท <br>
                        จำนวนเงินรวมของดอกเบี้ย: {{ number_format($totalint, 2) }} บาท
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-6">

                        @if ($deb8)
                            @if ($deb2->count() <= 0)
                                <h4>จำนวนเงินต้น ติดค้างคงเหลือ: {{ $deb8->total_price }} บาท
                                    <span>

                                        <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalDebtors">
                                            เงินต้น
                                        </button>
                                    </span>
                                    <div class="modal fade" id="exampleModalDebtors" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">

                                                <div class="modal-body">

                                                    <div class="card mb-4">

                                                        <div class="card-header pb-0">

                                                            <div class="row">
                                                                <div class="col-12" style=" display: flex;">
                                                                    <h5 class="mt-2" style="margin-right: 10px;">
                                                                        ยอดจ่ายเงินต้น</h5>

                                                                    @if ($deb8)
                                                                        @if ($totalsum == $deb8->total_price)
                                                                            <button type="button"
                                                                                class="btn bg-gradient-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal1" disabled>
                                                                                เพิ่มการจ่ายเงินต้น
                                                                            </button>

                                                                            <button type="button"
                                                                                class="btn bg-gradient-success">
                                                                                ชำระเงินต้นครบแล้ว
                                                                            </button>
                                                                        @else
                                                                            <button type="button"
                                                                                class="btn bg-gradient-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal1">
                                                                                เพิ่มการจ่ายเงินต้น
                                                                            </button>
                                                                        @endif
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn bg-gradient-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal1">
                                                                            เพิ่มการจ่ายเงินต้น
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="modal fade" id="exampleModal1" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                เพิ่มรายการหนี้รายเดือน</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form action="{{ route('payment.store') }}"
                                                                                method="POST"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="exampleFormControlInput1">ยอดเงิน</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="exampleFormControlInput1"
                                                                                        name="amount">
                                                                                </div>


                                                                                <input type="hidden" class="form-control"
                                                                                    name="debt_rounds_id"
                                                                                    value="{{ $deb5->id }}">
                                                                                <input type="hidden" class="form-control"
                                                                                    name="debt_id"
                                                                                    value="{{ $deb5->debt_id }}">
                                                                                <input type="hidden" class="form-control"
                                                                                    id="exampleFormControlInput1"
                                                                                    name="amount_d"
                                                                                    value="{{ $totalint }}">
                                                                                <button type="button"
                                                                                    class="btn bg-gradient-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn bg-gradient-primary">Save
                                                                                    changes</button>
                                                                            </form>

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
                                                                                        <h6 class="mb-0 text-md">
                                                                                            {{ $ThaiFormat->makeFormat2($item->created_at) }}
                                                                                        </h6>
                                                                                    </td>

                                                                                    <td class="text-center">
                                                                                        <h6 class="mb-0 text-md">
                                                                                            {{ $item->amount }}</h6>
                                                                                    </td>


                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>

                                                                    <h5 style="margin-left: 60%">รวม: {{ $totalsum }}
                                                                        บาท</h5>
                                                                </div>
                                                            </div>



                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        </td>


                                        </tr>
                                        </tbody>
                                        </table>


                                    </div>
                                </h4>
                            @else
                                <h4>จำนวนเงินต้น ติดค้างคงเหลือ: {{ $deb8->amount }} บาท
                                    <span>

                                        <button type="button" class="btn bg-gradient-warning" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalDebtors">
                                            เงินต้น
                                        </button>
                                    </span>
                                    <div class="modal fade" id="exampleModalDebtors" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">

                                                <div class="modal-body">

                                                    <div class="card mb-4">

                                                        <div class="card-header pb-0">

                                                            <div class="row">
                                                                <div class="col-12" style=" display: flex;">
                                                                    <h5 class="mt-2" style="margin-right: 10px;">
                                                                        ยอดจ่ายเงินต้น</h5>

                                                                    @if ($deb8)
                                                                        @if ($totalsum == $deb8->total_price)
                                                                            <button type="button"
                                                                                class="btn bg-gradient-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal1" disabled>
                                                                                เพิ่มการจ่ายเงินต้น
                                                                            </button>

                                                                            <button type="button"
                                                                                class="btn bg-gradient-success">
                                                                                ชำระเงินต้นครบแล้ว
                                                                            </button>
                                                                        @else
                                                                            <button type="button"
                                                                                class="btn bg-gradient-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal1">
                                                                                เพิ่มการจ่ายเงินต้น
                                                                            </button>
                                                                        @endif
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn bg-gradient-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal1">
                                                                            เพิ่มการจ่ายเงินต้น
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="modal fade" id="exampleModal1" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                เพิ่มรายการหนี้รายเดือน</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form action="{{ route('payment.store') }}"
                                                                                method="POST"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="exampleFormControlInput1">ยอดเงิน</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="exampleFormControlInput1"
                                                                                        name="amount">
                                                                                </div>


                                                                                <input type="hidden" class="form-control"
                                                                                    name="debt_rounds_id"
                                                                                    value="{{ $deb5->id }}">
                                                                                <input type="hidden" class="form-control"
                                                                                    name="debt_id"
                                                                                    value="{{ $deb5->debt_id }}">
                                                                                <input type="hidden" class="form-control"
                                                                                    id="exampleFormControlInput1"
                                                                                    name="amount_d"
                                                                                    value="{{ $totalint }}">
                                                                                <button type="button"
                                                                                    class="btn bg-gradient-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn bg-gradient-primary">Save
                                                                                    changes</button>
                                                                            </form>

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
                                                                                        <h6 class="mb-0 text-md">
                                                                                            {{ $ThaiFormat->makeFormat2($item->created_at) }}
                                                                                        </h6>
                                                                                    </td>

                                                                                    <td class="text-center">
                                                                                        <h6 class="mb-0 text-md">
                                                                                            {{ $item->amount }}</h6>
                                                                                    </td>


                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>

                                                                    <h5 style="margin-left: 60%">รวม: {{ $totalsum }}
                                                                        บาท</h5>
                                                                </div>
                                                            </div>



                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        </td>


                                        </tr>
                                        </tbody>
                                        </table>


                                    </div>
                                </h4>
                            @endif
                        @else
                            <h4>ไม่พบข้อมูลเงินต้นติดค้าง</h4>
                        @endif

                        <br>



                    </div>
                    <div class="col-6">



                        <h4>จำนวนดอกเบี้ยติดค้างคงเหลือ: {{ $totalint }}
                            <span>

                                <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalDebtorsV2">
                                    ดอกเบี้ย
                                </button>
                            </span>
                            <div class="modal fade" id="exampleModalDebtorsV2" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                    <div class="modal-content">

                                        <div class="modal-body">

                                            <div class="card mb-4">

                                                <div class="card-header pb-0">

                                                    <div class="row">
                                                        <div class="col-12" style=" display: flex;">
                                                            <h5 class="mt-2" style="margin-right: 10px;">
                                                                ยอดจ่ายดอกเบี้ย</h5>


                                                            {{-- @if ($totalAmountD == 0)
                                                        <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal" disabled data-bs-target="#exampleModalDD">
                                                            เพิ่มการจ่ายดอกเบี้ย
                                                        </button>
                                                        @else
                                                        <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#exampleModalDD">
                                                            เพิ่มการจ่ายดอกเบี้ย
                                                        </button>
                                                        @endif --}}

                                                            <button type="button" class="btn bg-gradient-info"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModalDD">
                                                                เพิ่มการจ่ายดอกเบี้ย
                                                            </button>


                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="exampleModalDD" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        เพิ่มรายการดอกเบี้ย
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <form action="{{ route('dd_payment.store') }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleFormControlInput1">ยอดเงิน</label>
                                                                            <input type="text" class="form-control"
                                                                                id="exampleFormControlInput1"
                                                                                name="amount">
                                                                        </div>


                                                                        <input type="hidden" class="form-control"
                                                                            name="debt_rounds_id"
                                                                            value="{{ $deb5->id }}">
                                                                        <input type="hidden" class="form-control"
                                                                            name="debt_id" value="{{ $deb5->debt_id }}">


                                                                        <button type="button"
                                                                            class="btn bg-gradient-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn bg-gradient-primary">Save
                                                                            changes</button>
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
                                                                @foreach ($dd_payment as $item)
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <h6 class="mb-0 text-md">
                                                                                {{ $ThaiFormat->makeFormat2($item->created_at) }}
                                                                            </h6>
                                                                        </td>

                                                                        <td class="text-center">
                                                                            <h6 class="mb-0 text-md">
                                                                                {{ $item->amount }}</h6>
                                                                        </td>


                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        <h5 style="margin-left: 60%">รวม: {{ $totalsumdd }} บาท</h5>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                    </div>
                                </div>


                                </td>


                                </tr>
                                </tbody>
                                </table>


                            </div>
                        </h4>


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
                                        <h6 class="mb-0 text-md">{{ $ThaiFormat->makeFormat2($item->created_at) }}
                                        </h6>
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
