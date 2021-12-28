<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @yield('content1')
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
                {{-- <div class="form-group form-search is-empty">
                        <input type="text" class="form-control" placeholder=" Search ">
                        <span class="material-input"></span>
                    </div>

                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button> --}}
                @yield('content2')
            </form>
        </div>
    </div>
</nav>
