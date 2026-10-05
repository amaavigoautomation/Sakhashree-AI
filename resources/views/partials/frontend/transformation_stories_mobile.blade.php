<!-- Transformation Stories Mobile start -->
<div class="sucstoriesvidarea-mob">
    <div class="mainheading text-center hidedesktab">
        <h2>Transformation Stories</h2>
    </div>
    <div class="videos-slider">
        <div id="VideosSlider" class="carousel slide topmargin25" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($testimonialVideos as $video)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="d-flex gap-3">
                            <div class="sucstoriesimg w-100">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories"
                                    data-video="{{ $video->video_link }}">
                                    <div class="playbtn"><img src="img/playbtn.svg"></div>
                                    <img src="{{ asset('public/images/testimonials_video_faces/' . $video->id . '/' . $video->facial_image) }}"
                                        alt="{{ $video->name }}">
                                </a>
                            </div>
                            <div class="sucstoriesimg w-100">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SuccessStories"
                                    data-video="{{ $video->video_link }}">
                                    <div class="playbtn"><img src="img/playbtn.svg"></div>
                                    <img src="{{ asset('public/images/testimonials_video_faces/' . $video->id . '/' . $video->facial_image) }}"
                                        alt="{{ $video->name }}">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#VideosSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#VideosSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<!-- Transformation Stories Mobile start -->
