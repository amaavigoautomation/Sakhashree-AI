@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    @csrf
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <div class="select-style-1">
                               <label>Admin Type <span class="mandatory">*</span></label>
                               <div class="select-position select-sm">
                               <select class="jSelectbox" id="actionDropdown" name="admin_type_id" required>
                                  <option value="">Select</option>
                                      @foreach ($adminTypes as $adminType)
                                     <option value="{{ $adminType->id }}">{{ $adminType->name }}</option>
                                      @endforeach
                               </select>
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-3">
                            <div class="input-style-1">
                            <label>Name <span class="mandatory">*</span></label>
                            <input type="name"  name="name" placeholder="Enter Your name" required/>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Contact <span class="mandatory">*</span></label>
                                <input type="number"  name="contact_no" placeholder="Enter Your Contact" class="numeric" required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                            <label>Alternate No <span class="mandatory">*</span></label>
                            <input type="number"  name="alternate_no" placeholder="Enter Alternate No" class="numeric" required />
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-15">

                            <div class="col-sm-3">
                                <div class="input-style-1">
                                <label>Email/UserName <span class="mandatory">*</span></label>
                                <input type="email"  name="email" placeholder="Enter Your User Name" required />
                                </div>
                            </div>

                            {{-- <div class="col-sm-3">
                                <div class="input-style-1">
                                <label>Password <span class="mandatory">*</span></label>
                                <input type="password"  name="password" placeholder="Enter Your Password" required />
                                </div>
                            </div> --}}

                            <div class="col-sm-3">
                                <label>Active </label><br>
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
                                <img id="bannerBox" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                alt="Selected Image">
                                <input type="file" name="image" id="imgupload" onchange="displayImage(this)">
                            </div>

                            <div class="col-sm-3">
                                <label>Its Seo Users</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="its_seo_users" class="radio-inline" value="1"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="its_seo_users" class="radio-inline" value="0" checked>
                                    No
                                </label>
                            </div>

                            <div class="col-sm-3">

                                <label>Its Report Manager</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="its_report_manager" class="radio-inline" value="1"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="its_report_manager" class="radio-inline" value="0"
                                        checked> No
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
                </div>
            </form>
    </section>
@endsection
{{-- <script>
    function displayImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('selectedImage').setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script> --}}
