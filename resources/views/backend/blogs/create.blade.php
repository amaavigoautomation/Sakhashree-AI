@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">

                    @csrf
                    <div class="row mt-15">
                        <!-- Blog Date -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Date <span class="mandatory">*</span></label>
                                <input type="text" name="blog_date" id="datepicker" class="date">
                            </div>
                        </div>

                        <!-- Blog Author -->
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Authors <span class="mandatory"> *</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="actionDropdown" name="blog_author_id" required>
                                        <option value="">Select Author</option>
                                        <?php
                                        foreach ($blogAuthorList as $blogAuthorId => $blogAuthor){

                                    ?>
                                        <option value="{{ $blogAuthorId }}">{{ $blogAuthor }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Category <span class="mandatory"> *</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox selectCategory" id="actionDropdown" name="blog_category_id"
                                        required>
                                        <option value="">Select Category</option>
                                        <?php
                                foreach ($blogCategories as $key => $blogCategory){
                            ?>
                                        <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Blog Tags</label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="actionDropdown" name="blogtags[]" multiple="true">
                                        <option value="">Select Blog</option>
                                        <?php
                            foreach ($blogTagList as $blogTagId => $blogTag){
                            ?>
                                        <option value="{{ $blogTagId }}">{{ $blogTag }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Title <span class="mandatory">*</span></label>
                                <input type="text" name="title" placeholder="Title" id="model_name" data-model=""
                                    required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_title">Page Title</label>
                                <input type="text" id="page_title" name="page_title" placeholder="Page Title" required />
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_slug">Page Slug <span class="mandatory">*</span></label>
                                <input type="text" id="page_slug" data-model="" name="page_slug" placeholder="Page Slug"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_url">Page Url</label>
                                <input type="url" id="page_url" name="page_url" placeholder="Page URL" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Meta Description</label>
                                <textarea rows="5" name="meta_description" placeholder="Meta Description"></textarea>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Description</label>
                                <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
                                <textarea name="description" rows="10" class="rich-editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <label>Image</label>
                            <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                alt="Selected Image">
                            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
                            {{-- <p>Width: 850 x Height: 480</p> --}}
                        </div>

                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Active</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="active" class="radio-inline" value="1"> Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="active" class="radio-inline" value="0"
                                            checked> No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="row mt-15">
                            <div class="col-sm-3">
                                <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                            </div>
                        </div>

                    </div>
            </form>
    </section>
@endsection
