
@extends('layout.admin')
@section('title')
    <title>Đơn vị</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layout.content-header',['name'=>'Đơn vị','key'=>'List'])
 
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
            <a class="btn btn-primary float-md-right m-4" href="{{route('donvi.add')}}" role="button">Thêm Đơn Vị</a>
           </div>
           <div class="col-md-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên Đơn Vị</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listdonvi as $donvi)
                <tr>
                  <th scope="row">{{$donvi->id}}</th>
                  <td>{{$donvi->tendv}}</td>
                  <td>
                    <a href="{{route('donvi.edit',['id'=>$donvi->id])}}" class="btn btn-default">Sửa</a>
                    <a href="{{route('donvi.delete',['id'=>$donvi->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
           </div>
           <div class="col-md-12">
             {{$listdonvi->links()}}
           </div>
         </div>
         <!-- /.row -->
       </div><!-- /.container-fluid -->
     </div>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
 
 @endsection