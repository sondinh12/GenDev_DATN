<div class="top-bar top-bar-v3">
    <div class="col-full">
        <ul id="menu-top-bar-left" class="nav menu-top-bar-left">
            <li class="menu-item animate-dropdown">
                <a title="TechMarket eCommerce - Always free delivery" href="contact-v1.html">TechMarket eCommerce
                    &#8211; Always free delivery</a>
            </li>
            <li class="menu-item animate-dropdown">
                <a title="Quality Guarantee of products" href="shop.html">Quality Guarantee of products</a>
            </li>
            <li class="menu-item animate-dropdown">
                <a title="Fast returnings program" href="track-your-order.html">Fast returnings program</a>
            </li>
            <li class="menu-item animate-dropdown">
                <a title="No additional fees" href="contact-v2.html">No additional fees</a>
            </li>
        </ul>
        <!-- .nav -->
        <ul id="menu-top-bar-right" class="nav menu-top-bar-right">
            <li class="hidden-sm-down menu-item animate-dropdown">
                <a title="Track Your Order" href="track-your-order.html">
                    <i class="tm tm-order-tracking"></i>Track Your Order</a>
            </li>
            <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                <a title="Dollar (US)" data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="tm tm-dollar"></i>Dollar (US)
                    <span class="caret"></span>
                </a>
                <ul role="menu" class="dropdown-menu">
                    <li class="menu-item animate-dropdown">
                        <a title="AUD" href="#">AUD</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="INR" href="#">INR</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="AED" href="#">AED</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="SGD" href="#">SGD</a>
                    </li>
                </ul>
                <!-- .dropdown-menu -->
            </li>
            <li class="menu-item">
                @if(Auth::check())
            <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                <a title="Dollar (US)" data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="tm tm-login-register"></i>{{ Auth::user()->name }}
                    <span class="caret"></span>
                </a>
                <ul role="menu" class="dropdown-menu">
                    <li class="menu-item animate-dropdown">
                        @role('admin|staff')
                            <a href="{{ route('admin.dashboard') }}">Quản trị</a>
                        @endrole
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Profile" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="My Orders" href="{{route('client.orders.index')}}">My Orders</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
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
            <a title="My Account" href="{{ route('login') }}">
                <i class="tm tm-login-register"></i>Login</a>
            @endif

            </li>
        </ul>
        <!-- .nav -->
    </div>
    <!-- .col-full -->
</div>