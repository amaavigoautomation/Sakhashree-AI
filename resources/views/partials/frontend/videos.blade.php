<div class="mainheading text-center topmargin60">
    <h2>Videos</h2>
</div>
<div class="row">

    @foreach ($videos as $video)
        @php
            preg_match(
                '/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([^&?\/]+)/',
                $video->video_link,
                $matches,
            );

            $videoId = $matches[1] ?? null;
        @endphp

        @if ($videoId)
            <div class="col-md-4">
                <div class="videosbox">
                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}"
                        title="{{ $video->title ?? 'YouTube video player' }}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe>
                </div>
            </div>
        @endif
    @endforeach
</div>
<div class="topmargin10 text-center"><a href="{{ route('videos_list') }}"><button class="secondrybtn btnmd">View All
            Videos</button></a></div>
