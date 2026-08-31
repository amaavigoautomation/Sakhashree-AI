@extends('layouts.visitingcard')

@section('content')
    <div class="mainbg">
        <!-- Header area start -->
        <header class="headerarea">
            <div class="headercontarea">
                <div class="logo"><img src="{{ asset('dist/visitingcardimg/logo.png') }}"></div>
                <div class="socialbtnarea">
                    <div class="socialicon"><a
                            href="https://wa.me/?text=Check%20out%20my%20digital%20business%20card:%20https://gopinathan.ca/evisitingcard"
                            target="_blank"><img src="{{ asset('dist/visitingcardimg/share.png') }}"></a></div>
                    <div class="socialicon"><a href="https://www.facebook.com/profile.php?id=100011059427285"
                            target="_blank"><img src="{{ asset('dist/visitingcardimg/facebook.png') }}"></a></div>
                    <div class="socialicon"><a href="https://www.instagram.com/chakrayog.ca/" target="_blank"><img
                                src="{{ asset('dist/visitingcardimg/instagram.png') }}"></a></div>
                </div>
            </div>
            <div class="logoline"></div>
            <div class="headertext">An Official Partner of <span>Rudra Center</span></div>
        </header>
        <!-- Header area end -->

        <!-- Middle content area start -->
        <section class="midcontsection">
            <div class="midcontarea">
                <div class="midicontextarea">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#EmailConsult">
                        <div class="midicontext">
                            <div class="midiconcircle emailconsicon"><img
                                    src="{{ asset('dist/visitingcardimg/emailcons_icon.png') }}"></div>
                            <div>Email Consult</div>
                        </div>
                    </a>
                </div>
                <div class="midicontextarea">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#VideoConsult">
                        <div class="midicontext">
                            <div class="midiconcircle videoconsicon"><img
                                    src="{{ asset('dist/visitingcardimg/videocons_icon.png') }}"></div>
                            <div>Video Consult</div>
                        </div>
                    </a>
                </div>
                <div class="midicontextarea">
                    <a href="https://gopinathan.ca/contact-us" target="_blank">
                        <div class="midicontext">
                            <div class="midiconcircle visitstoreicon"><img
                                    src="{{ asset('dist/visitingcardimg/visitstore_icon.png') }}"></div>
                            <div>Visit Store</div>
                        </div>
                    </a>
                </div>
                <div class="midicontextarea">
                    <a href="https://api.whatsapp.com/send?phone=+16473000249&text=Hi,%20I%20came%20across%20your%20website%20and%20I%20want%20to%20know%20more%20about%20chakra%20healing%20with%20rudraksha%20and%20gemstone."
                        target="_blank">
                        <div class="midicontext">
                            <div class="midiconcircle whatsappicon"><img
                                    src="{{ asset('dist/visitingcardimg/whatsapp_icon.png') }}"></div>
                            <div>Whatsapp</div>
                        </div>
                    </a>
                </div>
                <div class="midicontextarea">
                    <a href="tel:+16473000249">
                        <div class="midicontext">
                            <div class="midiconcircle callicon"><img
                                    src="{{ asset('dist/visitingcardimg/call_icon.png') }}"></div>
                            <div>Call</div>
                        </div>
                    </a>
                </div>
                <div class="midicontextarea">
                    <a href="mailto:gopinathan@chakrayog.ca">
                        <div class="midicontext">
                            <div class="midiconcircle emailicon"><img
                                    src="{{ asset('dist/visitingcardimg/email_icon.png') }}"></div>
                            <div>Email</div>
                        </div>
                    </a>
                </div>
                <div class="midicontextarea">
                    <a href="https://gopinathan.ca/" target="_blank">
                        <div class="midicontext">
                            <div class="midiconcircle websiteicon"><img
                                    src="{{ asset('dist/visitingcardimg/website_icon.png') }}"></div>
                            <div>Website</div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- <div class="addcontbtnarea">
                <a class="addcontbtn" href="{{ asset('public/gopinathan.vcf') }}" download>
                <a class="addcontbtn" href="/gopinathan.vcf" download>
                    <div class="addconttext">Add to Contact</div>
                    <div class="pluscircle"><img src="{{ asset('dist/visitingcardimg/plus.png') }}"></div>
                </a>
            </div> --}}
            <div class="addcontbtnarea">
                <a class="addcontbtn" href="/gopinathan.vcf" download>
                    <div class="addconttext">Add to Contact</div>
                    <div class="addconticon"><img src="{{ asset('dist/visitingcardimg/save_contact.png') }}"></div>
                </a>
            </div>
            <div class="aboutlogoarea">
                <div class="aboutlogo"><img src="{{ asset('dist/visitingcardimg/aboutlogo.png') }}"></div>
                <div class="aboutustext">An Official Partner of <span>Rudra Center</span></div>
            </div>
        </section>
        <!-- Middle content area end -->

    </div>
    <!-- Email Consultation Modal start -->
    @include('partials.frontend.emailConsultant')
    <!-- Email Consultation Modal end -->

    <!-- Video Consultation Modal start -->
    @include('partials.frontend.videoConsultant')
    <!-- Video Consultation Modal end -->
    <style>
        .midicontextarea a:hover {
            color: inherit;
        }
    </style>
@endsection
