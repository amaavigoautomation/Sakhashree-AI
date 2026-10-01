@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <form method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    @csrf
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory"> *</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Name"
                                    required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Email <span class="mandatory">*</span></label>
                                <input type="text" name="email" value="{{ old('email') }}" placeholder="Enter Email"
                                    required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Mobile <span class="mandatory">*</span></label>
                                <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile"
                                    required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Designation <span class="mandatory">*</span></label>
                                <input type="text" name="designation" value="{{ old('designation') }}"
                                    placeholder="Enter Designation" required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Country</label>
                                <input type="text" name="country" value="{{ old('country') }}"
                                    placeholder="Enter Country" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>City</label>
                                <input type="text" name="city" value="{{ old('city') }}" placeholder="Enter City" />
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Description</label>
                                    <textarea name="description" rows="10" class="rich-editor">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Image</label>

                                <div>
                                    <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                        alt="Selected Image">
                                </div>

                                <input type="file" name="icon" id="imageInput" accept="image/*"
                                    onchange="displayImage(this)">
                            </div>
                        </div>


                        <div class="col-sm-2">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ old('active', 0) == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active', 0) == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label>Display on Homepage</label><br>

                            <label class="radio-inline">
                                <input type="radio" name="display_on_homepage" value="1"
                                    {{ old('display_on_homepage', 0) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="display_on_homepage" value="0"
                                    {{ old('display_on_homepage', 0) == 0 ? 'checked' : '' }}>
                                No
                            </label>
                        </div>

                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                        </div>
                    </div>

                </div>
            </form>
    </section>
@endsection
