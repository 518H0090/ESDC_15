<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ESDC-15</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        @if (\Illuminate\Support\Facades\Auth::check())
        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('/image')}}/unnamed.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('home')}}" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->email}}</a>
            </div>
        </div>

                <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Trang Chủ
                            <span class="right badge badge-success">Admin</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('department.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Phòng Làm
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('regency.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Chức Vụ
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('employee.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Nhân viên
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('departmentjoin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tham gia
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('calendar.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lịch Làm
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('bonusdiscip.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Khen-Phạt
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('statists.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tính Lương
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Người Dùng
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('sentform.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Kế Hoạch
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('restore.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Phục Hồi
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('announcement.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Thông Báo
                            <span class="right badge badge-primary">Admin</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
           @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('/image')}}/group-manage.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('home')}}" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->email}}</a>
            </div>
        </div>

                <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Trang Chủ
                            <span class="right badge badge-success">Manage</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('employee.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Nhân viên
                            <span class="right badge badge-primary">Manage</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('departmentjoin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tham gia
                            <span class="right badge badge-primary">Manage</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('calendar.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lịch Làm
                            <span class="right badge badge-primary">Manage</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('bonusdiscip.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Khen-Phạt
                            <span class="right badge badge-primary">Manage</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('statists.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tính Lương
                            <span class="right badge badge-primary">Manage</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sentform.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Kế Hoạch
                            <span class="right badge badge-primary">Manage</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('announcement.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Thông Báo
                            <span class="right badge badge-primary">Manage</span>
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
           @elseif(\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                       <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('/image')}}/images.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('home')}}" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->email}}</a>
            </div>
        </div>

                <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Trang Chủ
                            <span class="right badge badge-success">Staff</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('departmentjoin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tham gia
                            <span class="right badge badge-primary">Staff</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('calendar.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lịch Làm
                            <span class="right badge badge-primary">Staff</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('bonusdiscip.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Khen-Phạt
                            <span class="right badge badge-primary">Staff</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('statists.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tính Lương
                            <span class="right badge badge-primary">Staff</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sentform.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Kế Hoạch
                            <span class="right badge badge-primary">Staff</span>
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
           @endif
       @endif


        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
