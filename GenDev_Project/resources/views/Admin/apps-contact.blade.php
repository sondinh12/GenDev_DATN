@extends('layouts.master')

@section('title')
    Contact
@endsection

@section('topbar-title')
    Apps
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3">
            <div class="card overflow-hidden">
                <div class="bg-primary-subtle">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="text-primary p-3 mb-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="mb-0">It will seem like simplified</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="align-self-end">
                                <img src="{{ URL::asset('build/images/contact.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row align-items-end">
                        <div class="col-sm-4">
                            <div class="avatar-md mb-3 mt-n4">
                                <img src="{{ URL::asset('build/images/users/avatar-6.png') }}" alt=""
                                    class="img-fluid avatar-circle bg-light p-2 border-2 border-primary">
                            </div>
                            <h5 class="fs-16 mb-1 text-truncate">Charlie Stone</h5>
                            <p class="text-muted mb-0 text-truncate">UI/UX Designer</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="row ms-3">
                                <div class="col-6">
                                    <h5 class="fs-15 mb-1">125</h5>
                                    <p class="text-muted mb-0">Projects</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="fs-15 mb-1">$1245</h5>
                                    <p class="text-muted mb-0">Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h4 class="card-title mb-4">About</h4>
                    <p class="text-muted mb-4">Hi I'm Charlie Stone,has been the industry's standard dummy text To an
                        English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                    <div class="table-responsive">
                        <table class="table table-nowrap table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="mdi mdi-account align-middle text-primary me-2"></i> Full
                                        Name :</th>
                                    <td>Charlie Stone</td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="mdi mdi-cellphone align-middle text-primary me-2"></i>
                                        Mobile :</th>
                                    <td>(123) 123 1234</td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="mdi mdi-email text-primary me-2"></i> E-mail :</th>
                                    <td>cynthiaskote@gmail.com</td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="mdi mdi-google-maps text-primary me-2"></i> Location :</th>
                                    <td>California, United States</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h4 class="card-title mb-4">Experience</h4>
                    <div class="">
                        <ul class="verti-timeline list-unstyled">
                            <li class="active mb-3">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="mdi mdi-server h4 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="fs-15 mb-1"><a href="javascript: void(0);" class="text-body">Back end
                                                    Developer</a></h5>
                                            <span class="text-muted">2016 - 19</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="mdi mdi-code-tags h4 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="fs-15 mb-1"><a href="javascript: void(0);" class="text-body">Front
                                                    end Developer</a></h5>
                                            <span class="text-muted">2013 - 16</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="mdi mdi-comment-edit-outline h4 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="fs-15 mb-1"><a href="javascript: void(0);" class="text-body">UI /UX
                                                    Designer</a></h5>
                                            <span class="text-muted">2011 - 13</span>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- end card -->


        </div>

        <div class="col-xl-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Activity</h4>
                </div>
                <div class="card-body">

                    <div id="column_rotated_labels" data-colors='["--bs-primary"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 align-self-center">
                                    <div
                                        class="avatar-sm rounded bg-info-subtle text-info d-flex align-items-center justify-content-center">
                                        <span class="avatar-title">
                                            <i class="mdi mdi-check-circle-outline fs-24"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-muted fw-medium mb-2">Completed Projects</p>
                                    <h4 class="mb-0">125</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 align-self-center">
                                    <div
                                        class="avatar-sm rounded bg-warning-subtle text-warning d-flex align-items-center justify-content-center">
                                        <span class="avatar-title">
                                            <i class="mdi mdi-timer-sand fs-24"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-muted fw-medium mb-2">Pending Projects</p>
                                    <h4 class="mb-0">12</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 align-self-center">
                                    <div
                                        class="avatar-sm rounded bg-danger-subtle text-danger d-flex align-items-center justify-content-center">
                                        <span class="">
                                            <i class="mdi mdi-chart-line fs-24"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-muted fw-medium mb-2">Total Revenue</p>
                                    <h4 class="mb-0">$36,524</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Projects</h4>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Projects</th>
                                <th>Start date</th>
                                <th>Deadline</th>
                                <th>Budgets</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Logo Branding</td>
                                <td>2011/04/25</td>
                                <td>15</td>
                                <td>$12</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Dashboard</td>
                                <td>2011/07/25</td>
                                <td>10</td>
                                <td>$23</td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>Pages</td>
                                <td>2009/01/12</td>
                                <td>20</td>
                                <td>$36</td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td>Apps</td>
                                <td>2012/03/29</td>
                                <td>19</td>
                                <td>$42</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <!-- contact init js -->
    <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('build/js/pages/datatables-base.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
