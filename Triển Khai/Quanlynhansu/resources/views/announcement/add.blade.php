@extends('layout.main')

@section('tittle')
    <title>Department</title>
@endsection

@section('jshead')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('js')
<script>
    CKEDITOR.replace( 'description' );
</script>
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
                    <form action="{{route('announcement.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Tên Bài Viết</label>
                          <input type="text" class="form-control"
                          name='name'
                          placeholder="Điền Tên Bài Viết"
                          >
                        </div>

                        {{-- <div class="form-group">
                          <label>Tiêu Đề</label>
                          <input type="text" class="form-control"
                          name='tittle'
                          placeholder="Điền Tiêu Đề Bài Viết"
                          >
                      </div> --}}

                    <div class="form-group">
                        <label>Chọn Loại Tiêu Đề</label>
                        <select class="form-control" name='department_id'>
                            <option value='0'>Thông Báo Chung</option>
                            {!! $department !!}
                        </select>
                    </div>


                        {{-- <div class="form-group">
                          <label>Ngày Đăng Bài Viết</label>
                          <input type="date" class="form-control"
                          name='timeday'
                          placeholder="Điền Số Tiền"
                          >
                        </div> --}}

                        <div class="form-group">
                          <label>Điền Nội Dung</label>
                          <textarea class="form-control"
                           name='description' id='description' rows="5">

                          </textarea>
                        </div>

                        {{-- <div class="form-group">
                            <label>Người Đăng</label>
                            <input type="text" class="form-control"
                            name='user_id'
                            placeholder="Điền Tên Người Đăng"
                            >
                        </div> --}}

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
