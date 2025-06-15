@extends('layouts.master')

@section('title')
    Cards
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
                    <p class="text-muted"><strong>Card</strong> is a flexible and extensible content container. It includes
                        options for headers and footers, a wide variety of content, contextual background colors, and
                        powerful display options.</p>
                    <p class="text-muted">Cards support a wide variety of content, including images, text, list groups,
                        links, and more. Below are examples of what’s supported.</p>
                    <div class="row row-cols-1 row-cols-md-2 g-3">
                        <div class="col">
                            <div class="card portlet border">
                                <img src="{{ URL::asset('build/images/small/img-1.jpg') }}" class="card-img-top" alt="Card image">
                                <div class="card-body">
                                    <h5 class="card-title portlet-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p><a href="#" class="btn btn-primary">Go
                                        somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card portlet border">
                                <div class="card-body">
                                    <h5 class="card-title portlet-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">List group</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Mix and match multiple content types to create the card you need, or throw
                        everything in there. Shown below are image styles, blocks, text styles, and a list group—all wrapped
                        in a fixed-width card.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-grid gap-3">
                                <div class="card border">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                        <li class="list-group-item">Vestibulum at eros</li>
                                    </ul>
                                </div>
                                <div class="card portlet border">
                                    <div class="card-header portlet-header">Featured</div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                    </ul>
                                </div>
                                <div class="card border">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                    </ul>
                                    <div class="card-footer">Card footer</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card  border"><img src="{{ URL::asset('build/images/small/img-2.jpg') }}" class="card-img-top"
                                    alt="Card image">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">An item</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Navigation</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add some navigation to a card’s header (or block) with
                        <a href="../../elements/base/nav.html">nav</a>.
                    </p>
                    <div class="d-grid gap-3">
                        <div class="card portlet text-center border">
                            <div class="card-header portlet-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                    <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card portlet text-center border">
                            <div class="card-header portlet-header">
                                <ul class="nav nav-pills card-header-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                    <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card portlet text-center border">
                            <div class="card-header portlet-header">
                                <ul class="nav nav-lines card-header-lines mb-0">
                                    <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                                    <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Horizontal</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Using a combination of grid and utility classes, cards can be made horizontal in
                        a mobile-friendly and responsive way. In the example below, we remove the grid gutters with
                        <code>.g-0</code> and use <code>.col-md-*</code> classes to make the card horizontal at the
                        <code>md</code> breakpoint. Further adjustments may be needed depending on your card content.
                    </p>
                    <div class="card portlet border">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ URL::asset('build/images/small/img-3.jpg') }}" class="img-fluid rounded-start"
                                    alt="Card image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title portlet-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Image</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted"><code>.card-img-top</code> places an image to the top of the card. With
                        <code>.card-text</code>, text can be added to the card. Text within <code>.card-text</code> can also
                        be styled with the standard HTML tags.
                    </p>
                    <p class="text-muted">Similar to headers and footers, cards can include top and bottom “image
                        caps”—images at the top or bottom of a card.</p>
                    <div class="row row-cols-1 row-cols-md-2 g-3 mb-3">
                        <div class="col">
                            <div class="card portlet border">
                                <img src="{{ URL::asset('build/images/small/img-4.jpg') }}" class="card-img-top" alt="Card image">
                                <div class="card-body">
                                    <h5 class="card-title portlet-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card portlet border">
                                <div class="card-body">
                                    <h5 class="card-title portlet-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div><img src="{{ URL::asset('build/images/small/img-6.jpg') }}" class="card-img-bottom" alt="Card image">
                            </div>
                        </div>
                    </div>
                    <p class="text-muted">Turn an image into a card background and overlay your card’s text. Depending on
                        the image, you may or may not need additional styles or utilities.</p>
                    <div class="card portlet border">
                        <img src="{{ URL::asset('build/images/small/img-7.jpg') }}" class="card-img" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title portlet-title text-white">Card title</h5>
                            <p class="card-text text-white">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text text-white">Last updated 3 mins ago</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Header and footer</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add an optional header and/or footer within a card. Card header can be contain
                        title, icon, or other elements.</p>
                    <div class="d-grid gap-3">
                        <div class="card portlet border">
                            <div class="card-header portlet-header">
                                <h3 class="card-title portlet-title">Header</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card portlet border">
                            <div class="card-header portlet-header">
                                <div class="card-icon"><i class="fa fa-cog"></i></div>
                                <h3 class="card-title portlet-title">Header</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            <div class="card-footer text-muted">2 days ago</div>
                        </div>
                        <div class="card portlet border">
                            <div class="card-header portlet-header">
                                <div class="card-icon"><i class="fa fa-star"></i></div>
                                <h3 class="card-title portlet-title">Header</h3>
                                <div class="card-addon"><span class="badge badge-warning rounded-pill">9+</span></div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            <div class="card-footer text-muted">2 days ago</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Alignment</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">You can quickly change the text alignment of any card—in its entirety or specific
                        parts—with our <strong>text align classes</strong>.</p>
                    <div class="d-grid gap-3">
                        <div class="card portlet text-start border">
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card portlet text-center border">
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>

                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card portlet text-end border">
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Card groups</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use card groups to render cards as a single, attached element with equal width
                        and height columns. Card groups start off stacked and use <code>display: flex;</code> to become
                        attached with uniform dimensions starting at the <code>sm</code> breakpoint.</p>
                    <div class="card-group">
                        <div class="card portlet border">
                            <img src="{{ URL::asset('build/images/small/img-4.jpg') }}" class="card-img-top" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                    to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                        <div class="card portlet border">
                            <img src="{{ URL::asset('build/images/small/img-5.jpg') }}" class="card-img-top" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                        <div class="card portlet border">
                            <img src="{{ URL::asset('build/images/small/img-6.jpg') }}" class="card-img-top" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title portlet-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                                    to additional content. This card has even longer content than the first to show that
                                    equal height action.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Card grid</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use the Bootstrap grid system and its <code>.row-cols</code> classes to control
                        how many grid columns (wrapped around your cards) you show per row. For example, here’s
                        <code>.row-cols-1</code> laying out the cards on one column, and <code>.row-cols-md-2</code>
                        splitting four cards to equal width across multiple rows, from the medium breakpoint up.
                    </p>
                    <div class="row row-cols-1 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card portlet h-100 border">
                                <img src="{{ URL::asset('build/images/small/img-7.jpg') }}" class="card-img-top" alt="Card image">
                                <div class="card-body">
                                    <h5 class="card-title portlet-title">Card title</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card portlet h-100 border">
                                <img src="{{ URL::asset('build/images/small/img-1.jpg') }}" class="card-img-top" alt="Card image">
                                <div class="card-body">
                                    <h5 class="card-title portlet-title">Card title</h5>
                                    <p class="card-text">This card has supporting text below as a natural lead-in to
                                        additional content.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card portlet h-100 border">
                                <img src="{{ URL::asset('build/images/small/img-2.jpg') }}" class="card-img-top" alt="Card image">
                                <div class="card-body">
                                    <h5 class="card-title portlet-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This card has even longer content than the first to
                                        show that equal height action.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
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
    <!-- masonry pkgd -->
    <script src="{{ URL::asset('build/libs/masonry-layout/dist/masonry.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
