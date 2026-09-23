@if ($blogs->isNotEmpty())
    <div class="mainheading text-center topmargin60">
        <h2>Blogs</h2>
    </div>
    <div class="row">
        @foreach ($blogs->take(4) as $blog)
            <div class="col-lg-3 col-md-6">
                <div class="wrvbcardarea">
                    <a href="{{ route('blog_detail', $blog->page_slug) }}">
                        <div class="wrvbcard">
                            <div class="wrvbcardimg">
                                @if ($blog->image_file)
                                    <img src="{{ asset('public/images/blog/image_file/' . $blog->id . '/' . $blog->image_file) }}"
                                        alt="{{ $blog->title }}">
                                @else
                                    <img src="{{ asset('dist/img/blog_img01.jpg') }}" alt="{{ $blog->title }}">
                                @endif

                            </div>

                            <div class="bncardtitlearea">

                                <div class="blogscardtitle">

                                    <h6>
                                        {{ $blog->title }}
                                    </h6>

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
        @endforeach

    </div>

    <div class="topmargin10 text-center">

        <a href="{{ route('blogs') }}">
            <button class="secondrybtn btnmd">
                View All Blogs
            </button>
        </a>

    </div>

@endif
