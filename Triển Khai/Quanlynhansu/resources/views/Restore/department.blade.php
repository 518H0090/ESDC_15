@extends('layout.main')

@section('tittle')
    <title>Employee</title>
@endsection

@section('css')
    <style>
        .image--small{
            height: 150px;
            width: 100px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Employee','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach($department_trash as $deparmentItem)
                                <tr>
                                  <th scope="row">{{$deparmentItem->id}}</th>
                                  <td>{{$deparmentItem->name}}</td>
                                  <td>{{$deparmentItem->description}}</td>
                                  <td>
                                    <a href="{{route('restore.restoreDeparmentAction',['id'=>$deparmentItem->id])}}" class="btn btn-success">Phục Hồi</a>
                                    <a href="{{route('restore.deleteDeparmentAction',['id'=>$deparmentItem->id])}}" class="btn btn-danger" onclick="return confirm('Xác nhận xóa luôn?');">Xóa Luôn</a>

                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                     </div>
                     <div class="col-md-12">
                         {{$department_trash->links()}}
                     </div>
                     <div class="col-md-12">
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 float-left" href="{{route('restore.restoreDeparmentAll')}}" role="button">Phục Hồi Tất cả</a>
                         </div>
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 bg-gradient-success float-lg-left" href="{{route('restore.deleteDeparmentAll')}}" role="button" onclick="return confirm('xác nhận xóa hết?');">Xóa Hết Luôn</a>
                         </div>
                        <div class="col-md-4">
                            <a class="btn btn-danger m-2 float-sm-left" href="{{route('restore.index')}}" role="button">Quay Lại</a>
                         </div>
                    </div>
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
