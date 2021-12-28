@extends('layout.index')
@section('title')
    Thêm điểm trung bình
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('mark-average.index') }}"> ĐIỂM TRUNG BÌNH </a>
@endsection
@section('content')
    <div class="card">
        <!-- <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">mail_outline</i>
        </div> -->
        <div class="card-content">
            <h4 class="card-title">ĐIỂM TB</h4>
            <form action="{{ route('mark.store') }}" method="post">
                @csrf
                <div class="form-group label-floating">
                    <label style="color:#000;">Lớp</label>

                    <select name="student" class="form-control" value ="{{ $array-> }}">

                    </select>
                </div>
                <div class="form-group label-floating">
                    <label style="color:#000;">Lớp</label>
                    <select name="student" class="form-control">

                    </select>
                </div>
                <div class="form-group label-floating">
                    <label style="color:#000;">Điểm TB </label>
                    <input type="text" class="form-control" name="mark_final">
                </div>
                <button type="submit" class="btn btn-fill btn-rose">Thêm</button>
            </form>
        </div>
    </div>
@endsection
