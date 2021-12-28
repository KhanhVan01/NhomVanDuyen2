@extends('layout.index')
@section('content')
    <h1>Danh sách sinh viên qua môn</h1>
    <table border="1">
        <tr>
            <th>Mã sinh viên</th>
            <th>Tên sinh viên</th>
            <th>Lớp</th>
            <th>Môn học</th>
        </tr>
        <tr>
            @foreach ($listStudent as $student)
                <td>{{ $student->studentCode }}</td>
                <td>{{ $student->FullName }}</td>
                <td>{{ $student->FullGrade }}</td>
            @endforeach
            {{-- @foreach ($listSubject as $subject)
                <td>{{ $subject->nameSubject }}</td>
            @endforeach --}}
        </tr>
    </table>
@endsection
