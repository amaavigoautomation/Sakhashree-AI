@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('workshops_listing.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-style mt-20">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label>
                                    Workshop Name
                                    <span class="mandatory">*</span>
                                </label>
                                <input type="text" name="name" placeholder="Enter workshop name" required>
                            </div>
                        </div>

                        <!-- City -->
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label>
                                    City
                                    <span class="mandatory">*</span>
                                </label>
                                <input type="text" name="city" placeholder="Enter city" required>
                            </div>
                        </div>

                        <!-- Date -->
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label>Date <span class="mandatory">*</span></label>
                                <input type="date" name="date" required>
                            </div>
                        </div>

                        <!-- Time -->
                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label>
                                    Start Time
                                    <span class="mandatory">*</span>
                                </label>

                                <input type="time" name="start_time" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label>
                                    End Time
                                    <span class="mandatory">*</span>
                                </label>

                                <input type="time" name="end_time" required>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>
                                    Description
                                    <span class="mandatory">*</span>
                                </label>

                                <textarea name="description" id="description" rows="4" placeholder="Enter workshop description" required></textarea>

                                <small>
                                    <span id="wordCount">0</span>/15 words
                                </small>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="col-sm-3">
                            <label>Image</label>
                            <img id="selectedImage" class="addedImage" src="{{ asset('public/images/no-image.png') }}"
                                alt="Selected Image">
                            <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
                        </div>

                        <!-- Latest -->
                        <div class="col-md-3">
                            <label>Is Latest</label>
                            <div class="mt-10">
                                <label class="radio-inline me-20">
                                    <input type="radio" name="is_latest" value="1">
                                    Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_latest" value="0" checked>
                                    No
                                </label>
                            </div>
                        </div>

                        <!-- Active -->
                        <div class="col-md-3">
                            <label>Active</label>
                            <div class="mt-10">
                                <label class="radio-inline me-20">
                                    <input type="radio" name="active" value="1" checked>
                                    Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" value="0">
                                    No
                                </label>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Save
                            </button>
                        </div>
                    </div>

                </div>

            </form>

        </div>
    </section>
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
