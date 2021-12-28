@extends('layout.index')
@section('title')
    thêm sinh viên
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('student.index') }}"> SINH VIÊN </a>
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">mail_outline</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">SINH VIÊN</h4>
            <form action="{{ route('student.store') }}" method="post">
                @csrf
                <div class="form-group label-floating">
                    <label style="color:black;">Mã SV</label>
                    <input type="text" name="code-student" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Mật khẩu</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Tên</label>
                    <input type="text" name="first-name" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Tên đệm</label>
                    <input type="text" name="middle-name" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Họ</label>
                    <input type="text" name="last-name" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Ngày sinh</label>
                    <input type="date" name="dob" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Giới tính</label>
                    <input type="radio" name="gender" value="1">Nam
                    <input type="radio" name="gender" value="0">Nữ
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Địa chỉ</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Ngày nhập học</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Lớp</label>
                    <select name="grade" class="form-control">
                        @foreach ($grade as $grade1)
                            <option value="{{ $grade1->classCode }}">{{ $grade1->FullGrade }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn">Thêm</button>
            </form>
        </div>
    </div>
@endsection
