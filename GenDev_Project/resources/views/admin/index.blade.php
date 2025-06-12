@extends('layouts.master-without-page-title')

@section('title')
    Dashboard
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Good Morning, <span class="text-primary">Jonas!</span></h4>
                    <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Clivax</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--    end row -->

    <div class="row">
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-cart-plus fs-14 text-muted"></i>
                    </div>
                    <h4 class="card-title mb-0">Overall Sales</h4>
                    <div class="dropdown card-addon">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-sidebar"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="d-flex justify-content-between align-content-end shadow-lg p-3">
                                <div>
                                    <p class="text-muted text-truncate mb-2">Total sales</p>
                                    <h5 class="mb-0">$12,253</h5>
                                </div>
                                <div class="text-success float-end">
                                    <i class="mdi mdi-menu-up"> </i>2.2%
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="d-flex justify-content-between align-content-end shadow-lg p-3">
                                <div>
                                    <p class="text-muted text-truncate mb-2">Latest sales</p>
                                    <h5 class="mb-0">$34,254</h5>
                                </div>
                                <div class="text-success float-end">
                                    <i class="mdi mdi-menu-up"> </i>2.1%
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="d-flex justify-content-between align-content-end shadow-lg p-3">
                                <div>
                                    <p class="text-muted text-truncate mb-2">Last sales</p>
                                    <h5 class="mb-0">$32,695</h5>
                                </div>
                                <div class="text-success float-end">
                                    <i class="mdi mdi-menu-up"> </i>1.8%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="sales_figures" data-colors='["--bs-info", "--bs-success"]' class="apex-charts" dir="ltr">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card bg-danger-subtle"
                        style="background: url('build/images/dashboard/dashboard-shape-1.png'); background-repeat: no-repeat; background-position: bottom center; ">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="avatar avatar-sm avatar-label-danger">
                                    <i class="mdi mdi-buffer mt-1"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-danger mb-1">Total balance</p>
                                    <h4 class="mb-0">$1,452.55</h4>
                                </div>
                            </div>
                            <div class="hstack gap-2 mt-3">
                                <button class="btn btn-light">Transfer</button>
                                <button class="btn btn-info">Request</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card bg-success-subtle"
                        style="background: url('build/images/dashboard/dashboard-shape-2.png'); background-repeat: no-repeat; background-position: bottom center; ">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="avatar avatar-sm avatar-label-success">
                                    <i class="mdi mdi-cash-usd-outline mt-1"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-success mb-1">Upcoming payments</p>
                                    <h4 class="mb-0">$120</h4>
                                </div>
                            </div>
                            <div class="mt-3 mb-2">
                                <p class="mb-0">4 not confirmed</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card bg-info-subtle"
                        style="background: url('build/images/dashboard/dashboard-shape-3.png'); background-repeat: no-repeat; background-position: bottom center; ">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="avatar avatar-sm avatar-label-info">
                                    <i class="mdi mdi-webhook mt-1"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-info mb-1">Finished appt.</p>
                                    <h4 class="mb-0">72</h4>
                                </div>
                            </div>
                            <div class="mt-3 mb-2">
                                <p class="mb-0"><span class="text-primary me-2 fs-14"><i
                                            class="fas fa-caret-up me-1"></i>3.4%</span>vs last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-hockey-puck fs-14 text-muted"></i>
                            </div>
                            <h4 class="card-title mb-0">Sales by product category</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-brightness-5 text-primary me-2"></i>Clothes <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-briefcase-variant-outline text-danger me-2"></i>Kids
                                                    <span class="text-muted fs-14">-50%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-cart-arrow-right text-info me-2"></i>Cosmetics <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-checkbox-multiple-blank text-warning me-2"></i>Men
                                                    <span class="text-muted fs-14">-50%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-chess-queen text-success me-2"></i>Kitchen <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-church text-info me-2"></i>Decor <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-city text-warning me-2"></i>Outdoor <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-currency-usd-circle text-primary me-2"></i>Lighting
                                                    <span class="text-muted fs-14">-50%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-gamepad-circle text-danger me-2"></i>Dining <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p><i class="mdi mdi-hexagon-multiple text-info me-2"></i>Women <span
                                                        class="text-muted fs-14">-50%</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <div id="gradient_chart"
                                            data-colors='["--bs-primary", "--bs-success", "--bs-warning", "--bs-danger", "--bs-info", "--bs-dark", "--bs-purple", "--bs-orange"]'
                                            class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card" style="overflow-y: auto; height: 304px;" data-simplebar="">
                        <div class="card-header card-header-bordered">
                            <div class="card-icon text-muted"><i class="fa fa-clipboard-list fs-14"></i></div>
                            <h3 class="card-title">Recent activities</h3>
                            <div class="card-addon">
                                <button class="btn btn-sm btn-label-primary">See all</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="timeline timeline-timed">
                                <div class="timeline-item">
                                    <span class="timeline-time">10:00</span>
                                    <div class="timeline-pin"><i class="marker marker-circle text-primary"></i></div>
                                    <div class="timeline-content">
                                        <div>
                                            <span>Meeting with</span>
                                            <div class="avatar-group ms-2">
                                                <div class="avatar avatar-circle">
                                                    <img src="{{ URL::asset('build/images/users/avatar-1.png') }}"
                                                        alt="Avatar image" class="avatar-2xs" />
                                                </div>
                                                <div class="avatar avatar-circle">
                                                    <img src="{{ URL::asset('build/images/users/avatar-2.png') }}"
                                                        alt="Avatar image" class="avatar-2xs" />
                                                </div>
                                                <div class="avatar avatar-circle">
                                                    <img src="{{ URL::asset('build/images/users/avatar-3.png') }}"
                                                        alt="Avatar image" class="avatar-2xs" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <span class="timeline-time">14:00</span>
                                    <div class="timeline-pin"><i class="marker marker-circle text-danger"></i></div>
                                    <div class="timeline-content">
                                        <p class="mb-0">Received a new feedback on <a href="#">GoFinance</a> App
                                            product.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <span class="timeline-time">15:20</span>
                                    <div class="timeline-pin"><i class="marker marker-circle text-success"></i></div>
                                    <div class="timeline-content">
                                        <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt
                                            ut labore et dolore magna.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <span class="timeline-time">17:00</span>
                                    <div class="timeline-pin"><i class="marker marker-circle text-info"></i></div>
                                    <div class="timeline-content">
                                        <p class="mb-0">Make Deposit <a href="#">USD 700</a> o ESL.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card" style="height: 495px; overflow: hidden auto;" data-simplebar="">
                        <div class="card-header">
                            <div class="card-icon text-muted"><i class="fas fa-sync-alt fs-14"></i></div>
                            <h3 class="card-title">Order Progress</h3>
                            <div class="card-addon dropdown">
                                <button class="btn btn-label-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fas fa-filter fs-12 align-middle ms-1"></i></button>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                                    <a class="dropdown-item" href="#">
                                        <div class="dropdown-icon"><i class="fa fa-poll"></i></div>
                                        <span class="dropdown-content">Today</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="dropdown-icon"><i class="fa fa-chart-pie"></i></div>
                                        <span class="dropdown-content">Yesterday</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="dropdown-icon"><i class="fa fa-chart-line"></i></div>
                                        <span class="dropdown-content">Week</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md">
                                <table class="table text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Status</th>
                                            <th>Operators</th>
                                            <th>Location</th>
                                            <th>Progress</th>
                                            <th>Start date</th>
                                            <th>Estimation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">837563</td>
                                            <td class="align-middle"><i
                                                    class="marker marker-dot m-0 me-2 text-primary"></i> Arrived</td>
                                            <td class="align-middle">
                                                <div class="avatar-group">
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-1.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-2.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-3.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-4.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-5.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">Tokyo</td>
                                            <td class="align-middle">
                                                <div class="">
                                                    <h6 class="">90%</h6>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary" style="width: 90%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">26/06/2023</td>
                                            <td class="align-middle">27/06/2023</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">982365</td>
                                            <td class="align-middle"><i
                                                    class="marker marker-dot m-0 me-2 text-danger"></i> Pending</td>
                                            <td class="align-middle">
                                                <div class="avatar-group">
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-6.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-7.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-8.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">San Francisco</td>
                                            <td class="align-middle">
                                                <div class="">
                                                    <h6 class="">20%</h6>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary" style="width: 20%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">23/04/2023</td>
                                            <td class="align-middle">28/04/2023</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">872048</td>
                                            <td class="align-middle"><i
                                                    class="marker marker-dot m-0 me-2 text-success"></i> Moving</td>
                                            <td class="align-middle">
                                                <div class="avatar-group">
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-5.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-4.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-1.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-2.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">Edinburgh</td>
                                            <td class="align-middle">
                                                <div class="">
                                                    <h6 class="">75%</h6>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">26/04/2023</td>
                                            <td class="align-middle">30/04/2023</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">324712</td>
                                            <td class="align-middle"><i
                                                    class="marker marker-dot m-0 me-2 text-warning"></i> Hold</td>
                                            <td class="align-middle">
                                                <div class="avatar-group">
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-3.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-4.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-5.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">Tokyo</td>
                                            <td class="align-middle">
                                                <div class="">
                                                    <h6 class="">30%</h6>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary" style="width: 30%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">26/06/2023</td>
                                            <td class="align-middle">30/06/2023</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">128747</td>
                                            <td class="align-middle"><i
                                                    class="marker marker-dot m-0 me-2 text-success"></i> Moving</td>
                                            <td class="align-middle">
                                                <div class="avatar-group">
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-6.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-7.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-8.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-5.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">New York</td>
                                            <td class="align-middle">
                                                <div class="">
                                                    <h6 class="">60%</h6>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary" style="width: 60%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">10/05/2023</td>
                                            <td class="align-middle">15/05/2023</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">415423</td>
                                            <td class="align-middle"><i
                                                    class="marker marker-dot m-0 me-2 text-danger"></i> Pending</td>
                                            <td class="align-middle">
                                                <div class="avatar-group">
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-2.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                    <div class="avatar avatar-circle">
                                                        <img src="{{ URL::asset('build/images/users/avatar-6.png') }}"
                                                            alt="Avatar image" class="avatar-2xs">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">London</td>
                                            <td class="align-middle">
                                                <div class="">
                                                    <h6 class="">72%</h6>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary" style="width: 72%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">05/06/2023</td>
                                            <td class="align-middle">26/06/2023</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3">
            <div class="row">
                <div class="col-xxl-12 col-xl-6 order-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end">
                                <select class="form-select form-select-sm">
                                    <option selected>Apr</option>
                                    <option value="1">Mar</option>
                                    <option value="2">Feb</option>
                                    <option value="3">Jan</option>
                                </select>
                            </div>
                            <h4 class="card-title mb-4">Sales Analytics</h4>
                            <div id="pattern_chart"
                                data-colors='["--bs-primary", "--bs-success", "--bs-warning", "--bs-danger", "--bs-info"]'
                                class="apex-charts" dir="ltr"></div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="text-center mt-4">
                                        <p class="mb-2 text-truncate"><i
                                                class="mdi mdi-circle text-primary font-size-10 me-1"></i> Product A</p>
                                        <h5>42 %</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-center mt-4">
                                        <p class="mb-2 text-truncate"><i
                                                class="mdi mdi-circle text-success font-size-10 me-1"></i> Product B</p>
                                        <h5>26 %</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-center mt-4">
                                        <p class="mb-2 text-truncate"><i
                                                class="mdi mdi-circle text-warning font-size-10 me-1"></i> Product C</p>
                                        <h5>42 %</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 order-4 order-xxl-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon text-muted"><i class="fa fa-bell"></i></div>
                            <h3 class="card-title">Notification</h3>
                            <div class="card-addon">
                                <div class="dropdown">
                                    <button class="btn btn-sm py-0 btn-label-primary dropdown-toggle"
                                        data-bs-toggle="dropdown">All <i
                                            class="mdi mdi-chevron-down fs-17 align-middle ms-1"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                                        <a class="dropdown-item" href="#"><span
                                                class="badge badge-label-primary">Personal</span> </a>
                                        <a class="dropdown-item" href="#"><span
                                                class="badge badge-label-info">Work</span> </a>
                                        <a class="dropdown-item" href="#"><span
                                                class="badge badge-label-success">Important</span> </a>
                                        <a class="dropdown-item" href="#"><span
                                                class="badge badge-label-danger">Company</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="rich-list rich-list-bordered rich-list-action">
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs avatar-label-info">
                                            <div class=""><i class="fa fa-file-invoice"></i></div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title mb-1">New report has been received</h4>
                                        <p class="rich-list-subtitle mb-0">2 min ago</p>
                                    </div>
                                    <div class="rich-list-append">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-label-secondary btn-icon"
                                                data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h fs-12"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">
                                                    <div class="dropdown-icon"><i class="fa fa-check"></i></div>
                                                    <span class="dropdown-content">Mark as read</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <div class="dropdown-icon"><i class="fa fa-trash-alt"></i></div>
                                                    <span class="dropdown-content">Delete</span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">
                                                    <div class="dropdown-icon"><i class="fa fa-cog"></i></div>
                                                    <span class="dropdown-content">Settings</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs avatar-label-success">
                                            <div class=""><i class="fa fa-shopping-basket"></i></div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title mb-1">Last order was completed</h4>
                                        <p class="rich-list-subtitle mb-0">1 hrs ago</p>
                                    </div>
                                    <div class="rich-list-append">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-label-secondary btn-icon"
                                                data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h fs-12"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">
                                                    <div class="dropdown-icon"><i class="fa fa-check"></i></div>
                                                    <span class="dropdown-content">Mark as read</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <div class="dropdown-icon"><i class="fa fa-trash-alt"></i></div>
                                                    <span class="dropdown-content">Delete</span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">
                                                    <div class="dropdown-icon"><i class="fa fa-cog"></i></div>
                                                    <span class="dropdown-content">Settings</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs avatar-label-danger">
                                            <div class=""><i class="fa fa-users"></i></div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title mb-1">Company meeting canceled</h4>
                                        <p class="rich-list-subtitle mb-0">5 hrs ago</p>
                                    </div>
                                    <div class="rich-list-append">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-label-secondary btn-icon"
                                                data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h fs-12"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">
                                                    <div class="dropdown-icon"><i class="fa fa-check"></i></div>
                                                    <span class="dropdown-content">Mark as read</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <div class="dropdown-icon"><i class="fa fa-trash-alt"></i></div>
                                                    <span class="dropdown-content">Delete</span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">
                                                    <div class="dropdown-icon"><i class="fa fa-cog"></i></div>
                                                    <span class="dropdown-content">Settings</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 order-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Compaign Earnings</h4>
                            <div class="dropdown card-addon">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-sidebar"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="mb-3">
                                    <div id="semi_donut_chart" data-colors='["--bs-primary", "--bs-warning"]'
                                        class="apex-charts" dir="ltr"></div>
                                </div>

                                <div class="row justify-content-center mt-n5">
                                    <div class="col-6">
                                        <div class="p-2 shadow">
                                            <p class="text-muted text-truncate mb-2">Earnings</p>
                                            <h5 class="mb-0">$15.5k <span class="fs-12 text-primary ms-2"><i
                                                        class="mdi mdi-arrow-up"></i> 17%</span></h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 shadow">
                                            <p class="text-muted text-truncate mb-2">Expenses</p>
                                            <h5 class="mb-0">$11.4k <span class="fs-12 text-danger ms-2"><i
                                                        class="mdi mdi-arrow-down"></i> 14%</span></h5>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div id="bar_chart" data-colors='["--bs-danger"]' class="apex-charts"
                                        dir="ltr"></div>
                                </div>

                                <div class="card"
                                    style="background: url('build/images/widgets-shape2.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
                                    <div class="bg-overlay bg-primary-subtle rounded"></div>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-7">
                                                <h4 class="fs-16 mb-1">Need more idea? </h4>
                                                <p class="text-muted mb-0">Upgrade to pro max for added benefits.</p>
                                                <button class="btn btn-primary mt-4">Upgarde Now</button>
                                            </div>
                                            <div class="col-5">
                                                <img src="{{ URL::asset('build/images/dashboard/upgarde-1.png') }}"
                                                    alt="" class="img-fluid" style="height: 126px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-xl-6 order-2 order-xxl-4">
                    <div class="card">
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
        </div>
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
                            <div id="products" data-colors='["--bs-primary"]' class="apex-charts" dir="ltr"></div>
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

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header justify-content-between">
                    <div class="card-icon text-muted"><i class="fas fa-sort-amount-up fs-14"></i></div>
                    <h4 class="card-title">Transaction History</h4>
                    <div class="card-addon dropdown">
                        <button class="btn btn-label-primary py-0 btn-sm dropdown-toggle" data-bs-toggle="dropdown">Option
                            <i class="mdi mdi-chevron-down fs-17 align-middle ms-1"></i></button>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                            <a class="dropdown-item" href="#">
                                <div class="dropdown-icon"><i class="fa fa-poll"></i></div>
                                <span class="dropdown-content">Report</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="dropdown-icon"><i class="fa fa-chart-pie"></i></div>
                                <span class="dropdown-content">Charts</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="dropdown-icon"><i class="fa fa-chart-line"></i></div>
                                <span class="dropdown-content">Statistics</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <div class="dropdown-icon"><i class="fa fa-cog"></i></div>
                                <span class="dropdown-content">Settings</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="border-bottom text-center pb-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="text-primary fs-24 me-2"><i class="fas fa-arrow-circle-right"></i></span>
                            <h4 class="display-5 mb-0">54</h4>
                        </div>
                        <p class="text-muted mb-0">Pending Invoices</p>
                    </div>
                    <div class="d-flex justify-content-between py-3">
                        <p class="text-muted fs-5 mb-0">Invoice details</p>
                        <div class="dropdown">
                            <span class="dropdown-toggle" data-bs-toggle="dropdown">30 Days <i
                                    class="mdi mdi-chevron-down fs-17 align-middle ms-1"></i></span>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                                <a class="dropdown-item" href="#">
                                    <div class="dropdown-icon"><i class="fa fa-poll"></i></div>
                                    <span class="dropdown-content">Report</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="dropdown-icon"><i class="fa fa-chart-pie"></i></div>
                                    <span class="dropdown-content">Charts</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="dropdown-icon"><i class="fa fa-chart-line"></i></div>
                                    <span class="dropdown-content">Statistics</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <div class="dropdown-icon"><i class="fa fa-cog"></i></div>
                                    <span class="dropdown-content">Settings</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hstack gap-4 justify-content-center pb-3">
                        <div class="text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="text-info fs-22 me-2"><i class="fas fa-arrow-circle-up"></i></span>
                                <h4 class="display-6 mb-0">28</h4>
                            </div>
                            <p class="text-muted mb-0">Invoice In</p>
                        </div>

                        <div class="text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="text-danger fs-22 me-2"><i class="fas fa-arrow-circle-down"></i></span>
                                <h4 class="display-6 mb-0">32</h4>
                            </div>
                            <p class="text-muted mb-0">Invoice Out</p>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h5 class="fs-6 mb-0"><i class="fas fa-arrow-circle-up text-info me-2"></i>Invoice 1</h5>
                            <p class="text-muted mb-0">+1,235</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h5 class="fs-6 mb-0"><i class="fas fa-arrow-circle-down text-danger me-2"></i>Invoice 2</h5>
                            <p class="text-muted mb-0">-152</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h5 class="fs-6 mb-0"><i class="fas fa-arrow-circle-down text-danger me-2"></i>Invoice 3</h5>
                            <p class="text-muted mb-0">+13,487</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h5 class="fs-6 mb-0"><i class="fas fa-arrow-circle-up text-info me-2"></i>Invoice 4</h5>
                            <p class="text-muted mb-0">-1,523</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card" style="height: 416px; overflow: hidden auto;" data-simplebar="">
                <div class="card-header card-header-bordered">
                    <div class="card-icon text-muted"><i class="fa fa-user-tag fs14"></i></div>
                    <h3 class="card-title">User Feeds</h3>
                </div>
                <div class="card-body">
                    <div class="rich-list rich-list-flush">
                        <div class="flex-column align-items-stretch">
                            <div class="rich-list-item">
                                <div class="rich-list-prepend">
                                    <div class="avatar avatar-xs">
                                        <div class=""><img
                                                src="{{ URL::asset('build/images/users/avatar-1.png') }}"
                                                alt="Avatar image" class="avatar-2xs" /></div>
                                    </div>
                                </div>
                                <div class="rich-list-content">
                                    <h4 class="rich-list-title mb-1">Airi Satou</h4>
                                    <p class="rich-list-subtitle mb-0">Accountant</p>
                                </div>
                                <div class="rich-list-append"><button class="btn btn-sm btn-label-primary">Follow</button>
                                </div>
                            </div>
                        </div>
                        <div class="flex-column align-items-stretch">
                            <div class="rich-list-item">
                                <div class="rich-list-prepend">
                                    <div class="avatar avatar-xs">
                                        <div class=""><img
                                                src="{{ URL::asset('build/images/users/avatar-2.png') }}"
                                                alt="Avatar image" class="avatar-2xs" /></div>
                                    </div>
                                </div>
                                <div class="rich-list-content">
                                    <h4 class="rich-list-title mb-1">Cedric Kelly</h4>
                                    <p class="rich-list-subtitle mb-0">Senior Developer</p>
                                </div>
                                <div class="rich-list-append"><button class="btn btn-sm btn-label-primary">Follow</button>
                                </div>
                            </div>
                        </div>
                        <div class="flex-column align-items-stretch">
                            <div class="rich-list-item">
                                <div class="rich-list-prepend">
                                    <div class="avatar avatar-xs">
                                        <div class=""><img
                                                src="{{ URL::asset('build/images/users/avatar-4.png') }}"
                                                alt="Avatar image" class="avatar-2xs" /></div>
                                    </div>
                                </div>
                                <div class="rich-list-content">
                                    <h4 class="rich-list-title mb-1">Brielle Williamson</h4>
                                    <p class="rich-list-subtitle mb-0">Integration Specialist</p>
                                </div>
                                <div class="rich-list-append"><button class="btn btn-sm btn-label-primary">Follow</button>
                                </div>
                            </div>
                        </div>
                        <div class="flex-column align-items-stretch">
                            <div class="rich-list-item">
                                <div class="rich-list-prepend">
                                    <div class="avatar avatar-xs">
                                        <div class=""><img
                                                src="{{ URL::asset('build/images/users/avatar-6.png') }}"
                                                alt="Avatar image" class="avatar-2xs" /></div>
                                    </div>
                                </div>
                                <div class="rich-list-content">
                                    <h4 class="rich-list-title mb-1">Sonya Frost</h4>
                                    <p class="rich-list-subtitle mb-0">Software Engineer</p>
                                </div>
                                <div class="rich-list-append"><button class="btn btn-sm btn-label-primary">Follow</button>
                                </div>
                            </div>
                        </div>
                        <div class="flex-column align-items-stretch">
                            <div class="rich-list-item">
                                <div class="rich-list-prepend">
                                    <div class="avatar avatar-xs">
                                        <div class=""><img
                                                src="{{ URL::asset('build/images/users/avatar-5.png') }}"
                                                alt="Avatar image" class="avatar-2xs" /></div>
                                    </div>
                                </div>
                                <div class="rich-list-content">
                                    <h4 class="rich-list-title mb-1">Aarya Jeck</h4>
                                    <p class="rich-list-subtitle mb-0">Developer</p>
                                </div>
                                <div class="rich-list-append"><button class="btn btn-sm btn-label-primary">Follow</button>
                                </div>
                            </div>
                        </div>
                        <div class="flex-column align-items-stretch">
                            <div class="rich-list-item">
                                <div class="rich-list-prepend">
                                    <div class="avatar avatar-xs">
                                        <div class=""><img
                                                src="{{ URL::asset('build/images/users/avatar-7.png') }}"
                                                alt="Avatar image" class="avatar-2xs" /></div>
                                    </div>
                                </div>
                                <div class="rich-list-content">
                                    <h4 class="rich-list-title mb-1">Saniya Miroja</h4>
                                    <p class="rich-list-subtitle mb-0">UI-UX Designer</p>
                                </div>
                                <div class="rich-list-append"><button class="btn btn-sm btn-label-primary">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
