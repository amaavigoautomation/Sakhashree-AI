@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <form method="POST" action="{{ route('supplier.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    @csrf
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <h3>Supplier Information</h3>
                        </div>
                    </div>

                    {{-- Row 1 --}}
                    <div class="row mt-15">
                        <div class="col-sm-2">
                            <div class="select-style-1">
                                <label for="salutation_id">Salutation <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select id="salutation_id" name="salutation_id" class="jSelectbox" required>
                                        <option value="">Select</option>
                                        @foreach ($salutation as $sallu)
                                            <option value="{{ $sallu->id }}">{{ $sallu->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" id="model_name" data-model="supplier"
                                    placeholder="Enter name" required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Email </label>
                                <input type="email" name="email" placeholder="Enter email" />
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="0" checked> No
                            </label>
                        </div>

                        <div class="col-sm-2">
                            <label>Its Approved</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="its_approved" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="its_approved" value="0" checked> No
                            </label>
                        </div>
                    </div>

                    {{-- Row 2 --}}
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Country <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select name="country_id" id="country_id" class="form-group custom-select" required>
                                        <option>Select Country</option>
                                        <?php foreach ($countries as $key => $country) { ?>
                                        <option value="{{ $country->id }}" data-code="{{ $country->calling_code }}"
                                            data-timezone="{{ $country->timezone_id }}">
                                            {{ $country->name }}
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="timezone_id">Timezone</label>
                                <div class="select-position select-sm">
                                    <select id="timezone_id" name="timezone_id" class="select-position select-sm">
                                        <option value="">Select Timezone</option>
                                        @foreach ($timezone as $timezones)
                                            <option value="{{ $timezones->id }}">{{ $timezones->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>State</label>
                                <div class="select-position select-sm">
                                    <select class="select-position select-sm" name="state_id" id="state">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>City</label>
                                <div class="select-position select-sm">
                                    <select class="select-position select-sm" name="city_id" id="cityDropdown">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Row 3 --}}
                    <div class="row mt-15">
                        <div class="col-md-3 form-group">
                            <div class="row input-style-1">
                                <label for="contact_no">Contact No</label>
                                <div class="col-md-4 col-4" style="padding-right: 0px">
                                    <input type="text" name="calling_code" id="calling_code" placeholder="+1" readonly
                                        class="form-control style-border">
                                </div>
                                <div class="col-md-8 col-8" style="padding-left: 0px">
                                    <input type="number" name="contact_no" placeholder="Contact No"
                                        class="form-control style-border" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Alternate No</label>
                                <input type="number" name="alternate_no" placeholder="Enter Alternate No" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Date of Birth</label>
                                <input type="date" name="date_of_birth" placeholder="Enter DOB" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Zipcode</label>
                                <input type="number" name="zipcode" placeholder="Enter Zipcode" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Address</label>
                                <textarea name="address" rows="5" placeholder="Enter address"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <h3>Supplier Company</h3>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Company Name</label>
                                <input type="text" name="company_name" placeholder="Enter Company Name" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Enter email" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Contact No</label>
                                <input type="number" name="contact" placeholder="Enter contact" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Alternate No</label>
                                <input type="number" name="alternate_no" placeholder="Enter Alternate No" />
                            </div>
                        </div>



                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Website</label>
                                <input type="url" name="website" placeholder="Enter website" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-8">
                            <div class="input-style-1">
                                <label>Company Address</label>
                                <textarea name="company_address" rows="8" placeholder="Enter Company Address"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label>Company Logo</label>
                            <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                alt="Selected Image">
                            <input type="file" name="company_logo" id="imageInput" onchange="displayImage(this)">
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <h3>SEO Details</h3>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_slug">Page Slug <span class="mandatory">*</span></label>
                                <input type="text" id="page_slug" data-model="supplier" name="page_slug"
                                    placeholder="Page Slug" />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_title">Page Title</label>
                                <input type="text" id="page_title" name="page_title" placeholder="Page Title" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label for="page_url">Page Url</label>
                                <input type="url" id="page_url" name="page_url" placeholder="Page URL" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Meta Description</label>
                                <textarea rows="5" name="meta_description" class="rich-editor" placeholder="Enter meta description"></textarea>
                            </div>
                        </div>
                    </div>


                    <hr>

                    <div class="row mt-15">
                        <label>Image File</label>
                        <div class="col-sm-3">
                            <img id="iconBox" class="addedImage" src="{{ asset('public/images/no-image.png') }}"
                                alt="Selected Icon">
                            <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
                        </div>
                        <div class="col-sm-3">
                        <label>Its Admin Supplier</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="its_admin_supplier" value="1" checked> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="its_admin_supplier" value="0" > No
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
