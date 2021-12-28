
@extends('layout-user.index')
@section('title')
  Thông tin cá nhân
@endsection
@section('content-user')
<a class="navbar-brand" style="color:white" href="{{ route('home-student') }}"> TRANG CHỦ </a>
@endsection
@section('content-user2')
    <h2>HỒ SƠ</h2>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">CHỈNH SỬA THÔNG TIN</h4>
                </div>
                <div class="content">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if (Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
                        @endif
                    @endforeach
                    <form action="{{ route('edit-profile', $listStudent->studentCode) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="hidden" name="fname" value="{{ $listStudent->firstName }}">
                                    <input type="hidden" name="mname" value="{{ $listStudent->middleName }}">
                                    <input type="hidden" name="lname" value="{{ $listStudent->lastName }}">
                                    <input type="text" class="form-control" placeholder="Username"
                                        value="{{ $listStudent->FullName }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input type="text" class="form-control" name="dob" placeholder="DOB"
                                        value="{{ $listStudent->dateOfBirth }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <input type="hidden" name="gender" value="{{ $listStudent->genDer }}">
                                    <input type="text" class="form-control" placeholder="gender"
                                        value="{{ $listStudent->NameGender }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" placeholder="phone" name="phone"
                                        value="{{ $listStudent->phone }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="address" name="address"
                                        value="{{ $listStudent->address }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Cập nhật</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="content">
                <div class="header">
                    <h4 class="title">THÔNG TIN CÁ NHÂN</h4>
                </div>
                    <table class="table table-hover">
                        <tr>
                            <th>Mã:</th>
                            <td><input class="form-control" type="text" value="{{ $listStudent->studentCode }}"
                                    readonly></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><input class="form-control" type="text" value="{{ $listStudent->email }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Password:</th>
                            <td><input class="form-control" type="text" value="{{ $listStudent->passWord }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Tên:</th>
                            <td><input class="form-control" type="text" value="{{ $listStudent->FullName }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Ngày sinh:</th>
                            <td><input class="form-control" type="text" value="{{ $listStudent->dateOfBirth }}"
                                    readonly></td>
                        </tr>
                        <tr>
                            <th>Giới tính:</th>
                            <td><input class="form-control" type="text" value="{{ $listStudent->NameGender }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Số điện thoại:</th>
                            <td><input class="form-control" type="text" value="{{ $listStudent->phone }}" readonly></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ:</th>
                            <td><input class="form-control" type="text" value="{{ $listStudent->address }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Lớp:</th>
                            <td><input class="form-control" type="text" value="{{ $listStudent->FullGrade }}" readonly>
                            </td>
                        </tr>

                    </table>
                    <button type="submit" class="btn btn btn-info"><a href="{{ route('password',$listStudent->studentCode)}}"style="color:#FFF;">Thay đổi mật khẩu</a></button>
                </div>
                <hr>
            </div>
        </div>

    </div>
@endsection
