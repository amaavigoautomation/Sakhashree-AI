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
                                <li class="breadcrumb-item active" aria-current="page">
                                    Blogs
                                </li>
                            </ol>
                        </nav>
                    </div>

                    {{-- Heading --}}
                    <div class="mainheading topmargin5">
                        <h1 class="text-uppercase">
                            <span class="second-color">Discover</span><br>
                            Blogs & Articles
                        </h1>
                    </div>

                    <div class="innercolinfotext">
                        Curated articles blending sacred chakra knowledge with modern spiritual
                        <br class="hidemob">
                        science to support emotional healing, energetic clarity, and conscious living.
                    </div>

                    {{-- Search --}}
                    <div class="row topmargin30">
                        <div class="col-lg-5 col-md-7">
                            <form action="{{ route('blogs') }}" method="GET">
                                <div class="d-flex gap-3">
                                    <div class="flex-grow-1">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Find articles..." value="{{ request('search') }}">
                                    </div>

                                    <div>
                                        <button type="submit" class="primarybtn btnmd">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Main Content --}}
                    <div class="row topmargin40">

                        {{-- Blogs --}}
                        <div class="col-lg-9">
                            <div class="innercontrightmar">

                                <div class="row">

                                    @forelse ($blogs as $blog)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="wrvbcardarea">

                                                <a href="{{ route('blog_detail', $blog->page_slug) }}">

                                                    <div class="wrvbcard">

                                                        {{-- Blog Image --}}
                                                        <div class="wrvbcardimg">
                                                            <img src="{{ $blog->image_file
                                                                ? asset('public/images/blog/image_file/' . $blog->id . '/' . $blog->image_file)
                                                                : asset('dist/images/no-image.png') }}"
                                                                alt="{{ $blog->title }}">
                                                        </div>

                                                        {{-- Blog Content --}}
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

                                    @empty

                                        <div class="col-12">
                                            <p>No blogs found.</p>
                                        </div>
                                    @endforelse

                                </div>

                                {{-- Pagination --}}
                                @if ($blogs->hasPages())
                                    <div class="topmargin30">
                                        {{ $blogs->withQueryString()->links() }}
                                    </div>
                                @endif

                            </div>
                        </div>

                        {{-- Sidebar --}}
                        <div class="col-lg-3 rowmargintabmob20">

                            {{-- Categories --}}
                            @if ($blogcategory->count())
                                <div class="sidebarheadarea">

                                    <div>
                                        <h5>Categories</h5>
                                    </div>

                                    <div class="d-flex align-items-center w-100">

                                        <div>
                                            <img src="{{ asset('dist/img/sidebarhead.svg') }}">
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

                                                <a href="{{ route('blog.category', $category->page_slug) }}">

                                                    <div class="d-flex align-items-center">

                                                        <div class="blogcatboximg">

                                                            @if (!empty($category->image_file))
                                                                <img
                                                                        src="{{ asset('public/images/blogcategories/image_file/' . $category->id . '/' . $category->image_file) }}"
                                                                        alt="{{ $category->name }}"
                                                                    >
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
                            @if ($blogs->count())
                                <div class="exploretopicsbox topmargin10">

                                    <h6>Explore More Topics</h6>

                                    <ul>

                                        @foreach ($blogs->take(4) as $topicBlog)
                                            <li>
                                                <a href="{{ route('blog_detail', $topicBlog->page_slug) }}">
                                                    {{ $topicBlog->title }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>
                            @endif


                            {{-- Tags --}}
                            @if ($blogtags->count())
                                <div class="blogtagsbox topmargin20">

                                    <h6>Tags</h6>

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
