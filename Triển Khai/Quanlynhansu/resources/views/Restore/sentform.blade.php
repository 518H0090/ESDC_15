@extends('layout.main')

@section('tittle')
    <title>Regency</title>
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
        @include('layout.content-header',['name' => 'Regency','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tài Khoản</th>
                                <th scope="col">Nhân Viên</th>
                                <th scope="col">Ca Làm</th>
                                <th scope="col">Ngày Làm</th>
                                <th scope="col">Ngày Đăng Ký Kế Hoạch</th>
                                <th scope="col">Xét Duyệt</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sentform_trash as $sent)
                                <tr>
                                    <th scope="row">{{$sent->id}}</th>
                                    <td>
                                       @if ($sent->user == null)
                                       <b>Tạm Thời Xóa</b>
                                       @else
                                       {{$sent->user->email}}
                                       @endif
                                  </td>
                                   <td>
                                       @if ($sent->user->employee == null)
                                           <b>Tạm Thời Xóa</b>
                                       @else
                                       {{$sent->user->employee->name}}
                                       @endif
                                  </td>
                                    <td>{{$sent->ca}}</td>
                                    <td>{{$sent->daywork}}</td>
                                    <td>{{$sent->daysent}}</td>
                                    <td>
                                        @if ($sent->status == 0)
                                            <b>Chưa Duyệt</b>
                                        @else
                                            <b>Đã Duyệt</b>
                                        @endif

                                    </td>
                                    <td colspan="2">
                                        <a href="{{route('restore.restoreSentFormAction',['id'=>$sent->id])}}" class="btn btn-success">Phục Hồi</a>
                                         <a href="{{route('restore.deleteSentFormAction',['id'=>$sent->id])}}" class="btn btn-danger" onclick="return confirm('Xác nhận xóa luôn?');">Xóa Luôn</a>
                                    </td>
                            @endforeach
                            </tbody>
                          </table>
                     </div>
                     <div class="col-md-12">
                         {{$sentform_trash->links()}}
                     </div>
                     <div class="col-md-12">
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 float-left" href="{{route('restore.restoreSentFormAll')}}" role="button">Phục Hồi Tất cả</a>
                         </div>
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 bg-gradient-success float-lg-left" href="{{route('restore.deleteSentFormAll')}}" role="button" onclick="return confirm('xác nhận xóa hết?');">Xóa Hết Luôn</a>
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
