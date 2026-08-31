@extends('layouts.backend')

@section('content')

<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')

<form method="POST" action="{{ route('destinations.update', $destinations->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-style mt-20">

        <div class="row mt-15">
            <div class="col-sm-3">
                <div class="input-style-1">
                    <label>Order <span class="mandatory">*</span></label>
                    <input type="number" name="order" value="{{ $destinations->order }}" required />
                </div>
            </div>

             <div class="col-sm-3">
                <div class="select-style-1">
                    <label for="country_id">Country</label>
                    <div class="select-position select-sm">
                        <select id="country_id" name="country_id" class="jSelectbox">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ $country->id == $destinations->country_id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="col-sm-3">
                <div class="input-style-1">
                    <label>Name <span class="mandatory">*</span></label>
                    <input type="text" name="name" id="model_name" data-model="destinations"
                        value="{{ $destinations->name }}" required />
                </div>
            </div>

            <div class="col-sm-3">
                <div class="input-style-1">
                    <label for="page_slug">Page Slug <span class="mandatory">*</span></label>
                    <input type="text" id="page_slug" data-model="destinations" name="page_slug" value="{{ $destinations->page_slug }}" />
                </div>
            </div>

            
        </div>

        <hr>

        <div class="row mt-15">
            <div class="col-sm-6">
                <div class="input-style-1">
                    <label for="page_url">Page Url</label>
                    <input type="url" id="page_url" name="page_url" value="{{ $destinations->page_url }}" readonly />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-style-1">
                    <label for="page_title">Page Title</label>
                    <input type="text" id="page_title" name="page_title" value="{{ $destinations->page_title }}" required />
                </div>
            </div>
        </div>

        <hr>

        <div class="row mt-15">
            <div class="col-sm-12">
                <div class="input-style-1">
                    <label>Meta Description</label>
                    <textarea rows="5" name="meta_description">{{ $destinations->meta_description }}</textarea>
                </div>
            </div>
        </div>

        <hr>

        <div class="row mt-15">
            <div class="col-sm-12">
                <div class="input-style-1">
                    <label>Description</label>
                    <textarea name="description" rows="10" class="rich-editor">{{ $destinations->description }}</textarea>
                </div>
            </div>
        </div>

        <hr>

        <div class="row mt-15">
            <div class="col-sm-3">
                <label>Cover Image</label>
                <div id=""><img id="selectedImage" class="addedImage" src="{{ $destinations->cover_image ? asset('public/images/destinations/cover_image/' . $destinations->id . '/' . $destinations->cover_image) : asset('public/images/no-image.png') }}" alt="Selected Cover Image"></div>
                <input type="file" name="cover_image" id="imageInput" onchange="displayImage(this)">
                <span id="iconImage">{{ $destinations->cover_image }}</span>
            </div>

            <div class="col-sm-3">
                <label>Thumnail Image</label>
                <div id=""><img id="selectedImage" class="addedImage" src="{{ $destinations->thumbnail_image ? asset('public/images/destinations/thumbnail_image/' . $destinations->id . '/' . $destinations->thumbnail_image) : asset('public/images/no-image.png') }}" alt="Selected Cover Image"></div>
                <input type="file" name="thumbnail_image" id="imageInput" onchange="displayImage(this)">
                <span id="iconImage">{{ $destinations->thumbnail_image }}</span>
            </div>

            <div class="col-sm-3">
                <label>Display on HomePage</label><br>
                <label class="radio-inline">
                    <input type="radio" name="display_on_homepage" value="1" {{ $destinations->display_on_homepage == 1 ? 'checked' : '' }}> Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="display_on_homepage" value="0" {{ $destinations->display_on_homepage == 0 ? 'checked' : '' }}> No
                </label>
            </div>

            <div class="col-sm-3">
                <label>Active</label><br>
                <label class="radio-inline">
                    <input type="radio" name="active" value="1" {{ $destinations->active == 1 ? 'checked' : '' }}> Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="active" value="0" {{ $destinations->active == 0 ? 'checked' : '' }}> No
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
