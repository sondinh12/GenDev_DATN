@extends('layouts.master')

@section('title')
    Base
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
                <div class="card-header">
                    <h3 class="card-title">Basic</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Bordered</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="card-footer card-footer-bordered">
                    <button class="btn btn-primary">Submit</button>
                    <button class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
            <!-- end card -->
            <div class="card card-scroll">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Scrollable</h3>
                </div>
                <div class="card-body" data-simplebar="init" data-simplebar-direction="ltr" style="max-height: 474px;">
                    <div class="simplebar-wrapper" style="margin: -12px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 12px;">
                                        <h5>Scroll me</h5>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                            facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac,
                                            vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus
                                            sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                            scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non
                                            metus auctor fringilla.</p>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                            facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac,
                                            vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus
                                            sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                            scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non
                                            metus auctor fringilla.</p>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                            facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac,
                                            vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus
                                            sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                            scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non
                                            metus auctor fringilla.</p>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                            facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac,
                                            vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus
                                            sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                            scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non
                                            metus auctor fringilla.</p>
                                        <p class="text-muted mb-0">Cras mattis consectetur purus sit amet fermentum. Cras
                                            justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta
                                            ac consectetur ac, vestibulum at eros.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 660px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 545px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </div>
                <div class="card-footer card-footer-bordered">
                    <button class="btn btn-primary">Submit</button>
                    <button class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
            <!-- end card -->
            <div class="card ">
                <div class="card-header">
                    <div class="card-icon"><i class="fa fa-calendar-alt fs-17 text-muted"></i></div>
                    <h3 class="card-title">Extended header</h3>
                    <div class="card-addon">
                        <span class="badge badge-primary rounded-pill">9+</span>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="card-footer card-footer-bordered">
                    <button class="btn btn-primary">Submit</button>
                    <button class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <div class="card-icon">
                        <i class="fa fa-cog fs-17 text-muted"></i>
                    </div>
                    <h3 class="card-title">More card</h3>
                    <div class="card-addon">
                        <span class="badge badge-primary rounded-pill">9+</span>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="card-footer card-footer-bordered">
                    <button class="btn btn-primary">Submit</button>
                    <button class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <div class="card-icon">
                        <i class="fa fa-map-marker-alt fs-17 text-muted"></i>
                    </div>
                    <h3 class="card-title">Dropdown</h3>
                    <div class="card-addon">
                        <div class="dropdown">
                            <button class="btn btn-text-secondary btn-icon" type="button" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
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
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="card-footer card-footer-bordered">
                    <button class="btn btn-primary">Submit</button>
                    <button class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Footer</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                    <button class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Footer alignments</h3>
                </div>
                <div class="card-body">
                    <div class="card border">
                        <div class="card-header">
                            <h3 class="card-title">Left</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="card-footer card-footer-bordered text-start">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header">
                            <h3 class="card-title">Center</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="card-footer card-footer-bordered text-center">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                    <div class="card border mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Right</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="card-footer card-footer-bordered text-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Nested</h3>
                </div>
                <div class="card-body">
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Without footer</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum.</p>
                        </div>
                    </div>
                    <div class="card border mb-0">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">With footer</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum.</p>
                        </div>
                        <div class="card-footer card-footer-bordered">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card card-primary">
                <div class="card-header border-primary-subtle">
                    <div class="card-icon">
                        <i class="fa fa-rocket fs-17"></i>
                    </div>
                    <h3 class="card-title">Card color</h3>
                    <div class="card-addon">
                        <span class="badge badge-warning rounded-pill align-middle">9+</span>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-0">Some quick example text to build on the card title and make up the bulk of the card's
                        content. This is a wider card with supporting text below as a natural lead-in to additional content.
                    </p>
                </div>
                <div class="card-footer border-primary-subtle">
                    <button class="btn btn-info">Submit</button>
                    <button class="btn btn-text-light">Cancel</button>
                </div>
            </div>
            <!-- end card -->
            <div class="card card-danger">
                <div class="card-header border-danger-subtle">
                    <div class="card-icon">
                        <i class="fa fa-rocket fs-17"></i>
                    </div>
                    <h3 class="card-title">More card color</h3>
                    <div class="card-addon">
                        <span class="badge badge-info rounded-pill align-middle">9+</span>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-0">With supporting text below as a natural lead-in to additional content. This is a
                        longer card with supporting text below as a natural lead-in to additional content. This content is a
                        little bit longer.</p>
                </div>
                <div class="card-footer border-danger-subtle">
                    <button class="btn btn-primary">Submit</button>
                    <button class="btn btn-text-light">Cancel</button>
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
