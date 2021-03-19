@extends('layout.main')

@section('tittle')
    <title> Department</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => ' Department','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     @if(\Illuminate\Support\Facades\Auth::check())
                     <div class="col-md-12">
                        <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('announcement.add')}}" role="button">Thêm</a>
                     </div>
                   <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Tittle</th>
                            <th scope="col">Content</th>
                            <th scope="col">Day Update</th>
                            <th scope="col">User Update</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($announce as $deparmentItem)
                          <tr>
                            <th scope="row">{{$deparmentItem->id}}</th>
                            <td>{{$deparmentItem->name}}</td>
                            @if ($deparmentItem->department != null)
                                <td>{{$deparmentItem->department->name}}</td>
                            @elseif($deparmentItem->department_id == 0)
                                <td>Thông Báo Chung</td>
                            @else
                                <td>
                                    <b>Tạm Thời Xóa</b>
                                </td>
                            @endif
                            <td>{{$deparmentItem->description}}</td>
                            <td>{{$deparmentItem->timeday}}</td>
                             @if($deparmentItem->user->employee != null)
                                <td>{{$deparmentItem->user->employee->name}}</td>
                             @else
                             <td>
                                 <b>Tạm Thời Xóa</b>
                            </td>
                             @endif
                            <td>
                                <a href="{{route('announcement.edit',['id'=>$deparmentItem->id])}}" class="btn btn-info">Sửa</a>
                                <a href="{{route('announcement.delete',['id'=>$deparmentItem->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-danger">Xóa</a>
                              </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                   </div>
                    <div class="col-md-12">
                        {{$announce->links()}}
                    </div>
                         @endif
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
