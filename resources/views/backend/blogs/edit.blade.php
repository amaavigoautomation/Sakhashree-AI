@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('blogs.update', ['blog' => $blog->id]) }}" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="card-style mt-20">

                    <!-- Id -->
                    <input type="hidden" name="id" value="{{ $blog->id }}" />

                    <!-- Title & Page Slug -->
                    <div class="row">

                        <!-- Title -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Blog Title <span class="mandatory">*</span></label>
                                <input type="text" name="title" placeholder="Blog Title" id="model_name"
                                    value="{{ old('title', $blog->title) }}" required />
                            </div>
                        </div>

                        <!-- Page Slug -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_slug">Meta Slug <span class="mandatory">*</span></label>
                                <input type="text" id="page_slug" data-model="" name="page_slug" placeholder="Meta Slug"
                                    value="{{ old('page_slug', $blog->page_slug) }}" />
                            </div>
                        </div>

                    </div>

                    <!-- Page Title -->
                    <div class="row">

                        <!-- Page Title -->
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label for="page_title">Meta Title <span class="mandatory">*</span></label>
                                <input type="text" id="page_title" name="page_title" placeholder="Meta Title"
                                    value="{{ old('page_title', $blog->page_title) }}" required />
                            </div>
                        </div>

                        <!-- Page Url -->
                        {{-- <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_url">Meta URL</label>
                                <input type="url" id="page_url" name="page_url" placeholder="Meta URL"
                                    value="{{ old('page_url', $blog->page_url) }}" readonly />
                            </div>
                        </div> --}}

                    </div>

                    <hr>

                    <!-- Date, Category & Tags -->
                    <div class="row">

                        <!-- Blog Date -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Blog Date <span class="mandatory">*</span></label>
                                <div style="position: relative;">
                                    <input type="text" name="blog_date" id="datepicker" class="date"
                                        value="{{ old('blog_date', $blog->blog_date) }}" style="padding-right: 40px;">

                                    <i class="lni lni-calendar"
                                        style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Author -->
                        {{-- <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Authors <span class="mandatory"> *</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="actionDropdown" name="blog_author_id" required>
                                        @if ($blogAuthor)
                                            <option value="{{ $blogAuthor->id }}">{{ $blogAuthor->author_name }}
                                            </option>
                                        @endif
                                        @foreach ($blogAuthors as $blogAuthor)
                                            <option value="{{ $blogAuthor->id }}">{{ $blogAuthor->author_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}

                        <!-- Blog Category -->
                        <div class="col-sm-4">
                            <div class="select-style-1">
                                <label>Blog Category <span class="mandatory"> *</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox selectCategory" id="actionDropdown" name="blog_category_id"
                                        required>

                                        <option value="">Select</option>

                                        @foreach ($blogCategories as $blogCategory)
                                            <option value="{{ $blogCategory->id }}"
                                                {{ old('blog_category_id', $blog->blog_category_id) == $blogCategory->id ? 'selected' : '' }}>
                                                {{ $blogCategory->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Tags -->
                        <div class="col-sm-4">
                            <div class="select-style-1">
                                <label>Blog Tags</label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="actionDropdown" name="blogtags[]" multiple="true">

                                        <option value="">Select</option>

                                        @foreach ($blogtags as $blogtag)
                                            <option value="{{ $blogtag->id }}"
                                                {{ in_array($blogtag->id, old('blogtags', $selectedBlogTags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $blogtag->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Description -->
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Blog Description</label>
                                <textarea name="description" rows="5" class="rich-editor">{{ old('description', $blog->description) }}</textarea>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Meta Description -->
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Meta Description</label>
                                <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ old('meta_description', $blog->meta_description) }}</textarea>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Image & Status -->
                    <div class="row">

                        <!-- Image -->
                        <div class="col-sm-4">
                            <label>Blog Image <span class="mandatory"> *</span></label>

                            <img id="selectedImage" class="addedImage"
                                src="{{ $blog->image_file ? asset('public/images/blog/image_file/' . $blog->id . '/' . $blog->image_file) : asset('dist/images/no-image.png') }}"
                                alt="Selected Image">

                            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)"
                                accept="image/jpeg,image/jpg,image/png,image/webp">

                            <span id="iconImage">{{ $blog->image_file }}</span>
                            {{-- <p>Width: 850 x Height: 480</p> --}}

                            <small class="text-muted d-block mt-2">
                                <strong>Maximum file size:</strong> 5 MB
                            </small>

                            <small class="text-muted d-block mt-2">
                                <strong>Image Requirements:</strong>
                                Width: 600px × Height: 400px
                            </small>
                        </div>

                        <!-- Active -->
                        <div class="col-sm-4">
                            <label>Status</label><br>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ old('active', $blog->active) == 1 ? 'checked' : '' }}>
                                Active
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active', $blog->active) == 0 ? 'checked' : '' }}>
                                Inactive
                            </label>

                            {{-- <div class="col-sm-4">
                                <label>Its Video Link</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="its_video_link" class="radio-inline its_video_link " value="1" {{ $blog->its_video_link == 1 ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="its_video_link" class="radio-inline its_video_link" value="0" {{ $blog->its_video_link == 0 ? 'checked' : '' }}> No
                                </label>
                            </div> --}}

                            {{-- <div class="row mt-2" id="videoLinkRow">
                                <div class="col-sm-12">
                                    <div class="input-style-1">
                                        <label>Video Link</label>
                                        <input type="url" id="video_link" name="video_link" placeholder="Video Link" value="{{ $blog->video_link }}" />
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                    </div>

                    <hr>

                    <!-- Update Button -->
                    <div class="row">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Update
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
