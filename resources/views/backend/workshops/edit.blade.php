@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('workshops_listing.update', ['workshops_listing' => $workshop->id]) }}"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="card-style mt-20">

                    {{-- Basic Details --}}
                    <div class="row">

                        <!-- Workshop Name -->
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>
                                    Workshop Name
                                    <span class="mandatory">*</span>
                                </label>

                                <input type="text" name="name" id="workshopName" placeholder="Enter Workshop Name"
                                    value="{{ old('name', $workshop->name) }}" required>

                                <small>
                                    <span id="nameWordCount">0</span>/6 words
                                </small>
                            </div>
                        </div>

                        <!-- Workshop Date -->
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label>
                                    Workshop Date
                                    <span class="mandatory">*</span>
                                </label>

                                <input type="date" name="date" value="{{ old('date', $workshop->date) }}" required>
                            </div>
                        </div>

                        <!-- Workshop Location -->
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label>
                                    Workshop Location
                                    <span class="mandatory">*</span>
                                </label>

                                <input type="text" name="city" placeholder="Enter Workshop Location"
                                    value="{{ old('city', $workshop->city) }}" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <!-- Start Time -->
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label>
                                    Start Time
                                    <span class="mandatory">*</span>
                                </label>

                                <input type="time" name="start_time"
                                    value="{{ old('start_time', $workshop->start_time) }}" required>
                            </div>
                        </div>

                        <!-- End Time -->
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label>
                                    End Time
                                    <span class="mandatory">*</span>
                                </label>

                                <input type="time" name="end_time" value="{{ old('end_time', $workshop->end_time) }}"
                                    required>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Workshop Description -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label>
                                    Workshop Description
                                    <span class="mandatory">*</span>
                                </label>

                                <textarea name="description" id="description" rows="4" placeholder="Enter workshop description" required>{{ old('description', $workshop->description) }}</textarea>

                                <small>
                                    <span id="wordCount">0</span>/15 words
                                </small>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Image and Options -->
                    <div class="row">

                        <!-- Workshop Image -->
                        <div class="col-sm-4">
                            <label>Workshop Image</label>

                            <br>

                            @if ($workshop->image_file)
                                <img id="selectedImage" class="addedImage"
                                    src="{{ asset('public/images/workshops/image_file/' . $workshop->id . '/' . $workshop->image_file) }}"
                                    alt="Workshop Image">
                            @else
                                <img id="selectedImage" class="addedImage" src="{{ asset('public/images/no-image.png') }}"
                                    alt="No Image">
                            @endif

                            <input type="file" name="image_file" id="imgupload"
                                accept="image/jpeg,image/jpg,image/png,image/webp" onchange="displayImage(this)">

                            <small class="text-muted d-block mt-2">
                                <strong>Maximum file size:</strong> 5 MB
                            </small>

                            <small class="text-muted d-block mt-2">
                                <strong>Image Requirements:</strong><br>
                                Past Workshops — Width: 600px × Height: 400px<br>
                                Workshops & Retreats Section — Width: 600px × Height: 350px
                            </small>
                        </div>

                        <!-- Upcoming Workshop -->
                        <div class="col-md-3">
                            <label>
                                Upcoming Workshop
                                <span class="mandatory">*</span>
                            </label>

                            <div class="mt-10">

                                <label class="radio-inline me-20">
                                    <input type="radio" name="is_latest" value="1"
                                        {{ old('is_latest', $workshop->is_latest) == 1 ? 'checked' : '' }} required>
                                    Yes
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="is_latest" value="0"
                                        {{ old('is_latest', $workshop->is_latest) == 0 ? 'checked' : '' }} required>
                                    No
                                </label>

                            </div>
                        </div>

                        <!-- Show on Website -->
                        <div class="col-md-3">
                            <label>
                                Show on Website
                                <span class="mandatory">*</span>
                                <small style="color: red;">(Max 2)</small>
                            </label>

                            <div class="mt-10">

                                <label class="radio-inline me-20">
                                    <input type="radio" name="show_on_website" value="1"
                                        {{ old('show_on_website', $workshop->show_on_website) == 1 ? 'checked' : '' }}
                                        required>
                                    Yes
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="show_on_website" value="0"
                                        {{ old('show_on_website', $workshop->show_on_website) == 0 ? 'checked' : '' }}
                                        required>
                                    No
                                </label>

                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-2">
                            <label>Status</label>

                            <div class="mt-10">

                                <label class="radio-inline me-20">
                                    <input type="radio" name="active" value="1"
                                        {{ old('active', $workshop->active) == 1 ? 'checked' : '' }}>
                                    Active
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="active" value="0"
                                        {{ old('active', $workshop->active) == 0 ? 'checked' : '' }}>
                                    Inactive
                                </label>

                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Update Button -->
                    <div class="row mt-15">
                        <div class="col-sm-12">
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
        const workshopName = $('#workshopName');
        const nameWordCount = $('#nameWordCount');
        const maxNameWords = 6;

        function updateNameWordCount() {

            let text = workshopName.val().trim();

            if (text === '') {
                nameWordCount.text(0);
                return;
            }

            let words = text.split(/\s+/);

            if (words.length > maxNameWords) {
                words = words.slice(0, maxNameWords);
                workshopName.val(words.join(' '));
            }

            nameWordCount.text(words.length);
        }

        workshopName.on('input', function() {
            updateNameWordCount();
        });

        updateNameWordCount();
    </script>

    <script>
        $(document).ready(function() {

            const description = $('#description');
            const wordCount = $('#wordCount');
            const maxWords = 15;

            function updateWordCount() {

                let text = description.val().trim();

                if (text === '') {
                    wordCount.text(0);
                    return;
                }

                let words = text.split(/\s+/);

                if (words.length > maxWords) {
                    words = words.slice(0, maxWords);
                    description.val(words.join(' '));
                }

                wordCount.text(words.length);
            }

            description.on('input', function() {
                updateWordCount();
            });

            updateWordCount();

        });
    </script>
@endsection
