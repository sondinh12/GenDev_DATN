@extends('layouts.master')

@section('title')
    Kanban Board
@endsection

@section('topbar-title')
    Apps
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Basic</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="area_chart_basic" data-colors='["--bs-primary"]' class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Spline</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="area_chart_spline" data-colors='["--bs-primary", "--bs-warning"]' class="apex-charts"
                        dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Datetime X - Axis</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div>
                        <div class="toolbar d-flex align-items-start justify-content-center flex-wrap gap-2">
                            <button type="button" class="btn btn-soft-primary timeline-btn btn-sm" id="one_month">
                                1M
                            </button>
                            <button type="button" class="btn btn-soft-primary timeline-btn btn-sm" id="six_months">
                                6M
                            </button>
                            <button type="button" class="btn btn-soft-primary timeline-btn btn-sm active" id="one_year">
                                1Y
                            </button>
                            <button type="button" class="btn btn-soft-primary timeline-btn btn-sm" id="all">
                                ALL
                            </button>
                        </div>
                        <div id="area_chart_datetime" data-colors='["--bs-success"]' class="apex-charts" dir="ltr">
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Negative Values</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="area_chart_negative" data-colors='["--bs-danger", "--bs-info"]' class="apex-charts"
                        dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Github</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div>
                        <div class="bg-light">
                            <div id="area_chart-months" data-colors='["--bs-danger"]' class="apex-charts" dir="ltr">
                            </div>
                        </div>

                        <div class="github-style d-flex align-items-center my-2">
                            <div class="flex-shrink-0 me-2">
                                <img class="avatar-2xs rounded" src="{{ URL::asset('build/images/users/avatar-7.png') }}"
                                    data-hovercard-user-id="634573" alt="" />
                            </div>
                            <div class="flex-grow-1">
                                <a class="font-size-14 text-dark fw-medium">coder</a>
                                <div class="cmeta text-muted font-size-11">
                                    <span class="commits text-dark fw-medium"></span> commits
                                </div>
                            </div>
                        </div>

                        <div class="bg-light">
                            <div id="area_chart-years" data-colors='["--bs-primary"]' class="apex-charts" dir="ltr">
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Stacked</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="area_chart_stacked" data-colors='["--bs-secondary", "--bs-success", "--bs-primary"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Irregular Timeseries</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="area_chart_irregular" data-colors='["--bs-primary", "--bs-warning", "--bs-info"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Missing Null Values</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="area-missing-null-value" data-colors='["--bs-danger"]' class="apex-charts" dir="ltr">
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

    <!-- for basic area chart -->
    <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
    <!-- for github style chart -->
    <script src="https://apexcharts.com/samples/assets/github-data.js"></script>
    <!-- for irregular timeseries chart -->
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>

    <script src="{{ URL::asset('build/libs/moment/moment.js') }}"></script>
    <!-- areacharts init -->
    <script src="{{ URL::asset('build/js/pages/apexcharts-area.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
