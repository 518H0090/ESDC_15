@extends('layout.main')

@section('tittle')
    <title>Calendar</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Calendar','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
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
                            {{-- <th scope="col">Nhân Viên</th>
                            <th scope="col">Điểm danh</th> --}}
                            <th scope="col">Ca làm</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($calendarList as $item)
                          <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->daywork}}</td>
                            {{-- <td>
                              @foreach ($item->employee as $value)
                                {{$value->name}}
                              @endforeach
                            </td>
                            <td>
                              @foreach ($item->attend as $value)
                                {{$value->attendance == 0 ? 'Nghỉ Làm': 'Đi Làm'}}
                              @endforeach
                            </td>   --}}
                            <td>{{$item->ca}}</td>
                            <td>
                                <a href="{{route('calendar.details',['id'=>$item->id])}}" class="btn btn-default">Chi tiết</a>
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
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
