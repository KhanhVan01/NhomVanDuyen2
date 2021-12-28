@extends('layout.index')
@section('title')
Quản lý nhân viên
@endsection
@section('content1')
<a class="navbar-brand" href="{{ route('admin.index') }}"> NHÂN VIÊN </a>
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
            <div class="card-content">
                @if (session('admin')->role == 1)
                <div style="float:right;">
                    <a href="{{ route('admin.create') }}" style="color: skyblue">Thêm </a>
                </div>
                @endif
                <h4 class="card-title">NHÂN VIÊN</h4>
                <div class="toolbar">

                </div>
                <div class="material-datatables">
                    <table id="table"class="table table-bordered table-striped text-center" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">Mã nhân viên</th>
                                <th class="text-center">Tài khoản</th>
                                {{--<th class="text-center">Mật khẩu</th>--}}
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Quyền</th>
                                @if (session('admin')->role == 1)
                                <th class="disabled-sorting text-center">Hành động</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listAdmin as $admin)
                            <tr>
                                <td>{{ $admin->codeAdmin }}</td>
                                <td>{{ $admin->email }}</td>
                                {{--<td>{{ $admin->password }}</td>--}}
                                <td>{{ $admin->fullName }}</td>
                                <td>{{ $admin->Right }}</td>
                                @if (session('admin')->role == 1)
                                <td class="td-actions text-center">
                                    <form action="{{ route('admin.destroy',$admin->codeAdmin) }}" method="POST">
                                        <a href="{{route('admin.edit',$admin->codeAdmin)}}" style="color:green" class="btn btn-simple btn-info btn-icon edit">
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
<script>
    function is_admin() {
        $admin = is_logged();
        if (!empty($admin['role']) && $admin['role'] == '1') {
            return true;
        }
        false;
    }
</script>
