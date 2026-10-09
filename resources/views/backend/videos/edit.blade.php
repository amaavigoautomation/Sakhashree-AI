@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('videos.update', ['video' => $videos->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-style mt-20">

                    <!-- Order + Title -->
                    <div class="row mt-15">
                        <input type="hidden" name="id" value="{{ $videos->id }}" />

                        {{-- <div class="col-sm-2">
                            <div class="input-style-1">
                                <label>Order <span class="mandatory">*</span></label>
                                <input type="number" name="order" value="{{ $videos->order }}" required>
                            </div>
                        </div> --}}

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Video Title <span class="mandatory">*</span></label>
                                <input type="text" name="title" value="{{ $videos->title }}" required>
                            </div>
                        </div>

                        {{--   <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Profession</label>
                                <input type="text" name="profession" value="{{ $videos->profession ?? '' }}">
                            </div>
                        </div>
                        --}}
                        <!-- Active -->
                        <div class="col-sm-4">
                            <label>Status</label><br>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ $videos->active == 1 ? 'checked' : '' }}> Active
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ $videos->active == 0 ? 'checked' : '' }}> Inactive
                            </label>
                        </div>
                    </div>

                    <hr>

                    <!-- Description -->
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Video Description</label>
                                <textarea rows="6" name="description" class="rich-editor" placeholder="Enter video description">{{ $videos->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Video Link -->
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Video Link <span class="mandatory">*</span></label>
                                <input type="url" name="video_link" value="{{ $videos->video_link }}" required>
                            </div>
                        </div>
                    </div>

                    <hr>


                    <!-- Image -->
                    <div class="row mt-15">
                        <div class="col-sm-4">
                            <label>Video Image</label>

                            <img id="selectedImage" class="addedImage"
                                src="{{ $videos->image_file
                                    ? asset('public/images/videos/image_file/' . $videos->id . '/' . $videos->image_file)
                                    : asset('public/images/no-image.png') }}"
                                alt="Selected Image">

                            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)"
                                accept="image/jpeg,image/jpg,image/png,image/webp">

                            <span id="iconImage">{{ $videos->image_file }}</span>

                            <small class="text-muted d-block mt-2">
                                <strong>Maximum file size:</strong> 5 MB
                            </small>

                            <small class="text-muted d-block mt-2">
                                <strong>Image Requirements:</strong><br>
                                Width: 600px × Height: 400px
                            </small>
                        </div>
                    </div>

                    <hr>

                    <!-- Submit -->
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Update
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </section>
@endsection
