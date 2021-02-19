@extends('layout.main')

@section('tittle')
    <title> Department</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => ' Department','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                        <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('department.add')}}" role="button">Thêm</a>
                     </div>
                   <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($deparmentlist as $deparmentItem)
                          <tr>
                            <th scope="row">{{$deparmentItem->id}}</th>
                            <td>{{$deparmentItem->name}}</td>
                            <td>{{$deparmentItem->description}}</td>
                            <td>
                                <a href="{{route('department.edit',['id'=>$deparmentItem->id])}}" class="btn btn-default">Sửa</a>
                                <a href="{{route('department.delete',['id'=>$deparmentItem->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>
                              </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                   </div>
                    <div class="col-md-12">
                        {{$deparmentlist->links()}}
                    </div>
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
