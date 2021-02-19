@extends('layout.main')

@section('tittle')
    <title>Department</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Basic Salary','sub' => 'Add'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                   <div class="col-md-6">
                    <form action="" method="POST">
                      @csrf
                      <div class="form-group">
                        <label>Chọn Nhân viên</label>
                        <select class="form-control" name='employee_id'>
                            <option value='0'>chọn nhân viên</option>
                            {!! $employees !!}
                        </select>
                    </div>

                    <div class="form-group">
                      <label>Chọn Nhân viên</label>
                      <select class="form-control" name='employee_id'>
                          <option value='0'>chọn nhân viên</option>
                          {!! $employees !!}
                      </select>
                  </div>

                      {{-- <div class="form-group">
                        <label>Số tiền cơ bản nhận được</label>
                        <input type="text" class="form-control"
                        name='salary'
                        placeholder="Điền số tiền"
                        value="" disabled>
                      </div>

                      <div class="form-group">
                        <label>Số tiền thưởng</label>
                        <input type="text" class="form-control"
                        name='salary'
                        placeholder="Điền số tiền"
                        value="Mặc định" disabled>
                      </div>

                      <div class="form-group">
                        <label>Số tiền Phạt</label>
                        <input type="text" class="form-control"
                        name='salary'
                        placeholder="Điền số tiền"
                        value="Mặc định" disabled>
                      </div> --}}
                      
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
