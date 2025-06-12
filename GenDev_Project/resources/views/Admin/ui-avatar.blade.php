@extends('layouts.master')

@section('title')
    Avatar
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
                    <p><strong>Avatar</strong> can be used for displaying image, icon, or character on square or circle
                        shaped elements. Put image, icon, or character into <code>.avatar-display</code>. Look the example
                        below.</p>
                    <div class="hstack gap-2">
                        <div class="avatar-xs avatar">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar-xs avatar">
                            <div class="avatar-display">
                                <img src="{{ URL::asset('build/images/users/avatar-8.png') }}" alt="Avatar Image" class="avatar-2xs">
                            </div>
                        </div>
                        <div class="avatar-xs avatar">
                            <span class="avatar-display">B</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Circle version</h3>
                </div>
                <div class="card-body">
                    <p>Extend default avatar element with <code>.avatar-circle</code> to change its shape to be circular.
                    </p>
                    <div class="hstack gap-2">
                        <div class="avatar avatar-xs avatar-circle">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-xs avatar-circle">
                            <div class="avatar-display">
                                <img src="{{ URL::asset('build/images/users/avatar-6.png') }}" alt="Avatar Image" class="avatar-2xs">
                            </div>
                        </div>
                        <div class="avatar avatar-xs avatar-circle">
                            <span class="avatar-display">A</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Sizing</h3>
                </div>
                <div class="card-body">
                    <p>If you want to change avatar size, you can use <code>.avatar-{sm|lg}</code> helper classes</p>
                    <div class="hstack gap-2 flex-wrap">
                        <div class="avatar avatar-primary avatar-2xs">
                            <span class="avatar-display">A</span>
                        </div>
                        <div class="avatar avatar-primary avatar-xs">
                            <span class="avatar-display">B</span>
                        </div>
                        <div class="avatar avatar-primary avatar-sm">
                            <span class="avatar-display">C</span>
                        </div>
                        <div class="avatar avatar-primary avatar-md">
                            <span class="avatar-display">D</span>
                        </div>
                        <div class="avatar avatar-primary avatar-lg">
                            <span class="avatar-display">E</span>
                        </div>
                        <div class="avatar avatar-primary avatar-xl">
                            <span class="avatar-display">F</span>
                        </div>
                    </div>
                    <div class="hstack gap-2 flex-wrap mt-2">
                        <div class="avatar avatar-primary avatar-circle avatar-2xs">
                            <span class="avatar-display">A</span>
                        </div>
                        <div class="avatar avatar-primary avatar-circle avatar-xs">
                            <span class="avatar-display">B</span>
                        </div>
                        <div class="avatar avatar-primary avatar-circle avatar-sm">
                            <span class="avatar-display">C</span>
                        </div>
                        <div class="avatar avatar-primary avatar-circle avatar-md">
                            <span class="avatar-display">D</span>
                        </div>
                        <div class="avatar avatar-primary avatar-circle avatar-lg">
                            <span class="avatar-display">E</span>
                        </div>
                        <div class="avatar avatar-primary avatar-circle avatar-xl">
                            <span class="avatar-display">F</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Contextual colors</h3>
                </div>
                <div class="card-body">
                    <p>Change avatar color for functionality, check examples below.</p>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Solid</h3>
                        </div>
                        <div class="card-body">
                            <p>You can use these by extending <code>.avatar-{color}</code> class to avatar element</p>
                            <div class="hstack gap-2">
                                <div class="avatar avatar-xs avatar-primary">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="avatar avatar-xs avatar-secondary">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="avatar avatar-xs avatar-info">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="avatar avatar-xs avatar-success">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="avatar avatar-xs avatar-warning">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="avatar avatar-xs avatar-danger">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="avatar avatar-xs avatar-light">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="avatar avatar-xs avatar-dark">
                                    <div class="avatar-display">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border mb-0">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Label</h3>
                        </div>
                        <div class="card-body">
                            <p>You can use these by extending <code>.avatar-label-{color}</code> class to avatar element</p>
                            <div class="avatar avatar-xs avatar-label-primary">
                                <div class="avatar-display">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="avatar avatar-xs avatar-label-secondary">
                                <div class="avatar-display">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="avatar avatar-xs avatar-label-info">
                                <div class="avatar-display">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="avatar avatar-xs avatar-label-success">
                                <div class="avatar-display">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="avatar avatar-xs avatar-label-warning">
                                <div class="avatar-display">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="avatar avatar-xs avatar-label-danger">
                                <div class="avatar-display">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="avatar avatar-xs avatar-label-light">
                                <div class="avatar-display">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="avatar avatar-xs avatar-label-dark">
                                <div class="avatar-display">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Addon</h3>
                </div>
                <div class="card-body">
                    <p>Addon can be replaced to <strong>top-start</strong> or <strong>bottom-end</strong> of avatar element.
                        Use <code>.avatar-addon</code> and extend with <code>.avatar-addon-{top|bottom}</code> to set
                        placement. You can put <a href="../../elements/base/badge.html">badge</a> or <a
                            href="../../elements/base/marker.html">marker</a> into avatar addon.</p>
                    <div class="hstack gap-2">
                        <div class="avatar avatar-xs avatar-primary">
                            <div class="avatar-addon avatar-addon-top">
                                <i class="marker marker-dot text-success"></i>
                            </div>
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-xs avatar-primary">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="avatar-addon avatar-addon-bottom">
                                <i class="marker marker-dot text-success"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-xs avatar-circle avatar-primary">
                            <div class="avatar-addon avatar-addon-top">
                                <div class="avatar-icon avatar-icon-danger">
                                    <i class="fa fa-check text-dark"></i>
                                </div>
                            </div>
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-xs avatar-circle avatar-primary">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="avatar-addon avatar-addon-bottom">
                                <div class="avatar-icon avatar-icon-success">
                                    <i class="fa fa-star text-dark"></i>
                                </div>
                            </div>
                        </div>
                        <div class="avatar avatar-xs avatar-primary">
                            <div class="avatar-addon avatar-addon-top">
                                <span class="badge badge-danger rounded-pill avatar-badge">9+</span>
                            </div>
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-xs avatar-primary">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="avatar-addon avatar-addon-bottom">
                                <span class="badge badge-success rounded-pill avatar-badge">9+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Group</h3>
                </div>
                <div class="card-body">
                    <p>Wrap a series of avatar elements into <code>.avatar-group</code> to group the elements. Instead of
                        applying avatar sizing classes to every avatar in a group, just add
                        <code>.avatar-group-{lg|sm}</code> to each <code>.avatar-group</code>
                    </p>
                    <div class="avatar-group avatar-group-sm">
                        <div class="avatar avatar-circle avatar-primary">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-circle avatar-secondary">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-circle avatar-success">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-circle avatar-danger">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="avatar-group">
                        <div class="avatar avatar-circle avatar-primary">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-circle avatar-secondary">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-circle avatar-success">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-circle avatar-danger">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="avatar-group avatar-group-lg">
                        <div class="avatar avatar-circle avatar-primary">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-circle avatar-secondary">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-circle avatar-success">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="avatar avatar-circle avatar-danger">
                            <div class="avatar-display">
                                <i class="fa fa-user"></i>
                            </div>
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
