@extends('layout.index')
@section('content1')
<a class="navbar-brand" style="color:white" href="{{ route('dashboard-admin') }}"> TRANG ĐIỀU KHIỂN </a>
@endsection
@section('content2')
<div class="form-group form-search is-empty">
    <input type="text" class="form-control" placeholder=" Tìm kiếm">
    <span class="material-input" style="color:white"></span>
</div>
<button type="submit" class="btn btn-white btn-round btn-just-icon">
    <i class="material-icons">search</i>
    <div class="ripple-container"></div>
</button>

@endsection
@section('content')

<!-- <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="rose" data-header-animation="true">
                    <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Website Views</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="green" data-header-animation="true">
                    <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Daily Sales</h4>
                    <p class="category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> updated 4 minutes ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="blue" data-header-animation="true">
                    <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Completed Tasks</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                </div>
            </div>
        </div>
    </div> --}} -->
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">person</i>
            </div>
            <div class="card-content">
                <p class="category">NHÂN VIÊN</p>
                <p>{{$student}}</p>
                <h3 class="card-title"></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('student.index') }}">XEM THÊM </a><i class="material-icons">arrow_forward</i>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">store</i>
                </div>
                <div class="card-content">
                    <p class="category">Lớp học</p>
                    <p>{{ $grade }}</p>
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{ route('grade.index') }}">XEM THÊM </a><i class="material-icons">arrow_forward</i>
                    </div>
                </div>
            </div>
        </div> -->
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <p class="category">Môn Học</p>
                <p>{{ $subject }}</p>
                <h3 class="card-title"></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('subject.index') }}">XEM THÊM </a><i class="material-icons">arrow_forward</i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="rose">
                <i class="material-icons">store</i>
            </div>
            <div class="card-content">
                <p class="category">DS ĐIỂM THEO LỚP </p>
                <p>{{ $mark }}</p>
                <h3 class="card-title"></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('list-mark') }}">XEM THÊM </a><i class="material-icons">arrow_forward</i>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
{{-- <div class="row">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card card-calendar">
                    <div class="card-content" class="ps-child">
                        <div id="fullCalendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
