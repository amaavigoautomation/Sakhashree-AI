@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('event.update', ['event' => $event->id]) }}" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="card-style mt-20">

                    <input type="hidden" name="id" value="{{ $event->id }}">

                    <!-- Title & Location -->
                    <div class="row">

                        <!-- Title -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>
                                    Event Title <span class="mandatory">*</span>
                                </label>

                                <input type="text" name="title" placeholder="Event Title"
                                    value="{{ old('title', $event->title) }}" required>
                            </div>
                        </div>

                        <!-- City Name -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Event Location <span class="mandatory">*</span></label>

                                <input type="text" name="city_name" placeholder="Event Location"
                                    value="{{ old('city_name', $event->city_name) }}" required>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Date, Day & Time -->
                    <div class="row">

                        <!-- Date -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>
                                    Event Date <span class="mandatory">*</span>
                                </label>

                                <input type="date" name="date" value="{{ old('date', $event->date) }}" required>
                            </div>
                        </div>

                        <!-- Day -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>
                                    Event Day <span class="mandatory">*</span>
                                </label>

                                <input type="text" name="day" placeholder="Event Day"
                                    value="{{ old('day', $event->day) }}" required>
                            </div>
                        </div>

                        <!-- Start Time -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>
                                    Start Time <span class="mandatory">*</span>
                                </label>

                                <input type="time" name="start_time" value="{{ old('start_time', $event->start_time) }}"
                                    required>
                            </div>
                        </div>

                        <!-- End Time -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>
                                    End Time <span class="mandatory">*</span>
                                </label>

                                <input type="time" name="end_time" value="{{ old('end_time', $event->end_time) }}"
                                    required>
                            </div>
                        </div>

                    </div>

                    <!-- Time Zone & Video Link -->
                    <div class="row">

                        <!-- Time Code -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>Time Zone</label>

                                <input type="text" name="time_code" placeholder="eg: UTC, IST"
                                    value="{{ old('time_code', $event->time_code) }}">
                            </div>
                        </div>

                        <!-- Video Link -->
                        <div class="col-sm-6" id="videoLinkSection">
                            <div class="input-style-1">

                                <label>Video Link <span class="mandatory">*</span></label>

                                <input type="url" name="video_link" id="video_link" placeholder="Enter Video Link"
                                    value="{{ old('video_link', $event->video_link) }}">

                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Description -->
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Event Description</label>
                                <textarea name="description" rows="5" class="rich-editor" placeholder="Event Description">{!! old('description', $event->description) !!}</textarea>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Image, Status & Event Type -->
                    <div class="row">

                        <!-- Image -->
                        <div class="col-sm-4">
                            <label>Event Image</label>

                            <img id="selectedImage" class="addedImage"
                                src="{{ $event->image_file
                                    ? asset('public/images/events/' . $event->id . '/' . $event->image_file)
                                    : asset('dist/images/no-image.png') }}"
                                alt="Event Image">

                            <input type="file" name="image_file" id="imageInput"
                                accept="image/jpeg,image/jpg,image/png,image/webp" onchange="displayImage(this)">

                            <small class="text-muted d-block mt-2">
                                <strong>Maximum file size:</strong> 5 MB
                            </small>

                            <small class="text-muted d-block mt-2" id="imageRequirement">
                                <strong>Image Requirements:</strong><br>
                                Width: 800px × Height: 800px
                            </small>
                        </div>

                        <!-- Active -->
                        <div class="col-sm-4">
                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ old('active', $event->active) == 1 ? 'checked' : '' }}>
                                Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ old('active', $event->active) == 0 ? 'checked' : '' }}>
                                Inactive
                            </label>
                        </div>

                        <!-- Past Event -->
                        <div class="col-sm-4">
                            <label>Event Type <span class="mandatory">*</span></label><br>

                            <label class="radio-inline">
                                <input type="radio" name="is_past_event" value="0"
                                    {{ old('is_past_event', $event->is_past_event) == 0 ? 'checked' : '' }}
                                    onchange="toggleEventType()">
                                Upcoming Event
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="is_past_event" value="1"
                                    {{ old('is_past_event', $event->is_past_event) == 1 ? 'checked' : '' }}
                                    onchange="toggleEventType()">
                                Past Event
                            </label>
                        </div>

                    </div>

                    <hr>

                    <!-- Update Button -->
                    <div class="row">

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
    <script>
        function toggleEventType() {

            const isPastEvent = document.querySelector(
                'input[name="is_past_event"]:checked'
            ).value;

            const videoLinkSection = document.getElementById('videoLinkSection');
            const videoLink = document.getElementById('video_link');
            const imageRequirement = document.getElementById('imageRequirement');

            if (isPastEvent == '1') {

                // Past Event
                videoLinkSection.style.display = 'block';

                videoLink.required = true;

                imageRequirement.innerHTML = `
                <strong>Image Requirements:</strong><br>
                Width: 600px × Height: 400px
            `;

            } else {

                // Upcoming Event
                videoLinkSection.style.display = 'none';

                videoLink.required = false;
                videoLink.value = '';

                imageRequirement.innerHTML = `
                <strong>Image Requirements:</strong><br>
                Width: 800px × Height: 800px
            `;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleEventType();
        });
    </script>
@endsection
