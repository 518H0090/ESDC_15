@extends('layout.main')

@section('tittle')
    <title> Department</title>
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
        @include('layout.content-header',['name' => ' Department','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                        <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('user.add')}}" role="button">Thêm</a>
                     </div>
                   <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tài Khoản</th>
                            <th scope="col">Nhân Viên</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Chức Vụ</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $Item)
                          <tr>
                            <th scope="row">{{$Item->id}}</th>
                            <td>{{$Item->email}}</td>
                            <td>
                              @if ($Item->employee_id == null)
                                {{$Item->employee_id}}
                              @else
                                 {{$Item->employee->name}}                                  
                              @endif

                            </td>
                            <td>
                              @if ($Item->employee_id == null)
                                {{$Item->employee_id}}
                              @else
                              <img class="image--small" src="{{$Item->employee->image_employee}}" alt="">
                                            
                              @endif
                            </td>
                            <td>
                              @if ($Item->role_id == null)
                              {{$Item->role_id}}
                            @else
                               {{$Item->role->name}}                                  
                            @endif
                            
                            </td>
                            <td>
                                <a href="{{route('user.edit',['id'=>$Item->id])}}" class="btn btn-default">Sửa</a>
                                <a href="{{route('user.editpassword',['id'=>$Item->id])}}" class="btn btn-default">Sửa Mật Khẩu</a>
                                <a href="{{route('user.delete',['id'=>$Item->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>
                              </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                   </div>
                    <div class="col-md-12">
                        {{$users->links()}}
                    </div>
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
