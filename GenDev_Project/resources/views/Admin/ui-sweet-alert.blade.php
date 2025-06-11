@extends('layouts.master')

@section('title')
    Sweetalert
@endsection

@section('topbar-title')
    Elements
@endsection

@section('css')
    <!-- Sweet Alert-->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Sweet alert examples</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted"><strong>Sweet alert</strong> is a beautiful, responsive, customizable, accessible
                        replacement for javascripts's popup boxes with zero dependencies. Check <a
                            href="http://sweetalert2.github.io" target="_blank">Sweet Alert's page</a> for more info.</p>
                    <hr>
                    <div class="d-grid gap-3">
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Basic example</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-1">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Subtitle</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-2">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">More content</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-3">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Custom HTML</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-4">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">More buttons</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-5">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Custom position</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-6">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Confirm function</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-7">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Image</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-8">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Close timer</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-9">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">AJAX request</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-10">Click me</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Toast</label>
                            </div>
                            <div class="col-sm-8 col-lg-10">
                                <button class="btn btn-primary" id="swal-11">Click me</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('build/js/pages/sweet-alerts.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
