<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Clivax - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Codebucks" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    <!-- include head css -->
    @include('Admin.layouts.head-css')
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- topbar -->
        @include('Admin.layouts.topbar')
        <!-- sidebar components -->
        @include('Admin.layouts.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- footer -->
            @include('Admin.layouts.footer')

        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- customizer -->
    @include('Admin.layouts.right-sidebar')

    <!-- vendor-scripts -->
    @include('Admin.layouts.vendor-scripts')

</body>

</html>