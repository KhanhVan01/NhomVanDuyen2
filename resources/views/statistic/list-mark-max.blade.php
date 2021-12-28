@extends('layout.index')
@section('title')
    Quản lý điểm
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('mark-average.index') }}"> ĐIỂM TRUNG BÌNH </a>
@endsection
@section('content')
    <h3>Danh sách điểm cao nhất</h3>
    {{-- <div>
        <form action="" method="GET">
            <select style="color:#000;" class="btn btn" name="major">
                <option style="color:#000;">All</option>
                @foreach ($listMajor as $item)
                    <option style="color:#000;" value="{{ $item->majorCode }}" @if ($item->majorCode == $major)
                        selected
                @endif>{{ $item->nameMajor }}</option>
                @endforeach
            </select>
            <button class="btn btn">Lọc</button>
        </form>
    </div> --}}
    <table class="table table-bordered table-striped text-center" cellspacing="0" width="100%"
        style="width:100%">
        <thead>
            <tr>
                <th><b>STT</b></th>
                <th><b>Mã sinh viên</b></th>
                <th><b>Chuyên ngành</b></th>
                <th><b>Lớp</b></th>
                <th><b>Tên sinh viên</b></th>
                <th><b>Điểm TB</b></th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($listMaxMark as $avgMark)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $avgMark["id"] }}</td>
                    <td>{{ $avgMark["Major"] }}</td>
                    <td>{{ $avgMark["Grade"]}}</td>
                    <td>{{ $avgMark["Student"] }}</td>
                    <td>{{ $avgMark["TBT"] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
