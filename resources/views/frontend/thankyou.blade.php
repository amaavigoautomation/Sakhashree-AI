@extends('layouts.frontend')

@section('content') <main class="mainwrapper">

```
    <div class="innercontbg">

        <!-- Middle section start here -->
        <section class="innermidcontarea">
            <div class="container">

                <!-- Breadcrumb start here -->
                <div class="breadcrumbarea">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Thank You
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb end here -->


                <!-- Heading start here -->
                <div class="mainheading topmargin5">
                    <h1 class="text-uppercase">
                        <span class="second-color">Thank You</span><br>
                        Your Journey Begins
                    </h1>
                </div>

                <div class="innercolinfotext">
                    Your consultation request has been successfully submitted.
                    <br class="hidemob">
                    We appreciate you reaching out to us and will get in touch with you soon.
                </div>
                <!-- Heading end here -->


                <!-- Thank You Box start here -->
                <div class="row justify-content-center topmargin40">
                    <div class="col-lg-8 col-md-10">

                        <div class="thankyoubox">

                            <!-- Logo -->
                            <div class="thankyouboxhead">
                                <img src="{{ asset('dist/img/logo.png') }}" alt="Logo">
                            </div>

                            <!-- Content -->
                            <div class="thankyoucontarea">

                                <h3>Your Path to Clarity is Set</h3>

                                <div class="textblack14">
                                    Your consultation request has been successfully submitted.
                                </div>

                                <div class="textblack14 topmargin20">
                                    Thank you for connecting with us. Our team will review your request
                                    and get in touch with you soon.
                                </div>


                                <!-- Follow Us -->
                                <div class="textblack14 topmargin30">
                                    Follow us
                                </div>

                                <div class="d-flex gap-2 justify-content-center topmargin10">

                                    <!-- Facebook -->
                                    <div>
                                        <a href="https://www.facebook.com/profile.php?id=100011059427285"
                                            target="_blank"
                                            rel="noopener noreferrer">
                                            <img src="{{ asset('dist/img/facebook1.svg') }}"
                                                alt="Facebook">
                                        </a>
                                    </div>

                                    <!-- Instagram -->
                                    <div>
                                        <a href="https://www.instagram.com/chakrayog.ca/"
                                            target="_blank"
                                            rel="noopener noreferrer">
                                            <img src="{{ asset('dist/img/instagram1.svg') }}"
                                                alt="Instagram">
                                        </a>
                                    </div>

                                </div>


                                <!-- Back to Home -->
                                <div class="topmargin30">
                                    <a href="{{ route('home') }}"
                                        class="primarybtn btnmdfullwidth">
                                        Back to Home
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <!-- Thank You Box end here -->

            </div>
        </section>
        <!-- Middle section end here -->

    </div>

</main>
```

@endsection
