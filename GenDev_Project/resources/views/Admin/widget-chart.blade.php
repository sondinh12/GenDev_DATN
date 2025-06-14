@extends('layouts.master')

@section('title')
    Widget-Chart
@endsection

@section('topbar-title')
    Elements
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xxl-8">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-map-marker-alt fs-14 text-muted"></i>
                            </div>
                            <h4 class="card-title mb-0">Global sales by top locations</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-xl-7">
                                    <div class="progress" style="height:15px;">
                                        <div class="progress-bar" style="width: 12%"></div>
                                        <div class="progress-bar bg-danger" style="width: 18%"></div>
                                        <div class="progress-bar bg-success" style="width: 20%"></div>
                                        <div class="progress-bar bg-warning" style="width: 24%"></div>
                                        <div class="progress-bar bg-info rounded-end-pill" style="width: 10%"></div>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="hstack gap-2">
                                        <div>
                                            <h6 class="fs-12 mb-0"><i
                                                    class="fas fa-circle text-primary fs-10 me-1"></i>Laptop</h6>
                                        </div>
                                        <div>
                                            <h6 class="fs-12 mb-0"><i
                                                    class="fas fa-circle text-danger fs-10 me-1"></i>Keyboard</h6>
                                        </div>
                                        <div>
                                            <h6 class="fs-12 mb-0"><i
                                                    class="fas fa-circle text-success fs-10 me-1"></i>Mouse</h6>
                                        </div>
                                        <div>
                                            <h6 class="fs-12 mb-0"><i
                                                    class="fas fa-circle text-warning fs-10 me-1"></i>Desktop</h6>
                                        </div>
                                        <div>
                                            <h6 class="fs-12 mb-0"><i class="fas fa-circle text-info fs-10 me-1"></i>Mobile
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-body -->
                        <div class="card-body">
                            <div id="global_sales" data-colors='["--bs-primary", "--bs-danger"]' class="apex-charts"
                                dir="ltr"></div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xxl-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-layer-group fs-14 text-muted"></i>
                            </div>
                            <h4 class="card-title mb-0">Top Selling</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <div id="products" data-colors='["--bs-primary"]' class="apex-charts" dir="ltr">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-grid gap-2">
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">48%</span>
                                                <span class="text-muted">Sunday</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                                    style="width: 48%;"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">100%</span>
                                                <span class="text-muted">Monday</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                                    style="width: 100%;"></div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">40%</span>
                                                <span class="text-muted">Tuesday</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                                    style="width: 40%;"></div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">68%</span>
                                                <span class="text-muted">Wednesday</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                                    style="width: 68%;"></div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">56%</span>
                                                <span class="text-muted">Thursday</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                    style="width: 56%;"></div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">80%</span>
                                                <span class="text-muted">Friday</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                                    style="width: 80%;"></div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">80%</span>
                                                <span class="text-muted">Saturday</span>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark"
                                                    style="width: 92%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xxl-4 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-user-friends fs-14 text-muted"></i>
                            </div>
                            <h4 class="card-title mb-0">User by traffic</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="user_traffic" data-colors='["--bs-info", "--bs-primary"]' class="apex-charts"
                                dir="ltr"></div>
                        </div><!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <div class="col-xxl-4">
            <div class="card"
                style="background: url('build/images/widgets-chart-shape.png'); background-repeat: no-repeat; background-position: right bottom;">
                <div class="bg-overlay bg-success-subtle opacity-75"></div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <div id="total_cov" data-colors='["--bs-primary", "--bs-danger", "--bs-info", "--bs-success"]'
                                class="apex-charts" dir="ltr"></div>
                        </div>
                        <div class="col-4 offset-1">
                            <div>
                                <p class="mb-1">Total coverage</p>
                                <p class="fs-12 text-muted">Compared to $21,250</p>
                                <h4 class="mt-3 mb-0">53,430,001</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-chart-pie fs-14 text-muted"></i>
                    </div>
                    <h4 class="card-title mb-0">Sales Dynamics</h4>
                </div>
                <div class="card-body">
                    <div id="sales_dynamics" data-colors='["--bs-primary", "--bs-success", "--bs-warning", "--bs-danger"]'
                        class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!-- end col -->

            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-hospital-user fs-14 text-muted"></i>
                    </div>
                    <h3 class="card-title">Employee change</h3>
                    <div class="card-addon">
                        <div class="nav nav-lines card-nav" id="card1-tab" role="tablist">
                            <a class="nav-item nav-link active" id="card1-month-tab" data-bs-toggle="tab"
                                href="#card1-month" aria-selected="true" role="tab">Last Month</a>
                            <a class="nav-item nav-link" id="card1-time-tab" data-bs-toggle="tab" href="#card1-time"
                                aria-selected="false" role="tab" tabindex="-1">All Time</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="card1-month" role="tabpanel"
                            aria-labelledby="card1-month-tab">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-hover text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Office</th>
                                            <th>Change</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Rhona Davidson</h4><span
                                                            class="rich-list-subtitle">SEO Specialist</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Edinburgh</td>
                                            <td style="max-width: 8rem">
                                                <div class="" data-colors='["--bs-success", "--bs-transparent"]'
                                                    dir="ltr" id="coin1_sparkline_charts"></div>
                                            </td>
                                            <td><span class="badge badge-label-success">Good</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Brielle Williamson</h4><span
                                                            class="rich-list-subtitle">System Architect</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>London</td>
                                            <td style="max-width: 8rem">
                                                <div class="" data-colors='["--bs-info"]' dir="ltr"
                                                    id="coin2_sparkline_charts"></div>
                                            </td>
                                            <td><span class="badge badge-label-info">Standard</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Garrett Winters</h4><span
                                                            class="rich-list-subtitle">Accountant</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Tokyo</td>
                                            <td style="max-width: 8rem">
                                                <div class="" data-colors='["--bs-danger"]' dir="ltr"
                                                    id="coin3_sparkline_charts"></div>
                                            </td>
                                            <td><span class="badge badge-label-primary">Excelent</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Airi Satou</h4><span
                                                            class="rich-list-subtitle">Senior Developer</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>London</td>
                                            <td style="max-width: 8rem">
                                                <div class="" data-colors='["--bs-warning"]' dir="ltr"
                                                    id="coin4_sparkline_charts"></div>
                                            </td>
                                            <td><span class="badge badge-label-danger">Bad</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="card1-time" role="tabpanel" aria-labelledby="card1-time-tab">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-hover text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Office</th>
                                            <th>Change</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Rhona Davidson</h4><span
                                                            class="rich-list-subtitle">SEO Specialist</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Edinburgh</td>
                                            <td style="max-width: 8rem">
                                                <div class="" data-colors='["--bs-danger"]' dir="ltr"
                                                    id="coin8_sparkline_charts"></div>
                                            </td>
                                            <td><span class="badge badge-label-success">Good</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Brielle Williamson</h4><span
                                                            class="rich-list-subtitle">System Architect</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>London</td>
                                            <td style="max-width: 8rem">
                                                <div class="" data-colors='["--bs-warning"]' dir="ltr"
                                                    id="coin5_sparkline_charts"></div>
                                            </td>
                                            <td><span class="badge badge-label-info">Standard</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Garrett Winters</h4><span
                                                            class="rich-list-subtitle">Accountant</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Tokyo</td>
                                            <td style="max-width: 8rem">
                                                <div class="" data-colors='["--bs-success"]' dir="ltr"
                                                    id="coin6_sparkline_charts"></div>
                                            </td>
                                            <td><span class="badge badge-label-primary">Excelent</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="rich-list-item p-0">
                                                    <div class="rich-list-content">
                                                        <h4 class="rich-list-title">Airi Satou</h4><span
                                                            class="rich-list-subtitle">Senior Developer</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>London</td>
                                            <td style="max-width: 8rem">
                                                <div class="" data-colors='["--bs-info"]' dir="ltr"
                                                    id="coin7_sparkline_charts"></div>
                                            </td>
                                            <td><span class="badge badge-label-danger">Bad</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class=" fas fa-cart-plus fs-14 text-muted"></i>
                    </div>
                    <h4 class="card-title mb-0">Sales Figures</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="sales_figures" data-colors='["--bs-info", "--bs-success"]' class="apex-charts"
                        dir="ltr"></div>
                </div><!-- end card-body -->
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <div class="card-icon text-muted"><i class="fa fa-inbox fs-14"></i></div>
                    <h3 class="card-title">Support requests</h3>
                </div>
                <div class="card-body">
                    <div class="">
                        <div id="support_requests" data-colors='["--bs-success", "--bs-warning", "--bs-danger"]'
                            class="apex-charts" dir="ltr"></div>
                        <div class="d-flex justify-content-around">
                            <span class="text-muted"><i class="marker marker-dot text-primary"></i> 20% Margin
                            </span><span class="text-muted"><i class="marker marker-dot text-success"></i> 70% Profit
                            </span>
                            <span class="text-muted"><i class="marker marker-dot text-danger"></i> 10% Lost</span>
                        </div>
                    </div>
                    <div class="">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th class="text-end">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>EPS</td>
                                    <td class="text-end text-primary">+75,10%</td>
                                </tr>
                                <tr>
                                    <td>OPL Status</td>
                                    <td class="text-end text-danger">Negative</td>
                                </tr>
                                <tr>
                                    <td>Priority</td>
                                    <td class="text-end text-info">+460,080</td>
                                </tr>
                                <tr>
                                    <td>Net profit</td>
                                    <td class="text-end text-primary">$215,950</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-0">
                <div class="card-header">
                    <div class="card-icon">
                        <i class=" fas fa-euro-sign fs-14 text-muted"></i>
                    </div>
                    <h4 class="card-title mb-0">Total Earning</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <h2 class="">$12,875</h2>
                            <p class="text-muted mb-0">Compared to $21,490 last year</p>
                        </div>
                        <div>
                            <p class="text-primary mb-0"><i class="fas fa-caret-up align-middle"></i> 10%</p>
                        </div>
                    </div>
                    <div id="multiple_heatmap"
                        data-colors='["--bs-primary", "--bs-secondary", "--bs-success", "--bs-info", "--bs-warning", "--bs-danger", "--bs-dark"]'
                        class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card mb-0">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-th-large fs-14 text-muted"></i>
                    </div>
                    <h4 class="card-title mb-0">Efficiency</h4>
                </div>
                <div class="card-body">
                    <div id="efficiency" data-colors='["--bs-primary","--bs-success"]' class="apex-charts"
                        dir="ltr"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card mb-0">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-calendar-alt fs-14 text-muted"></i>
                    </div>
                    <h4 class="card-title mb-0">Monthly Sales</h4>
                </div>
                <div class="card-body">
                    <div id="monthly_states" data-colors='["--bs-success", "--bs-danger", "--bs-warning"]'
                        class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/moment/moment.js') }}"></script>

    <!-- apexcharts init -->
    <script src="{{ URL::asset('build/js/pages/widgets.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
