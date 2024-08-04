@extends('layouts.index')
@inject('ThaiFormat', 'App\Services\ThaiDate')
@section('content')
    <div class="col-12">

        <div class="card mb-4">

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการหนี้รายเดือน</h5>
                        </div>
                        <div class="modal-body">
                            <label for="exampleFormControlSelect1">หมายเหตุ</label>

                            <form action="{{ route('debtorsM.storeround') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="debt_id" value="{{ $deb1->id }}">
                                <input type="text" class="form-control" name="title"
                                    style="color: black ; font-weight: 1000;
                                font-size: 18px;">
                                <br>
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">ปิด
                                </button>
                                <button type="submit" class="btn bg-gradient-primary">บันทึก</button>
                        </div>

                        </form>


                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-md-12 mb-lg-0 mb-4">


                    <div class="card-header pb-0 p-3">
                        <h6>สร้างรายการหนี้ของ {{ $deb1->debtors_name }} เบอร์โทร : {{ $deb1->debtors_phone }} </h6>
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <button type="button" class="btn bg-gradient-secondary mb-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;
                                    เพิ่มรอบบิล</button>
                            </div>

                        </div>
                    </div>

                    <div class="card-body p-3">
                        <div class="row">

                            @foreach ($deb4 as $item)
                                <div class="col-md-6 mb-3">
                                    <div class="card card-body border card-plain border-radius-lg d-flex  flex-row">
                                        {{-- <img class="w-15 me-3 mb-0" src="../assets/img/logos/month.png" alt="logo"> --}}

                                        <div class="div">
                                            <h6 class="mb-0"> วันที่ทำรายการ:
                                                {{ $ThaiFormat->makeFormat2($item->created_at) }}</h6>

                                            <h6 class="mb-0"> หมายเหตุ: {{ $item->title }}</h6>
                                            <h6 class="mb-0"> สถานะ:
                                                @if ($item->status == 'active')
                                                    <span class="badge badge-pill badge-lg bg-gradient-success">ปกติ</span>
                                                @elseif($item->status == 'complete')
                                                    <span
                                                        class="badge badge-pill badge-lg bg-gradient-warning">เสร็จสิ้น</span>
                                                @endif

                                            </h6>
                                            <h6 class="mb-0"> เงินต้นติดค้าง: {{ $item->round_amount }} บาท</h6>
                                            <h6 class="mb-0"> ดอกเบี้ยติดค้าง: {{ $item->round_interest }} บาท</h6>
                                            <h6 class="mb-0"> อัปเดทล่าสุด:
                                                {{ $ThaiFormat->makeFormat2($item->updated_at) }} </h6>

                                        </div>
                                        <div class="div" style="margin-left: 50%">
                                            <a href="{{ url('/debtors-m/round/' . $item->id) }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="จัดการหนี้">

                                                <span
                                                    class="badge badge-pill badge-lg bg-gradient-success">จัดการหนี้</span>
                                            </a>

                                            <a href="{{ url('/debtors-m/update/' . $item->id) }}"
                                                onclick="return confirm('ลบหรือไม่ ?')" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="ลบข้อมูล"> <span
                                                    class="badge badge-pill badge-lg bg-gradient-danger">ลบข้อมูล</span>
                                            </a>

                                        </div>

                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                {{-- <div class="col-md-4 mt-4">
                        <div class="card card-blog card-plain">
                            <div class="card-body px-1 pt-3">
                                <h5>
                                    
                                </h5>
                                <a href="{{ url('/debtors-m/round/' . $item->id) }}" class=" btn btn-primary"
                                    style="width: 80%;margin-left: 10% "> จัดการหนี้</a>
                            </div>
                        </div>
                    </div> --}}


            </div>
        @endsection
