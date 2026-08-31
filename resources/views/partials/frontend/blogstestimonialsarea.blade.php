<section class="blogstestimonialsarea">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="testimonialsbg">
                    <div class="d-flex justify-content-between">
                        <div class="testimonialsheadtext">TESTIMONIALS</div>
                        <div class="infotxt"><a href="{{ route('testimonials') }}">View All</a></div>
                    </div>

                    <div class="testimonialsslider">
                        <div id="carouselTestimonials" class="carousel slide carousel-fade" data-bs-ride="carousel">

                            {{-- Indicators --}}
                            <div class="carousel-indicators carousel-indicators1">
                                @foreach ($testimonials as $key => $testimonial)
                                    <button type="button" data-bs-target="#carouselTestimonials"
                                        data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                                        aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $key + 1 }}">
                                    </button>
                                @endforeach
                            </div>

                            {{-- Slides --}}
                            <div class="carousel-inner">

                                @foreach ($testimonials as $key => $testimonial)
                                    @php
                                        $rating = min(max((int) $testimonial->rating, 0), 5);
                                    @endphp

                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <div class="testimonialsbox">

                                            {{-- Description --}}
                                            <div class="testimonialstext">

                                                <span class="short-text">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($testimonial->description), 450) }}
                                                </span>
                                                @if (strlen($testimonial->description) > 250)
                                                    <a href="{{ route('testimonials') }}"> Read More</a>
                                                @endif

                                            </div>

                                            {{-- Name --}}
                                            <div class="testimonialsname topmargin30">
                                                {{ $testimonial->name ?? '' }}
                                            </div>

                                            {{-- Location --}}
                                            <div class="testimonialsdesig">
                                                {{ $testimonial->city ?? '' }}{{ $testimonial->city && $testimonial->country ? ',' : '' }}
                                                {{ $testimonial->country ?? '' }}
                                            </div>

                                            {{-- Rating --}}
                                            <div class="testimonialsrating">
                                                <div class="testimonialsline"></div>

                                                <div class="testimonialsstar">
                                                    @for ($i = 1; $i <= $rating; $i++)
                                                        <div>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 rowmargintabmob30">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="mainheading">
                            <h2 class="mb-0">Blogs</h2>
                        </div>
                    </div>
                    <div class="col-6 text-end"><a href="{{ route('blogs') }}"><button class="primarybtn btnmd">View
                                all</button></a></div>
                </div>
                <div class="row topmargin20">
                    @if (!empty($blogs) && $blogs->count() > 0)
                        <?php foreach ($blogs as $blog) { ?>
                        <div class="col-md-6 topmargin20">
                            <div class="blogsboxarea">
                                <a href="{{ route('blog_detail', $blog->page_slug) }}">
                                    <div class="blogsbox">

                                        <div class="blogsboxtitlearea">
                                            <h4>{{ Str::limit($blog->title, 35) }}</h4>
                                        </div>

                                        <div class="blogsboximg">
                                            <img
                                                src="{{ asset("public/images/blog/image_file/{$blog->id}/{$blog->image_file}") }}">
                                        </div>

                                        <div class="blogsboxcontarea">
                                            <div class="blogstext">
                                                {{ Str::limit(strip_tags($blog->description), 80) }}
                                            </div>

                                            <div class="arrowcircleimg">
                                                <img src="{{ asset('dist/img/arrow_circle.svg') }}">
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
