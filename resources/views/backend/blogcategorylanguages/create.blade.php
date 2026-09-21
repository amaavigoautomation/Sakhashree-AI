@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <!-- ========== Middle Content-wrapper start ========== -->
            <!-- Add New Button -->

            <!-- For Start Here -->
            <form method="POST" action="{{ route('blogcategorylanguages.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">

                    @csrf
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Category <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox selectCategory" id="actionDropdown" name="blog_category_id"
                                        required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Language <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox selectCategory" id="actionDropdown" name="language_id"
                                        required>
                                        <option value="">Select Language</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name<span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Name"  required="true" value="{{ old('name') }}" />
                            </div>
                        </div>
                        <div class="col-sm-2">

                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline"  value="1" {{ old('active') == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline"  value="0" {{ old('active') == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                            {{-- <button class="btn btn-warning" type="reset">Reset</button> --}}
                        </div>
                    </div>

                </div>
            </form>
    </section>
@endsection
