@extends('layouts.master')

@section('title')
    Placeholder
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
                    <p class="text-muted">Placeholders can be used to enhance the experience of your application. They’re
                        built only with HTML and CSS, meaning you don’t need any JavaScript to create them. You will,
                        however, need some custom JavaScript to toggle their visibility. Their appearance, color, and sizing
                        can be easily customized with our utility classes.</p>
                    <div class="card placeholder-glow border">
                        <div class="card-body">
                            <h5 class="card-title"><span class="placeholder col-6"></span></h5>
                            <p class="card-text"><span class="placeholder col-7"></span> <span
                                    class="placeholder col-4"></span> <span class="placeholder col-4"></span> <span
                                    class="placeholder col-6"></span> <span class="placeholder col-8"></span></p><a
                                href="#" class="btn btn-primary disabled placeholder col-6"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Color</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">By default, the <code>placeholder</code> uses <code>currentColor</code>. This can
                        be overridden with a custom color or utility class.</p>
                    <div class="card border mb-0">
                        <div class="card-body"><span class="placeholder col-12"></span> <span
                                class="placeholder col-12 bg-primary"></span> <span
                                class="placeholder col-12 bg-secondary"></span> <span
                                class="placeholder col-12 bg-success"></span> <span
                                class="placeholder col-12 bg-danger"></span> <span
                                class="placeholder col-12 bg-warning"></span> <span
                                class="placeholder col-12 bg-info"></span> <span class="placeholder col-12 bg-light"></span>
                            <span class="placeholder col-12 bg-dark"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Width</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">You can change the <code>width</code> through grid column classes, width
                        utilities, or inline styles.</p>
                    <div class="card border mb-0">
                        <div class="card-body"><span class="placeholder col-6"></span> <span
                                class="placeholder w-75"></span> <span class="placeholder" style="width: 25%;"></span></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Sizing</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">The size of <code>.placeholder</code>s are based on the typographic style of the
                        parent element. Customize them with sizing modifiers: <code>.placeholder-{xs|sm|lg}</code>.</p>
                    <div class="card border mb-0">
                        <div class="card-body"><span class="placeholder col-12 placeholder-lg"></span> <span
                                class="placeholder col-12"></span> <span class="placeholder col-12 placeholder-sm"></span>
                            <span class="placeholder col-12 placeholder-xs"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Animation</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Animate placeholders with <code>.placeholder-glow</code> or
                        <code>.placeholder-wave</code> to better convey the perception of something being <em>actively</em>
                        loaded.
                    </p>
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="placeholder-glow"><span class="placeholder col-12"></span></div>
                            <div class="placeholder-wave"><span class="placeholder col-12"></span></div>
                        </div>
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
