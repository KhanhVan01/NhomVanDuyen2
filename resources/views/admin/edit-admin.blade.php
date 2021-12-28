@extends('layout.index')
@section('title')
    Sửa nhân viên
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('admin.index') }}"> NHÂN VIÊN </a>
@endsection
@section('content')
    <div class="card">
        <div class="card-content">
            <h4 class="card-title">NHÂN VIÊN</h4>
            <form action="{{ route('admin.update', $admin->codeAdmin) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group label-floating">
                    <label style="color:black;">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $admin->email }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Mật khẩu</label>
                    <input type="text" class="form-control" name="password" value="{{ $admin->password }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Họ tên</label>
                    <input type="text" class="form-control" name="full-name" value="{{ $admin->fullName }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Quyền</label>
                    <input type="radio" name="role" value="0" @if ($admin->role == 0) checked @endif>Giảng viên
                    <input type="radio" name="role" value="1" @if ($admin->role == 1) checked @endif>Giáo vụ
                </div>
                <button type="submit" class="btn btn-fill btn-info">Thêm</button>
            </form>
        </div>
    </div>
@endsection
