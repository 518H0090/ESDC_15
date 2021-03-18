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
                                    <th scope="col">Type</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Money</th>
                                    <th scope="col">description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bonusdiscip_trash as $Item)
                                <tr>
                                    <th scope="row">{{$Item->id}}</th>
                                    <td>{{$Item->name}}</td>
                                    <td>{{$Item->type == 0 ? 'Khen thưởng':'Kỷ Luật'}}</td>
                                    <td>{{$Item->day}}</td>
                                    <td>
                                       @if ($Item->employee == null)
                                           <b>Tạm Thời xóa</b>
                                       @else
                                       {{$Item->employee->name}}
                                       @endif

                                  </td>
                                    <td>{{$Item->money}}</td>
                                    <td>{{$Item->description}}</td>
                                    <td colspan="2">
                                        <a href="{{route('restore.restoreBonusDiscipAction',['id'=>$Item->id])}}" class="btn btn-success">Phục Hồi</a>
                                        <a href="{{route('restore.deleteBonusDiscipAction',['id'=>$Item->id])}}" class="btn btn-danger" onclick="return confirm('Xác nhận xóa luôn?');">Xóa Luôn</a>
                                    </td>
                            @endforeach
                            </tbody>
                          </table>
                     </div>
                     <div class="col-md-12">
                         {{$bonusdiscip_trash->links()}}
                     </div>
                     <div class="col-md-12">
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 float-left" href="{{route('restore.restoreBonusDiscipAll')}}" role="button">Phục Hồi Tất cả</a>
                         </div>
                        <div class="col-md-4">
                            <a class="btn btn-info m-2 bg-gradient-success float-lg-left" href="{{route('restore.deleteBonusDiscipAll')}}" role="button" onclick="return confirm('xác nhận xóa hết?');">Xóa Hết Luôn</a>
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
