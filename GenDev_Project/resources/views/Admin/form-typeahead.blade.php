@extends('layouts.master')

@section('title')
    Typeahead
@endsection

@section('topbar-title')
    Forms
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Typeahead</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        <strong>TypeaheadJS</strong> is a flexible javascript library that provides a strong foundation for
                        building robust typeaheads. For more info please visit the
                        <a href="http://twitter.github.io/typeahead.js" target="_blank">plugin's page</a>
                    </p>
                    <div class="d-grid gap-3">
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label">Basic demo</label>
                            </div>
                            <div class="col-sm-5 col-lg-6"><input type="text" class="form-control typeahead"
                                    id="typeahead-1" placeholder="Type here..." /></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label">Suggestion engine (Bloodhound)</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <div class="mb-2"><input type="text" class="form-control typeahead" id="typeahead-2"
                                        placeholder="Type here..." /></div>
                                <p class="mb-0">Bloodhound offers advanced functionalities such as prefetching and
                                    backfilling with remote data</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label">Remote</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <div class="mb-2"><input type="text" class="form-control typeahead" id="typeahead-3"
                                        placeholder="Type here..." /></div>
                                <p class="mb-0">Prefetch data is fetched and processed on initialization</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label">Custom template</label>
                            </div>
                            <div class="col-sm-5 col-lg-6">
                                <div class="mb-2"><input type="text" class="form-control typeahead" id="typeahead-4"
                                        placeholder="Type here..." /></div>
                                <p class="mb-0">Custom templates give you full control over how suggestions get rendered
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label">Default suggestion</label>
                            </div>
                            <div class="col-sm-5 col-lg-6"><input type="text" class="form-control typeahead"
                                    id="typeahead-5" placeholder="Type here..." /></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-2">
                                <label class="col-form-label">Multiple datasets</label>
                            </div>
                            <div class="col-sm-5 col-lg-6"><input type="text" class="form-control typeahead"
                                    id="typeahead-6" placeholder="Type here..." /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/libs/typeahead.js/dist/typeahead.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-typeahead.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
