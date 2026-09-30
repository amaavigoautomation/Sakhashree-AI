@extends('layouts.frontend')

@section('content')
    <main class="mainwrapper">
        <div class="innercontbg">
            <section class="innermidcontarea">
                <div class="container">
                    <!-- Breadcrumb start here -->
                    <div class="breadcrumbarea">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    Videos
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Breadcrumb end here -->

                    <div class="mainheading topmargin5">
                        <h1 class="text-uppercase">
                            <span class="second-color">Wisdom in</span><br>
                            Every Moment
                        </h1>
                    </div>
                    <div class="innercolinfotext">
                        Explore insights, teachings and real experiences that inspire deeper<br class="hidemob">
                        self-awareness, spiritual growth and a more balanced life.
                    </div>


                    <!-- Videos Cards -->
                    <div class="videoscardarea topmargin40">

                        @foreach ($videos as $video)
                            <div class="videoscard">

                                <div class="videoscardimg">

                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#Videos"
                                        data-video="{{ $video->video_link }}" data-title="{{ $video->title }}">

                                        <div class="videosplaybtn">
                                            <img src="{{ asset('dist/img/playbtn2.svg') }}">
                                        </div>

                                        <img
                                            src="{{ $video->image_file
                                                ? asset('public/images/videos/image_file/' . $video->id . '/' . $video->image_file)
                                                : asset('dist/images/no-image.png') }}">

                                    </a>

                                </div>


                                <div class="videoscardcont">

                                    <h6>
                                        {{ $video->title }}
                                    </h6>

                                    <div>
                                        {!! $video->description !!}
                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- Videos Cards end -->


                </div>

            </section>

            <!-- Middle section end here -->

        </div>

    </main>

@endsection


