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
                    @if ($latestWorkshops->isNotEmpty())

                        <div id="upcomingWorkshopCarousel" class="carousel slide topmargin40" data-bs-ride="carousel">

                            {{-- Carousel Slides --}}
                            <div class="carousel-inner">

                                @foreach ($latestWorkshops as $key => $workshop)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                                        <div class="workshopbanner">

                                            {{-- Workshop Icon --}}
                                            <div>
                                                <img src="{{ asset('dist/img/uwicon.svg') }}" alt="Upcoming Workshop">
                                            </div>


                                            {{-- Heading --}}
                                            <div class="text18px primary-color text-uppercase topmargin20">
                                                Upcoming Workshop
                                            </div>


                                            {{-- Workshop Name --}}
                                            <div class="mainheading topmargin5">
                                                <h2 class="mb-3">
                                                    {{ $workshop->name }}
                                                </h2>
                                            </div>


                                            {{-- Description --}}
                                            @if ($workshop->description)
                                                @php
                                                    $description = strip_tags($workshop->description);
                                                    $words = preg_split('/\s+/', trim($description));
                                                    $lines = [];
                                                    $currentLine = '';
                                                    foreach ($words as $word) {
                                                        if (strlen($currentLine . ' ' . $word) > 50) {
                                                            $lines[] = trim($currentLine);
                                                            $currentLine = $word;
                                                        } else {
                                                            $currentLine .= ' ' . $word;
                                                        }
                                                    }
                                                    if ($currentLine) {
                                                        $lines[] = trim($currentLine);
                                                    }
                                                @endphp

                                                <div class="text20px black-color">
                                                    @foreach ($lines as $line)
                                                        {{ $line }}
                                                        @if (!$loop->last)
                                                            <br>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            @endif


                                            {{-- Workshop Information --}}
                                            <div class="pointsiconinfoarea topmargin30">

                                                {{-- Date --}}
                                                @if ($workshop->date)
                                                    <div class="pointsiconinfo">

                                                        <div>
                                                            <img src="{{ asset('dist/img/calendar_icon1.svg') }}"
                                                                alt="Date">
                                                        </div>

                                                        <div>
                                                            {{ date('d M Y', strtotime($workshop->date)) }}
                                                        </div>

                                                    </div>
                                                @endif


                                                {{-- Time --}}
                                                @if ($workshop->start_time && $workshop->end_time)
                                                    <div class="pointsiconinfo">

                                                        <div>
                                                            <img src="{{ asset('dist/img/time_icon.svg') }}" alt="Time">
                                                        </div>

                                                        <div>
                                                            {{ date('g:i A', strtotime($workshop->start_time)) }}
                                                            -
                                                            {{ date('g:i A', strtotime($workshop->end_time)) }}
                                                        </div>

                                                    </div>
                                                @endif


                                                {{-- Location --}}
                                                @if ($workshop->city)
                                                    <div class="pointsiconinfo">

                                                        <div>
                                                            <img src="{{ asset('dist/img/location_icon.svg') }}"
                                                                alt="Location">
                                                        </div>

                                                        <div>
                                                            {{ $workshop->city }}
                                                        </div>

                                                    </div>
                                                @endif

                                            </div>


                                            {{-- Enquire Button --}}
                                            <div class="topmargin30">

                                                <button type="button" class="primarybtn btnmd" data-bs-toggle="modal"
                                                    data-bs-target="#EnquireNow" data-workshop-id="{{ $workshop->id }}"
                                                    data-workshop="{{ $workshop->name }}">
                                                    Enquire Now
                                                </button>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>


                            {{-- Carousel Dots --}}
                            @if ($latestWorkshops->count() > 1)
                                <div class="carousel-indicators">

                                    @foreach ($latestWorkshops as $key => $workshop)
                                        <button type="button" data-bs-target="#upcomingWorkshopCarousel"
                                            data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                                            @if ($key == 0) aria-current="true" @endif
                                            aria-label="Slide {{ $key + 1 }}">
                                        </button>
                                    @endforeach

                                </div>
                            @endif

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
                    <h5 class="modal-title" id="enquireNowLabel">
                        Enquire Now
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('workshop.enquiry.store') }}">
                    @csrf
                    <div class="modal-body">
                        {{-- Hidden Workshop ID --}}
                        <input type="hidden" name="workshop_id" id="workshop_id">
                        {{-- Full Name --}}
                        <div class="mb-3">
                            <input type="text" name="full_name" class="form-control form-control-lg"
                                placeholder="Your Full Name" oninput="this.value = this.value.replace(/[0-9]/g, '')"
                                required>
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control form-control-lg"
                                placeholder="Enter Your Email ID" required>
                        </div>


                        {{-- Phone --}}
                        <div class="mb-3">

                            <div class="row padding5pxarea">
                                {{-- countries --}}
                                <div class="col-5 padding5px">
                                    <select name="country_id" class="form-select form-select-lg" required>
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                data-calling-code="{{ $country->calling_code }}">
                                                {{ $country->name }}
                                                ({{ $country->calling_code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-7 padding5px">
                                    <input type="text" name="mobile" class="form-control form-control-lg"
                                        placeholder="Mobile / Telephone" inputmode="numeric" maxlength="12"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                </div>

                            </div>

                        </div>


                        {{-- Description --}}
                        <div>
                            <textarea name="description" class="form-control" rows="5"
                                placeholder="Tell us about your challenges or concerns"></textarea>
                        </div>


                        {{-- Submit --}}
                        <div class="topmargin20">
                            <button type="submit" class="secondrybtn btnmdfullwidth"> Send</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#EnquireNow').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let workshopId = button.data('workshop-id');
                $('#workshop_id').val(workshopId);

            });
        });
    </script>
@endsection
