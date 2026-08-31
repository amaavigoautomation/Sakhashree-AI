@extends('layouts.backend')

@section('content')
<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')
        <form method="POST" action="{{ route('supplier.update', $supplier->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-style mt-20">

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
                                        <option value="{{ $sallu->id }}" {{ $supplier->salutation_id == $sallu->id ? 'selected' : '' }}>
                                            {{ $sallu->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Name <span class="mandatory">*</span></label>
                            <input type="text" name="name" value="{{ $supplier->name }}" required />
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $supplier->email }}" />
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <label>Active</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="1" {{ $supplier->active == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="0" {{ $supplier->active == 0 ? 'checked' : '' }}> No
                        </label>
                    </div>

                    <div class="col-sm-2">
                        <label>Its Approved</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="its_approved" value="1" {{ $supplier->its_approved == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="its_approved" value="0" {{ $supplier->its_approved == 0 ? 'checked' : '' }}> No
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
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ $supplier->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="select-style-1">
                            <label>Timezone</label>
                            <div class="select-position select-sm">
                                <select name="timezone_id">
                                    <option value="">Select Timezone</option>
                                    @foreach ($timezone as $tz)
                                        <option value="{{ $tz->id }}" {{ $supplier->timezone_id == $tz->id ? 'selected' : '' }}>
                                            {{ $tz->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="select-style-1">
                            <label>State</label>
                            <div class="select-position select-sm">
                                <select name="state_id" id="state">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="select-style-1">
                            <label>City</label>
                            <div class="select-position select-sm">
                                <select name="city_id" id="cityDropdown">
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
                            <label>Contact No</label>
                            <div class="col-md-4 col-4" style="padding-right: 0px">
                                <input type="text" name="calling_code" value="{{ $supplier->calling_code }}" readonly class="form-control style-border">
                            </div>
                            <div class="col-md-8 col-8" style="padding-left: 0px">
                                <input type="number" name="contact_no" value="{{ $supplier->contact_no }}" class="form-control style-border" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Alternate No</label>
                            <input type="number" name="alternate_no" value="{{ $supplier->alternate_no }}" />
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Date of Birth</label>
                            <input type="date" name="date_of_birth" value="{{ $supplier->date_of_birth }}" />
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Zipcode</label>
                            <input type="number" name="zipcode" value="{{ $supplier->zipcode }}" />
                        </div>
                    </div>
                </div>

                <div class="row mt-15">
                    <div class="col-sm-12">
                        <div class="input-style-1">
                            <label>Address</label>
                            <textarea name="address" rows="5">{{ $supplier->address }}</textarea>
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
                            <input type="text" name="company_name" value="{{ $supplierCompany->company_name }}" />
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $supplierCompany->email }}" />
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Contact No</label>
                            <input type="number" name="contact" value="{{ $supplierCompany->contact }}" />
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label>Alternate No</label>
                            <input type="number" name="alternate_no" value="{{ $supplierCompany->alternate_no }}" />
                        </div>
                    </div>
                </div>

                <div class="row mt-15">
                    <div class="col-sm-12">
                        <div class="input-style-1">
                            <label>Website</label>
                            <input type="url" name="website" value="{{ $supplierCompany->website }}" />
                        </div>
                    </div>
                </div>

                <div class="row mt-15">
                    <div class="col-sm-8">
                        <div class="input-style-1">
                            <label>Company Address</label>
                            <textarea name="company_address" rows="8">{{ $supplierCompany->company_address }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label>Company Logo</label>
                        <div>
                            <img id="selectedImage" class="addedImage" src="{{ $supplierCompany->company_logo ? asset('public/images/supplier_company/company_logo/' . $supplierCompany->id . '/' . $supplierCompany->company_logo) : asset('dist/images/no-image.png') }}" alt="Selected Image">
                        </div>
                        <input type="file" name="company_logo" id="imageInput" onchange="displayImage(this)">
                        <span id="iconImage">{{ $supplierCompany->company_logo }}</span>
                    </div>
                </div>

                <hr>

                <div class="row mt-15">
                    <div class="col-sm-12">
                        <h3>SEO Details</h3>
                    </div>
                </div>
                {{-- SEO Section --}}
                <div class="row mt-15">
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Page Slug</label>
                            <input type="text" name="page_slug" value="{{ $supplier->page_slug }}" />
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Page Title</label>
                            <input type="text" name="page_title" value="{{ $supplier->page_title }}" />
                        </div>
                    </div>
                </div>

                <div class="row mt-15">
                    <div class="col-sm-12">
                        <div class="input-style-1">
                            <label>Page URL</label>
                            <input type="url" name="page_url" value="{{ $supplier->page_url }}" readonly />
                        </div>
                    </div>
                </div>

                <div class="row mt-15">
                    <div class="col-sm-12">
                        <div class="input-style-1">
                            <label>Meta Description</label>
                            <textarea rows="5" name="meta_description">{{ $supplier->meta_description }}</textarea>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row mt-15">
                    <div class="col-sm-12">
                        <h3>Activation</h3>
                    </div>
                </div>

                <div class="row mt-15">
                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label for="password">Password</label>
                            <div class="d-flex align-items-center">
                                <input  type="password" id="password" name="password" value="{{ $supplier->password }}" disabled class="form-control"/>
                                <button  type="button" id="editPasswordBtn" class="btn btn-sm btn-outline-secondary ms-2"> ✎</button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                {{-- Image --}}
                <div class="row mt-15">
                    <label>Image File</label>
                    <div class="col-sm-3">
                        <img id="iconBox" class="addedImage" src="{{ asset('public/images/suppliers/image_file/' . $supplier->id . '/' . $supplier->image_file) }}" alt="Selected Icon">
                        <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
                    </div>
                    <div class="col-sm-3">
                    <label>Its Admin Supplier</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="its_admin_supplier" value="1" {{ $supplier->its_admin_supplier ? 'checked' : '' }}> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="its_admin_supplier" value="0" {{ !$supplier->its_admin_supplier ? 'checked' : '' }}> No
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const editButton = document.getElementById('editPasswordBtn');

        editButton.addEventListener('click', function () {
            if (passwordInput.disabled) {
                passwordInput.disabled = false;
                passwordInput.focus();
                this.textContent = '✕'; // Change icon to cancel
            } else {
                passwordInput.disabled = true;
                this.textContent = '✎'; // Change icon back to edit
            }
        });
    });
</script>
@endsection
