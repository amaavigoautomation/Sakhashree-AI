@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('destinations.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    @csrf

                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Order <span class="mandatory">*</span></label>
                                <input type="number" name="order" placeholder="Enter order" required
                                    value="{{ old('order') }}" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="country_id">Country</label>
                                <div class="select-position select-sm">
                                    <select id="country_id" name="country_id" class="jSelectbox">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $country) { ?>
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" id="model_name" data-model="destinations"
                                    placeholder="Enter Name" required value="{{ old('name') }}" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label for="page_slug">Page Slug <span class="mandatory">*</span></label>
                                <input type="text" id="page_slug" data-model="destinations" name="page_slug"
                                    placeholder="Page Slug" value="{{ old('page_slug') }}" />
                            </div>
                        </div>

                        {{-- <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Top Attractions</label>
                            <input type="text" name="top_attractions" placeholder="Top Attractions" />
                        </div>
                    </div> --}}
                    </div>

                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_url">Page Url</label>
                                <input type="url" id="page_url" name="page_url" placeholder="Page URL" readonly />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_title">Page Title</label>
                                <input type="text" id="page_title" name="page_title" placeholder="Page Title" required
                                    value="{{ old('page_title') }}" />
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                    </div>
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Meta Description</label>
                                <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Description</label>
                                <textarea name="description" rows="5" class="rich-editor">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <label>Cover Image</label>
                            <div id=""><img id="selectedImage" class="addedImage"
                                    src="{{ asset('public/images/no-image.png') }}" alt="Selected Cover Image"></div>
                            <input type="file" name="cover_image" id="imgupload" onchange="displayImage(this)">
                        </div>
                        <div class="col-sm-3">
                            <label>Thumbnail Image</label>
                            <div id=""><img id="selectedImage" class="addedImage"
                                    src="{{ asset('public/images/no-image.png') }}" alt="Selected Thumbnail Image"></div>
                            <input type="file" name="thumbnail_image" id="imgupload" onchange="displayImage(this)">
                        </div>

                        <div class="col-sm-3">
                            <label>Display on HomePage</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="display_on_homepage" class="radio-inline" value="1"
                                    {{ old('display_on_homepage', 0) == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="display_on_homepage" class="radio-inline" value="0"
                                    {{ old('display_on_homepage', 0) == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        {{-- <div class="col-sm-3">
                        <label>No of Elements to Show</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="no_of_elements_to_show" class="radio-inline" value="1"> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="no_of_elements_to_show" class="radio-inline" value="0" checked> No
                        </label>
                    </div> --}}

                        <div class="col-sm-2">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ old('active', 0) == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ old('active', 0) == 0 ? 'checked' : '' }}> No
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
        </div>
    </section>
@endsection
