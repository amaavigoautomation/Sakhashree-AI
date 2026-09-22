@extends('layouts.frontend')

@section('content')
    <main class="mainwrapper">
        <div class="innercontbg">
            <section class="innermidcontarea">
                <div class="container">

                    {{-- Breadcrumb --}}
                    <div class="breadcrumbarea">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Workshops</li>
                            </ol>
                        </nav>
                    </div>

                    {{-- Page Heading --}}
                    <div class="mainheading topmargin5">
                        <h1 class="text-uppercase">
                            <span class="second-color">Learn. Experience.</span>
                            <br>
                            Transform
                        </h1>
                    </div>

                    {{-- Introduction --}}
                    <div class="innercolinfotext">
                        Our workshops blend ancient wisdom with practical tools to
                        <br class="hidemob">
                        help you heal, grow and live a more conscious life.
                    </div>

                    {{-- Upcoming Workshop --}}
                    @if ($latestWorkshop)
                        <div class="workshopbanner topmargin40">

                            <div>
                                <img src="{{ asset('dist/img/uwicon.svg') }}" alt="Upcoming Workshop">
                            </div>

                            <div class="text18px primary-color text-uppercase topmargin20">
                                Upcoming Workshop
                            </div>

                            <div class="mainheading topmargin5">
                                <h2 class="mb-3">{{ $latestWorkshop->name }}</h2>
                            </div>

                            @if ($latestWorkshop->description)
                                @php
                                    $description = $latestWorkshop->description;
                                    $parts = preg_split('/\s+(and)\s+/i', $description, 2);
                                @endphp

                                <div class="text20px black-color">
                                    {{ $parts[0] }}

                                    @if (isset($parts[1]))
                                        <br>
                                        {{ $parts[1] }}
                                    @endif
                                </div>
                            @endif

                            <div class="pointsiconinfoarea topmargin30">

                                @if ($latestWorkshop->date)
                                    <div class="pointsiconinfo">
                                        <div>
                                            <img src="{{ asset('dist/img/calendar_icon1.svg') }}" alt="Date">
                                        </div>

                                        <div>
                                            {{ date('d M Y', strtotime($latestWorkshop->date)) }}
                                        </div>
                                    </div>
                                @endif

                                @if ($latestWorkshop->start_time && $latestWorkshop->end_time)
                                    <div class="pointsiconinfo">
                                        <div>
                                            <img src="{{ asset('dist/img/time_icon.svg') }}" alt="Time">
                                        </div>
                                        <div>
                                            {{ date('g:i A', strtotime($latestWorkshop->start_time)) }}
                                            -
                                            {{ date('g:i A', strtotime($latestWorkshop->end_time)) }}
                                        </div>
                                    </div>
                                @endif

                                @if ($latestWorkshop->city)
                                    <div class="pointsiconinfo">
                                        <div><img src="{{ asset('dist/img/location_icon.svg') }}" alt="Location"></div>
                                        <div>{{ $latestWorkshop->city }}</div>
                                    </div>
                                @endif

                            </div>

                            <div class="topmargin30">
                                <button type="button" class="primarybtn btnmd" data-bs-toggle="modal"
                                    data-bs-target="#EnquireNow" data-workshop="{{ $latestWorkshop->name }}">
                                    Enquire Now
                                </button>
                            </div>

                        </div>
                    @endif

                    {{-- Why Join (static) --}}
                    <div class="innerheadarea topmargin40">
                        <div class="innerheadcont">
                            <div class="ornament" aria-hidden="true">
                                <img src="{{ asset('dist/img/sidebarhead1.svg') }}" alt="">
                            </div>
                            <div class="mainheading text-center">
                                <h2 class="mb-0">Why Join Our Workshops</h2>
                            </div>
                            <div class="ornament" aria-hidden="true">
                                <img src="{{ asset('dist/img/sidebarhead.svg') }}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="wjowarea topmargin40">
                        @foreach ([['ancient_wisdom', 'Ancient Wisdom', 'Rooted in timeless spiritual knowledge and traditions.'], ['practical_experience', 'Practical Experience', 'Interactive practices and real life applications.'], ['inner_transformation', 'Inner Transformation', 'Shift your energy, heal deep within and grow.'], ['supportive_community', 'Supportive Community', 'Connect with like minded souls on a similar journey.']] as [$icon, $title, $text])
                            <div class="wjowbox">
                                <div class="wjowboxicon">
                                    <img src="{{ asset('dist/img/' . $icon . '.svg') }}" alt="{{ $title }}">
                                </div>
                                <h4>{{ $title }}</h4>
                                <div>{{ $text }}</div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Past Workshops --}}
                    @if ($pastWorkshops->isNotEmpty())
                        <div class="innerheadarea topmargin60">
                            <div class="innerheadcont">
                                <div class="ornament" aria-hidden="true">
                                    <img src="{{ asset('dist/img/sidebarhead1.svg') }}" alt="">
                                </div>
                                <div class="mainheading text-center">
                                    <h2 class="mb-0">Past Workshops</h2>
                                </div>
                                <div class="ornament" aria-hidden="true">
                                    <img src="{{ asset('dist/img/sidebarhead.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="pwcardarea topmargin30">
                            @foreach ($pastWorkshops as $workshop)
                                <div class="pwcard">
                                    @if ($workshop->image_file)
                                        <div class="pwcardimg">
                                            <img src="{{ asset('public/images/workshops/image_file/' . $workshop->id . '/' . $workshop->image_file) }}"
                                                alt="{{ $workshop->name }}">
                                        </div>
                                    @endif
                                    <div class="pwcardcont">
                                        <h6>{{ $workshop->name }}</h6>
                                        @if ($workshop->description)
                                            <div>{!! $workshop->description !!}</div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </section>
        </div>
    </main>

    {{-- Enquire Now Modal --}}
    <div class="modal fade" id="EnquireNow" tabindex="-1" aria-labelledby="enquireNowLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enquireNowLabel">Enquire Now</h5>
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
                            <div class="col-7 padding5px">
                                <input class="form-control form-control-lg" placeholder="Mobile / Telephone">
                            </div>
                        </div>
                    </div>
                    <div>
                        <textarea class="form-control" rows="5" placeholder="Tell us about your challenges or concerns"></textarea>
                    </div>
                    <div class="topmargin20">
                        <button class="secondrybtn btnmdfullwidth">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
