@extends('layouts.frontend')

@section('content')

    <div class="innercontbg1">

        <!-- Inner collage section start -->
        <section class="spiritual-collage">
            <div class="innercollagecont">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">

                            <!-- Breadcrumb -->
                            <div class="breadcrumbarea">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Spiritual Tours
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- Breadcrumb end -->

                            <div class="mainheading topmargin5">
                                <h1 class="text-uppercase">
                                    <span class="second-color">
                                        Journeys<br>Beyond the
                                    </span>
                                    <br>Ordinary
                                </h1>
                            </div>

                            <div class="innercolinfotext">
                                Travel with Sakhashree on thoughtfully curated spiritual
                                journeys to sacred places, where ancient traditions,
                                inner reflection and meaningful experiences come together.
                            </div>

                        </div>
                    </div>

                    <div class="innercolmobpadd"></div>
                </div>
            </div>
        </section>
        <!-- Inner collage section end -->


        <!-- Middle section start -->
        <section class="innermidcontarea1">

            <div class="container">

                {{--   UPCOMING TOURS   --}}
                @if ($upcomingTours->count() > 0)

                    <div class="innerheadarea topmargin30">
                        <div class="innerheadcont">
                            <div class="ornament" aria-hidden="true">
                                <img src="{{ asset('dist/img/sidebarhead1.svg') }}">
                            </div>

                            <div class="mainheading text-center">
                                <h2 class="mb-0">Upcoming Tours</h2>
                            </div>

                            <div class="ornament" aria-hidden="true">
                                <img src="{{ asset('dist/img/sidebarhead.svg') }}">
                            </div>
                        </div>

                    </div>


                    <div class="topmargin30">

                        <div id="AboutSlider" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">

                                @foreach ($upcomingTours as $key => $tour)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                                        <div class="uebox">

                                            <div class="row align-items-center">

                                                <div class="col-lg-7">

                                                    <div class="ueboxcont">

                                                        <h2>
                                                            {{ $tour->title }}
                                                        </h2>

                                                        <div class="ueboxinfo">
                                                            {!! $tour->description !!}
                                                        </div>


                                                        <div class="pointsiconinfoarea topmargin20">

                                                            {{-- Date --}}
                                                            @if ($tour->start_date || $tour->end_date)
                                                                <div class="pointsiconinfo">

                                                                    <div>
                                                                        <img
                                                                            src="{{ asset('dist/img/calendar_icon1.svg') }}">
                                                                    </div>

                                                                    <div>
                                                                        @if ($tour->start_date && $tour->end_date)
                                                                            {{ \Carbon\Carbon::parse($tour->start_date)->format('d') }}
                                                                            -
                                                                            {{ \Carbon\Carbon::parse($tour->end_date)->format('d M Y') }}
                                                                        @elseif ($tour->start_date)
                                                                            {{ \Carbon\Carbon::parse($tour->start_date)->format('d M Y') }}
                                                                        @else
                                                                            {{ \Carbon\Carbon::parse($tour->end_date)->format('d M Y') }}
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            @endif


                                                            {{-- Days --}}
                                                            @if ($tour->days)
                                                                <div class="pointsiconinfo">

                                                                    <div>
                                                                        <img src="{{ asset('dist/img/time_icon.svg') }}">
                                                                    </div>

                                                                    <div>
                                                                        {{ $tour->days }}
                                                                        {{ $tour->days == 1 ? 'Day' : 'Days' }}
                                                                    </div>

                                                                </div>
                                                            @endif


                                                            {{-- Location --}}
                                                            @if ($tour->location)
                                                                <div class="pointsiconinfo">

                                                                    <div>
                                                                        <img
                                                                            src="{{ asset('dist/img/location_icon.svg') }}">
                                                                    </div>

                                                                    <div>
                                                                        {{ $tour->location }}
                                                                    </div>

                                                                </div>
                                                            @endif

                                                        </div>


                                                        <div class="topmargin40">

                                                            <button class="primarybtn btnmd" data-bs-toggle="modal"
                                                                data-bs-target="#EnquireNow">

                                                                Enquire Now

                                                            </button>

                                                        </div>

                                                    </div>

                                                </div>


                                                {{-- Tour Image --}}
                                                <div class="col-lg-5">
                                                    <div class="ueboximg">
                                                        @if ($tour->image_file)
                                                            <img src="{{ asset('public/images/spiritual_tours/image_file/' . $tour->id . '/' . $tour->image_file) }}"
                                                                alt="{{ $tour->title }}">
                                                        @else
                                                            <img src="{{ asset('dist/images/no-image.png') }}"
                                                                alt="{{ $tour->title }}">
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>


                            {{-- Carousel Indicators --}}
                            @if ($upcomingTours->count() > 1)
                                <div class="carousel-indicators">

                                    @foreach ($upcomingTours as $key => $tour)
                                        <button type="button" data-bs-target="#AboutSlider"
                                            data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                                            {{ $key == 0 ? 'aria-current=true' : '' }}
                                            aria-label="Slide {{ $key + 1 }}">
                                        </button>
                                    @endforeach

                                </div>
                            @endif

                        </div>

                    </div>

                @endif
                {{-- ================= END UPCOMING TOURS ================= --}}


                {{-- ================= MORE THAN A JOURNEY ================= --}}

                <div class="innerheadarea topmargin50">

                    <div class="innerheadcont">

                        <div class="ornament" aria-hidden="true">
                            <img src="{{ asset('dist/img/sidebarhead1.svg') }}">
                        </div>

                        <div class="mainheading text-center">
                            <h2 class="mb-0">More than a Journey</h2>
                        </div>

                        <div class="ornament" aria-hidden="true">
                            <img src="{{ asset('dist/img/sidebarhead.svg') }}">
                        </div>

                    </div>

                </div>


                <div class="stjourneyarea topmargin30">

                    <div class="stjourneycard">
                        <div class="stjourneyicon">
                            <img src="{{ asset('dist/img/sacred_destinations.svg') }}">
                        </div>
                        <h4>Sacred Destinations</h4>
                        <div>
                            Visit places chosen for their spiritual significance and living traditions.
                        </div>
                    </div>


                    <div class="stjourneycard">
                        <div class="stjourneyicon">
                            <img src="{{ asset('dist/img/guided_experience.svg') }}">
                        </div>
                        <h4>Guided Experience</h4>
                        <div>
                            Experience sacred spaces with thoughtful guidance and deeper context.
                        </div>
                    </div>


                    <div class="stjourneycard">
                        <div class="stjourneyicon">
                            <img src="{{ asset('dist/img/inner_reflection.svg') }}">
                        </div>
                        <h4>Inner reflection</h4>
                        <div>
                            Create space for meditation, contemplation and personal connection.
                        </div>
                    </div>


                    <div class="stjourneycard">
                        <div class="stjourneyicon">
                            <img src="{{ asset('dist/img/journey_with_sakhashree.svg') }}">
                        </div>
                        <h4>Journey with Sakhashree</h4>
                        <div>
                            Share meaningful moments and experiences directly with Sakhashree Neeta.
                        </div>
                    </div>

                </div>


                {{-- ================= JOURNEY WITH SAKHASHREE ================= --}}

                <div class="jwsnbox topmargin50">

                    <div class="row align-items-center">

                        <div class="col-md-6">

                            <div class="jwsnimg">

                                <div class="jwsnimgshade"></div>

                                <img src="{{ asset('dist/img/jwsnimg.jpg') }}">

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="jwsnboxcont">

                                <div class="mainheading">

                                    <h2 class="black-color">
                                        A Journey With<br>
                                        <span class="second-color">
                                            Sakashree Neeta
                                        </span>
                                    </h2>

                                    <h6 class="primary-color textmedbold fst-italic">
                                        A Journey Shared, Not Just Led
                                    </h6>

                                </div>


                                <div class="infotxt">

                                    Every journey becomes an opportunity to pause, observe
                                    and connect more deeply with sacred traditions, with
                                    the places we visit and with ourselves.

                                    <br><br>

                                    <span class="textmedbold">
                                        Sakhashree Neeta's
                                    </span>
                                    presence brings together spiritual understanding,
                                    personal reflection and meaningful experiences
                                    throughout the journey.

                                </div>


                                <div class="topmargin30">

                                    <button class="primarybtn btnmd" data-bs-toggle="modal"
                                        data-bs-target="#RetreatExperience">

                                        Watch Neetaji's Retreat Experience

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="jwsnpointers text-center topmargin15">

                    Curated Journeys
                    <i class="fa-solid fa-circle"></i>

                    Guided Spiritual Practices
                    <i class="fa-solid fa-circle"></i>

                    Small Groups
                    <i class="fa-solid fa-circle"></i>

                    Sacred Destinations

                </div>


                {{-- ================= PAST JOURNEYS ================= --}}

                @if ($pastTours->count() > 0)
                    <div class="innerheadarea topmargin50">

                        <div class="innerheadcont">

                            <div class="ornament" aria-hidden="true">
                                <img src="{{ asset('dist/img/sidebarhead1.svg') }}">
                            </div>

                            <div class="mainheading text-center">
                                <h2 class="mb-0">Past Journeys</h2>
                            </div>

                            <div class="ornament" aria-hidden="true">
                                <img src="{{ asset('dist/img/sidebarhead.svg') }}">
                            </div>

                        </div>

                    </div>


                    <div class="swiper-container1 topmargin30">

                        <div class="swiper-wrapper">

                            @foreach ($pastTours as $tour)
                                <div class="swiper-slide">

                                    <div class="pastjourneybox">

                                        <div class="pastjourneyimg">

                                            @if ($tour->image_file)
                                                <img src="{{ asset('public/images/spiritual_tours/image_file/' . $tour->id . '/' . $tour->image_file) }}"
                                                    alt="{{ $tour->title }}">
                                            @else
                                                <img src="{{ asset('dist/images/no-image.png') }}"
                                                    alt="{{ $tour->title }}">
                                            @endif

                                        </div>


                                        <div class="pastjourneycont">

                                            <h6>
                                                {{ $tour->title }}
                                            </h6>

                                            <div>
                                                Journey with Sakhashree Neeta
                                            </div>


                                            <div class="d-flex gap-4 topmargin20">

                                                @if ($tour->days)
                                                    <div class="d-flex gap-2 align-items-center">

                                                        <div>
                                                            <img src="{{ asset('dist/img/days_icon.svg') }}">
                                                        </div>

                                                        <div>
                                                            {{ $tour->days }} {{ $tour->days == 1 ? 'Day' : 'Days' }}
                                                        </div>

                                                    </div>
                                                @endif


                                                {{-- @if ($tour->location)
                                                    <div class="d-flex gap-2 align-items-center">

                                                        <div>
                                                            <img src="{{ asset('dist/img/map_icon.svg') }}">
                                                        </div>

                                                        <div>
                                                            {{ $tour->location }}
                                                        </div>

                                                    </div>
                                                @endif --}}


                                                @if ($tour->start_date)
                                                    <div class="d-flex gap-2 align-items-center">

                                                        <div>
                                                            <img src="{{ asset('dist/img/calendar_icon2.svg') }}">
                                                        </div>

                                                        <div>
                                                            {{ $tour->start_date }}
                                                        </div>

                                                    </div>
                                                @endif

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            @endforeach

                        </div>


                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                    </div>
                @endif

            </div>

        </section>
        <!-- Middle section end -->

    </div>


    <!-- Enquire Now Modal -->
    <div class="modal fade" id="EnquireNow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-md">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">
                        Enquire Now
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>


                <div class="modal-body">

                    <div class="mb-3">
                        <input class="form-control form-control-lg" placeholder="Your Full Name">
                    </div>

                    <div class="mb-3">
                        <input class="form-control form-control-lg" placeholder="Enter Your Email ID">
                    </div>

                    <div class="mb-3">

                        <div class="row padding5pxarea">

                            <div class="col-5 padding5px">

                                <select class="form-select form-select-lg">

                                    <option value="">
                                        USA (+1)
                                    </option>

                                </select>

                            </div>

                            <div class="col-7 padding5px">

                                <input class="form-control form-control-lg" placeholder="Mobile / Telephone">

                            </div>

                        </div>

                    </div>


                    <div>

                        <textarea class="form-control" rows="5" placeholder="Tell us about your challenges or concerns"></textarea>

                    </div>


                    <div class="topmargin20">

                        <button class="secondrybtn btnmdfullwidth">
                            Send
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- Enquire Now Modal end -->

    <!-- Retreat Experience Videos Modal -->
    <div class="modal fade" id="RetreatExperience" tabindex="-1" aria-labelledby="retreatExperienceLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-md">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="retreatExperienceLabel">
                        Event Videos
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>

                <div class="modal-body">

                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/nlBqht22MOM?si=k-WDv9euCoNe1y-w" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe>

                </div>

            </div>

        </div>

    </div>
    <!-- Retreat Experience Videos Modal end -->

@endsection
