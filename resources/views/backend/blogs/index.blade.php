@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('blogs.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>

            <!--Add new section start here-->
            <div class="card-style mt-20">
                <div class="accordion" id="filterAccordion">
                    <div class="accordion-item">
                        @php
                            $show = !empty(request()->all()) ? 'show' : '';
                        @endphp
                        <h2 class="accordion-header" id="headingFilter">
                            <button class="accordion-button {{ $show ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFilter"
                                aria-expanded="{{ $show ? 'true' : 'false' }}" aria-controls="collapseFilter">
                                <i class="lni lni-search-alt"></i>&nbsp;&nbsp;Search..
                            </button>
                        </h2>
                        <div id="collapseFilter" class="accordion-collapse collapse {{ $show }}"
                            aria-labelledby="headingFilter" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">


                                <form method="GET" action="{{ route('blogs.index') }}">
                                    <div class="row">
                                        {{-- <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="blog_author_id">Author Name</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="blog_author_id" name="blog_author_id"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($authors as $author)
                                                            <option value="{{ $author->id }}"
                                                                {{ request('blog_author_id') == $author->id ? 'selected' : '' }}>
                                                                {{ $author->author_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="blog_category_id">Category Name</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="blog_category_id" name="blog_category_id"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($blogCategories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ request('blog_category_id') == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="name">Title</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="blog" name="id"
                                                        onchange="this.form.submit()">
                                                        <option value="">All</option>
                                                        @foreach ($title as $titleId => $title)
                                                            <option value="{{ $titleId }}"
                                                                {{ request('id') == $titleId ? 'selected' : '' }}>
                                                                {{ $title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="select-style-1">
                                                <label for="status">Status</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="status" name="status"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($statuses as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ request('status') == $key ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <a href="{{ route('blogs.index') }}">
                                                <button type="button" class="main-btn primary-btn btn-hover btn-xs"
                                                    style="margin-top:28px">Reset</button>
                                            </a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <hr>
                    <div class="table-wrapper table-responsive mt-10">
                        <table class="table striped-table">
                            <thead>
                                <tr>
                                    {{-- <th class="col-sm-2">
                                        <h6>Image</h6>
                                    </th> --}}
                                    <th class="col-sm-2">
                                        <h6>Category</h6>
                                    </th>
                                    <th>
                                        <h6>Title</h6>
                                    </th>
                                    <th class="text-left">
                                        <h6>Status</h6>
                                    </th>
                                    <th class="text-center">
                                        <h6>Action</h6>
                                    </th>
                                </tr>
                                <!-- end table row-->
                            </thead>
                            <tbody>



                                @foreach ($blogs as $blog)
                                    <tr>
                                        {{-- <td>
                                            <p> @php
                                                $firstImage = $blog->image_file;
                                                $id = $blog->id;
                                                $imagePath = $firstImage
                                                    ? asset("public/images/blog/image_file/{$id}/{$firstImage}")
                                                    : null;
                                            @endphp

                                                @if (!empty($imagePath))
                                                    <img src="{{ $imagePath }}" id="imageBox">
                                                @endif
                                            </p>
                                        </td> --}}
                                        <td>
                                            <p>{{ !empty($blog->blogcategory->name) ? $blog->blogcategory->name : '---' }}
                                            </p>
                                        </td>
                                        <td>
                                            <p> {{ $blog->title }} </p>
                                        </td>
                                        <td>
                                            @php
                                                $active = $blog->active;
                                                $checked = $active == 1 ? 'checked' : '';
                                            @endphp
                                            <input type="checkbox" id="toggle-{{ $blog->id }}"
                                                class="status-checkbox toggle-checkbox" data-id="{{ $blog->id }}"
                                                data-model="Blog" {{ $checked }}>
                                            <label for="toggle-{{ $blog->id }}" class="toggle-label">
                                                <span class="toggle-slider"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('blogs.edit', $blog->id) }}" class="me-2">
                                                <i class="lni lni-pencil-alt"></i>
                                            </a>

                                            <a href="{{ route('blogs.show', $blog->id) }}">
                                                <i class="lni lni-list"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            @include('partials.pagination', ['items' => $blogs])
    </section>
@endsection
