@extends('layouts.master')

@section('title')
    Progress Bars
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
                    <h3 class="card-title">Basic</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Progress components are built with two HTML elements, some CSS to set the width,
                        and a few attributes. We don’t use <a
                            href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/progress">the HTML5
                            <code>&lt;progress&gt;</code> element</a>, ensuring you can stack progress bars, animate them,
                        and place text labels over them.</p>
                    <div class="d-grid gap-2">
                        <div class="progress">
                            <div class="progress-bar" style="width: 25%"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 75%"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Striped</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.progress-bar-striped</code> to any <code>.progress-bar</code> to apply
                        a stripe via CSS gradient over the progress bar’s background color.</p>
                    <div class="card border">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-primary" style="width: 20%"></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-secondary" style="width: 30%"></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-info" style="width: 40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted">The striped gradient can also be animated. Add <code>.progress-bar-animated</code>
                        to <code>.progress-bar</code> to animate the stripes right to left via CSS3 animations.</p>
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                        style="width: 20%"></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                        style="width: 30%"></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                        style="width: 40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Multiple</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Include multiple progress bars in a progress component if you need.</p>
                    <div class="progress">
                        <div class="progress-bar" style="width: 15%"></div>
                        <div class="progress-bar bg-success" style="width: 30%"></div>
                        <div class="progress-bar bg-info" style="width: 20%"></div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Contextual color</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use background utility classes to change the appearance of individual progress
                        bars.</p>
                    <div class="d-grid gap-2">
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: 20%"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" style="width: 30%"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 40%"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: 50%"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: 60%"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-dark" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Label</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add labels to your progress bars by placing text within the
                        <code>.progress-bar</code>.
                    </p>
                    <div class="d-grid gap-2">
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: 20%; margin:auto 0;">20%</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" style="width: 30%; margin:auto 0;">30%</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 40%; margin:auto 0;">40%</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Height</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use predefined modifier classes <code>.progress-{sm|lg}</code> to change progress
                        element height.</p>
                    <div class="card border">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 25%;"></div>
                                </div>
                                <div class="progress progress-lg">
                                    <div class="progress-bar" style="width: 25%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted">You can manually set a <code>height</code> value on the <code>.progress</code>,
                        so if you change that value the inner <code>.progress-bar</code> will automatically resize
                        accordingly.</p>
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <div class="progress" style="height: 2px;">
                                    <div class="progress-bar" style="width: 25%;"></div>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar" style="width: 25%;"></div>
                                </div>
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
