@extends('layouts.frontend')

@section('content')
    <main class="mainwrapper">

        <div class="innercontbg">

            <!-- Middle section start here -->
            <section class="innermidcontarea">
                <div class="container">
                    <!--Breadcrumb start here-->
                    <div class="breadcrumbarea">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">News</li>
                            </ol>
                        </nav>
                    </div>
                    <!--Breadcrumb end here-->

                    <div class="mainheading topmargin5">
                        <h1 class="text-uppercase"><span class="second-color">Latest News</span><br>& Updates</h1>
                    </div>
                    <div class="innercolinfotext">Explore the latest breaking news, trending stories, and important updates.
                        <br class="hidemob">Get reliable information and stay connected with what’s happening around you.
                    </div>

                    <div class="row topmargin40">
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img01.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Sakhashree Neeta was honoured and felicitated by District Governer at
                                                    Lions...</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img02.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Sakhashree’s interview in Cine blitz published about her holistic
                                                    journey.</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img03.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Sakhashree Neeta awarded by Srishti News Channel for outstanding
                                                    research...</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img04.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Life Insurance Corporation of India honoured Sakhashree Neeta on...</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img01.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Sakhashree Neeta was honoured and felicitated by District Governer at
                                                    Lions...</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img02.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Sakhashree’s interview in Cine blitz published about her holistic
                                                    journey.</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img03.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Sakhashree Neeta awarded by Srishti News Channel for outstanding
                                                    research...</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ ('dist/img/news_img04.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Life Insurance Corporation of India honoured Sakhashree Neeta on...</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img01.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Sakhashree Neeta was honoured and felicitated by District Governer at
                                                    Lions...</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img02.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Sakhashree’s interview in Cine blitz published about her holistic
                                                    journey.</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img03.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Sakhashree Neeta awarded by Srishti News Channel for outstanding
                                                    research...</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="wrvbcardarea">
                                <a href="newsdetails.html">
                                    <div class="wrvbcard">
                                        <div class="wrvbcardimg"><img src="{{ asset('dist/img/news_img04.jpg') }}"></div>
                                        <div class="bncardtitlearea">
                                            <div class="newscardtitle">
                                                <h6>Life Insurance Corporation of India honoured Sakhashree Neeta on...</h6>
                                            </div>
                                            <div class="viewalltext">Read More <i class="fa-solid fa-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Middle section end here -->
        </div>


    </main>
@endsection
