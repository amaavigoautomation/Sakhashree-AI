@extends('layouts.frontend')

@section('content')

    <main class="mainwrapper">
        <div class="innercontbg">

            <section class="innermidcontarea">

                <div class="container">

                    {{-- Breadcrumb --}}
                    <div class="breadcrumbarea">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">

                                <li class="breadcrumb-item">
                                    <a href="{{ route('blogs') }}">
                                        Blogs
                                    </a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $blog->title ?? '' }}
                                </li>

                            </ol>
                        </nav>
                    </div>


                    <div class="row topmargin30">

                        {{-- LEFT CONTENT --}}
                        <div class="col-lg-9">

                            <div class="innercontrightmar">

                                {{-- Blog Detail --}}
                                <div class="blogdetcontarea">

                                    {{-- Blog Image --}}
                                    <div class="blogdetimg">
                                        @php
                                            $imageFile = $blog->image_file ?? null;
                                            $imagePath = $imageFile ? asset('public/images/blog/image_file/' . $blog->id . '/' . $imageFile) : asset('dist/images/no-image.png');
                                        @endphp
                                        <img src="{{ $imagePath }}" alt="{{ $blog->title ?? '' }}">
                                    </div>


                                    {{-- Blog Title --}}
                                    <h2>
                                        {{ $blog->title ?? '' }}
                                    </h2>


                                    {{-- Blog Meta --}}
                                    {{-- <div class="blogsdatetext topmargin10">
                                        By
                                        {{ $blog->blogauthor->author_name ?? 'Sakhashree' }}

                                        @if (!empty($blog->blog_date))
                                            |
                                            {{ date('d M Y', strtotime($blog->blog_date)) }}
                                        @endif

                                    </div> --}}


                                    {{-- Blog Description --}}
                                    <div class="blogdetinfotext topmargin20">

                                        {!! $blog->description ?? '' !!}

                                    </div>

                                </div>


                                {{-- Recent Blogs --}}
                                @if ($relatedBlogs->count())
                                    <div class="d-flex align-items-center gap-3 w-100 topmargin40">

                                        <div class="mainheading">
                                            <h5>Recent Blogs</h5>
                                        </div>

                                        <div class="flex-grow-1">
                                            <div class="sidebarheadline"></div>
                                        </div>

                                    </div>


                                    <div class="row topmargin30">

                                        @foreach ($relatedBlogs as $related)
                                            <div class="col-lg-4 col-md-6">

                                                <div class="wrvbcardarea">

                                                    <a href="{{ route('blog_detail', $related->page_slug) }}">

                                                        <div class="wrvbcard">

                                                            {{-- Image --}}
                                                            <div class="wrvbcardimg">

                                                                @php
                                                                    $relatedImage = $related->image_file
                                                                        ? asset(
                                                                            'public/images/blog/image_file/' .
                                                                                $related->id .
                                                                                '/' .
                                                                                $related->image_file,
                                                                        )
                                                                        : asset('dist/images/no-image.png');
                                                                @endphp

                                                                <img src="{{ $relatedImage }}" alt="{{ $related->title }}">

                                                            </div>


                                                            {{-- Content --}}
                                                            <div class="bncardtitlearea">

                                                                <div class="blogscardtitle">

                                                                    <h6>
                                                                        {{ $related->title }}
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


                                    {{-- View All --}}
                                    <div class="topmargin10">

                                        <a href="{{ route('blogs') }}">
                                            <button class="primarybtn btnmd">
                                                View All
                                            </button>
                                        </a>

                                    </div>
                                @endif

                            </div>

                        </div>


                        {{-- RIGHT SIDEBAR --}}
                        <div class="col-lg-3 rowmargintabmob20">

                            {{-- Categories --}}
                            @if ($blogcategory->count())
                                <div class="sidebarheadarea">

                                    <div>
                                        <h5>Categories</h5>
                                    </div>

                                    <div class="d-flex align-items-center w-100">

                                        <div>
                                            <img src="{{ asset('dist/img/sidebarhead.svg') }}" alt="Categories">
                                        </div>

                                        <div class="flex-grow-1">
                                            <div class="sidebarheadline"></div>
                                        </div>

                                    </div>

                                </div>


                                <div class="row">

                                    @foreach ($blogcategory as $category)
                                        <div class="col-lg-12 col-md-6">

                                            <div class="blogcatbox">

                                                <a href="{{ route('blogs') }}">

                                                    <div class="d-flex align-items-center">

                                                        <div class="blogcatboximg">

                                                            @if (!empty($category->image_file))
                                                                <img src="{{ asset('public/images/blogcategories/image_file/' . $category->id . '/' . $category->image_file) }}"
                                                                    alt="{{ $category->name }}">
                                                            @else
                                                                <img src="{{ asset('dist/images/no-image.png') }}"
                                                                    alt="{{ $category->name }}">
                                                            @endif

                                                        </div>


                                                        <div class="blogcathead">

                                                            <h6>
                                                                {{ $category->name }}
                                                            </h6>

                                                        </div>

                                                    </div>

                                                </a>

                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            @endif


                            {{-- Explore More Topics --}}
                            @if ($otherBlogs->count())
                                <div class="exploretopicsbox topmargin10">

                                    <h6>
                                        Explore More Topics
                                    </h6>

                                    <ul>

                                        @foreach ($otherBlogs->take(4) as $otherBlog)
                                            <li>

                                                <a href="{{ route('blog_detail', $otherBlog->page_slug) }}">

                                                    {{ $otherBlog->title }}

                                                </a>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>
                            @endif


                            {{-- Tags --}}
                            @if ($blogtags->count())
                                <div class="blogtagsbox topmargin20">

                                    <h6>
                                        Tags
                                    </h6>

                                    <div class="blogsidebartagsarea">

                                        @foreach ($blogtags as $tag)
                                            <div class="blogsidebartags">

                                                <a href="{{ route('blog.tag', $tag->page_slug) }}">

                                                    {{ $tag->name }}

                                                </a>

                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </section>

        </div>
    </main>

@endsection
