@extends('layout.index')
@section('title')
    Cập nhật sinh viên
@endsection
@section('content1')
    <a class="navbar-brand" href="">SINH VIÊN</a>
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">mail_outline</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">SINH VIÊN</h4>
            <form action="{{ route('student.update', $student->studentCode) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group label-floating">
                    <label style="color:black;">Mã SV</label>
                    <input type="text" name="code-student" value="{{ $student->studentCode }}" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Email</label>
                    <input type="text" name="email" value="{{ $student->email }}" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Mật khẩu</label>
                    <input type="text" name="password" value="{{ $student->passWord }}" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Tên</label>
                    <input type="text" name="first-name" value="{{ $student->firstName }}" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Tên đệm</label>
                    <input type="text" name="middle-name" value="{{ $student->middleName }}" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Họ</label>
                    <input type="text" name="last-name" value="{{ $student->lastName }}" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Ngày sinh</label>
                    <input type="date" name="dob" value="{{ $student->dateOfBirth }}" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Giới tính</label>
                    <input type="radio" name="gender" value="0" @if ($student->genDer == 0) checked @endif>Nữ
                    <input type="radio" name="gender" value="1" @if ($student->genDer == 1) checked @endif>Nam
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Số điện thoại</label>
                    <input type="text" name="phone" value="{{ $student->phone }}" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Địa chỉ</label>
                    <input type="text" name="address" value="{{ $student->address }}" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Ngày nhập học</label>
                    <input type="date" name="dateEnrolled" value="{{ $student->dateEnrollment }}" class="form-control">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Lớp</label>
                    <select name="class" class="form-control">
                        @foreach ($grade as $class)
                            <option value="{{ $class->classCode }}" @if ($student->classCode == $class->classCode) selected @endif>
                                {{ $class->FullGrade }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn">Thêm</button>
            </form>
        </div>
    </div>
@endsection
