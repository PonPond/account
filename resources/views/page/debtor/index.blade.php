@extends('layouts.index')
@section('content')
    <style>
        #myTable_wrapper {
            padding: 10px;

        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-3">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>ข้อมูลลูกหนี้</h6>

                        <a href="http://localhost:8080/read-smartcard" target="_blank" class="btn btn-primary">1.ดึงข้อมูล</a>
                        <button type="button" class="btn btn-primary" onclick="fetchData()">2.อ่านข้อมูลจากบัตร</button>

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
                                <label for="exampleFormControlInput1">รหัสบัตรประชาชน</label>
                                <input type="text" class="form-control" name="debtors_id">
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
                                <select class="form-control" id="exampleFormControlSelect1" name="type"
                                    style="color: black; font-weight: bold;">
                                    <option value="รายวัน">รายวัน</option>
                                    <option value="รายเดือน">รายเดือน</option>
                                    <option value="รายปี">รายปี</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">เปอร์เซ็น</label>
                                <input type="text" class="form-control" name="per"
                                    style="color: black; font-weight: bold;">
                            </div>

                            @error('debtors_name')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            @error('debtors_address')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            @error('debtors_phone')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            @error('debtors_id_image')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror


                            @error('type')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            @error('per')
                                <div class="my-2">
                                    <span class="text-danger my-2"> {{ $message }} </span>
                                </div>
                            @enderror

                            <button type="input" class="btn btn-success align-items-center">เพิ่มข้อมูลลูกหนี้</button>
                        </form>

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
                    </div>
                </div>
            </div>




            <div class="col-9">

                <div class="card mb-4">
                    <div class="card-header pb-0 ">
                        <h6>ข้อมูลลูกหนี้ทั้งหมด</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">


                        <div class="table-responsive p-0">

                            <table class="table align-items-center mb-0 w-100 mx-0" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase  text-md font-weight-bolder opacity-7">รูป</th>
                                        <th class="text-uppercase  text-md font-weight-bolder opacity-7">ชื่อ-ที่อยู่</th>
                                        <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">
                                            เบอร์โทร</th>
                                        <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">
                                            เลขบัตรประชาชน</th>
                                        <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">
                                            ดอกเบี้ย/เปอร์เซ็น</th>
                                        <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">ประเภท
                                        </th>
                                        <th class="text-uppercase  text-md font-weight-bolder opacity-7 text-center">
                                            คนค้ำประกัน
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>

                                        </td>




                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        function fetchData() {
            fetch('/get-smartcard', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // นำข้อมูลที่ได้มาใส่ในฟอร์ม
                    var jsonData = JSON.parse(data)
                    console.log(jsonData.data.Prefix);
                    document.querySelector('input[name="debtors_name"]').value = jsonData.data.FirstName + ' ' +
                        jsonData.data.LastName;
                    document.querySelector('input[name="debtors_address"]').value =
                        jsonData.data.HouseNo + ' ' + "ม." + jsonData.data.Moo + ' ' + "ต." + jsonData.data
                        .Subdistrict + ' ' + "อ." + jsonData.data.District + ' ' + jsonData.data.Province;
                    document.querySelector('input[name="debtors_id"]').value = jsonData.data.Cid;
                    document.querySelector('input[name="debtors_phone"]').value = "-";
                    document.querySelector('input[name="debtors_id_image"]').value = jsonData.data
                        .Base64Img; // แนะนำ: อาจจะต้องแสดงรูปภาพอย่างแตกต่าง
                })
                .catch(error => console.error('เกิดข้อผิดพลาดในการดึงข้อมูล:', error));
        }
    </script>

    <script>
        function fetchDataG() {
            fetch('/get-smartcard', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // นำข้อมูลที่ได้มาใส่ในฟอร์ม
                    var jsonData = JSON.parse(data)
                    console.log(jsonData.data.Prefix);
                    document.querySelector('input[name="g_name"]').value = jsonData.data.FirstName + ' ' + jsonData.data
                        .LastName;
                    document.querySelector('input[name="g_address"]').value =
                        jsonData.data.HouseNo + ' ' + "ม." + jsonData.data.Moo + ' ' + "ต." + jsonData.data
                        .Subdistrict + ' ' + "อ." + jsonData.data.District + ' ' + jsonData.data.Province;
                    document.querySelector('input[name="g_id"]').value = jsonData.data.Cid;
                    document.querySelector('input[name="g_phone"]').value = "-";
                    document.querySelector('input[name="g_id_image"]').value = jsonData.data
                        .Base64Img; // แนะนำ: อาจจะต้องแสดงรูปภาพอย่างแตกต่าง
                })
                .catch(error => console.error('เกิดข้อผิดพลาดในการดึงข้อมูล:', error));
        }
    </script>



    <!-- <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                paging: true,
                lengthMenu: [10, 25, 50, 75, 100, 10000],
                ordering: false,
                info: false,

                "language": {
                    "search": "<b>ค้นหา</b>",
                    "zeroRecords": "ไม่พบข้อมูล - ขออภัย",
                    "info": '',
                    "infoEmpty": "ไม่มีข้อมูล",
                    "infoFiltered": "",
                    "lengthMenu": "   _MENU_ ",
                    "paginate": {
                        "previous": false,
                        "next": false
                    }
                }
            });
        });
    </script> -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('debtor.index') }}",
                responsive: true,

                columns: [{
                        data: 'debtors_id_image',
                        render: function(data, type, row) {
                            var image = row
                                .debtors_id_image; // ดึงข้อมูลจากคอลัมน์ debtors_id_image
                            // ตรวจสอบว่าข้อมูลรูปภาพไม่เป็น null และไม่ว่าง
                            if (image) {
                                // สร้าง element <img> เพื่อแสดงรูปภาพ
                                if (image == "-") {
                                    return 'ไม่มีรูป';
                                } else {
                                    return '<img src="data:image/png;base64,' + image +
                                        '" alt="Image" style="max-width:100px; max-height:100px;">';
                                }

                            } else {
                                return ''; // หรือสามารถใส่ข้อความว่างเปล่าก็ได้
                            }
                        }
                    },
                    {
                        data: 'debtors_name' || 'debtors_address',
                        render: function(data, type, row) {

                            return row.debtors_name + '<br> ' + row.debtors_address;
                        }
                    },
                    {
                        data: 'debtors_phone',
                        name: 'debtors_phone',
                        className: 'text-center'
                    },
                    {
                        data: 'debtors_id',
                        name: 'debtors_id',
                        className: 'text-center'
                    },
                    {
                        data: 'per',
                        render: function(data, type, row) {
                            return row.per + '%';
                        },
                        className: 'text-center'
                    },
                    {
                        data: 'type',
                        render: function(data, type, row) {
                            if (row.type === "รายวัน") {
                                return `<span class="badge bg-gradient-warning">รายวัน</span>`;
                            } else if (row.type === "รายเดือน") {

                                return `<span class="badge bg-gradient-success">รายเดือน</span>`;
                            } else if (row.type === "รายปี") {

                                return `<span class="badge bg-gradient-info">รายปี</span>`;
                            }
                        },
                        className: 'text-center '
                    },
                    // {
                    //     data: 'type',
                    //     name: 'type',
                    //     className: 'text-center'
                    // },
                    {
                        data: '',
                        // className: 'text-center',
                        render: (data, type, row, debtorg) => {
                            if (row.g_user_id !== "") {
                                return `
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit${row.id}">
                            แก้ไข
                            </button>
                            <div class="modal fade" id="exampleModalEdit${row.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                แก้ไขข้อมูลลูกหนี้
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm${row.id}" action="{{ url('/debtors/update/') }}/${row.id}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">ชื่อ-นามสกุล
                                                    </label>
                                                    <input type="text" class="form-control" name="debtors_name" style="color: black; font-weight: bold;" value="${row.debtors_name}">
                                                </div>
                                                <div class="form-group">
                                                                <label for="exampleFormControlInput1">ที่อยู่
                                                                </label>
                                                                <input type="text" class="form-control" name="debtors_address" style="color: black; font-weight: bold;" value="${row.debtors_address}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">รหัสบัตรประชาชน
                                                                </label>
                                                                <input type="text" class="form-control" style="color: black; font-weight: bold;" value="${row.debtors_id}" disabled>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">เบอร์โทร
                                                                </label>
                                                                <input type="text" class="form-control" name="debtors_phone" style="color: black; font-weight: bold;" value="${row.debtors_phone}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">ลิงค์รูปบัตรประชาชน
                                                                </label>
                                                                <input type="text" class="form-control" name="debtors_id_image" style="color: black; font-weight: bold;" value="${row.debtors_id_image}" disabled>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">เปอร์เซ็น
                                                                </label>
                                                                <input type="text" class="form-control" name="per" style="color: black; font-weight: bold;" value="${row.per}">
                                                            </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" form="editForm${row.id}" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal1${row.id}" disabled>
                                            <i class="fas fa-user-plus"></i>
                                        </button>
                           
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2${row.id}">
                              <i class="fas fa-folder-open"></i>
                                </button>
                                  <div class="modal fade" id="exampleModal2${row.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div  class="modal-content">
                                            <div  class="modal-header">
                                                <h5   class="modal-title" id="exampleModalLabel">
                                                    ข้อมูลคนค้ำประกัน
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div align="center" class="modal-body">
                                                <ul class="list-group"><li class="list-group-item border-0  p-4 mb-2 bg-gray-100 border-radius-lg">
                                                <div  class="d-flex flex-column">
                                                <h6 class="mb-3 text-sm">${row.g_name}</h6>
                                                <span class="mb-2 text-xl"><span class="text-dark font-weight-bold ms-sm-4">${row.g_address}</span></span>
                                                <span class="mb-2 text-xl">${row.g_phone}</span>
                                                <span class="mb-2 text-xl">${row.g_id}</span>
                                                <span class="text-xs">
                              
                                                <img src="data:image/png;base64,${row.g_id_image}" alt="Image" style="max-width:100px; max-height:100px;">
                                                
                                                <span class="text-dark ms-sm-2 font-weight-bold">
                                                
                                                
                                            
                                                </span></span>
                                            </div>
                                            <div align="right" >
                                            <button  type="button" class="btn btn-link text-danger" onclick="confirmDelete(${row.g_user_id})">
                                                <i class="far fa-trash-alt me-2 text-danger"></i>Delete
                                            </button>
                                            </div>
                                        </li></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>  <a class=" btn btn-danger" onclick="confirmDeleteRow(${row.id})">
                                            ลบข้อมูล</a>`;
                            } else {
                                return `<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit${row.id}">
                                แก้ไข
                            </button>
                            <div class="modal fade" id="exampleModalEdit${row.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                แก้ไขข้อมูลลูกหนี้
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm${row.id}" action="{{ url('/debtors/update/') }}/${row.id}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">ชื่อ-นามสกุล
                                                    </label>
                                                    <input type="text" class="form-control" name="debtors_name" style="color: black; font-weight: bold;" value="${row.debtors_name}">
                                                </div>
                                                <div class="form-group">
                                                                <label for="exampleFormControlInput1">ที่อยู่
                                                                </label>
                                                                <input type="text" class="form-control" name="debtors_address" style="color: black; font-weight: bold;" value="${row.debtors_address}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">รหัสบัตรประชาชน
                                                                </label>
                                                                <input type="text" class="form-control" style="color: black; font-weight: bold;" value="${row.debtors_id}" disabled>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">เบอร์โทร
                                                                </label>
                                                                <input type="text" class="form-control" name="debtors_phone" style="color: black; font-weight: bold;" value="${row.debtors_phone}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">ลิงค์รูปบัตรประชาชน
                                                                </label>
                                                                <input type="text" class="form-control" name="debtors_id_image" style="color: black; font-weight: bold;" value="${row.debtors_id_image}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">เปอร์เซ็น
                                                                </label>
                                                                <input type="text" class="form-control" name="per" style="color: black; font-weight: bold;" value="${row.per}">
                                                            </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" form="editForm${row.id}" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal1${row.id}" >
                                            เพิ่ม
                            </button>
                            <div class="modal fade" id="exampleModal1${row.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            เพิ่มข้อมูลคนค้ำประกัน </h5>
                                                        <button type="button" class="btn btn-primary" onclick="fetchDataG()">อ่านข้อมูลจากบัตร</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('deb.storeg') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">ชื่อ-นามสกุล
                                                                </label>
                                                                <input type="text" class="form-control" name="g_name" style="color: black; font-weight: bold;">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">ที่อยู่
                                                                </label>
                                                                <input type="text" class="form-control" name="g_address" style="color: black; font-weight: bold;">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">รหัสบัตรประชาชน
                                                                </label>
                                                                <input type="text" class="form-control" name="g_id" style="color: black; font-weight: bold;">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">เบอร์โทร
                                                                </label>
                                                                <input type="text" class="form-control" name="g_phone" style="color: black; font-weight: bold;">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">ลิงค์รูปบัตรประชาชน
                                                                </label>
                                                                <input type="text" class="form-control" name="g_id_image" style="color: black; font-weight: bold;">
                                                            </div>
                                                            <input type="hidden" class="form-control" name="debt_id" value="${row.id}">

                                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn bg-gradient-primary">Save
                                                                changes</button>
                                                    </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                        <button  type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2${row.id}">
                                           รายละเอียด
                                        </button>
                                        <div class="modal fade" id="exampleModal2${row.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div  class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            ข้อมูลคนค้ำประกัน
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div align="center" class="modal-body">
                                                        <ul class="list-group">
                                                            <li class="list-group-item border-0  p-4 mb-2 bg-gray-100 border-radius-lg">
                                                                <div class="d-flex flex-column">
                                                                    <h6 class="mb-3 text-sm">ไม่มีข้อมูลคนค้ำประกัน</h6>
                                                                </div>
                                                            
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <a class=" btn btn-danger" onclick="confirmDeleteRow(${row.id})">
                                                            ลบข้อมูล</a>`;
                            }
                        }
                    }
                ],
                paging: true,
                lengthMenu: [10, 25, 50, 75, 100, 10000],
                ordering: false,
                info: false,
                language: {
                    search: "<b>ค้นหา</b>",
                    zeroRecords: "ไม่พบข้อมูล - ขออภัย",
                    info: '',
                    infoEmpty: "ไม่มีข้อมูล",
                    infoFiltered: "",
                    lengthMenu: "   _MENU_ ",
                    paginate: {
                        previous: false,
                        next: false
                    }
                },
                destroy: true,
            });
        });
        $(document).ready(function() {
            // เลือกช่อง input ชื่อ-นามสกุล ลูกหนี้
            var debtorsNameInput = $('input[name="debtors_name"]');

            // เมื่อฟิกเคอร์เซอร์เปิดขึ้นมา
            debtorsNameInput.focus();
        });

        function confirmDelete(id) {
            if (confirm('ลบหรือไม่ ?')) {
                fetch(`{{ url('/debtors/storeg/') }}/${id}`, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            // ทำสิ่งที่ต้องการหลังจากลบข้อมูลสำเร็จ
                            // เช่น รีเฟรชตารางข้อมูล
                            location.reload(); // ตัวอย่าง: รีเฟรชหน้า
                        } else {
                            alert('เกิดข้อผิดพลาดในการลบข้อมูล');
                        }
                    })
                    .catch(error => console.error('เกิดข้อผิดพลาดในการลบข้อมูล:', error));
            }
        }

        function confirmDeleteRow(id) {
            if (confirm('ลบหรือไม่ ?')) {
                fetch(`{{ url('/debtors/delete/') }}/${id}`, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            // ทำสิ่งที่ต้องการหลังจากลบข้อมูลสำเร็จ
                            // เช่น รีเฟรชตารางข้อมูล
                            location.reload(); // ตัวอย่าง: รีเฟรชหน้า
                        } else {
                            alert('เกิดข้อผิดพลาดในการลบข้อมูล');
                        }
                    })
                    .catch(error => console.error('เกิดข้อผิดพลาดในการลบข้อมูล:', error));
            }
        }
    </script>
@endsection

<!-- <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            serverSide: true,
            ajax: {
                url: "{{ route('debtor.index') }}",
                type: "GET",
                data: function(d) {
                    d.draw = d.start / d.length + 1;
                }
            },
            columns: [{
                    data: 'debtors_name',
                    name: 'debtors_name'
                },
                {
                    data: 'debtors_phone',
                    name: 'debtors_phone'
                },
                {
                    data: 'per',
                    name: 'per'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: false,
                    searchable: false
                }
            ],
            responsive: true,
            paging: true,
            lengthMenu: [10, 25, 50, 75, 100, 10000],
            ordering: false,
            info: false,
            language: {
                search: "<b>ค้นหา</b>",
                zeroRecords: "ไม่พบข้อมูล - ขออภัย",
                info: '',
                infoEmpty: "ไม่มีข้อมูล",
                infoFiltered: "",
                lengthMenu: "   _MENU_ ",
                paginate: {
                    previous: false,
                    next: false
                }
            }
        });
    });
</script> -->
