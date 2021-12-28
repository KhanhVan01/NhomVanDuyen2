@extends('layout.index')
@section('title')
    Cập nhật môn học
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('subject.index') }}"> MÔN HỌC </a>
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">mail_outline</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">MÔN HỌC</h4>
            <form action="{{ route('subject.update', $subject->subjectCode) }}" method="post">
                @csrf
                @method("PUT")
                <div class="form-group label-floating">
                    <label style="color:black;">Mã môn học</label>
                    <input type="text" class="form-control" name="code-subject" value="{{ $subject->subjectCode }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Môn học</label>
                    <input type="text" class="form-control" name="name-subject" value="{{ $subject->nameSubject }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Số giờ</label>
                    <input type="text" class="form-control" name="total-hour" value="{{ $subject->totalClassHour }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Ngày bắt đầu</label>
                    <input type="date" class="form-control" name="start-date" value="{{ $subject->startDate }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Lý thuyết</label>
                    <input type="radio" name="final" value="1" @if ($subject->final==1)
                        checked
                    @endif>Có
                    <input type="radio" name="final" value="0" @if ($subject->final==0)
                    checked
                @endif >Không
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Thực hành</label>
                    <input type="radio" name="skill" value="1" @if ($subject->skill==1)
                        checked
                    @endif>Có
                    <input type="radio" name="skill" value="0" @if ($subject->skill==0)
                    checked
                @endif >Không
                </div>
                <button type="submit" class="btn btn-info btn">Thêm</button>
            </form>
        </div>
    </div>
@endsection
