<table class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
            <th><b>STT</b></th>
            <th><b>Mã sinh viên</b></th>
            <th><b>Lớp</b></th>
            <th><b>Tên sinh viên</b></th>
            <th><b>Môn</b></th>
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
