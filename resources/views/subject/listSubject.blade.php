@extends('layout.index')
@section('title')
Quản lý môn học
@endsection
@section('content1')
<a class="navbar-brand" href="{{ route('subject.index') }}"> MÔN HỌC </a>
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
            <!-- <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div> -->
            <div class="card-content">
                @if (session('admin')->role == 1)
                <div style="float:right;">
                    <a href="{{ route('subject.create') }}" style="color:skyblue">Thêm</i> </a>
                </div>
                @endif
                <h4 class="card-title">MÔN HỌC</h4>
                <div class="toolbar">

                </div>
                <div class="material-datatables">
                    <table id="table" class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Mã MH</th>
                                <th class="text-center">Tên MH</th>
                                <th class="text-center">Số giờ</th>
                                <th class="text-center">Lý thuyết</th>
                                <th class="text-center">Thực hành</th>
                                <th class="text-center">Ngày bắt đầu</th>
                                @if (session('admin')->role == 1)
                                <th class="disabled-sorting text-center">Hành động</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSubject as $subject)
                            <tr>
                                <td>{{ $subject->subjectCode }}</td>
                                <td>{{ $subject->nameSubject }}</td>
                                <td>{{ $subject->totalClassHour }}</td>
                                <td>
                                    @if ($subject->final == 1)
                                    <i class="material-icons" style="color:green;">check_circle</i>
                                    @else
                                    <i class="material-icons" style="color:red;">cancel</i>
                                    @endif
                                </td>
                                <td>
                                    @if ($subject->skill == 1)
                                    <i class="material-icons" style="color:green">check_circle</i>
                                    @else
                                    <i class="material-icons" style="color:red;">cancel</i>
                                    @endif
                                </td>
                                <td>{{ $subject->startDate }}</td>
                                @if (session('admin')->role == 1)
                                <td class="td-actions text-center">
                                    <a href="{{ route('subject.edit', $subject->subjectCode)}}" style="color:green" class="btn btn-simple btn-info btn-icon edit">
                                        Sửa
                                    </a>
                                    <form class="btn btn-simple btn-danger" action="{{ route('subject.destroy', $subject->subjectCode) }}" method="POST">
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
