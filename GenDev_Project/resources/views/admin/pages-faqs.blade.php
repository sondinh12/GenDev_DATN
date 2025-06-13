@extends('layouts.master')

@section('title')
    FAQs
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
                    <h4 class="card-title">Have any Questions ?</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">It will be as simple as in fact, it will be occidental. it will seem like
                        simplified English, as a skeptical Cambridge friend</p>
                    <div class="mt-3">
                        <button type="button" class="btn btn-success mt-2 me-2 waves-effect waves-light">Email Us</button>
                        <button type="button" class="btn btn-info mt-2 waves-effect waves-light">Send us a tweet</button>
                    </div>
                    <div class="nav nav-pills card-header-pills pricing-nav-tabs mb-0 mt-5" id="card2-tab" role="tablist">
                        <a class="nav-item nav-link active" id="faq-gen-ques" data-bs-toggle="tab" href="#faq-general"
                            aria-selected="false" role="tab" tabindex="-1">General Questions</a>
                        <a class="nav-item nav-link" id="faq-priv" data-bs-toggle="tab" href="#faq-privacy"
                            aria-selected="false" role="tab" tabindex="-1">Privacy Policy</a>
                        <a class="nav-item nav-link" id="faq-pric" data-bs-toggle="tab" href="#faq-pricing"
                            aria-selected="false" role="tab" tabindex="-1">Pricing & Plans</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="faq-general" role="tabpanel">
                                        <div>
                                            <div class="text-center mb-5">
                                                <h5>General Questions</h5>
                                                <p class="text-muted mb-0">Sed ut perspiciatis unde omnis iste natus error
                                                    sit</p>
                                            </div>

                                            <div class="accordion" id="accordionExample-general">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne-general"
                                                            aria-expanded="true" aria-controls="collapseOne-general">
                                                            <i class=" fab fa-telegram-plane me-2 align-middle"></i>What is
                                                            Lorem Ipsum ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne-general" class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionExample-general">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0">If several languages coalesce, the
                                                                grammar of the resulting language is more simple and regular
                                                                than that of the individual languages. The new common
                                                                language will be more simple and regular than the existing.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo-general"
                                                            aria-expanded="false" aria-controls="collapseTwo-general">
                                                            <i class=" fas fa-bookmark me-2 align-middle"></i>Why do we use
                                                            it ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo-general" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample-general">
                                                        <div class="accordion-body">
                                                            <p class="mb-0">Everyone realizes why a new common language
                                                                would be desirable one could refuse to pay expensive
                                                                translators. To achieve this, it would be necessary to have
                                                                uniform grammar, pronunciation and more common words.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseThree-general" aria-expanded="false"
                                                            aria-controls="collapseThree-general">
                                                            <i class="fas fa-bell me-2 align-middle"></i>Where can I get
                                                            some ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseThree-general" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample-general">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0">Their separate existence is a myth.
                                                                For science, music, sport, etc, Europe uses the same
                                                                vocabulary. The languages only differ in their grammar,
                                                                their pronunciation and their most common words.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseFour-general"
                                                            aria-expanded="false" aria-controls="collapseFour-general">
                                                            <i class="fas fa-archive me-2 align-middle"></i>Where does it
                                                            come from ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseFour-general" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample-general">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0">To an English person, it will seem
                                                                like simplified English, as a skeptical Cambridge friend of
                                                                mine told me what Occidental is. The European languages are
                                                                members of the same family separate existence.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="faq-privacy" role="tabpanel">
                                        <div>
                                            <div class="text-center mb-5">
                                                <h5>Privacy Policy</h5>
                                                <p class="text-muted mb-0">Neque porro quisquam est, qui dolorem ipsum quia
                                                </p>
                                            </div>

                                            <div class="accordion" id="accordionExample-Privacy">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseOne-Privacy" aria-expanded="true"
                                                            aria-controls="collapseOne-Privacy">
                                                            <i class=" fab fa-telegram-plane me-2 align-middle"></i>Why do
                                                            we use it ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne-Privacy" class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionExample-Privacy">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0">Everyone realizes why a new common
                                                                language would be desirable one could refuse to pay
                                                                expensive translators. To achieve this, it would be
                                                                necessary to have uniform grammar, pronunciation and more
                                                                common words.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseTwo-Privacy" aria-expanded="false"
                                                            aria-controls="collapseTwo-Privacy">
                                                            <i class=" fas fa-bookmark me-2 align-middle"></i>What is Lorem
                                                            Ipsum ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo-Privacy" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample-Privacy">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0">If several languages coalesce, the
                                                                grammar of the resulting language is more simple and regular
                                                                than that of the individual languages. The new common
                                                                language will be more simple and regular than the existing.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseThree-Privacy" aria-expanded="false"
                                                            aria-controls="collapseThree-Privacy">
                                                            <i class="fas fa-bell me-2 align-middle"></i>Where can I get
                                                            some ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseThree-Privacy" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample-Privacy">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0">Their separate existence is a myth.
                                                                For science, music, sport, etc, Europe uses the same
                                                                vocabulary. The languages only differ in their grammar,
                                                                their pronunciation and their most common words.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseFour-Privacy" aria-expanded="false"
                                                            aria-controls="collapseFour-Privacy">
                                                            <i class="as fa-archive me-2 align-middle"></i>Where does it
                                                            come from ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseFour-Privacy" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample-Privacy">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0">To an English person, it will seem
                                                                like simplified English, as a skeptical Cambridge friend of
                                                                mine told me what Occidental is. The European languages are
                                                                members of the same family separate existence.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="faq-pricing" role="tabpanel">
                                        <div>
                                            <div class="text-center mb-5">
                                                <h5>Pricing & Plans</h5>
                                                <p class="text-muted mb-0">Sed ut perspiciatis unde omnis iste natus error
                                                    sit</p>
                                            </div>

                                            <div class="accordion" id="accordionExample-Pricing">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseOne-Pricing" aria-expanded="true"
                                                            aria-controls="collapseOne-Pricing">
                                                            <i class=" fab fa-telegram-plane me-2 align-middle"></i>Where
                                                            does it come from ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne-Pricing" class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionExample-Pricing">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0"> If several languages coalesce, the
                                                                grammar of the resulting language is more simple and regular
                                                                than that of the individual languages. The new common
                                                                language will be more simple and regular than the existing.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseTwo-Pricing" aria-expanded="false"
                                                            aria-controls="collapseTwo-Pricing">
                                                            <i class=" fas fa-bookmark me-2 align-middle"></i> Where can I
                                                            get some ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo-Pricing" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample-Pricing">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0">Their separate existence is a myth.
                                                                For science, music, sport, etc, Europe uses the same
                                                                vocabulary. The languages only differ in their grammar,
                                                                their pronunciation and their most common words.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseThree-Pricing" aria-expanded="false"
                                                            aria-controls="collapseThree-Pricing">
                                                            <i class="fas fa-bell me-2 align-middle"></i>Why do we use it ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseThree-Pricing" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample-Pricing">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0">Everyone realizes why a new common
                                                                language would be desirable one could refuse to pay
                                                                expensive translators. To achieve this, it would be
                                                                necessary to have uniform grammar, pronunciation and more
                                                                common words.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseFour-Pricing" aria-expanded="false"
                                                            aria-controls="collapseFour-Pricing">
                                                            <i class="fas fa-archive me-2 align-middle"></i>Why do we use
                                                            it ?
                                                        </button>
                                                    </h2>
                                                    <div id="collapseFour-Pricing" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample-Pricing">
                                                        <div class="accordion-body">
                                                            <p class="text-muted mb-0">It will be as simple in fact, it
                                                                will be occidental. To an English person, it will seem like
                                                                simplified English, as a skeptical Cambridge friend of mine
                                                                told me what occidental languages are members.</p>
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
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
