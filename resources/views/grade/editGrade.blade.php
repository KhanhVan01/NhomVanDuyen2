@extends('layout.index')
@section('title')
    Cập nhật lớp
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('grade.index') }}">LỚP</a>
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">mail_outline</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">LỚP</h4>
            <form action="{{ route('grade.update', $grade->classCode) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group label-floating">
                    <label style="color:black;">Mã lớp</label>
                    <input type="text" class="form-control" name="code-grade" value="{{ $grade->classCode }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Lớp</label>
                    <input type="text" class="form-control" name="name-grade" value="{{ $grade->nameClass }}">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Khóa</label>
                    <select name="course" class="form-control">
                        @foreach ($course as $cou)
                            <option value="{{ $cou->courseCode }}" @if ($grade->courseCode == $cou->courseCode) selected @endif>
                                {{ $cou->nameCourse }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Chuyên ngành</label>
                    <select name="major" class="form-control">
                        @foreach ($major as $maj)
                            <option value="{{ $maj->majorCode }}" @if ($grade->majorCode == $maj->majorCode) selected @endif>
                                {{ $maj->nameMajor }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
