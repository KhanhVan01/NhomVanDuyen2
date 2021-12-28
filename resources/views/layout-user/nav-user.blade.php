<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon">
                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
            </button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @yield('content-user')
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets') }}/img/faces/bkacad.jpg" class="rounded-circle" height="25" alt="" loading="lazy" />
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <p> THÔNG TIN </p>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('change-password') }}">
                                    <p> CÀI ĐẶT </p>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout-admin') }}">
                                    <p> ĐĂNG XUẤT </p>
                                </a>
                            </li>
                        </ul>
                    </a>
                </li>
            </ul>
            <li class="separator hidden-lg hidden-md"></li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <!-- <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" value="" class="form-control" placeholder="Search...">
                </div> -->
                @yield('content3')
            </form>
        </div>
    </div>
</nav>
