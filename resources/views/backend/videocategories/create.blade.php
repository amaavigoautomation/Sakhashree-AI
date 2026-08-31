@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <form method="POST" action="{{ route('videocategories.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    <!-- Form Start Here -->
                    @csrf
                    <div class="row mt-15">
                        <!-- Order -->
                        <div class="col-sm-1">
                            <div class="input-style-1">
                                <label>Order <span class="mandatory">*</span></label>
                                <input type="number" name="order" placeholder="Enter order" required="true" />
                            </div>
                        </div>
                        <!-- Name -->
                        <div class="col-sm-2">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Enter name" id="model_name" data-model="videos" required="true" />
                            </div>
                        </div>
                        <!-- Category Class -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Category Class <span class="mandatory">*</span></label>
                                <input type="text" name="category_class" placeholder="Enter category" required="true" />
                            </div>
                        </div>
                        <!-- Page Title -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_title">Page Title</label>
                                <input type="text" id="page_title" name="page_title" placeholder="Page Title" required />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label for="page_slug">Page Slug </label>
                                <input type="text" id="page_slug" name="page_slug" placeholder="Page Slug" />
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-style-1">
                                <label for="page_url">Page Url</label>
                                <input type="url" id="page_url" name="page_url" placeholder="Page URL" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Meta Description</label>
                                <textarea rows="4" name="meta_description" placeholder="Enter meta description"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-2">
                            <label>Image</label>
                             <div id=""><img id="selectedImage"  class="addedImage" src="{{ asset('public/images/no-image.png') }}" alt="Selected Image"></div>
                             <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
                        </div>

                        <div class="col-sm-4">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" checked> No
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
    </section>
@endsection

