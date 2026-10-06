@extends('layouts.frontend')

@section('content')
    <main class="mainwrapper">

        <div class="innercontbg">

            {{-- Middle section start --}}
            <section class="innermidcontarea">
                <div class="container">
                    {{-- Breadcrumb --}}
                    <div class="breadcrumbarea">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    FAQ’s
                                </li>
                            </ol>

                        </nav>

                    </div>


                    {{-- Page Heading --}}
                    <div class="mainheading topmargin5">

                        <h1 class="text-uppercase">

                            <span class="second-color">
                                Everything You
                            </span>
                            <br>
                            Need to Know
                        </h1>
                    </div>

                    {{-- FAQ Category Tabs --}}
                    <div class="faq-tabs-sticky topmargin40">

                        <div class="faqcatboxes">

                            @foreach ($faqTypes as $faqType)
                                @php
                                    $categoryFaqs = $faqs->where('faq_type_id', $faqType->id);
                                @endphp

                                <div class="faqcatbox">

                                    <a href="javascript:void(0)" class="faqcategory-item {{ $loop->first ? 'active' : '' }}"
                                        data-target="#FaqCat{{ $faqType->id }}">

                                        <div class="faqiconcircle">

                                            <img src="{{ asset('dist/img/' . $faqType->icon) }}" alt="{{ $faqType->name }}">

                                        </div>

                                        <h6>
                                            {{ $faqType->name }}
                                        </h6>

                                        <div class="faqcatquestext">
                                            {{ $categoryFaqs->count() }} Questions
                                        </div>

                                    </a>

                                </div>
                            @endforeach

                        </div>

                    </div>

                    {{-- FAQ Accordion Sections --}}
                    <div class="faqaccordionbox">

                        @foreach ($faqTypes as $faqType)
                            @php
                                $categoryFaqs = $faqs->where('faq_type_id', $faqType->id);
                            @endphp

                            <div class="faq-section" id="FaqCat{{ $faqType->id }}">

                                <div class="faqiconarea">
                                    <div class="faqiconcircle">
                                        <img src="{{ asset('dist/img/' . $faqType->icon) }}" alt="{{ $faqType->name }}">
                                    </div>
                                </div>

                                <div class="faqcontarea">

                                    <div class="faqheadarea">

                                        <div>
                                            <h4>
                                                {{ $faqType->name }}
                                            </h4>
                                        </div>

                                        <div>
                                            <div class="faqsqueslabel">
                                                <span class="toggler" id="toggler-slideOne{{ $faqType->id }}">

                                                    <span class="expandSlider" style="cursor:pointer;">

                                                        {{ $categoryFaqs->count() }} Questions

                                                        <i class="fa-solid fa-chevron-down"></i>

                                                    </span>

                                                    <span class="collapseSlider" style="cursor:pointer;">

                                                        {{ $categoryFaqs->count() }} Questions

                                                        <i class="fa-solid fa-chevron-up"></i>

                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- Hidden FAQ Content --}}

                                    <div class="slider2" id="slideOne{{ $faqType->id }}">
                                        <div class="faqacctogglearea">
                                            <div class="accordion faq-accordion" id="accordionMain{{ $faqType->id }}">

                                                @foreach ($categoryFaqs as $faq)
                                                    <div class="accordion-item">

                                                        <h2 class="accordion-header">

                                                            <div class="accordion-button collapsed"
                                                                data-bs-target="#faq{{ $faqType->id }}_{{ $faq->id }}"
                                                                role="button">

                                                                <div class="faqheading">
                                                                    {{ $faq->question }}
                                                                </div>
                                                            </div>
                                                        </h2>

                                                        <div id="faq{{ $faqType->id }}_{{ $faq->id }}"
                                                            class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                            data-bs-parent="#accordionMain{{ $faqType->id }}">

                                                            <div class="accordion-body">
                                                                <div class="faqinfobox">
                                                                    {!! $faq->answer !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Hidden FAQ Content End --}}

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>

    {{-- FAQ JavaScript --}}
    <script>
        document.addEventListener('click', function(e) {
            // Allow normal link click
            if (e.target.closest('.useforbtn a')) {
                return;
            }
            const acc = e.target.closest('.accordion-button');

            if (acc) {
                const target = acc.getAttribute('data-bs-target');
                const collapseEl = document.querySelector(target);

                if (collapseEl) {
                    const bsCollapse = new bootstrap.Collapse(
                        collapseEl, {
                            toggle: true
                        }
                    );
                    // Toggle arrow state
                    acc.classList.toggle('collapsed');
                }
            }
        });


        /* FAQ Category Navigation */
        $(document).ready(function() {

            // Space above section after scrolling
            var headerOffset =
                $('.faq-tabs-sticky').outerHeight() + 120;
            // Click FAQ Category

            $('.faqcategory-item').on('click', function(e) {
                e.preventDefault();
                var target =
                    $($(this).data('target'));

                // Active class
                $('.faqcategory-item')
                    .removeClass('active');
                $('.faqcatbox')
                    .removeClass('active');
                $(this)
                    .addClass('active');
                $(this)
                    .closest('.faqcatbox')
                    .addClass('active');


                // Smooth vertical scroll
                $('html, body')
                    .stop()
                    .animate({
                        scrollTop: target.offset().top -
                            headerOffset
                    }, 600);


                // Smooth horizontal tab scroll
                $('.faqcatboxes')
                    .stop()
                    .animate({
                        scrollLeft: $(this)
                            .closest('.faqcatbox')
                            .position().left +

                            $('.faqcatboxes').scrollLeft() - 20
                    }, 300);
            });

            // Change active tab while scrolling
            $(window).on('scroll', function() {
                var scrollPos =
                    $(window).scrollTop() +
                    headerOffset +
                    10;

                $('.faq-section').each(function() {

                    var top =
                        $(this).offset().top;

                    var bottom =
                        top +
                        $(this).outerHeight();

                    if (
                        scrollPos >= top &&
                        scrollPos < bottom
                    ) {
                        var id =
                            "#" +
                            $(this).attr('id');

                        $('.faqcategory-item')
                            .removeClass('active');

                        $('.faqcatbox')
                            .removeClass('active');

                        var activeLink =
                            $('.faqcategory-item[data-target="' +
                                id +
                                '"]');

                        activeLink.addClass('active');

                        activeLink
                            .closest('.faqcatbox')
                            .addClass('active');


                        // Auto center active tab
                        $('.faqcatboxes')
                            .stop()
                            .animate({

                                scrollLeft: activeLink
                                    .closest('.faqcatbox')
                                    .position().left +

                                    $('.faqcatboxes')
                                    .scrollLeft() - 20

                            }, 200);

                        return false;
                    }
                });
            });
        });
    </script>
@endsection
