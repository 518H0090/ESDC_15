@extends('layout.main')

@section('tittle')
    <title>Regency</title>
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
        @include('layout.content-header',['name' => 'Regency','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Regency</th>
                                <th scope="col">Basic Salary</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($regency_trash as $Eitem)
                            <tr>
                                <th scope="row">{{$Eitem->id}}</th>
                                <td>{{$Eitem->name}}</td>
                                <td>{{$Eitem->basic_salary}}</td>
                                <td>
                                    <a href="{{route('restore.restoreRegencyAction',['id'=>$Eitem->id])}}" class="btn btn-success">Phục Hồi</a>
                                </td>
                                <td>
                                    <a href="{{route('restore.deleteRegencyAction',['id'=>$Eitem->id])}}" class="btn btn-danger" onclick="return confirm('Xác nhận xóa luôn?');">Xóa Luôn</a>
                                </td>
                            </tr>
                            @endforeach


                            </tbody>
                          </table>
                     </div>
                     <div class="col-md-12">
                         {{$regency_trash->links()}}
                     </div>
                     <div class="col-md-12">
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 float-left" href="{{route('restore.restoreRegencyAll')}}" role="button">Phục Hồi Tất cả</a>
                         </div>
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 bg-gradient-success float-lg-left" href="{{route('restore.deleteRegencyAll')}}" role="button" onclick="return confirm('xác nhận xóa hết?');">Xóa Hết Luôn</a>
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
