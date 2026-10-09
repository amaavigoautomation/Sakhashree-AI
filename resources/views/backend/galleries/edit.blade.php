@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <div class="card-style mt-20">
                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mt-15">

                        <div class="col-sm-4">
                            <label>Description <span class="mandatory">*</span></label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $gallery->description }}</textarea>
                        </div>
                        <div class="col-sm-4">
                            <label>gallery Image</label>
                            <div id="">
                                <img id="selectedImage" class="addedImage"
                                    src="{{ $gallery->image_file ? asset('public/images/galleries/image_file/' . $gallery->image_file) : asset('public/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>
                            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
                            <span id="iconImage">{{ $gallery->image }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ $gallery->active == 1 ? 'checked' : '' }}> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ $gallery->active == 0 ? 'checked' : '' }}> Inactive
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
