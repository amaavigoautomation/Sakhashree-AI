<footer class="footer">
    <div class="footerpurplearea">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="footertagline">
                        <div><img src="{{ asset('dist/img/footer_tagline_icon.png') }}" alt="Footer Icon"></div>
                        <div>
                            <h3>Awaken. Align. Transform.</h3>
                            <div>Let’s awaken the divine within you.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 rowmargintabmob20">
                    <div class="row padding5pxarea">
                        <div class="col-md-5 col-12 padding5px"><a href="{{ route('consultations') }}"><button
                                    class="primarybtn btnlgfullwidth">Book Chakra Consultation</button></a></div>
                        <div class="col-md-3 col-5 padding5px rowmargin10"><a
                                href="{{ route('spiritual_tours') }}"><button class="whitebtnol btnlgfullwidth">Join
                                    Retreats</button></a></div>
                        <div class="col-md-4 col-7 padding5px rowmargin10"><a href="{{ route('workshop') }}"><button
                                    class="whitebtnol btnlgfullwidth">Attend Workshops</button></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footercontarea">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="row">
                        <div class="col-lg-10">
                            <h4>Sakhashree Neeta</h4>
                            <div class="footer-chakratext topmargin5">Global Chakra Healer</div>
                            <div class="footerdesc topmargin20">Transforming lives through the power of chakras,
                                Rudraksha and spiritual wisdom.</div>
                            <div class="socilaicons topmargin30">
                                <ul>
                                    <li><a href="https://www.facebook.com/SakhashreeNeeta" target="_blank"><i
                                                class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/sakhashree/" target="_blank"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="https://www.youtube.com/rudracentre" target="_blank"><i
                                                class="fa-brands fa-youtube"></i></a></li>
                                    <li><a href="https://twitter.com/SakhashreeNeeta" target="_blank"><i
                                                class="fa-brands fa-x-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-7 rowmargintabmob30">
                    <div class="row">
                        <div class="col-6">
                            <h4>Quick Links</h4>
                            <div class="footertext topmargin20">
                                <ul>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('rrct') }}">RRCT®</a></li>
                                    <li><a href="{{ route('spiritual_tours') }}">Spiritual Tours</a></li>
                                    <li><a href="{{ route('workshop') }}">Workshops</a></li>
                                    <li><a href="{{ route('events') }}">Events</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <h4>Resources</h4>
                            <div class="footertext topmargin20">
                                <ul>
                                    <li><a href="{{ route('blogs') }}">Blogs</a></li>
                                    <li><a href="{{ route('videos_list') }}">Videos</a></li>
                                    <li><a href="{{ route('faq_list') }}">FAQ’s</a></li>
                                    <li><a href="{{ route('testimonials_list') }}">Testimonials</a></li>
                                    <li><a href="news.html">News</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 rowmargintabmob30">
                    <h4>Connect</h4>
                    <div class="d-flex gap-2 align-items-center mb-2 topmargin20">
                        <div><img src="dist/img/phone_icon.svg"></div>
                        <div class="footertext"><a href="tel:+919876543210">+91 98 7654 3210</a></div>
                    </div>
                    <div class="d-flex gap-2 align-items-center mb-2">
                        <div><img src="dist/img/email_icon.svg"></div>
                        <div class="footertext"><a href="mailto:info@sakhashreeneeta.com">info@sakhashreeneeta.com</a>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <div><img src="dist/img/location_icon.svg"></div>
                        <div class="footertext">D-319/320, Neelkanth Business Park, Nathani Road, Near Vidyavihar
                            Station Skywalk, Vidyavihar (West) Mumbai, Maharashtra 400086.</div>
                    </div>
                </div>
            </div>
            <div class="copyrightarea">Ⓒ
                <script>
                    document.write(new Date().getFullYear())
                </script> Sakhashree Neeta. All Rights Reserved.
            </div>
        </div>
    </div>
</footer>

<!-- Success Stories Modal start -->
<div class="modal fade" id="SuccessStories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Success Stories
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <iframe id="successStoryVideo" width="100%" height="315" src="" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
            </div>

        </div>
    </div>
</div>
<!-- Success Stories Modal end -->

<!-- Add Reviews Modal start -->
<div class="modal fade" id="AddReviews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Add Reviews
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('testimonial.review.store') }}">

                    @csrf

                    <div class="mb-3">
                        <input type="text" name="name" class="form-control form-control-lg"
                            placeholder="Your Full Name" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" name="designation" class="form-control form-control-lg"
                            placeholder="Your Designation" value="{{ old('designation') }}" required>
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control form-control-lg"
                            placeholder="Enter Your Email ID" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" name="mobile" class="form-control form-control-lg"
                            placeholder="Mobile / Telephone" value="{{ old('mobile') }}" required>
                    </div>

                    <div>
                        <textarea name="description" class="form-control" rows="5"
                            placeholder="Tell us about your challenges or concerns" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="topmargin20">
                        <button type="submit" class="secondrybtn btnmdfullwidth">
                            Send
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
<!-- Add Reviews Modal end -->
