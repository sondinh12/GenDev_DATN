@extends('layouts.master')

@section('title')
    Spinner
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
                    <p class="text-muted"><strong>Spinners</strong> can be used to show the loading state in your projects.
                        You can customize the color with text color utilities</p>
                    <div class="row g-3">
                        <div class="col-xl-6">
                            <div class="card border">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Border spinner</h3>
                                </div>
                                <div class="card-body">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-border text-secondary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-border text-success" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-border text-danger" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-border text-warning" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-border text-info" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-border text-light" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-border text-dark" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Sizing</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Add <code>.spinner-border-sm</code> and
                                        <code>.spinner-grow-sm</code> to make a smaller spinner or, use custom CSS or inline
                                        styles to change the dimensions as needed.
                                    </p>
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-grow spinner-grow-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-border" style="width: 2.5rem; height: 2.5rem;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-grow" style="width: 2.5rem; height: 2.5rem;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-6">
                            <div class="card border">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Growing spinner</h3>
                                </div>
                                <div class="card-body">
                                    <div class="spinner-grow text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-secondary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-success" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-danger" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-warning" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-info" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-light" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-dark" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->

                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Buttons</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Use spinners within buttons to indicate an action is currently
                                        processing or taking place</p>
                                    <button class="btn btn-primary" type="button" disabled="disabled">
                                        <span class="spinner-border spinner-border-sm align-middle" role="status"
                                            aria-hidden="true"></span>
                                        <span class="sr-only">Loading...</span>
                                    </button>
                                    <button class="btn btn-primary" type="button" disabled="disabled">
                                        <span class="spinner-border spinner-border-sm me-2 align-middle" role="status"
                                            aria-hidden="true"></span> Loading...</button>
                                    <button class="btn btn-primary" type="button" disabled="disabled">
                                        <span class="spinner-grow spinner-grow-sm align-middle" role="status"
                                            aria-hidden="true"></span>
                                        <span class="sr-only">Loading...</span>
                                    </button>
                                    <button class="btn btn-primary" type="button" disabled="disabled">
                                        <span class="spinner-grow spinner-grow-sm me-2 align-middle" role="status"
                                            aria-hidden="true"></span> Loading...</button>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">

        </div>
        <!-- end col -->
        <div class="col-xl-6">

        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
