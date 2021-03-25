@extends('layout.main')

@section('tittle')
    <title>Lịch Làm</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Lịch Làm','sub' => 'Add'])

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
                    <form action="{{route('calendar.store')}}" method="POST">

                        <div class="form-group">
                          <label>Ngày Làm việc</label>
                          <input type="date" class="form-control "
                          name='daywork'
                          placeholder="ngày làm việc"
                          >
                        </div>

                        <div class="form-group">
                          <label>Chọn Nhân Viên</label>
                          <select class="form-control" name='employee_id'>
                              <option value=''>Chọn Nhân Viên</option>
                              {!! $employee !!}
                          </select>
                      </div>

                        <div class="form-group">
                          <label>Ca Làm việc</label>
                          <input type="text" class="form-control "
                          name='ca'
                          placeholder="Ca làm việc"
                          >
                        </div>


                        @csrf
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
