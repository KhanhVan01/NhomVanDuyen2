@extends('layout.index')
@section('title')
Điểm thi lại
@endsection
@section('content1')
<a class="navbar-brand" href="{{ route('mark-resit.index') }}">ĐIỂM THI LẠI</a>
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
                @if (session('admin')->role == 1)
                <div style="float:right;">
                    <a href="{{ route('mark-resit.create') }}" style="color:skyblue">Thêm</a>
                </div>
                @endif
                <h4 class="card-title">ĐIỂM THI LẠI</h4>
                <div class="toolbar">

                </div>
                <div class="material-datatables">
                    <table id="table" class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên sinh viên</th>
                                <th class="text-center">Môn học</th>
                                <th class="text-center">Điểm thi lại lý thuyết</th>
                                <th class="text-center">Điểm thi lại thực hành</th>
                                @if (session('admin')->role == 1)
                                <th class="disabled-sorting text-center">Hành động</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listMark as $mark)
                            <tr>
                                <td>{{ $mark->number }}</td>
                                <td>{{ $mark->FullName }}</td>
                                <td>{{ $mark->nameSubject }}</td>
                                <td>{{ $mark->mark_resit_final }}</td>
                                <td>{{ $mark->mark_resit_skill }}</td>
                                @if (session('admin')->role == 1)
                                <td class="td-actions text-center">
                                    <a href="{{ route('mark.edit', $mark->number) }}" style="color:green" class="btn btn-simple btn-info btn-icon edit">
                                        Sửa
                                    </a>
                                    <form class="btn btn-simple btn-danger" action="{{ route('mark.destroy', $mark->number) }}" method="POST">
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
