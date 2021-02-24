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
                   <div class="col-md-6">
                    <form action="{{route('departmentjoin.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Chọn Phòng Ban</label>
                          <select class="form-control " name='department_id'>
                              <option value='0'>Chọn Phòng Ban</option>
                              {!! $department !!}
                          </select>
                      </div>
                      
                      <div class="form-group">
                        <label>Chọn Nhân Viên</label>
                        <select class="form-control " name='employee_id'>
                            <option value='0'>Chọn Nhân Viên</option>
                            {!! $employee !!}
                        </select>
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
