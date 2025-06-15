@extends('layouts.master')

@section('title')
    Tool
@endsection

@section('topbar-title')
    Elements
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="alert fade show border-0 rounded-0 mb-0 p-0" role="alert">
                <div class="card">
                    <div class="card-header card-header-bordered">
                        <h3 class="card-title">Remove card</h3>
                        <div class="card-addon">
                            <button class="btn btn-text-danger btn-icon" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-0">
                            The close JavaScript plugin is used to show and hide content. Buttons or anchors are used as
                            triggers that are mapped to specific elements you hide. Close an element will animate the
                            <code>height</code> from its current value to <code>0</code>. Given how CSS handles animations,
                            you can use <code>data-bs-dismiss="alert"</code> attribute. Instead, use the class as an
                            independent wrapping element.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">With footer</h3>
                    <div class="card-addon">
                        <button class="btn btn-label-info btn-icon" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-angle-down"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body collapse show" id="collapseExample">
                    <p class="text-muted mb-0">
                        The collapse card with footer is used to show and hide content. Buttons or anchors are used as
                        triggers that are mapped to specific elements you toggle. Collapsing an element will animate the
                        <code>height</code> from its current value to <code>0</code>. Given how CSS handles animations, you
                        cannot use <code>padding</code> on a <code>.collapse</code> element. Instead, use the class as an
                        independent wrapping element.
                    </p>
                </div>
                <div class="card-footer card-footer-bordered">
                    <button class="btn btn-primary">Submit</button>
                    <button class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Collapsible card</h3>
                    <div class="card-addon">
                        <button class="btn btn-label-info btn-icon" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-angle-down"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body collapse show" id="collapseExample1">
                    <p class="text-muted mb-0">
                        The collapse JavaScript plugin is used to show and hide content. Buttons or anchors are used as
                        triggers that are mapped to specific elements you toggle.
                        Collapsing an element will animate the <code>height</code> from its current value to <code>0</code>.
                        Given how CSS handles animations, you cannot use <code>padding</code> on a <code>.collapse</code>
                        element.
                        Instead, use the class as an independent wrapping element.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Collapsed card</h3>
                    <div class="card-addon">
                        <button class="btn btn-label-info btn-icon" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-angle-down"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body collapse" id="collapseExample2">
                    <p class="text-muted mb-0">
                        The collapse JavaScript plugin is used to show and hide content. Buttons or anchors are used as
                        triggers that are mapped to specific elements you toggle.
                        Collapsing an element will animate the <code>height</code> from its current value to <code>0</code>.
                        Given how CSS handles animations, you cannot use <code>padding</code> on a <code>.
                            collapse</code> element. Instead, use the class as an independent wrapping element.
                    </p>
                </div>
            </div>
            <div class="alert fade show border-0 rounded-0 mb-0 p-0 d-block" role="alert">
                <div class="card">
                    <div class="card-header card-header-bordered">
                        <h3 class="card-title">Group of tool</h3>
                        <div class="card-addon">
                            <div class="btn-group">
                                <button class="btn btn-flat-primary btn-icon" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample3" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <button class="btn btn-flat-primary btn-icon" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body collapse show" id="collapseExample3">
                        <p class="text-muted mb-0">
                            The collapse and close JavaScript plugin is used to show and hide content. Buttons or anchors
                            are used as triggers that are mapped to specific elements you toggle and hide. Collapsing and
                            close an element will animate the <code>height</code> from its current value to <code>0</code>.
                            Given how CSS handles animations, you can use on a class & close with attribute.
                        </p>
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
