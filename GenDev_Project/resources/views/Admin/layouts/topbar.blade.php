<!-- Start topbar -->
<header id="page-topbar">
    <div class="navbar-header">

        <!-- Logo -->

        <!-- Start Navbar-Brand -->
        <div class="navbar-logo-box">
            <a href="{{ url('index') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="logo-sm-dark" height="20">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="logo-dark" height="18">
                </span>
            </a>

            <a href="{{ url('index') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="logo-sm-light" height="20">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="logo-light" height="18">
                </span>
            </a>

            <button type="button" class="btn btn-sm top-icon sidebar-btn" id="sidebar-btn">
                <i class="mdi mdi-menu-open align-middle fs-19"></i>
            </button>
        </div>
        <!-- End navbar brand -->

        <!-- Start menu -->
        <div class="d-flex justify-content-between menu-sm px-3 ms-auto">
            <div class="d-flex align-items-center gap-2">
                {{-- <div class="dropdown d-none d-lg-block">
                    <button type="button" class="btn btn-primary btn-sm fs-14 d-inline" data-bs-toggle="dropdown">
                        Ứng dụng
                        <i class="mdi mdi-chevron-down align-middle"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-start dropdown-menu-animated">
                        <a href="#" class="dropdown-item">
                            <div class="dropdown-icon"><i class="fa fa-boxes"></i></div>
                            <span class="dropdown-content">Quản lý kho</span>
                            <div class="dropdown-addon"><span class="badge badge-warning rounded-pill">20</span></div>
                        </a>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item">
                                <div class="dropdown-icon"><i class="fa fa-project-diagram"></i></div>
                                <span class="dropdown-content">Quản lý dự án</span>
                                <div class="dropdown-addon"><i class="mdi mdi-chevron-right align-middle"></i></div>
                            </a>
                            <div class="dropdown-submenu-menu dropdown-submenu-end">
                                <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span
                                        class="dropdown-content">Tạo dự án</span> </a>
                                <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span
                                        class="dropdown-content">Xóa dự án</span> </a>
                                <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span
                                        class="dropdown-content">Dự án đang thực hiện</span> </a>
                                <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span
                                        class="dropdown-content">Dự án đã hoàn thành</span> </a>
                                <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span
                                        class="dropdown-content">Dự án khẩn cấp</span></a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item">
                                <div class="dropdown-icon"><i class="fa fa-tasks"></i></div>
                                <span class="dropdown-content">Quản lý công việc</span>
                                <div class="dropdown-addon"><i class="mdi mdi-chevron-right align-middle"></i></div>
                            </a>
                            <div class="dropdown-submenu-menu dropdown-submenu-end">
                                <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span
                                        class="dropdown-content">Xem công việc</span> </a>
                                <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span
                                        class="dropdown-content">Giao việc</span> </a>
                                <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span
                                        class="dropdown-content">Giao thành viên</span> </a>
                                <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span
                                        class="dropdown-content">Công việc đã hoàn thành</span> </a>
                                <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span
                                        class="dropdown-content">Công việc khẩn cấp</span></a>
                            </div>
                        </div>
                        <a href="#" class="dropdown-item">
                            <div class="dropdown-icon"><i class="fa fa-dollar-sign"></i></div>
                            <span class="dropdown-content">Hóa đơn</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('apps-contact') }}" class="dropdown-item">
                            <div class="dropdown-icon"><i class="fa fa-user-cog"></i></div>
                            <span class="dropdown-content">Tài khoản của tôi</span>
                        </a>
                    </div>
                </div>

                <div class="dropdown d-none d-lg-block">
                    <button type="button" class="btn btn-primary btn-sm fs-14" data-bs-toggle="dropdown"
                        aria-haspopup="false" aria-expanded="false">
                        Tính năng
                        <i class="mdi mdi-chevron-down align-middle"></i>
                    </button>
                    <div
                        class="dropdown-menu dropdown-menu-start dropdown-menu-lg-widest dropdown-menu-widest dropdown-menu-animated bg-primary-subtle overflow-hidden">
                        <div class="dropdown-row justify-content-center">
                            <div class="p-2 menu-image">
                                <img src="{{ URL::asset('build/images/mega-menu.png') }}" alt="mega-menu image"
                                    class="img-fluid" style="height: 200px;">
                            </div>
                            <div class="dropdown-col">
                                <h2 class="">Chào mừng trở lại!</h2>
                                <p class="text-muted mb-0">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, commodi hic
                                    qui aspernatur doloremque quos tempora placeat culpa illum, voluptatibus delectus
                                    provident cumque
                                    aliquid enim, laborum aliquam. Quod, perferendis unde.
                                </p>
                                <div class="mt-3">
                                    <!-- <a href="{{ url('auth-login') }}" class="btn btn-dark btn-wider">Đăng nhập</a> -->
                                </div>
                            </div>
                            <div class="dropdown-col border-start border-primary border-opacity-50">
                                <h4 class="dropdown-header">Tính năng</h4>
                                <div class="grid-nav grid-nav-action">
                                    <div class="grid-nav-row">
                                        <a href="{{ url('index') }}" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-window-restore"></i></div>
                                            <span class="grid-nav-content">Bảng điều khiển</span>
                                        </a>
                                        <a href="{{ url('apps-kanban') }}" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-clipboard"></i></div>
                                            <span class="grid-nav-content">Danh sách việc cần làm</span>
                                        </a>
                                        <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-question-circle"></i></div>
                                            <span class="grid-nav-content">Trung tâm trợ giúp</span>
                                        </a>
                                    </div>
                                    <div class="grid-nav-row">
                                        <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-images"></i></div>
                                            <span class="grid-nav-content">Thư viện ảnh</span>
                                        </a>
                                        <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-chart-bar"></i></div>
                                            <span class="grid-nav-content">Bảng scrum</span>
                                        </a>
                                        <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-bookmark"></i></div>
                                            <span class="grid-nav-content">Tài liệu</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-col border-start border-primary border-opacity-50">
                                <h4 class="dropdown-header">Công cụ</h4>
                                <a href="#" class="dropdown-item"><i
                                        class="mdi mdi-checkbox-blank-circle align-middle dropdown-bullet me-2"></i>
                                    <span class="dropdown-content">Thành phần</span> </a>
                                <a href="#" class="dropdown-item"><i
                                        class="mdi mdi-checkbox-blank-circle align-middle dropdown-bullet me-2"></i>
                                    <span class="dropdown-content">Trình hướng dẫn biểu mẫu</span> </a>
                                <a href="#" class="dropdown-item"><i
                                        class="mdi mdi-checkbox-blank-circle align-middle dropdown-bullet me-2"></i>
                                    <span class="dropdown-content">Tài liệu hướng dẫn</span> </a>
                                <a href="#" class="dropdown-item"><i
                                        class="mdi mdi-checkbox-blank-circle align-middle dropdown-bullet me-2"></i>
                                    <span class="dropdown-content">Kiến thức cơ bản</span> </a>
                                <a href="#" class="dropdown-item"><i
                                        class="mdi mdi-checkbox-blank-circle align-middle dropdown-bullet me-2"></i>
                                    <span class="dropdown-content">Quản lý kho</span></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="d-flex align-items-center gap-2">
                <!-- Start Notification -->
                {{-- <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-sm top-icon" id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell align-middle"></i>
                        <span class="btn-marker"><i class="marker marker-dot text-danger"></i><span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-md dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3 bg-info">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-white m-0"><i class="far fa-bell me-2"></i> Thông báo </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="badge bg-info-subtle text-info"> 8+</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-primary me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-file-document-outline"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Báo cáo mới đã được nhận</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 phút trước</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-success me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-cart-variant"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Đơn hàng cuối cùng đã hoàn thành</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 giờ trước</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-danger me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-account-group"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Cuộc họp đã hoàn thành bị hủy</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 5 giờ trước</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-warning me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-send-outline"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Phản hồi mới đã được nhận</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 6 giờ trước</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-secondary me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-download-box"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Có bản cập nhật mới</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 ngày trước</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-xs avatar-label-info me-3">
                                        <span class="rounded fs-16">
                                            <i class="mdi mdi-hexagram-outline"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-1">Mật khẩu của bạn đã được thay đổi</h6>
                                        <div class="fs-12 text-muted">
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 2 ngày trước</p>
                                        </div>
                                    </div>
                                    <i class="mdi mdi-chevron-right align-middle ms-2"></i>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top">
                            <div class="d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> Xem thêm..
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End Notification -->

                <!-- Start Activities -->
                {{-- <div class="d-inline-block activities">
                    <button type="button" class="btn btn-sm top-icon" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvas-rightsidabar">
                        <i class="fas fa-table align-middle"></i>
                    </button>
                </div> --}}
                <!-- End Activities -->

                <!-- Start Profile -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-sm top-icon p-0" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded avatar-2xs p-0"
                            src="{{ Auth::user()->avatar_url ?? asset('build/images/users/avatar-6.png') }}"
                            alt="Header Avatar">
                    </button>
                    <div
                        class="dropdown-menu dropdown-menu-wide dropdown-menu-end dropdown-menu-animated overflow-hidden py-0">
                        <div class="card border-0">
                            <div class="card-header bg-primary rounded-0">
                                <div class="rich-list-item w-100 p-0">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-label-light avatar-circle">
                                            <div class="avatar-display"><i class="fa fa-user-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h3 class="rich-list-title text-white">{{ Auth::user()->name }}</h3>
                                        <span class="rich-list-subtitle text-white">{{ Auth::user()->email }}</span>
                                    </div>
                                    <div class="rich-list-append">
                                        <span class="badge badge-label-light fs-6">
                                            {{ Auth::user()->getRoleNames()->first() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="grid-nav grid-nav-flush grid-nav-action grid-nav-no-rounded">
                                    <div class="grid-nav-row">
                                        {{-- <a href="{{ url('apps-contact') }}" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-address-card"></i></div>
                                            <span class="grid-nav-content">Hồ sơ</span>
                                        </a>
                                        <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-comments"></i></div>
                                            <span class="grid-nav-content">Tin nhắn</span>
                                        </a>
                                        <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-clone"></i></div>
                                            <span class="grid-nav-content">Hoạt động</span>
                                        </a> --}}
                                    </div>
                                    <div class="grid-nav-row">
                                        {{-- <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-calendar-check"></i></div>
                                            <span class="grid-nav-content">Công việc</span>
                                        </a>
                                        <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-sticky-note"></i></div>
                                            <span class="grid-nav-content">Ghi chú</span>
                                        </a>
                                        <a href="#" class="grid-nav-item">
                                            <div class="grid-nav-icon"><i class="far fa-bell"></i></div>
                                            <span class="grid-nav-content">Thông báo</span>
                                        </a> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer card-footer-bordered rounded-0"><a href="{{ url('/') }}"
                                    class="btn btn-label-danger">Về trang chủ</a></div>

                        </div>
                    </div>
                </div>
                <!-- End Profile -->
            </div>
        </div>
        <!-- End menu -->
    </div>
</header>
<!-- End topbar -->
