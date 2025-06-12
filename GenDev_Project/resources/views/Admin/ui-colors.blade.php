@extends('layouts.master')

@section('title')
    Grid
@endsection

@section('topbar-title')
    Elements
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Contextual color</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">We have a series of colors that are used by default and you can use these helper
                        classes for most components</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>State</td>
                                <td>Postfix</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="badge badge-primary">Primary</span></td>
                                <td><code>*-primary</code></td>
                            </tr>
                            <tr>
                                <td><span class="badge badge-secondary">Secondary</span></td>
                                <td><code>*-secondary</code></td>
                            </tr>
                            <tr>
                                <td><span class="badge badge-success">Success</span></td>
                                <td><code>*-success</code></td>
                            </tr>
                            <tr>
                                <td><span class="badge badge-info">Info</span></td>
                                <td><code>*-info</code></td>
                            </tr>
                            <tr>
                                <td><span class="badge badge-warning">Warning</span></td>
                                <td><code>*-warning</code></td>
                            </tr>
                            <tr>
                                <td><span class="badge badge-danger">Danger</span></td>
                                <td><code>*-danger</code></td>
                            </tr>
                            <tr>
                                <td><span class="badge badge-light">Light</span></td>
                                <td><code>*-light</code></td>
                            </tr>
                            <tr>
                                <td><span class="badge badge-dark">Dark</span></td>
                                <td><code>*-dark</code></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-muted mb-0">For each color has its functionality in application as main color of
                        application <strong>(primary)</strong> or warnings to user <strong>(warning)</strong></p>
                </div>
            </div>
            <!-- <div class="card">
                    <div class="card-header card-header-bordered">
                        <h3 class="card-title">Button examples</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Apply color classes to any component such as button</p><button class="btn btn-primary">Primary</button> <button class="btn btn-secondary">Secondary</button> <button class="btn btn-success">Success</button> <button class="btn btn-warning">Warning</button> <button class="btn btn-danger">Danger</button> <button class="btn btn-info">Info</button>
                    </div>
                </div> -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Examples</h3>
                </div>
                <div class="card-body">
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Text</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use <code>text-{color}</code> to applying contextual color to text</p>
                            <div class="d-flex gap-2 flex-wrap">
                                <span class="text-primary bg-light px-2 py-1 rounded">primary</span>
                                <span class="text-primary-emphasis bg-light px-2 py-1 rounded">primary-emphasis</span>
                                <span class="text-secondary bg-light px-2 py-1 rounded">secondary</span>
                                <span class="text-secondary-emphasis bg-light px-2 py-1 rounded">secondary-emphasis</span>
                                <span class="text-success bg-light px-2 py-1 rounded">success</span>
                                <span class="text-success-emphasis bg-light px-2 py-1 rounded">success-emphasis</span>
                                <span class="text-info bg-light px-2 py-1 rounded">info</span>
                                <span class="text-info-emphasis bg-light px-2 py-1 rounded">info-emphasis</span>
                                <span class="text-warning bg-light px-2 py-1 rounded">warning</span>
                                <span class="text-warning-emphasis bg-light px-2 py-1 rounded">warning-emphasis</span>
                                <span class="text-danger bg-light px-2 py-1 rounded">danger</span>
                                <span class="text-danger-emphasis bg-light px-2 py-1 rounded">danger-emphasis</span>
                                <span class="text-body bg-light px-2 py-1 rounded">text-body</span>
                                <span class="text-body-emphasis bg-light px-2 py-1 rounded">text-body-emphasis</span>
                                <span class="text-body-secondary bg-light px-2 py-1 rounded">text-body-secondary</span>
                                <span class="text-body-tertiary bg-light px-2 py-1 rounded">text-body-tertiary</span>
                                <span class="text-black bg-light px-2 py-1 rounded">text-black</span>
                                <span class="text-black-50 bg-light px-2 py-1 rounded">text-black-50</span>
                                <span class="text-white bg-dark px-2 py-1 rounded">text-white</span>
                                <span class="text-white-50 bg-dark px-2 py-1 rounded">text-white-50</span>
                            </div>
                        </div>
                    </div>
                    <div class="card border mb-0">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Background</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Use <code>bg-{color}</code> to applying contextual color to background</p>
                            <div class="d-flex gap-2 flex-wrap">
                                <span class="bg-primary px-2 py-1 rounded text-white">Primary</span>
                                <span class="bg-primary-subtle px-2 py-1  rounded">Primary-subtle</span>
                                <span class="bg-secondary px-2 py-1 rounded text-white">Secondary</span>
                                <span class="bg-secondary-subtle px-2 py-1 rounded">Secondary-subtle</span>
                                <span class="bg-success px-2 py-1 rounded text-white">Success</span>
                                <span class="bg-success-subtle px-2 py-1 rounded">Success-subtle</span>
                                <span class="bg-info px-2 py-1 rounded text-white">Info</span>
                                <span class="bg-info-subtle px-2 py-1 rounded">Info-subtle</span>
                                <span class="bg-warning px-2 py-1 rounded text-white">Warning</span>
                                <span class="bg-warning-subtle px-2 py-1 rounded">Warning-subtle</span>
                                <span class="bg-danger px-2 py-1 rounded text-white">Danger</span>
                                <span class="bg-danger-subtle px-2 py-1 rounded">Danger-subtle</span>
                                <span class="bg-light px-2 py-1 rounded">Light</span>
                                <span class="bg-light-subtle px-2 py-1 rounded">Light-subtle</span>
                                <span class="bg-dark px-2 py-1 rounded text-white">Dark</span>
                                <span class="bg-dark-subtle px-2 py-1 rounded">Dark-subtle</span>
                                <span class="bg-body px-2 py-1 rounded">Body</span>
                                <span class="bg-body-tertiary px-2 py-1 rounded">Body-tertiary</span>
                                <span class="bg-white px-2 py-1 rounded text-black">White</span>
                                <span class="bg-black px-2 py-1 rounded text-white">Black</span>
                                <span class="bg-transparent px-2 py-1 rounded text-white">Transparent</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
