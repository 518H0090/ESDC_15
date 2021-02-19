@extends('layout.main')

@section('tittle')
    <title>Department</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Basic Salary','sub' => 'Edit'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                   <div class="col-md-6">
                    <form action="{{route('basicsalary.update',['id'=>$salary->id])}}" method="POST">
                      @csrf
                      <div class="form-group">
                          <label>Chọn Chức Vụ</label>
                          <select class="form-control" name='id_regency'>
                              <option value='0'>Chọn Chức Vụ</option>
                              {!! $htmlOption !!}
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Nhập số tiền cơ bản</label>
                        <input type="text" class="form-control @error('salary') is-invalid @enderror"
                        name='salary'
                        placeholder="Điền số tiền"
                        value="{{$salary->salary}}">
                      </div>
                      @error('salary')
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
