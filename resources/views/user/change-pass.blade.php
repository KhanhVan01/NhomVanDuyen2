@extends('layout-user.index')
@section('content-user')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="header">Thay đổi mật khẩu</div>
                <div class="content">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if (Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
                        @endif
                    @endforeach
                    <form action="{{ route('change-process',$student->studentCode) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Mật khẩu cũ</label>
                            <input type="password" placeholder="current_password" name="curren_password" class="form-control">
                            @if (Session::exists('error'))
                                <div>{{ Session::get('error') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" placeholder="new_password" name="new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu mới</label>
                            <input type="password" placeholder="new_password_confirmation" name="new_password_confirmation" class="form-control">
                            @if (Session::exists('error1'))
                                <div>{{ Session::get('error1') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-fill btn-info">Thêm</button>
                    </form>
                </div>
            </div> <!-- end card -->
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
