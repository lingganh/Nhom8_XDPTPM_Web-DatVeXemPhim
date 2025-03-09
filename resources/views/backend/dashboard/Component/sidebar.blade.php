
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> Xin Chào ,  {{Auth::user()->name}}</strong>



                    <div class="logo-element">
FIVE Cinema
                    </div>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span>  </a>

                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label"> Quản Lý Thành Viên </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route ('user.index') }}"> QL Thành Viên </a></li>
                        <li><a href="#">QL Nhóm Thành Viên</a></li>


                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Phim </span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Doanh Thu </span> </a>

                </li>
                <li>
                    <a href=" #"><i class="fa fa-envelope"></i> <span class="nav-label"> Góp Ý  </span><span class="label label-warning pull-right">16/24</span></a>

                </li>
                <li>
                    <a href="#"><i class="fa fa-pie-chart"></i> <span class="nav-label">Người Dùng </span>  </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Vé</span></a>
                </li>


                <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Các Trang Khác </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href=" ">Search results</a></li>
                        <li><a href=" ">Lockscreen</a></li>
                        <li><a href=" ">Invoice</a></li>
                        <li><a href=" ">Login</a></li>
                        <li><a href=" ">Login v.2</a></li>
                        <li><a href=" ">Forget password</a></li>
                        <li><a href=" ">Register</a></li>
                        <li><a href=" ">404 Page</a></li>
                        <li><a href=" ">500 Page</a></li>
                        <li><a href=" ">Empty page</a></li>
                    </ul>
                </li>
                <li>

                </li>







    </nav>
