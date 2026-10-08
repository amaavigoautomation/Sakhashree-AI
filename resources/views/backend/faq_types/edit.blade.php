@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            @include('partials.breadcrumb')

            <div class="card-style mt-20">

                <form action="{{ route('faq_types.update', ['faq_type' => $faqType->id]) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- FAQ Category Information --}}
                    <div class="row">

                        {{-- FAQ Category Name --}}
                        <div class="col-sm-5">
                            <div class="input-style-1">
                                <label>
                                    FAQ Category Name <span class="mandatory">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name', $faqType->name) }}"
                                    placeholder="Enter FAQ Category Name" required>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="col-sm-2">
                            <label>Status</label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ old('active', $faqType->active) == 1 ? 'checked' : '' }}>
                                Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ old('active', $faqType->active) == 0 ? 'checked' : '' }}>
                                Inactive
                            </label>
                        </div>

                    </div>

                    <hr>

                    {{-- Category Icon --}}
                    <div class="row">

                        <div class="col-sm-4">
                            <label>Category Icon</label>
                            <img id="selectedImage" class="addedImage"
                                src="{{ $faqType->icon
                                    ? asset('public/images/icon/' . $faqType->id . '/' . $faqType->icon)
                                    : asset('dist/images/no-image.png') }}"
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

                    {{-- Update --}}
                    <div class="row mt-15">

                        <div class="col-sm-3">

                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Update
                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </section>
@endsection
