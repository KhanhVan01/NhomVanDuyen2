@extends('layout-user.index')
@section('title')
  Điểm tổng kết
@endsection
@section('content-user')
<a class="navbar-brand" style="color:white" href="{{ route('home-student') }}"> TỔNG KẾT  </a>
@endsection
@section('content-user2')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if (Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
@endif
@endforeach
    <h3>THÔNG TIN CHI TIẾT</h3>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
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
                                <h4>Lớp:</h4>
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
                            <h4>Ngành:</h4>
                        </td>
                        <td>
                            <h4><b>{{ $item->nameMajor }}</b></h4>
                        </td>
                    </tr>
                </p>
                <p>
                    <tr>
                        <td>
                            <h4>Khóa:</h4>
                        </td>
                        <td>
                            <h4><b>{{ $item->courseCode }}</b></h4>
                        </td>
                    </tr>
                </p>
                @endforeach
            </table>
        </div>
        <div class="material-datatables">
    <table class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100% ;">
        <thead>
            <tr style="background-color:orange ;" >
                <th class="text-center" style="color:white"><b>Mã môn</b></th>
                <th class="text-center" style="color:white"><b>Tên Môn</b></th>
                <th class="text-center" style="color:white"><b>Điểm LT</b></th>
                <th class="text-center" style="color:white"><b>Điểm TH</b></th>
                <th class="text-center" style="color:white"><b>Điểm TB Môn</b></th>
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
            <tr style="color:red">
            <th colspan="4"><b>
                <h4><b>TỔNG KẾT</h4></b>
            </th>
            <th>{{ $TBT }}</th>
            </tr>
        </tfoot>
    </table>
        </div>
    </div>

@endsection
