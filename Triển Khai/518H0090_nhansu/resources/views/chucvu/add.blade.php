
@extends('layout.admin')
@section('title')
    <title>Chức Vụ</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layout.content-header',['name'=>'Home','key'=>'Add'])
 
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-6">
            <form action="{{route('chucvu.store')}}" method="POST">
              @csrf
                <div class="form-group">
                  <label>Tên Chức Vụ</label>
                  <input type="text" class="form-control" name='TenCV' placeholder="Tên Chức Vụ" >
                </div>
                <div class="form-group">
                    <label>Chọn Chức Vụ</label>
                    <select class="form-control" name='parent_id'>
                      <option value='0'>Chọn Chức Vụ</option>
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
 
 @endsection