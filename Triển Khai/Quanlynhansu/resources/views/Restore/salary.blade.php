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
                                    <th scope="col">Nhân Viên</th>
                                    <th scope="col" colspan='2'>Thời gian cần thống kê</th>
                                    <th scope="col">Lương Cơ Bản</th>
                                    <th scope="col">Lương Thưởng</th>
                                    <th scope="col">Lương Phạt</th>
                                    <th scope="col">Lương Phát</th>
                                    <th scope="col">Có Mặt</th>
                                    <th scope="col">Vắng Mặt</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salary_trash as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>
                                        @if ($item->employee == null)
                                            <b>Xóa Tạm Thời</b>
                                        @else
                                        {{$item->employee->name}}
                                        @endif

                                   </td>
                                    <td colspan="2">
                                        Năm:{{$item->year}}|| Tháng:{{$item->month}}
                                    </td>
                                    <td>{{$item->money}}</td>
                                    <td>{{$item->bonus_money}}</td>
                                    <td>{{$item->discip_money}}</td>
                                    <td>{{$item->real_money}}</td>
                                    <td>{{$item->attend}}</td>
                                    <td>{{$item->absent}}</td>
                                    <td colspan="2">
                                        <a href="{{route('restore.restoreSalaryAction',['id'=>$item->id])}}" class="btn btn-success">Phục Hồi</a>
                                        <a href="{{route('restore.deleteSalaryAction',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Xác nhận xóa luôn?');">Xóa Luôn</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                     </div>
                     <div class="col-md-12">
                         {{$salary_trash->links()}}
                     </div>
                     <div class="col-md-12">
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 float-left" href="{{route('restore.restoreSalaryAll')}}" role="button">Phục Hồi Tất cả</a>
                         </div>
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 bg-gradient-success float-lg-left" href="{{route('restore.deleteSalaryAll')}}" role="button" onclick="return confirm('xác nhận xóa hết?');">Xóa Hết Luôn</a>
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
