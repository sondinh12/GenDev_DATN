<div class="top-bar top-bar-v3">
    <div class="col-full">
        <ul id="menu-top-bar-left" class="nav menu-top-bar-left">
            <li class="menu-item animate-dropdown">
                <a title="Giao hàng miễn phí toàn quốc" href="#">Giao hàng miễn phí toàn quốc</a>
            </li>
            <li class="menu-item animate-dropdown">
                <a title="Đảm bảo chất lượng sản phẩm" href="#">Đảm bảo chất lượng sản phẩm</a>
            </li>
            <li class="menu-item animate-dropdown">
                <a title="Chương trình đổi trả nhanh chóng" href="#">Chương trình đổi trả nhanh chóng</a>
            </li>
            <li class="menu-item animate-dropdown">
                <a title="Không phụ phí" href="#">Không phụ phí</a>
            </li>
        </ul>
        <!-- .nav -->
        <ul id="menu-top-bar-right" class="nav menu-top-bar-right">
            <li class="hidden-sm-down menu-item animate-dropdown">
                <a title="Theo dõi đơn hàng" href="track-your-order.html">
                    <i class="tm tm-order-tracking"></i>Theo dõi đơn hàng</a>
            </li>
            <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                <a title="VNĐ" data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="tm tm-dollar"></i>VNĐ
                    <span class="caret"></span>
                </a>
                <ul role="menu" class="dropdown-menu">
                    <li class="menu-item animate-dropdown">
                        <a title="Đô la Úc" href="#">Đô la Úc (AUD)</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Rupee Ấn Độ" href="#">Rupee Ấn Độ (INR)</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Dirham UAE" href="#">Dirham UAE (AED)</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Đô la Singapore" href="#">Đô la Singapore (SGD)</a>
                    </li>
                </ul>
                <!-- .dropdown-menu -->
            </li>
            <li class="menu-item">
                @if (Auth::check())
            <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                <a title="Dollar (US)" data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="tm tm-login-register"></i>{{ Auth::user()->name }}
                    <span class="caret"></span>
                </a>
                <ul role="menu" class="dropdown-menu">
                    <li class="menu-item animate-dropdown">
                        @php
                            $adminRoles = \Spatie\Permission\Models\Role::where('name', 'like', '%admin%')
                                ->orWhere('name', 'like', '%nhan vien%')
                                ->pluck('name')
                                ->toArray();
                        @endphp
                        @if (auth()->check() && auth()->user()->hasAnyRole($adminRoles))
                            <a href="{{ route('admin.dashboard') }}">Quản trị</a>
                        @endif
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Profile" href="{{ route('profile') }}">Hồ sơ</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="My Orders" href="{{ route('client.orders.index') }}">Đơn hàng của tôi</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Logout" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                <!-- .dropdown-menu -->
            </li>
        @else
            <a title="Tài khoản của tôi" href="{{ route('login') }}">
                <i class="tm tm-login-register"></i>Đăng nhập</a>
            @endif

            </li>
        </ul>
        <!-- .nav -->
    </div>
    <!-- .col-full -->
</div>
