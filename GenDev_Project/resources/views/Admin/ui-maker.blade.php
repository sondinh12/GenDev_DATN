@extends('layouts.master')

@section('title')
    General
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
                    <p class="text-muted"><strong>Marker</strong> is component that you can use for marking something with
                        shape and color, you can combine it with many components. Marker by default has 3 different shapes,
                        like the examples below. Change marker color by applying text color utility (e.q
                        <code>.text-{color}</code>).
                    </p>
                    <div class="row g-3">
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Dot</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Apply <code>.marker-dot</code> class for this shape</p><i
                                        class="marker marker-dot text-primary"></i> <i
                                        class="marker marker-dot text-secondary"></i> <i
                                        class="marker marker-dot text-info"></i> <i
                                        class="marker marker-dot text-success"></i> <i
                                        class="marker marker-dot text-warning"></i> <i
                                        class="marker marker-dot text-danger"></i> <i
                                        class="marker marker-dot text-dark"></i> <i
                                        class="marker marker-dot text-light"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Circle</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Apply <code>.marker-circle</code> class for this shape</p><i
                                        class="marker marker-circle text-primary"></i> <i
                                        class="marker marker-circle text-secondary"></i> <i
                                        class="marker marker-circle text-info"></i> <i
                                        class="marker marker-circle text-success"></i> <i
                                        class="marker marker-circle text-warning"></i> <i
                                        class="marker marker-circle text-danger"></i> <i
                                        class="marker marker-circle text-dark"></i> <i
                                        class="marker marker-circle text-light"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Pill</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Apply <code>.marker-pill</code> class for this shape</p><i
                                        class="marker marker-pill text-primary"></i> <i
                                        class="marker marker-pill text-secondary"></i> <i
                                        class="marker marker-pill text-info"></i> <i
                                        class="marker marker-pill text-success"></i> <i
                                        class="marker marker-pill text-warning"></i> <i
                                        class="marker marker-pill text-danger"></i> <i
                                        class="marker marker-pill text-dark"></i> <i
                                        class="marker marker-pill text-light"></i>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Sizing</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Change marker size to smaller or larger with <code>.marker-{sm|lg}</code> classes.
                    </p><i class="marker marker-dot marker-sm text-primary"></i> <i
                        class="marker marker-dot text-success"></i> <i class="marker marker-dot marker-lg text-danger"></i>
                    <i class="marker marker-circle marker-sm text-primary"></i> <i
                        class="marker marker-circle text-success"></i> <i
                        class="marker marker-circle marker-lg text-danger"></i> <i
                        class="marker marker-pill marker-sm text-primary"></i> <i
                        class="marker marker-pill text-success"></i> <i
                        class="marker marker-pill marker-lg text-danger"></i>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Usage</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">You can use marker with several elements together.</p>
                    <a href="#!" class="btn btn-primary">Button<div class="btn-marker">
                            <i class="marker marker-dot text-danger"></i>
                        </div>
                    </a>
                    <a href="#!" class="btn btn-primary btn-icon"><i class="fa fa-star"></i>
                        <div class="btn-marker"><i class="marker marker-dot text-danger"></i></div>
                    </a>
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
