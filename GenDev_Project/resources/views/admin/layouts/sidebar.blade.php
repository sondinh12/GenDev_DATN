<!-- ========== Left Sidebar Start ========== -->
<div class="sidebar-left">
    <div data-simplebar class="h-100">
        <!-- Sidebar menu -->
        <div id="sidebar-menu">
            <ul class="left-menu list-unstyled" id="side-menu">

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Quản lý</li>

                <li>
                    <a href="{{ route('admin.products.index') }}">
                        <i class="fas fa-boxes"></i>
                        <span>Sản phẩm</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="fas fa-tags"></i>
                        <span>Danh mục</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Người dùng</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fas fa-receipt"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fas fa-chart-line"></i>
                        <span>Thống kê</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
