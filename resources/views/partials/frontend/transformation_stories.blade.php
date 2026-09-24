@if ($testimonials->isNotEmpty())
    <div class="transtoriesarea">
        <div class="mainheading text-center hidemob">
            <h2>Transformation Stories</h2>
        </div>
        <div class="stories-slider">
            <div id="StoriesSlider" class="carousel slide topmargin40" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($testimonials as $key => $testimonial)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="transtoriescont">
                                {{-- Desktop image --}}
                                <div class="transtoriesimg hidetabmob">
                                    @if ($testimonial->icon)
                                        <img src="{{ asset('public/images/testimonials/' . $testimonial->id . '/' . $testimonial->icon) }}"
                                            alt="{{ $testimonial->name }}">
                                    @endif
                                </div>

                                <div class="transtoriesinfo">
                                    <div class="d-flex gap-3 align-items-center">
                                        {{-- Mobile image --}}
                                        <div class="transtoriesimg hidedesk">
                                            @if ($testimonial->icon)
                                                <img src="{{ asset('public/images/testimonials/' . $testimonial->id . '/' . $testimonial->icon) }}"
                                                    alt="{{ $testimonial->name }}">
                                            @endif
                                        </div>

                                        <div>
                                            <h5>{{ $testimonial->name }}</h5>
                                            @if ($testimonial->designation)
                                                <div class="transtoriesdesig">
                                                    {{ $testimonial->designation }}
                                                </div>
                                            @endif
                                            <div class="transtoriesline"></div>
                                        </div>
                                    </div>

                                    <div class="transtoriestext topmargin20">
                                        {{ $testimonial->description }}
                                        <a href="{{ route('testimonials_list') }}">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($testimonials->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#StoriesSlider"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true">
                        </span>
                        <span class="visually-hidden">
                            Previous
                        </span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#StoriesSlider"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true">
                        </span>
                        <span class="visually-hidden">
                            Next
                        </span>
                    </button>
                @endif
            </div>
        </div>
    </div>
@endif
<div class="d-flex gap-2 justify-content-center flex-column flex-md-row topmargin30">
    <div><a href="{{ route('testimonials_list') }}"><button class="secondrybtn btnmdfullwidth">Read Client
                Experience</button></a></div>
    <div><button class="secondrybtnol btnmdfullwidth" data-bs-toggle="modal" data-bs-target="#AddReviews">Add
            Your Review</button></div>
</div>
