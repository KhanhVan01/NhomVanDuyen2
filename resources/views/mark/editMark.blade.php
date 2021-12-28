@extends('layout.index')
@section('title')
    Cập nhật điểm
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('mark.index') }}">ĐIỂM</a>
@endsection
@section('content')
    <div class="card">
        <!-- <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">mail_outline</i>
        </div> -->
        <div class="card-content">
            <h4 class="card-title">ĐIỂM</h4>
            <form action="{{ route('mark.update', $mark->number) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group label-floating">
                    <label style="color:black;">Sinh viên</label>
                    <select name="name-sv" class="form-control">
                        @foreach ($student as $stu)
                            <option value="{{ $stu->studentCode }}" @if ($mark->studentCode == $stu->studentCode)
                                selected
                            @endif>{{ $stu->FullName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Môn học</label>
                    <select name="name-subject" class="form-control">
                        @foreach ($subject as $sub)
                            <option value="{{ $sub->subjectCode }}" @if ($mark->subjectCode == $sub->subjectCode)
                                selected
                            @endif>{{ $sub->nameSubject }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Điểm lý thuyết</label>
                    <input type="text" class="form-control" name="mark_final" value="{{ $mark->mark_final }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Điểm thực hành</label>
                    <input type="text" class="form-control" name="mark_skill" value="{{ $mark->mark_skill }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Điểm lý thuyết lần 2</label>
                    <input type="text" class="form-control" name="mark_final_resit" value="{{ $mark->mark_final_resit }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Điểm thực hành lần 2</label>
                    <input type="text" class="form-control" name="mark_skill_resit" value="{{ $mark->mark_skill_resit }}">
                </div>
                {{-- <div class="form-group label-floating">
                    <label style="color:black;">Ghi chú</label>
                    <input type="text" class="form-control" name="note" value="{{ $mark->note }}">
                </div> --}}
                <button type="submit" class="btn btn-fill btn-info">Thêm</button>
            </form>
        </div>
    </div>
@endsection
