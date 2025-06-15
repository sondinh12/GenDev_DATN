@extends('layouts.master')

@section('title')
    Kanban Board
@endsection

@section('topbar-title')
    Apps
@endsection

@section('css')
    <!-- Dragula css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/dragula/dist/dragula.min.css') }}" />
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-auto">
                    <div class="search-box">
                        <input type="text" class="form-control search" id="search-task-options"
                            placeholder="Search for project, tasks...">
                        <i class="fab fa-sistrix search-icon"></i>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-auto ms-sm-auto">
                    <div class="hstack gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createboardModal"><i
                                class="ri-add-line align-bottom me-1"></i> New Board</button>
                    </div>
                </div>
                <!--end col-->

            </div>
            <!--end row-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->

    <div class="row">
        <div class="col-xl-9">
            <div class="tasks-board mb-3" id="kanbanboard">
                <div class="tasks-list">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">started</h6>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-2xs bg-success text-white text-center rounded-2">
                                <i class="mdi mdi-plus-thick align-middle lh-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                        <div id="unassigned-task" class="tasks">
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div>
                                            <span class="badge badge-label-danger">Web Design</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink1"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-edit-2-line align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        href="#deleteRecordModal"><i
                                                            class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">Wire framing, mockups, clients collaboration.</p>

                                    <div class="mb-3">
                                        <h6 class="text-muted text-end mb-2"><span class="text-secondary">15%</span></h6>
                                        <div class="progress rounded-3 progress-sm">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 15%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <div class="avatar-group avatar-group-sm">
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                                    title="Alexis">
                                                    <img src="{{ URL::asset('build/images/users/avatar-6.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                                    title="Nancy">
                                                    <img src="{{ URL::asset('build/images/users/avatar-4.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-question-answer-line align-bottom"></i> 19</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-attachment-2 align-bottom"></i> 02</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div>
                                            <span class="badge badge-label-warning">App development</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink2"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-edit-2-line align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        href="#deleteRecordModal"><i
                                                            class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">Profile Page means a web page accessible to the public or to
                                        guests.</p>

                                    <div class="mb-3">
                                        <h6 class="text-muted text-end mb-2"><span class="text-secondary">56%</span></h6>
                                        <div class="progress rounded-3 progress-sm">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 56%"
                                                aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <div class="avatar-group avatar-group-sm">
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Alexis">
                                                    <img src="{{ URL::asset('build/images/users/avatar-1.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Nancy">
                                                    <img src="{{ URL::asset('build/images/users/avatar-2.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Nancy">
                                                    <span class="fs-16 mt-1">+</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-question-answer-line align-bottom"></i> 11</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-attachment-2 align-bottom"></i> 05</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end tasks-->
                    </div>
                    <div class="my-3">
                        <button class="btn btn-label-info w-100" data-bs-toggle="modal"
                            data-bs-target="#creatertaskModal">Add More</button>
                    </div>
                </div>
                <!--end tasks-list-->
                <div class="tasks-list">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">On Going</h6>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-2xs bg-success text-white text-center rounded-2">
                                <i class="mdi mdi-plus-thick align-middle lh-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                        <div id="todo-task" class="tasks">
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div>
                                            <span class="badge badge-label-info">Mobile App</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink3"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-edit-2-line align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        href="#deleteRecordModal"><i
                                                            class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">Landing page template with clean, minimal and modern design.</p>

                                    <div class="mb-3">
                                        <h6 class="text-muted text-end mb-2"><span class="text-secondary">30%</span></h6>
                                        <div class="progress rounded-3 progress-sm">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 30%"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <div class="avatar-group avatar-group-sm">
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Alexis">
                                                    <img src="{{ URL::asset('build/images/users/avatar-2.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Nancy">
                                                    <img src="{{ URL::asset('build/images/users/avatar-1.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Nancy">
                                                    <img src="{{ URL::asset('build/images/users/avatar-4.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Nancy">
                                                    <span class="fs-16 mt-1">+</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-question-answer-line align-bottom"></i> 06</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-attachment-2 align-bottom"></i> 03</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div>
                                            <span class="badge badge-label-success">Dashboard</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink4"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-edit-2-line align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        href="#deleteRecordModal"><i
                                                            class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">Sales and marketing are two business functions within an
                                        organization.</p>

                                    <div class="mb-3">
                                        <span class="badge badge-label-secondary">Logo</span>
                                        <span class="badge badge-label-secondary">Layout</span>
                                        <span class="badge badge-label-secondary">Admin</span>
                                    </div>

                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <div class="avatar-group avatar-group-sm">
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Alexis">
                                                    <img src="{{ URL::asset('build/images/users/avatar-3.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-question-answer-line align-bottom"></i> 08</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-attachment-2 align-bottom"></i> 10</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-label-info w-100" data-bs-toggle="modal"
                            data-bs-target="#creatertaskModal">Add More</button>
                    </div>
                </div>
                <!--end tasks-list-->

                <div class="tasks-list">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h6 class="fs-14 text-uppercase fw-semibold mb-0">Completed</h6>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-2xs bg-success text-white text-center rounded-2">
                                <i class="mdi mdi-plus-thick align-middle lh-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                        <div id="inprogress-task" class="tasks">
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div>
                                            <span class="badge badge-label-warning">Web Development</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink5"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink5">
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-edit-2-line align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        href="#deleteRecordModal"><i
                                                            class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">Change app icons on Android: How do you change the look of your
                                        apps.</p>

                                    <div class="mb-3">
                                        <h6 class="text-muted text-end mb-2"><span class="text-secondary">90%</span></h6>
                                        <div class="progress rounded-3 progress-sm">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <span class="badge badge-label-secondary">Logo</span>
                                        <span class="badge badge-label-secondary">Layout</span>
                                        <span class="badge badge-label-secondary">Admin</span>
                                    </div>

                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <div class="avatar-group avatar-group-sm">
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Alexis">
                                                    <img src="{{ URL::asset('build/images/users/avatar-5.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Nancy">
                                                    <img src="{{ URL::asset('build/images/users/avatar-2.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-question-answer-line align-bottom"></i> 08</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-attachment-2 align-bottom"></i> 07</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                            <div class="card tasks-box">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div>
                                            <span class="badge badge-label-dark">Landing Page</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink6"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="ri-more-fill"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink6">
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#!"><i
                                                            class="ri-edit-2-line align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        href="#deleteRecordModal"><i
                                                            class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i>
                                                        Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="text-muted">An essential part of strategic planning is running a product
                                        feature analysis.</p>

                                    <div class="mb-3">
                                        <h6 class="text-muted text-end mb-2"><span class="text-secondary">70%</span></h6>
                                        <div class="progress rounded-3 progress-sm">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <div class="avatar-group avatar-group-sm">
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Alexis">
                                                    <img src="{{ URL::asset('build/images/users/avatar-6.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                                <a href="javascript: void(0);" class="avatar avatar-circle"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Nancy">
                                                    <img src="{{ URL::asset('build/images/users/avatar-4.png') }}" alt=""
                                                        class="rounded-circle avatar-2xs">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="link-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-question-answer-line align-bottom"></i> 12</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" class="text-muted"><i
                                                            class="ri-attachment-2 align-bottom"></i> 09</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-label-info w-100" data-bs-toggle="modal"
                            data-bs-target="#creatertaskModal">Add More</button>
                    </div>
                </div>
                <!--end tasks-list-->
            </div>
            <!--end task-board-->
        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="bg-primary bg-opacity-10 p-3 d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1">Selected</p>
                            <h4 class="fs-5">Design Team</h4>
                        </div>
                        <div class="flex-shrink-0">
                            <div
                                class="avatar-md rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-account-group fs-1"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div id="gradient_radialbar" data-colors='["--bs-success"]' class="apex-charts" dir="ltr">
                        </div>
                    </div>

                    <div class="mt-3">
                        <h4 class="fs-5">Projects</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="bg-info-subtle p-3 rounded-3">
                                    <p class="text-muted mb-1">TOTAL</p>
                                    <h5 class=""><span
                                            class="border-start border-info border-4 me-2 rounded"></span> 144</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-danger-subtle p-3 rounded-3">
                                    <p class="text-muted mb-1">COMPLETED</p>
                                    <h5 class=""><span
                                            class="border-start border-danger border-4 me-2 rounded"></span> 56</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-success-subtle p-3 rounded-3">
                                    <p class="text-muted mb-1">IN PROGRESS</p>
                                    <h5 class=""><span
                                            class="border-start border-success border-4 me-2 rounded"></span> 72</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-warning-subtle p-3 rounded-3">
                                    <p class="text-muted mb-1">WAITING</p>
                                    <h5 class=""><span
                                            class="border-start border-warning border-4 me-2 rounded"></span> 24</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="d-flex align-items-center justify-content-between border p-3 rounded">
                            <div class="d-flex align-items-center">
                                <div
                                    class="avatar-xs bg-danger d-flex align-items-center justify-content-center rounded flex-shrink-0">
                                    <i class="mdi mdi-clock-time-eight-outline fs-22 text-white mt-1"></i>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <p class="text-muted mb-1">Sunday 3, June</p>
                                    <h5 class="fs-13 mb-0">08:00-11:00</h5>
                                </div>
                            </div>
                            <div class="">
                                <i class="mdi mdi-grease-pencil fs-20"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border p-3 rounded mt-3">
                            <div class="d-flex align-items-center">
                                <div
                                    class="avatar-xs bg-info d-flex align-items-center justify-content-center rounded flex-shrink-0">
                                    <i class="mdi mdi-message-processing-outline fs-22 text-white mt-1"></i>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <p class="text-muted mb-1">Thursday 15, June</p>
                                    <h5 class="fs-13 mb-0">Internal message</h5>
                                </div>
                            </div>
                            <div class="">
                                <i class="mdi mdi-read fs-20"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addmemberModal" tabindex="-1" aria-labelledby="addmemberModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-warning">
                    <h5 class="modal-title" id="addmemberModalLabel">Add Member</h5>
                    <button type="button" class="btn-close" id="btn-close-member" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label for="submissionidInput" class="form-label">Submission ID</label>
                                <input type="number" class="form-control" id="submissionidInput"
                                    placeholder="Submission ID">
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="profileimgInput" class="form-label">Profile Images</label>
                                <input class="form-control" type="file" id="profileimgInput">
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <label for="firstnameInput" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstnameInput"
                                    placeholder="Enter firstname">
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <label for="lastnameInput" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastnameInput"
                                    placeholder="Enter lastname">
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="designationInput" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="designationInput"
                                    placeholder="Designation">
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="titleInput" class="form-label">Title</label>
                                <input type="text" class="form-control" id="titleInput" placeholder="Title">
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <label for="numberInput" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="numberInput" placeholder="Phone number">
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <label for="joiningdateInput" class="form-label">Joining Date</label>
                                <input type="text" class="form-control" id="joiningdateInput"
                                    data-provider="flatpickr" placeholder="Select date">
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="emailInput" class="form-label">Email ID</label>
                                <input type="email" class="form-control" id="emailInput" placeholder="Email">
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i
                            class="ri-close-line align-bottom me-1"></i> Close</button>
                    <button type="button" class="btn btn-success" id="addMember">Add Member</button>
                </div>
            </div>
        </div>
    </div>
    <!--end add member modal-->

    <div class="modal fade" id="createboardModal" tabindex="-1" aria-labelledby="createboardModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="createboardModalLabel">Add Board</h5>
                    <button type="button" class="btn-close" id="addBoardBtn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="boardName" class="form-label">Board Name</label>
                                <input type="text" class="form-control" id="boardName"
                                    placeholder="Enter board name">
                            </div>
                            <div class="mt-4">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="addNewBoard">Add Board</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end add board modal-->

    <div class="modal fade" id="creatertaskModal" tabindex="-1" aria-labelledby="creatertaskModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="creatertaskModalLabel">Create New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label for="projectName" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="projectName"
                                    placeholder="Enter project name">
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="sub-tasks" class="form-label">Task Title</label>
                                <input type="text" class="form-control" id="sub-tasks" placeholder="Task title">
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="task-description" class="form-label">Task Description</label>
                                <textarea class="form-control" id="task-description" rows="3" placeholder="Task description"></textarea>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="formFile" class="form-label">Tasks Images</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="tasks-progress" class="form-label">Add Team Member</label>
                                <div data-simplebar style="height: 95px;">
                                    <ul class="list-unstyled vstack gap-2 mb-0">
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value=""
                                                    id="anna-adame">
                                                <label class="form-check-label d-flex align-items-center"
                                                    for="anna-adame">
                                                    <span class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/users/avatar-1.png') }}" alt=""
                                                            class="avatar avatar-2xs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Anna Adame
                                                    </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value=""
                                                    id="frank-hook">
                                                <label class="form-check-label d-flex align-items-center"
                                                    for="frank-hook">
                                                    <span class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/users/avatar-3.png') }}" alt=""
                                                            class="avatar avatar-2xs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Frank Hook
                                                    </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value=""
                                                    id="alexis-clarke">
                                                <label class="form-check-label d-flex align-items-center"
                                                    for="alexis-clarke">
                                                    <span class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/users/avatar-6.png') }}" alt=""
                                                            class="avatar avatar-2xs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Alexis Clarke
                                                    </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value=""
                                                    id="herbert-stokes">
                                                <label class="form-check-label d-flex align-items-center"
                                                    for="herbert-stokes">
                                                    <span class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/users/avatar-2.png') }}" alt=""
                                                            class="avatar avatar-2xs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Herbert Stokes
                                                    </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value=""
                                                    id="michael-morris">
                                                <label class="form-check-label d-flex align-items-center"
                                                    for="michael-morris">
                                                    <span class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/users/avatar-7.png') }}" alt=""
                                                            class="avatar avatar-2xs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Michael Morris
                                                    </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value=""
                                                    id="nancy-martino">
                                                <label class="form-check-label d-flex align-items-center"
                                                    for="nancy-martino">
                                                    <span class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/users/avatar-5.png') }}" alt=""
                                                            class="avatar avatar-2xs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Nancy Martino
                                                    </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value=""
                                                    id="thomas-taylor">
                                                <label class="form-check-label d-flex align-items-center"
                                                    for="thomas-taylor">
                                                    <span class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/users/avatar-8.png') }}" alt=""
                                                            class="avatar avatar-2xs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Thomas Taylor
                                                    </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value=""
                                                    id="tonya-noble">
                                                <label class="form-check-label d-flex align-items-center"
                                                    for="tonya-noble">
                                                    <span class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/users/avatar-1.png') }}" alt=""
                                                            class="avatar avatar-2xs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Tonya Noble
                                                    </span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <label for="due-date" class="form-label">Due Date</label>
                                <input type="text" class="form-control" id="due-date" data-provider="flatpickr"
                                    placeholder="Select date">
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <label for="categories" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="categories" placeholder="Enter tag">
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <label for="tasks-progress" class="form-label">Tasks Progress</label>
                                <input type="text" class="form-control" maxlength="3" id="tasks-progress"
                                    placeholder="Enter progress">
                            </div>
                            <!--end col-->
                            <div class="mt-4">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success">Add Task</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end add board modal-->

    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="delete-btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this tasks ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end modal -->
@endsection

@section('scripts')
    <!-- dragula init js -->
    <script src="{{ URL::asset('build/libs/dragula/dist/dragula.min.js') }}"></script>
    <!-- dom autoscroll -->
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dist/dom-autoscroller.min.js') }}"></script>
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <!--taks-kanban-->
    <script src="{{ URL::asset('build/js/pages/kanban.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
