@extends('layouts.frontend')

@section('content')
    <div class="maincontarea">
        <!-- Breadcrumb section start -->
        <section class="breadcrumbarea">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Me</li>
                    </ol>
                </nav>
            </div>
        </section>
        <!-- Breadcrumb section end -->

        <!-- About Me Collage section start -->
        <section class="aboutcollagearea">
            <div class="container">
                <div class="aboutcollage">
                    <div class="aboutcollagetop">
                        <div class="row align-items-end align-items-lg-center">
                            <div class="col-md-6">
                                <div class="aboutcollagecontarea">
                                    <div class="mainheading">
                                        <h2>A Journey of Healing, Energy & Inner Transformation</h2>
                                    </div>
                                    <div class="textblack16">Discover the purpose, philosophy, and personalized approach
                                        behind
                                        guiding individuals toward chakra balance, clarity and lasting well-being.</div>
                                    <div class="d-flex gap-2 topmargin30">
                                        <div><button class="orangebtn btnmd" data-bs-toggle="modal"
                                                data-bs-target="#EmailConsult">Email Consult</button></div>
                                        <div><button class="greenbtn btnmd" data-bs-toggle="modal"
                                                data-bs-target="#VideoConsult">Video Consult</button></div>
                                        <div><a href="{{ route('contact') }}"><button class="purplebtn btnmd">Visit the
                                                    Store</button></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-end"><img src="{{ asset('dist/img/about_collage.png') }}"
                                    class="img-fluid"></div>
                        </div>
                    </div>
                    <div class="aboutcollagebottom">
                        <div class="textwhite14">I am a dedicated Chakra Therapist and energy healing practitioner,
                            committed to
                            helping individuals restore balance in their lives through ancient spiritual sciences. My work
                            is
                            centered around understanding the deep connection between your mind, body, and energy, and
                            guiding
                            you toward a more aligned and harmonious life.</div>
                        <div class="row topmargin30">
                            <div class="col-md-3">
                                <div class="aboutcollagepointers">
                                    <div><i class="fa-solid fa-check"></i></div>
                                    <div>15 Years of <br class="hidetabmob">Research & Testing</div>
                                </div>
                            </div>
                            <div class="col-md-3 rowmargin20">
                                <div class="aboutcollagepointers">
                                    <div><i class="fa-solid fa-check"></i></div>
                                    <div>Experience World <br class="hidetabmob">Fastest Healing Therapy</div>
                                </div>
                            </div>
                            <div class="col-md-3 rowmargin20">
                                <div class="aboutcollagepointers">
                                    <div><i class="fa-solid fa-check"></i></div>
                                    <div>Balance Chakras & <br class="hidetabmob">Awaken your True Self</div>
                                </div>
                            </div>
                            <div class="col-md-3 rowmargin20">
                                <div class="aboutcollagepointers">
                                    <div><i class="fa-solid fa-check"></i></div>
                                    <div>20,000+ Healed & <br class="hidetabmob">Satisfied Clients Globally</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mainheading">
                    <h2>About Me</h2>
                </div>
                <div class="infotxt">As a chakra healer with over 15 years of experience, I support individuals in
                    cultivating
                    holistic balance and inner well‑being. My work is grounded in presence, compassion, and a deep respect
                    for
                    each person’s unique life journey. Through chakra healing, I help clients connect with the body’s subtle
                    energy system to identify and gently release blockages that may appear as emotional stress, mental
                    fatigue,
                    or physical tension. When energy flows freely, the body’s natural capacity to restore harmony and
                    clarity is
                    strengthened.
                    <br><br>My sessions emphasize grounding, emotional balance, and heart‑centered awareness—encouraging
                    alignment between mind, body, and spirit. In a safe and non‑judgmental space, clients are invited to
                    reconnect with themselves, gain insight, and experience a sense of calm and renewal. Healing, to me, is
                    not
                    about fixing; it is about awareness, release, and realignment. I approach each session with integrity,
                    care,
                    and a commitment to supporting transformation that unfolds naturally.
                </div>
                <div class="clientvideoarea">
                    <div class="mainheading text-center">
                        <h4>Transformations Shared by Clients</h4>
                    </div>
                    <div class="infotxt text-center">See how individuals have benefited from personalized chakra
                        consultations
                        with Gopinathan Ponmanadiyil.</div>
                    <div class="row topmargin30">

                        @foreach ($videos as $video)
                            @php
                                preg_match(
                                    '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([^&]+)/',
                                    $video->video_link,
                                    $matches,
                                );
                                $videoId = $matches[1] ?? null;

                                $thumbnail = !empty($video->image_file)
                                    ? asset('public/images/videos/image_file/' . $video->id . '/' . $video->image_file)
                                    : asset('dist/img/no-image.png');
                            @endphp

                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="vidgalleryboxarea">

                                    <a href="#" class="video-trigger" data-bs-toggle="modal"
                                        data-bs-target="#GalleryVideo" data-video="{{ $videoId }}">

                                        <div class="vidgalleryboximg">

                                            <div class="vidgallerybtnarea">
                                                <button class="vidgallerybtn">
                                                    <img src="{{ asset('dist/img/playbtn.png') }}">
                                                </button>
                                            </div>

                                            <div class="vidgallerycontarea">
                                                {{ $video->title }} <br>
                                                <span>{{ $video->profession ?? '' }}</span>
                                            </div>

                                            <img src="{{ $thumbnail }}" class="img-fluid">

                                        </div>
                                    </a>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- About Me Collage section end -->


        <!-- Highlights of the Consultation section start -->
        <section class="highcosularea">
            <div class="container">
                <div class="mainheading text-center">
                    <h2 class="mb-0">Highlights of the Consultation</h2>
                </div>
                <div class="highcosuliconarea">
                    <div class="highcosuliconbox">
                        <div class="highcosulicon"><img src="{{ asset('dist/img/chakra_report.svg') }}"></div>
                        <div class="textblack15med">Chakra Report</div>
                    </div>
                    <div class="highcosuliconbox">
                        <div class="highcosulicon"><img src="{{ asset('dist/img/horoscope_analysis.svg') }}"></div>
                        <div class="textblack15med">Horoscope Analysis</div>
                    </div>
                    <div class="highcosuliconbox">
                        <div class="highcosulicon"><img src="{{ asset('dist/img/rudraksha_icon.svg') }}"></div>
                        <div class="textblack15med">Rudrakshat</div>
                    </div>
                    <div class="highcosuliconbox">
                        <div class="highcosulicon"><img src="{{ asset('dist/img/gemstone_icon.svg') }}"></div>
                        <div class="textblack15med">Gemstone</div>
                    </div>
                    <div class="highcosuliconbox">
                        <div class="highcosulicon"><img src="{{ asset('dist/img/yantra_icon.svg') }}"></div>
                        <div class="textblack15med">Yantra</div>
                    </div>
                    <div class="highcosuliconbox">
                        <div class="highcosulicon"><img src="{{ asset('dist/img/mantras_daily.svg') }}"></div>
                        <div class="textblack15med">Mantras & Daily Affirmations</div>
                    </div>
                    <div class="highcosuliconbox">
                        <div class="highcosulicon"><img src="{{ asset('dist/img/meditation_techniques.svg') }}"></div>
                        <div class="textblack15med">Meditation Techniques</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Highlights of the Consultation section end -->

        <!-- Precise diagnosis & Video section start -->
        <section class="precisediagnosisarea">
            <div class="container">
                <div class="mainheading text-center">
                    <h2>Precise diagnosis. Sacred remedies. Proven peace.</h2>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="chakrasinfluencebg">
                            <div class="chakrasinfluencebg1">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="mainheading">
                                            <h2>Your chakras influence every area of your life...</h2>
                                        </div>
                                        <div class="textblack15">From confidence and clarity to love, health and success,
                                            your
                                            energy centers shape how you think, feel and act.When aligned, life flows
                                            effortlessly.</div>
                                    </div>
                                </div>
                                <div class="chakrasinfluencelabel">
                                    <div>Restore Balance.</div>
                                    <div>Harmonize Feelings.</div>
                                    <div>Secure Focus.</div>
                                    <div>Realign Your Life.</div>
                                </div>
                                {{-- <div><a href="{{ route('blogs') }}"><button class="primarybtn btnmd">Choose Your Starting
                                            Point</button></a></div> --}}
                                <button class="primarybtn btnmd" data-bs-toggle="modal"
                                    data-bs-target="#AboutConsult">Choose Your Starting Point</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 rowmargintabmob20">
                        <div class="chakrasinfobox">
                            <div class="row nopaddingarea align-items-center">
                                <div class="col-md-6 nopadding">
                                    <div class="chakrasinfoboximg"><img src="{{ asset('dist/img/chakrasinfoimg.jpg') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 nopadding">
                                    <div class="chakrasinfotext">“Chakras are not mystical ideas, they are energetic
                                        centers
                                        that influence yourt houghts, emotions, decisions and destiny”</div>
                                </div>
                            </div>
                        </div>
                        <div class="chakrasessionbox">
                            <div>
                                <h3>One session to uncover the root. A lifetime to feel the flow.</h3>
                            </div>
                            {{-- <div><a href="{{ route('contact') }}"><button class="primarybtn btnmd">Discover
                                        You</button></a></div> --}}
                            <div><button class="primarybtn btnmd" data-bs-toggle="modal"
                                    data-bs-target="#AboutConsult">Discover You</button></div>
                        </div>
                        @include('partials.frontend.aboutusNewForm')
                    </div>
                </div>
            </div>
        </section>
        <!-- Precise diagnosis & Video section end -->
    </div>

    <!-- Gallery Video Modal start -->
    <div class="modal fade" id="GalleryVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gallery Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/xN1MVlExLjo?si=X2KvXgGY-xgw5upI" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Video Modal end -->
@endsection
