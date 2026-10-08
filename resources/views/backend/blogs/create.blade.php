@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="card-style mt-20">

                    <!-- Title & Page Title -->
                    <div class="row">

                        <!-- Title -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Blog Title <span class="mandatory">*</span></label>
                                <input type="text" name="title" placeholder="Blog Title" id="model_name" data-model=""
                                    value="{{ old('title') }}" required />
                            </div>
                        </div>

                        <!-- Page Slug -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_slug">Meta Slug <span class="mandatory">*</span></label>
                                <input type="text" id="page_slug" data-model="" name="page_slug" placeholder="Meta Slug"
                                    value="{{ old('page_slug') }}" />
                            </div>
                        </div>



                    </div>

                    <!-- Page Slug & Page Url -->
                    <div class="row">

                        <!-- Page Title -->
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label for="page_title">Meta Title <span class="mandatory">*</span></label>
                                <input type="text" id="page_title" name="page_title" placeholder="Meta Title"
                                    value="{{ old('page_title') }}" required />
                            </div>
                        </div>

                        <!-- Page Url -->
                        {{-- <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_url">Meta URL</label>
                                <input type="url" id="page_url" name="page_url" placeholder="Meta URL"
                                    value="{{ old('page_url') }}" readonly />
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
                                        value="{{ old('blog_date') }}" style="padding-right: 40px;">

                                    <i class="lni lni-calendar"
                                        style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Category -->
                        <div class="col-sm-4">
                            <div class="select-style-1">
                                <label>Blog Category <span class="mandatory"> *</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox selectCategory" id="actionDropdown" name="blog_category_id"
                                        required>

                                        <option value="">Select</option>

                                        <?php foreach ($blogCategories as $key => $blogCategory) { ?>
                                        <option value="{{ $blogCategory->id }}"
                                            {{ old('blog_category_id') == $blogCategory->id ? 'selected' : '' }}>
                                            {{ $blogCategory->name }}
                                        </option>
                                        <?php } ?>

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

                                        <?php foreach ($blogTagList as $blogTagId => $blogTag) { ?>
                                        <option value="{{ $blogTagId }}"
                                            {{ in_array($blogTagId, old('blogtags', [])) ? 'selected' : '' }}>
                                            {{ $blogTag }}
                                        </option>
                                        <?php } ?>

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
                                <textarea name="description" rows="5" class="rich-editor">{{ old('description') }}</textarea>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Meta Description -->
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Meta Description</label>
                                <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Image & Status -->
                    <div class="row">

                        <!-- Image -->
                        <div class="col-sm-4">
                            <label>Blog Image <span class="mandatory"> *</span></label>

                            <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                alt="Selected Image">

                            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)"
                                accept="image/jpeg,image/jpg,image/png,image/webp">

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
                                    {{ old('active', 0) == 1 ? 'checked' : '' }}>
                                Active
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active', 0) == 0 ? 'checked' : '' }}>
                                Inactive
                            </label>
                        </div>

                    </div>

                    <hr>

                    <!-- Save Button -->
                    <div class="row">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Save Blog
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
