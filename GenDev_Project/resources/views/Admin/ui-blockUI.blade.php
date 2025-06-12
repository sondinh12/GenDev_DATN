@extends('layouts.master')

@section('title')
    Block-UI
@endsection

@section('topbar-title')
    Elements
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Block UI</h3>
                </div>
                <div class="card-body">
                    <p>The <strong>jQuery BlockUI</strong> lets you simulate synchronous behavior when using AJAX, without
                        locking the browser. BlockUI adds elements to the DOM to give it both the appearance and behavior of
                        blocking user interaction. For more info, you can visit <a href="http://jquery.malsup.com/block"
                            target="_blank">Block UI's page</a>.</p>
                    <hr>
                    <div class="d-grid gap-3">
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Basic demo</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <button class="btn btn-primary" id="blockui-trigger-1">Block</button>
                                    <button class="btn btn-primary" id="blockui-trigger-2">Unblock</button>
                                </div>
                                <p class="text-muted mb-0">Use <code>$('#element').block()</code> to block target element
                                    and <code>$('#element').unblock()</code> for unblocking.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Time Out</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <button class="btn btn-primary" id="blockui-trigger-3">Click me</button>
                                </div>
                                <p class="text-muted mb-0">Set timeout before unblocked by setting <code>timeout</code>
                                    property.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Custom text</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="blockui-trigger-4">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Custom element</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <button class="btn btn-primary" id="blockui-trigger-5">Click me</button>
                                </div>
                                <p class="text-muted mb-0">You can put html elements into <code>message</code> property</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Custom style</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="blockui-trigger-6">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Block page</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <button class="btn btn-primary" id="blockui-trigger-7">Click me</button>
                                </div>
                                <p class="text-muted mb-0">Use <code>$.blockUI()</code> to block the page</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Spinner</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <button class="btn btn-primary" id="blockui-trigger-8">Border</button>
                                    <button class="btn btn-primary" id="blockui-trigger-9">Grow</button>
                                    <button class="btn btn-primary" id="blockui-trigger-10">Spinner only</button>
                                </div>
                                <p class="text-muted mb-0">Mix block message with spinner</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-xl-4">
            <div class="card overflow-hidden" id="blockui-target">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Samples</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <!-- blockUI -->
    <script src="{{ URL::asset('build/libs/block-ui/jquery.blockUI.js') }}"></script>

    <!-- blockUI init -->
    <script src="{{ URL::asset('build/js/pages/jquery.blockUI.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
