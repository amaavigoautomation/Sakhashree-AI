@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <div class="card-style mt-20">

                <form method="POST" action="{{ route('news_listing.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>Title <span class="mandatory">*</span></label>
                                <input type="text" name="title" placeholder="Enter title" required value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ old('active', 1) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ old('active', 1) == 0 ? 'checked' : '' }}>
                                No
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <label>Has Video</label><br>

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

                    <div class="row">

                        <!-- Description -->
                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label>Description</label>
                                <textarea name="description" rows="5" class="rich-editor" placeholder="Enter description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                    </div>
                    <hr>
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
                        <div class="col-md-3" id="imageField">
                            <div class="input-style-1">
                                <label>Image</label>
                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                                <input type="file" name="image_file" id="imageInput" accept="image/*"
                                    onchange="displayImage(this)">
                            </div>
                        </div>

                    </div>

                    <hr>
                    <div class="col-md-12 mt-20">
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
