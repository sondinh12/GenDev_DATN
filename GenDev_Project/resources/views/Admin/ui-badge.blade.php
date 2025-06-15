@extends('layouts.master')

@section('title')
    Badge
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
                <div class="card-body">
                    <p class="text-muted">Add any of the below mentioned modifier classes to change the appearance of a
                        badge.</p>
                    <div class="row g-3">
                        <div class="col-xl-6">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Solid</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Use <code>.badge-{color}</code> to apply these variant.</p><span
                                        class="badge badge-primary">Primary</span> <span
                                        class="badge badge-secondary">Secondary</span> <span
                                        class="badge badge-success">Success</span> <span
                                        class="badge badge-info">Info</span> <span
                                        class="badge badge-warning">Warning</span> <span
                                        class="badge badge-danger">Danger</span> <span class="badge badge-dark">Dark</span>
                                    <span class="badge badge-light">Light</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Label</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Use <code>.badge-label-{color}</code> to apply these variant.</p>
                                    <span class="badge badge-label-primary">Primary</span> <span
                                        class="badge badge-label-secondary">Secondary</span> <span
                                        class="badge badge-label-success">Success</span> <span
                                        class="badge badge-label-info">Info</span> <span
                                        class="badge badge-label-warning">Warning</span> <span
                                        class="badge badge-label-danger">Danger</span> <span
                                        class="badge badge-label-dark">Dark</span> <span
                                        class="badge badge-label-light">Light</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Outline</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Use <code>.badge-outline-{color}</code> to apply these variant.
                                    </p><span class="badge badge-outline-primary">Primary</span> <span
                                        class="badge badge-outline-secondary">Secondary</span> <span
                                        class="badge badge-outline-success">Success</span> <span
                                        class="badge badge-outline-info">Info</span> <span
                                        class="badge badge-outline-warning">Warning</span> <span
                                        class="badge badge-outline-danger">Danger</span> <span
                                        class="badge badge-outline-dark">Dark</span> <span
                                        class="badge badge-outline-light">Light</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Text</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Use <code>.badge-text-{color}</code> to apply these variant.</p>
                                    <span class="badge badge-text-primary">Primary</span> <span
                                        class="badge badge-text-secondary">Secondary</span> <span
                                        class="badge badge-text-success">Success</span> <span
                                        class="badge badge-text-info">Info</span> <span
                                        class="badge badge-text-warning">Warning</span> <span
                                        class="badge badge-text-danger">Danger</span> <span
                                        class="badge badge-text-dark">Dark</span> <span
                                        class="badge badge-text-light">Light</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Shaped badges</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Make your badge to a circle or square shape by adding
                        <code>.badge-{circle|square}</code> modifier classes.
                    </p>
                    <div class="row g-3">
                        <div class="col-xl-6">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Circle</h3>
                                </div>
                                <div class="card-body"><span class="badge badge-primary badge-circle">A</span> <span
                                        class="badge badge-outline-secondary badge-circle">B</span> <span
                                        class="badge badge-warning badge-circle">C</span> <span
                                        class="badge badge-outline-danger badge-circle">D</span></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Square</h3>
                                </div>
                                <div class="card-body"><span class="badge badge-primary badge-square">A</span> <span
                                        class="badge badge-outline-secondary badge-square">B</span> <span
                                        class="badge badge-warning badge-square">C</span> <span
                                        class="badge badge-outline-danger badge-square">D</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Pill badges</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use the <code>.rounded-pill</code> modifier class to make badge element more
                        rounded.</p><span class="badge badge-primary rounded-pill">Primary</span> <span
                        class="badge badge-secondary rounded-pill">Secondary</span> <span
                        class="badge badge-info rounded-pill">Info</span> <span
                        class="badge badge-success rounded-pill">Success</span> <span
                        class="badge badge-warning rounded-pill">Warning</span> <span
                        class="badge badge-danger rounded-pill">Danger</span> <span
                        class="badge badge-dark rounded-pill">Dark</span> <span
                        class="badge badge-light rounded-pill">Light</span>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Header</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Badges scale to match the size of the immediate parent element by using relative
                        font sizing and <code>em</code> units</p>
                    <h3>Example heading <span class="badge badge-secondary">New</span></h3>
                    <h4>Example heading <span class="badge badge-secondary">New</span></h4>
                    <h5>Example heading <span class="badge badge-secondary">New</span></h5>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Button</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Badges can be used as part of links or buttons to provide a counter.</p><button
                        class="btn btn-primary">Notification <span class="badge badge-secondary">+ 10</span></button>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
