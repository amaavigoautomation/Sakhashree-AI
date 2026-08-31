@extends('layouts.frontend')

@section('content')
    @php
        $getImagePath = fn($id, $file) => asset("public/images/videos/image_file/$id/$file");

        $getYoutubeId = function ($url) {
            preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([^&]+)/', $url, $matches);
            return $matches[1] ?? null;
        };
    @endphp

    <div class="maincontarea">

        {{-- Breadcrumb --}}
        <section class="breadcrumbarea">
            <div class="container">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </nav>
            </div>
        </section>

        {{-- Content --}}
        <section class="middlecontarea">
            <div class="container">

                @if ($videoTestimonials->isNotEmpty())
                    {{-- VIDEO TESTIMONIALS --}}
                    <h3 class="text-left mb-4">Video Testimonials</h3>
                    <hr>

                    <div class="row">
                        @foreach ($videoTestimonials as $video)
                            @php
                                $videoId = $getYoutubeId($video->video_link);

                                $thumbnail = $video->image_file
                                    ? $getImagePath($video->id, $video->image_file)
                                    : asset('dist/no-image.png');
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
                @endif

                {{-- TESTIMONIALS --}}
                @if (!empty($testimonials) && $testimonials->count() > 0)
                    <h3 class="text-left mb-4 mt-5">Testimonials</h3>
                    <hr>

                    @foreach ($testimonials as $testimonial)
                        <div class="testimonialsbg mb-4">
                            <div class="testimonialsbox mt-0">

                                <div class="testimonialstext">
                                    {!! $testimonial->description ?? '' !!}
                                </div>

                                <div class="testimonialsname topmargin30">
                                    {{ $testimonial->name }}
                                </div>

                                <div class="testimonialsdesig">
                                    {{ implode(', ', array_filter([$testimonial->city, $testimonial->country])) }}
                                </div>

                                <div class="testimonialsrating mt-3">
                                    <div class="testimonialsline"></div>

                                    <div class="testimonialsstar">
                                        @for ($i = 0; $i < $testimonial->rating; $i++)
                                            <i class="fa-solid fa-star"></i>
                                        @endfor
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif

                {{-- PHOTOS --}}
                @if ($photos->isNotEmpty())
                    <h3 class="text-left mb-4 mt-5">Photos</h3>
                    <hr>

                    <div class="row">
                        @foreach ($photos as $photo)
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="galleryboxarea">
                                    <a href="{{ $photo->image_url }}" data-fancybox="gallery">
                                        <img src="{{ $photo->image_url }}" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </section>
    </div>

    {{-- VIDEO MODAL --}}
    <div class="modal fade" id="GalleryVideo" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Gallery Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <iframe id="galleryVideoFrame" width="100%" height="315" src=""
                        allow="autoplay; encrypted-media" allowfullscreen>
                    </iframe>
                </div>

            </div>
        </div>
    </div>

    {{-- JS --}}
    <script>
        $(document).on('click', '[data-image], [data-video]', function() {

            if ($(this).data('image')) {
                $('#modalImage').attr('src', $(this).data('image'));
            }

            if ($(this).data('video')) {
                $('#galleryVideoFrame').attr('src', $(this).data('video') + '?autoplay=1');
            }

        });
    </script>
@endsection
