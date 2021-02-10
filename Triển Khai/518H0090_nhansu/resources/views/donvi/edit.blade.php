
@extends('layout.admin')
@section('title')
    <title>Đơn vị</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layout.content-header',['name'=>'Đơn vị','key'=>'Edit'])
 
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
            edit donvi
         </div>
         <!-- /.row -->
       </div><!-- /.container-fluid -->
     </div>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
 
 @endsection