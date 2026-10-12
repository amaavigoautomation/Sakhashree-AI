@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <div class="card-style mt-20">

                <form method="POST" action="{{ route('spiritual_tours_listing.store') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>Tour Title <span class="mandatory">*</span></label>
                                <input type="text" name="title" placeholder="Enter Tour Title" required
                                    value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>Tour Location <span class="mandatory">*</span></label>
                                <input type="text" name="location" placeholder="Enter Tour Location" required
                                    value="{{ old('location') }}">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label>Start Date <span class="mandatory">*</span></label>
                                <input type="date" name="start_date" required value="{{ old('start_date') }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label>End Date <span class="mandatory">*</span></label>
                                <input type="date" name="end_date" required value="{{ old('end_date') }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label>Duration (Days)</label>
                                <input type="text" name="days" id="days" placeholder="Auto calculated"
                                    value="{{ old('days') }}" readonly>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label>Tour Description</label>
                                <textarea name="description" rows="5" class="rich-editor" placeholder="Enter Tour Description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Short Description (only for Past Journeys) -->
                    <div class="row" id="shortDescriptionWrapper" style="display: none;">
                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label>Short Description</label>
                                <textarea name="short_description" id="shortDescription" rows="3"
                                    placeholder="Enter Short Description (Maximum 24 words)">{{ old('short_description') }}</textarea>
                                <small class="text-muted"><span id="wordCount">0</span> / 24 words</small>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label>Tour Image</label>

                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">

                                <input type="file" name="image_file" id="imageInput"
                                    accept="image/png, image/jpeg, image/webp, image/jpg" onchange="displayImage(this)">

                                <small class="text-muted d-block mt-2">
                                    <strong>Maximum file size:</strong> 5 MB
                                </small>

                                <small id="upcomingImageRequirement" class="text-muted d-block mt-2">
                                    <strong>Image Requirements:</strong><br>
                                    Upcoming Tours — Width: 800px × Height: 800px
                                </small>

                                <small id="pastImageRequirement" class="text-muted d-none mt-2">
                                    <strong>Image Requirements:</strong><br>
                                    Past Journeys — Width: 600px × Height: 400px
                                </small>
                            </div>
                        </div>

                        <!-- Is Upcoming -->
                        <div class="col-sm-2">
                            <label>Upcoming Tour</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="is_upcoming" value="1"
                                    {{ old('is_upcoming', 1) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_upcoming" value="0"
                                    {{ old('is_upcoming', 1) == 0 ? 'checked' : '' }}>
                                No
                            </label>
                        </div>

                        <!-- Status -->
                        <div class="col-sm-4">
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
                    <div class="col-md-12 mt-20">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                            Save
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startDate = document.querySelector('input[name="start_date"]');
            const endDate = document.querySelector('input[name="end_date"]');
            const days = document.getElementById('days');

            function calculateDays() {
                if (startDate.value && endDate.value) {
                    const diff = new Date(endDate.value) - new Date(startDate.value);
                    days.value = diff >= 0 ? Math.floor(diff / (1000 * 60 * 60 * 24)) + 1 : '';
                } else {
                    days.value = '';
                }
            }

            startDate.addEventListener('change', calculateDays);
            endDate.addEventListener('change', calculateDays);
            calculateDays();

            /* ---------- 2. Upcoming / Past toggle ---------- */
            const radios = document.querySelectorAll('input[name="is_upcoming"]');
            const upcomingRequirement = document.getElementById('upcomingImageRequirement');
            const pastRequirement = document.getElementById('pastImageRequirement');
            const shortDescriptionWrapper = document.getElementById('shortDescriptionWrapper');

            function updateImageRequirement() {
                const selected = document.querySelector('input[name="is_upcoming"]:checked');
                if (!selected) return;

                if (selected.value === '1') {
                    upcomingRequirement.classList.remove('d-none');
                    pastRequirement.classList.add('d-none');
                    shortDescriptionWrapper.style.display = 'none';
                } else {
                    upcomingRequirement.classList.add('d-none');
                    pastRequirement.classList.remove('d-none');
                    shortDescriptionWrapper.style.display = 'flex';
                }
            }

            radios.forEach(function(radio) {
                radio.addEventListener('change', updateImageRequirement);
            });
            updateImageRequirement();

            /* ---------- 3. Short description 24 word limit ---------- */
            const shortDesc = document.getElementById('shortDescription');
            const wordCount = document.getElementById('wordCount');

            function limitWords() {
                let words = shortDesc.value.trim().split(/\s+/).filter(Boolean);
                if (words.length > 24) {
                    words = words.slice(0, 24);
                    shortDesc.value = words.join(' ');
                }
                wordCount.textContent = words.length;
            }

            shortDesc.addEventListener('input', limitWords);
            limitWords();
        });
    </script>
@endsection
