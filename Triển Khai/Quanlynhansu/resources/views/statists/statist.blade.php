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

                    <div class="col-md-6">
                        <form action="{{route('statists.resultstatist',['id'=>$statist->id])}}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label>Lương Cơ Bản</label>
                                <input type="number" class="form-control "
                                name='money'
                                value="{{$basic_money}}"
                                >
                              </div>

                            <div class="form-group">
                                <label>Tiền Thưởng</label>
                                <input type="number" class="form-control "
                                name='bonus_money'
                                value="{{$bonus_money}}"
                                >
                              </div>

                            <div class="form-group">
                                <label>Tiền Phạt</label>
                                <input type="number" class="form-control "
                                name='discip_money'
                                value="{{$discip_money}}"
                                >
                              </div>
                            <div class="form-group">
                                <label>Ngày Làm</label>
                                <input type="number" class="form-control "
                                name='attend'
                                value="{{$daywork}}"
                                >
                              </div>
                            <div class="form-group">
                                <label>Ngày Nghỉ</label>
                                <input type="number" class="form-control "
                                name='absent'
                                value="{{$dayoff}}"
                                >
                              </div>

                            <div class="form-group">
                                <label>Tiền Kết Toán</label>
                                <input type="number" class="form-control "
                                name='real_money'
                                value="{{$real_money}}"
                                >
                              </div>

                            <div class="form-group">
                                <label>Ngày Kết Toán</label>
                                <input type="date" class="form-control "
                                name='daystatist'
                                value="{{$daystatist}}"
                                >
                              </div>
                            
    
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                       </div>

                    {{-- ngay nghi:{{$dayoff}}<hr>
                    ngaylam:{{$daywork}}<hr>
                    Tiền Lương Cơ Bản:{{$basic_money}}<hr>
                    Tiền Thưởng:{{$bonus_money}}<hr>
                    Tiền Phạt:{{$discip_money}}<hr>
                    Ngày Thống Kê : {{$daystatist}} --}}
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
