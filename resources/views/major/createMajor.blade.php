@extends('layout.index')
@section('title')
    Thêm chuyên ngành
@endsection
@section('content1')
    <a class="navbar-brand" href="{{ route('major.index') }}"> CHUYÊN NGÀNH </a>
@endsection
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">mail_outline</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">CHUYÊN NGÀNH</h4>
            <form action="{{ route('major.store') }}" method="post">
                @csrf
                <div class="form-group label-floating">
                    <label style="color:black;">Mã chuyên ngành</label>
                    <input type="text" class="form-control" name="code">
                </div>
                <div class="form-group label-floating">
                    <label style="color:black;">Chuyên ngành</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <button type="submit" class="btn btn-info btn">Thêm</button>
            </form>
        </div>
    </div>
@endsection
