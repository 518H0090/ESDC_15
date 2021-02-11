
@extends('layout.admin')
@section('title')
    <title>HOME</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layout.content-header',['name'=>'Home','key'=>'Start Page'])
 
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
           Home Page
         </div>
         <!-- /.row -->
       </div><!-- /.container-fluid -->
     </div>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
 
 @endsection