@extends('layout.main')

@section('tittle')
    <title>Regency</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => ' Regency','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 @if(\Illuminate\Support\Facades\Auth::check())
                     @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 2)
                         <div class="row">
                             <div class="col-md-12">
                                 <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('statists.add')}}" role="button">Thêm Nhân Viên</a>
                             </div>
                             <div class="col-md-12">
                                 <table class="table">
                                     <thead class="thead-dark">
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
                                     @foreach($statist as $item)
                                         <tr>
                                             <th scope="row">{{$item->id}}</th>
                                             <td>{{$item->employee->name}}</td>
                                             <td colspan="2">
                                                 Năm:{{$item->year}}|| Tháng:{{$item->month}}
                                             </td>
                                             <td>{{$item->money}}</td>
                                             <td>{{$item->bonus_money}}</td>
                                             <td>{{$item->discip_money}}</td>
                                             <td>{{$item->real_money}}</td>
                                             <td>{{$item->attend}}</td>
                                             <td>{{$item->absent}}</td>
                                             <td>
                                                 <a class="btn btn-secondary " href="{{route('statists.statist',['id'=>$item->id,'employee_id'=>$item->employee_id,'year'=>$item->year,'month'=>$item->month])}}" role="button">Statist</a>
                                                 {{-- <a href="{{route('regency.edit',['id'=>$regency->id])}}" class="btn btn-default">Sửa</a> --}}
                                                 <a href="{{route('statists.delete',['id'=>$item->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-secondary">Delete</a>
                                             </td>
                                         </tr>
                                     @endforeach
                                     </tbody>
                                 </table>
                             </div>
                              <div class="col-md-12">
                                 {{$statist->links()}}
                             </div>
                         </div>
                      @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                         <div class="row">
                             <div class="col-md-12">
                                 <table class="table">
                                     <thead class="thead-dark">
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
                                     </tr>
                                     </thead>
                                     <tbody>
                                     @foreach($statist as $item)
                                         <tr>
                                             <th scope="row">{{$item->id}}</th>
                                             <td>{{$item->employee->name}}</td>
                                             <td colspan="2">
                                                 Năm:{{$item->year}}|| Tháng:{{$item->month}}
                                             </td>
                                             <td>{{$item->money}}</td>
                                             <td>{{$item->bonus_money}}</td>
                                             <td>{{$item->discip_money}}</td>
                                             <td>{{$item->real_money}}</td>
                                             <td>{{$item->attend}}</td>
                                             <td>{{$item->absent}}</td>
                                         </tr>
                                     @endforeach
                                     </tbody>
                                 </table>
                             </div>
                              <div class="col-md-12">
                                 {{$statist->links()}}
                             </div>
                         </div>
                      @endif
                 @endif

                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
