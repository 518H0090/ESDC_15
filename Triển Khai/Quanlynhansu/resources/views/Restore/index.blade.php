@extends('layout.main')

@section('tittle')
    <title>Phục Hồi</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layout.content-header',['name' => 'Phục Hồi','sub' => 'List'])

         <!-- Main content -->
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Employee Restore</h5>
                              <p class="card-text">Hello Employee</p>
                              <a href="{{route('restore.restoreEmployee')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Regency Restore</h5>
                              <p class="card-text">Hello Regency</p>
                              <a href="{{route('restore.restoreRegency')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Calendar Restore</h5>
                              <p class="card-text">Hello Calendar</p>
                              <a href="{{route('restore.restoreCalendar')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Sent Form Restore</h5>
                              <p class="card-text">Hello Sent Form</p>
                              <a href="{{route('restore.restoreFormRestore')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                    </div>
                 </div>

                 <div class="row">
                    <div class="col-md-12">
                        <br>
                        <br>
                    </div>
                 </div>

                 <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Bonus Discip Restore</h5>
                              <p class="card-text">Hello Bonus Discip</p>
                              <a href="{{route('restore.restoreBonusDiscipRestore')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Statist Restore</h5>
                              <p class="card-text">Hello Statist</p>
                              <a href="{{route('restore.restoreSalaryRestore')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">User Restore</h5>
                              <p class="card-text">Hello User</p>
                              <a href="{{route('restore.restoreUserRestore')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Announcement Restore</h5>
                              <p class="card-text">Hello Annoucement</p>
                              <a href="{{route('restore.restoreAnnounceRestore')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                    </div>
                 </div>

                 <div class="row">
                    <div class="col-md-12">
                        <br>
                        <br>
                    </div>
                 </div>

                 <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Deparment Restore</h5>
                              <p class="card-text">Hello Deparment</p>
                              <a href="{{route('restore.restoreDeparmentRestore')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Department Join Restore</h5>
                              <p class="card-text">Hello Department Join</p>
                              <a href="{{route('restore.restoreDeparmentJoinRestore')}}" class="btn btn-primary">Go somewhere</a>
                            </div>
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
