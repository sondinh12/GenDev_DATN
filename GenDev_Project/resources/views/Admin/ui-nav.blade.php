@extends('layouts.master')

@section('title')
    Navigation
@endsection

@section('topbar-title')
    Elements
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Variation</h3>
                </div>
                <div class="card-body pb-0">
                    <p>The base <code>.nav</code> component is built with flexbox and provide a strong foundation for
                        building all types of navigation components. It includes some style overrides (for working with
                        lists), some link padding for larger hit areas, and basic disabled styling.</p>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Default</h3>
                        </div>
                        <div class="card-body">
                            <p>This is basic example for nav elements</p>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                        aria-expanded="false">Dropdown <i
                                            class="mdi mdi-chevron-down align-middle ms-1"></i></a>
                                    <div class="dropdown-menu dropdown-menu-start dropdown-menu-animated">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#">Disabled</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Pill</h3>
                        </div>
                        <div class="card-body">
                            <p>Take that same HTML, but use <code>.nav-pills</code> instead</p>
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-start dropdown-menu-animated"><a
                                            class="dropdown-item" href="#">Action</a> <a class="dropdown-item"
                                            href="#">Another action</a> <a class="dropdown-item"
                                            href="#">Something else here</a></div>
                                </li>
                                <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Tab</h3>
                        </div>
                        <div class="card-body">
                            <p>Takes the basic nav from above and adds the <code>.nav-tabs</code> class to generate a tabbed
                                interface.</p>
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-start dropdown-menu-animated"><a
                                            class="dropdown-item" href="#">Action</a> <a class="dropdown-item"
                                            href="#">Another action</a> <a class="dropdown-item"
                                            href="#">Something else here</a></div>
                                </li>
                                <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Line</h3>
                        </div>
                        <div class="card-body">
                            <p>Take that same HTML, but use <code>.nav-lines</code> instead</p>
                            <ul class="nav nav-lines">
                                <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown" href="#">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-start dropdown-menu-animated"><a
                                            class="dropdown-item" href="#">Action</a> <a class="dropdown-item"
                                            href="#">Another action</a> <a class="dropdown-item"
                                            href="#">Something else here</a></div>
                                </li>
                                <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Alignment</h3>
                </div>
                <div class="card-body">
                    <p>Change the horizontal alignment of your nav with <strong>flexbox utilities</strong>. By default, navs
                        are left-aligned, but you can easily change them to center or right aligned.</p>
                    <div class="d-grid">
                        <ul class="nav justify-content-start">
                            <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                            <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                        </ul>
                        <ul class="nav justify-content-center">
                            <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                            <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                        </ul>
                        <ul class="nav justify-content-end">
                            <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                            <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Fill and justify</h3>
                </div>
                <div class="card-body">
                    <p>Force your <code>.nav</code>'s contents to extend the full available width. To proportionately fill
                        all available space with your <code>.nav-item</code>s, use <code>.nav-fill</code>. For equal-width
                        elements, use <code>.nav-justified</code>. All horizontal space will be occupied by nav links.</p>
                    <div class="d-grid gap-3">
                        <ul class="nav nav-pills nav-fill">
                            <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Much longer nav link</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                            <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                        </ul>
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Longer link</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                            <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Additional elements</h3>
                </div>
                <div class="card-body">
                    <p>You can combine other elements such as <a href="../../elements/base/badge.html">badges</a>, icon or
                        mdi-chevron-right
                        to separate nav items, we provide <code>.nav-prepend</code> and <code>.nav-append</code> for
                        wrapping those elements.</p>
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#"><span class="nav-content">Link</span>
                                <div class="nav-append"><i class="mdi mdi-chevron-right"></i></div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link active" href="#">
                                <div class="nav-prepend">
                                    <div class="nav-icon"><i class="fa fa-archive"></i></div>
                                </div><span class="nav-content">Active</span>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="#">
                                <div class="nav-prepend">
                                    <div class="nav-icon"><i class="fa fa-cog"></i></div>
                                </div><span class="nav-content">Link</span>
                                <div class="nav-append"><i class="mdi mdi-chevron-right"></i></div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link disabled" href="#">
                                <div class="nav-prepend">
                                    <div class="nav-icon"><i class="fa fa-wrench"></i></div>
                                </div><span class="nav-content">Disabled</span>
                                <div class="nav-append"><span class="badge badge-warning rounded-pill ms-2">2</span></div>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
