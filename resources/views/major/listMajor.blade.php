@extends('layout.index')
@section('title')
Quản lý ngành học
@endsection
@section('content1')
<a class="navbar-brand" href="{{ route('major.index') }}"> CHUYÊN NGÀNH </a>
@endsection
@section('content2')
<div class="form-group form-search is-empty">
    <input type="text" class="form-control" value="{{ $search }}" placeholder=" Tìm kiếm " name="search">
    <span class="material-input"></span>
</div>
<button type="submit" class="btn btn-white btn-round btn-just-icon">
    <i class="material-icons">search</i>
    <div class="ripple-container"></div>
</button>
@endsection
@section('content')
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))

    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
    @endif
    @endforeach
</div>
<!-- end .flash-message -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div> -->
            <div class="card-content">
            @if (session('admin')->role == 1)
                <div style="float:right;">
                    <a href="{{ route('major.create') }}" style="color:skyblue">Thêm</i> </a>
                </div>
            @endif
                <h4 class="card-title">CHUYÊN NGÀNH</h4>
                <div class="toolbar">

                </div>
                <div class="material-datatables">
                    <table id="table" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-center">Mã chuyên ngành</th>
                                <th class="text-center">Tên chuyên ngành</th>
                                @if (session('admin')->role == 1)
                                <th class="disabled-sorting text-center">Hành động</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listMajor as $major)
                            <tr>
                                <td>{{ $major->majorCode }}</td>
                                <td>{{ $major->nameMajor }}</td>
                                @if (session('admin')->role == 1)
                                <td class="td-actions text-center">
                                    <form action="{{ route('major.destroy',$major->majorCode) }}" method="POST">
                                        <a href="{{ route('major.edit', $major->majorCode) }}" style="color:green" class="btn btn-simple btn-info btn-icon edit">
                                            Sửa
                                        </a>
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
