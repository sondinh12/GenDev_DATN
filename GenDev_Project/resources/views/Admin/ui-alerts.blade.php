@extends('layouts.master')

@section('title')
    Alerts
@endsection

@section('topbar-title')
    Elements
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Basic</h3>
                </div>
                <!-- end card-header -->

                <div class="card-body">
                    <p class="text-muted mb-0"><strong>Alerts</strong> are available for any length of text, as well as an
                        optional dismiss button. For proper styling, use one of the eight <strong>required</strong>
                        contextual classes</p>
                    <div class="row pt-3">
                        <div class="col-xl-4">
                            <div class="card mb-0 border">
                                <div class="card-header">
                                    <h3 class="card-title">Solid</h3>
                                </div>
                                <div class="card-body pb-0">
                                    <p>Use <code>.alert-{color}</code> to apply these variants</p>
                                    <div class="alert alert-primary">Primary</div>
                                    <div class="alert alert-secondary">Secondary</div>
                                    <div class="alert alert-info">Info</div>
                                    <div class="alert alert-warning">Warning</div>
                                    <div class="alert alert-danger">Danger</div>
                                    <div class="alert alert-success">Success</div>
                                    <div class="alert alert-dark">Dark</div>
                                    <div class="alert alert-light">Light</div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-4">
                            <div class="card mb-0 border">
                                <div class="card-header">
                                    <h3 class="card-title">Outline</h3>
                                </div>
                                <div class="card-body pb-0">
                                    <p class="text-muted">Use <code>.alert-outline-{color}</code> to apply these variants
                                    </p>
                                    <div class="alert alert-outline-primary">Primary</div>
                                    <div class="alert alert-outline-secondary">Secondary</div>
                                    <div class="alert alert-outline-info">Info</div>
                                    <div class="alert alert-outline-warning">Warning</div>
                                    <div class="alert alert-outline-danger">Danger</div>
                                    <div class="alert alert-outline-success">Success</div>
                                    <div class="alert alert-outline-dark">Dark</div>
                                    <div class="alert alert-outline-light">Light</div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-4">
                            <div class="card mb-0 border">
                                <div class="card-header">
                                    <h3 class="card-title">Label</h3>
                                </div>
                                <div class="card-body pb-0">
                                    <p class="text-muted">Use <code>.alert-label-{color}</code> to apply these variants</p>
                                    <div class="alert alert-label-primary">Primary</div>
                                    <div class="alert alert-label-secondary">Secondary</div>
                                    <div class="alert alert-label-info">Info</div>
                                    <div class="alert alert-label-warning">Warning</div>
                                    <div class="alert alert-label-danger">Danger</div>
                                    <div class="alert alert-label-success">Success</div>
                                    <div class="alert alert-label-dark">Dark</div>
                                    <div class="alert alert-label-light">Light</div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Links</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">Use the <code>.alert-link</code> utility class to quickly provide matching colored
                        links within any alert.</p>
                    <div class="alert alert-primary">
                        <div class="alert-content">A simple primary alert with <a href="#" class="alert-link">an
                                example link</a>. Give it a click if you like.</div>
                    </div>
                    <div class="alert alert-outline-secondary">
                        <div class="alert-content">A simple primary alert with <a href="#" class="alert-link">an
                                example link</a>. Give it a click if you like.</div>
                    </div>
                    <div class="alert alert-label-success">
                        <div class="alert-content">A simple primary alert with <a href="#" class="alert-link">an
                                example link</a>. Give it a click if you like.</div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Icon</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">You can insert an icon to an alert element. Put your icon into
                        <code>.alert-icon</code> and your content into <code>.alert-content</code> class.
                    </p>
                    <div class="alert alert-primary">
                        <div class="alert-icon"><i class="fa fa-archive"></i></div>
                        <div class="alert-content">A simple light alert with <a href="#" class="alert-link">an example
                                link</a>. Give it a click if you like.</div>
                    </div>
                    <div class="alert alert-outline-secondary">
                        <div class="alert-icon"><i class="fas fa-briefcase"></i></div>
                        <div class="alert-content">A simple light alert with <a href="#" class="alert-link">an example
                                link</a>. Give it a click if you like.</div>
                    </div>
                    <div class="alert alert-label-success">
                        <div class="alert-icon"><i class="fas fa-layer-group"></i></div>
                        <div class="alert-content">A simple light alert with <a href="#" class="alert-link">an example
                                link</a>. Give it a click if you like.</div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Additional content</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">Alerts can also contain additional HTML elements like headings, paragraphs and
                        dividers.</p>
                    <div class="alert alert-success">
                        <div class="alert-content">
                            <h4 class="alert-heading">Well done!</h4>
                            <p class="mb-0">Aww yeah, you successfully read this important alert message. This example
                                text is going to run a bit longer so that you can see how spacing within an alert works with
                                this kind of content.</p>
                        </div>
                    </div>
                    <div class="alert alert-outline-success">
                        <div class="alert-content">
                            <h4 class="alert-heading">Well done!</h4>
                            <p>Aww yeah, you successfully read this important alert message. This example text is going to
                                run a bit longer so that you can see how spacing within an alert works with this kind of
                                content.</p>
                            <hr>
                            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and
                                tidy.</p>
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
                    <h3 class="card-title">Dismissible alert</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">Using the alert JavaScript plugin, it’s possible to dismiss any alert inline.</p>
                    <div class="alert alert-dismissible alert-success fade show">
                        <div class="alert-icon"><i class="far fa-star"></i></div>
                        <div class="alert-content"><strong>Holy guacamole!</strong> You should check in on some of those
                            fields below.</div><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <div class="alert alert-dismissible alert-outline-warning fade show">
                        <div class="alert-content"><strong>Holy guacamole!</strong> You should check in on some of those
                            fields below.</div><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <div class="alert alert-dismissible alert-label-secondary fade show">
                        <div class="alert-icon"><i class="fa fa-cog"></i></div>
                        <div class="alert-content">
                            <h4 class="alert-heading">Well done!</h4>
                            <p>Aww yeah, you successfully read this important alert message. This example text is going to
                                run a bit longer so that you can see how spacing within an alert works with this kind of
                                content.</p>
                            <hr>
                            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and
                                tidy.</p>
                        </div><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
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
