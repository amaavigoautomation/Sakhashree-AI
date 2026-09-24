@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <form method="POST" action="{{ route('blogauthors.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">

                    @csrf
                    <div class="row mt-15">

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Author Name <span class="mandatory">*</span></label>
                                <input type="text" name="author_name" id="model_name" data-model="BlogAuthor"
                                    placeholder="Enter Author Name" required />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" checked> No
                            </label>
                        </div>

                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <label>Image</label>
                            <div id="">
                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>
                            <input type="file" name="author_image" id="imageInput" onchange="displayImage(this)">
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </section>
@endsection
