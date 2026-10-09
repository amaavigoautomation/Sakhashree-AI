@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('blogcategories.update', ['blogcategory' => $blogcategory->id]) }}"
                enctype="multipart/form-data">
                <div class="card-style mt-20">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="id" value="{{ $blogcategory->id }}" />

                    <div class="row mt-15">
                        {{-- <div class="col-sm-2">
                            <div class="input-style-1">
                                <label>Order <span class="mandatory">*</span></label>
                                <input type="number" name="order" value="{{ $blogcategory->order }}" />
                            </div>
                        </div> --}}

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Enter Name" id="model_name"
                                    data-model="blog" required value="{{ $blogcategory->name }}" />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Meta Title <span class="mandatory">*</span></label>
                                <input type="text" id="page_title" name="page_title" placeholder="Enter Meta Title"
                                    required value="{{ $blogcategory->page_title }}" />
                            </div>
                        </div>

                        <div class="col-sm-4">

                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ old('active', $blogcategory->active) == 1 ? 'checked' : '' }}>
                                Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ old('active', $blogcategory->active) == 0 ? 'checked' : '' }}>
                                Inactive
                            </label>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Meta Slug</label>
                                <input type="text" id="page_slug" data-model="blog" name="page_slug"
                                    placeholder="Enter Meta Slug" value="{{ $blogcategory->page_slug }}" />
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="input-style-1">
                                <label>Meta URL</label>
                                <input type="text" id="page_url" name="page_url" placeholder="Page Url" readonly
                                    value="{{ $blogcategory->page_url }}" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Meta Description</label>
                                <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ $blogcategory->meta_description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-4">
                            <label>category Image</label>
                            <img id="selectedImage" class="addedImage"
                                src="{{ $blogcategory->image_file ? asset('public/images/blogcategories/image_file/' . $blogcategory->id . '/' . $blogcategory->image_file) : asset('dist/images/no-image.png') }}"
                                alt="Selected Image">

                            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)"
                                accept="image/jpeg,image/jpg,image/png,image/webp">

                            <span id="iconImage">{{ $blogcategory->image_file }}</span>

                            <small class="text-muted d-block mt-2">
                                <strong>Maximum file size:</strong> 5 MB
                            </small>

                            <small class="text-muted d-block mt-2">
                                <strong>Image Requirements:</strong>
                                Width: 600px × Height: 400px
                            </small>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Update</button>
                        </div>
                    </div>

                </div>
            </form>
    </section>
@endsection
