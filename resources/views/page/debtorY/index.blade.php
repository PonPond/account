@extends('layouts.index')
@section('content')
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>ข้อมูลลูกหนี้ทั้งหมด</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7">ชื่อ-ที่อยู่</th>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7">เบอร์โทร</th>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7">หลักฐาน</th>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7">ประเภท</th>
                                <th class=" opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($debtor as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-md">{{ $item->debtors_name }}</h6>
                                                <h6 class="text-md  mb-0" style="color: black">{{ $item->debtors_address }}
                                                </h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <h6 class="mb-0 text-md">{{ $item->debtors_phone }}</h6>
                                    </td>

                                    <td>
                                        <h6 class="mb-0 text-md">{{ $item->debtors_id_image }}</h6>
                                    </td>

                                    <td>
                                        @if ($item->type == 'รายวัน')
                                            <span class="badge bg-gradient-warning">รายวัน</span>
                                        @endif

                                        @if ($item->type == 'รายเดือน')
                                            <span class="badge bg-gradient-success">รายเดือน</span>
                                        @endif

                                        @if ($item->type == 'รายปี')
                                            <span class="badge bg-gradient-info">รายปี</span>
                                        @endif
                                    </td>

                                    <td class="align-middle">
                                        <a href="{{ url('/debtors-m/' . $item->id) }}" class=" btn btn-primary"
                                            style="width: 80%;margin-left: 10% "> จัดการหนี้</a>
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
