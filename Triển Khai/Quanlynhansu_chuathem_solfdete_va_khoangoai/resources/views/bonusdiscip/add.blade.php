@extends('layout.main')

@section('tittle')
    <title>Department</title>
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
                    <form action="{{route('bonusdiscip.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Tên Loại Khen thưởng - Kỷ luật</label>
                          <input type="text" class="form-control"
                          name='name'
                          placeholder="Điền Tên Khen thưởng - kỷ luật"
                          >
                        </div>

                        <div class="form-group">
                          <label>Chọn Loại Khen thưởng - Kỷ luật</label>
                          <select class="form-control" name='type'>
                              <option value='0'>Khen Thưởng</option>
                              <option value='1'>Kỷ Luật</option>
                          </select>
                      </div>

                        <div class="form-group">
                          <label>Ngày quyết định</label>
                          <input type="date" class="form-control"
                          name='day'
                          placeholder="ngày quyết định"
                          value = '{{$timenow}}'
                          >
                        </div>

                        <div class="form-group">
                          <label>Chọn Nhân viên</label>
                          <select class="form-control" name='employee_id'>
                              <option value='0'>chọn nhân viên</option>
                              {!! $employee !!}
                          </select>
                      </div>

                        
                        <div class="form-group">
                          <label>Điền Số tiền</label>
                          <input type="number" class="form-control"
                          name='money'
                          placeholder="Điền Số Tiền"
                          >
                        </div>

                        <div class="form-group">
                          <label>Điền mô tả</label>
                          <textarea class="form-control"
                           name='description' rows="5">
                          
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
