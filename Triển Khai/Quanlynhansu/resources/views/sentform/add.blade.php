@extends('layout.main')

@section('tittle')
    <title>Kế Hoạch</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Kế Hoạch','sub' => 'Add'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 @if (\Illuminate\Support\Facades\Auth::check())
                 <div class="row">
                  <div class="col-md-6">
                    <div class="container-fluid">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                   <form action="{{route('sentform.store')}}" method="POST">
                       @csrf
                       <div class="form-group">
{{--                         <label>Tài khoản:cái này để note</label>--}}
                         <input type="hidden" class="form-control"
                         name='user_id'
                         value="{{$user_id}}">
                       </div>

                       <div class="form-group">
{{--                         <label>Nhân Viên:cái này để note</label>--}}
                         <input type="hidden" class="form-control"
                         name='employee_id'

                         value="{{$user_employee_id}}">
                       </div>

                       <div class="form-group">
                         <label>Ca Làm</label>
                         <input type="text" class="form-control"
                         name='ca'
                         placeholder="Điền Ca Làm"
                         value="">
                       </div>

                       <div class="form-group">
                         <label>Ngày Làm</label>
                         <input type="date" class="form-control"
                         name='daywork'
                         value="">
                       </div>

                       {{-- <div class="form-group">
                         <label>Ngày Gửi</label>
                         <input type="date" class="form-control"
                         name='daysent'
                         value="">
                       </div> --}}


                       {{-- <div class="form-group">
                         <label>Trạng Thái</label>
                         <input type="number" class="form-control"
                         name='status'
                         value="">
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
