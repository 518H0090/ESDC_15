
@extends('layout.admin')
@section('title')
    <title>Bảng Lương</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layout.content-header',['name'=>'Bảng Lương','key'=>'List'])
 
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
            <a class="btn btn-primary float-md-right m-4" href="{{route('bangluong.add')}}" role="button">Thêm Danh Mục Lương</a>
           </div>
           <div class="col-md-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên Chức Vụ</th>
                  <th scope="col">Lương</th>
                  <th scope="col">Mô Tả</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listluong as $luong)
                <tr>
                  <th scope="row">{{$luong->id}}</th>
                  <td>{{$luong->tencv}}</td>
                  <td>{{$luong->luong}}</td>
                  <td>{{$luong->mota}}</td>
                  <td>
                    <a href="{{route('bangluong.edit',['id'=>$luong->id])}}" class="btn btn-default">Sửa</a>
                    <a href="{{route('bangluong.delete',['id'=>$luong->id])}}" onclick="return confirm('xác nhận xóa?');"  class="btn btn-danger">Xóa</a>
                  </td>
                </tr>
                @endforeach
                
              
              </tbody>
            </table>
           </div>
           <div class="col-md-12">
             {{$listluong->links()}}
           </div>
         </div>
         <!-- /.row -->
       </div><!-- /.container-fluid -->
     </div>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
 
 @endsection