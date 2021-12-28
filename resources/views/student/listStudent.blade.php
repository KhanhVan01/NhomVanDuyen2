@extends('layout.index')
@section('title')
Quản lý sinh viên
@endsection
@section('content1')
<a class="navbar-brand" href="{{ route('student.index') }}"> SINH VIÊN </a>
@endsection
@section('content')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if (Session::has('alert-' . $msg))

<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
@endif
@endforeach
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div> -->
            <div class="card-content">
                @if (session('admin')->role == 1)
                <div style="float:right;">
                    <a href="{{ route('student.create') }}" style="color:skyblue">Thêm </a>
                </div>
                @endif
                <h4 class="card-title">SINH VIÊN</h4>
                <form action="" method="GET">
                    <select name="filter" style="color:#000;" class="btn btn-white">
                        <option style="color:#000;">Tất cả</option>
                        @foreach ($listGrade as $grade)
                        <option style="color:#000;" value="{{ $grade->classCode }}" @if ($grade->classCode == $filter)
                            selected
                            @endif >{{ $grade->FullGrade }}</option>
                        @endforeach
                    </select>
                    <button style="color:#000;" class="btn btn-info">Lọc</button>
                </form>
                <div class="toolbar">
                </div>
                <div class="material-datatables">
                    <table id="table" class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Mã SV</th>
                                {{-- <th >Tài khoản</th>
                                    <th>Mật khẩu</th> --}}
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Ngày sinh</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center" >Số điện thoại</th>
                                <th class="text-center">Địa chỉ</th>
                                <th class="text-center">Ngày nhập học</th>
                                <th class="text-center">Lớp</th>
                                @if (session('admin')->role == 1)
                                <th class="disabled-sorting text-center">Hành động</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listStudent as $student)
                            <tr>
                                <td>{{ $student->studentCode }}</td>
                                {{--<td>{{ $student->email }}</td>
                                <td>{{ $student->passWord }}</td>--}}
                                <td>{{ $student->FullName }}</td>
                                <td>{{ $student->dateOfBirth }}</td>
                                <td>{{ $student->NameGender }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->dateEnrollment }}</td>
                                <td>{{ $student->FullGrade }}</td>
                                @if (session('admin')->role == 1)
                                <td class="td-actions text-center">
                                    <form action="{{ route('student.destroy',$student->studentCode) }}" method="POST">
                                        <a href="{{ route('student.show', $student->studentCode) }}" class="btn btn-simple btn-info btn-icon like">
                                            Đọc
                                        </a>
                                        <a href="{{ route('student.edit', $student->studentCode) }}" style="color:green" class="btn btn-simple btn-info btn-icon edit">
                                            Sửa
                                        </a>
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-simple btn-danger btn-icon remove" onclick="return confirm('Xóa không???')">Xóa</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{ url('import-csv') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit" class="btn btn-success">Thêm bằng file excel</button>
</form>
<form action="{{ url('export-csv') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">Xuất file</button>
</form>

@endsection
