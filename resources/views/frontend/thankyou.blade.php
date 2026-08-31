@extends('layouts.frontend')

@section('content')
    <div class="maincontarea">
        <section class="breadcrumbarea">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thank You</li>
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Middle Content Area Start -->
        <section class="middlecontarea">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="thankyoubox">
                            <div class="thankyouboxhead"><img src="{{ asset('dist/img/logo.png') }}"></div>
                            <div class="thankyoucontarea">
                                <h3>Your Path to Clarity is Set</h3>
                                <div class="textblack14">Your consultation request has been successfully submitted.</div>
                                <div class="textblack14 topmargin30">Follow us</div>
                                <div class="d-flex gap-2 justify-content-center topmargin10">
                                    <div><a href="https://www.facebook.com/profile.php?id=100011059427285"
                                            target="_blank"><img src="{{ asset('dist/img/facebook1.svg') }}"></a></div>
                                    <div><a href="https://www.instagram.com/chakrayog.ca/" target="_blank"><img
                                                src="{{ asset('dist/img/instagram1.svg') }}"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Middle Content Area End -->
    </div>
@endsection
