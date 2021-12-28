@extends('layout.index')
@section('title')
    Thêm lớp
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('grade.index') }}"> Grade </a>
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">mail_outline</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">LỚP</h4>
            <form action="{{ route('grade.store') }}" method="post">
                @csrf
                <div class="form-group label-floating">
                    <label style="color:black;">Mã lớp</label>
                    <input type="text" class="form-control" name="code-grade">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Lớp</label>
                    <input type="text" class="form-control" name="name-grade">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Khóa</label>
                    <select name="id-course" class="form-control">
                        @foreach ($listCourse as $course)
                            <option value="{{ $course->courseCode }}">{{ $course->nameCourse }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Chuyên ngành</label>
                    <select name="id-major" class="form-control">
                        @foreach ($listMajor as $major)
                            <option value="{{ $major->majorCode }}">{{ $major->nameMajor }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn">Thêm</button>
            </form>
        </div>
    </div>
@endsection
