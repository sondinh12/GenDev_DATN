@extends('layouts.master')

@section('title')
    Offcanvas
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
                    <h3 class="card-title">Offcanvas examples</h3>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3">
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label">Basic demo</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <button class="btn btn-primary" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvas1">Click me</button>
                                </div>
                                <p class="text-muted mb-0">Add <code>data-bs-toggle="offcanvas"</code> and set
                                    <code>data-bs-target</code> attributes to initialize offcanvas trigger
                                </p>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label">Placements</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <button class="btn btn-primary" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvas2">Start</button>
                                    <button class="btn btn-primary" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvas3">End</button> <button class="btn btn-primary"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvas4">Top</button> <button
                                        class="btn btn-primary" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvas5">Bottom</button>
                                </div>
                                <p class="text-muted mb-0">You can add <code>.offcanvas-{start|end|top|bottom}</code> class
                                    to <code>.offcanvas</code> element to set the position</p>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label">Backdrop</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <button class="btn btn-primary" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvas6">Enabled</button>
                                    <button class="btn btn-primary" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvas7">Disabled</button>
                                </div>
                                <p class="text-muted mb-0">Set <code>data-bs-backdrop</code> attribute with
                                    <code>true|false</code> value to toggle the backdrop
                                </p>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- Strat offcanvas -->
    <!-- offcanvas 1 -->
    <div class="offcanvas offcanvas-start" id="offcanvas1">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Basic offcanvas</h5><button class="btn btn-label-danger btn-icon"
                data-bs-dismiss="offcanvas"><i class="fa fa-times"></i></button>
        </div>
        <div class="offcanvas-body">
            <p class="text-muted mb-0">Some text as placeholder. In real life you can have the elements you have chosen.
                Like, text, images, lists, etc.</p>
        </div>
    </div>

    <!-- offcanvas 2 -->
    <div class="offcanvas offcanvas-start" id="offcanvas2">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Offcanvas start</h5><button class="btn btn-label-danger btn-icon"
                data-bs-dismiss="offcanvas"><i class="fa fa-times"></i></button>
        </div>
        <div class="offcanvas-body">
            <p class="text-muted mb-0">Some text as placeholder. In real life you can have the elements you have chosen.
                Like, text, images, lists, etc.</p>
        </div>
    </div>

    <!-- offcanvas 3 -->
    <div class="offcanvas offcanvas-end" id="offcanvas3">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Offcanvas end</h5>
            <button class="btn btn-label-danger btn-icon" data-bs-dismiss="offcanvas">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <p class="text-muted mb-0">Some text as placeholder. In real life you can have the elements you have chosen.
                Like, text, images, lists, etc.</p>
        </div>
    </div>

    <!-- offcanvas 4 -->
    <div class="offcanvas offcanvas-top" id="offcanvas4">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Offcanvas top</h5>
            <button class="btn btn-label-danger btn-icon" data-bs-dismiss="offcanvas">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <p class="text-muted mb-0">Some text as placeholder. In real life you can have the elements you have chosen.
                Like, text, images, lists, etc.</p>
        </div>
    </div>

    <!-- offcanvas 5 -->
    <div class="offcanvas offcanvas-bottom" id="offcanvas5">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Offcanvas bottom</h5>
            <button class="btn btn-label-danger btn-icon" data-bs-dismiss="offcanvas">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <p class="text-muted mb-0">Some text as placeholder. In real life you can have the elements you have chosen.
                Like, text, images, lists, etc.</p>
        </div>
    </div>

    <!-- offcanvas 6 -->
    <div class="offcanvas offcanvas-start" id="offcanvas6" data-bs-backdrop="true">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Offcanvas with backdrop</h5>
            <button class="btn btn-label-danger btn-icon" data-bs-dismiss="offcanvas">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <p class="text-muted mb-0">Some text as placeholder. In real life you can have the elements you have chosen.
                Like, text, images, lists, etc.</p>
        </div>
    </div>

    <!-- offcanvas 7 -->
    <div class="offcanvas offcanvas-start" id="offcanvas7" data-bs-backdrop="false">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Offcanvas without backdrop</h5>
            <button class="btn btn-label-danger btn-icon" data-bs-dismiss="offcanvas">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <p class="text-muted mb-0">Some text as placeholder. In real life you can have the elements you have chosen.
                Like, text, images, lists, etc.</p>
        </div>
    </div>
    <!-- End offcanvas -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
