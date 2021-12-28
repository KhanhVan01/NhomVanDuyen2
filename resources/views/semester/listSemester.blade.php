@extends('layout.index')
@section('title')
Quản lý học kỳ
@endsection
@section('content1')
<a class="navbar-brand" href="{{ route('semester.index') }}"> HỌC KỲ </a>
@endsection
@section('content2')
<div class="form-group form-search is-empty">
    <input type="text" class="form-control" value="{{ $search }}" placeholder=" Tìm kiếm " name="search">
    <span class="material-input"></span>
</div>
<button type="submit" class="btn btn-white btn-round btn-just-icon">
    <i class="material-icons">search</i>
    <div class="ripple-container"></div>
</button>
@endsection
@section('content')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if (Session::has('alert-' . $msg))

<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
@endif
@endforeach
{{-- <h1>Danh sách học kỳ</h1> --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div> -->
            <div class="card-content">
                @if (session('admin')->role == 1)
                <div style="float:right;">
                    <a href="{{ route('semester.create') }}" style="color:skyblue">Thêm </a>
                </div>
                @endif
                <h4 class="card-title">HỌC KỲ</h4>
                <div class="toolbar">

                </div>
                <div class="material-datatables">
                    <table id="table" class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Mã Học Kỳ</th>
                                <th class="text-center">Tên Học Kỳ</th>
                                <th class="text-center">Năm</th>
                                <!-- <th class="text-center"> Sinh viên</th>
                                <th class="text-center"> Môn học</th>
                                <th class="text-center"> Điểm Trung Bình</th>
                                <th class="text-center"> Xếp loại</th> -->
                                @if (session('admin')->role == 1)
                                <th class="disabled-sorting text-center">Hành động</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSemester as $semester)
                            <tr>
                                <td>{{ $semester->semesterCode }}</td>
                                <td>{{ $semester->nameSemester }}</td>
                                <td>{{ $semester->year }}</td>
                                <!-- <td>Nguyen Thi Quynh Anh</td>
                                <td> Xử lý ảnh</td>
                                <td> 8.8</td>
                                <td> Khá</td> -->
                                @if (session('admin')->role == 1)
                                <td class="td-actions text-center">
                                    <a href="{{ route('semester.edit',$semester->semesterCode) }}" style="color:green" class="btn btn-simple btn-info btn-icon edit">
                                        Sửa
                                    </a>
                                    <form class="btn btn-simple btn-danger" action="{{ route('semester.destroy',$semester->semesterCode) }}" method="POST">
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

@endsection
