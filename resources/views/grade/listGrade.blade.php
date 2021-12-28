@extends('layout.index')
@section('title')
    Quản lý lớp
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('grade.index') }}"> LỚP </a>
@endsection
@section('content')
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has('alert-' . $msg))

            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
        @endif
    @endforeach
    <div class="row">
        <!-- <div class="col-md-12">
        <div class="col-lg-12 "> -->
        <div class="col-12">
            <div class="card card-primary">
                <!-- <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div> -->
                <div class="card-content" >
                @if (session('admin')->role == 1)
                    <div style="float:right;">
                        <a href="{{ route('grade.create') }}" style="color:skyblue">Thêm </a>
                    </div>
                @endif
                    <h4 class="card-title">LỚP</h4>
                    <div class="toolbar">

                    </div>
                    <div class="material-datatables">
                        <table id="table" class="table table-bordered table-striped text-center" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Mã lớp</th>
                                    <th class="text-center">Tên lớp</th>
                                    <th class="text-center">Chuyên ngành</th>
                                    @if (session('admin')->role == 1)
                                    <th class="disabled-sorting text-center">Hành động</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listGrade as $grade)
                                    <tr >
                                        <td>{{ $grade->classCode }}</td>
                                        <td> <a href="student?filter={{ $grade->classCode }}">
                                                {{ $grade->FullGrade }}</a>
                                        </td>
                                        {{-- <td><a href="student?filter=2">BKD05K11</a></td> --}}
                                        <td>{{ $grade->nameMajor }}</td>
                                        @if (session('admin')->role == 1)
                                        <td class="td-actions text-center">
                                                <a href="{{ route('grade.edit', $grade->classCode) }}" style="color:green" class="btn btn-simple btn-info btn-icon edit">
                                                    Sửa
                                                </a>
                                            <form class="btn btn-simple btn-danger" action="{{ route('grade.destroy', $grade->classCode) }}" method="POST">
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
