@extends('layout.main')

@section('tittle')
    <title>Employee</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Employee','sub' => 'Add'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
                 <div class="row">
                   <div class="col-md-6">
                   @csrf
                        <div class="form-group">
                          <label >Name</label>
                          <input type="text" class="form-control" name='name'  placeholder="Nhập tên">
                         
                        </div>
                        <div class="form-group">
                            <label >Phone</label>
                            <input type="number" class="form-control" name='phone' placeholder="Nhập số điện thoại">
                           
                          </div>
                          <div class="form-group">
                            <label>Chọn Chức Vụ</label>
                            <select class="form-control " name='id_regency'>
                                <option value='0'>Chọn Chức Vụ</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                          
                          <div class="form-group">
                            <label>Chọn ảnh</label>
                            <input type="file" class="form-control-file" name='image_employee'>
                          </div>

                          <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                 
                  
                 </div>
                </form>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
