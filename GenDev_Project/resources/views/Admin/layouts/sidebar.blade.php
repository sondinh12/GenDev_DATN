@include('Admin.layouts.head-css')
<!-- ========== Left Sidebar Start ========== -->
<div class="sidebar-left">
    <div data-simplebar class="h-100">
        <!--- Sidebar-menu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="left-menu list-unstyled" id="side-menu">
                {{-- Trang chủ: ai cũng thấy --}}
                <li>
                    <a href="{{ url('/admin/dashboard') }}">
                        <i class="fas fa-desktop"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                {{-- Danh mục --}}
                @can('Quản lý danh mục')
                    <li>
                        <a href="{{ url('/admin/categories') }}">
                            <i class="fa-solid fa-list"></i>
                            <span>Danh mục</span>
                        </a>
                    </li>
                @endcan

                {{-- Thuộc tính --}}
                @can('Quản lý thuộc tính')
                    <li>
                        <a href="{{ url('/admin/attributes') }}">
                            <i class="fa fa-palette"></i>
                            <span>Thuộc tính</span>
                        </a>
                    </li>
                @endcan

                {{-- Sản phẩm --}}
                @can('Quản lý sản phẩm')
                    <li>
                        <a href="{{ url('/admin/products') }}">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                            <span>Sản phẩm</span>
                        </a>
                    </li>
                @endcan

                {{-- Tài khoản --}}
                @can('Quản lý tài khoản')
                    <li>
                        <a href="{{ url('/admin/users') }}">
                            <i class="fa-regular fa-user"></i>
                            <span>Tài khoản</span>
                        </a>
                    </li>
                @endcan

                {{-- Vai trò --}}
                @can('Quản lý vai trò')
                    <li>
                        <a href="{{ url('/admin/roles') }}">
                            <i class="fa-solid fa-users"></i>
                            <span>Vai trò</span>
                        </a>
                    </li>
                @endcan

                {{-- Đơn hàng --}}
                @can('Quản lý đơn hàng')
                    <li>
                        <a href="{{ url('/admin/orders') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Danh sách đơn hàng</span>
                        </a>
                    </li>
                @endcan

                {{-- Mã giảm giá --}}
                @can('Quản lý mã giảm giá')
                    <li>
                        <a href="{{ url('/admin/coupons') }}">
                            <i class="fa-solid fa-tag"></i>
                            <span>Mã Giảm Giá</span>
                        </a>
                    </li>
                @endcan

                {{-- Nhà cung cấp --}}
                @can('manage suppliers')
                <li>
                    <a href="{{ url('/admin/suppliers') }}" class="">
                        <i class="fa-solid fa-building"></i>
                        <span>Nhà cung cấp</span>
                    </a>
                <li>
                @endcan

                {{-- Hóa đơn nhập hàng --}}
                @can('manage imports')

                <li>
                    <a href="{{ url('/admin/imports') }}" class="">
                        <i class="fa-solid fa-receipt"></i>
                        <span>Hóa đơn</span>
                    </a>
                <li>

                @endcan

                {{-- Đánh giá --}}
                @can('manage reviews')
                    <li>
                        <a href="{{ url('/admin/reviews') }}">
                            <i class="fa-solid fa-tag"></i>
                            <span>Bình luận</span>
                        </a>
                    </li>
                @endcan

                {{-- Quản lý banner --}}
                @can('Quản lý banner')
                    <li>
                        <a href="{{ url('/admin/banner') }}" class="">
                            <i class="fa-solid fa-images"></i>
                            <span>Quản lý banner</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
