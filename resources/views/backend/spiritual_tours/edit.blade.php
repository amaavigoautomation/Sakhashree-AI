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
                            <label>Title</label>
                            <input type="text" name="title" placeholder="Enter title"
                                value="{{ old('title', $tour->title) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Location</label>
                            <input type="text" name="location" placeholder="Enter location"
                                value="{{ old('location', $tour->location) }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-style-1">
                            <label>Start Date</label>
                            <input type="date" name="start_date" value="{{ old('start_date', $tour->start_date) }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-style-1">
                            <label>End Date</label>
                            <input type="date" name="end_date" value="{{ old('end_date', $tour->end_date) }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-style-1">
                            <label>Days</label>
                            <input type="text" name="days" id="days" placeholder="Auto calculated"
                                value="{{ old('days', $tour->days) }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input-style-1">
                            <label>Description</label>
                            <textarea name="description" rows="5" class="rich-editor" placeholder="Enter description">{{ old('description', $tour->description) }}</textarea>
                        </div>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <div class="input-style-1">
                            <label>Image</label>

                            <img id="selectedImage" class="addedImage"
                                src="{{ !empty($tour->image_file)
                                        ? asset('public/images/spiritual_tours/image_file/' . $tour->id . '/' . $tour->image_file)
                                        : asset('dist/images/no-image.png') }}"
                                alt="Selected Image">

                            <input type="file" name="image_file" id="imageInput" accept="image/*"
                                onchange="displayImage(this)">
                        </div>
                    </div>

                    <!-- Is Upcoming -->
                    <div class="col-sm-4">
                        <label>Is Upcoming</label><br>

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
                    <div class="col-sm-4">
                        <label>Active</label><br>

                        <label class="radio-inline">
                            <input type="radio" name="active" value="1"
                                {{ old('active', $tour->active) == 1 ? 'checked' : '' }}>
                            Yes
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="active" value="0"
                                {{ old('active', $tour->active) == 0 ? 'checked' : '' }}>
                            No
                        </label>
                    </div>

                    <div class="col-md-12 mt-20">
                        <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                            Update
                        </button>

                        <a href="{{ route('spiritual_tours_listing.index') }}"
                            class="main-btn light-btn btn-hover btn-xs">
                            Cancel
                        </a>
                    </div>

                </div>

            </form>

        </div>

    </div>
</section>
@endsection

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