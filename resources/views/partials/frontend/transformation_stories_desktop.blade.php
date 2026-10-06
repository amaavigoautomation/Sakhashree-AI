@if ($testimonialVideos->isNotEmpty())
    <!-- Transformation Stories Desktop start -->
    <div class="sucstoriesvidarea">
        <div class="sucstoriesarea">

            @php
                $borderClasses = [
                    'red-border',
                    'orange-border',
                    'yellow-border',
                    'green-border',
                    'cyan-border',
                    'blue-border',
                    'purple-border',
                ];

                $videoIndex = 0;
            @endphp

            @foreach ($borderClasses as $borderClass)
                @php
                    $count = in_array($borderClass, ['yellow-border', 'cyan-border', 'green-border']) ? 1 : 2;
                @endphp

                @if ($videoIndex < $testimonialVideos->count())
                    <div class="sucstoriesbox">

                        <div class="sucstoriesborder {{ $borderClass }}"></div>

                        @for ($i = 0; $i < $count; $i++)
                            @if ($videoIndex < $testimonialVideos->count())
                                @php
                                    $testimonialVideo = $testimonialVideos[$videoIndex];
                                @endphp

                                <div class="sucstoriesimg">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories"
                                        data-video="{{ $testimonialVideo->video_link }}">

                                        <div class="playbtn">
                                            <img src="{{ asset('dist/img/playbtn.svg') }}" alt="Play">
                                        </div>

                                        <img src="{{ asset('public/images/testimonials_video_faces/' . $testimonialVideo->id . '/' . $testimonialVideo->facial_image) }}"
                                            alt="{{ $testimonialVideo->name }}">
                                    </a>
                                </div>

                                @php
                                    $videoIndex++;
                                @endphp
                            @endif
                        @endfor

                    </div>
                @endif
            @endforeach

        </div>

        <div class="sucstoriesbtnarea">
            <a href="{{ route('testimonials_video_list') }}">
                <button class="secondrybtn btnmd">
                    Watch Success Stories
                </button>
            </a>
        </div>

    </div>
    <!-- Transformation Stories Desktop start -->

    <!-- Transformation Stories Mobile start -->
    <div class="sucstoriesvidarea-mob">

        {{-- @dump($testimonialVideos); --}}

        <div class="mainheading text-center hidedesktab">
            <h2>Transformation Stories</h2>
        </div>


        <div class="videos-slider">
            <div id="VideosSlider" class="carousel slide topmargin25" data-bs-ride="carousel">

                <div class="carousel-inner">

                    @foreach ($testimonialVideos->chunk(2) as $index => $videoChunk)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="d-flex gap-3">

                                @foreach ($videoChunk as $testimonialVideo)
                                    <div class="sucstoriesimg w-100">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#SuccessStories"
                                            data-video="{{ $testimonialVideo->video_link }}">

                                            <div class="playbtn">
                                                <img src="{{ asset('dist/img/playbtn.svg') }}" alt="Play">
                                            </div>

                                            <img src="{{ asset('public/images/testimonials_video_faces/' . $testimonialVideo->id . '/' . $testimonialVideo->facial_image) }}"
                                                alt="{{ $testimonialVideo->name }}">
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#VideosSlider"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#VideosSlider"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
        </div>
    </div>
@endif
