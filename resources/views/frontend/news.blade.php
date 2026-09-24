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

                        @forelse ($news as $item)
                            <div class="col-lg-3 col-md-6">
                                <div class="wrvbcardarea">

                                    {{-- <a href="{{ route('news_detail', $item->page_slug) }}"> --}}
                                    <a href="#">

                                        <div class="wrvbcard">

                                            <div class="wrvbcardimg">
                                                @if ($item->image_file)
                                                    <img src="{{ asset('public/images/news/image_file/' . $item->id . '/' . $item->image_file) }}"
                                                        alt="{{ $item->title }}">
                                                @elseif ($item->has_video && $item->video_link)
                                                    <img src="{{ asset('dist/img/news_img01.jpg') }}"
                                                        alt="{{ $item->title }}">
                                                @else
                                                    <img src="{{ asset('dist/img/news_img01.jpg') }}"
                                                        alt="{{ $item->title }}">
                                                @endif
                                            </div>

                                            <div class="bncardtitlearea">
                                                @php
                                                    $shortTitle = implode(' ', array_slice(explode(' ', $item->title), 0, 10));
                                                @endphp
                                                <div class="newscardtitle">
                                                    <h6>{{ $shortTitle }}{{ str_word_count($item->title) > 10 ? '...' : '' }}</h6>
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

                        @empty

                            <div class="col-12 text-center">
                                <div class="innercolinfotext">
                                    No news available.
                                </div>
                            </div>
                        @endforelse

                    </div>

                </div>
            </section>
            <!-- Middle section end here -->
        </div>


    </main>
@endsection
