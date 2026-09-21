@extends('layouts.frontend')

@section('content')
    <div class="innercontbg1">
        <!-- Inner collage section start -->
        <section class="consultation-collage">
            <div class="innercollagecont">
                <div class="container">
                    <!--Breadcrumb start here-->
                    <div class="breadcrumbarea">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Chakra Consultation</li>
                            </ol>
                        </nav>
                    </div>
                    <!--Breadcrumb end here-->

                    <div class="mainheading topmargin5">
                        <h1 class="text-uppercase"><span class="second-color">Book Your</span><br>Consultation</h1>
                    </div>
                    <div class="innercoltagline">Personalized Guidance. Deeper Healing. <br class="hidemob">Lasting
                        Transformation.</div>
                    <div class="innercolinfotext topmargin20">Every individual is unique. Your energy, challenges and life
                        path are unique. <br class="hidemob">Book a one-on-one consultation with Sakhashree Neeta and
                        receive divine <br class="hidemob">guidance that is customized for you. </div>
                    <div class="topmargin30"><button class="secondrybtn btnlg" id="myButton">Book Chakra
                            Consultation</button></div>
                </div>
                <div class="innercolmobpadd"></div>
            </div>
        </section>
        <!-- Inner collage section end -->

        <!-- Middle section start here -->
        <section class="innermidcontarea1">
            <div class="container">
                <div class="whatccbox">
                    <div class="mb-1"><img src="{{ asset('dist/img/whatcc_icon.svg') }}"></div>
                    <div class="mainheading">
                        <h2 class="mb-2">What is Chakra Consultation</h2>
                    </div>
                    <div>Chakra consultation is a personalized session where we analyze the energy flow in your chakras to
                        identify blockages, imbalances and areas of strength. You receive practical guidance, energy
                        remedies and spiritual insights to help you realign and elevate your life.</div>
                </div>

                <div class="innerheadarea topmargin50">
                    <div class="innerheadcont">
                        <div class="ornament" aria-hidden="true"><img src="{{ asset('dist/img/sidebarhead1.svg') }}"></div>
                        <div class="mainheading text-center">
                            <h2 class="mb-0">Choose Your Consultation</h2>
                        </div>
                        <div class="ornament" aria-hidden="true"><img src="{{ asset('dist/img/sidebarhead.svg') }}"></div>
                    </div>
                </div>
                <div class="chooseconsultarea topmargin30" id="target">
                    <div class="chooseconsultbox">
                        <div class="chooseconsulticon"><img src="{{ asset('dist/img/video_consultation.svg') }}"></div>
                        <h4>Video Consultation</h4>
                        <div>Face to face session with Sakhashree Neeta from the comfort of your space.</div>
                        <div class="topmargin30"><button class="secondrybtnol btnmd">Book Video Session</button></div>
                    </div>
                    <div class="chooseconsultbox">
                        <div class="chooseconsulticon"><img src="{{ asset('dist/img/email_consultation.svg') }}"></div>
                        <h4>Email Consultation</h4>
                        <div>Share your details and receive detailed guidance and recommendations via email.</div>
                        <div class="topmargin30"><button class="secondrybtnol btnmd">Book Email Consultation</button></div>
                    </div>
                    <div class="chooseconsultbox">
                        <div class="chooseconsulticon"><img src="{{ asset('dist/img/cleansing_meditation.svg') }}"></div>
                        <h4>Chakra Cleansing Meditation</h4>
                        <div>Guided meditation session to cleanse, balance and align your chakras.</div>
                        <div class="topmargin30"><button class="secondrybtnol btnmd">Book Meditation Session</button></div>
                    </div>
                </div>

                <div class="innerheadarea topmargin50">
                    <div class="innerheadcont">
                        <div class="ornament" aria-hidden="true"><img src="{{ asset('dist/img/sidebarhead1.svg') }}"></div>
                        <div class="mainheading text-center">
                            <h2 class="mb-0">Your Consultation Journey</h2>
                        </div>
                        <div class="ornament" aria-hidden="true"><img src="{{ asset('dist/img/sidebarhead.svg') }}"></div>
                    </div>
                </div>
                <div class="consultjourarea topmargin30">
                    <div class="consultjourbox">
                        <div class="consultjouricon consultjouricon-purple"><img src="{{ asset('dist/img/book_your_slot.svg') }}"></div>
                        <h6>Book Your Slot</h6>
                        <div>Choose your preferred consultation type and convenient time.</div>
                    </div>
                    <div class="consultjourbox">
                        <div class="consultjouricon consultjouricon-brown"><img src="{{ asset('dist/img/share_your_details.svg') }}"></div>
                        <h6>Share Your Details</h6>
                        <div>Fill in a simple form to help us understand your concern and goals.</div>
                    </div>
                    <div class="consultjourbox">
                        <div class="consultjouricon consultjouricon-purple"><img src="{{ asset('dist/img/your_session.svg') }}"></div>
                        <h6>Your Session</h6>
                        <div>Connect with Sakhashree Neeta and receive personalized guidance.</div>
                    </div>
                    <div class="consultjourbox">
                        <div class="consultjouricon consultjouricon-brown"><img src="{{ asset('dist/img/clear_action_plan.svg') }}"></div>
                        <h6>Clear Action Plan</h6>
                        <div>Get practical guidance, recommendation and healing practices.</div>
                    </div>
                    <div class="consultjourbox">
                        <div class="consultjouricon consultjouricon-purple"><img src="{{ asset('dist/img/transform_your_life.svg') }}"></div>
                        <h6>Transform Your Life</h6>
                        <div>Align your energy and take inspired steps towards a balanced and joyful life.</div>
                    </div>
                </div>

                <div class="row align-items-center topmargin60">
                    <div class="col-lg-4">
                        <div class="mainheading">
                            <h2>Who is for?</h2>
                        </div>
                        <div class="checkicontext">
                            <ul>
                                <li>Feeling emotionally stuck or unbalanced</li>
                                <li>Facing repeated challenges in life</li>
                                <li>Seeking clarity, peace and direction</li>
                                <li>On a spiritual growth journey</li>
                                <li>Wanting to improve relationships and well-being</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 rowmargintabmob20">
                        <div class="consultbtmbanner">
                            <h3>Realign Your Energy.<br>Reclaim Your Life.</h3>
                            <div>Your journey to inner balance<br>begins with one step.</div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Middle section end here -->
    </div>
@endsection

@push('scripts')
    <script>
    document.getElementById("myButton").addEventListener("click", function () {

      const target = document.getElementById("target");

      // Space required from the top of the screen
      const topMargin = 220;

      // Calculate target position
      const targetPosition =
        target.getBoundingClientRect().top +
        window.pageYOffset -
        topMargin;

      // Smoothly scroll to target
      window.scrollTo({
        top: targetPosition,
        behavior: "smooth"
      });

    });
  </script>
@endpush
