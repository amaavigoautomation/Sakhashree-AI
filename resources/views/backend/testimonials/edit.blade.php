@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('testimonials.update', $testimonial->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-style mt-20">

                    <div class="row mt-15">

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" value="{{ $testimonial->name }}" required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Email <span class="mandatory">*</span></label>
                                <input type="text" name="email" value="{{ $testimonial->email }}" required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Mobile <span class="mandatory">*</span></label>
                                <input type="text" name="mobile" value="{{ $testimonial->mobile }}" required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Designation <span class="mandatory">*</span></label>
                                <input type="text" name="designation" value="{{ $testimonial->designation }}" required />
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Country</label>
                                <input type="text" name="country" value="{{ $testimonial->country }}" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>City</label>
                                <input type="text" name="city" value="{{ $testimonial->city }}" />
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Description</label>
                                    <textarea name="description" rows="10" class="rich-editor">
                                        {{ $testimonial->description }}
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <<div class="col-sm-3">
                            <label>Image</label>
                            <div>
                                <img id="selectedImage" class="addedImage"
                                    src="{{ $testimonial->icon ? asset('public/images/testimonials/' . $testimonial->id . '/' . $testimonial->icon) : asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>
                            <input type="file" name="icon" id="imageInput" onchange="displayImage(this)">
                            <span id="iconImage">{{ $testimonial->icon }}</span>

                    </div>

                    <div class="col-sm-2">
                        <label>Active</label><br>

                        <label class="radio-inline">
                            <input type="radio" name="active" value="1"
                                {{ $testimonial->active == 1 ? 'checked' : '' }}> Yes
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="active" value="0"
                                {{ $testimonial->active == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>

                    <div class="col-sm-3">
                        <label>Display on Homepage</label><br>

                        <label class="radio-inline">
                            <input type="radio" name="display_on_homepage" value="1"
                                {{ $testimonial->display_on_homepage == 1 ? 'checked' : '' }}> Yes
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="display_on_homepage" value="0"
                                {{ $testimonial->display_on_homepage == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>

                    <hr>

                    <div class="row mt-15">
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
@endsection
