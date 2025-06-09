@extends('layouts.master')

@section('title')
    Rich-list
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
                    <h3 class="card-title">Basic</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted"><strong>Rich list</strong> is a flexible and powerful component for displaying a
                        series of content. Basic rich list has <code>.rich-list-item</code> where wrapping content or any
                        elements.</p>
                    <div class="rich-list">
                        <div class="rich-list-item">
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Porta</h4>
                                <span class="rich-list-subtitle">Cras justo odio</span>
                            </div>
                        </div>
                        <div class="rich-list-item">
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Consectetur</h4>
                                <span class="rich-list-subtitle">Dapibus ac facilisis in</span>
                            </div>
                        </div>
                        <div class="rich-list-item">
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Vestibulum</h4>
                                <span class="rich-list-subtitle">Morbi leo risus</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Border variants</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">By default, rich list component has 2 border versions, like the examples below.
                    </p>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Flush</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Extend basic rich list with <code>.rich-list-flush</code> to appear like
                                below.</p>
                            <div class="rich-list rich-list-flush">
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs">
                                            <div class="avatar-display">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title">Porta</h4>
                                        <span class="rich-list-subtitle">Cras justo odio</span>
                                    </div>
                                    <div class="rich-list-append"><i class="mdi mdi-chevron-right fs-16 mx-2"></i></div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs">
                                            <div class="avatar-display">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title">Consectetur</h4>
                                        <span class="rich-list-subtitle">Dapibus ac facilisis in</span>
                                    </div>
                                    <div class="rich-list-append">
                                        <span class="badge badge-success">9+</span>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs">
                                            <div class="avatar-display">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title">Vestibulum</h4><span class="rich-list-subtitle">Morbi
                                            leo risus</span>
                                    </div>
                                    <div class="rich-list-append">
                                        <span class="badge badge-primary">new</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border mb-0">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Bordered</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Extend basic rich list with <code>.rich-list-bordered</code> to appear
                                like below.</p>
                            <div class="rich-list rich-list-bordered">
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs">
                                            <div class="avatar-display">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title">Porta</h4>
                                        <span class="rich-list-subtitle">Cras justo odio</span>
                                    </div>
                                    <div class="rich-list-append">
                                        <i class="mdi mdi-chevron-right fs-16 mx-2"></i>
                                    </div>
                                </div>
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs">
                                            <div class="avatar-display">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title">Consectetur</h4><span class="rich-list-subtitle">Dapibus
                                            ac facilisis in</span>
                                    </div>
                                    <div class="rich-list-append">
                                        <span class="badge badge-success">9+</span>
                                    </div>
                                </div>
                                <div class="rich-list-item mb-0">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs">
                                            <div class="avatar-display">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title">Vestibulum</h4><span class="rich-list-subtitle">Morbi
                                            leo risus</span>
                                    </div>
                                    <div class="rich-list-append">
                                        <span class="badge badge-primary">new</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Addon</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Put other elements inside rich list within
                        <code>.rich-list-{prepend|append}</code>
                    </p>
                    <div class="rich-list">
                        <div class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar avatar-xs">
                                    <div class="avatar-display">
                                        <i class="fa fa-cog"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Porta</h4><span class="rich-list-subtitle">Cras justo
                                    odio</span>
                            </div>
                            <div class="rich-list-append">
                                <i class="mdi mdi-chevron-right fs-16 mx-2"></i>
                            </div>
                        </div>
                        <div class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar avatar-xs avatar-success avatar-circle">
                                    <div class="avatar-display">
                                        <i class="fa fa-wrench"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Consectetur</h4><span class="rich-list-subtitle">Dapibus ac
                                    facilisis in</span>
                            </div>
                            <div class="rich-list-append">
                                <span class="badge badge-label-success">9+</span>
                            </div>
                        </div>
                        <div class="rich-list-item">
                            <div class="rich-list-prepend align-items-start">
                                <div class="avatar avatar-xs avatar-label-primary">
                                    <div class="avatar-display">
                                        <i class="fa fa-paper-plane"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Vestibulum</h4>
                                <span class="rich-list-subtitle">Morbi leo risus</span>
                                <p class="rich-list-paragraph">Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                    laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            <div class="rich-list-append">
                                <span class="badge badge-primary">new</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Action</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">If you want to make your rich list has clickable behavior, you must add
                        <code>.rich-list-action</code>.
                    </p>
                    <div class="rich-list rich-list-bordered rich-list-action">
                        <a href="#" class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar avatar-xs">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Porta</h4>
                                <span class="rich-list-subtitle">Cras justo odio</span>
                            </div>
                            <div class="rich-list-append">
                                <i class="mdi mdi-chevron-right fs-16 mx-2"></i>
                            </div>
                        </a><a href="#" class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar avatar-xs">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Consectetur</h4>
                                <span class="rich-list-subtitle">Dapibus ac facilisis in</span>
                            </div>
                            <div class="rich-list-append">
                                <span class="badge badge-success">9+</span>
                            </div>
                        </a><a href="#" class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar avatar-xs">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Vestibulum</h4>
                                <span class="rich-list-subtitle">Morbi leo risus</span>
                            </div>
                            <div class="rich-list-append">
                                <span class="badge badge-primary">new</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">States</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">We provide active and disabled states for <code>.rich-list-item</code>, look the
                        example</p>
                    <div class="rich-list rich-list-bordered rich-list-action">
                        <a href="#" class="rich-list-item active">
                            <div class="rich-list-prepend">
                                <div class="avatar avatar-xs ">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Active state</h4>
                                <span class="rich-list-subtitle">Cras justo odio</span>
                            </div>
                            <div class="rich-list-append">
                                <i class="mdi mdi-chevron-right fs-16 mx-2"></i>
                            </div>
                        </a><a href="#" class="rich-list-item disabled">
                            <div class="rich-list-prepend">
                                <div class="avatar avatar-xs">
                                    <div class="avatar-display"><i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Disabled state</h4>
                                <span class="rich-list-subtitle">Dapibus ac facilisis in</span>
                            </div>
                            <div class="rich-list-append">
                                <span class="badge badge-success">9+</span>
                            </div>
                        </a><a href="#" class="rich-list-item">
                            <div class="rich-list-prepend">
                                <div class="avatar avatar-xs">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h4 class="rich-list-title">Vestibulum</h4>
                                <span class="rich-list-subtitle">Morbi leo risus</span>
                            </div>
                            <div class="rich-list-append">
                                <span class="badge badge-primary">new</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
