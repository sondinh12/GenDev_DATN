@extends('layouts.master')

@section('title')
    Widget-General
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
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header justify-content-between bg-primary-subtle border-primary-subtle">
                            <div class="card-icon text-muted"><i class="fas fa-laptop-code fs14"></i></div>
                            <h3 class="card-title">Company income</h3>
                            <div class="card-addon dropdown">
                                <button class="btn btn-label-primary py-0 btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown">Option <i
                                        class="mdi mdi-chevron-down fs-17 align-middle ms-1"></i></button>
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
                        <div class="card-body bg-primary-subtle"
                            style="background: url('build/images/widget-1.png'); background-repeat: no-repeat; background-position: bottom left; background-size: 130px;">
                            <h2 class="-5 text-primary text-end my-3">$237,650</h2>
                        </div>
                        <div class="mt-n3 text-center">
                            <button class="btn btn-info">All Earning</button>
                        </div>
                        <div class="card-body">
                            <div class="nav nav-pills nav-justified widgets-nav mb-4" id="income-tab">
                                <a class="nav-item nav-link active" id="income-march-tab" data-bs-toggle="tab"
                                    href="#income-march">March</a>
                                <a class="nav-item nav-link" id="income-april-tab" data-bs-toggle="tab"
                                    href="#income-april">April</a>
                                <a class="nav-item nav-link" id="income-mei-tab" data-bs-toggle="tab"
                                    href="#income-mei">May</a> <a class="nav-item nav-link" id="income-june-tab"
                                    data-bs-toggle="tab" href="#income-june">June</a>
                            </div>
                            <div class="tab-content p-0" id="income-tabContent">
                                <div class="tab-pane fade show active" id="income-march">
                                    <div class="card mb-0">
                                        <div class="rich-list rich-list-flush">
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$23,050</h4>
                                                    <p class="rich-list-subtitle mb-0">Annual companies taxes</p>
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$46,50</h4>
                                                    <p class="rich-list-subtitle mb-0">Avarage product price</p>
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$260,700</h4>
                                                    <p class="rich-list-subtitle mb-0">Total annual profit before tax</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="income-april">
                                    <div class="card mb-0">
                                        <div class="rich-list rich-list-flush">
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$13,000</h4>
                                                    <p class="rich-list-subtitle mb-0">Annual companies taxes</p>
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$34,00</h4>
                                                    <p class="rich-list-subtitle mb-0">Avarage product price</p>
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$350,650</h4>
                                                    <p class="rich-list-subtitle mb-0">Total annual profit before tax</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="income-mei">
                                    <div class="card mb-0">
                                        <div class="rich-list rich-list-flush">
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$3,050</h4>
                                                    <p class="rich-list-subtitle mb-0">Annual companies taxes</p>
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$16,20</h4>
                                                    <p class="rich-list-subtitle mb-0">Avarage product price</p>
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$135,500</h4>
                                                    <p class="rich-list-subtitle mb-0">Total annual profit before tax</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="income-june">
                                    <div class="card mb-0">
                                        <div class="rich-list rich-list-flush">
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$56,650</h4>
                                                    <p class="rich-list-subtitle mb-0">Annual companies taxes</p>
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$35,50</h4>
                                                    <p class="rich-list-subtitle mb-0">Avarage product price</p>
                                                </div>
                                            </div>
                                            <div class="rich-list-item">
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">$341,080</h4>
                                                    <p class="rich-list-subtitle mb-0">Total annual profit before tax</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header justify-content-between">
                            <div class="card-icon text-muted"><i class="fas fa-sort-amount-up fs-14"></i></div>
                            <h4 class="card-title">Transaction History</h4>
                            <div class="card-addon dropdown">
                                <button class="btn btn-label-primary py-0 btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown">Option <i
                                        class="mdi mdi-chevron-down fs-17 align-middle ms-1"></i></button>
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
                                        <span class="text-danger fs-22 me-2"><i
                                                class="fas fa-arrow-circle-down"></i></span>
                                        <h4 class="display-6 mb-0">32</h4>
                                    </div>
                                    <p class="text-muted mb-0">Invoice Out</p>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h5 class="fs-6 mb-0"><i class="fas fa-arrow-circle-up text-info me-2"></i>Invoice 1
                                    </h5>
                                    <p class="text-muted mb-0">+1,235</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h5 class="fs-6 mb-0"><i class="fas fa-arrow-circle-down text-danger me-2"></i>Invoice
                                        2</h5>
                                    <p class="text-muted mb-0">-152</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h5 class="fs-6 mb-0"><i class="fas fa-arrow-circle-down text-danger me-2"></i>Invoice
                                        3</h5>
                                    <p class="text-muted mb-0">+13,487</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h5 class="fs-6 mb-0"><i class="fas fa-arrow-circle-up text-info me-2"></i>Invoice 4
                                    </h5>
                                    <p class="text-muted mb-0">-1,523</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon text-muted"><i class="fa fa-boxes"></i></div>
                            <h3 class="card-title">Product sales</h3>
                            <div class="card-addon dropdown">
                                <button class="btn btn-sm btn-label-secondary btn-icon" data-bs-toggle="dropdown"><i
                                        class="fa fa-ellipsis-v fs-12"></i></button>
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
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <h2 class="rich-list-title mb-0">Sales growth</h2>
                                    <p class="rich-list-subtitle mb-0">62%</p>
                                </div>
                                <div class="progress progress-sm" style="height:8px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                        style="width: 62%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <h2 class="rich-list-title mb-0">Product growth</h2>
                                    <p class="rich-list-subtitle mb-0">34%</p>
                                </div>
                                <div class="progress progress-sm" style="height:8px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                        style="width: 34%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <h2 class="rich-list-title mb-0">Market share</h2>
                                    <p class="rich-list-subtitle mb-0">40%</p>
                                </div>
                                <div class="progress progress-sm" style="height:8px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                        style="width: 40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon text-muted"><i class="fa fa-chalkboard fs14"></i></div>
                            <h3 class="card-title">Company summary</h3>
                            <div class="card-addon">
                                <div class="dropdown">
                                    <button class="btn btn-label-primary btn-sm py-0 dropdown-toggle"
                                        data-bs-toggle="dropdown">June, 2020 <i
                                            class="mdi mdi-chevron-down fs-17 align-middle ms-1"></i></button>
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
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <p class="text-muted mb-2">Server Load</p>
                                        <h4 class="fs-16 mb-2">489</h4>
                                        <div class="progress progress-sm" style="height:4px;">
                                            <div class="progress-bar bg-success" style="width: 49.4%"></div>
                                        </div>
                                        <p class="text-muted mb-0 mt-1">49.4% <span>Avg</span></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <p class="text-muted mb-2">Members online</p>
                                        <h4 class="fs-16 mb-2">3,450</h4>
                                        <div class="progress progress-sm" style="height:4px;">
                                            <div class="progress-bar bg-danger" style="width: 34.6%"></div>
                                        </div>
                                        <p class="text-muted mb-0 mt-1">34.6% <span>Avg</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 mt-2">
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <p class="text-muted mb-2">Today's revenue</p>
                                        <h4 class="fs-16 mb-2">$18,390</h4>
                                        <div class="progress progress-sm" style="height:4px;">
                                            <div class="progress-bar bg-warning" style="width: 20%"></div>
                                        </div>
                                        <p class="text-muted mb-0 mt-1">$37,578 <span>Avg</span></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <p class="text-muted mb-2">Expected profit</p>
                                        <h4 class="fs-16 mb-2">$23,461</h4>
                                        <div class="progress progress-sm" style="height:4px;">
                                            <div class="progress-bar bg-info" style="width: 60%"></div>
                                        </div>
                                        <p class="text-muted mb-0 mt-1">$23,461 <span>Avg</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header card-header-bordered">
                            <div class="card-icon text-muted"><i class="fa fa-user-tag fs14"></i></div>
                            <h3 class="card-title">User feeds</h3>
                        </div>
                        <div class="card-body">
                            <div class="rich-list rich-list-flush">
                                <div class="flex-column align-items-stretch">
                                    <div class="rich-list-item">
                                        <div class="rich-list-prepend">
                                            <div class="avatar avatar-xs">
                                                <div class=""><img src="{{ URL::asset('build/images/users/avatar-1.png') }}"
                                                        alt="Avatar image" class="avatar-2xs" /></div>
                                            </div>
                                        </div>
                                        <div class="rich-list-content">
                                            <h4 class="rich-list-title mb-1">Airi Satou</h4>
                                            <p class="rich-list-subtitle mb-0">Accountant</p>
                                        </div>
                                        <div class="rich-list-append"><button
                                                class="btn btn-sm btn-label-primary">Follow</button></div>
                                    </div>
                                </div>
                                <div class="flex-column align-items-stretch">
                                    <div class="rich-list-item">
                                        <div class="rich-list-prepend">
                                            <div class="avatar avatar-xs">
                                                <div class=""><img src="{{ URL::asset('build/images/users/avatar-2.png') }}"
                                                        alt="Avatar image" class="avatar-2xs" /></div>
                                            </div>
                                        </div>
                                        <div class="rich-list-content">
                                            <h4 class="rich-list-title mb-1">Cedric Kelly</h4>
                                            <p class="rich-list-subtitle mb-0">Senior Developer</p>
                                        </div>
                                        <div class="rich-list-append"><button
                                                class="btn btn-sm btn-label-primary">Follow</button></div>
                                    </div>
                                </div>
                                <div class="flex-column align-items-stretch">
                                    <div class="rich-list-item">
                                        <div class="rich-list-prepend">
                                            <div class="avatar avatar-xs">
                                                <div class=""><img src="{{ URL::asset('build/images/users/avatar-4.png') }}"
                                                        alt="Avatar image" class="avatar-2xs" /></div>
                                            </div>
                                        </div>
                                        <div class="rich-list-content">
                                            <h4 class="rich-list-title mb-1">Brielle Williamson</h4>
                                            <p class="rich-list-subtitle mb-0">Integration Specialist</p>
                                        </div>
                                        <div class="rich-list-append"><button
                                                class="btn btn-sm btn-label-primary">Follow</button></div>
                                    </div>
                                </div>
                                <div class="flex-column align-items-stretch">
                                    <div class="rich-list-item">
                                        <div class="rich-list-prepend">
                                            <div class="avatar avatar-xs">
                                                <div class=""><img src="{{ URL::asset('build/images/users/avatar-6.png') }}"
                                                        alt="Avatar image" class="avatar-2xs" /></div>
                                            </div>
                                        </div>
                                        <div class="rich-list-content">
                                            <h4 class="rich-list-title mb-1">Sonya Frost</h4>
                                            <p class="rich-list-subtitle mb-0">Software Engineer</p>
                                        </div>
                                        <div class="rich-list-append"><button
                                                class="btn btn-sm btn-label-primary">Follow</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar avatar-xs avatar-label-danger">
                                    <i class="fas fa-chart-line fs-18"></i>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <h4 class="fs-14 mb-1">Total Earning</h4>
                                    <p class="text-muted fs-12 mb-0">From previous period</p>
                                </div>
                                <p class="text-muted mb-0">5,40,549</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar avatar-xs avatar-label-info">
                                    <i class="fas fa-crown fs-16"></i>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <h4 class="fs-14 mb-1">Sales</h4>
                                    <p class="text-muted fs-12 mb-0">From previous period</p>
                                </div>
                                <p class="text-muted mb-0">1,205,677</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar avatar-xs avatar-label-warning">
                                    <i class="fas fa-chart-bar fs-18"></i>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <h4 class="fs-14 mb-1">Purchase</h4>
                                    <p class="text-muted fs-12 mb-0">From previous period</p>
                                </div>
                                <p class="text-muted mb-0">48,430,039</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Project Pipeline</h4>
                </div>
                <div class="card-body">
                    <div class="progress" style="height:15px;">
                        <div class="progress-bar" style="width: 12%"></div>
                        <div class="progress-bar bg-danger" style="width: 18%"></div>
                        <div class="progress-bar bg-success" style="width: 20%"></div>
                        <div class="progress-bar bg-warning" style="width: 24%"></div>
                        <div class="progress-bar bg-info rounded-end-pill" style="width: 10%"></div>
                    </div>
                    <div class="hstack gap-4 mt-3">
                        <div>
                            <h6 class="fs-12 mb-0"><i class="fas fa-circle text-primary fs-10 me-2"></i>Working</h6>
                        </div>
                        <div>
                            <h6 class="fs-12 mb-0"><i class="fas fa-circle text-danger fs-10 me-2"></i>Pending</h6>
                        </div>
                        <div>
                            <h6 class="fs-12 mb-0"><i class="fas fa-circle text-success fs-10 me-2"></i>In progress</h6>
                        </div>
                        <div>
                            <h6 class="fs-12 mb-0"><i class="fas fa-circle text-warning fs-10 me-2"></i>Blocked</h6>
                        </div>
                        <div>
                            <h6 class="fs-12 mb-0"><i class="fas fa-circle text-info fs-10 me-2"></i>Remaining</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <div class="card-icon text-muted"><i class="fa fa-users-cog fs-14"></i></div>
                    <h3 class="card-title">Human resources</h3>
                    <div class="card-addon">
                        <div class="nav nav-pills card-nav" id="user-tab">
                            <a class="nav-item nav-link active" id="user-manager-tab" data-bs-toggle="tab"
                                href="#user-manager">Manager</a>
                            <a class="nav-item nav-link" id="user-employee-tab" data-bs-toggle="tab"
                                href="#user-employee">Employee</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0" id="user-tabContent">
                        <div class="tab-pane fade show active" id="user-manager">
                            <div class="rich-list">
                                <div class="rich-list-item">
                                    <div class="row g-2 w-100">
                                        <div class="col-lg-5">
                                            <div class="rich-list-item p-0">
                                                <div class="rich-list-prepend">
                                                    <div class="avatar avatar-circle avatar-xs">
                                                        <div class=""><img src="{{ URL::asset('build/images/users/avatar-1.png') }}"
                                                                alt="Avatar image" class="avatar-2xs" /></div>
                                                    </div>
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">Rhona Davidson</h4>
                                                    <p class="rich-list-subtitle mb-0">Javascript Developer, Tokyo</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex align-items-center">
                                            <div class="flex-grow-1 me-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="">Progress</h6>
                                                    <span class="text-muted">35%</span>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 35%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-end">
                                                <a href="#" class="btn btn-sm btn-label-primary">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="row g-2 w-100">
                                        <div class="col-lg-5">
                                            <div class="rich-list-item p-0">
                                                <div class="rich-list-prepend">
                                                    <div class="avatar avatar-circle avatar-xs">
                                                        <div class=""><img src="{{ URL::asset('build/images/users/avatar-2.png') }}"
                                                                alt="Avatar image" class="avatar-2xs" /></div>
                                                    </div>
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">Timothy Mooney</h4>
                                                    <p class="rich-list-subtitle mb-0">Office Manage, San Francisco</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex align-items-center">
                                            <div class="flex-grow-1 me-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="">Progress</h6>
                                                    <span class="text-muted">55%</span>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 55%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-end">
                                                <a href="#" class="btn btn-sm btn-label-primary">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="row g-2 w-100">
                                        <div class="col-lg-5">
                                            <div class="rich-list-item p-0">
                                                <div class="rich-list-prepend">
                                                    <div class="avatar avatar-circle avatar-xs">
                                                        <div class=""><img src="{{ URL::asset('build/images/users/avatar-7.png') }}"
                                                                alt="Avatar image" class="avatar-2xs" /></div>
                                                    </div>
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">Jackson Bradshaw</h4>
                                                    <p class="rich-list-subtitle mb-0">Regional Director, San Francisco</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex align-items-center">
                                            <div class="flex-grow-1 me-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="">Progress</h6>
                                                    <span class="text-muted">75%</span>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 75%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-end">
                                                <a href="#" class="btn btn-sm btn-label-primary">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="row g-2 w-100">
                                        <div class="col-lg-5">
                                            <div class="rich-list-item p-0">
                                                <div class="rich-list-prepend">
                                                    <div class="avatar avatar-circle avatar-xs">
                                                        <div class=""><img src="{{ URL::asset('build/images/users/avatar-6.png') }}"
                                                                alt="Avatar image" class="avatar-2xs" /></div>
                                                    </div>
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">Brielle Williamson</h4>
                                                    <p class="rich-list-subtitle mb-0">Integration Specialist, New York</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex align-items-center">
                                            <div class="flex-grow-1 me-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="">Progress</h6>
                                                    <span class="text-muted">60%</span>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-end">
                                                <a href="#" class="btn btn-sm btn-label-primary">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="row g-2 w-100">
                                        <div class="col-lg-5">
                                            <div class="rich-list-item p-0">
                                                <div class="rich-list-prepend">
                                                    <div class="avatar avatar-circle avatar-xs">
                                                        <div class=""><img src="{{ URL::asset('build/images/users/avatar-5.png') }}"
                                                                alt="Avatar image" class="avatar-2xs" /></div>
                                                    </div>
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">Prescott Bartlett</h4>
                                                    <p class="rich-list-subtitle mb-0">Technical Author, London</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex align-items-center">
                                            <div class="flex-grow-1 me-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="">Progress</h6>
                                                    <span class="text-muted">85%</span>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 85%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-end">
                                                <a href="#" class="btn btn-sm btn-label-primary">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="user-employee">
                            <div class="rich-list">
                                <div class="rich-list-item">
                                    <div class="row g-2 w-100">
                                        <div class="col-lg-5">
                                            <div class="rich-list-item p-0">
                                                <div class="rich-list-prepend">
                                                    <div class="avatar avatar-circle avatar-xs">
                                                        <div class=""><img src="{{ URL::asset('build/images/users/avatar-2.png') }}"
                                                                alt="Avatar image" class="avatar-2xs" /></div>
                                                    </div>
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">Timothy Mooney</h4>
                                                    <p class="rich-list-subtitle mb-0">Office Manage, San Francisco</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex align-items-center">
                                            <div class="flex-grow-1 me-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="">Progress</h6>
                                                    <span class="text-muted">55%</span>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 55%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-end">
                                                <a href="#" class="btn btn-sm btn-label-primary">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="row g-2 w-100">
                                        <div class="col-lg-5">
                                            <div class="rich-list-item p-0">
                                                <div class="rich-list-prepend">
                                                    <div class="avatar avatar-circle avatar-xs">
                                                        <div class=""><img src="{{ URL::asset('build/images/users/avatar-5.png') }}"
                                                                alt="Avatar image" class="avatar-2xs" /></div>
                                                    </div>
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">Prescott Bartlett</h4>
                                                    <p class="rich-list-subtitle mb-0">Technical Author, London</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex align-items-center">
                                            <div class="flex-grow-1 me-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="">Progress</h6>
                                                    <span class="text-muted">85%</span>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 85%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-end">
                                                <a href="#" class="btn btn-sm btn-label-primary">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="row g-2 w-100">
                                        <div class="col-lg-5">
                                            <div class="rich-list-item p-0">
                                                <div class="rich-list-prepend">
                                                    <div class="avatar avatar-circle avatar-xs">
                                                        <div class=""><img src="{{ URL::asset('build/images/users/avatar-4.png') }}"
                                                                alt="Avatar image" class=" avatar-2xs" /></div>
                                                    </div>
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">Rhona Davidson</h4>
                                                    <p class="rich-list-subtitle mb-0">Javascript Developer, Tokyo</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex align-items-center">
                                            <div class="flex-grow-1 me-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="">Progress</h6>
                                                    <span class="text-muted">35%</span>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 35%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-end">
                                                <a href="#" class="btn btn-sm btn-label-primary">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="row g-2 w-100">
                                        <div class="col-lg-5">
                                            <div class="rich-list-item p-0">
                                                <div class="rich-list-prepend">
                                                    <div class="avatar avatar-circle avatar-xs">
                                                        <div class=""><img src="{{ URL::asset('build/images/users/avatar-6.png') }}"
                                                                alt="Avatar image" class="avatar-2xs" /></div>
                                                    </div>
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">Brielle Williamson</h4>
                                                    <p class="rich-list-subtitle mb-0">Integration Specialist, New York</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex align-items-center">
                                            <div class="flex-grow-1 me-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="">Progress</h6>
                                                    <span class="text-muted">60%</span>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-end">
                                                <a href="#" class="btn btn-sm btn-label-primary">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="row g-2 w-100">
                                        <div class="col-lg-5">
                                            <div class="rich-list-item p-0">
                                                <div class="rich-list-prepend">
                                                    <div class="avatar avatar-circle avatar-xs">
                                                        <div class=""><img src="{{ URL::asset('build/images/users/avatar-7.png') }}"
                                                                alt="Avatar image" class="avatar-2xs" /></div>
                                                    </div>
                                                </div>
                                                <div class="rich-list-content">
                                                    <h4 class="rich-list-title mb-1">Jackson Bradshaw</h4>
                                                    <p class="rich-list-subtitle mb-0">Regional Director, San Francisco</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 d-flex align-items-center">
                                            <div class="flex-grow-1 me-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="">Progress</h6>
                                                    <span class="text-muted">75%</span>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary" style="width: 75%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="text-end">
                                                <a href="#" class="btn btn-sm btn-label-primary">Follow</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-icon text-muted"><i class="fas fa-sync-alt fs-14"></i></div>
                    <h3 class="card-title">Order progress</h3>
                    <div class="card-addon dropdown">
                        <button class="btn btn-label-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown"> <i
                                class="fas fa-filter fs-12 align-middle ms-1"></i></button>
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
                    <div class="table-responsive">
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
                                    <td class="align-middle"><i class="marker marker-dot m-0 me-2 text-primary"></i>
                                        Arrived</td>
                                    <td class="align-middle">
                                        <div class="avatar-group">
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-1.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-2.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-3.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-4.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-5.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
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
                                    <td class="align-middle"><i class="marker marker-dot m-0 me-2 text-danger"></i>
                                        Pending</td>
                                    <td class="align-middle">
                                        <div class="avatar-group">
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-6.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-7.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-8.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
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
                                    <td class="align-middle"><i class="marker marker-dot m-0 me-2 text-success"></i>
                                        Moving</td>
                                    <td class="align-middle">
                                        <div class="avatar-group">
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-5.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-4.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-1.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-2.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
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
                                    <td class="align-middle"><i class="marker marker-dot m-0 me-2 text-warning"></i> Hold
                                    </td>
                                    <td class="align-middle">
                                        <div class="avatar-group">
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-3.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-4.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-5.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
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
                                    <td class="align-middle"><i class="marker marker-dot m-0 me-2 text-success"></i>
                                        Moving</td>
                                    <td class="align-middle">
                                        <div class="avatar-group">
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-6.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-7.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-8.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
                                            </div>
                                            <div class="avatar avatar-circle">
                                                <img src="{{ URL::asset('build/images/users/avatar-5.png') }}" alt="Avatar image"
                                                    class="avatar-2xs">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4">
            <div class="row">
                <div class="col-xxl-12 col-xl-6">
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
                                                data-bs-toggle="dropdown"><i
                                                    class="fa fa-ellipsis-h fs-12"></i></button>
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
                                        <div class="avatar avatar-xs avatar-label-warning">
                                            <div class=""><i class="fa fa-paper-plane"></i></div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title mb-1">New feedback received</h4>
                                        <p class="rich-list-subtitle mb-0">6 hrs ago</p>
                                    </div>
                                    <div class="rich-list-append">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-label-secondary btn-icon"
                                                data-bs-toggle="dropdown"><i
                                                    class="fa fa-ellipsis-h fs-12"></i></button>
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
                <div class="col-xxl-12 col-xl-6">
                    <div class="card"
                        style="background: url('build/images/widgets-shape.png'); background-position: center left; background-repeat: no-repeat; background-size: auto;">
                        <div class="bg-overlay bg-info rounded z-n1"></div>
                        <div class="card-body">
                            <div class="row justify-content-end">
                                <div class="col-5">
                                    <h5 class="text-white fs-16 mb-3 z-1">Need for some help?</h5>
                                    <button class="btn btn-info">Contact Here</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card"
                        style="background: url('build/images/widgets-shape2.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
                        <div class="bg-overlay bg-danger-subtle"></div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h4 class="fs-16 mb-1">You have bonus, Anthony! </h4>
                                    <p class="text-muted mb-0">We have s gift for you - 3 days for free!</p>
                                    <button class="btn btn-danger mt-4">Active Bonus</button>
                                </div>
                                <div class="col-5">
                                    <img src="{{ URL::asset('build/images/widgets-2.png') }}" alt="" class="img-fluid">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12 col-xl-6">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <div class="card-icon text-muted"><i class="fas fa-coins fs-14"></i></div>
                            <h4 class="card-title"> Monthly income</h4>
                            <p class="card-addon rich-list-subtitle text-success mb-0">+15%</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="rich-list-title mb-0">Total</h5>
                                    <p class="rich-list-subtitle mb-0">$65,880</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="rich-list-title mb-0">Sales</h5>
                                    <p class="rich-list-subtitle mb-0">554</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <div class="card-icon text-muted"><i class="fas fa-archive fs-14"></i></div>
                            <h4 class="card-title">Employee amount</h4>
                            <p class="card-addon rich-list-subtitle text-success mb-0">-2%</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="rich-list-title mb-0">Total</h5>
                                    <p class="rich-list-subtitle mb-0">$1250</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="rich-list-title mb-0">Active</h5>
                                    <p class="rich-list-subtitle mb-0">1120</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-xl-6">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <div class="card-icon text-muted"><i class="fas fa-chart-bar fs-14"></i></div>
                            <h4 class="card-title">Product sales</h4>
                            <p class="card-addon rich-list-subtitle text-success mb-0">+10%</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="rich-list-title mb-0">Total</h5>
                                    <p class="rich-list-subtitle mb-0">$2350</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="rich-list-title mb-0">Last report</h5>
                                    <p class="rich-list-subtitle mb-0">2220</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <div class="card-icon text-muted"><i class="fas fa-calendar-alt fs-14"></i></div>
                            <h4 class="card-title">Monthly profit</h4>
                            <p class="card-addon rich-list-subtitle text-success mb-0">+10%</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="rich-list-title mb-0">Total</h5>
                                    <p class="rich-list-subtitle mb-0">$502,100
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="rich-list-title mb-0">Last month</h5>
                                    <p class="rich-list-subtitle mb-0">$453,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="card">
                <div class="card-header card-header-bordered">
                    <div class="card-icon text-muted"><i class="fa fa-clipboard-list fs-14"></i></div>
                    <h3 class="card-title">Recent activities</h3>
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
                                            <img src="{{ URL::asset('build/images/users/avatar-1.png') }}" alt="Avatar image"
                                                class="avatar-2xs" />
                                        </div>
                                        <div class="avatar avatar-circle">
                                            <img src="{{ URL::asset('build/images/users/avatar-2.png') }}" alt="Avatar image"
                                                class="avatar-2xs" />
                                        </div>
                                        <div class="avatar avatar-circle">
                                            <img src="{{ URL::asset('build/images/users/avatar-3.png') }}" alt="Avatar image"
                                                class="avatar-2xs" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-time">12:45</span>
                            <div class="timeline-pin"><i class="marker marker-circle text-warning"></i></div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                    labore et dolore magna elit enim at minim veniam quis nostrud</p>
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
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                    labore et dolore magna.</p>
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
            <div class="card">
                <div class="card-header">
                    <div class="card-icon text-muted"><i class="fa fa-list-alt"></i></div>
                    <h3 class="card-title">Lastest log</h3>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-primary"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">12 new users registered</p>
                                    <span class="text-muted">Just now</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-success"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">System shutdown <span
                                            class="badge badge-label-success">pending</span></p>
                                    <span class="text-muted">2 mins</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-primary"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">New invoice received</p>
                                    <span class="text-muted">3 mins</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-danger"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">New order received <span
                                            class="badge badge-label-danger">urgent</span></p>
                                    <span class="text-muted">10 mins</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-warning"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">Production server down</p>
                                    <span class="text-muted">1 hrs</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-info"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">System error <a href="#">check</a></p>
                                    <span class="text-muted">2 hrs</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-secondary"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">DB overloaded 80%</p>
                                    <span class="text-muted">5 hrs</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin"><i class="marker marker-dot text-success"></i></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">Production server up</p>
                                    <span class="text-muted">6 hrs</span>
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
