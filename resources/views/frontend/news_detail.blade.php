@extends('layouts.frontend')

@section('content')
    <main class="mainwrapper">
        <div class="innercontbg">

            <section class="innermidcontarea">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <div class="breadcrumbarea">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('news') }}">News</a></li>
                                    {{-- <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li> --}}
                                </ol>
                            </nav>
                        </div>
                        <div><a href="{{ route('news') }}"><button class="primarybtnol btnsm">Back</button></a></div>
                    </div>

                    <div class="row topmargin30">
                        <div class="col-lg-6">
                            <div class="mainheading">
                                <h3>{{ $news->title }}</h3>
                            </div>
                            <div class="newsdetboxinfo">{!! $news->description !!}</div>
                        </div>
                        <div class="col-lg-6">
                            @if ($news->has_video && $news->video_link)
                                <div class="newsdetimg">
                                    <iframe width="100%" height="315" src="{{ $news->video_link }}"
                                        title="{{ $news->title }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            @elseif ($news->image_file)
                                <div class="newsdetimg">
                                    <img src="{{ asset('public/images/news/image_file/' . $news->id . '/' . $news->image_file) }}"
                                        alt="{{ $news->title }}">
                                </div>
                            @else
                                <div class="newsdetimg">
                                    <img src="{{ asset('dist/images/no-image.png') }}" alt="{{ $news->title }}">
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </main>
@endsection
