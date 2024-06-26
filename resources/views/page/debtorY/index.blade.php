@extends('layouts.index')
@section('content')
<style>
    #myTable_wrapper {
        padding: 10px;

    }



</style>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>ข้อมูลลูกหนี้ทั้งหมด</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class=" p-0">
                <table class="table align-items-center mb-0 mx-0 w-100 " id="myTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase  text-md font-weight-bolder opacity-7 ">ชื่อ-ที่อยู่</th>
                            <th class="text-uppercase  text-md font-weight-bolder opacity-7">เบอร์โทร</th>
                            <th class="text-uppercase  text-md font-weight-bolder opacity-7">หลักฐาน</th>
                            <th class="text-uppercase  text-md font-weight-bolder opacity-7">ประเภท</th>
                            <th class=" opacity-7 w-25"></th>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('debtory.index') }}",
            responsive: true,

            columns: [{
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
                    data: 'debtors_id_image',
                    render: function(data, type, row) {
                    var image = row.debtors_id_image; // ดึงข้อมูลจากคอลัมน์ debtors_id_image
                    // ตรวจสอบว่าข้อมูลรูปภาพไม่เป็น null และไม่ว่าง
                    if (image) {
                        // สร้าง element <img> เพื่อแสดงรูปภาพ
                        if(image == "-"){
                            return 'ไม่มีรูป';
                        }else{
                            return '<img src="data:image/png;base64,' + image + '" alt="Image" style="max-width:100px; max-height:100px;">';
                        }
                        
                    } else {
                        return ''; // หรือสามารถใส่ข้อความว่างเปล่าก็ได้
                    }
                }
                },
               
                {
                    data: 'type',
                    render: function(data, type, row) {

                        return `<span class="badge bg-gradient-info">รายปี</span>`;

                    },
                    className: 'text-center '
                },
                {
                    data: 'type',
                    render: function(data, type, row) {
                        return '<a href="/debtors-m/' + row.id + '" class="btn btn-primary" style="width: 80%;margin-left: 10%">จัดการหนี้</a>';
                    },
                    className: 'text-center'
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
</script>
@endsection