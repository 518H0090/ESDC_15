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
                    <form action="{{route('user.updatepassword',['id'=>$user->id])}}" method="POST">
                        @csrf

                       

                        <div class="form-group">
                            <label>Mật Khẩu Mới</label>
                            <input type="password" class="form-control"
                            name='password'
                            placeholder="Điền Mật Khẩu Mới"
                            value="{{$user->password}}"
                            >
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
