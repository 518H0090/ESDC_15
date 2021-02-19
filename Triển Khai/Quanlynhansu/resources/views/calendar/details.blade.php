@extends('layout.main')

@section('tittle')
    <title>Calendar</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Calendar','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                        <a class="btn btn-secondary btn-lg m-4 float-right" href="{{route('calendar.index')}}" role="button">Quay lại</a>
                     </div>
                   <div class="col-md-12">
                    <div class="col-md-12">
                        ||{{$calendar->daywork}}||
                        {{$calendar->ca}}||
                        <hr>
                    </div>
                    <div class="col-md-6">||
                    @foreach($employeeofcalendar as $item)
                   
                        
                  
                       
                        <span>
                            Nhân viên:
                        </span>
                        <span>
                        {{$item->name}}
                    </span> ||
                    
                
                
                    @endforeach
                </div>
                <div class="col-md-6">||
                    @foreach ($employeeattend as $attend)
                    
                        <span>Điểm danh:</span>
                        <span>{{$attend->attendance == 0 ? 'Nghỉ Làm': 'Đi Làm'}}</span> ||
                 
                     @endforeach
                   </div>
                </div>     
                 </div>
                 <!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
@endsection
