@extends('layout.index')
@section('title')
    Thêm môn học
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('subject.index') }}"> MÔN HỌC </a>
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">mail_outline</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">MÔN HỌC</h4>
            <form action="{{ route('subject.store') }}" method="post">
                @csrf
                <div class="form-group label-floating">
                    <label style="color:black;">Mã môn học</label>
                    <input type="text" class="form-control" name="code-subject">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Môn học</label>
                    <input type="text" class="form-control" name="name-subject">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Số giờ</label>
                    <input type="text" class="form-control" name="hour">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Lý thuyết</label><br>
                    <input type="radio"  name="final" value="1">Có<br>
                    <input type="radio"  name="final" value="0">Không
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Thực hành</label><br>
                    <input type="radio" name="skill" value="1">Có<br>
                    <input type="radio" name="skill" value="0">Không
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Ngày bắt đầu</label>
                    <input type="date" class="form-control" name="start-date">
                </div>
                <button type="submit" class="btn btn-info btn">Thêm</button>
            </form>
        </div>
    </div>
@endsection
