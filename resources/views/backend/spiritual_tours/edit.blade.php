@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <div class="card-style mt-20">

                <form method="POST" action="{{ route('spiritual_tours_listing.update', $tour->id) }}"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>Tour Title <span class="mandatory">*</span></label>
                                <input type="text" name="title" placeholder="Enter Tour Title" required
                                    value="{{ old('title', $tour->title) }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>Tour Location <span class="mandatory">*</span></label>
                                <input type="text" name="location" placeholder="Enter Tour Location" required
                                    value="{{ old('location', $tour->location) }}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label>Start Date <span class="mandatory">*</span></label>
                                <input type="date" name="start_date" value="{{ old('start_date', $tour->start_date?->format('Y-m-d')) }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label>End Date <span class="mandatory">*</span></label>
                                <input type="date" name="end_date" value="{{ old('end_date', $tour->end_date?->format('Y-m-d')) }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label>Duration (Days)</label>
                                <input type="text" name="days" id="days" placeholder="Auto calculated"
                                    value="{{ old('days', $tour->days) }}" readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label>Tour Description</label>
                                <textarea name="description" rows="5" class="rich-editor" placeholder="Enter Tour Description">{{ old('description', $tour->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label>Tour Image</label>

                                <img id="selectedImage" class="addedImage"
                                    src="{{ !empty($tour->image_file)
                                        ? asset('public/images/spiritual_tours/image_file/' . $tour->id . '/' . $tour->image_file)
                                        : asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">

                                <input type="file" name="image_file" id="imageInput"
                                    accept="image/png, image/jpeg, image/webp, image/jpg"
                                    onchange="validateAndDisplayImage(this)">

                                <small class="text-muted d-block mt-2">
                                    <strong>Maximum file size:</strong> 5 MB
                                </small>

                                <small id="upcomingImageRequirement" class="text-muted d-block mt-2"
                                    style="{{ $tour->is_upcoming == 1 ? '' : 'display:none;' }}">
                                    <strong>Image Requirements:</strong><br>
                                    Upcoming Tours — Width: 800px × Height: 800px
                                </small>

                                <small id="pastImageRequirement" class="text-muted d-block mt-2"
                                    style="{{ $tour->is_upcoming == 0 ? '' : 'display:none;' }}">
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
                                    {{ old('is_upcoming', $tour->is_upcoming) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_upcoming" value="0"
                                    {{ old('is_upcoming', $tour->is_upcoming) == 0 ? 'checked' : '' }}>
                                No
                            </label>
                        </div>

                        <!-- Active -->
                        <div class="col-sm-2">
                            <label>Status</label><br>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ old('active', $tour->active) == 1 ? 'checked' : '' }}>
                                Active
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ old('active', $tour->active) == 0 ? 'checked' : '' }}>
                                Inactive
                            </label>
                        </div>

                    </div>
                    <hr>
                    <div class="col-md-12 mt-20">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                            Update
                        </button>

                    </div>

            </div>

            </form>

        </div>

        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="is_upcoming"]');
            const upcoming = document.getElementById('upcomingImageRequirement');
            const past = document.getElementById('pastImageRequirement');

            function updateRequirement() {
                const selected = document.querySelector('input[name="is_upcoming"]:checked');
                if (!selected) return;

                const isUpcoming = selected.value === '1';

                upcoming.classList.toggle('d-none', !isUpcoming);
                upcoming.classList.toggle('d-block', isUpcoming);
                past.classList.toggle('d-none', isUpcoming);
                past.classList.toggle('d-block', !isUpcoming);
            }

            radios.forEach(r => r.addEventListener('change', updateRequirement));
            updateRequirement();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startDate = document.querySelector('input[name="start_date"]');
            const endDate = document.querySelector('input[name="end_date"]');
            const days = document.getElementById('days');

            function calculateDays() {
                if (startDate.value && endDate.value) {
                    const start = new Date(startDate.value);
                    const end = new Date(endDate.value);

                    const difference = end - start;

                    if (difference >= 0) {
                        const totalDays = Math.floor(
                            difference / (1000 * 60 * 60 * 24)
                        ) + 1;

                        days.value = totalDays;
                    } else {
                        days.value = '';
                    }
                } else {
                    days.value = '';
                }
            }

            startDate.addEventListener('change', calculateDays);
            endDate.addEventListener('change', calculateDays);

            calculateDays();
        });
    </script>
@endsection
