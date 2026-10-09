@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <!-- For Start Here -->
            <form method="POST" action="{{ route('blogcategories.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    <!-- Form Start Here -->
                    @csrf
                    <div class="row mt-15">
                        <!-- Order -->
                        {{-- <div class="col-sm-2">
            <div class="input-style-1">
                <label>Order <span class="mandatory">*</span></label>
                <input type="number" name="order" placeholder="Enter Order" required />
            </div>
         </div> --}}
                        <!-- Name -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Enter Name" id="model_name"
                                    data-model="blog" required />
                            </div>
                        </div>

                        <!-- Page Title -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Meta Title <span class="mandatory">*</span></label>
                                <input type="text" id="page_title" name="page_title" placeholder="Enter Meta Title"
                                    required />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <!-- Active Code -->
                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" checked> Inactive
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <!-- Page Slug -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Meta Slug</label>
                                <input type="text" id="page_slug" name="page_slug" placeholder="Enter Meta Slug"
                                    data-model="blog" />
                            </div>
                        </div>

                        <!-- Page Url -->
                        <div class="col-sm-8">
                            <div class="input-style-1">
                                <label>Meta Url</label>
                                <input type="text" id="page_url" name="page_url" placeholder="Meta Url" readonly />
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <!-- Meta Description -->
                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Meta Description</label>
                                    <textarea rows="5" name="meta_description" placeholder="Meta Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>

                        <div class="row mt-15">
                            <div class="col-sm-3">
                                <label>Image File</label>

                                <div id="">
                                    <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                        alt="Selected Image">
                                </div>

                                <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)"
                                    accept="image/jpeg,image/jpg,image/png,image/webp">

                                <span id="iconImage"></span>

                                <small class="text-muted d-block mt-2">
                                    <strong>Maximum file size:</strong> 5 MB
                                </small>

                                <small class="text-muted d-block mt-2">
                                    <strong>Image Requirements:</strong>
                                    Width: 600px × Height: 400px
                                </small>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                            {{-- <button class="btn btn-warning" type="reset">Reset</button> --}}
                        </div>
                    </div>
                </div>
        </div>
        </form>
    @endsection
