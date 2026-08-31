@extends('layouts.frontend')

@section('content')
    <div class="maincontarea">

        <section class="breadcrumbarea">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        {{-- Home --}}
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>

                        {{-- Blogs --}}
                        <li class="breadcrumb-item">
                            <a href="{{ route('blogs') }}">Blogs</a>
                        </li>

                        {{-- Tag Page --}}
                        @if (request()->routeIs('blog.tag'))
                            <li class="breadcrumb-item active">
                                Blog Tags
                            </li>
                        @endif

                        {{-- Blog Detail --}}
                        @if (request()->routeIs('blog_detail'))
                            <li class="breadcrumb-item active">
                                {{ $blog->title ?? '' }}
                            </li>
                        @endif

                    </ol>
                </nav>
            </div>
        </section>


        <!-- Middle section start -->
        <section class="middlecontarea">
            <div class="container">
                <div class="row">

                    {{-- LEFT SIDE --}}
                    <div class="col-lg-9">

                        <div class="blogdetheading">
                            {{ $blog->title ?? '' }}
                        </div>

                        <div class="blogsdatetext topmargin10">
                            By {{ $blog->blogauthor->author_name ?? 'Admin' }} |
                            {{ date('d M Y', strtotime($blog->blog_date)) }}
                        </div>

                        <div class="blogdetimg">
                            @php
                                $imageFile = $blog->image_file;
                                $imagePath = $imageFile
                                    ? asset("public/images/blog/image_file/{$blog->id}/{$imageFile}")
                                    : asset('dist/images/no-image.png');
                            @endphp
                            <img src="{{ $imagePath }}">
                        </div>

                        <div class="blogdetinfotext">
                            {!! $blog->description !!}
                        </div>

                        {{-- AUTHOR --}}
                        <div class="blogdetadminarea">
                            @php
                                $author = $blog->blogauthor;
                                $authorImage = $author->author_image ?? null;
                                $authorImagePath = $authorImage
                                    ? asset("public/images/blog_author/author_image/{$author->id}/{$authorImage}")
                                    : asset('dist/img/no-image.png');
                            @endphp

                            <div class="blogadminimg">
                                <img src="{{ $authorImagePath }}">
                            </div>

                            <div class="blogadmintext">
                                <span>{{ $author->author_name ?? 'Admin' }}</span><br>
                                {{ $author->note ?? '' }}
                            </div>
                        </div>

                    </div>


                    {{-- RIGHT SIDEBAR --}}
                    <div class="col-lg-3 rowmargintabmob30">

                        {{-- SEARCH --}}
                        <div class="searcfieldarea">
                            <div class="fieldicon">
                                <img src="{{ asset('dist/img/search_icon.svg') }}">
                            </div>
                            <input type="text" class="form-control" placeholder="Search.." id="search_blogs">
                        </div>
                        <div id="blog_results"></div>

                        {{-- OTHER BLOGS --}}
                        @if (!empty($otherBlogs) && $otherBlogs->count() >= 3)
                            <div class="blogsrightbox">
                                <h4>Explore More Topics</h4>

                                <div class="blogsrightboxtext">
                                    <ul>
                                        @foreach ($otherBlogs as $blog)
                                            <li>
                                                <a href="{{ route('blog_detail', $blog->page_slug) }}">
                                                    {{ $blog->title ?? '' }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        {{-- TAGS --}}
                        @if ($blogtags->count() >= 3)
                            <div class="blogsrightbox">
                                <h4>Tags</h4>

                                <div class="blogstagsarea">
                                    @foreach ($blogtags as $tag)
                                        <div class="blogstags">
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


                {{-- RELATED BLOGS --}}
                <div class="topmargin40">
                    <div class="mainheading">
                        <h4>Related Blogs</h4>
                    </div>

                    <div class="row">
                        @if (!empty($otherBlogs) && $otherBlogs->count())
                            @foreach ($relatedBlogs as $related)
                                <div class="col-lg-3 col-md-6">
                                    <div class="blogsboxinnerarea">
                                        <a href="{{ route('blog_detail', $related->page_slug) }}">
                                            <div class="blogsboxinner">

                                                @php
                                                    $img = $related->image_file
                                                        ? asset(
                                                            "public/images/blog/image_file/{$related->id}/{$related->image_file}",
                                                        )
                                                        : asset('dist/no-image.png');
                                                @endphp

                                                <div class="blogsboxinnerimg">
                                                    <img src="{{ $img }}">
                                                </div>

                                                <div class="blogsboxinnercontarea">
                                                    <div class="blogsdatetext">
                                                        <em>
                                                            By {{ $related->blogauthor->author_name ?? 'Admin' }} |
                                                            {{ date('d M Y', strtotime($related->blog_date)) }}
                                                        </em>
                                                    </div>

                                                    <div class="relatedblogtitle">
                                                        <h5>{{ $related->title }}</h5>
                                                    </div>

                                                    <div class="topmargin30">
                                                        <button class="blogreadmore">Read More</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>

            </div>
        </section>
        <!-- Middle section end -->
    </div>
@endsection
