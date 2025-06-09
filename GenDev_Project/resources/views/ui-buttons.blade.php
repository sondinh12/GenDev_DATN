@extends('layouts.master')

@section('title')
    Buttons
@endsection

@section('topbar-title')
    Elements
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Variants</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">The <code>.btn</code> classes are designed to be used with the
                        <code>&lt;button&gt;</code> element. However, you can also use these classes on
                        <code>&lt;a&gt;</code> or <code>&lt;input&gt;</code> elements (though some browsers may apply a
                        slightly different rendering).
                    </p>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Solid</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">These is a standard button variant, you can use these by extending
                                <code>.btn-{color}</code> classes
                            </p>
                            <div class="hstack gap-2">
                                <button class="btn btn-primary">Primary</button>
                                <button class="btn btn-secondary">Secondary</button>
                                <button class="btn btn-success">Success</button>
                                <button class="btn btn-warning">Warning</button>
                                <button class="btn btn-danger">Danger</button>
                                <button class="btn btn-info">Info</button>
                                <button class="btn btn-dark">Dark</button>
                                <button class="btn btn-light">Light</button>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Outline</h3>
                        </div>
                        <div class="card-body">

                            <p class="text-muted">Replace the default modifier classes with the
                                <code>.btn-outline-{color}</code> to apply these variants
                            </p>
                            <div class="hstack gap-2">
                                <button class="btn btn-outline-primary">Primary</button> <button
                                    class="btn btn-outline-secondary">Secondary</button>
                                <button class="btn btn-outline-success">Success</button> <button
                                    class="btn btn-outline-warning">Warning</button>
                                <button class="btn btn-outline-danger">Danger</button> <button
                                    class="btn btn-outline-info">Info</button>
                                <button class="btn btn-outline-dark">Dark</button> <button
                                    class="btn btn-outline-light">Light</button>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Flat</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Replace the default modifier classes with the
                                <code>.btn-flat-{color}</code> to apply these variants
                            </p>
                            <div class="hstack gap-2">
                                <button class="btn btn-flat-primary">Primary</button>
                                <button class="btn btn-flat-secondary">Secondary</button>
                                <button class="btn btn-flat-success">Success</button>
                                <button class="btn btn-flat-warning">Warning</button>
                                <button class="btn btn-flat-danger">Danger</button>
                                <button class="btn btn-flat-info">Info</button>
                                <button class="btn btn-flat-dark">Dark</button>
                                <button class="btn btn-flat-light">Light</button>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Label</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Replace the default modifier classes with the
                                <code>.btn-label-{color}</code> to apply these variants
                            </p><button class="btn btn-label-primary">Primary</button> <button
                                class="btn btn-label-secondary">Secondary</button> <button
                                class="btn btn-label-success">Success</button> <button
                                class="btn btn-label-warning">Warning</button> <button
                                class="btn btn-label-danger">Danger</button> <button
                                class="btn btn-label-info">Info</button> <button class="btn btn-label-dark">Dark</button>
                            <button class="btn btn-label-light">Light</button>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Text</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Replace the default modifier classes with the
                                <code>.btn-text-{color}</code> to apply these variants
                            </p>
                            <div class="hstack gap-2">
                                <button class="btn btn-text-primary">Primary</button>
                                <button class="btn btn-text-secondary">Secondary</button>
                                <button class="btn btn-text-success">Success</button>
                                <button class="btn btn-text-warning">Warning</button>
                                <button class="btn btn-text-danger">Danger</button>
                                <button class="btn btn-text-info">Info</button>
                                <button class="btn btn-text-dark">Dark</button>
                                <button class="btn btn-text-light">Light</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->

    <div class="row">
        <div class="col-md-7">
            <div class="card border">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Pill buttons</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Extend button class with <code>.rounded-pill</code> to make the button more
                        rounded.</p>
                    <div class="hstack gap-2">
                        <button class="btn btn-label-primary rounded-pill">Primary</button>
                        <button class="btn btn-label-secondary rounded-pill">Secondary</button>
                        <button class="btn btn-outline-success rounded-pill">Success</button>
                        <button class="btn btn-outline-warning rounded-pill">Warning</button>
                        <button class="btn btn-flat-danger rounded-pill">Danger</button>
                        <button class="btn btn-flat-info rounded-pill">Info</button>
                        <button class="btn btn-dark rounded-pill">Dark</button>
                        <button class="btn btn-light rounded-pill">Light</button>
                    </div>
                </div>
            </div>
            <div class="card border">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Sizing</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Make your button larger or smaller by adding <code>.btn-lg</code> or
                        <code>.btn-sm</code> classes to button.
                    </p>
                    <div class="hstack gap-2">
                        <button class="btn btn-primary btn-sm">Smaller</button>
                        <button class="btn btn-secondary">Default</button>
                        <button class="btn btn-success btn-lg">Larger</button>
                        <button class="btn btn-dark rounded-pill btn-sm">Smaller</button>
                        <button class="btn btn-success rounded-pill">Default</button>
                        <button class="btn btn-info rounded-pill btn-lg">Larger</button>
                        <button class="btn btn-warning btn-icon btn-sm"><i class="fa fa-star"></i></button>
                        <button class="btn btn-danger btn-icon"><i class="fa fa-cog"></i></button>
                        <button class="btn btn-info btn-icon btn-lg"><i class="fa fa-wrench"></i></button>
                        <button class="btn btn-warning btn-icon btn-circle btn-sm"><i class="fa fa-rocket"></i></button>
                        <button class="btn btn-danger btn-icon btn-circle"><i class="fa fa-anchor"></i></button>
                        <button class="btn btn-info btn-icon btn-circle btn-lg"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
            <div class="card border">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Taller, wider and block</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">You can't use the classes below together with <code>.btn-icon</code></p>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Wide</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Add <code>.btn-{wide|wider|widest}</code> to make your button wider.</p>
                            <div class="hstack gap-2">
                                <button class="btn btn-primary btn-wide">Wide</button>
                                <button class="btn btn-primary btn-wider">Wider</button>
                                <button class="btn btn-primary btn-widest">Widest</button>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Tall</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Add <code>.btn-{tall|taller|tallest}</code> to make your button taller.
                            </p>
                            <div class="hstack gap-2">
                                <button class="btn btn-primary btn-tall">Tall</button>
                                <button class="btn btn-primary btn-taller">Taller</button>
                                <button class="btn btn-primary btn-tallest">Tallest</button>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Block</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Create responsive stacks of full-width, “block buttons” like those in
                                Bootstrap 4 with a mix of our display and gap utilities.</p>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary">Block</button>
                                <button class="btn btn-label-primary">Block</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card border">
                <div class="card-header">
                    <h3 class="card-title">Button icon</h3>
                </div>
                <div class="card-body pb-0">
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Square buttons</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">If you need square button with an icon inside, you can use
                                <code>.btn-icon</code> and combine with button variant classes.
                            </p>
                            <div class="hstack gap-2">
                                <button class="btn btn-secondary btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-anchor">
                                        <circle cx="12" cy="5" r="3"></circle>
                                        <line x1="12" y1="22" x2="12" y2="8"></line>
                                        <path d="M5 12H2a10 10 0 0 0 20 0h-3"></path>
                                    </svg>
                                </button>
                                <button class="btn btn-outline-success btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive">
                                        <polyline points="21 8 21 21 3 21 3 8"></polyline>
                                        <rect x="1" y="3" width="22" height="5"></rect>
                                        <line x1="10" y1="12" x2="14" y2="12"></line>
                                    </svg>
                                </button>
                                <button class="btn btn-outline-warning btn-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-camera">
                                        <path
                                            d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                        </path>
                                        <circle cx="12" cy="13" r="4"></circle>
                                    </svg></button> <button class="btn btn-outline-info btn-icon"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                                <button class="btn btn-primary btn-icon"><i class="fa fa-times"></i></button>
                                <button class="btn btn-label-danger btn-icon"><i class="fa fa-wrench"></i></button>
                                <button class="btn btn-label-info btn-icon"><i class="fa fa-cog"></i></button>
                                <button class="btn btn-flat-primary btn-icon"><i class="fa fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Circle buttons</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Make your icon buttons circular by extending <code>.btn-icon</code> with
                                <code>.btn-circle</code> modifier class.
                            </p>
                            <div class="hstack gap-2">
                                <button class="btn btn-secondary btn-icon btn-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-anchor">
                                        <circle cx="12" cy="5" r="3"></circle>
                                        <line x1="12" y1="22" x2="12" y2="8"></line>
                                        <path d="M5 12H2a10 10 0 0 0 20 0h-3"></path>
                                    </svg>
                                </button>
                                <button class="btn btn-outline-success btn-icon btn-circle"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive">
                                        <polyline points="21 8 21 21 3 21 3 8"></polyline>
                                        <rect x="1" y="3" width="22" height="5"></rect>
                                        <line x1="10" y1="12" x2="14" y2="12"></line>
                                    </svg>
                                </button>
                                <button class="btn btn-outline-warning btn-icon btn-circle"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera">
                                        <path
                                            d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                        </path>
                                        <circle cx="12" cy="13" r="4"></circle>
                                    </svg>
                                </button>
                                <button class="btn btn-outline-info btn-icon btn-circle"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                                <button class="btn btn-primary btn-icon btn-circle"><i class="fa fa-times"></i></button>
                                <button class="btn btn-label-danger btn-icon btn-circle"><i
                                        class="fa fa-wrench"></i></button>
                                <button class="btn btn-label-info btn-icon btn-circle"><i class="fa fa-cog"></i></button>
                                <button class="btn btn-flat-primary btn-icon btn-circle"><i
                                        class="fa fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Icon with text</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">If you want to use icon with text, you don't need to apply
                                <code>.btn-icon</code>
                            </p>
                            <div class="hstack gap-2">
                                <button class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye me-2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg> Button</button>
                                <button class="btn btn-label-info">Button <svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-camera ms-2">
                                        <path
                                            d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                        </path>
                                        <circle cx="12" cy="13" r="4"></circle>
                                    </svg>
                                </button>
                                <button class="btn btn-outline-danger"><i class="fa fa-cog me-2"></i> Button</button>
                                <button class="btn btn-flat-success">Button <i class="fa fa-check ms-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">States</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.active</code> or <code>.disabled</code> for the active or inactive
                        button appearance.</p><button class="btn btn-primary active">Active</button> <button
                        class="btn btn-primary disabled">Disabled</button>
                </div>
            </div>
            <div class="card border">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Addon</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">You can add a counter or marker to button by adding
                        <code>.btn-{marker|counter}</code> and combine with <a
                            href="../../elements/base/badge.html">badge</a> or <a
                            href="../../elements/base/marker.html">marker</a> component.
                    </p>
                    <div class="hstack gap-2">
                        <a href="#!" class="btn btn-primary">Button<div class="btn-marker"><span
                                    class="badge badge-secondary btn-counter">12</span></div></a>
                        <a href="#!" class="btn btn-primary">Button<div class="btn-marker"><span
                                    class="badge badge-secondary rounded-pill btn-counter">12</span></div></a>
                        <a href="#!" class="btn btn-primary">Button<div class="btn-marker"><i
                                    class="marker marker-dot text-success"></i></div></a>
                        <a href="#!" class="btn btn-primary btn-icon"><i class="fa fa-cog"></i>
                            <div class="btn-marker"><span class="badge badge-secondary btn-counter">12</span></div>
                        </a>
                        <a href="#!" class="btn btn-primary btn-icon"><i class="fa fa-star"></i>
                            <div class="btn-marker"><span class="badge badge-secondary rounded-pill btn-counter">12</span>
                            </div>
                        </a>
                        <a href="#!" class="btn btn-primary btn-icon"><i class="fa fa-wrench"></i>
                            <div class="btn-marker"><i class="marker marker-dot text-success"></i></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
