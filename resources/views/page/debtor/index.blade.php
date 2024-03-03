@extends('layouts.index')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-3">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>ข้อมูลลูกหนี้</h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('debtors.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">ชื่อ-นามสกุล ลูกหนี้</label>
                                <input type="text" class="form-control" name="debtors_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">ที่อยู่ ลูกหนี้</label>
                                <input type="text" class="form-control" name="debtors_address">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">เบอร์โทร ลูกหนี้</label>
                                <input type="text" class="form-control" name="debtors_phone">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">ลิงค์รูปบัตรประชาชน ลูกหนี้</label>
                                <input type="text" class="form-control" name="debtors_id_image">
                            </div>



                            <div class="form-group">
                                <label for="exampleFormControlSelect1">ประเภทลูกหนี้</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="type">
                                    <option value="รายวัน">รายวัน</option>
                                    <option value="รายเดือน">รายเดือน</option>
                                    <option value="รายปี">รายปี</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">เปอร์เซ็น</label>
                                <input type="text" class="form-control" name="per">
                            </div>

                            <button type="input" class="btn btn-success align-items-center">เพิ่มข้อมูลลูกหนี้</button>
                        </form>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>สำเร็จ !</strong> เพิ่มข้อมูลลูกหนี้เรียบร้อย
                            </div>
                        @endif
                    </div>
                </div>
            </div>




            <div class="col-9">
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
                                                        <p class="text-xs text-secondary mb-0">{{ $item->debtors_address }}
                                                        </p>
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
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
