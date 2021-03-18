@extends('layout.main')

@section('tittle')
    <title>Employee</title>
@endsection

@section('css')
    <style>
        .image--small{
            height: 150px;
            width: 100px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Employee','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tài Khoản</th>
                                    <th scope="col">Nhân Viên</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Quyền</th>
                                    <th scope="col">Action</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach($user_trash as $Item)
                                <tr>
                                  <th scope="row">{{$Item->id}}</th>
                                  <td>{{$Item->email}}</td>
                                  <td>
                                    @if ($Item->employee == null)
                                        <b>Tạm Thời Xóa</b>
                                    @else
                                       {{$Item->employee->name}}
                                    @endif

                                  </td>
                                  <td>
                                    @if ($Item->employee == null)
                                    <b>Tạm Thời Xóa</b>
                                    @else
                                    <img class="image--small" src="{{$Item->employee->image_employee}}" alt="">

                                    @endif
                                  </td>
                                  <td>
                                    @if ($Item->role == null)
                                    <b>Tạm Thời Xóa</b>
                                  @else
                                     {{$Item->role->name}}
                                  @endif

                                  </td>
                                  <td colspan="2">
                                    <a href="{{route('restore.restoreUSerAction',['id'=>$Item->id])}}" class="btn btn-success">Phục Hồi</a>
                                    <a href="{{route('restore.deleteUserAction',['id'=>$Item->id])}}" class="btn btn-danger" onclick="return confirm('Xác nhận xóa luôn?');">Xóa Luôn</a>
                                </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                     </div>
                     <div class="col-md-12">
                         {{$user_trash->links()}}
                     </div>
                     <div class="col-md-12">
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 float-left" href="{{route('restore.restoreUserAll')}}" role="button">Phục Hồi Tất cả</a>
                         </div>
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 bg-gradient-success float-lg-left" href="{{route('restore.deleteUserAll')}}" role="button" onclick="return confirm('xác nhận xóa hết?');">Xóa Hết Luôn</a>
                         </div>
                        <div class="col-md-4">
                            <a class="btn btn-danger m-2 float-sm-left" href="{{route('restore.index')}}" role="button">Quay Lại</a>
                         </div>
                    </div>
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
