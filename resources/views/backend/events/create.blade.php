@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="card-style mt-20">

                    <!-- Title & City -->
                    <div class="row mt-15">

                        <!-- Title -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>
                                    Title <span class="mandatory">*</span>
                                </label>

                                <input type="text" name="title" placeholder="Event Title" value="{{ old('title') }}"
                                    required>
                            </div>
                        </div>

                        <!-- City Name -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>City Name</label>

                                <input type="text" name="city_name" placeholder="City Name"
                                    value="{{ old('city_name') }}">
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Date & Time -->
                    <div class="row mt-15">

                        <!-- Date -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>
                                    Date <span class="mandatory">*</span>
                                </label>

                                <input type="date" name="date" value="{{ old('date') }}" required>
                            </div>
                        </div>

                        <!-- Start Time -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>
                                    Start Time <span class="mandatory">*</span>
                                </label>

                                <input type="time" name="start_time" value="{{ old('start_time') }}" required>
                            </div>
                        </div>

                        <!-- End Time -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>
                                    End Time <span class="mandatory">*</span>
                                </label>

                                <input type="time" name="end_time" value="{{ old('end_time') }}" required>
                            </div>
                        </div>

                        <!-- Day -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>
                                    Day <span class="mandatory">*</span>
                                </label>

                                <input type="text" name="day" placeholder="Monday" value="{{ old('day') }}"
                                    required>
                            </div>
                        </div>

                        <!-- Time Code -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Time Code</label>

                                <input type="text" name="time_code" placeholder="IST" value="{{ old('time_code') }}">
                            </div>
                        </div>
                        <!-- Video Link -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Video Link</label>

                                <input type="url" name="video_link" placeholder="Video Link"
                                    value="{{ old('video_link') }}">
                            </div>
                        </div>

                    </div>




                    <hr>

                    <!-- Description -->
                    <div class="row mt-15">

                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Description</label>

                                <textarea name="description" rows="10" class="rich-editor" placeholder="Event Description">{!! old('description') !!}</textarea>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Image & Status -->
                    <div class="row mt-15">

                        <!-- Image -->
                        <div class="col-sm-3">
                            <label>Image</label>

                            <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                alt="Selected Image">

                            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
                        </div>

                        <!-- Active & Past Event -->
                        <div class="col-sm-9">

                            <div class="row">

                                <!-- Active -->
                                <div class="col-sm-4">
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


                                <!-- Past Event -->
                                <div class="col-sm-4">
                                    <label>Past Event</label><br>

                                    <label class="radio-inline">
                                        <input type="radio" name="is_past_event" value="1"
                                            {{ old('is_past_event', 0) == 1 ? 'checked' : '' }}>
                                        Yes
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="is_past_event" value="0"
                                            {{ old('is_past_event', 0) == 0 ? 'checked' : '' }}>
                                        No
                                    </label>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Save Button -->
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
