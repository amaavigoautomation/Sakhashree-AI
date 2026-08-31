@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
                <div class="card-style mt-20">

                    @method('PUT')
                    @csrf
                    <div class="row mt-15">
                        <input type="hidden" name="id" value="{{ $user->id }}" />
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Admin Type <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="actionDropdown" name="admin_type_id" required>
                                        <option value="">Select</option>
                                        <?php foreach ($adminTypes as $adminType){ 
                                            $selected = ($adminType->id == $user->admin_type_id) ? 'selected' : ''; ?>
                                        <option value="{{ $adminType->id }}" {{ $selected }}>{{ $adminType->name }}
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Enter Your Username" required
                                    value="{{ $user->name }}" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Contact <span class="mandatory">*</span></label>
                                <input type="number" name="contact_no" placeholder="Enter Your Contact" class="numeric"
                                    required value="{{ $user->contact_no }}" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Alternate No <span class="mandatory">*</span></label>
                                <input type="number" name="alternate_no" placeholder="Enter Alternate No" class="numeric"
                                    required value="{{ $user->alternate_no }}" />
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row mt-15">

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Email/UserName <span class="mandatory">*</span></label>
                                <input type="email" name="email" placeholder="Enter Your Email" required
                                    value="{{ $user->email }}" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ $user->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ $user->active == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Its Seo Users</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="its_seo_users" class="radio-inline" value="1"
                                    {{ $user->its_seo_users == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="its_seo_users" class="radio-inline" value="0"
                                    {{ $user->its_seo_users == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Its Reporting Manager</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="its_report_manager" class="radio-inline" value="1"
                                    {{ $user->its_report_manager == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="its_report_manager" class="radio-inline" value="0"
                                    {{ $user->its_report_manager == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                    </div>
                    <hr>
                    <div class="row mt-15">

                        <div class="col-sm-3">
                            <label>Image</label>
                            <div>
                                <img id="selectedImage"
                                    class="addedImage" src="{{ $user->image ? asset('public/images/users/image/' . $user->id . '/' . $user->image) : asset('dist/images/no-image.png') }}" alt="Selected Image">
                            </div>
                            <input type="file" name="image" id="imageInput" onchange="displayImage(this)">
                            <span id="iconImage">{{ $user->image }}</span>
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
    </section>
@endsection

{{-- <script>
    function displayImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#selectedIcon').attr('src', e.target.result);
                $('#iconImage').text(input.files[0].name);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script> --}}
