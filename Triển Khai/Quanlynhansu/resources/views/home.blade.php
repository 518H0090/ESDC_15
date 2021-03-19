@extends('layout.main')

@section('tittle')
    <title>Home</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Home','sub' => 'Starter Page'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Nhân Viên</span>
                          <span class="info-box-number">{{$employee}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Phòng Ban</span>
                          <span class="info-box-number">{{$deparment}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Tài Khoản</span>
                          <span class="info-box-number">{{$user}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Chức vụ</span>
                          <span class="info-box-number">{{$regency}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  </div>
                 <!-- /.row -->
                 <div class="col-md-12">
                    <br>
                    <br>
                </div>

                 <div class="row">
                    <div class="col-md-12">
                        <b class="alert alert-primary btn-lg active">Thông Báo</b>
                    </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  </div>

                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Thông Báo</th>
                            <th scope="col">Loại Thông Báo</th>
                            <th scope="col">Đọc</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach($announcement as $item)
                          @if(\Illuminate\Support\Facades\Auth::user()->employee->departmentjoin->department == null)
                            @if($item->department_id == 0)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->name}}</td>

                                    @if ($item->department != null)
                                        <td>{{$item->department->name}}</td>
                                    @elseif($item->department_id == 0)
                                        <td>Thông Báo Chung</td>
                                    @elseif($item->department == null and $item->department_id !=0 )
                                        <td>
                                            <b>Tạm Thời Xóa</b>
                                        </td>
                                    @endif

                                    <td>
                                        <a href="{{route('announcement.read',['id'=>$item->id])}}" class="btn btn-success">Click Here</a>
                                    </td>
                                </tr>
                            @else
                            @endif
                          @else
                              @if(\Illuminate\Support\Facades\Auth::user()->employee->departmentjoin->department->id ==  $item->department_id || $item->department_id==0)
                              <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->name}}</td>

                                @if ($item->department != null)
                                  <td>{{$item->department->name}}</td>
                                @elseif($item->department_id == 0)
                                    <td>Thông Báo Chung</td>
                                @elseif($item->department == null and $item->department_id !=0 )
                                    <td>
                                        <b>Tạm Thời Xóa</b>
                                    </td>
                                @endif

                                <td>
                                    <a href="{{route('announcement.read',['id'=>$item->id])}}" class="btn btn-success">Click Here</a>
                                </td>
                              </tr>
                                @endif
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                </div>



             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
