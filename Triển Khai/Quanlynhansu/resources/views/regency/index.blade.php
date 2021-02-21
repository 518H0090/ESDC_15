@extends('layout.main')

@section('tittle')
    <title>Regency</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => ' Regency','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     {{-- <div class="col-md-12">
                        <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('regency.add')}}" role="button">Thêm</a>
                     </div> --}}
                   <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Tiền Lương Cơ Bản</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($regencys as $regency)
                          <tr>
                            <th scope="row">{{$regency->id}}</th>
                            <td>{{$regency->name}}</td>
                            <td>{{$regency->basic_money}}</td>
                            <td>
                                <a href="{{route('regency.edit',['id'=>$regency->id])}}" class="btn btn-default">Sửa</a>
                                {{-- <a href="{{route('regency.delete',['id'=>$regency->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a> --}}
                              </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                   </div>
                    <div class="col-md-12">
                        {{$regencys->links()}}
                    </div>
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
