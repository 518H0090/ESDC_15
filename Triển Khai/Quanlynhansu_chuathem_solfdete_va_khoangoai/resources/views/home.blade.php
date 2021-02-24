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

                 <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
          
                        <div class="info-box-content">
                          <span class="info-box-text">Khen Thưởng</span>
                          <span class="info-box-number">{{$bonus}}</span>
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
                          <span class="info-box-text">Kỷ Luật</span>
                          <span class="info-box-number">{{$discip}}</span>
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
                          <span class="info-box-text">Tổng Tiền Thưởng</span>
                          <span class="info-box-number">{{$bonus_money}}</span>
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
                          <span class="info-box-text">Tổng Tiền Phạt</span>
                          <span class="info-box-number">{{$discip_money}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  </div>
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
