
@extends('layout.admin')
@section('title')
    <title>Chức Vụ</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layout.content-header',['name'=>'Chức vụ','key'=>'Edit'])
 
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-6">
            <form action="{{route('donvi.update',['id'=>$donvi->id])}}" method="post">
              @csrf
                <div class="form-group">
                  <label>Tên Đơn Vị</label>
                  <input type="text" class="form-control" name='tendv' value='{{$donvi->tendv}}' placeholder="Tên Chức Vụ" >
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