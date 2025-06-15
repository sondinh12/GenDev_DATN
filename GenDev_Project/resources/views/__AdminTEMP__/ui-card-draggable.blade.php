@extends('layouts.master')

@section('title')
    Draggable
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
                <div class="card-body">
                    <p class="text-muted mb-0"><strong>SortableJS</strong> is javascript library for reorderable
                        drag-and-drop lists. Check other example on <a href="http://sortablejs.github.io/Sortable"
                            target="_blank">Sortable's page</a></p>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="sortable" id="draggable-3-start">
                <div class="sortable-item">
                    <div class="card">
                        <div class="card-header card-header-bordered card-header-handle">
                            <div class="card-icon sortable-handle">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <h3 class="card-title">Card</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi
                                ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="sortable-item">
                    <div class="card">
                        <div class="card-header card-header-bordered card-header-handle">
                            <div class="card-icon sortable-handle">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            <h3 class="card-title">Card</h3>
                            <div class="card-addon">
                                <span class="badge badge-primary rounded-pill">9+</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi
                                ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="card-footer card-footer-bordered">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="sortable-item">
                    <div class="card">
                        <div class="card-header card-header-bordered card-header-handle">
                            <div class="card-icon sortable-handle">
                                <i class="fa fa-layer-group"></i>
                            </div>
                            <h3 class="card-title">Card</h3>
                            <div class="card-addon">
                                <div class="nav nav-pills" id="card3-tab">
                                    <a class="nav-item nav-link active" id="card3-home-tab" data-bs-toggle="tab"
                                        href="#card3-home">Home</a>
                                    <a class="nav-item nav-link" id="card3-profile-tab" data-bs-toggle="tab"
                                        href="#card3-profile">Profile</a>
                                    <a class="nav-item nav-link" id="card3-contact-tab" data-bs-toggle="tab"
                                        href="#card3-contact">Contact</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="card3-home">
                                    <p class="text-muted mb-0">
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                        the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently with desktop publishing software
                                        like Aldus PageMaker including versions of Lorem Ipsum.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="card3-profile">
                                    <p class="text-muted mb-0">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a
                                        galley of type and scrambled it to make a type specimen book. It has survived not
                                        only five centuries, but also the leap into electronic typesetting, remaining
                                        essentially unchanged
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="card3-contact">
                                    <p class="text-muted mb-0">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a
                                        galley of type and scrambled it to make a type specimen book. It has survived not
                                        only five centuries, but also the leap into electronic typesetting, remaining
                                        essentially unchanged. It
                                        was popularised in the 1960s with the release of Letraset sheets containLorem Ipsum
                                        passages, and more recently with desktop publishing software like Aldus PageMaker
                                        including versions of
                                        Lorem Ipsum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer card-footer-bordered text-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="sortable-item">
                    <div class="card">
                        <div class="card-header card-header-bordered card-header-handle">
                            <div class="card-icon sortable-handle"><i class="fa fa-layer-group d-none"></i></div>
                            <h3 class="card-title">Card</h3>
                            <div class="card-addon">
                                <div class="nav nav-lines card-nav" id="card2-tab">
                                    <a class="nav-item nav-link active" id="card2-home-tab" data-bs-toggle="tab"
                                        href="#card2-home">Home</a>
                                    <a class="nav-item nav-link" id="card2-profile-tab" data-bs-toggle="tab"
                                        href="#card2-profile">Profile</a>
                                    <a class="nav-item nav-link" id="card2-contact-tab" data-bs-toggle="tab"
                                        href="#card2-contact">Contact</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="card2-home">
                                    <p class="text-muted mb-0">
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                        the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently with desktop publishing software
                                        like Aldus PageMaker including versions of Lorem Ipsum.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="card2-profile">
                                    <p class="text-muted mb-0">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a
                                        galley of type and scrambled it to make a type specimen book. It has survived not
                                        only five centuries, but also the leap into electronic typesetting, remaining
                                        essentially unchanged
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="card2-contact">
                                    <p class="text-muted mb-0">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a
                                        galley of type and scrambled it to make a type specimen book. It has survived not
                                        only five centuries, but also the leap into electronic typesetting, remaining
                                        essentially unchanged. It
                                        was popularised in the 1960s with the release of Letraset sheets containLorem Ipsum
                                        passages, and more recently with desktop publishing software like Aldus PageMaker
                                        including versions of
                                        Lorem Ipsum.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="sortable" id="draggable-3-end">
                <div class="sortable-item">
                    <div class="card">
                        <div class="card-header card-header-bordered card-header-handle">
                            <div class="card-icon sortable-handle">
                                <i class="fa fa-moon"></i>
                            </div>
                            <h3 class="card-title">Card</h3>
                            <div class="card-addon">
                                <div class="dropdown">
                                    <button class="btn btn-text-secondary btn-icon" type="button"
                                        data-bs-toggle="dropdown">
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
                            <p class="text-muted mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi
                                ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="card-footer card-footer-bordered">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="sortable-item">
                    <div class="card">
                        <div class="card-header card-header-handle">
                            <div class="card-icon sortable-handle">
                                <i class="fa fa-star"></i>
                            </div>
                            <h3 class="card-title">Card</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi
                                ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="sortable-item">
                    <div class="card">
                        <div class="card-header card-header-bordered card-header-handle">
                            <div class="card-icon sortable-handle">
                                <i class="fa fa-cog"></i>
                            </div>
                            <h3 class="card-title">Card</h3>
                            <div class="card-addon">
                                <div class="nav nav-lines card-nav" id="card1-tab">
                                    <a class="nav-item nav-link active" id="card1-home-tab" data-bs-toggle="tab"
                                        href="#card1-home">Home</a>
                                    <a class="nav-item nav-link" id="card1-profile-tab" data-bs-toggle="tab"
                                        href="#card1-profile">Profile</a>
                                    <a class="nav-item nav-link" id="card1-contact-tab" data-bs-toggle="tab"
                                        href="#card1-contact">Contact</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="card1-home">
                                    <p class="text-muted mb-0">
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                        the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently with desktop publishing software
                                        like Aldus PageMaker including versions of Lorem Ipsum.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="card1-profile">
                                    <p class="text-muted mb-0">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a
                                        galley of type and scrambled it to make a type specimen book. It has survived not
                                        only five centuries, but also the leap into electronic typesetting, remaining
                                        essentially unchanged
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="card1-contact">
                                    <p class="text-muted mb-0">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a
                                        galley of type and scrambled it to make a type specimen book. It has survived not
                                        only five centuries, but also the leap into electronic typesetting, remaining
                                        essentially unchanged. It
                                        was popularised in the 1960s with the release of Letraset sheets containLorem Ipsum
                                        passages, and more recently with desktop publishing software like Aldus PageMaker
                                        including versions of
                                        Lorem Ipsum.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sortable-item">
                    <div class="card card-primary">
                        <div class="card-header card-header-handle">
                            <div class="card-icon sortable-handle">
                                <i class="fa fa-rocket text-white"></i>
                            </div>
                            <h3 class="card-title">Card</h3>
                            <div class="card-addon">
                                <span class="badge badge-warning rounded-pill align-middle">9+</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi
                                ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Submit</button>
                            <button class="btn btn-text-light">Cancel</button>
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
