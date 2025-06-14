@extends('layouts.master')

@section('title')
    Dropdowns
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
                    <h3 class="card-title">Dropdown examples</h3>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3">
                        <div class="row">
                            <label class="col-sm-4 col-lg-2 col-form-label">Basic demo</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">Click me <i
                                                class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i></button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item"
                                                href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">You need to add <code>data-bs-toggle="dropdown"</code> to
                                    initialize dropdown trigger</p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-lg-2 col-form-label">States</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle" data-bs-toggle="dropdown">Click
                                            me <i class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Regular link</a>
                                            <a class="dropdown-item active" href="#">Active link</a>
                                            <a class="dropdown-item disabled" href="#">Disabled link</a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Add <code>.active</code> or <code>.disabled</code> to items in
                                    the dropdown to style them as active or disabled</p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Animated dropdown</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">Click me <i
                                                class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i></button>
                                        <div class="dropdown-menu dropdown-menu-animated" style="">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Extend <code>.dropdown-menu</code> with
                                    <code>.dropdown-menu-animated</code> to apply animation when dropdown opened
                                </p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Icons</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle" data-bs-toggle="dropdown">Click
                                            me <i class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-animated">
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-rocket"></i>
                                                </div>
                                                <span class="dropdown-content">Action</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-comments"></i>
                                                </div>
                                                <span class="dropdown-content">Another action</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-paper-plane"></i>
                                                </div>
                                                <span class="dropdown-content">Something else here</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Use <code>.dropdown-icon</code> class with an icon inside to add
                                    an icon before the content</p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Bullet</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle" data-bs-toggle="dropdown">Click
                                            me <i class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i></button>
                                        <div class="dropdown-menu dropdown-menu-animated">
                                            <a class="dropdown-item" href="#">
                                                <i class="dropdown-bullet"></i>
                                                <span class="dropdown-content">Action</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="dropdown-bullet"></i>
                                                <span class="dropdown-content">Another action</span>
                                            </a>
                                            <a class="dropdown-item" href="#"><i class="dropdown-bullet"></i>
                                                <span class="dropdown-content">Something else here</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">You can add circle bullet by using <code>.dropdown-bullet</code>
                                    with <code>&lt;i&gt;</code> tag</p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Header</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle"
                                            data-bs-toggle="dropdown">Click me <i
                                                class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-animated">
                                            <h6 class="dropdown-header">Header</h6>
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-rocket"></i>
                                                </div>
                                                <span class="dropdown-content">Action</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-comments"></i>
                                                </div>
                                                <span class="dropdown-content">Another action</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-paper-plane"></i>
                                                </div>
                                                <span class="dropdown-content">Something else here</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Insert header to a dropdown menu with
                                    <code>.dropdown-header</code> and apply the class with <code>&lt;h*&gt;</code> tag.
                                </p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Divider</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle"
                                            data-bs-toggle="dropdown">Click me <i
                                                class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i></button>
                                        <div class="dropdown-menu dropdown-menu-animated">
                                            <h6 class="dropdown-header">Header</h6>
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-rocket"></i>
                                                </div>
                                                <span class="dropdown-content">Action</span>
                                            </a><a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-comments"></i>
                                                </div>
                                                <span class="dropdown-content">Another action</span>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <div class="dropdown-icon">
                                                    <i class="fa fa-paper-plane"></i>
                                                </div>
                                                <span class="dropdown-content">Something else here</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Dividing your dropdown items with <code>.dropdown-divider</code>
                                    class</p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Centered</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="d-inline-block me-2">
                                        <div class="dropdown-center">
                                            <button class="btn btn-primary py-0 dropdown-toggle"
                                                data-bs-toggle="dropdown">Centered dropdown <i
                                                    class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Action two</a>
                                                <a class="dropdown-item" href="#">Action three</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-inline-block">
                                        <div class="dropup-center dropup">
                                            <button class="btn btn-primary py-0 dropdown-toggle"
                                                data-bs-toggle="dropdown">Centered dropdup <i
                                                    class="mdi mdi-chevron-up fs-17 align-middle ms-2"></i></button>
                                            <div class="dropdown-menu dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Action two</a>
                                                <a class="dropdown-item" href="#">Action three</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Make the dropdown menu centered below or above the toggle with
                                    <code>.{dropdown|dropup}-center</code> on the parent element.
                                </p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Orientation</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="d-inline-block me-2">
                                        <div class="dropdown">
                                            <button class="btn btn-primary py-0 dropdown-toggle"
                                                data-bs-toggle="dropdown">Dropdown
                                                <i class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <div class="dropdown dropup">
                                            <button class="btn btn-primary py-0 dropdown-toggle"
                                                data-bs-toggle="dropdown">Dropup <i
                                                    class="mdi mdi-chevron-up fs-17 align-middle ms-2"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <div class="dropdown dropend">
                                            <button class="btn btn-primary py-0 dropdown-toggle"
                                                data-bs-toggle="dropdown">Dropend <i
                                                    class="mdi mdi-chevron-right fs-17 align-middle ms-2"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-inline-block">
                                        <div class="dropdown dropstart">
                                            <button class="btn btn-primary py-0 dropdown-toggle"
                                                data-bs-toggle="dropdown"><i
                                                    class="mdi mdi-chevron-left fs-17 align-middle me-2"></i> Dropstart
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Change dropdown menu orientation by applying
                                    <code>.dropstart|.dropend|.dropup</code> classes to <code>.dropdown</code> elements
                                </p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Menu alignment</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="d-inline-block me-2">
                                        <div class="dropdown">
                                            <button class="btn btn-primary py-0 dropdown-toggle"
                                                data-bs-toggle="dropdown">Start <i
                                                    class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-start dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-inline-block">
                                        <div class="dropdown">
                                            <button class="btn btn-primary py-0 dropdown-toggle"
                                                data-bs-toggle="dropdown">End <i
                                                    class="mdi mdi-chevron-right fs-17 align-middle ms-2"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Apply <code>.dropdown-menu-{start|end}</code> to
                                    <code>.dropdown-menu</code> elements to change alignment
                                </p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Text</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle"
                                            data-bs-toggle="dropdown">Click me <i
                                                class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i></button>
                                        <div class="dropdown-menu dropdown-menu-animated p-4" style="max-width: 200px;">
                                            <p>Some example text that's free-flowing within the dropdown menu.</p>
                                            <p class="text-muted mb-0">And this is more example text.</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">You can insert any elements into dropdown menu</p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Form</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle"
                                            data-bs-toggle="dropdown">Click me <i
                                                class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-animated">
                                            <form class="d-grid gap-3 px-4 py-3">
                                                <div>
                                                    <label for="exampleDropdownFormEmail1" class="form-label">Email
                                                        address</label>
                                                    <input type="email" class="form-control"
                                                        id="exampleDropdownFormEmail1" placeholder="email@example.com">
                                                </div>
                                                <div>
                                                    <label for="exampleDropdownFormPassword1"
                                                        class="form-label">Password</label>
                                                    <input type="password" class="form-control"
                                                        id="exampleDropdownFormPassword1" placeholder="Password">
                                                </div>
                                                <div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="dropdownCheck">
                                                        <label class="form-check-label" for="dropdownCheck">Remember
                                                            me</label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Sign in</button>
                                            </form>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">New around here? Sign up</a>
                                            <a class="dropdown-item" href="#">Forgot password?</a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Put a form within a dropdown menu, or make it into a dropdown
                                    menu, and use margin or padding utilities to give it the negative space you require.</p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Submenu</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle"
                                            data-bs-toggle="dropdown">Click me <i
                                                class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-animated">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-submenu">
                                                <a href="#!" class="dropdown-item">
                                                    <span class="dropdown-content">Submenu</span>
                                                    <div class="dropdown-addon">
                                                        <i class="mdi mdi-chevron-right"></i>
                                                    </div>
                                                </a>
                                                <div class="dropdown-submenu-menu dropdown-submenu-end">
                                                    <a class="dropdown-item" href="#">Item 1</a>
                                                    <a class="dropdown-item" href="#">Item 2</a>
                                                    <div class="dropdown-submenu">
                                                        <a href="#!" class="dropdown-item">
                                                            <span class="dropdown-content">Submenu</span>
                                                            <div class="dropdown-addon">
                                                                <i class="mdi mdi-chevron-right"></i>
                                                            </div>
                                                        </a>
                                                        <div class="dropdown-submenu-menu dropdown-submenu-end">
                                                            <a class="dropdown-item" href="#">Item 1</a>
                                                            <a class="dropdown-item" href="#">Item 2</a>
                                                            <div class="dropdown-submenu">
                                                                <a href="#!" class="dropdown-item">
                                                                    <div class="dropdown-addon">
                                                                        <i class="mdi mdi-chevron-left caret-start"></i>
                                                                    </div>
                                                                    <span class="dropdown-content">Another submenu</span>
                                                                </a>
                                                                <div class="dropdown-submenu-menu dropdown-submenu-start">
                                                                    <a class="dropdown-item" href="#">Item 1</a>
                                                                    <a class="dropdown-item" href="#">Item 2</a>
                                                                    <a class="dropdown-item" href="#">Item 3</a>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Item 3</a>
                                                        </div>
                                                    </div><a class="dropdown-item" href="#">Item 3</a>
                                                </div>
                                            </div>
                                            <div class="dropdown-submenu">
                                                <a href="#!" class="dropdown-item">
                                                    <span class="dropdown-content">Another submenu</span>
                                                    <div class="dropdown-addon">
                                                        <i class="mdi mdi-chevron-right"></i>
                                                    </div>
                                                </a>
                                                <div class="dropdown-submenu-menu dropdown-submenu-end">
                                                    <a class="dropdown-item" href="#">Item 1</a>
                                                    <a class="dropdown-item" href="#">Item 2</a>
                                                    <a class="dropdown-item" href="#">Item 3</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Item 4</a>
                                                    <a class="dropdown-item" href="#">Item 5</a>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">You can insert a submenu by implementing
                                    <code>.dropdown-submenu-menu</code> element and it also support orientation classes
                                    <code>.dropdown-submenu-{start|end}</code>
                                </p>
                            </div>
                        </div>
                        <div class="row"><label class="col-sm-4 col-lg-2 col-form-label">Grid</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-primary py-0 dropdown-toggle"
                                            data-bs-toggle="dropdown">Click me <i
                                                class="mdi mdi-chevron-down fs-17 align-middle ms-2"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-animated">
                                            <div class="dropdown-row">
                                                <div class="dropdown-col">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                                <div class="dropdown-col">
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-rocket"></i>
                                                        </div>
                                                        <span class="dropdown-content">Action</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-comments"></i>
                                                        </div>
                                                        <span class="dropdown-content">Another action</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="dropdown-icon">
                                                            <i class="fa fa-paper-plane"></i>
                                                        </div>
                                                        <span class="dropdown-content">Something else here</span>
                                                    </a>
                                                </div>
                                                <div class="dropdown-col">
                                                    <h6 class="dropdown-header">Header</h6>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="dropdown-bullet"></i>
                                                        <span class="dropdown-content">Action</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="dropdown-bullet"></i>
                                                        <span class="dropdown-content">Another action</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Combine <code>.dropdown-row</code> and
                                    <code>.dropdown-col</code> to make the grid
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
