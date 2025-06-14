@extends('layouts.master')

@section('title')
    Buttons Group
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
                    <p class="text-muted">Wrap a series of buttons with <code>.btn</code> in <code>.btn-group</code>.</p>
                    <div class="btn-group">
                        <button class="btn btn-primary">Left</button>
                        <button class="btn btn-primary">Middle</button>
                        <button class="btn btn-primary">Right</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Toolbar</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Combine sets of button groups into button toolbars for more complex components.
                        Use utility classes as needed to space out groups, buttons, and more.</p>
                    <div class="d-grid gap-2">
                        <div class="btn-toolbar">
                            <div class="btn-group me-2">
                                <button class="btn btn-primary">1</button>
                                <button class="btn btn-primary">2</button>
                                <button class="btn btn-primary">3</button>
                                <button class="btn btn-primary">4</button>
                            </div>
                            <div class="btn-group me-2">
                                <button class="btn btn-primary">5</button>
                                <button class="btn btn-primary">6</button>
                                <button class="btn btn-primary">7</button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-primary">8</button>
                            </div>
                        </div>
                        <div class="btn-toolbar">
                            <div class="btn-group me-2">
                                <button class="btn btn-primary">1</button>
                                <button class="btn btn-primary">2</button>
                                <button class="btn btn-primary">3</button>
                                <button class="btn btn-primary">4</button>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" placeholder="Input group example">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Nesting</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Place a <code>.btn-group</code> within another <code>.btn-group</code> when you
                        want dropdown menus mixed with a series of buttons.</p>
                    <div class="btn-group">
                        <button class="btn btn-primary">1</button>
                        <button class="btn btn-primary">2</button>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Dropdown</button>
                            <div class="dropdown-menu dropdown-menu-start">
                                <a class="dropdown-item" href="#">Link</a>
                                <a class="dropdown-item" href="#">Link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Vertical</h3>
                </div>
                <div class="card-body">
                    <p>Make a set of buttons appear vertically stacked rather than horizontally</p>
                    <div class="btn-group-vertical me-2">
                        <button class="btn btn-primary">Button</button>
                        <button class="btn btn-primary">Button</button>
                        <button class="btn btn-primary">Button</button>
                        <button class="btn btn-primary">Button</button>
                        <button class="btn btn-primary">Button</button>
                        <button class="btn btn-primary">Button</button>
                    </div>
                    <div class="btn-group-vertical">
                        <button class="btn btn-primary">Button</button>
                        <button class="btn btn-primary">Button</button>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Dropdown</button>
                            <div class="dropdown-menu dropdown-menu-start">
                                <a class="dropdown-item" href="#">Link</a> <a class="dropdown-item"
                                    href="#">Link</a>
                            </div>
                        </div>
                        <button class="btn btn-primary">Button</button>
                        <button class="btn btn-primary">Button</button>
                        <button class="btn btn-primary">Button</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Sizing</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Instead of applying button sizing classes to every button in a group, just add
                        <code>.btn-group-{sm|lg}</code> to each <code>.btn-group</code>, including each one when nesting
                        multiple groups.
                    </p>
                    <div class="btn-group btn-group-lg mb-2">
                        <button class="btn btn-primary">Left</button>
                        <button class="btn btn-primary">Middle</button>
                        <button class="btn btn-primary">Right</button>
                    </div>
                    <br>
                    <div class="btn-group mb-2">
                        <button class="btn btn-primary">Left</button>
                        <button class="btn btn-primary">Middle</button>
                        <button class="btn btn-primary">Right</button>
                    </div>
                    <br>
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-primary">Left</button>
                        <button class="btn btn-primary">Middle</button>
                        <button class="btn btn-primary">Right</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Split button</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Create split button dropdowns with virtually the same markup as single button
                        dropdowns, but with the addition of <code>.dropdown-toggle-split</code> for proper spacing around
                        the dropdown caret.</p>
                    <div class="btn-group me-2">
                        <button class="btn btn-primary">Dropdown</button>
                        <button class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"></button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Action</a>
                            <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div class="btn-group dropup me-2">
                        <button class="btn btn-primary">Dropup</button>
                        <button class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"></button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Action</a>
                            <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div class="btn-group dropend me-2">
                        <button class="btn btn-primary">Dropend</button>
                        <button class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"></button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Action</a>
                            <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div class="btn-group">
                        <div class="btn-group dropstart">
                            <button class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown"></button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Action</a>
                                <a href="#" class="dropdown-item">Another action</a>
                                <a href="#" class="dropdown-item">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                        <button class="btn btn-primary">Dropstart</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Checkbox and radio button</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">Combine button-like checkbox and radio toggle buttons into a seamless looking
                        button group.</p>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Radio</h3>
                        </div>
                        <div class="card-body">
                            <div class="btn-group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                    checked="checked">
                                <label class="btn btn-outline-primary" for="btnradio1">Radio 1</label> <input
                                    type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                <label class="btn btn-outline-primary" for="btnradio2">Radio 2</label> <input
                                    type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                <label class="btn btn-outline-primary" for="btnradio3">Radio 3</label>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header card-header-bordered">
                            <h3 class="card-title">Checkbox</h3>
                        </div>
                        <div class="card-body">
                            <div class="btn-group">
                                <input type="checkbox" class="btn-check" id="btncheck1">
                                <label class="btn btn-outline-primary" for="btncheck1">Checkbox 1</label> <input
                                    type="checkbox" class="btn-check" id="btncheck2">
                                <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label> <input
                                    type="checkbox" class="btn-check" id="btncheck3">
                                <label class="btn btn-outline-primary" for="btncheck3">Checkbox 3</label>
                            </div>
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
