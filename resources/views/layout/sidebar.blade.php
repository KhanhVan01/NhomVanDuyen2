<div class="sidebar" data-active-color="blue" data-background-color="black"
    data-image="{{ asset('assets') }}/img/bkacad.jpg">
    <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="sidebar-wrapper">
        <div class="user">
            <!-- <div class="photo">
                 <img class="animation__shake full-width-image"
                    src="{{ asset('assets') }}/img/faces/bkacad.jpg" />
            </div> -->
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed" >
                   <span style="size: 15px;">
                        @if (Session::exists('admin'))
                            {{ session('admin')->fullName }}
                        @endif

                    </span>
                </a>
                 <div class="clearfix"></div>
                <!-- <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('profile') }}">
                                <i class="material-icons">list</i>
                                <span class="sidebar-normal"> Thông tin </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('change-password') }}">
                                <i class="material-icons">password</i>
                                <span class="sidebar-normal"> Thay đổi mật khẩu </span>
                            </a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
        <ul class="nav">
            <li class="active">
                <a href="{{ route('dashboard-admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p> TRANG CHỦ </p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#listExamples">
                    <i class="material-icons ">
                     manage_accounts</i>
                    <p> QUẢN LÝ
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="listExamples">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('major.index') }}">
                                <i class="material-icons">article</i>
                                <p>CHUYÊN NGÀNH</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('course.index') }}">
                                <i class="material-icons">apps</i>
                                <p>KHÓA</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('semester.index')}}">
                                <i class="material-icons">assignment</i>
                                <p>  HỌC KỲ</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('subject.index') }}">
                                <i class="material-icons">menu_book</i>
                                <p>MÔN HỌC</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('grade.index') }}">
                            <i class="material-icons">store</i>
                                <p>LỚP</p>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('student.index') }}">
                                <i class="material-icons">person</i>
                                <p>SINH VIÊN</p>
                            </a>
                        </li>
                        @if (session('admin')->role == 1)
                            <li>
                                <a href="{{ route('admin.index') }}">
                                    <i class="material-icons">person</i>
                                    <p>NHÂN VIÊN</p>
                                </a>
                            </li>
                        @endif


                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#manageExamples">
                    <i class="material-icons">
                        list</i>
                    <p> BẢNG
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="manageExamples">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('mark.index') }}">
                                <i class="material-icons">grade</i>
                                <p>ĐIỂM</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mark-average.index') }}">
                                <i class="material-icons">people</i>
                                <p>ĐIỂM TRUNG BÌNH</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mark-resit.index') }}">
                                <i class="material-icons">people</i>
                                <p>ĐIỂM THI LẠI</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#analyticExamples">
                    <i class="material-icons">
                        analytics</i>
                    <p> THỐNG KÊ
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="analyticExamples">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('list-mark') }}">
                                <i class="material-icons">people</i>
                                <p>DANH SÁCH ĐIỂM THEO LỚP</p>
                            </a>
                        </li>
                         <!-- <li>
                            <a href="{{ route('list-mark-max') }}">
                                <i class="material-icons">grade</i>
                                <p>DANH SÁCH ĐIỂM CAO NHẤT</p>
                            </a>
                        </li> -->
                       <li>
                            <a href="{{ route('list-student-resit') }}">
                                <i class="material-icons">people</i>
                                <p>DANH SÁCH THI LẠI</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
