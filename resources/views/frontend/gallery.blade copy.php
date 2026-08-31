@extends('layouts.frontend')

@section('content')
    <div class="maincontarea">

        <!-- Breadcrumb -->
        <section class="breadcrumbarea">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Content -->
        <section class="middlecontarea">
            <div class="container">

                <!-- Buttons -->
                <div class="d-flex justify-content-center gap-2 mb-4">
                    <button class="primarybtn btnmd">Reviews</button>

                    <a href="{{ route('testimonials') }}">
                        <button class="primarybtnol btnmd">Testimonials</button>
                    </a>
                </div>

                <!-- Gallery -->
                <div class="row">

                    @foreach ($videos as $video)
                        @php
                            preg_match(
                                '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([^&]+)/',
                                $video->video_link,
                                $matches,
                            );
                            $videoId = $matches[1] ?? null;
                            $thumbnail = !empty($video->image_file)
                                ? asset('public/images/videos/image_file/' . $video->id . '/' . $video->image_file)
                                : asset('dist/img/default.jpg');
                        @endphp

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="vidgalleryboxarea">

                                <a href="#" data-bs-toggle="modal" data-bs-target="#GalleryVideo"
                                    data-video="https://www.youtube.com/embed/{{ $videoId }}">

                                    <div class="vidgalleryboximg">

                                        <div class="vidgallerybtnarea">
                                            <button class="vidgallerybtn">
                                                <img src="{{ asset('dist/img/playbtn.png') }}">
                                            </button>
                                        </div>

                                        <div class="vidgallerycontarea">
                                            {{ $video->title }} <br>
                                            <span>{{ $video->profession ?? '' }}</span>
                                        </div>

                                        <img src="{{ $thumbnail }}" class="img-fluid">

                                    </div>
                                </a>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="GalleryVideo" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Gallery Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <iframe id="galleryVideoFrame" width="100%" height="315" src="" frameborder="0"
                        allow="autoplay; encrypted-media" allowfullscreen>
                    </iframe>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '[data-video]', function() {
            $('#galleryVideoFrame').attr('src', $(this).data('video') + '?autoplay=1');
        });

        $('#GalleryVideo').on('hidden.bs.modal', function() {
            $('#galleryVideoFrame').attr('src', '');
        });
    </script>
@endsection
