@extends('layouts.frontend')

@section('content')
    <main class="mainwrapper">
        <div class="innercontbg">
            <section class="innermidcontarea">
                <div class="container">
                    <!--Breadcrumb start here-->
                    <div class="breadcrumbarea">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                            </ol>
                        </nav>
                    </div>
                    <!--Breadcrumb end here-->

                    <div class="mainheading topmargin5">
                        <h1 class="text-uppercase"><span class="second-color">Discover</span><br>Blogs & Articles</h1>
                    </div>
                    <div class="innercolinfotext">Curated articles blending sacred chakra knowledge with modern spiritual<br
                            class="hidemob"> science to support emotional healing, energetic clarity, and conscious living.
                    </div>
                    <div class="row topmargin30">
                        <div class="col-lg-5 col-md-7">
                            <div class="d-flex gap-3">
                                <div class="flex-grow-1"><input class="form-control" placeholder="Find articles..."></div>
                                <div><button class="primarybtn btnmd">Search</button></div>
                            </div>
                        </div>
                    </div>

                    <div class="row topmargin40">
                        <div class="col-lg-9">
                            <div class="innercontrightmar">
                                <div class="row">

                                    @foreach ($blogs as $blog)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="wrvbcardarea">
                                                <a href="{{ route('blog_detail', $blog->page_slug) }}">
                                                    <div class="wrvbcard">

                                                        <div class="wrvbcardimg">
                                                            <img src="{{ $blog->image_file
                                                                ? asset('public/images/blog/image_file/' . $blog->id . '/' . $blog->image_file)
                                                                : asset('dist/images/no-image.png') }}"
                                                                alt="{{ $blog->title }}">
                                                        </div>

                                                        <div class="bncardtitlearea">
                                                            <div class="blogscardtitle">
                                                                <h6>{{ $blog->title }}</h6>
                                                            </div>

                                                            <div class="viewalltext">
                                                                Read More
                                                                <i class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img
                                                            src="{{ asset('dist/img/blog_img06.jpg') }}"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>Chakra Beej Mantras – The Sounds of the Cha...</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img
                                                            src="{{ asset('dist/img/blog_img07.jpg') }}"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>A Meditation on My Mother, the Earth</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img
                                                            src="{{ asset('dist/img/blog_img08.jpg') }}"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>Do We Really Need Astrology?</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img
                                                            src="{{ asset('dist/img/blog_img09.jpg') }}"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>Chakra Beej Mantras – The Sounds of the Cha...</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img src="img/blog_img10.jpg"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>A Meditation on My Mother, the Earth</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img src="img/blog_img11.jpg"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>Significance of Moon Cycles</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img src="img/blog_img06.jpg"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>Chakra Beej Mantras – The Sounds of the Cha...</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img src="img/blog_img05.jpg"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>A Meditation on My Mother, the Earth</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img src="img/blog_img10.jpg"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>Do We Really Need Astrology?</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img src="img/blog_img07.jpg"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>Chakra Beej Mantras – The Sounds of the Cha...</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="wrvbcardarea">
                                            <a href="blogdetails.html">
                                                <div class="wrvbcard">
                                                    <div class="wrvbcardimg"><img src="img/blog_img08.jpg"></div>
                                                    <div class="bncardtitlearea">
                                                        <div class="blogscardtitle">
                                                            <h6>A Meditation on My Mother, the Earth</h6>
                                                        </div>
                                                        <div class="viewalltext">Read More <i
                                                                class="fa-solid fa-arrow-right"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 rowmargintabmob20">
                            <div class="sidebarheadarea">
                                <div>
                                    <h5>Categories</h5>
                                </div>
                                <div class="d-flex align-items-center w-100">
                                    <div><img src="{{ asset('dist/img/sidebarhead.svg') }}"></div>
                                    <div class="flex-grow-1">
                                        <div class="sidebarheadline"></div>
                                    </div>
                                </div>
                            </div>

                            {{-- pending category task --}}
                            <div class="row">
                                <div class="col-lg-12 col-md-6">

                                    @foreach ($blogCategories as $category)
                                        <div class="col-lg-12 col-md-6">
                                            <div class="blogcatbox">
                                                <a href="#">
                                                    <div class="d-flex align-items-center">

                                                        <div class="blogcatboximg">
                                                            <img src="{{ asset('public/images/blog_categories/' . $category->image) }}"
                                                                alt="{{ $category->name }}">
                                                        </div>

                                                        <div class="blogcathead">
                                                            <h6>{{ $category->name }}</h6>
                                                        </div>

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach


                                    {{--
                                    <div class="col-lg-12 col-md-6">
                                        <div class="blogcatbox">
                                            <a href="blogs.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="blogcatboximg"><img src="img/festivals.jpg"></div>
                                                    <div class="blogcathead">
                                                        <h6>Festivals</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="blogcatbox">
                                            <a href="blogs.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="blogcatboximg"><img src="img/health_healing.jpg"></div>
                                                    <div class="blogcathead">
                                                        <h6>Health Healing</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="blogcatbox">
                                            <a href="blogs.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="blogcatboximg"><img src="img/meditation.jpg"></div>
                                                    <div class="blogcathead">
                                                        <h6>Meditation</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div> --}}

                                </div>
                                <div class="exploretopicsbox topmargin10">
                                    <h6>Explore More Topics</h6>
                                    <ul>
                                        <li><a href="blogdetails.html">Chakra Healing: Signs Your Energy Centers Are Out of
                                                Balance</a></li>
                                        <li><a href="blogdetails.html">Best Gemstones for Chakra Alignment & Positive
                                                Energy</a></li>
                                        <li><a href="blogdetails.html">Aura Cleansing Rituals for Inner Peace &
                                                Positivity</a>
                                        </li>
                                        <li><a href="blogdetails.html">Holistic Wellness Habits for a More Mindful &
                                                Peaceful
                                                Life</a></li>
                                    </ul>
                                </div>
                                <div class="blogtagsbox topmargin20">
                                    <h6>Tags</h6>
                                    <div class="blogsidebartagsarea">
                                        <div class="blogsidebartags"><a href="blogs.html">Chakra Healing</a></div>
                                        <div class="blogsidebartags"><a href="blogs.html">Meditation</a></div>
                                        <div class="blogsidebartags"><a href="blogs.html">Mindfulness</a></div>
                                        <div class="blogsidebartags"><a href="blogs.html">Spiritual Growth</a></div>
                                        <div class="blogsidebartags"><a href="blogs.html">Rudraksha</a></div>
                                        <div class="blogsidebartags"><a href="blogs.html">Inner Peace</a></div>
                                        <div class="blogsidebartags"><a href="blogs.html">Healing Gemstones</a></div>
                                        <div class="blogsidebartags"><a href="blogs.html">CrystalHealing</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- Middle section end here -->
        </div>
    @endsection
