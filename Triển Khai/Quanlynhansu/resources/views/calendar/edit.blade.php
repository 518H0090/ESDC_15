@extends('layout.main')

@section('tittle')
    <title>Department</title>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Department','sub' => 'Add'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                   <div class="col-md-6">
                    <form action="{{route('calendar.update',['id'=>$calendar->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Ngày Làm việc</label>
                          <input type="date" class="form-control "
                          name='daywork'
                          placeholder="ngày làm việc"
                          value = "{{$calendar->daywork}}"
                          >
                        </div>
                        <div class="form-group">
                          <label>Ca Làm việc</label>
                          <input type="text" class="form-control "
                          name='ca'
                          placeholder="Ca làm việc"
                          value="{{$calendar->ca}}"
                          >
                        </div>
                      
                        <div class="form-group">
                          <label>Chọn Nhân Viên</label>
                          <select class="form-control" name='employee_id'>
                              <option value='0'>Chọn Nhân Viên</option>
                              {!! $employee !!}
                          </select>
                      </div>

                        <div class="form-group">
                          <label>Điểm danh</label>
                          <select class="form-control" name='attendance'>
                            @if ($calendar->attendance == 0)
                            <option value='0' selected>Nghỉ làm</option>
                            <option value='1'>Đi làm</option>
                            @else
                            <option value='0'>Nghỉ làm</option>
                            <option value='1' selected>Đi làm</option>
                            @endif
                             
                             
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

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(".js-example-basic-multiple-limit").select2({
      placeholder: 'chọn nhân viên',
    });
  </script>
  
@endsection