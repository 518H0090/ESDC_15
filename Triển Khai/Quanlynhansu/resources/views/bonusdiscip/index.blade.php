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
                 @if(\Illuminate\Support\Facades\Auth::check())
                     @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 2)
                         <div class="row">
                             <div class="col-md-12">
                                 <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('bonusdiscip.add')}}" role="button">Thêm</a>
                             </div>
                             <div class="col-md-12">
                                 <table class="table">
                                     <thead class="thead-dark">
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
                                     @foreach($bonusdiscip as $Item)
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
                                             <td>
                                                 <a href="{{route('bonusdiscip.edit',['id'=>$Item->id])}}" class="btn btn-default">Sửa</a>
                                                 <a href="{{route('bonusdiscip.delete',['id'=>$Item->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>
                                             </td>
                                         </tr>
                                     @endforeach
                                     </tbody>
                                 </table>
                             </div>
                             <div class="col-md-12">
                                 {{$bonusdiscip->links()}}
                             </div>
                         </div>
                     @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                         <div class="row">
{{--                             <div class="col-md-12">--}}
{{--                                 <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('bonusdiscip.add')}}" role="button">Thêm</a>--}}
{{--                             </div>--}}
                             <div class="col-md-12">
                                 <table class="table">
                                     <thead class="thead-dark">
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Name</th>
                                         <th scope="col">Type</th>
                                         <th scope="col">Day</th>
                                         <th scope="col">Employee</th>
                                         <th scope="col">Money</th>
                                         <th scope="col">description</th>
{{--                                         <th scope="col">Action</th>--}}
                                     </tr>
                                     </thead>
                                     <tbody>
                                     @foreach($bonusdiscip as $Item)
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
{{--                                             <td>--}}
{{--                                                 <a href="{{route('bonusdiscip.edit',['id'=>$Item->id])}}" class="btn btn-default">Sửa</a>--}}
{{--                                                 <a href="{{route('bonusdiscip.delete',['id'=>$Item->id])}}" onclick="return confirm('xác nhận xóa?');" class="btn btn-default">Xóa</a>--}}
{{--                                             </td>--}}
                                         </tr>
                                     @endforeach
                                     </tbody>
                                 </table>
                             </div>
                             <div class="col-md-12">
                                 {{$bonusdiscip->links()}}
                             </div>
                         </div>
                     @endif
                 @endif

                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
