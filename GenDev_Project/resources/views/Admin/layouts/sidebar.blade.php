@include('Admin.layouts.head-css')
<!-- ========== Left Sidebar Start ========== -->
<div class="sidebar-left">

    <div data-simplebar class="h-100">

        <!--- Sidebar-menu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="left-menu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ url('/admin') }}" class="">
                        <i class="fas fa-desktop"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/categories') }}" class="">
                        <i class="fa-solid fa-list"></i>
                        <span>Danh mục</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/attributes') }}" class="">
                        <i class="fa fa-palette"></i>
                        <span>Thuộc tính</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/products') }}" class="">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                        <span>Sản phẩm</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/users') }}" class="">
                        <i class="fa-regular fa-user"></i>
                        <span>Tài khoản</span>
                    </a>
                <li>

                </li>

                <li>
                    <a href="{{ url('admin/orders') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Danh sách đơn hàng</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/coupons') }}" class="">
                      <i class="fa-solid fa-tag"></i>
                        <span>Mã Giảm Giá</span>
                    </a>
                <li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->