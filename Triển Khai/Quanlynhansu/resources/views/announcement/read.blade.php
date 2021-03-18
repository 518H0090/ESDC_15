@extends('layout.main')

@section('tittle')
    <title>Department</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Department','sub' => 'Add'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('home')}}" class="btn btn-info float-md-right">Quay Lại</a>
                    </div>
                    <div class="col-md-2">

                    </div>

                 <div class="col-md-8">
                    <div class="jumbotron text-center" style="margin-bottom:0">
                        <h1>{{$announcement->name}}</h1>
                        <h3>Thể Loại:{{$announcement->tittle}}</h3>
                      </div>



                      <div class="container" style="margin-top:30px">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <h5 class="accent-info">Ngày Đăng:{{$announcement->timeday}}</h5>
                                  </div>
                            </div>
                            <div class="col-md-6">
                            @if($announcement->user->employee != null)
                                <h4 class="float-md-right"><b>Người Đăng:{{$announcement->user->employee->name}}</b></h4>
                            @else
                                <b>Tạm Thời Xóa</b>
                            @endif
                            </div>

                          <div class="col-md-12">
                                <p>{!! $announcement->description !!}</p>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-md-2">

                </div>

                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
