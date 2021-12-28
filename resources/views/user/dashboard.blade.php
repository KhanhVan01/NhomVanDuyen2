@extends('layout-user.index')
@section('content-user')
<a class="navbar-brand" style="color:white" href="{{ route('home-student') }}"> TRANG CHỦ </a>
@endsection
@section('content3')
<div class="form-group form-search is-empty">
    <input type="text" class="form-control" placeholder=" Tìm kiếm">
    <span class="material-input" style="color:white"></span>
</div>
<button type="submit" class="btn btn-white btn-round btn-just-icon">
    <i class="material-icons">search</i>
    <div class="ripple-container"></div>
</button>

@endsection
@section('content-user2')
 <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="material-icons">person</i>
                </div>
                <div class="card-content">
                <p class="category">SINH VIÊN</p>

                <h3 class="card-title"></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('edit-profile') }}">XEM THÊM </a><i class="material-icons">arrow_forward</i>
                </div>
            </div>
            </div>
        </div>
    </div>
        <!-- <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <p class="category">Môn Học</p>

                    <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                         <a href="{{ route('subject.index') }}">XEM THÊM </a><i class="material-icons">arrow_forward</i> -->
<!-- </div> -->
                <!-- </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                <i class="material-icons">store</i>
                </div>
                <div class="card-content">
                    <p class="category">DS ĐIỂM THEO LỚP </p>

                    <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{ route('list-mark') }}">XEM THÊM </a><i class="material-icons">arrow_forward</i>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <br>
 <div class="row">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card card-calendar">
                    <div class="card-content" class="ps-child">
                        <div id="fullCalendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

@endsection
