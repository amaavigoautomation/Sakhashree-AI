@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            <!-- Breadcrumb -->
            @include('partials.breadcrumb')

            <div class="card-style mt-20">



                <form action="{{ route('testimonials_videos.update', ['testimonials_video' => $testimonialVideo->id]) }}"
                    enctype="multipart/form-data" method="POST">

                    @csrf
                    @method('PUT')

                    <!-- First Row -->
                    <div class="row">

                        <!-- Name -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ old('name', $testimonialVideo->name) }}"
                                    placeholder="Enter Testimonial Video name">
                            </div>
                        </div>

                        <!-- Designation -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Designation</label>
                                <input type="text" name="designation"
                                    value="{{ old('designation', $testimonialVideo->designation) }}">
                            </div>
                        </div>

                        <!-- Video Link -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Video Link</label>
                                <input type="text" name="video_link"
                                    value="{{ old('video_link', $testimonialVideo->video_link) }}">
                            </div>
                        </div>

                    </div>

<hr>
                    <!-- Second Row -->
                    <div class="row mt-15">

                        <!-- Image -->
                        <div class="col-sm-3">
                            <label>Image</label>

                            <div>
                                <img id="selectedImage" class="addedImage"
                                    src="{{ $testimonialVideo->image
                                        ? asset('public/images/testimonials_video/' . $testimonialVideo->id . '/' . $testimonialVideo->image)
                                        : asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>

                            <input type="file" name="image" id="imageInput" onchange="displayImage(this)">

                            <span id="iconImage">{{ $testimonialVideo->image }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label>Facial Image</label>
                            <div>
                                <img id="selectedImage" class="addedImage"
                                    src="{{ $testimonialVideo->facial_image
                                        ? asset('public/images/testimonials_video_faces/' . $testimonialVideo->id . '/' . $testimonialVideo->facial_image)
                                        : asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>
                            <input type="file" name="facial_image" id="imageInput" onchange="displayImage(this)">
                            <span id="iconImage">{{ $testimonialVideo->facial_image }}</span>
                        </div>


                        <!-- Active Status -->
                        <div class="col-sm-6">

                            <label>Active</label>
                            <br>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ old('active', $testimonialVideo->active) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ old('active', $testimonialVideo->active) == 0 ? 'checked' : '' }}>
                                No
                            </label>

                        </div>

                    </div>
<hr>


                    <!-- Buttons -->
                    <div class="row mt-15">

                        <div class="col-sm-3">

                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Update
                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </section>
@endsection
