{{-- 
@extends('layout.admin')
@section('title')
    <title>Đơn vị</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layout.content-header',['name'=>'Đơn vị','key'=>'Add'])
 
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-6">
            <form action="#" method="POST">
              @csrf
                <div class="form-group">
                  <label>Tên Đơn Vị</label>
                  <input type="text" class="form-control" name='tendv' placeholder="Tên Đơn Vị" >
                </div>
                <div class="form-group">
                    <label>Chọn Chức Vụ</label>
                    <select class="form-control" name='parent_id'>
                      <option value='0'>Chọn Đơn vị</option>
                      {!! $htmlOption !!}
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
 
 @endsection --}}