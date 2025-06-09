@extends('layouts.master')

@section('title')
    Pricing
@endsection

@section('topbar-title')
    Elements
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-header justify-content-center">
                    <h4 class="card-title">Simple Pricing Plans</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">Select the perfect for your needs, Is always flexible to grow. Create a
                        professional free website template. Responsive, fully customizable with easy Drag-n-Drop Nicepage
                        editor. <br> Adjust colors, fonts, header and footer, layout and other design elements, as well as
                        content and images.</p>
                    <div class="nav nav-pills card-header-pills pricing-nav-tabs mb-0" id="card2-tab" role="tablist">
                        <a class="nav-item nav-link active" id="card2-monthly-tab" data-bs-toggle="tab"
                            href="#card2-monthly" aria-selected="false" role="tab" tabindex="-1">Monthly</a>
                        <a class="nav-item nav-link" id="card2-yearly-tab" data-bs-toggle="tab" href="#card2-yearly"
                            aria-selected="false" role="tab" tabindex="-1">Yearly</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="card2-monthly" role="tabpanel"
                    aria-labelledby="#card2-monthly-tab">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="card pricing-box text-center">
                                <div class="bg-primary-subtle p-5">
                                    <div class="mb-3">
                                        <i class="fas fa-bahai text-primary h1"></i>
                                    </div>
                                    <div class="">
                                        <h1 class="fw-bold"><sup class="me-1"></sup>19$<small> / Per month</small></h1>
                                    </div>
                                </div>
                                <div class="card-body position-relative">
                                    <div class="text-center">
                                        <h5
                                            class="bg-success text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">
                                            Starter</h5>
                                        <div class="mt-3">
                                            <ul class="list-unstyled plan-features">
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Free Live Support</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Unlimited User</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    No Time Tracking</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Scalable Bandwidth</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> FTP Login
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-5">
                                            <a href="#" class="btn btn-primary w-md">Get started</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="card pricing-box text-center">
                                <div class="bg-primary-subtle p-5">
                                    <div class="mb-3">
                                        <i class="fas fa-cubes text-primary h1"></i>
                                    </div>
                                    <div class="">
                                        <h1 class="fw-bold"><sup class="me-1"></sup>29$<small> / Per month</small></h1>
                                    </div>
                                </div>
                                <div class="card-body position-relative">
                                    <div class="text-center">
                                        <h5
                                            class="bg-danger text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">
                                            Professional</h5>
                                        <div class="mt-3">
                                            <ul class="list-unstyled plan-features">
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Free Live Support</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Unlimited User</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    No Time Tracking</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> Projects
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Scalable Bandwidth</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> FTP Login
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-5">
                                            <a href="#" class="btn btn-primary w-md">Get started</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="card pricing-box text-center">
                                <div class="bg-primary-subtle p-5">
                                    <div class="mb-3">
                                        <i class="fas fa-tape text-primary h1"></i>
                                    </div>
                                    <div class="">
                                        <h1 class="fw-bold"><sup class="me-1"></sup>39$<small> / Per month</small></h1>
                                    </div>
                                </div>
                                <div class="card-body position-relative">
                                    <div class="text-center">
                                        <h5
                                            class="bg-info text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">
                                            Enterprise</h5>
                                        <div class="mt-3">
                                            <ul class="list-unstyled plan-features">
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Free Live Support</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Unlimited User</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    No Time Tracking</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> Projects
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Scalable Bandwidth</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> FTP Login
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>24/7</b> Support
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-5">
                                            <a href="#" class="btn btn-primary w-md">Get started</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="card pricing-box text-center">
                                <div class="bg-primary-subtle p-5">
                                    <div class="mb-3">
                                        <i class="fas fa-store text-primary h1"></i>
                                    </div>
                                    <div class="">
                                        <h1 class="fw-bold"><sup class="me-1"></sup>49$<small> / Per month</small></h1>
                                    </div>
                                </div>
                                <div class="card-body position-relative">
                                    <div class="text-center">
                                        <h5
                                            class="bg-warning text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">
                                            Unlimited</h5>
                                        <div class="mt-3">
                                            <ul class="list-unstyled plan-features">
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Free Live Support</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Unlimited User</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    No Time Tracking</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> Projects
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Scalable Bandwidth</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> FTP Login
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>24/7</b> Support
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> Storage
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-5">
                                            <a href="#" class="btn btn-primary w-md">Get started</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="card2-yearly" role="tabpanel" aria-labelledby="#card2-yearly-tab">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="card pricing-box text-center">
                                <div class="bg-primary-subtle p-5">
                                    <div class="mb-3">
                                        <i class="fas fa-bahai text-primary h1"></i>
                                    </div>
                                    <div class="">
                                        <h1 class="fw-bold"><sup class="me-1"></sup>199$<small> / Per month</small></h1>
                                    </div>
                                </div>
                                <div class="card-body position-relative">
                                    <div class="text-center">
                                        <h5
                                            class="bg-success text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">
                                            Starter</h5>
                                        <div class="mt-3">
                                            <ul class="list-unstyled plan-features">
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Free Live Support</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Unlimited User</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    No Time Tracking</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Scalable Bandwidth</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> FTP Login
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-5">
                                            <a href="#" class="btn btn-primary w-md">Get started</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="card pricing-box text-center">
                                <div class="bg-primary-subtle p-5">
                                    <div class="mb-3">
                                        <i class="fas fa-cubes text-primary h1"></i>
                                    </div>
                                    <div class="">
                                        <h1 class="fw-bold"><sup class="me-1"></sup>299$<small> / Per month</small></h1>
                                    </div>
                                </div>
                                <div class="card-body position-relative">
                                    <div class="text-center">
                                        <h5
                                            class="bg-danger text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">
                                            Professional</h5>
                                        <div class="mt-3">
                                            <ul class="list-unstyled plan-features">
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Free Live Support</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Unlimited User</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    No Time Tracking</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> Projects
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Scalable Bandwidth</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> FTP Login
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-5">
                                            <a href="#" class="btn btn-primary w-md">Get started</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="card pricing-box text-center">
                                <div class="bg-primary-subtle p-5">
                                    <div class="mb-3">
                                        <i class="fas fa-tape text-primary h1"></i>
                                    </div>
                                    <div class="">
                                        <h1 class="fw-bold"><sup class="me-1"></sup>399$<small> / Per month</small></h1>
                                    </div>
                                </div>
                                <div class="card-body position-relative">
                                    <div class="text-center">
                                        <h5
                                            class="bg-info text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">
                                            Enterprise</h5>
                                        <div class="mt-3">
                                            <ul class="list-unstyled plan-features">
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Free Live Support</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Unlimited User</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    No Time Tracking</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> Projects
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Scalable Bandwidth</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> FTP Login
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>24/7</b> Support
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-5">
                                            <a href="#" class="btn btn-primary w-md">Get started</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="card pricing-box text-center">
                                <div class="bg-primary-subtle p-5">
                                    <div class="mb-3">
                                        <i class="fas fa-store text-primary h1"></i>
                                    </div>
                                    <div class="">
                                        <h1 class="fw-bold"><sup class="me-1"></sup>499$<small> / Per month</small></h1>
                                    </div>
                                </div>
                                <div class="card-body position-relative">
                                    <div class="text-center">
                                        <h5
                                            class="bg-warning text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">
                                            Unlimited</h5>
                                        <div class="mt-3">
                                            <ul class="list-unstyled plan-features">
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Free Live Support</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Unlimited User</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    No Time Tracking</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> Projects
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    Scalable Bandwidth</li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> FTP Login
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>24/7</b> Support
                                                </li>
                                                <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i>
                                                    <b>Unlimited</b> Storage
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-5">
                                            <a href="#" class="btn btn-primary w-md">Get started</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="card pricing-box text-center">
                    <div class="bg-primary-subtle p-5">
                        <div class="mb-3">
                            <i class="fas fa-bahai text-primary h1"></i>
                        </div>
                        <div class="">
                            <h1 class="fw-bold"><sup class="me-1"></sup>19$<small> / Per month</small></h1>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="text-center">
                            <h5 class="bg-success text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">Starter</h5>
                            <div class="mt-3">
                                <ul class="list-unstyled plan-features">
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Free Live Support</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Unlimited User</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> No Time Tracking</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Scalable Bandwidth</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> <b>Unlimited</b> FTP Login</li>
                                </ul>
                            </div>
                            <div class="mt-5">
                                <a href="#" class="btn btn-primary w-md">Get started</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card pricing-box text-center">
                    <div class="bg-primary-subtle p-5">
                        <div class="mb-3">
                            <i class="fas fa-cubes text-primary h1"></i>
                        </div>
                        <div class="">
                            <h1 class="fw-bold"><sup class="me-1"></sup>29$<small> / Per month</small></h1>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="text-center">
                            <h5 class="bg-danger text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">Professional</h5>
                            <div class="mt-3">
                                <ul class="list-unstyled plan-features">
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Free Live Support</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Unlimited User</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> No Time Tracking</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> <b>Unlimited</b> Projects</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Scalable Bandwidth</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> <b>Unlimited</b> FTP Login</li>
                                </ul>
                            </div>
                            <div class="mt-5">
                                <a href="#" class="btn btn-primary w-md">Get started</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card pricing-box text-center">
                    <div class="bg-primary-subtle p-5">
                        <div class="mb-3">
                            <i class="fas fa-tape text-primary h1"></i>
                        </div>
                        <div class="">
                            <h1 class="fw-bold"><sup class="me-1"></sup>39$<small> / Per month</small></h1>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="text-center">
                            <h5 class="bg-info text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">Enterprise</h5>
                            <div class="mt-3">
                                <ul class="list-unstyled plan-features">
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Free Live Support</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Unlimited User</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> No Time Tracking</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> <b>Unlimited</b> Projects</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Scalable Bandwidth</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> <b>Unlimited</b> FTP Login</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> <b>24/7</b> Support</li>
                                </ul>
                            </div>
                            <div class="mt-5">
                                <a href="#" class="btn btn-primary w-md">Get started</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card pricing-box text-center">
                    <div class="bg-primary-subtle p-5">
                        <div class="mb-3">
                            <i class="fas fa-store text-primary h1"></i>
                        </div>
                        <div class="">
                            <h1 class="fw-bold"><sup class="me-1"></sup>49$<small> / Per month</small></h1>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="text-center">
                            <h5 class="bg-warning text-white p-2 w-lg d-inline-block rounded-pill position-absolute top-0 left-50 translate-middle">Unlimited</h5>
                            <div class="mt-3">
                                <ul class="list-unstyled plan-features">
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Free Live Support</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Unlimited User</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> No Time Tracking</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> <b>Unlimited</b> Projects</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> Scalable Bandwidth</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> <b>Unlimited</b> FTP Login</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> <b>24/7</b> Support</li>
                                    <li><i class="mdi mdi-check-bold align-middle fs-16 text-success me-2"></i> <b>Unlimited</b> Storage</li>
                                </ul>
                            </div>
                            <div class="mt-5">
                                <a href="#" class="btn btn-primary w-md">Get started</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> -->
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
