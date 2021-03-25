@extends('layout.main')

@section('tittle')
    <title>Phòng Làm</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Phòng Làm','sub' => 'Edit'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                   <div class="col-md-6">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="{{route('department.update',['id'=>$department->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Tên Phòng Ban</label>
                          <input type="text" class="form-control"
                          name='name'
                          placeholder="Điền Tên Phòng Ban"
                          value="{{$department->name}}">
                        </div>


                        <div class="form-group">
                            <label>Điền mô tả</label>
                            <textarea class="form-control"
                             name='description' rows="8">
                             {{$department->description}}
                            </textarea>
                          </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                   </div>
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
