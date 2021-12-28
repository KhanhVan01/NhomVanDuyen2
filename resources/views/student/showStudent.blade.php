@extends('layout.index')
@section('title')
    Quản lý sinh viên
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('student.index') }}"> SINH VIÊN </a>
@endsection
@section('content')
    <h2>Thông tin chi tiết</h2>
    <table id="table" class="table table-striped table-no-bordered table-hover" cellspacing="0"
    width="100%" style="width:100%">
        <tr>
            <th>Tài khoản</th>
            <td>{{ $student->email }}</td>
        </tr>
        <tr>
            <th>Mật khẩu</th>
            <td>{{ $student->passWord }}</td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td>{{ $student->phone }}</td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td>{{ $student->address }}</td>
        </tr>
        <tr>
            <th>Ngày nhập học</th>
            <td>{{ $student->dateEnrollment }}</td>
        </tr>
    </table>
@endsection