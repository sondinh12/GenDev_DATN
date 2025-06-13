@extends('layouts.master')

@section('title')
    Tab
@endsection

@section('topbar-title')
    Elements
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Line</h3>
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
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets
                                containing Lorem Ipsum passages, and more recently with desktop publishing software like
                                Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card1-profile">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card1-contact">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It
                                was popularised in the 1960s with the release of Letraset sheets containLorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of
                                Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Pill</h3>
                    <div class="card-addon">
                        <div class="nav nav-pills card-nav" id="card2-tab">
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
                        <div class="tab-pane fade active show" id="card2-home">
                            <p class="text-muted mb-0">
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets
                                containing Lorem Ipsum passages, and more recently with desktop publishing software like
                                Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card2-profile">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card2-contact">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It
                                was popularised in the 1960s with the release of Letraset sheets containLorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of
                                Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Tab</h3>
                    <div class="card-addon">
                        <div class="nav nav-tabs card-nav" id="card3-tab">
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
                        <div class="tab-pane fade show active" id="card3-home">
                            <p class="text-muted mb-0">
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets
                                containing Lorem Ipsum passages, and more recently with desktop publishing software like
                                Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card3-profile">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card3-contact">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It
                                was popularised in the 1960s with the release of Letraset sheets containLorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of
                                Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <div class="card-icon">
                        <i class="fa fa-map-marker-alt fs-17 text-muted"></i>
                    </div>
                    <h3 class="card-title">Icon</h3>
                    <div class="card-addon">
                        <div class="nav nav-lines card-nav" id="card4-tab">
                            <a class="nav-item nav-link active" id="card4-home-tab" data-bs-toggle="tab"
                                href="#card4-home">Home</a>
                            <a class="nav-item nav-link" id="card4-profile-tab" data-bs-toggle="tab"
                                href="#card4-profile">Profile</a>
                            <a class="nav-item nav-link" id="card4-contact-tab" data-bs-toggle="tab"
                                href="#card4-contact">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="card4-home">
                            <p class="text-muted mb-0">
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets
                                containing Lorem Ipsum passages, and more recently with desktop publishing software like
                                Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card4-profile">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card4-contact">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It
                                was popularised in the 1960s with the release of Letraset sheets containLorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of
                                Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Dropdown</h3>
                    <div class="card-addon">
                        <div class="nav nav-pills card-nav" id="card5-tab">
                            <a class="nav-item nav-link active" id="card5-home-tab" data-bs-toggle="tab"
                                href="#card5-home">Home</a>
                            <a class="nav-item nav-link" id="card5-profile-tab" data-bs-toggle="tab"
                                href="#card5-profile">Profile</a>
                            <a class="nav-item nav-link" id="card5-contact-tab" data-bs-toggle="tab"
                                href="#card5-contact">Contact</a>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="true" aria-expanded="false">Dropdown <i
                                        class="mdi mdi-chevron-down"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item"
                                        href="#">Another action</a> <a class="dropdown-item"
                                        href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="card5-home">
                            <p class="text-muted mb-0">
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets
                                containing Lorem Ipsum passages, and more recently with desktop publishing software like
                                Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card5-profile">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card5-contact">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It
                                was popularised in the 1960s with the release of Letraset sheets containLorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of
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
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <div class="card-icon">
                        <i class="fa fa-layer-group fs-17 text-muted"></i>
                    </div>
                    <h3 class="card-title">Footer</h3>
                    <div class="card-addon">
                        <div class="nav nav-pills card-nav" id="card6-tab">
                            <a class="nav-item nav-link active" id="card6-home-tab" data-bs-toggle="tab"
                                href="#card6-home">Home</a>
                            <a class="nav-item nav-link" id="card6-profile-tab" data-bs-toggle="tab"
                                href="#card6-profile">Profile</a>
                            <a class="nav-item nav-link" id="card6-contact-tab" data-bs-toggle="tab"
                                href="#card6-contact">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="card6-home">
                            <p class="text-muted mb-0">
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets
                                containing Lorem Ipsum passages, and more recently with desktop publishing software like
                                Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card6-profile">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card6-contact">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It
                                was popularised in the 1960s with the release of Letraset sheets containLorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of
                                Lorem Ipsum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer card-footer-bordered text-end"><button class="btn btn-primary">Submit</button>
                    <button class="btn btn-outline-secondary">Cancel</button></div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <div class="card-addon me-auto ms-0">
                        <div class="nav nav-lines card-nav" id="card7-tab">
                            <a class="nav-item nav-link active" id="card7-home-tab" data-bs-toggle="tab"
                                href="#card7-home">Home</a>
                            <a class="nav-item nav-link" id="card7-profile-tab" data-bs-toggle="tab"
                                href="#card7-profile">Profile</a>
                            <a class="nav-item nav-link" id="card7-contact-tab" data-bs-toggle="tab"
                                href="#card7-contact">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="card7-home">
                            <p class="text-muted mb-0">
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets
                                containing Lorem Ipsum passages, and more recently with desktop publishing software like
                                Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card7-profile">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                            </p>
                        </div>
                        <div class="tab-pane fade" id="card7-contact">
                            <p class="text-muted mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It
                                was popularised in the 1960s with the release of Letraset sheets containLorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of
                                Lorem Ipsum.
                            </p>
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
