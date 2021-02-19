@extends('layout.main')

@section('tittle')
    <title>Department</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Department','sub' => 'Edit'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                   <div class="col-md-6">
                    <form action="{{route('department.update',['id'=>$department->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Tên Phòng Ban</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror"
                          name='name'
                          placeholder="Điền Tên Phòng Ban"
                          value="{{$department->name}}">
                        </div>
                        @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Điền mô tả</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                             name='description' rows="8">
                             {{$department->description}}
                            </textarea>
                          </div>
                          @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror

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
