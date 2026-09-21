@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
     @include('partials.breadcrumb')
   <div class="card-style mt-20">
    <form method="POST" action="{{ route('productdetail.store') }}" enctype="multipart/form-data">
    @csrf

    @if(!empty($umrahProductId))
        <input type="hidden" name="umrah_product_id" value="{{ $umrahProductId }}">
    @endif

    <div class="row mt-15">
        <div class="col-sm-4">
            <div class="input-style-1">
                <label>Title</label>
                <input type="text" name="title"  placeholder="Title" value="{{ old('title') }}" />
            </div>
        </div>

        <div class="col-sm-4">
            <div class="input-style-1">
                <label>Attach Video</label>
                <input type="file" name="attatchment_video" class="form-control">
            </div>
        </div>

        <div class="col-sm-2">
            <label>Active</label><br>
            <label class="radio-inline">
                <input type="radio" name="active" value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" name="active" value="0" {{ old('active', 0) == 0 ? 'checked' : '' }}> No
            </label>
        </div>

        <div class="col-sm-2">
            <label>Its Video</label><br>
            <label class="radio-inline">
                <input type="radio" name="its_video" value="1" {{ old('its_video', 0) == 1 ? 'checked' : '' }}> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" name="its_video" value="0" {{ old('its_video', 0) == 0 ? 'checked' : '' }}> No
            </label>
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

    <div class="row mt-15">
        <div class="col-sm-3">
            <label>Image</label>
            <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}" alt="Selected Image">
            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
        </div>
    </div>

    <hr>

    <div class="row mt-15">
        <div class="col-sm-3">
            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
        </div>
    </div>
</form>

	</div>

</section>
@endsection

