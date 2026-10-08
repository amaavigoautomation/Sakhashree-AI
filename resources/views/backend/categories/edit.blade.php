@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('category.update', $categories->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-style mt-20">
                    <div class="row mt-15">
                        <div class="col-sm-2">
                            <div class="input-style-1">
                                <label>Order <span class="mandatory">*</span></label>
                                <input type="number" name="order" value="{{ $categories->order }}" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" value="{{ $categories->name }}" id="model_name"
                                    data-model="categories" placeholder="Enter Name" required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label for="page_slug">Page Slug <span class="mandatory">*</span></label>
                                <input type="text" id="page_slug" data-model="categories" name="page_slug"
                                    value="{{ $categories->page_slug }}" placeholder="Page Slug" />
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ $categories->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ $categories->active == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                    </div>
                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_url">Page Url</label>
                                <input type="url" id="page_url" name="page_url" value="{{ $categories->page_url }}"
                                    placeholder="Page URL" readonly />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_title">Page Title</label>
                                <input type="text" id="page_title" name="page_title"
                                    value="{{ $categories->page_title }}" placeholder="Page Title" required />
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Meta Description</label>
                                <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ $categories->meta_description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Description</label>
                                <textarea name="description" rows="5" class="rich-editor">{{ $categories->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <label>Cover Image</label>
                            <div id=""><img id="selectedImage" class="addedImage"
                                    src="{{ $categories->cover_image ? asset('public/images/categories/cover_image/' . $categories->id . '/' . $categories->cover_image) : asset('public/images/no-image.png') }}"
                                    alt="Selected Cover Image"></div>
                            <input type="file" name="cover_image" id="imageInput" onchange="displayImage(this)">
                            <span id="iconImage">{{ $categories->cover_image }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label>Thumnail Image</label>
                            <div id=""><img id="selectedImage" class="addedImage"
                                    src="{{ $categories->thumbnail_image ? asset('public/images/categories/thumbnail_image/' . $categories->id . '/' . $categories->thumbnail_image) : asset('public/images/no-image.png') }}"
                                    alt="Selected Cover Image"></div>
                            <input type="file" name="thumbnail_image" id="imageInput" onchange="displayImage(this)">
                            <span id="iconImage">{{ $categories->thumbnail_image }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label>Display on HomePage</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="display_on_homepage" value="1"
                                    {{ $categories->display_on_homepage == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="display_on_homepage" value="0"
                                    {{ $categories->display_on_homepage == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                    </div>

                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
