@extends('layout.main')

@section('tittle')
    <title>Nhân Viên</title>
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
        @include('layout.content-header',['name' => 'Nhân Viên','sub' => 'Edit'])

         <!-- Main content -->
         <div class="content">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
             <div class="container-fluid">
                <form action="{{route('employee.update',['id'=>$employee->id])}}" method="POST" enctype="multipart/form-data">
                 <div class="row">
                   <div class="col-md-6">
                   @csrf
                        <div class="form-group">
                          <label >Name</label>
                          <input type="text" class="form-control" name='name'  placeholder="Nhập tên" value="{{$employee->name}}">

                        </div>
                        <div class="form-group">
                            <label >Phone</label>
                            <input type="number" class="form-control" name='phone' placeholder="Nhập số điện thoại"
                             value="{{$employee->phone}}">

                          </div>
                          <div class="form-group">
                            <label>Chọn Chức Vụ</label>
                            <select class="form-control " name='id_regency'>
                                <option value='0'>Chọn Chức Vụ</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <img class='image--small' src="{{$employee->image_employee}}" alt="image">
                            <input type="hidden" name="image_name" value="{{$employee->file_name}}">
                            <input type="hidden" name="image_path" value="{{$employee->image_employee}}">
                          </div>

                          <div class="form-group">
                            <label>Chọn ảnh</label>
                            <input type="file" class="form-control-file" name='image_employee'>
                          </div>

                          <button type="submit" class="btn btn-primary">Submit</button>
                   </div>


                 </div>
                </form>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
