@extends('layouts.master')

@section('title')
Typography
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
                    <h3 class="card-title">Basic headings</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">All HTML headings, <code>&lt;h1&gt;</code> through <code>&lt;h6&gt;</code>, are
                        available.</p>
                    <p class="text-muted"><code>.h1</code> through <code>.h6</code> classes are also available, for when you
                        want to match the font styling of a heading but cannot use the associated HTML element.</p>
                    <div class="card border">
                        <div class="card-body">
                            <h1>Heading 1</h1>
                            <h2>Heading 2</h2>
                            <h3>Heading 3</h3>
                            <h4>Heading 4</h4>
                            <h5>Heading 5</h5>
                            <h6>Heading 6</h6>
                        </div>
                    </div>
                    <p class="text-muted">Use the included utility classes to recreate the small secondary heading text</p>
                    <div class="card border">
                        <div class="card-body">
                            <h3 class="text-level-3 mb-0">Fancy display heading <small class="text-muted">With faded
                                    secondary text</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Links</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">Links have a default <code>color</code> and underline applied. While links change
                        on <code>:hover</code>, they don’t change based on whether someone <code>:visited</code> the link.
                        They also receive no special <code>:focus</code> styles.</p>
                    <p class="text-muted"><a href="#">This is an example link</a></p>
                    <p class="text-muted">Placeholder links—those without an <code>href</code>—are targeted with a more
                        specific selector and have their <code>color</code> and <code>text-decoration</code> reset to their
                        default values.</p>
                    <p class="text-muted"><a>This is a placeholder link</a></p>
                </div>
            </div>
            <div class="card ">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Blockquote</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">For quoting blocks of content from another source within your document. Wrap
                        <code>&lt;blockquote class="blockquote"&gt;</code> around any <abbr
                            title="HyperText Markup Language">HTML</abbr> as the quote.</p>
                    <div class="card border">
                        <div class="card-body pb-0">
                            <blockquote class="blockquote">
                                <p class="text-muted">A well-known quote, contained in a blockquote element.</p>
                            </blockquote>
                            <figure>
                                <blockquote class="blockquote">
                                    <p class="text-muted">A well-known quote, contained in a blockquote element.</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                                        Title</cite></figcaption>
                            </figure>
                            <figure class="text-center">
                                <blockquote class="blockquote">
                                    <p class="text-muted">A well-known quote, contained in a blockquote element.</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                                        Title</cite></figcaption>
                            </figure>
                        </div>
                    </div>
                    <p class="text-muted">The HTML spec requires that blockquote attribution be placed outside the
                        <code>&lt;blockquote&gt;</code>. When providing attribution, wrap your
                        <code>&lt;blockquote&gt;</code> in a <code>&lt;figure&gt;</code> and use a
                        <code>&lt;figcaption&gt;</code> or a block level element (e.g., <code>&lt;p&gt;</code>) with the
                        <code>.blockquote-footer</code> class. Be sure to wrap the name of the source work in
                        <code>&lt;cite&gt;</code> as well.</p>
                    <p class="mb-0">Use text utilities as needed to change the alignment of your blockquote.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Lists</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">Remove the default <code>list-style</code> and left margin on list items
                        (immediate children only). <strong>This only applies to immediate children list items</strong>,
                        meaning you will need to add the class for any nested lists as well.</p>
                    <div class="card border">
                        <div class="card-body pb-0">
                            <ul class="list-unstyled">
                                <li>This is a list.</li>
                                <li>It appears completely unstyled.</li>
                                <li>Structurally, it's still a list.</li>
                                <li>However, this style only applies to immediate child elements.</li>
                                <li>Nested lists:<ul>
                                        <li>are unaffected by this style</li>
                                        <li>will still show a bullet</li>
                                        <li>and have appropriate left margin</li>
                                    </ul>
                                </li>
                                <li>This may still come in handy in some situations.</li>
                            </ul>
                        </div>
                    </div>
                    <p class="text-muted">Remove a list’s bullets and apply some light <code>margin</code> with a
                        combination of two classes, <code>.list-inline</code> and <code>.list-inline-item</code>.</p>
                    <div class="card border">
                        <div class="card-body pb-0">
                            <ul class="list-inline">
                                <li class="list-inline-item">This is a list item.</li>
                                <li class="list-inline-item">And another one.</li>
                                <li class="list-inline-item">But they're displayed inline.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Abbreviations</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">Stylized implementation of HTML’s <code>&lt;abbr&gt;</code> element for
                        abbreviations and acronyms to show the expanded version on hover. Abbreviations have a default
                        underline and gain a help cursor to provide additional context on hover and to users of assistive
                        technologies.</p>
                    <p class="text-muted">Add <code>.initialism</code> to an abbreviation for a slightly smaller font-size.
                    </p>
                    <div class="card border">
                        <div class="card-body pb-0">
                            <p class=""><abbr title="attribute">attr</abbr></p>
                            <p class=""><abbr title="HyperText Markup Language" class="initialism">HTML</abbr></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Display headings</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">Traditional heading elements are designed to work best in the meat of your page
                        content. When you need a heading to stand out, consider using a <strong>display heading</strong>—a
                        larger, slightly more opinionated heading style.</p>
                    <div class="card border">
                        <div class="card-body">
                            <h1 class="display-1">Display 1</h1>
                            <h1 class="display-2">Display 2</h1>
                            <h1 class="display-3">Display 3</h1>
                            <h1 class="display-4">Display 4</h1>
                            <h1 class="display-5">Display 5</h1>
                            <h1 class="display-6">Display 6</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Lead</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">Make a paragraph stand out by adding <code>.lead</code>.</p>
                    <div class="card border">
                        <div class="card-body">
                            <p class="lead mb-0">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis
                                mollis, est non commodo luctus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Inline text styles</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Styling for common inline HTML5 elements.</p>
                    <div class="card border">
                        <div class="card-body pb-0">
                            <p class="">You can use the mark tag to <mark>highlight</mark> text.</p>
                            <p class=""><del>This line of text is meant to be treated as deleted text.</del></p>
                            <p class=""><s>This line of text is meant to be treated as no longer accurate.</s></p>
                            <p class=""><ins>This line of text is meant to be treated as an addition to the
                                    document.</ins></p>
                            <p class=""><u>This line of text will render as underlined.</u></p>
                            <p class=""><small>This line of text is meant to be treated as fine print.</small></p>
                            <p class=""><strong>This line rendered as bold text.</strong></p>
                            <p class=""><em>This line rendered as italicized text.</em></p>
                        </div>
                    </div>
                    <p class="text-muted">If you want to style your text, you should use the following classes instead:</p>
                    <ul>
                        <li><code>.mark</code> will apply the same styles as <code>&lt;mark&gt;</code>.</li>
                        <li><code>.small</code> will apply the same styles as <code>&lt;small&gt;</code>.</li>
                        <li><code>.text-decoration-underline</code> will apply the same styles as <code>&lt;u&gt;</code>.
                        </li>
                        <li><code>.text-decoration-line-through</code> will apply the same styles as <code>&lt;s&gt;</code>.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Description list alignment</h3>
                </div>
                <div class="card-body pb-0">
                    <p class="text-muted">Align terms and descriptions horizontally by using our grid system’s predefined
                        classes (or semantic mixins). For longer terms, you can optionally add a <code>.text-truncate</code>
                        class to truncate the text with an ellipsis.</p>
                    <div class="card border">
                        <div class="card-body pb-0">
                            <dl class="row">
                                <dt class="col-sm-3">Description lists</dt>
                                <dd class="col-sm-9">A description list is perfect for defining terms.</dd>
                                <dt class="col-sm-3">Term</dt>
                                <dd class="col-sm-9">
                                    <p class="text-muted">Definition for the term.</p>
                                    <p class="text-muted">And some more placeholder definition text.</p>
                                </dd>
                                <dt class="col-sm-3">Another term</dt>
                                <dd class="col-sm-9">This definition is short, so no extra paragraphs or anything.</dd>
                                <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
                                <dd class="col-sm-9">This can be useful when space is tight. Adds an ellipsis at the end.
                                </dd>
                                <dt class="col-sm-3">Nesting</dt>
                                <dd class="col-sm-9">
                                    <dl class="row">
                                        <dt class="col-sm-4">Nested definition list</dt>
                                        <dd class="col-sm-8">I heard you like definition lists. Let me put a definition
                                            list inside your definition list.</dd>
                                    </dl>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-bordered">
                    <h3 class="card-title">Summary</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">The default <code>cursor</code> on summary is <code>text</code>, so we reset that
                        to <code>pointer</code> to convey that the element can be interacted with by clicking on it.</p>
                    <div>
                        <details>
                            <summary>Some details</summary>
                            <p class="text-muted">More info about the details.</p>
                        </details>
                        <details>
                            <summary>Even more details</summary>
                            <p class="text-muted">Here are even more details about the details.</p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
