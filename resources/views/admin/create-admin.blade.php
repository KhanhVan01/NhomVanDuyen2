@extends('layout.index')
@section('title')
    Thêm nhân viên
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('admin.index') }}"> NHÂN VIÊN </a>
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">mail_outline</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">NHÂN VIÊN</h4>
            <form action="{{ route('admin.store') }}" method="post">
                @csrf
                <div class="form-group label-floating">
                    <label style="color:black;">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Mật khẩu</label>
                    <input type="text" class="form-control" name="password">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Họ tên</label>
                    <input type="text" class="form-control" name="full-name">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Quyền  </label>
                    <input type="radio" name="role" value="1">Giáo vụ
                    <input type="radio" name="role" value="0">Giảng viên
                </div>
                <button type="submit" class="btn btn-fill btn-info">Thêm</button>
            </form>
        </div>
    </div>
@endsection
