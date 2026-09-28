@if ($news->isNotEmpty())
    <div class="mainheading text-center topmargin60">
        <h2>News</h2>
    </div>

    <div class="row">

        @foreach ($news->take(4) as $item)
            <div class="col-lg-3 col-md-6">
                <div class="wrvbcardarea">

                    <a href="{{ route('news_detail', $item->page_slug) }}">

                        <div class="wrvbcard">

                            <div class="wrvbcardimg">
                                @if ($item->has_video == 1 && $item->video_link)
                                    @php
                                        preg_match(
                                            '/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([^&?\/]+)/',
                                            $item->video_link,
                                            $matches
                                        );

                                        $videoId = $matches[1] ?? null;
                                    @endphp

                                    @if ($videoId)
                                        <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg"
                                            alt="{{ $item->title }}">
                                    @else
                                        <img src="{{ asset('dist/images/no-image.png') }}"
                                            alt="{{ $item->title }}">
                                    @endif

                                @elseif ($item->has_video == 0 && $item->image_file)
                                    <img src="{{ asset('public/images/news/image_file/' . $item->id . '/' . $item->image_file) }}"
                                        alt="{{ $item->title }}">

                                @else
                                    <img src="{{ asset('dist/images/no-image.png') }}"
                                        alt="{{ $item->title }}">
                                @endif
                            </div>

                            <div class="bncardtitlearea">

                                <div class="newscardtitle">
                                    <h6>
                                        {{ $item->title }}
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
        <a href="{{ route('news') }}">
            <button class="secondrybtn btnmd">
                View All
            </button>
        </a>
    </div>
@endif
