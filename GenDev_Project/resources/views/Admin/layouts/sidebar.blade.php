<!-- ========== Left Sidebar Start ========== -->
<div class="sidebar-left">

    <div data-simplebar class="h-100">

        <!--- Sidebar-menu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="left-menu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ url('index') }}" class="">
                        <i class="fas fa-desktop"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Products</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow ">
                        <i class="fa fa-palette"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ url('admin/products') }}">
                                <i class="mdi mdi-checkbox-blank-circle align-middle"></i>Products
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/attributes') }}">
                                <i class="mdi mdi-checkbox-blank-circle align-middle"></i>Attributes
                            </a>
                        </li>
                    </ul>
                <li>

                </li>
                
                <li class="menu-title">Categories</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow ">
                        <i class="fa fa-palette"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ url('admin/categories') }}">
                                <i class="mdi mdi-checkbox-blank-circle align-middle"></i>Categories
                            </a>
                        </li>
                    </ul>
                <li>

                </li>

                <li class="menu-title">User</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow ">
                        <i class="fa fa-palette"></i>
                        <span>User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ url('admin/users') }}">
                                <i class="mdi mdi-checkbox-blank-circle align-middle"></i>Users
                            </a>
                        </li>
                    </ul>
                <li>

                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
