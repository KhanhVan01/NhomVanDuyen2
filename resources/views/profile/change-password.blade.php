@extends('layout.index')
@section('title')
    Thay đổi mật khẩu
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('dashboard-admin') }}"> TRANG ĐIỀU KHIỂN </a>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (Session::exists('success'))
                    <div class="text-center">{{ Session::get('success') }}</div>
                @endif
                <form id="RegisterValidation" action="{{ route('change-password-process', $admin->codeAdmin) }}"
                    method="post">
                    @csrf

                    <div class="card-content">
                        <h4 class="card-title">Thay đổi mật khẩu</h4>
                        <div class="form-group label-floating">
                            <label class="control-label">
                            Mật khẩu hiện tại
                                <small>*</small>
                            </label>
                            <input class="form-control" type="password" name="current_password" required="true" />
                            @if (Session::exists('error'))
                                <div>{{ Session::get('error') }}</div>
                            @endif
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Mật khẩu mới
                                <small>*</small>
                            </label>
                            <input class="form-control" name="new_password" id="registerPassword" type="password"
                                required="true" />
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Nhập lại mật khẩu mới
                                <small>*</small>
                            </label>
                            <input class="form-control" name="new_password_confirmation" id="registerPasswordConfirmation"
                                type="password" required="true" equalTo="#registerPassword" />
                            @if (Session::exists('error1'))
                                <div>{{ Session::get('error1') }}</div>
                            @endif
                        </div>
                        <div class="form-footer text-center">

                            <button type="submit" class="btn btn-info btn-fill">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
