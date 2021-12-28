<table class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr style="background-color:rgb(122, 196, 245);">
            <th><b>STT</b></th>
            <th><b>Mã sinh viên</b></th>
            <th><b>Lớp</b></th>
            <th><b>Tên Sinh Viên</b></th>
            @foreach ($listSubject as $subject)
                <th><b>{{ $subject->nameSubject }}</b></th>
            @endforeach
            <th><b>Điểm TB</b></th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($listMark as $mark)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $mark['id'] }}</td>
                <td>{{ $mark['class'] }}</td>
                <td>{{ $mark['Student'] }}</td>
                @foreach ($mark['TBM'] as $mark1)
                    <td>{{ $mark1['TT'] }}</td>
                @endforeach
                <td>{{ $mark['TBT'] }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
