@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="calling_code" id="calling_code" value="{{ old('calling_code') }}">
                <div class="card-style mt-20">

                    <!-- Name, Designation, Email & Mobile -->
                    <div class="row">

                        <!-- Name -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Testimonial Name <span class="mandatory"> *</span></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Testimonial Name" required />
                            </div>
                        </div>

                        <!-- Profession -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Profession <span class="mandatory">*</span></label>
                                <input type="text" name="designation" value="{{ old('designation') }}"
                                    placeholder="eg: Actor, Director" required />
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Email Address <span class="mandatory">*</span></label>
                                <input type="text" name="email" value="{{ old('email') }}"
                                    placeholder="Enter Email Address" required />
                            </div>
                        </div>

                        <!-- Mobile -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Mobile Number <span class="mandatory">*</span></label>
                                <input type="text" name="mobile" value="{{ old('mobile') }}"
                                    placeholder="Enter Mobile Number" maxlength="12" inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12)" required />
                            </div>
                        </div>

                    </div>

                    <!-- Country & City -->
                    <div class="row">

                        <!-- Country -->
                        <div class="col-sm-6">
                            <div class="select-style-1">
                                <label for="country_id">
                                    Country <span class="mandatory">*</span>
                                </label>

                                <div class="select-position select-sm">
                                    <select name="country_id" id="country_id" class="jSelectbox" required>
                                        <option value="">Select Country</option>

                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                data-calling-code="{{ $country->calling_code }}"
                                                {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }} ({{ $country->calling_code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- City -->
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label>City</label>
                                <input type="text" name="city" value="{{ old('city') }}"
                                    placeholder="Enter City" />
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Description -->
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Testimonial Description</label>
                                <textarea name="description" rows="5" class="rich-editor">{{ old('description') }}</textarea>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Image, Active & Display on Homepage -->
                    <div class="row">

                        <!-- Image -->
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Testimonial Image</label>

                                <div>
                                    <img id="selectedImage" class="addedImage"
                                        src="{{ asset('dist/images/no-image.png') }}" alt="Testimonial Image">
                                </div>

                                <input type="file" name="icon" id="imageInput"
                                    accept="image/jpeg,image/jpg,image/png,image/webp" onchange="displayImage(this)">

                                <small class="text-muted d-block mt-2">
                                    <strong>Maximum file size:</strong> 5 MB
                                </small>

                                <small class="text-muted d-block mt-2" id="imageRequirement">
                                    <strong>Image Requirements:</strong><br>
                                    Transformation Stories Section: 300px × 300px
                                </small>
                            </div>
                        </div>

                        <!-- Active -->
                        <div class="col-sm-4">
                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ old('active', 0) == 1 ? 'checked' : '' }}> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active', 0) == 0 ? 'checked' : '' }}> Inactive
                            </label>
                        </div>

                        <!-- Display on Homepage -->
                        <div class="col-sm-4">
                            <label>Display on Homepage</label><br>

                            <label class="radio-inline">
                                <input type="radio" name="display_on_homepage" value="1"
                                    onchange="toggleImageRequirement()"
                                    {{ old('display_on_homepage', 0) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="display_on_homepage" value="0"
                                    onchange="toggleImageRequirement()"
                                    {{ old('display_on_homepage', 0) == 0 ? 'checked' : '' }}>
                                No
                            </label>
                        </div>

                    </div>

                    <hr>

                    <!-- Save Button -->
                    <div class="row">

                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                        </div>

                    </div>

                </div>

            </form>

        </div>
    </section>
    <script>
        $('#country_id').on('change', function() {
            let callingCode = $(this).find(':selected').data('calling-code') || '';

            $('#calling_code').val(callingCode);
        });

        $(document).ready(function() {
            $('#country_id').trigger('change');
        });
    </script>
    <script>
        function toggleImageRequirement() {
            const displayOnHomepage = document.querySelector(
                'input[name="display_on_homepage"]:checked'
            ).value;

            const imageRequirement = document.getElementById('imageRequirement');

            if (displayOnHomepage == '1') {
                imageRequirement.innerHTML = `
                <strong>Image Requirements:</strong><br>
                Transformation Stories: 300px × 300px
            `;
            } else {
                imageRequirement.innerHTML = `
                <strong>Image Requirements:</strong><br>
                Testimonial Page: 100px × 100px
            `;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleImageRequirement();
        });
    </script>
@endsection
