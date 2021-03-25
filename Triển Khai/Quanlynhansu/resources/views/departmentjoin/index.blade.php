@extends('layout.main')

@section('tittle')
    <title>Tham Gia</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => ' Tham Gia','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 @if(\Illuminate\Support\Facades\Auth::check())
                 @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 2)
                     <div class="row">
                         <div class="col-md-12">
                             <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('departmentjoin.add')}}" role="button">Thêm</a>
                         </div>
                         <div class="col-md-12">
                             <table class="table">
                                 <thead class="thead-dark">
                                 <tr>
                                     <th scope="col">#</th>
                                     <th scope="col">Phòng Ban</th>
                                     <th scope="col">Nhân Viên</th>
                                     <th scope="col">Chức Vụ</th>
                                     <th scope="col">Action</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($departmentjoin as $Item)
                                     <tr>
                                         <th scope="row">{{$Item->id}}</th>
                                         <td>
                                             @if ($Item->department == null)
                                             <b>Tạm Thời Xóa</b>
                                             @else
                                             {{$Item->department->name}}
                                             @endif

                                        </td>
                                         <td>
                                             @if ($Item->employee == null)
                                             <b>Tạm Thời Xóa</b>
                                             @else
                                             {{$Item->employee->name}}
                                             @endif

                                        </td>
                                         <td>
                                             @if ($Item->employee->regency == null)
                                             <b>Tạm Thời Xóa</b>
                                             @else
                                             {{$Item->employee->regency->name}}
                                             @endif
                                        </td>
                                         <td>
                                             <a href="{{route('departmentjoin.edit',['id'=>$Item->id])}}" class="btn btn-default">Sửa</a>
                                             <a href="{{route('departmentjoin.delete',['id'=>$Item->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>
                                         </td>
                                     </tr>
                                 @endforeach
                                 </tbody>
                             </table>
                         </div>
                         <div class="col-md-12">
                             {{$departmentjoin->links()}}
                         </div>
                     </div>
                 @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                         <div class="row">
{{--                             <div class="col-md-12">--}}
{{--                                 <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('departmentjoin.add')}}" role="button">Thêm</a>--}}
{{--                             </div>--}}
                             <div class="col-md-12">
                                 <table class="table">
                                     <thead class="thead-dark">
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Phòng Ban</th>
                                         <th scope="col">Nhân Viên</th>
                                         <th scope="col">Chức Vụ</th>
{{--                                         <th scope="col">Action</th>--}}
                                     </tr>
                                     </thead>
                                     <tbody>
                                     @foreach($departmentjoin as $Item)
                                         <tr>
                                             <th scope="row">{{$Item->id}}</th>
                                             <td>
                                                @if ($Item->department == null)
                                                <b>Tạm Thời Xóa</b>
                                                @else
                                                {{$Item->department->name}}
                                                @endif

                                           </td>
                                            <td>
                                                @if ($Item->employee == null)
                                                <b>Tạm Thời Xóa</b>
                                                @else
                                                {{$Item->employee->name}}
                                                @endif

                                           </td>
                                            <td>
                                                @if ($Item->employee->regency == null)
                                                <b>Tạm Thời Xóa</b>
                                                @else
                                                {{$Item->employee->regency->name}}
                                                @endif
                                           </td>
                                         </tr>
                                     @endforeach
                                     </tbody>
                                 </table>
                             </div>
                             <div class="col-md-12">
                                 {{$departmentjoin->links()}}
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
