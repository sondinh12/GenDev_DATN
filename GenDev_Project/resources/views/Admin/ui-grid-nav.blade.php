@extends('layouts.master')

@section('title')
    Grid-nav
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
                    <h3 class="card-title">Variations</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted"><strong>Grid Nav</strong> has 3 versions of the border, like example below</p>
                    <div class="row g-3">
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Basic</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Default version of grid navigation</p>
                                    <div class="grid-nav">
                                        <div class="grid-nav-row">
                                            <div class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-address-card"></i></div><span
                                                    class="grid-nav-content">Profile</span>
                                            </div>
                                            <div class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-comments"></i></div><span
                                                    class="grid-nav-content">Messages</span>
                                            </div>
                                            <div class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-clone"></i></div><span
                                                    class="grid-nav-content">Activities</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Flush</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Add <code>.grid-nav-flush</code> to default grid navigation to
                                        appear like below</p>
                                    <div class="grid-nav grid-nav-flush">
                                        <div class="grid-nav-row">
                                            <div class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-address-card"></i></div><span
                                                    class="grid-nav-content">Profile</span>
                                            </div>
                                            <div class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-comments"></i></div><span
                                                    class="grid-nav-content">Messages</span>
                                            </div>
                                            <div class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-clone"></i></div><span
                                                    class="grid-nav-content">Activities</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card border mb-0">
                                <div class="card-header card-header-bordered">
                                    <h3 class="card-title">Bordered</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Add <code>.grid-nav-bordered</code> to default grid navigation to
                                        appear like below</p>
                                    <div class="grid-nav grid-nav-bordered">
                                        <div class="grid-nav-row">
                                            <div class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-address-card"></i></div><span
                                                    class="grid-nav-content">Profile</span>
                                            </div>
                                            <div class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-comments"></i></div><span
                                                    class="grid-nav-content">Messages</span>
                                            </div>
                                            <div class="grid-nav-item">
                                                <div class="grid-nav-icon"><i class="far fa-clone"></i></div><span
                                                    class="grid-nav-content">Activities</span>
                                            </div>
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

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">More content</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">You can add multiple rows and more content by using <code>.grid-nav-title</code>
                        and <code>.grid-nav-subtitle</code></p>
                    <div class="grid-nav grid-nav-bordered">
                        <div class="grid-nav-row">
                            <div class="grid-nav-item">
                                <div class="grid-nav-icon">
                                    <i class="far fa-address-card"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Profile</h3>
                                    <span class="grid-nav-subtitle">Edit your profile</span>
                                </div>
                            </div>
                            <div class="grid-nav-item">
                                <div class="grid-nav-icon">
                                    <i class="far fa-comments"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Messages</h3>
                                    <span class="grid-nav-subtitle">Check new messages</span>
                                </div>
                            </div>
                            <div class="grid-nav-item">
                                <div class="grid-nav-icon">
                                    <i class="far fa-clone"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Activities</h3>
                                    <span class="grid-nav-subtitle">Show last activity</span>
                                </div>
                            </div>
                        </div>
                        <div class="grid-nav-row">
                            <div class="grid-nav-item">
                                <div class="grid-nav-icon">
                                    <i class="far fa-calendar-check"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Tasks</h3>
                                    <span class="grid-nav-subtitle">Remind my tasks</span>
                                </div>
                            </div>
                            <div class="grid-nav-item">
                                <div class="grid-nav-icon">
                                    <i class="far fa-sticky-note"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Notes</h3>
                                    <span class="grid-nav-subtitle">Show my notes</span>
                                </div>
                            </div>
                            <div class="grid-nav-item">
                                <div class="grid-nav-icon">
                                    <i class="far fa-bell"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Notification</h3>
                                    <span class="grid-nav-subtitle">Check all notification</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Action</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted"><code>.grid-nav-item</code> class is support for <code>&lt;a&gt;</code>. Apply
                        hover and focus states by adding <code>.grid-nav-action</code>. Use <code>.active</code> to appear
                        clicked effect to individual link and use <code>.disabled</code> for disabled appearance.</p>
                    <div class="grid-nav grid-nav-bordered grid-nav-action">
                        <div class="grid-nav-row"><a href="#" class="grid-nav-item active">
                                <div class="grid-nav-icon"><i class="far fa-address-card"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Profile</h3>
                                    <span class="grid-nav-subtitle">Edit your profile</span>
                                </div>
                            </a>
                            <a href="#" class="grid-nav-item disabled">
                                <div class="grid-nav-icon"><i class="far fa-comments"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Messages</h3>
                                    <span class="grid-nav-subtitle">Check new messages</span>
                                </div>
                            </a>
                            <a href="#" class="grid-nav-item">
                                <div class="grid-nav-icon"><i class="far fa-clone"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Activities</h3>
                                    <span class="grid-nav-subtitle">Show last activity</span>
                                </div>
                            </a>
                        </div>
                        <div class="grid-nav-row"><a href="#" class="grid-nav-item">
                                <div class="grid-nav-icon"><i class="far fa-calendar-check"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Tasks</h3>
                                    <span class="grid-nav-subtitle">Remind my tasks</span>
                                </div>
                            </a>
                            <a href="#" class="grid-nav-item">
                                <div class="grid-nav-icon"><i class="far fa-sticky-note"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Notes</h3>
                                    <span class="grid-nav-subtitle">Show my notes</span>
                                </div>
                            </a>
                            <a href="#" class="grid-nav-item">
                                <div class="grid-nav-icon"><i class="far fa-bell"></i>
                                </div>
                                <div class="grid-nav-content">
                                    <h3 class="grid-nav-title">Notification</h3>
                                    <span class="grid-nav-subtitle">Check all notification</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
