
@extends('layout.admin')
@section('title')
    <title>Chức vụ</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layout.content-header',['name'=>'Chức vụ','key'=>'List'])
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
            <a class="btn btn-primary float-md-right m-4" href="{{route('chucvu.add')}}" role="button">Thêm Chức vụ</a>
           </div>
           <div class="col-md-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên Chức Vụ</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                {{-- lấy hết dữ liệu trong bảng --}}
                @foreach ($listchucvu as $chucvu)
                <tr>
                  <th scope="row">{{$chucvu->id}}</th>
                  <td>{{$chucvu->TenCV}}</td>
                  <td>
                    <a href="{{route('chucvu.edit',['id'=>$chucvu->id])}}" class="btn btn-default">Sửa</a>
                    <a href="{{route('chucvu.delete',['id'=>$chucvu->id])}}" onclick="return confirm('xác nhận xóa?');"  class="btn btn-danger">Xóa</a>
                  </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
         </div>
          {{-- pagination --}}
        <div class="col-md-12">
          {{$listchucvu->links()}}
       </div>
        </div>

         <!-- /.row -->
       </div><!-- /.container-fluid -->
     </div>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
 
 @endsection