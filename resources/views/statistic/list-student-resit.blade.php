@extends('layout.index')
@section('title')
Danh sách thi lại
@endsection
@section('content1')
<a class="navbar-brand" href="{{ route('mark.index') }}"> DANH SÁCH THI LẠI </a>

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
            <div class="card-content">
                <h4 class="card-title">DANH SÁCH THI LẠI</h4>
                <div class="toolbar"></div>
                <div class="material-datatables">
                    <table id="table" class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Mã sinh viên</th>
                                <th class="text-center">Lớp</th>
                                <th class="text-center">Tên sinh viên</th>
                                <!-- <th class="text-center">Điểm</th> -->
                                <th class="text-center">Môn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mark1 as $mark)
                            <tr>
                                <td>{{ $mark->number }}</td>
                                <td>{{ $mark->studentCode }}</td>
                                <td>{{ $mark->FullGrade }}</td>
                                <td>{{ $mark->FullName }}</td>

                                <td>{{ $mark->nameSubject }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route("export-student-resit") }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">Xuất</button>
</form>
@endsection
