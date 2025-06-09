@extends('layouts.master')

@section('title')
    Column Charts
@endsection

@section('topbar-title')
    Apexcharts
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Basic Column Charts</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="column_chart" data-colors='["--bs-danger", "--bs-primary", "--bs-success"]' class="apex-charts"
                        dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Column with Data Labels</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="column_chart_datalabel" data-colors='["--bs-success"]' class="apex-charts" dir="ltr">
                    </div>
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
                    <h4 class="card-title mb-0">Stacked Column Charts</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="column_stacked" data-colors='["--bs-primary", "--bs-success", "--bs-warning", "--bs-danger"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Stacked Column 100</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="column_stacked_chart" data-colors='["--bs-primary", "--bs-success", "--bs-warning"]'
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
                    <h4 class="card-title mb-0">Column with Markers</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="column_markers" data-colors='["--bs-success", "--bs-primary"]' class="apex-charts"
                        dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Column with Rotated Labels</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="column_rotated_labels" data-colors='["--bs-info"]' class="apex-charts" dir="ltr"></div>
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
                    <h4 class="card-title mb-0">Column with Nagetive Values</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="column_nagetive_values" data-colors='["--bs-success", "--bs-danger", "--bs-warning"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Range Column Chart</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="column_range" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"
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
                    <h4 class="card-title mb-0">Dynamic Loaded Chart</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="dynamicloadedchart-wrap" dir="ltr">
                        <div id="chart-year"
                            data-colors='["--bs-primary", "--bs-success", "--bs-warning", "--bs-danger", "--bs-dark", "--bs-info"]'
                            class="apex-charts"></div>
                        <div id="chart-quarter" class="apex-charts"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Distributed Columns Chart</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="column_distributed"
                        data-colors='["--bs-primary", "--bs-success", "--bs-warning", "--bs-danger", "--bs-dark", "--bs-info"]'
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
                    <h4 class="card-title mb-0">Column with Group Label</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="column_group_labels" data-colors='["--bs-info"]' class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Dumbbell</h4>
                </div>
                <div class="card-body">
                    <div id="column_dumbbell_chart" data-colors='["--bs-info", "--bs-primary"]' class="apex-charts"
                        dir="ltr"></div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

    <script src="https://img.Codebucks.com/velzon/apexchart-js/dayjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/plugin/quarterOfYear.min.js"></script>
    <!-- apexcharts init -->
    <script src="{{ URL::asset('build/js/pages/apexcharts-column.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
