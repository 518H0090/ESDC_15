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
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ngày làm Việc</th>
                                    <th scope="col">Năm</th>
                                    <th scope="col">Tháng</th>
                                    <th scope="col">Tuần</th>
                                    <th scope="col">Thứ</th>
                                    <th scope="col">Ca làm</th>
                                    <th scope="col">Nhân Viên</th>
                                    <th scope="col">Điểm danh</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($calendar_trash as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->daywork}}</td>
                                <td>{{\Carbon\Carbon::create($item->daywork)->year}}</td>
                                <td>{{\Carbon\Carbon::create($item->daywork)->monthName}}</td>
                                <td>{{\Carbon\Carbon::create($item->daywork)->weekOfMonth }}</td>
                                <td>
                                    @if(\Carbon\Carbon::create($item->daywork)->dayOfWeekIso == 1)
                                        <b>Thứ 2</b>
                                    @elseif(\Carbon\Carbon::create($item->daywork)->dayOfWeekIso == 2)
                                        <b>Thứ 3</b>
                                    @elseif(\Carbon\Carbon::create($item->daywork)->dayOfWeekIso == 3)
                                        <b>Thứ 4</b>
                                    @elseif(\Carbon\Carbon::create($item->daywork)->dayOfWeekIso == 4)
                                        <b>Thứ 5</b>
                                    @elseif(\Carbon\Carbon::create($item->daywork)->dayOfWeekIso == 5)
                                        <b>Thứ 6</b>
                                    @elseif(\Carbon\Carbon::create($item->daywork)->dayOfWeekIso == 6)
                                        <b>Thứ 7</b>
                                    @elseif(\Carbon\Carbon::create($item->daywork)->dayOfWeekIso == 7)
                                        <b>Chủ Nhật</b>
                                    @endif
                                </td>
                                <td>{{$item->ca}}</td>
                                <td>
                                @if ($item->employee == null)
                                    <b>Tạm Thời Xóa</b>
                                @else
                                {{$item->employee->name}}
                                @endif

                            </td>
                                <td>
                                    {{$item->attendance == 0 ? 'Nghỉ Làm': 'Đi Làm'}}
                                </td>
                                <td colspan="2">
                                    <a href="{{route('restore.restoreCalendarAction',['id'=>$item->id])}}" class="btn btn-success">Phục Hồi</a>
                                    <a href="{{route('restore.deleteCalendarAction',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Xác nhận xóa luôn?');">Xóa Luôn</a>
                                </td>
                            </tr>
                            @endforeach


                            </tbody>
                          </table>
                     </div>
                     <div class="col-md-12">
                         {{$calendar_trash->links()}}
                     </div>
                     <div class="col-md-12">
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 float-left" href="{{route('restore.restoreCalendarAll')}}" role="button">Phục Hồi Tất cả</a>
                         </div>
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 bg-gradient-success float-lg-left" href="{{route('restore.deleteCalendarAll')}}" role="button" onclick="return confirm('xác nhận xóa hết?');">Xóa Hết Luôn</a>
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
