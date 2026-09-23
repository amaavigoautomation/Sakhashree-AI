<section class="homemidcontarea">
    <div class="container">

        {{-- healing offerings --}}
        @include('partials.frontend.healing_offerings')

        {{-- consultations --}}
        @include('partials.frontend.personal_consultation')

        {{-- workshop and retreats --}}
        @include('partials.frontend.workshop_and_retreats')

        <!-- Transformation Stories Desktop start -->
        <div class="sucstoriesvidarea">
            <div class="sucstoriesarea">
                <div class="sucstoriesbox">
                    <div class="sucstoriesborder red-border"></div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img01.png">
                        </a>
                    </div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img02.png">
                        </a>
                    </div>
                </div>
                <div class="sucstoriesbox">
                    <div class="sucstoriesborder orange-border"></div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img03.png">
                        </a>
                    </div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img04.png">
                        </a>
                    </div>
                </div>
                <div class="sucstoriesbox">
                    <div class="sucstoriesborder yellow-border"></div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img05.png">
                        </a>
                    </div>
                </div>
                <div class="sucstoriesbox">
                    <div class="sucstoriesborder green-border"></div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img06.png">
                        </a>
                    </div>
                </div>
                <div class="sucstoriesbox">
                    <div class="sucstoriesborder cyan-border"></div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img07.png">
                        </a>
                    </div>
                </div>
                <div class="sucstoriesbox">
                    <div class="sucstoriesborder blue-border"></div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img08.png">
                        </a>
                    </div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img09.png">
                        </a>
                    </div>
                </div>
                <div class="sucstoriesbox">
                    <div class="sucstoriesborder purple-border"></div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img10.png">
                        </a>
                    </div>
                    <div class="sucstoriesimg">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories">
                            <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                            <img src="dist/img/sucstories_img11.png">
                        </a>
                    </div>
                </div>
            </div>
            <div class="sucstoriesbtnarea"><a href="{{ route('testimonials_video_list') }}"><button
                        class="secondrybtn btnmd">Watch
                        Success Stories</button></a></div>
        </div>
        <!-- Transformation Stories Desktop start -->

        <!-- Transformation Stories Mobile start -->
        <div class="sucstoriesvidarea-mob">
            <div class="mainheading text-center hidedesktab">
                <h2>Transformation Stories</h2>
            </div>
            <div class="videos-slider">
                <div id="VideosSlider" class="carousel slide topmargin25" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex gap-3">
                                <div class="sucstoriesimg w-100">
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#SuccessStories">
                                        <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                                        <img src="dist/img/sucstories_img01.png">
                                    </a>
                                </div>
                                <div class="sucstoriesimg w-100">
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#SuccessStories">
                                        <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                                        <img src="dist/img/sucstories_img02.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3">
                                <div class="sucstoriesimg w-100">
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#SuccessStories">
                                        <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                                        <img src="dist/img/sucstories_img03.png">
                                    </a>
                                </div>
                                <div class="sucstoriesimg w-100">
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#SuccessStories">
                                        <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                                        <img src="dist/img/sucstories_img04.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3">
                                <div class="sucstoriesimg w-100">
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#SuccessStories">
                                        <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                                        <img src="dist/img/sucstories_img05.png">
                                    </a>
                                </div>
                                <div class="sucstoriesimg w-100">
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#SuccessStories">
                                        <div class="playbtn"><img src="dist/img/playbtn.svg"></div>
                                        <img src="dist/img/sucstories_img06.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#VideosSlider"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#VideosSlider"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Transformation Stories Mobile start -->

        <div class="transtoriesarea">
            <div class="mainheading text-center hidemob">
                <h2>Transformation Stories</h2>
            </div>
            <div class="stories-slider">
                <div id="StoriesSlider" class="carousel slide topmargin40" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="transtoriescont">
                                <div class="transtoriesimg hidetabmob"><img src="dist/img/sucstories_img08.png"></div>
                                <div class="transtoriesinfo">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="transtoriesimg hidedesk"><img src="dist/img/sucstories_img08.png">
                                        </div>
                                        <div>
                                            <h5>Sadhna Sargam</h5>
                                            <div class="transtoriesdesig">Singer</div>
                                            <div class="transtoriesline"></div>
                                        </div>
                                    </div>
                                    <div class="transtoriestext topmargin20">I have successfully upgraded adding one
                                        after the other by purchasing and finally reached wearing my Sarva Siddha
                                        bracelet combination (2-16) from (Rudraksha Ratna)Rudra Centre. Will reach
                                        Indrakshi combination for sure in future. What an amazing results seriously.
                                        Siddarth sir assisted me, answered each and every query of mine and clarified,
                                        such a great person with lots of patience and knowledge, sorry sir if I have
                                        bothered you much. As me, being a living example, I feel This is a place where
                                        from a common man, middle class to rich person can afford authentic and genuine
                                        rudrakshas... <a href="{{ route('testimonials_list') }}">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="transtoriescont">
                                <div class="transtoriesimg hidetabmob"><img src="dist/img/sucstories_img01.png"></div>
                                <div class="transtoriesinfo">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="transtoriesimg hidedesk"><img src="dist/img/sucstories_img01.png">
                                        </div>
                                        <div>
                                            <h5>Sadhna Sargam</h5>
                                            <div class="transtoriesdesig">Singer</div>
                                            <div class="transtoriesline"></div>
                                        </div>
                                    </div>
                                    <div class="transtoriestext topmargin20">I have successfully upgraded adding one
                                        after the other by purchasing and finally reached wearing my Sarva Siddha
                                        bracelet combination (2-16) from (Rudraksha Ratna)Rudra Centre. Will reach
                                        Indrakshi combination for sure in future. What an amazing results seriously.
                                        Siddarth sir assisted me, answered each and every query of mine and clarified,
                                        such a great person with lots of patience and knowledge, sorry sir if I have
                                        bothered you much. As me, being a living example, I feel This is a place where
                                        from a common man, middle class to rich person can afford authentic and genuine
                                        rudrakshas... <a href="{{ route('testimonials_list') }}">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="transtoriescont">
                                <div class="transtoriesimg hidetabmob"><img src="dist/img/sucstories_img02.png"></div>
                                <div class="transtoriesinfo">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="transtoriesimg hidedesk"><img src="dist/img/sucstories_img02.png">
                                        </div>
                                        <div>
                                            <h5>Sadhna Sargam</h5>
                                            <div class="transtoriesdesig">Singer</div>
                                            <div class="transtoriesline"></div>
                                        </div>
                                    </div>
                                    <div class="transtoriestext topmargin20">I have successfully upgraded adding one
                                        after the other by purchasing and finally reached wearing my Sarva Siddha
                                        bracelet combination (2-16) from (Rudraksha Ratna)Rudra Centre. Will reach
                                        Indrakshi combination for sure in future. What an amazing results seriously.
                                        Siddarth sir assisted me, answered each and every query of mine and clarified,
                                        such a great person with lots of patience and knowledge, sorry sir if I have
                                        bothered you much. As me, being a living example, I feel This is a place where
                                        from a common man, middle class to rich person can afford authentic and genuine
                                        rudrakshas... <a href="{{ route('testimonials_list') }}">Read More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#StoriesSlider"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#StoriesSlider"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-center flex-column flex-md-row topmargin30">
            <div><a href="{{ route('testimonials_list') }}"><button class="secondrybtn btnmdfullwidth">Read Client
                        Experience</button></a></div>
            <div><button class="secondrybtnol btnmdfullwidth" data-bs-toggle="modal" data-bs-target="#AddReviews">Add
                    Your Review</button></div>
        </div>
        <!-- Transformation Stories section end here -->

        <!-- Videos section start here -->
        @include('partials.frontend.videos')
        <!-- Videos section end here -->

        <!-- Blogs section start here -->
        @include('partials.frontend.blogs')
        <!-- Blogs section end here -->

        <!-- News section start here -->
        @include('partials.frontend.news')
        <!-- News section end here -->
    </div>
</section>
