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
                        <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('employee.add')}}" role="button">Thêm</a>
                     </div>
                     <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Regency</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($Employee as $Eitem)
                            <tr>
                                <th scope="row">{{$Eitem->id}}</th>
                                <td>{{$Eitem->name}}</td>
                                <td>
                                    <img class='image--small' src="{{$Eitem->image_employee}}" alt="Anh_nhanvien">
                                </td>
                                <td>{{$Eitem->phone}}</td>
                                <td>
                                    @if ($Eitem->regency == null)
                                       <b>Tạm Thời Xóa</b> 
                                    @else
                                    {{$Eitem->regency->name}}
                                    @endif
                                    
                                </td>
                                <td>
                                    <a href="{{route('employee.edit',['id'=>$Eitem->id])}}" class="btn btn-default">Sửa</a>
                                    <a href="{{route('employee.delete',['id'=>$Eitem->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                              
                    
                            </tbody>
                          </table>
                     </div>
                     <div class="col-md-12">
                         {{$Employee->links()}}
                     </div>
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
