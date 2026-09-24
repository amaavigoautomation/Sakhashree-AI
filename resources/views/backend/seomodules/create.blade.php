@extends('layouts.backend')

@section('content')
    <!-- The Modal -->
    <div class="modal fade modal-lg" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Menu Links</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mt-15">
                        <div class="col-sm-6">
                            <div class="select-style-1">
                                <label>Controller</label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="controllerDropdown" name="controoler">
                                        <option value="">Select Controller</option>
                                        @foreach ($controllers as $controller)
                                            <option value="{{ $controller }}">{{ $controller }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="select-style-1">
                                <label>Action</label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="methods" name="action">
                                        <option value="">Select Action</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('seomodules.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    @csrf
                    <div class="row mt-15">

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Page Name <span class="mandatory">*</span></label>
                                <input type="text" name="page_name" value="{{ old('page_name') }}"
                                    placeholder="Enter Page Name" required />
                            </div>
                        </div>

                        <!-- Link -->
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Link <span class="mandatory">*</span></label>
                                <div class="input-group">
                                    <input type="hidden" placeholder="" name='controller' id="controller"
                                        class="form-control">
                                    <input type="hidden" placeholder="" name='action' id="actionName"
                                        class="form-control">
                                    <input type="text" placeholder="" name='link' id="menuLinkUrl"
                                        class="form-control" value="{{ old('link') }}" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary addAppendBtn" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-style-1">
                                <label for="page_url">Page Url</label>
                                <input type="url" id="page_url" data-model="" name="page_url"
                                    value="{{ old('page_url') }}" placeholder="Page URL" />
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <label>Meta Image</label>
                            <div id="">
                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                            </div>
                            <input type="file" name="meta_image" id="imgupload" onchange="displayImage(this)">
                        </div>

                        <div class="col-sm-3">
                            <!-- Active Code -->
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ old('active', 0) == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active', 0) == 0 ? 'checked' : '' }}> No
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
