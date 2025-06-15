@extends('layouts.master')

@section('title')
    Tables
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
                    <h3 class="card-title">Basic table</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add the base class <code>.table</code> to any <code>&lt;table&gt;</code>, then
                        extend with our optional modifier classes or custom styles. All table styles are not inherited in
                        Bootstrap, meaning any nested tables can be styled independent from the parent.</p>
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Contextual colors</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use contextual classes to color tables, table rows or individual cells (e.q
                        <code>.table-primary</code>).
                    </p>
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-secondary">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-success">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-danger">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-warning">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-light mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Hoverable &amp; active</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.table-hover</code> to enable a hover state on table rows within a
                        <code>&lt;tbody&gt;</code>.
                    </p>
                    <p class="text-muted">These hoverable rows can also be combined with the striped variant:</p>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td class="table-active">Data</td>
                                <td>Data</td>
                            </tr>
                            <tr class="table-active">
                                <th scope="row">3</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-muted">Highlight a table row or cell by adding a <code>.table-active</code> class.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Nesting</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Border styles, active styles, and table variants are not inherited by nested
                        tables.</p>
                    <table class="table table-striped table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Subhead</th>
                                                <th scope="col">Subhead</th>
                                                <th scope="col">Subhead</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">A</th>
                                                <td>Subdata</td>
                                                <td>Subdata</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">B</th>
                                                <td>Subdata</td>
                                                <td>Subdata</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">C</th>
                                                <td>Subdata</td>
                                                <td>Subdata</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Header &amp; footer</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use the modifier classes <code>.table-{color}</code> to
                        <code>&lt;thead&gt;</code>.
                    </p>
                    <table class="table mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Foot</td>
                                <td>Foot</td>
                                <td>Foot</td>
                                <td>Foot</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Vertical alignment</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Table cells of <code>&lt;thead&gt;</code> are always vertical aligned to the
                        bottom. Table cells in <code>&lt;tbody&gt;</code> inherit their alignment from
                        <code>&lt;table&gt;</code> and are aligned to the the top by default.
                    </p>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="w-25">Heading 1</th>
                                    <th scope="col" class="w-25">Heading 2</th>
                                    <th scope="col" class="w-25">Heading 3</th>
                                    <th scope="col" class="w-25">Heading 4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-top">This cell is aligned to the top.</td>
                                    <td class="align-middle">This cell is aligned to the middle.</td>
                                    <td class="align-bottom">This cell is aligned to the bottom.</td>
                                    <td>This here is some placeholder text, intended to take up quite a bit of vertical
                                        space, to demonstrate how the vertical alignment works in the preceding cells.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Border variants</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.table-bordered</code> for borders on all sides of the table and cells.
                    </p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Long data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-muted">Add <code>.table-borderless</code> for a table without borders.</p>
                    <table class="table table-borderless mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Long data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Striped</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use <code>.table-striped</code> to add zebra-striping to any table row within the
                        <code>&lt;tbody&gt;</code>.
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-muted">Use <code>.table-striped-columns</code> to add zebra-striping to any table
                        column.</p>
                    <table class="table table-striped-columns">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-muted">These classes can also be added to table variants:</p>
                    <table class="table table-striped-columns table-primary">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-primary mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Head</th>
                                <th>Head</th>
                                <th>Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Small table</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add <code>.table-sm</code> to make any <code>.table</code> more compact by
                        cutting all cell <code>padding</code> in half.</p>
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Long data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Table group dividers</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add a thicker border, darker between table groups—<code>&lt;thead&gt;</code>,
                        <code>&lt;tbody&gt;</code>, and <code>&lt;tfoot&gt;</code>—with <code>.table-group-divider</code>.
                        Customize the color by changing the <code>border-top-color</code> (which we don’t currently provide
                        a utility class for at this time).
                    </p>
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Long data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Responsive table</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Make your tables always responsive, use <code>.table-responsive</code> for
                        horizontally scrolling tables.</p>
                    <p class="text-muted">Use <code>.table-responsive{-sm|-md|-lg|-xl|-xxl}</code> as needed to create
                        responsive tables up to a particular breakpoint. From that breakpoint and up, the table will behave
                        normally and not scroll horizontally.</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                    <th>Head</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                    <td>Data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Captions</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">A <code>&lt;caption&gt;</code> functions like a heading for a table. It helps
                        users with screen readers to find a table and understand what it’s about and decide if they want to
                        read it.</p>
                    <table class="table caption-top">
                        <caption>List of users</caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                                <th scope="col">Head</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-muted">You can also put the <code>&lt;caption&gt;</code> on the top of the table with
                        <code>.caption-top</code>.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
