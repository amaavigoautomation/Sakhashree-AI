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
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>

                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Enter FAQ type name">
                            </div>
                        </div>

                        <!-- Active -->
                        <div class="col-sm-2">
                            <label>Active</label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ old('active', 1) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ old('active') == 0 && old('active') !== null ? 'checked' : '' }}>
                                No
                            </label>
                        </div>
                    </div>

                    <!-- Icon -->
                    <div class="col-sm-3">
                        <label>Icon</label>
                        <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                            alt="Selected Icon">
                        <input type="file" name="icon" id="imageInput" onchange="displayImage(this)">
                    </div>

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
