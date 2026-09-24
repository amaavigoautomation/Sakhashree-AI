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


<!-- Videos Modal start -->

<div class="modal fade" id="Videos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-md">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">
                    Videos
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>

            </div>


            <div class="modal-body">

                <iframe id="videoIframe" width="100%" height="315" src="" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>

            </div>

        </div>

    </div>

</div>

<!-- Videos Modal end -->


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const videoModal = document.getElementById('Videos');
        const videoIframe = document.getElementById('videoIframe');

        videoModal.addEventListener('show.bs.modal', function(event) {

            const button = event.relatedTarget;

            const videoLink = button.getAttribute('data-video');

            let videoId = '';

            const match = videoLink.match(
                /(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([^&?\/]+)/
            );

            if (match) {
                videoId = match[1];
            }

            videoIframe.src =
                'https://www.youtube.com/embed/' + videoId;

        });


        videoModal.addEventListener('hidden.bs.modal', function() {

            videoIframe.src = '';

        });

    });
</script>

