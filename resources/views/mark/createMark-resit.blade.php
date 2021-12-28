@extends('layout.index')
@section('title')
    Thêm điểm
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('mark-resit.index') }}"> ĐIỂM THI LẠI</a>
@endsection
@section('content')
    {{-- <h1>Thêm điểm cho sinh viên</h1> --}}
    <div class="card">
        <!-- <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">mail_outline</i>
        </div> -->
        <div class="card-content">
            <h4 class="card-title">ĐIỂM THI LẠI</h4>
            <form action="{{ route('mark-resit.store') }}" method="post">
                @csrf
                <div class="form-group label-floating">
                    <label class="control-label">Tên sinh viên</label>
                    <select name="student" class="form-control">
                        @foreach ($listMark as $mark)
                            <option value="{{ $mark->studentCode }}">{{ $mark->FullName }} ({{ $mark->Note }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Môn học</label>
                    <select name="subject" class="form-control">
                        @foreach ($listMark as $mark)
                            <option value="{{ $mark->subjectCode }}">{{ $mark->nameSubject }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Điểm thi lại lý thuyết</label>
                    <input type="text" class="form-control" name="mark_resit_final" value="{{ $mark->Mark }}">
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Điểm thi lại thực hành</label>
                    <input type="text" class="form-control" name="mark_resit_skill" value="{{ $mark->Mark }}">
                </div>
                <button type="submit" class="btn btn-info btn">Thêm</button>
            </form>
        </div>
    </div>
@endsection
