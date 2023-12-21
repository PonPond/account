@extends('layouts.index')
@section('content')


<div class="col-lg-3">
        <div class="card ">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">เพิ่มข้อมูลลูกหนี้</h6>
                    </div>

                </div>
            </div>
            <div class="card-body p-3 pb-0">

                <form action="#" method="POST" enctype="multipart/form-data">
                    <form id="post-form">
                        @csrf
                        <div class="row">

                           

                            <div class="mb-3">
                            <input type="text" class="form-control" placeholder="ชื่อลูกหนี้"  />
                            </div>

                            <div class="mb-3">
                            <input type="text" class="form-control" placeholder="ที่อยู่"  />
                            </div>

                            <div class="mb-3">
                            <input type="text" class="form-control" placeholder="เบอร์โทร"  />
                            </div>

                            <div class="mb-3">
                            <input type="text" class="form-control" placeholder="หลักฐานบัตรประชาชนหรืออื่นๆ"  />
                            </div>

                            <div class="mb-3">
                            <input type="text" class="form-control" placeholder="ชื่อคนค้ำประกัน"  />
                            </div>

                            <div class="mb-3">
                            <input type="text" class="form-control" placeholder="ที่อยู่คนค้ำประกัน"  />
                            </div>

                            <div class="mb-3">
                            <input type="text" class="form-control" placeholder="เบอร์โทรคนค้ำประกัน"  />
                            </div>

                            <div class="mb-3">
                            <input type="text" class="form-control" placeholder="หลักฐานบัตรประชาชนหรืออื่นๆ สำหรับคนค้ำประกัน"  />
                            </div>

                            <div class="mb-3">
  
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected>ประเภทการยืม</option>
                            <option value="1">รายวัน</option>
                            <option value="2">รายเดือน</option>
                            <option value="3">รายปี</option>
                            </select>

                            </div>



                            <button type="input" class="btn btn-primary">เพิ่มข้อมูล</button>

                            
                        </div>

                    </form>
            </div>
        </div>
        </div>



<div class="col-lg-9 mb-4 ">
<div class="table-responsive">
  <table class="table table-dark">
    <thead>
      <tr>
        <th>ID</th>
        <th>ชื่อ</th>
        <th>เบอร์โทร</th>
        <th>ที่อยู่</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium">Angular Project</span></td>
        <td>Albert Cook</td>
        <td>
          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
             
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
             
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
             
            </li>
          </ul>
        </td>
        <td><span class="badge bg-label-primary me-1">Active</span></td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td><i class="fab fa-react fa-lg text-info me-3"></i> <span class="fw-medium">React Project</span></td>
        <td>Barry Hunter</td>
        <td>
          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
            
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
            
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
             
            </li>
          </ul>
        </td>
        <td><span class="badge bg-label-success me-1">Completed</span></td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <span class="fw-medium">VueJs Project</span></td>
        <td>Trevor Baker</td>
        <td>
          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
             
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
           
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
             
            </li>
          </ul>
        </td>
        <td><span class="badge bg-label-info me-1">Scheduled</span></td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <span class="fw-medium">Bootstrap Project</span></td>
        <td>Jerry Milton</td>
        <td>
          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
            
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
            
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
            
            </li>
          </ul>
        </td>
        <td><span class="badge bg-label-warning me-1">Pending</span></td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
@endsection

