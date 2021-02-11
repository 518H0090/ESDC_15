
@extends('layout.admin')
@section('title')
    <title>Bảng Lương</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layout.content-header',['name'=>'Bảng Lương','key'=>'Add'])
 
     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
                <form action="{{route('bangluong.store')}}" method="POST">
                  @csrf
                    <div class="form-group">
                        <label>Chọn Chức Vụ</label>
                        <select class="form-control" name='tencv'>
                          {!! $htmlOption !!}
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Mức Lương $</label>
                        <input type="text" class="form-control" name='mucluong' placeholder="Mức Lương /$" >
                      </div>
                      <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name='mota' rows="3">

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