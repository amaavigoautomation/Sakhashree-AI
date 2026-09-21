@extends('layouts.frontend')

@section('content')

    <div class="maincontarea">
        <!-- Breadcrumb section start -->
        <section class="breadcrumbarea">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </nav>
            </div>
        </section>
        <!-- Breadcrumb section end -->

        <!-- Middle section start -->
        <section class="middlecontarea">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="mainheading">
                                    <h2>Rudraksha Ratna Canada Inc.</h2>
                                </div>
                                <div class="textblack14"><span class="textblack14bold">Address:</span> Suite 137 - 425
                                    Britannia Road East, Mississauga, Ontario, L4Z 3E7, Canada.</div>
                                <div class="textblack14 topmargin10"><span class="textblack14bold">Email:</span> <a
                                        href="mailto:gopinathan@chakrayog.ca">gopinathan@chakrayog.ca</a></div>
                                <div class="textblack14 topmargin10"><span class="textblack14bold">Phone:</span> +1 647 300
                                    0249, +1 647 530 1600</div>
                                <div class="textblack14 topmargin10"><span class="textblack14bold">Toll Free:</span> 1 844
                                    842 5028</div>
                                <div class="topmargin20">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2887.678849554469!2d-79.670064023969!3d43.634042753669874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b3f5c73155555%3A0xc7a6d55630a7fca!2sRudraksha%20Ratna%2C%20425%20Britannia%20Rd%20E%20%23137%2C%20Mississauga%2C%20ON%20L4Z%203E6%2C%20Canada!5e0!3m2!1sen!2sin!4v1775048999338!5m2!1sen!2sin"
                                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 rowmargintabmob20">
                        <div class="storesliderimg"><img src="{{ asset('dist/img/store_img01.jpg') }}"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Middle section end -->
    </div>
@endsection
