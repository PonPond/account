@extends('layouts.index')
@inject('ThaiFormat', 'App\Services\ThaiDate')
@section('content')
    <div class="col-12">

        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>สร้างรายการหนี้ของ {{ $deb1->debtors_name }} เบอร์โทร : {{ $deb1->debtors_phone }} </h6>
                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    สร้างรายการ
                </button>
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

                            <form action="{{ route('debtorsM.storeround') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="debt_id" value="{{ $deb1->id }}">
                                <button type="button" class="btn bg-gradient-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                        </div>

                        </form>


                    </div>
                </div>
            </div>



            <div class="row">
                @foreach ($deb4 as $item)
                    <div class="col-md-4 mt-4">
                        <div class="card card-blog card-plain">
                            <div class="card-body px-1 pt-3">
                                <h5>
                                    {{ $ThaiFormat->makeFormat2($item->created_at) }}
                                </h5>
                                <a href="{{ url('/debtors-m/round/' . $item->id) }}" class=" btn btn-primary"
                                    style="width: 80%;margin-left: 10% "> จัดการหนี้</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endsection
