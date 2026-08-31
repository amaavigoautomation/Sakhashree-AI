@extends('layouts.frontend')

@section('content')
    <div class="maincontarea">
        <!-- Breadcrumb section start -->
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
        <!-- Breadcrumb section end -->

        <!-- Middle section start -->
        <section class="middlecontarea">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">

                        {{-- Blog Dynamic Start --}}
                        @if (!empty($blogs) && count($blogs) > 0)
                            <?php foreach ($blogs as $blog) {
                                $imageFile = $blog->image_file ?? '';
                                $imagePath = ($imageFile)
                                    ? asset("public/images/blog/image_file/{$blog->id}/{$imageFile}")
                                    : asset("dist/images/no-image.png");
                            ?>

                            <div class="blogsboxinnerarea">
                                <a href="{{ route('blog_detail', $blog->page_slug ?? '') }}">
                                    <div class="blogsboxinner">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="blogsboxinnerimg">
                                                    <img src="{{ $imagePath }}" alt="{{ $blog->title ?? '' }}">
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="blogsboxinnercontarea">

                                                    <h5>{{ $blog->title ?? '' }}</h5>

                                                    <div class="blogsdatetext">
                                                        <em>
                                                            By {{ $blog->blogauthor->author_name ?? 'Unknown' }} |
                                                            <?php echo date_format(date_create($blog->blog_date), 'F j, Y'); ?>
                                                        </em>
                                                    </div>

                                                    <div class="blogstextinner topmargin15">
                                                        <?php echo substr(strip_tags($blog->description ?? ''), 0, 120); ?>
                                                    </div>

                                                    <div class="topmargin30">
                                                        <button class="blogreadmore">Read More</button>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>

                            <?php } ?>
                        @endif
                        {{-- Blog Dynamic End --}}

                        <!-- Blog Pagination section start -->
                        @include('partials.pagination', ['items' => $blogs])
                        <!-- Blog Pagination section end -->
                    </div>

                    {{-- Blog Side Bar --}}
                    <div class="col-lg-3 rowmargintabmob30">
                        {{-- Search Field --}}
                        <div class="searcfieldarea">
                            <div class="fieldicon">
                                <img src="{{ asset('dist/img/search_icon.svg') }}">
                            </div>
                            <input type="text" class="form-control" placeholder="Search.." id="search_blogs">
                        </div>
                        <div id="blog_results"></div>

                        {{-- Search Field End --}}

                        {{-- Blog Other Blogs Start --}}
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
                        {{-- Blog Other Blogs End --}}

                        {{-- Blog Tags Start --}}
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
                        {{-- Blog Tags End --}}

                    </div>
                </div>
            </div>
        </section>
        <!-- Middle section end -->
    </div>
@endsection
