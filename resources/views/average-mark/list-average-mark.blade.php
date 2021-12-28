@extends('layout.index')
@section('title')
Điểm trung bình
@endsection
@section('content1')
<a class="navbar-brand" href="{{ route('mark-average.index') }}"> ĐIỂM TRUNG BÌNH </a>
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
                <h4 class="card-title">ĐIỂM TRUNG BÌNH</h4>
                <form action="" method="GET">
                    <select style="color:#000;" class="btn btn-white" name="grade">
                        <option style="color:#000;">Tất cả</option>
                        @foreach ($listGrade as $item)
                        <option style="color:#000;" value="{{ $item->classCode }}" @if ($item->classCode == $grade)
                            selected
                            @endif>{{ $item->FullGrade }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-info">Lọc</button>
                </form>
                <div class="toolbar">
                </div>

                <div class="material-datatables">
                    <table id="table" class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">STT</th>
                                <th class="text-center">Mã sinh viên</th>
                                <th class="text-center">Lớp</th>
                                <th class="text-center">Tên sinh viên</th>
                                <th class="text-center">Điểm TB</th>
                                <!-- <th> Xếp loại</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($listAvgMark as $avgMark)
                            <tr>
                                <th>
                                    <i class="material-icons"><a href="{{ route('mark-average.show', $avgMark['id']) }}" style="color:#000;">add</a></i>
                                </th>
                                <td>{{ $i++ }}</td>
                                <td>{{ $avgMark['id'] }}</td>
                                <td>{{ $avgMark['grade'] }}</td>
                                <td>{{ $avgMark['student'] }}</td>
                                <td>{{ $avgMark['TBT'] }}</td>
                                <!-- <td>Khá</td> -->
                            </tr>
                            @php
                            $insert = DB::table('mark_average')->insert([
                            'majorCode'=>$avgMark['major'],
                            'classCode' => $avgMark['id-grade'],
                            'studentCode' => $avgMark['id'],
                            'mark_average' => $avgMark['TBT'],
                            ]);
                            @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <a href="{{ route('mark-average.create') }}" class="btn btn-info">Thêm</a> --}}
@endsection
