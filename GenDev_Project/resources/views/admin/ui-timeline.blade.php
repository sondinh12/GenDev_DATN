@extends('layouts.master')

@section('title')
    Timeline
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
                    <p class="text-muted"><strong>Timeline</strong> can be used for listing agenda. Use <a
                            href="ui-maker.html">marker</a> as the timeline pin. Put your content into
                        <code>.timeline-content</code>.
                    </p>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-pin">
                                <i class="marker marker-dot text-primary"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin">
                                <i class="marker marker-dot text-success"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore
                                    et dolore magna</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin">
                                <i class="marker marker-dot text-danger"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore
                                    et dolore magna elit enim at minim veniam quis nostrud</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">More content</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use your creativity to make a more complex timeline. In the example below, we use
                        <a href="ui-rich-list.html">rich list</a> to appear bordered and clickable timeline content.
                    </p>
                    <div class="timeline rich-list-bordered rich-list-action">
                        <div class="timeline-item">
                            <div class="timeline-pin">
                                <i class="marker marker-circle text-primary"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs">
                                            <div class="avatar-display">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title">Consectetur</h4>
                                        <span class="rich-list-subtitle">Dapibus ac facilisis in</span>
                                    </div>
                                    <div class="rich-list-append">
                                        <span class="badge badge-success">9+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin">
                                <i class="marker marker-circle text-success"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs">
                                            <div class="avatar-display">
                                                <i class="fa fa-rocket"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title">Porta</h4>
                                        <p class="rich-list-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                            commodo consequat.</p><span class="rich-list-subtitle">Cras justo odio</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin">
                                <i class="marker marker-circle text-danger"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="rich-list-item">
                                    <div class="rich-list-prepend">
                                        <div class="avatar avatar-xs">
                                            <div class="avatar-display">
                                                <i class="fa fa-cog"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rich-list-content">
                                        <h4 class="rich-list-title">Vestibulum</h4>
                                        <span class="rich-list-subtitle">Morbi leo risus</span>
                                    </div>
                                    <div class="rich-list-append">
                                        <span class="badge badge-info">new</span>
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
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Time</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add time information to your timeline by adding text inside
                        <code>.timeline-time</code> before <code>.timeline-pin</code> and you must extend
                        <code>.timeline</code> element with <code>.timeline-timed</code> class.
                    </p>
                    <div class="timeline timeline-timed">
                        <div class="timeline-item">
                            <span class="timeline-time">12.20</span>
                            <div class="timeline-pin">
                                <i class="marker marker-circle text-primary"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-time">13.00</span>
                            <div class="timeline-pin">
                                <i class="marker marker-circle text-success"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore
                                    et dolore magna</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-time">14.05</span>
                            <div class="timeline-pin">
                                <i class="marker marker-circle text-danger"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore
                                    et dolore magna elit enim at minim veniam quis nostrud</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Zigzag</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">We have one more timeline version, you just need to add
                        <code>.timeline-zigzag</code> class to default timeline elements to appear like below.
                    </p>
                    <div class="timeline timeline-zigzag">
                        <div class="timeline-item">
                            <div class="timeline-pin">
                                <i class="marker marker-circle text-primary"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                    labore et dolore magna elit enim at minim veniam quis nostrud</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin">
                                <i class="marker marker-circle text-success"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                    labore et dolore magna</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin">
                                <i class="marker marker-circle text-danger"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-pin">
                                <i class="marker marker-circle text-info"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="mb-0">Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                    labore et dolore magna</p>
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
    <div class="row mt-4 hori-timeline">
        <div class="col-lg-12">
            <div class="card mb-0">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Horizontal Timeline</h3>
                </div>
                <div class="card-body">
                    <div class="horizontal-timeline my-3 d-flex">
                        <div class="card pt-2 border-0 item-box text-center">
                            <div class="timeline-content p-3 rounded">
                                <div class="timeline-text">
                                    <h6 class="">Plateform Development</h6>
                                    <p class="text-muted mb-0">Wish someone a sincere ‘good luck in your new job’ with
                                        these sweet messages. Make sure you pick out a good luck new job card to go with the
                                        words, and pop a beautiful bunch of flowers from our gift range in your basket, to
                                        make them feel super special.</p>
                                </div>
                            </div>
                            <div class="time">
                                <span class="badge bg-success">December, 2022</span>
                            </div>
                        </div>
                        <div class="card pt-2 border-0 item-box text-center">
                            <div class="timeline-content p-3 rounded">
                                <div class="timeline-text">
                                    <h6 class="">Release Bank &amp; Cards Phase</h6>
                                    <p class="text-muted mb-0">Too much or too little spacing, as in the example below, Use
                                        the velzon to share information with your can make things unpleasant for the reader.
                                    </p>
                                </div>
                            </div>
                            <div class="time">
                                <span class="badge bg-success">January, 2023</span>
                            </div>
                        </div>
                        <div class="card pt-2 border-0 item-box text-center">
                            <div class="timeline-content p-3 rounded">
                                <div class="timeline-text">
                                    <h6 class="">Beta Launch of Plateform</h6>
                                    <p class="text-muted mb-0">Every team project can have a velzon. Use the velzon to
                                        share information with your team to understand and contribute to your project.</p>
                                </div>
                            </div>
                            <div class="time">
                                <span class="badge bg-success">March, 2023</span>
                            </div>
                        </div>
                        <div class="card pt-2 border-0 item-box text-center">
                            <div class="timeline-content p-3 rounded">
                                <div class="timeline-text">
                                    <h6 class="">First Crypto Bank Transfers</h6>
                                    <p class="text-muted mb-0">" This is an awesome admin dashboard template. It is
                                        extremely well structured and uses state of the art components. I integrated it into
                                        a Rails 6 project. Needs manual integration work of course but the template
                                        structure made it easy. "</p>
                                </div>
                            </div>
                            <div class="time">
                                <span class="badge bg-success">April, 2023</span>
                            </div>
                        </div>
                        <div class="card pt-2 border-0 item-box text-center">
                            <div class="timeline-content p-3 rounded">
                                <div class="timeline-text">
                                    <h6 class="">Launch Ethbay Services</h6>
                                    <p class="text-muted mb-0">Powerful, clean & modern responsive bootstrap 5 admin
                                        template. The maximum file size for uploads in this demo</p>
                                </div>
                            </div>
                            <div class="time">
                                <span class="badge bg-success">May, 2023</span>
                            </div>
                        </div>
                        <div class="card pt-2 border-0 item-box text-center">
                            <div class="timeline-content p-3 rounded">
                                <div class="timeline-text">
                                    <h6 class="">Fastest Crypto Transaction</h6>
                                    <p class="text-muted mb-0">t is important for us that we receive email notifications
                                        when a ticket is created as our IT staff are mobile and will not always be looking
                                        at the dashboard for new tickets.</p>
                                </div>
                            </div>
                            <div class="time">
                                <span class="badge bg-success">June, 2023</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end timeline-->
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
