@extends('layouts.master')

@section('title')
    Tabs
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
                <div class="card-header">
                    <h3 class="card-title">Basic tab</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="nav nav-lines mb-0" id="nav1-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav1-home-tab" data-bs-toggle="tab"
                                                href="#nav1-home" aria-selected="true" role="tab">Home</a>
                                            <a class="nav-item nav-link" id="nav1-profile-tab" data-bs-toggle="tab"
                                                href="#nav1-profile" aria-selected="false" role="tab"
                                                tabindex="-1">Profile</a>
                                            <a class="nav-item nav-link" id="nav1-contact-tab" data-bs-toggle="tab"
                                                href="#nav1-contact" aria-selected="false" role="tab"
                                                tabindex="-1">Contact</a>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="nav1-tabContent">
                                        <div class="tab-pane fade active show" id="nav1-home" role="tabpanel"
                                            aria-labelledby="#nav1-home-tab">
                                            <p class="mb-0">It has survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially unchanged. It was
                                                popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav1-profile" role="tabpanel"
                                            aria-labelledby="#nav1-profile-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav1-contact" role="tabpanel"
                                            aria-labelledby="#nav1-contact-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release of
                                                Letraset sheets containLorem Ipsum passages, and more recently with desktop
                                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="nav nav-pills" id="nav2-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav2-home-tab" data-bs-toggle="tab"
                                                href="#nav2-home" aria-selected="true" role="tab">Home</a>
                                            <a class="nav-item nav-link" id="nav2-profile-tab" data-bs-toggle="tab"
                                                href="#nav2-profile" aria-selected="false" tabindex="-1"
                                                role="tab">Profile</a>
                                            <a class="nav-item nav-link" id="nav2-contact-tab" data-bs-toggle="tab"
                                                href="#nav2-contact" aria-selected="false" tabindex="-1"
                                                role="tab">Contact</a>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="nav2-tabContent">
                                        <div class="tab-pane fade show active" id="nav2-home" role="tabpanel"
                                            aria-labelledby="#nav2-home-tab">
                                            <p class="mb-0">It has survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially unchanged. It was
                                                popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav2-profile" role="tabpanel"
                                            aria-labelledby="#nav2-profile-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav2-contact" role="tabpanel"
                                            aria-labelledby="#nav2-contact-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release of
                                                Letraset sheets containLorem Ipsum passages, and more recently with desktop
                                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-body">
                                    <nav class="mb-3">
                                        <div class="nav nav-tabs" id="nav3-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav3-home-tab" data-bs-toggle="tab"
                                                href="#nav3-home" aria-selected="true" role="tab">Home</a>
                                            <a class="nav-item nav-link" id="nav3-profile-tab" data-bs-toggle="tab"
                                                href="#nav3-profile" aria-selected="false" tabindex="-1"
                                                role="tab">Profile</a>
                                            <a class="nav-item nav-link" id="nav3-contact-tab" data-bs-toggle="tab"
                                                href="#nav3-contact" aria-selected="false" tabindex="-1"
                                                role="tab">Contact</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav3-tabContent">
                                        <div class="tab-pane fade show active" id="nav3-home" role="tabpanel"
                                            aria-labelledby="#nav3-home-tab">
                                            <p class="mb-0">It has survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially unchanged. It was
                                                popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav3-profile" role="tabpanel"
                                            aria-labelledby="#nav3-profile-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav3-contact" role="tabpanel"
                                            aria-labelledby="#nav3-contact-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release of
                                                Letraset sheets containLorem Ipsum passages, and more recently with desktop
                                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Card tab</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered d-flex">
                                    <h3 class="card-title">card</h3>
                                    <div class="card-addon">
                                        <div class="nav nav-lines card-nav" id="card1-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="card1-home-tab" data-bs-toggle="tab"
                                                href="#card1-home" aria-selected="true" role="tab">Home</a>
                                            <a class="nav-item nav-link" id="card1-profile-tab" data-bs-toggle="tab"
                                                href="#card1-profile" aria-selected="false" tabindex="-1"
                                                role="tab">Profile</a>
                                            <a class="nav-item nav-link" id="card1-contact-tab" data-bs-toggle="tab"
                                                href="#card1-contact" aria-selected="false" tabindex="-1"
                                                role="tab">Contact</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="card1-home" role="tabpanel"
                                            aria-labelledby="#card1-home-tab">
                                            <p class="mb-0">It has survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially unchanged. It was
                                                popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="card1-profile" role="tabpanel"
                                            aria-labelledby="#card1-profile-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged</p>
                                        </div>
                                        <div class="tab-pane fade" id="card1-contact" role="tabpanel"
                                            aria-labelledby="#card1-contact-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release of
                                                Letraset sheets containLorem Ipsum passages, and more recently with desktop
                                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered d-flex">
                                    <h3 class="card-title">card</h3>
                                    <div class="card-addon">
                                        <div class="nav nav-pills" id="card2-tab" role="tablist">
                                            <a class="nav-item nav-link" id="card2-home-tab" data-bs-toggle="tab"
                                                href="#card2-home" aria-selected="false" role="tab"
                                                tabindex="-1">Home</a>
                                            <a class="nav-item nav-link" id="card2-profile-tab" data-bs-toggle="tab"
                                                href="#card2-profile" aria-selected="false" tabindex="-1"
                                                role="tab">Profile</a>
                                            <a class="nav-item nav-link active" id="card2-contact-tab"
                                                data-bs-toggle="tab" href="#card2-contact" aria-selected="true"
                                                role="tab">Contact</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade" id="card2-home" role="tabpanel"
                                            aria-labelledby="#card2-home-tab">
                                            <p class="mb-0">It has survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially unchanged. It was
                                                popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="card2-profile" role="tabpanel"
                                            aria-labelledby="#card2-profile-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged</p>
                                        </div>
                                        <div class="tab-pane fade active show" id="card2-contact" role="tabpanel"
                                            aria-labelledby="#card2-contact-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release of
                                                Letraset sheets containLorem Ipsum passages, and more recently with desktop
                                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered d-flex">
                                    <h3 class="card-title">card</h3>
                                    <div class="card-addon">
                                        <div class="nav nav-tabs card-nav" id="card3-tab" role="tablist"><a
                                                class="nav-item nav-link active" id="card3-home-tab" data-bs-toggle="tab"
                                                href="#card3-home" aria-selected="true" role="tab">Home</a> <a
                                                class="nav-item nav-link" id="card3-profile-tab" data-bs-toggle="tab"
                                                href="#card3-profile" aria-selected="false" tabindex="-1"
                                                role="tab">Profile</a> <a class="nav-item nav-link"
                                                id="card3-contact-tab" data-bs-toggle="tab" href="#card3-contact"
                                                aria-selected="false" tabindex="-1" role="tab">Contact</a></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="card3-home" role="tabpanel"
                                            aria-labelledby="#card3-home-tab">
                                            <p class="mb-0">It has survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially unchanged. It was
                                                popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="card3-profile" role="tabpanel"
                                            aria-labelledby="#card3-profile-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged</p>
                                        </div>
                                        <div class="tab-pane fade" id="card3-contact" role="tabpanel"
                                            aria-labelledby="#card3-contact-tab">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release of
                                                Letraset sheets containLorem Ipsum passages, and more recently with desktop
                                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Card tab</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xl-4">
                            <div class="card border">
                                <div class="card-header">
                                    <div class="nav nav-lines card-header-lines mb-0" id="card-tab-1" role="tablist">
                                        <a class="nav-item nav-link" id="card-home-tab-1" data-bs-toggle="tab"
                                            href="#card-home-1" aria-selected="false" role="tab"
                                            tabindex="-1">Home</a>
                                        <a class="nav-item nav-link" id="card-profile-tab-1" data-bs-toggle="tab"
                                            href="#card-profile-1" aria-selected="false" role="tab"
                                            tabindex="-1">Profile</a>
                                        <a class="nav-item nav-link active" id="card-contact-tab-1" data-bs-toggle="tab"
                                            href="#card-contact-1" aria-selected="true" role="tab">Contact</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade" id="card-home-1" role="tabpanel"
                                            aria-labelledby="#card-home-tab-1">
                                            <p class="mb-0">It has survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially unchanged. It was
                                                popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="card-profile-1" role="tabpanel"
                                            aria-labelledby="#card-profile-tab-1">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged</p>
                                        </div>
                                        <div class="tab-pane fade active show" id="card-contact-1" role="tabpanel"
                                            aria-labelledby="#card-contact-tab-1">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release of
                                                Letraset sheets containLorem Ipsum passages, and more recently with desktop
                                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card border">
                                <div class="card-header">
                                    <div class="nav nav-pills card-header-pills mb-0" id="card-tab-2" role="tablist">
                                        <a class="nav-item nav-link" id="card-home-tab-2" data-bs-toggle="tab"
                                            href="#card-home-2" aria-selected="false" role="tab"
                                            tabindex="-1">Home</a>
                                        <a class="nav-item nav-link" id="card-profile-tab-2" data-bs-toggle="tab"
                                            href="#card-profile-2" aria-selected="false" role="tab"
                                            tabindex="-1">Profile</a>
                                        <a class="nav-item nav-link active" id="card-contact-tab-2" data-bs-toggle="tab"
                                            href="#card-contact-2" aria-selected="true" role="tab">Contact</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade" id="card-home-2" role="tabpanel"
                                            aria-labelledby="#card-home-tab-2">
                                            <p class="mb-0">It has survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially unchanged. It was
                                                popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="card-profile-2" role="tabpanel"
                                            aria-labelledby="#card-profile-tab-2">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged</p>
                                        </div>
                                        <div class="tab-pane fade active show" id="card-contact-2" role="tabpanel"
                                            aria-labelledby="#card-contact-tab-2">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release of
                                                Letraset sheets containLorem Ipsum passages, and more recently with desktop
                                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card border">
                                <div class="card-header">
                                    <div class="nav nav-tabs card-header-tabs" id="card-tab-3" role="tablist">
                                        <a class="nav-item nav-link active" id="card-home-tab-3" data-bs-toggle="tab"
                                            href="#card-home-3" aria-selected="true" role="tab">Home</a>
                                        <a class="nav-item nav-link" id="card-profile-tab-3" data-bs-toggle="tab"
                                            href="#card-profile-3" aria-selected="false" tabindex="-1"
                                            role="tab">Profile</a>
                                        <a class="nav-item nav-link" id="card-contact-tab-3" data-bs-toggle="tab"
                                            href="#card-contact-3" aria-selected="false" tabindex="-1"
                                            role="tab">Contact</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="card-home-3" role="tabpanel"
                                            aria-labelledby="#card-home-tab-3">
                                            <p class="mb-0">It has survived not only five centuries, but also the leap
                                                into electronic typesetting, remaining essentially unchanged. It was
                                                popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="card-profile-3" role="tabpanel"
                                            aria-labelledby="#card-profile-tab-3">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged</p>
                                        </div>
                                        <div class="tab-pane fade" id="card-contact-3" role="tabpanel"
                                            aria-labelledby="#card-contact-tab-3">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and
                                                typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release of
                                                Letraset sheets containLorem Ipsum passages, and more recently with desktop
                                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
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
