@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <form method="POST" action="{{ route('blogauthors.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">

                    @csrf
                    <div class="row mt-15">

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Author Name <span class="mandatory">*</span></label>
                                <input type="text" name="author_name" id="model_name" data-model="BlogAuthor"
                                    placeholder="Enter Author Name" value="{{ old('author_name') }}" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label for="page_slug">Page Slug </label>
                                <input type="text" id="page_slug" data-model="BlogAuthor" name="page_slug" placeholder="Page Slug" value="{{ old('page_slug') }}" />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" {{ old('active') == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" {{ old('active') == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                    </div>

                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_title">Page Title <span class="mandatory">*</span></label>
                                <input type="text" id="page_title" name="page_title" placeholder="Page Title" value="{{ old('page_title') }}" required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_url">Page Url</label>
                                <input type="url" id="page_url" data-model="blog-authors" name="page_url"
                                    placeholder="Page URL" value="{{ old('page_url') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Meta Description</label>
                                <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Meta Keyword</label>
                                <textarea rows="5" name="meta_keyword" placeholder="Meta Keyword">{{ old('meta_keyword') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Note</label>
                                <textarea rows="5" name="note" placeholder="Enter Note">{{ old('note') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-2">
                            <label>Image</label>
                            <div id="">
                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>
                            <input type="file" name="author_image" id="imageInput" onchange="displayImage(this)">
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </section>
@endsection

