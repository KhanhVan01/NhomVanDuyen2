@extends('layout.index')
@section('title')
    Cập nhật khóa
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('course.index') }}"> KHÓA </a>
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">mail_outline</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">KHÓA</h4>
            <form action="{{ route('course.update', $course->courseCode) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group label-floating">
                    <label style="color:black;">Mã khóa</label>
                    <input type="text" class="form-control" name="code_course" value="{{ $course->courseCode }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Khóa</label>
                    <input type="text" class="form-control" name="name_course" value="{{ $course->nameCourse }}">
                </div>
                <button type="submit" class="btn btn-info btn">Thêm</button>
            </form>
        </div>
    </div>
@endsection
