@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            <!-- Breadcrumb -->
            @include('partials.breadcrumb')

            <div class="card-style mt-20">
                {{--
                <h4 class="mb-20">Create FAQ Type</h4> --}}

                <form action="{{ route('faq_types.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Name -->
                        <div class="col-sm-5">
                            <div class="input-style-1">
                                <label>FAQ Category Name <span class="mandatory">*</span></label>

                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Enter FAQ Category Name" required>
                            </div>
                        </div>

                        <!-- Active -->
                        <div class="col-sm-3">
                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ old('active', 0) == 1 ? 'checked' : '' }}> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ old('active', 0) == 0 ? 'checked' : '' }}> Inactive
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <!-- Icon -->
                        <div class="col-sm-4">
                            <label>Category Icon</label>

                            <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                alt="Category Icon">

                            <input type="file" name="icon" id="imageInput"
                                accept="image/jpeg,image/jpg,image/png,image/webp" onchange="displayImage(this)">
                            <small class="text-muted d-block mt-2">
                                <strong>Maximum file size:</strong> 5 MB
                            </small>
                            <small class="text-muted d-block mt-2">
                                <strong>Image Requirements:</strong><br>
                                Width: 40px × Height: 40px
                            </small>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Create
                            </button>
                        </div>
                    </div>
            </div>

            </form>

        </div>

        </div>

    </section>
@endsection
