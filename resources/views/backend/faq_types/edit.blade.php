@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            <!-- Breadcrumb -->
            @include('partials.breadcrumb')

            <div class="card-style mt-20">

                <form action="{{ route('faq_types.update', ['faq_type' => $faqType->id]) }}" enctype="multipart/form-data"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="input-style-1">
                        <label>Name <span class="mandatory">*</span></label>

                        <input type="text" name="name" value="{{ old('name', $faqType->name) }}"
                            placeholder="Enter FAQ type name">

                    </div>

                    <!-- Icon -->
                    <div class="col-sm-3">
                        <label>Icon</label>
                        <div>

                            <img id="selectedImage" class="addedImage"
                                src="{{ $faqType->icon ? asset('public/images/icon/' . $faqType->id . '/' . $faqType->icon) : asset('dist/images/no-image.png') }}"
                                alt="Selected Icon">
                        </div>
                        <input type="file" name="icon" id="imageInput" onchange="displayImage(this)">
                        <span id="iconImage">{{ $faqType->icon }}</span>

                    </div>

                    <!-- Active -->
                    <div class="row mt-15">

                        <div class="col-sm-4">

                            <label>Active</label>
                            <br>

                            <label class="radio-inline">

                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ old('active', $faqType->active) == 1 ? 'checked' : '' }}>Yes</label>

                            <label class="radio-inline">

                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active', $faqType->active) == 0 ? 'checked' : '' }}> No </label>
                        </div>
                    </div>

                    <!-- Buttons -->
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
