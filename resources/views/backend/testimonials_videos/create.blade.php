@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            <!-- Breadcrumb -->
            @include('partials.breadcrumb')

            <div class="card-style mt-20">

                <form action="{{ route('testimonials_videos.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <!-- Name, Profession & Video Link -->
                    <div class="row">

                        <!-- Name -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>

                                <input type="text" name="name" value="{{ old('name') }}" required
                                    placeholder="Enter name">
                            </div>
                        </div>

                        <!-- Designation -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Profession <span class="mandatory">*</span></label>

                                <input type="text" name="designation" value="{{ old('designation') }}" required
                                    placeholder="Enter Profession">
                            </div>
                        </div>

                        <!-- Video Link -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Video Link <span class="mandatory">*</span></label>

                                <input type="text" name="video_link" value="{{ old('video_link') }}" required
                                    placeholder="Enter video link">
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Images & Status -->
                    <div class="row">

                        <!-- Testimonial Image -->
                        <div class="col-sm-4">
                            <label>Testimonial Image</label>

                            <div>
                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>

                            <input type="file" name="image" id="imageInput" accept=".jpg,.jpeg,.png,.svg,.webp"
                                onchange="displayImage(this)">

                            <span id="iconImage"></span>

                            <small class="text-muted d-block mt-2">
                                <strong>Maximum file size:</strong> 5 MB
                            </small>

                            <small class="text-muted d-block mt-2">
                                <strong>Image Requirements:</strong><br>
                                Width: 600px × Height: 350px
                            </small>
                        </div>


                        <!-- Homepage Image -->
                        <div class="col-sm-4">
                            <label>Homepage Image</label>

                            <div>
                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>

                            <input type="file" name="facial_image" id="imageInput" accept=".jpg,.jpeg,.png,.svg,.webp"
                                onchange="displayImage(this)">

                            <span id="iconImage"></span>

                            <small class="text-muted d-block mt-2">
                                <strong>Maximum file size:</strong> 5 MB
                            </small>

                            <small class="text-muted d-block mt-2">
                                <strong>Image Requirements:</strong><br>
                                Width: 250px × Height: 300px
                            </small>
                        </div>

                        <!-- Active -->
                        <div class="col-sm-4">
                            <label>Status</label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ old('active', 1) == 1 ? 'checked' : '' }}>
                                Active
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active') === '0' ? 'checked' : '' }}>
                                Inactive
                            </label>
                        </div>

                    </div>

                    <hr>

                    <!-- Save Button -->
                    <div class="row">

                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Save
                            </button>
                        </div>

                    </div>

                </form>

            </div>

        </div>

    </section>
@endsection
