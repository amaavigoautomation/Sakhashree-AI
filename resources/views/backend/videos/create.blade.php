@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('videos.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-style mt-20">

                    <!-- Order + Title -->
                    <div class="row mt-15">
                        <div class="col-sm-2">
                            <div class="input-style-1">
                                <label>Order <span class="mandatory">*</span></label>
                                <input type="number" name="order" placeholder="Enter order" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Title <span class="mandatory">*</span></label>
                                <input type="text" name="title" placeholder="Enter title" required>
                            </div>
                        </div>

                        {{-- <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Profession</label>
                                <input type="text" name="profession" placeholder="Enter profession">
                            </div>
                        </div> --}}

                        <!-- Active -->
                        <div class="col-sm-2">
                            <label>Active</label><br>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"> Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="0" checked> No
                            </label>
                        </div>
                    </div>

                    <hr>

                    <!-- Description -->
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Description</label>
                                <textarea rows="6" name="description" class="rich-editor" placeholder="Enter description"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Video Link -->
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Video Link <span class="mandatory">*</span></label>
                                <input type="url" name="video_link" placeholder="Enter Video Link" required>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Image -->
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <label>Image</label>
                            <img id="selectedImage" class="addedImage" src="{{ asset('public/images/no-image.png') }}"
                                alt="Selected Image">

                            <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
                        </div>
                    </div>

                    <hr>

                    <!-- Submit -->
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Save
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </section>
@endsection
