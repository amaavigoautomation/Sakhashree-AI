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

                    <li class="breadcrumb-item active"
                        aria-current="page">
                        Workshops
                    </li>

                </ol>

            </nav>

        </div>


        {{-- Page Heading --}}
        <div class="mainheading topmargin5">

            <h1 class="text-uppercase">

                <span class="second-color">
                    Learn. Experience.
                </span>

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
        <div class="workshopbanner topmargin40">

            <div>
                <img src="{{ asset('dist/img/uwicon.svg') }}"
                     alt="Upcoming Workshop">
            </div>


            <div class="text18px primary-color text-uppercase topmargin20">
                Upcoming Workshop
            </div>


            <div class="mainheading topmargin5">

                <h2 class="mb-3">
                    Chakra Healing Workshop
                </h2>

            </div>


            <div class="text20px black-color">

                Understand your chakras, clear blockages and

                <br class="hidemob">

                balance your energy for a harmonious life.

            </div>


            <div class="pointsiconinfoarea topmargin30">


                <div class="pointsiconinfo">

                    <div>
                        <img src="{{ asset('dist/img/calendar_icon1.svg') }}"
                             alt="Date">
                    </div>

                    <div>
                        12 Aug 2026
                    </div>

                </div>


                <div class="pointsiconinfo">

                    <div>
                        <img src="{{ asset('dist/img/time_icon.svg') }}"
                             alt="Time">
                    </div>

                    <div>
                        10:00 AM - 5:00 PM
                    </div>

                </div>


                <div class="pointsiconinfo">

                    <div>
                        <img src="{{ asset('dist/img/location_icon.svg') }}"
                             alt="Location">
                    </div>

                    <div>
                        Mumbai
                    </div>

                </div>

            </div>


            <div class="topmargin30">

                <button type="button"
                        class="primarybtn btnmd"
                        data-bs-toggle="modal"
                        data-bs-target="#EnquireNow">

                    Enquire Now

                </button>

            </div>

        </div>


        {{-- Why Join --}}
        <div class="innerheadarea topmargin40">

            <div class="innerheadcont">

                <div class="ornament"
                     aria-hidden="true">

                    <img src="{{ asset('dist/img/sidebarhead1.svg') }}"
                         alt="">

                </div>


                <div class="mainheading text-center">

                    <h2 class="mb-0">
                        Why Join Our Workshops
                    </h2>

                </div>


                <div class="ornament"
                     aria-hidden="true">

                    <img src="{{ asset('dist/img/sidebarhead.svg') }}"
                         alt="">

                </div>

            </div>

        </div>


        <div class="wjowarea topmargin40">


            <div class="wjowbox">

                <div class="wjowboxicon">

                    <img src="{{ asset('dist/img/ancient_wisdom.svg') }}"
                         alt="Ancient Wisdom">

                </div>

                <h4>
                    Ancient Wisdom
                </h4>

                <div>
                    Rooted in timeless spiritual knowledge and traditions.
                </div>

            </div>


            <div class="wjowbox">

                <div class="wjowboxicon">

                    <img src="{{ asset('dist/img/practical_experience.svg') }}"
                         alt="Practical Experience">

                </div>

                <h4>
                    Practical Experience
                </h4>

                <div>
                    Interactive practices and real life applications.
                </div>

            </div>


            <div class="wjowbox">

                <div class="wjowboxicon">

                    <img src="{{ asset('dist/img/inner_transformation.svg') }}"
                         alt="Inner Transformation">

                </div>

                <h4>
                    Inner Transformation
                </h4>

                <div>
                    Shift your energy, heal deep within and grow.
                </div>

            </div>


            <div class="wjowbox">

                <div class="wjowboxicon">

                    <img src="{{ asset('dist/img/supportive_community.svg') }}"
                         alt="Supportive Community">

                </div>

                <h4>
                    Supportive Community
                </h4>

                <div>
                    Connect with like minded souls on a similar journey.
                </div>

            </div>


        </div>


        {{-- Past Workshops --}}
        <div class="innerheadarea topmargin60">

            <div class="innerheadcont">

                <div class="ornament"
                     aria-hidden="true">

                    <img src="{{ asset('dist/img/sidebarhead1.svg') }}"
                         alt="">

                </div>


                <div class="mainheading text-center">

                    <h2 class="mb-0">
                        Past Workshops
                    </h2>

                </div>


                <div class="ornament"
                     aria-hidden="true">

                    <img src="{{ asset('dist/img/sidebarhead.svg') }}"
                         alt="">

                </div>

            </div>

        </div>


        <div class="pwcardarea topmargin30">


            {{-- Card 1 --}}
            <div class="pwcard">

                <div class="pwcardimg">

                    <img src="{{ asset('dist/img/pasworkshops_img01.jpg') }}"
                         alt="Chakra Meditation">

                </div>

                <div class="pwcardcont">

                    <h6>
                        Chakra Meditation & Inner Transformation
                    </h6>

                    <div>
                        Experience powerful guided meditations designed
                        to release emotional blocks, quiet the mind,
                        and awaken inner awareness. This workshop
                        combines Chakra Yog principles with practical
                        mindfulness techniques to help you cultivate
                        clarity, peace, and lasting personal growth.
                    </div>

                </div>

            </div>


            {{-- Card 2 --}}
            <div class="pwcard">

                <div class="pwcardimg">

                    <img src="{{ asset('dist/img/pasworkshops_img02.jpg') }}"
                         alt="Rudraksha Wisdom Workshop">

                </div>

                <div class="pwcardcont">

                    <h6>
                        Rudraksha Wisdom Workshop
                    </h6>

                    <div>
                        Understand the ancient science of Rudraksha
                        and how it supports chakra healing and personal
                        transformation. Learn how to identify authentic
                        Rudraksha beads, choose combinations based on
                        your energy, and integrate them into your
                        spiritual practice for everyday empowerment.
                    </div>

                </div>

            </div>


            {{-- Card 3 --}}
            <div class="pwcard">

                <div class="pwcardimg">

                    <img src="{{ asset('dist/img/pasworkshops_img03.jpg') }}"
                         alt="Chakra Healing Workshop">

                </div>

                <div class="pwcardcont">

                    <h6>
                        Chakra Healing Workshop
                    </h6>

                    <div>
                        Discover how the seven chakras influence your
                        health, emotions, relationships, career, and
                        overall well-being. Through guided meditation,
                        chakra awareness, and practical healing
                        techniques, learn how to identify energy
                        blockages and restore inner balance for a more
                        empowered life.
                    </div>

                </div>

            </div>


            {{-- Card 4 --}}
            <div class="pwcard">

                <div class="pwcardimg">

                    <img src="{{ asset('dist/img/pasworkshops_img01.jpg') }}"
                         alt="Chakra Meditation">

                </div>

                <div class="pwcardcont">

                    <h6>
                        Chakra Meditation & Inner Transformation
                    </h6>

                    <div>
                        Experience powerful guided meditations designed
                        to release emotional blocks, quiet the mind,
                        and awaken inner awareness. This workshop combines
                        Chakra Yog principles with practical mindfulness
                        techniques to help you cultivate clarity,
                        peace, and lasting personal growth.
                    </div>

                </div>

            </div>


            {{-- Card 5 --}}
            <div class="pwcard">

                <div class="pwcardimg">

                    <img src="{{ asset('dist/img/pasworkshops_img02.jpg') }}"
                         alt="Rudraksha Wisdom Workshop">

                </div>

                <div class="pwcardcont">

                    <h6>
                        Rudraksha Wisdom Workshop
                    </h6>

                    <div>
                        Understand the ancient science of Rudraksha
                        and how it supports chakra healing and personal
                        transformation. Learn how to identify authentic
                        Rudraksha beads, choose combinations based on
                        your energy, and integrate them into your
                        spiritual practice for everyday empowerment.
                    </div>

                </div>

            </div>


            {{-- Card 6 --}}
            <div class="pwcard">

                <div class="pwcardimg">

                    <img src="{{ asset('dist/img/pasworkshops_img03.jpg') }}"
                         alt="Chakra Healing Workshop">

                </div>

                <div class="pwcardcont">

                    <h6>
                        Chakra Healing Workshop
                    </h6>

                    <div>
                        Discover how the seven chakras influence your
                        health, emotions, relationships, career, and
                        overall well-being. Through guided meditation,
                        chakra awareness, and practical healing
                        techniques, learn how to identify energy
                        blockages and restore inner balance for a more
                        empowered life.
                    </div>

                </div>

            </div>


        </div>

    </div>

</section>
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
						<div class="col-7 padding5px"><input class="form-control form-control-lg" placeholder="Mobile / Telephone"></div>
					</div>
        </div>
        <div class=""><textarea class="form-control" rows="5">Tell us about your challenges or concerns</textarea></div>
        <div class="topmargin20"><button class="secondrybtn btnmdfullwidth">Send</button></div>
      </div>
    </div>
  </div>
</div>
<!-- Enquire Now Modal end -->
@endsection
