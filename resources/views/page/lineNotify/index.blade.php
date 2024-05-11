@extends('layouts.index')
@inject('ThaiFormat', 'App\Services\ThaiDate')
@section('content')
    <div class="row mt-4">
        <div class="col-lg mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">รายชื่อผู้ที่มีกำหนดใกล้นัดชำระ</h6>
                    </div>

                    <a href="{{ route('line.notify') }}" class="btn bg-gradient-primary">
                        กดปุ่มเพื่อแจ้งเตือน!
                    </a>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>ส่งแจ้งเตือนสำเร็จ !</strong>
                        </div>
                    @endif

                </div>
                <div class="table-responsive">
                    <table class="table align-items-center ">
                        <thead>
                            <tr>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7">ชื่อ-ที่อยู่</th>
                                <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">
                                    ยอดค้าง</th>
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
                                        <p class="text-md text-center px-2 font-weight-bold mb-0">{{ $item->total_price }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-md text-center px-2 font-weight-bold mb-0">{{ $item->per }}</p>
                                    </td>
                                    <td>
                                        <div align="center">
                                            @if ($item->type == 'รายวัน')
                                                <p class="text-md text-center badge bg-gradient-warning mb-0">
                                                    {{ $item->type }}</p>
                                            @endif
                                            @if ($item->type == 'รายเดือน')
                                                <p class="text-md text-center badge bg-gradient-success mb-0">
                                                    {{ $item->type }}</p>
                                            @endif

                                            @if ($item->type == 'รายปี')
                                                <p class="text-md text-center badge bg-gradient-info mb-0">
                                                    {{ $item->type }}</p>
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
