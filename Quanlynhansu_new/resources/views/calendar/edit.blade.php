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
                          <select class="form-control js-example-basic-multiple-limit" name='employee_id[]' multiple>
                              <option value=''></option>
                              @foreach ($employee as $item)
                                  <option {{ $employeeofcalendar->contains('id',$item->id) ? 'selected' : '' }} 
                                  value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            
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