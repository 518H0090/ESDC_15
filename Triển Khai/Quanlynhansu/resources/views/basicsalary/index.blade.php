@extends('layout.main')

@section('tittle')
    <title>Basic Salary</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => ' Basic Salary','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                        <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('basicsalary.add')}}" role="button">Thêm</a>
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
                        @foreach($basicsalary as $salary)
                          <tr>
                            <th scope="row">{{$salary->id}}</th>
                            <td>{{$salary->regency->name}}</td>
                            <td>{{$salary->salary}}</td>
                            <td>
                                <a href="{{route('basicsalary.edit',['id'=>$salary->id])}}" class="btn btn-default">Sửa</a>
                                <a href="{{route('basicsalary.delete',['id'=>$salary->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>
                              </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                   </div>
                    <div class="col-md-12">
                        {{$basicsalary->links()}}
                    </div>
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
