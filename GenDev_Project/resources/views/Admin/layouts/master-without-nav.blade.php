<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | TechStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Codebucks" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    <!-- include head css -->
    @include('Admin.layouts.head-css')
</head>

<body>

    @yield('content')

    <!-- customizer -->
    @include('Admin.layouts.right-sidebar')

    <!-- vendor-scripts -->
    @include('Admin.layouts.vendor-scripts')

</body>

</html>