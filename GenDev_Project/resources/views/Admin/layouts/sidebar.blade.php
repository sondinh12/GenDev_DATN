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
                    <a href="{{ url('/admin') }}">
                        <i class="fas fa-desktop"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                {{-- Danh mục --}}
                @can('manage categories')
                    <li>
                        <a href="{{ url('/admin/categories') }}">
                            <i class="fa-solid fa-list"></i>
                            <span>Danh mục</span>
                        </a>
                    </li>
                @endcan

                {{-- Thuộc tính --}}
                @can('manage products')
                    <li>
                        <a href="{{ url('/admin/attributes') }}">
                            <i class="fa fa-palette"></i>
                            <span>Thuộc tính</span>
                        </a>
                    </li>
                @endcan

                {{-- Sản phẩm --}}
                @can('manage products')
                    <li>
                        <a href="{{ url('/admin/products') }}">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                            <span>Sản phẩm</span>
                        </a>
                    </li>
                @endcan

                {{-- Tài khoản --}}
                @can('manage users')
                    <li>
                        <a href="{{ url('/admin/users') }}">
                            <i class="fa-regular fa-user"></i>
                            <span>Tài khoản</span>
                        </a>
                    </li>
                @endcan

                {{-- Đơn hàng --}}
                @can('manage orders')
                    <li>
                        <a href="{{ url('/admin/orders') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Danh sách đơn hàng</span>
                        </a>
                    </li>
                @endcan

                {{-- Mã giảm giá --}}
                @can('manage coupons')
                    <li>
                        <a href="{{ url('/admin/coupons') }}">
                            <i class="fa-solid fa-tag"></i>
                            <span>Mã Giảm Giá</span>
                        </a>
                    </li>
                @endcan

                {{-- Danh mục bài viết --}}
                @can('manage posts')
                <li>
                    <a href="{{ url('/admin/post-categories') }}" class="">
                        <i class="fa-solid fa-tag"></i>
                        <span>Danh mục bài viết</span>
                    </a>
                </li>
                @endcan


                {{-- Đánh giá --}}
                @can('manage comments')
                    <li>
                        <a href="{{ url('/admin/reviews') }}">
                            <i class="fa-solid fa-tag"></i>
                            <span>Đánh giá</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
