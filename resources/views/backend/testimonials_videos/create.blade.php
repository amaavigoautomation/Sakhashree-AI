@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            <!-- Breadcrumb -->
            @include('partials.breadcrumb')

            <div class="card-style mt-20">

                <h4 class="mb-20">Create Testimonial Video</h4>


                <form action="{{ route('testimonials_videos.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <!-- First Row -->
                    <div class="row">

                        <!-- Name -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name</label>

                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter name">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Designation -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Designation</label>

                                <input type="text" name="designation" value="{{ old('designation') }}"
                                    placeholder="Enter designation">

                                @error('designation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Video Link -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Video Link</label>

                                <input type="text" name="video_link" value="{{ old('video_link') }}"
                                    placeholder="Enter video link">

                                @error('video_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>


                    <!-- Second Row -->
                    <div class="row mt-15">

                        <!-- Image -->
                        <div class="col-sm-3">
                            <label>Image</label>

                            <div>
                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>

                            <input type="file" name="image" id="imageInput" accept=".jpg,.jpeg,.png,.svg,.webp"
                                onchange="displayImage(this)">

                            <span id="iconImage"></span>

                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label>Facial Image</label>

                            <div>
                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>

                            <input type="file" name="facial_image" id="imageInput" accept=".jpg,.jpeg,.png,.svg,.webp"
                                onchange="displayImage(this)">

                            <span id="iconImage"></span>

                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Active -->
                        <div class="col-sm-6">

                            <label>Active</label>
                            <br>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ old('active', 1) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active') === '0' ? 'checked' : '' }}>
                                No
                            </label>

                            @error('active')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>


                    <!-- Buttons -->
                    <div class="row mt-15">

                        <div class="col-sm-3">

                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Save
                            </button>

                            <a href="{{ route('testimonials_videos.index') }}" class="main-btn light-btn btn-hover btn-xs">
                                Cancel
                            </a>

                        </div>

                    </div>

                </form>



            </div>

        </div>

    </section>
@endsection
