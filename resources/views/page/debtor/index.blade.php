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
                                <strong>สำเร็จ !</strong> เพิ่มข้อมูลเรียบร้อย
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
                                        <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">
                                            เบอร์โทร</th>
                                        <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">ประเภท
                                        </th>
                                        <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">
                                            คนค้ำประกัน
                                        </th>
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

                                            <td class="text-center">
                                                <h6 class="mb-0 text-md">{{ $item->debtors_phone }}</h6>
                                            </td class="text-center">


                                            <td class="text-center">
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

                                            <td class="text-center">

                                                @php
                                                    $debtIds = [];
                                                    foreach ($item->debg as $item1) {
                                                        $debtIds[] = $item1->debt_id;
                                                    }
                                                @endphp

                                                @if (!empty($debtIds) && $debtIds[0] == $item->id)
                                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal1{{ $item->id }}" disabled>
                                                        <i class="fas fa-user-plus"></i>
                                                    </button>
                                                @endif

                                                @if (empty($debtIds))
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal1{{ $item->id }}">
                                                        <i class="fas fa-user-plus"></i>
                                                    </button>
                                                @endif
                                                {{-- 

                                                @foreach ($item->debg as $item1)
                                                    @if ($item1->debt_id == $item->id)
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal1{{ $item->id }}">
                                                            <i class="fas fa-user-plus"></i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal1{{ $item->id }}" disabled>
                                                            <i class="fas fa-user-plus"></i>
                                                        </button>
                                                    @endif
                                                @endforeach --}}

                                                <div class="modal fade" id="exampleModal1{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    เพิ่มข้อมูลคนค้ำประกัน </h5>

                                                            </div>
                                                            <div class="modal-body">

                                                                <form action="{{ route('deb.storeg') }}" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">ชื่อ-นามสกุล
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="g_name"
                                                                            style="color: black; font-weight: bold;">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">ที่อยู่
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="g_address"
                                                                            style="color: black; font-weight: bold;">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">เบอร์โทร
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="g_phone"
                                                                            style="color: black; font-weight: bold;">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label
                                                                            for="exampleFormControlInput1">ลิงค์รูปบัตรประชาชน
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="g_id_image"
                                                                            style="color: black; font-weight: bold;">
                                                                    </div>
                                                                    <input type="hidden" class="form-control"
                                                                        name="debt_id" value="{{ $item->id }}">

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



                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal2{{ $item->id }}">
                                                    <i class="fas fa-folder-open"></i>
                                                </button>

                                                <div class="modal fade" id="exampleModal2{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    ข้อมูลคนค้ำประกัน </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="list-group">

                                                                    <li
                                                                        class="list-group-item border-0  p-4 mb-2 bg-gray-100 border-radius-lg">
                                                                        <div class="d-flex flex-column">
                                                                            <h6 class="mb-3 text-sm">

                                                                                @foreach ($item->debg as $item1)
                                                                                    {{ $item1->g_name }}
                                                                                @endforeach
                                                                            </h6>
                                                                            <span class="mb-2 text-xl"><span
                                                                                    class="text-dark font-weight-bold ms-sm-4">
                                                                                    @foreach ($item->debg as $item1)
                                                                                        {{ $item1->g_address }}
                                                                                    @endforeach
                                                                                </span></span>
                                                                            <span class="mb-2 text-xl">
                                                                                @foreach ($item->debg as $item1)
                                                                                    {{ $item1->g_phone }}
                                                                                @endforeach
                                                                            </span>
                                                                            <span class="text-xs">
                                                                                @foreach ($item->debg as $item1)
                                                                                    <span
                                                                                        class="text-dark ms-sm-2 font-weight-bold"><a
                                                                                            href="{{ $item1->g_id_image }}"
                                                                                            target="_blank">ลิงค์รูปบัตรประชาชน</a></span>
                                                                            </span>
                                    @endforeach

                        </div>
                        <div class="ms-auto text-end">
                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                    class="far fa-trash-alt me-2"></i>Delete</a>
                        </div>
                        </li>

                        </ul>




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

    </div>
    </div>
@endsection
