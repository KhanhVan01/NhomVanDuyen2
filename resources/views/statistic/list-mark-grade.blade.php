@extends('layout.index')
@section('title')
Danh sách điểm sinh viên theo lớp
@endsection
@section('content1')
<a class="navbar-brand" href="{{ route('mark.index') }}"> DANH SÁCH ĐIỂM SINH VIÊN THEO LỚP </a>
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
                <h4 class="card-title">DANH SÁCH ĐIỂM THEO LỚP</h4>

                <form action="" method="GET">
                    <select style="color:#000;" class="btn btn-white" name="grade">
                        <option style="color:#000;">Tất cả</option>
                        @foreach ($listGrade as $item)
                        <option style="color:#000;" value="{{ $item->classCode }}" @if ($item->classCode == $grade)
                            selected
                            @endif>{{ $item->FullGrade }}</option>
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
                                <th class="text-center">STT</th>
                                <th class="text-center">Mã sinh viên</th>
                                <th class="text-center">Lớp</th>
                                <th class="text-center">Tên Sinh Viên</th>
                                @foreach ($listSubject as $subject)
                                <th>{{ $subject->nameSubject }}</th>
                                @endforeach
                                <th>Điểm TB</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($listMark as $mark)
                            <tr >
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
                </div>
            </div>
        </div>
    </div>
</div>


<form action="{{ route('export-student-mark') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-3" style="display: flex;">
            <select name="grade[]" class="selectpicker " multiple id="exportExcel">
                <option disabled>Chọn lớp</option>
                <option value="" id="optSelectAll">Tất cả</option>
                @foreach ($listGrade as $item)
                <option style="color:#000;" value="{{ $item->classCode }}">{{ $item->FullGrade }}</option>
                @endforeach
            </select>
            <button style="color:white;" type="submit" name="export_student-mark" class="btn btn-success">Xuất
                file</button>
        </div>
    </div>
</form>
@endsection
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
        $(document).on('change', '#exportExcel', function() {
            let isSelectAll = $('#optSelectAll').prop('selected');

            console.log("change", isSelectAll);

            if (isSelectAll) {
                console.log('must display');
                $(this).find('option:not(#optSelectAll)').prop('disabled', true).prop('se');
                $(this).selectpicker('refresh');
            } else {
                $(this).find('option').prop('disabled', false);
                $(this).selectpicker('refresh');
            }
        })
    });
</script> --}}
