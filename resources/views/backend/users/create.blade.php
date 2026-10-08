@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="card-style mt-20">

                    <input type="hidden" name="admin_type_id" value="2">
                    <input type="hidden" name="country_id" value="{{ old('country_id') }}">
                    <input type="hidden" name="calling_code" value="{{ old('calling_code') }}">

                    {{-- Personal Information --}}
                    <div class="row mt-15">

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>
                                    Full Name <span class="mandatory">*</span>
                                </label>
                                <input type="text" name="name" placeholder="Enter Full Name"
                                    value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="select-style-1">
                                <label>
                                    Calling Code <span class="mandatory">*</span>
                                </label>

                                <div class="select-position select-sm">
                                    <select name="country_id" id="country_id" class="jSelectbox" required>
                                        <option value="">Select</option>
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

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>
                                    Contact Number <span class="mandatory">*</span>
                                </label>

                                <input type="text" name="contact_no" placeholder="Enter Contact Number" class="numeric"
                                    value="{{ old('contact_no') }}" maxlength="12" inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12)" required>
                            </div>
                        </div>

                    </div>

                    <hr>

                    {{-- Login Information --}}
                    <div class="row mt-15">

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>
                                    Email Address / Username
                                    <span class="mandatory">*</span>
                                </label>
                                <input type="email" name="email" placeholder="Enter Email Address"
                                    value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>
                                    Password <span class="mandatory">*</span>
                                </label>
                                <input type="password" name="password" placeholder="Enter Password" required>
                            </div>
                        </div>

                    </div>

                    <hr>

                    {{-- Profile Information --}}
                    <div class="row mt-15">

                        <div class="col-sm-4">
                            <label>Profile Image</label>

                            <img id="selectedImage" class="addedImage" src="{{ asset('public/images/no-image.png') }}"
                                alt="Profile Image">

                            <input type="file" name="image" id="imgupload"
                                accept="image/jpeg,image/jpg,image/png,image/webp" onchange="displayImage(this)">

                            <small class="text-muted d-block mt-2">
                                <strong>Maximum File Size:</strong> 5 MB
                            </small>

                            <small class="text-muted d-block mt-2">
                                <strong>Image Requirements:</strong><br>
                                Width: 64px × Height: 64px
                            </small>
                        </div>

                        <div class="col-sm-4">
                            <label>
                                Status <span class="mandatory">*</span>
                            </label>

                            <div class="mt-10">

                                <label class="radio-inline me-20">
                                    <input type="radio" name="active" value="1"
                                        {{ old('active', 0) == 1 ? 'checked' : '' }} required>
                                    Active
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="active" value="0"
                                        {{ old('active', 0) == 0 ? 'checked' : '' }} required>
                                    Inactive
                                </label>

                            </div>
                        </div>

                    </div>

                    <hr>

                    {{-- Save --}}
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
        $('#country_id').on('change', function() {
            let callingCode = $(this).find(':selected').data('calling-code') || '';

            $('#calling_code').val(callingCode);
        });

        $(document).ready(function() {
            $('#country_id').trigger('change');
        });
    </script>
@endsection
