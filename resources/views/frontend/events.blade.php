@extends('layouts.frontend')

@section('content')

    <main class="mainwrapper">

        <div class="innercontbg">
            <!-- Top header start -->
            <!-- Middle section start here -->
            <section class="innermidcontarea">
                <div class="container">
                    <!--Breadcrumb start here-->
                    <div class="breadcrumbarea">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Events</li>
                            </ol>
                        </nav>
                    </div>
                    <!--Breadcrumb end here-->

                    <div class="mainheading topmargin5">
                        <h1 class="text-uppercase"><span class="second-color">Sacred Events</span><br>divine Transformations
                        </h1>
                    </div>
                    <div class="innercolinfotext">Join our powerful events, workshops and pujas <br class="hidemob">designed
                        to uplift your energy, bring clarity <br class="hidemob">and invite divine blessings.</div>

                    <div class="innerheadarea topmargin40">
                        <div class="innerheadcont">
                            <div class="ornament" aria-hidden="true"><img src="{{ asset('dist/img/sidebarhead1.svg') }}">
                            </div>
                            <div class="mainheading text-center">
                                <h2 class="mb-0">Upcoming Events</h2>
                            </div>
                            <div class="ornament" aria-hidden="true"><img src="{{ asset('dist/img/sidebarhead.svg') }}">
                            </div>
                        </div>
                    </div>

                    <div class="topmargin30">
                        <div id="AboutSlider" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">

                                @foreach ($upcomingEvents as $key => $event)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                                        <div class="uebox">

                                            <div class="row align-items-center">

                                                <div class="col-lg-7">
                                                    <div class="ueboxcont">

                                                        <h2>{{ $event->title }}</h2>

                                                        <div class="ueboxinfo">
                                                            {!! $event->description ?? '' !!}
                                                        </div>

                                                        <div class="pointsiconinfoarea topmargin20">

                                                            {{-- Date --}}
                                                            <div class="pointsiconinfo">
                                                                <div>
                                                                    <img src="{{ asset('dist/img/calendar_icon1.svg') }}">
                                                                </div>

                                                                <div>
                                                                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}

                                                                </div>
                                                            </div>

                                                            {{-- Time --}}
                                                            <div class="pointsiconinfo">
                                                                <div>
                                                                    <img src="{{ asset('dist/img/time_icon.svg') }}">
                                                                </div>

                                                                <div>
                                                                    {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}
                                                                    to
                                                                    {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}
                                                                </div>
                                                            </div>

                                                            {{-- Location --}}
                                                            <div class="pointsiconinfo">
                                                                <div>
                                                                    <img src="{{ asset('dist/img/location_icon.svg') }}">
                                                                </div>

                                                                <div>
                                                                    {{ $event->city_name }}
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="topmargin40">
                                                            <button class="primarybtn btnmd" data-bs-toggle="modal"
                                                                data-bs-target="#EnquireNow">
                                                                Enquire Now
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>

                                                {{-- Image --}}
                                                <div class="col-lg-5">
                                                    <div class="ueboximg">

                                                        @if ($event->image_file)
                                                            <img src="{{ asset('public/images/events/' . $event->id . '/' . $event->image_file) }}"
                                                                alt="{{ $event->title }}">
                                                        @else
                                                            <img src="{{ asset('dist/img/ue_img01.jpg') }}"
                                                                alt="{{ $event->title }}">
                                                        @endif

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                            {{-- Carousel indicators --}}
                            @if ($upcomingEvents->count() > 0)
                                <div class="carousel-indicators">

                                    @foreach ($upcomingEvents as $key => $event)
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

                    <div class="innerheadarea topmargin40">
                        <div class="innerheadcont">

                            <div class="ornament" aria-hidden="true">
                                <img src="{{ asset('dist/img/sidebarhead1.svg') }}">
                            </div>

                            <div class="mainheading text-center">
                                <h2 class="mb-0">Past Events</h2>
                            </div>

                            <div class="ornament" aria-hidden="true">
                                <img src="{{ asset('dist/img/sidebarhead.svg') }}">
                            </div>

                        </div>
                    </div>


                    <div class="pecardarea topmargin30">

                        @foreach ($pastEvents as $event)
                            <div class="pecard">

                                {{-- Image --}}
                                <div class="pecardimg">

                                    @if ($event->image_file)
                                        <img src="{{ asset('public/images/events/' . $event->id . '/' . $event->image_file) }}"
                                            alt="{{ $event->title }}">
                                    @else
                                        <img src="{{ asset('dist/img/evets_img01.jpg') }}" alt="{{ $event->title }}">
                                    @endif

                                </div>


                                <div class="pecardcont">

                                    {{-- Title --}}
                                    <h6>{{ $event->title }}</h6>


                                    <div class="d-flex gap-2 flex-column">

                                        {{-- Date --}}
                                        <div class="pointsiconinfo">

                                            <div>
                                                <img src="{{ asset('dist/img/calendar_icon1.svg') }}">
                                            </div>

                                            <div>
                                                {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}

                                                @if ($event->day)
                                                    ({{ $event->day }})
                                                @endif
                                            </div>

                                        </div>

                                        {{-- Time --}}
                                        <div class="pointsiconinfo">

                                            <div>
                                                <img src="{{ asset('dist/img/time_icon.svg') }}">
                                            </div>

                                            <div>
                                                {{ $event->time_code }} -
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}
                                                -
                                                {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}
                                            </div>

                                        </div>

                                    </div>


                                    {{-- Description --}}
                                    <div class="pecardinfoarea topmargin20">
                                        {!! $event->description ?? '' !!}
                                    </div>


                                    {{-- View Event --}}
                                    @if ($event->video_link)
                                        <div class="topmargin20">

                                            <button class="primarybtn btnmd" data-bs-toggle="modal"
                                                data-bs-target="#EventVideos" data-video="{{ $event->video_link }}">

                                                View Event

                                            </button>

                                        </div>
                                    @endif

                                </div>

                            </div>
                        @endforeach

                    </div>

                    @if ($pastEvents->hasPages())
                        <div class="topmargin30">

                            <nav aria-label="Page navigation">

                                {{ $pastEvents->links() }}

                            </nav>

                        </div>
                    @endif

                </div>
            </section>
            <!-- Middle section end here -->
        </div>

    </main>
    <!-- Enquire Now Modal start -->
    <div class="modal fade" id="EnquireNow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enquire Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <option value="">USA (+1)</option>
                                </select>
                            </div>
                            <div class="col-7 padding5px"><input class="form-control form-control-lg"
                                    placeholder="Mobile / Telephone"></div>
                        </div>
                    </div>
                    <div class="">
                        <textarea class="form-control" rows="5">Tell us about your challenges or concerns</textarea>
                    </div>
                    <div class="topmargin20"><button class="secondrybtn btnmdfullwidth">Send</button></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Enquire Now Modal end -->

    <!-- Event Videos Modal start -->
    <div class="modal fade" id="EventVideos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Event Videos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/nlBqht22MOM?si=k-WDv9euCoNe1y-w" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Videos Modal end -->

@endsection
