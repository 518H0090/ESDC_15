@extends('layout.main')

@section('tittle')
    <title>Sent Form</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Sent Form','sub' => 'Add'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 @if (\Illuminate\Support\Facades\Auth::check())
                 <div class="row">
                  <div class="col-md-6">
                   <form action="{{route('sentform.update',['id'=>$sentform->id])}}" method="POST">
                       @csrf
                       <div class="form-group">
                         <input type="hidden" class="form-control"
                         name='user_id'
                         value="{{$sentform->user_id}}">
                       </div>

                       <div class="form-group">
                         <input type="hidden" class="form-control"
                         name='employee_id'

                         value="{{$sentform->employee_id}}">
                       </div>

                       <div class="form-group">
                         <label>Ca Làm</label>
                         <input type="text" class="form-control"
                         name='ca'
                         placeholder="Điền Ca Làm"
                         value="{{$sentform->ca}}">
                       </div>

                       <div class="form-group">
                         <label>Ngày Làm</label>
                         <input type="date" class="form-control"
                         name='daywork'
                         value="{{$sentform->daywork}}">
                       </div>

                       {{-- <div class="form-group">
                         <label>Ngày Gửi</label>
                         <input type="date" class="form-control"
                         name='daysent'
                         value="{{$sentform->daysent}}">
                       </div>

                       <div class="form-group">
                        <label>Chọn Chức Vụ</label>
                        <select class="form-control " name='status'>
                            @if ($sentform->status == 0)
                            <option value='0' selected>Chưa duyệt</option>
                            <option value='1'>Đã duyệt</option>
                            @else
                            <option value='0'>Chưa duyệt</option>
                            <option value='1' selected>Đã duyệt</option>
                            @endif
                        </select>
                    </div> --}}
                       <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
                  </div>
                </div>
                 @else
                 <div class="row">
                  <div class="col-md-12">
                      Lỗi Form
                  </div>
                     <div class="col-md-12">
                         <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('dangnhap.logout')}}" role="button">Quay lại đăng nhập</a>
                     </div>
                </div>
                 @endif
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
