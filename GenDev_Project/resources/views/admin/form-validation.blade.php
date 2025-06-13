@extends('layouts.master')

@section('title')
    Validation
@endsection

@section('topbar-title')
    Forms
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Normal Validation </h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="First name" value="Mark" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                        placeholder="Last name" value="Otto" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">State</label>
                                    <select class="form-select" id="validationCustom03" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom04" class="form-label">City</label>
                                    <input type="text" class="form-control" id="validationCustom04" placeholder="City"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom05" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="validationCustom05" placeholder="Zip"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tooltips Validation</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip01" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="validationTooltip01"
                                        placeholder="First name" value="Mark" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip02" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="validationTooltip02"
                                        placeholder="Last name" value="Otto" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltipUsername" class="form-label">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="validationTooltipUsername"
                                            placeholder="Username" aria-describedby="validationTooltipUsernamePrepend"
                                            required>
                                        <div class="invalid-tooltip">
                                            Please choose a unique and valid username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip04" class="form-label">State</label>
                                    <input type="text" class="form-control" id="validationTooltip04"
                                        placeholder="State" required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid state.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip03" class="form-label">City</label>
                                    <input type="text" class="form-control" id="validationTooltip03"
                                        placeholder="City" required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid city.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Range validation</h4>
                </div>
                <div class="card-body">
                    <form action="#" class="custom-validation">

                        <div class="mb-3">
                            <label>Min Length</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-minlength="6"
                                    placeholder="Min 6 chars." />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Max Length</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-maxlength="6"
                                    placeholder="Max 6 chars." />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Range Length</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-length="[5,10]"
                                    placeholder="Text between 5 - 10 chars length" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Min Value</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-min="6"
                                    placeholder="Min value is 6" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Max Value</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-max="6"
                                    placeholder="Max value is 6" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Range Value</label>
                            <div>
                                <input class="form-control" required type="text" min="6" max="100"
                                    placeholder="Number between 6 - 100" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Regular Exp</label>
                            <div>
                                <input type="text" class="form-control" required
                                    data-parsley-pattern="#[A-Fa-f0-9]{6}" placeholder="Hex. Color" />
                            </div>
                        </div>

                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Validation type</h4>
                </div>
                <div class="card-body">
                    <form class="custom-validation" action="#">
                        <div class="mb-3">
                            <label>Required</label>
                            <input type="text" class="form-control" required placeholder="Type something" />
                        </div>

                        <div class="mb-3">
                            <label>Equal To</label>
                            <div>
                                <input type="password" id="pass2" class="form-control" required
                                    placeholder="Password" />
                            </div>
                            <div class="mt-2">
                                <input type="password" class="form-control" required data-parsley-equalto="#pass2"
                                    placeholder="Re-Type Password" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>E-Mail</label>
                            <div>
                                <input type="email" class="form-control" required type="email"
                                    placeholder="Enter a valid e-mail" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>URL</label>
                            <div>
                                <input parsley-type="url" type="url" class="form-control" required
                                    placeholder="URL" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Digits</label>
                            <div>
                                <input data-parsley-type="digits" type="text" class="form-control" required
                                    placeholder="Enter only digits" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Number</label>
                            <div>
                                <input data-parsley-type="number" type="text" class="form-control" required
                                    placeholder="Enter only numbers" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Alphanumeric</label>
                            <div>
                                <input data-parsley-type="alphanum" type="text" class="form-control" required
                                    placeholder="Enter alphanumeric value" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Textarea</label>
                            <div>
                                <textarea required class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Group validation</h3>
                </div>
                <div class="card-body">
                    <form class="custom-validation" action="#">
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="text" id="first-name" class="form-control" name="firstName"
                                    placeholder="Insert your firstname" required />
                                <label for="first-name" class="fw-normal">First name</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="text" id="last-name" class="form-control" name="lastName"
                                    placeholder="Insert your lastname" required />
                                <label for="last-name" class="fw-normal">Last name</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="age"
                                placeholder="Please enter your age" required />
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="gender" required>
                                <option value="default">Select your gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Please enter your email" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Homepage</span>
                                <input type="text" class="form-control" name="homepage"
                                    placeholder="https://example.me" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password1"
                                placeholder="please provide your password" required />
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password2"
                                placeholder="Please insert again your password" required />
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="agreement" name="agreement"
                                    required />
                                <label class="form-check-label fw-medium" for="agreement">Accepts the agreement</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/libs/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
