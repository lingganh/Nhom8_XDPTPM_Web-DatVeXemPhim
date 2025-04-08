
<div id="wrapper" >
    <nav class="navbar-default navbar-static-side" role="navigation" style="position: fixed">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> Xin Chào ,  {{Auth::user()->name ?? ''}}</strong>



                    <div class="logo-element">
FIVE Cinema
                    </div>
                </li>
                <li class="active">
                    <a href="{{'dashboard/index'}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span>  </a>

                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i><span class="nav-label"> Quản Lý Thành Viên </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route ('user.index') }}"> QL Thành Viên </a></li>
                        <li><a href="{{ route ('usergroup.index') }}">QL Nhóm Thành Viên</a></li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route ('films.index ') }}"><i class="fa fa-film"></i>  <span class="nav-label">Phim </span></a>
                </li>
                <li>
                    <a href="{{ route('admin.revenue.index') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Doanh Thu </span> </a>

                </li>
                <li>
                    <a href="{{ route ('comments.index ') }}"><i class="fa fa-envelope"></i> <span class="nav-label"> Góp Ý  </span><span class="label label-warning pull-right">16/24</span></a>

                </li>
                <li>
                    <a href="{{ route ('movieShowtime.index ') }}"><i class="fa fa-calendar"></i></i> <span class="nav-label">Lịch Chiếu </span>  </a>
                </li>
                <li>
                    <a href=" {{ route ('ticket.index ') }}"><i class="fa fa-ticket"></i> </i> <span class="nav-label">Vé</span></a>
                </li>



                <li>

                </li>







    </nav>
