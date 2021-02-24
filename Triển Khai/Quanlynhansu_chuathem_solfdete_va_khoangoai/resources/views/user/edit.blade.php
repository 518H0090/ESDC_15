@extends('layout.main')

@section('tittle')
    <title>Department</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Department','sub' => 'Add'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                   <div class="col-md-6">
                    <form action="{{route('user.update',['id'=>$user->id])}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Tài Khoản</label>
                            <input type="email" class="form-control"
                            name='email'
                            placeholder="Điền Tên Tài Khoản"
                            value="{{$user->email}}"
                            >
                          </div>

                        {{-- <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" class="form-control"
                            name='password'
                            placeholder="Điền Mật Khẩu"
                            value="{{$user->password}}"
                            >
                          </div> --}}
                    
                      
                      <div class="form-group">
                        <label>Chọn Nhân Viên</label>
                        <select class="form-control " name='employee_id'>
                            <option value='0'>Chọn Nhân Viên</option>
                            {!! $employee !!}
                        </select>
                    </div>

                      <div class="form-group">
                        <label>Chọn Quyền Cho Tài Khoản</label>
                        <select class="form-control " name='role_id'>
                            <option value='0'>Chọn Quyền</option>
                            {!! $role !!}
                        </select>
                    </div>
                      

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                   </div>
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
