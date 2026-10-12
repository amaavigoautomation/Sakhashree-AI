@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <div class="card-style mt-20">

                <form method="POST" action="{{ route('news_listing.store') }}" enctype="multipart/form-data">

                    @csrf

                    <!-- Title -->
                    <div class="row">

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>News Title <span class="mandatory">*</span></label>
                                <input type="text" name="title" placeholder="Enter News Title"
                                    value="{{ old('title') }}" required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ old('active', 1) == 1 ? 'checked' : '' }}>
                                Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ old('active', 1) == 0 ? 'checked' : '' }}>
                                Inactive
                            </label>
                        </div>

                    </div>

                    <hr>

                    <!-- Description -->
                    <div class="row">

                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label>News Description</label>
                                <textarea name="description" rows="5" class="rich-editor" placeholder="Enter News Description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Has Video -->
                    <div class="row">

                        <div class="col-sm-3">
                            <label>Video Available</label><br>

                            <label class="radio-inline">
                                <input type="radio" name="has_video" value="1"
                                    {{ old('has_video', 0) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="has_video" value="0"
                                    {{ old('has_video', 0) == 0 ? 'checked' : '' }}>
                                No
                            </label>
                        </div>

                    </div>

                    <hr>

                    <!-- Video Link & Image -->
                    <div class="row">

                        {{-- Video Link --}}
                        <div class="col-md-6" id="videoLinkField" style="display: none;">
                            <div class="input-style-1">
                                <label>Video Link</label>
                                <input type="text" name="video_link" placeholder="Enter Embedded Video Link"
                                    value="{{ old('video_link') }}">
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="col-md-4" id="imageField">
                            <div class="input-style-1">
                                <label>News Image</label>
                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                                <input type="file" name="image_file" id="imageInput" accept="image/*"
                                    onchange="displayImage(this)">
                                <small class="text-muted d-block mt-2">
                                    <strong>Maximum file size:</strong> 5 MB
                                </small>
                                <small class="text-muted d-block mt-2">
                                    <strong>Image Requirements:</strong><br>
                                    News Page — Width: 600px × Height: 400px<br>
                                    News Details Page — Width: 800px × Height: 600px
                                </small>
                            </div>
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
    <script>
        $(document).ready(function() {

            function toggleMediaFields() {
                let hasVideo = $('input[name="has_video"]:checked').val();

                if (hasVideo == '1') {
                    $('#videoLinkField').show();
                    $('#imageField').hide();
                } else {
                    $('#videoLinkField').hide();
                    $('#imageField').show();
                }
            }

            toggleMediaFields();

            $('input[name="has_video"]').on('change', function() {
                toggleMediaFields();
            });

        });
    </script>
@endsection
