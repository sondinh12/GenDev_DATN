@extends('layouts.master')

@section('title')
    Datepicker
@endsection

@section('topbar-title')
    Forms
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Date picker</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        A datepicker for Bootstrap, for more info please visit the plugin's <a
                            href="http://uxsolutions.github.io/bootstrap-datepicker" target="_blank">demo page</a> or
                        <a href="http://github.com/uxsolutions/bootstrap-datepicker" target="_blank">Github repository</a>.
                    </p>
                    <div class="d-grid gap-3">
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Basic demo</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <input type="text" class="form-control" placeholder="Select date" id="datepicker-1" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Today highlight</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <input type="text" class="form-control" placeholder="Select date" id="datepicker-2" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Helper buttons</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <input type="text" class="form-control" placeholder="Select date" id="datepicker-3" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Multiple</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <div class="mb-2">
                                    <input type="text" class="form-control" placeholder="Select date"
                                        id="datepicker-4" />
                                </div>
                                <p class="mb-0">You can select multiple date</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Week disabled and highlighted</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <input type="text" class="form-control" placeholder="Select date" id="datepicker-5" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Range picker</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <div class="mb-2">
                                    <div class="input-group input-daterange">
                                        <input type="text" class="form-control" placeholder="From" /> <span
                                            class="input-group-text"><i class="fa fa-ellipsis-h"></i> </span>
                                        <input type="text" class="form-control" placeholder="To" />
                                    </div>
                                </div>
                                <p class="mb-0">Linked pickers for date range selection</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Week calendar</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <div class="mb-2">
                                    <input type="text" class="form-control" placeholder="Select date"
                                        id="datepicker-6" />
                                </div>
                                <p class="mb-0">Show week numbers on the calendar</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Locale</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <input type="text" class="form-control" placeholder="Select date" id="datepicker-7" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label text-sm-end">Inline</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <div id="datepicker-8"></div>
                            </div>
                        </div>
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
    <!-- Bootstrap datepicker -->
    <script src="{{ URL::asset('build/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-datepicker.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
