@extends('layout.main')

@section('tittle')
    <title>Tính Lương</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Tính Lương','sub' => 'Add'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                   <div class="col-md-6">
                    <div class="container-fluid">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('statists.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Chọn Nhân Viên</label>
                            <select class="form-control " name='employee_id'>
                                <option value='0'>Chọn Nhân Viên</option>
                                {!! $employee !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Thời gian cần thống kê - Năm</label>
                            <input type="datetime" class="form-control "
                            name='year'
                            placeholder="Điền Năm"
                            >
                          </div>
                        <div class="form-group">
                            <label>Thời gian cần thống kê - Tháng</label>
                            <input type="datetime" class="form-control "
                            name='month'
                            placeholder="Điền Tháng"
                            >
                          </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                   </div>
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
