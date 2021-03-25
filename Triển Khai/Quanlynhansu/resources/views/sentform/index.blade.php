@extends('layout.main')

@section('tittle')
    <title>Kế Hoạch</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Kế Hoạch','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                        <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('sentform.add')}}" role="button">Đăng ký Kế Hoạch Làm Việc</a>
                     </div>
                      @if(\Illuminate\Support\Facades\Auth::check())
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 2)
                             <div class="col-md-12">
                                 <table class="table">
                                     <thead class="thead-dark">
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
                                     @foreach($sentform as $sent)
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
                                             <td>
                                                 <a href="{{route('sentform.edit',['id'=>$sent->id])}}" class="btn btn-default">Sửa</a>
                                                 <a href="{{route('sentform.delete',['id'=>$sent->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>
                                                 <a href="{{route('sentform.cofirm',['id'=>$sent->id])}}" class="btn btn-default">Duyệt Đơn</a>
                                             </td>
                                         </tr>
                                     @endforeach
                                     </tbody>
                                 </table>
                             </div>
                             <div class="col-md-12">
                                 {{$sentform->links()}}
                             </div>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                             <div class="col-md-12">

                                 <table class="table">
                                     <thead class="thead-dark">
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
                                     @foreach($sentform as $sent)
                                         @if($sent->user_id == \Illuminate\Support\Facades\Auth::user()->id)
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
                                             <td>
                                                 @if($sent->user_id == \Illuminate\Support\Facades\Auth::user()->id && $sent->status == 0)
                                                     <a href="{{route('sentform.edit',['id'=>$sent->id])}}" class="btn btn-default">Sửa</a>
                                                     <a href="{{route('sentform.delete',['id'=>$sent->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>
                                                @else
                                                     <b>Chỉ Xem</b>
                                                 @endif
                                             </td>
                                         </tr>
                                         @else

                                         @endif
                                     @endforeach
                                     </tbody>
                                 </table>
                             </div>
                             <div class="col-md-12">
                                 {{$sentform->links()}}
                             </div>
                        @endif

                      @endif


                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
