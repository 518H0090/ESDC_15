@extends('layout.main')

@section('tittle')
    <title>Tham Gia</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Tham Gia','sub' => 'Add'])

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
                    <form action="{{route('departmentjoin.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Chọn Phòng Ban</label>
                          <select class="form-control " name='department_id'>
                              <option value=''>Chọn Phòng Ban</option>
                              {!! $department !!}
                          </select>
                      </div>

                      <div class="form-group">
                        <label>Chọn Nhân Viên</label>
                        <select class="form-control " name='employee_id'>
                            <option value=''>Chọn Nhân Viên</option>
                            {!! $employee !!}
                        </select>
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
