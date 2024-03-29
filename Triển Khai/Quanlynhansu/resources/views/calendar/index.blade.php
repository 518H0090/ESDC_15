@extends('layout.main')

@section('tittle')
    <title>Lịch Làm</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Lịch Làm','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 @if(\Illuminate\Support\Facades\Auth::check())

                     @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 2)
                         <div class="row">
                             <div class="col-md-12">
                                 <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('calendar.add')}}" role="button">Thêm</a>
                             </div>
                             <div class="col-md-12">
                                 <table class="table">
                                     <thead class="thead-dark">
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
                                     @foreach($calendarList as $item)
                                         <tr>
                                             <th scope="row">{{$item->id}}</th>
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
                                             <td>
                                                 <a href="{{route('calendar.edit',['id'=>$item->id])}}" class="btn btn-default">Sửa</a>
                                                 <a href="{{route('calendar.delete',['id'=>$item->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>
                                             </td>
                                         </tr>
                                     @endforeach
                                     </tbody>
                                 </table>
                             </div>
                             <div class="col-md-12">
                                 {{$calendarList->links()}}
                             </div>
                         </div>
                     @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                         <div class="row">
{{--                             <div class="col-md-12">--}}
{{--                                 <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('calendar.add')}}" role="button">Thêm</a>--}}
{{--                             </div>--}}
                             <div class="col-md-12">
                                 <table class="table">
                                     <thead class="thead-dark">
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
                                     @foreach($calendarList as $item)
                                         <tr>
                                             <th scope="row">{{$item->id}}</th>
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
                                             <td>
                                                 Xem
                                             </td>
                                         </tr>
                                     @endforeach
                                     </tbody>
                                 </table>
                             </div>
                             <div class="col-md-12">
                                 {{$calendarList->links()}}
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
