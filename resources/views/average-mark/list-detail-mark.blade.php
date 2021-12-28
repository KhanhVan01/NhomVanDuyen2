@extends('layout.index')
@section('title')
Danh sách điểm theo môn
@endsection
@section('content1')
<a class="navbar-brand" href="{{ route('mark-average.index') }}"> DANH SÁCH ĐIỂM THEO MÔN HỌC</a>
@endsection
@section('content')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if (Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
@endif
@endforeach
<h3>THÔNG TIN CHI TIẾT</h3>
<div class="row">
    <div class="col-lg-4 col-md-5 col-sm-5">
        <table cellspacing="0" width="100%" style="width:100%">
            @foreach ($student as $item)
            <p>
                <tr>
                    <td>
                        <h4>Tên sinh viên:</h4>
                    </td>
                    <td>
                        <h4><b>{{ $item->FullName }}</b></h4>
                    </td>
                </tr>
            </p>
            <p>
                <tr>
                    <td>
                        <h4>Lớp: </h4>
                    </td>
                    <td>
                        <h4><b>{{ $item->FullGrade }}</b></h4>
                    </td>
                </tr>
            </p>
            @endforeach
        </table>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6">
        <table cellspacing="0" width="100%" style="width:100%">
            @foreach ($student as $item)
            <p>
                <tr>
                    <td>
                        <h4>Ngành: </h4>
                    </td>
                    <td>
                        <h4><b>{{ $item->nameMajor }}</b></h4>
                    </td>
                </tr>
            </p>
            <p>
                <tr>
                    <td>
                        <h4>Khóa: </h4>
                    </td>
                    <td>
                        <h4><b>{{ $item->courseCode }}</b></h4>
                    </td>
                </tr>
            </p>
            @endforeach
        </table>
    </div>
</div>
<div class="toolbar">
</div>
<div class="material-datatables">
    <table class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100%">
        <thead>
            <tr style="background-color:red ; color:white">
                <th class="text-center"><b>Mã môn</b></th>
                <th class="text-center"><b>Tên môn</th>
                <th class="text-center"><b>Điểm LT</th>
                <th class="text-center"><b>Điểm TH</th>
                <th class="text-center"><b>Điểm TB Môn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mark as $value)
            <tr>
                <td>{{ $value->subjectCode }}</td>
                <td>{{ $value->nameSubject }}</td>
                <td>{{ $value->MarkFinal1 }}</td>
                <td>{{ $value->MarkSkill1 }}</td>
                <td>{{ $value->TB }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="color:red;">
                <th colspan="4"><b>
                        <h6><b>TỔNG KẾT</h6>
                    </b></th>
                <th>{{ $TBT }}</th>
            </tr>
        </tfoot>
    </table>
    <form action="" method="post">
        <button style="color:white;" type="submit" name="export_student-mark" class="btn btn-success">Xuất</button>
    </form>
    @endsection
