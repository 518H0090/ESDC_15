<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Huỳnh Trần Trung Hiếu</a>
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
                            <span class="right badge badge-primary">Danh mục</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('regency.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Chức Vụ
                            <span class="right badge badge-primary">Danh mục</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('employee.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Nhân viên
                            <span class="right badge badge-primary">Danh mục</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('departmentjoin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tham gia
                            <span class="right badge badge-primary">Danh mục</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('calendar.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lịch Làm
                            <span class="right badge badge-primary">Danh mục</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('bonusdiscip.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Khen-Phạt
                            <span class="right badge badge-primary">Danh mục</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('statists.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Thống Kê
                            <span class="right badge badge-primary">Danh mục</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
