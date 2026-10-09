@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <div class="card-style mt-20">
                <form method="POST" action="{{ route('galleries.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-15">
                        <!-- Preview Container -->
                        {{-- <div class="col-sm-12">
                            <div id="previewContainer" style="margin:10px 0px; display:flex; gap:10px; flex-wrap:wrap;"></div>
                        </div> --}}
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Description <span class="mandatory">*</span></label>
                                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-style-1">
                                <label>Gallery Image</label>
                                <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}"
                                    alt="Selected Image">
                                <input type="file" name="image_file" id="imageInput" accept="image/*"
                                    onchange="displayImage(this)">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" checked> Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"> Inactive
                            </label>
                        </div>

                    </div>
                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                        </div>
                    </div>
                </form>
            </div>

    </section>
    {{-- <script>
        $('#imageInput').on('change', function(event) {
            let preview = $('#previewContainer');
            preview.html('');
            let file = event.target.files[0];
            if (!file) return;
            let reader = new FileReader();
            reader.onload = function(e) {
                preview.append(`<img src="${e.target.result}" style="width:100px;height:100px;object-fit:cover;border:1px solid #ccc;border-radius:6px;">`);
            };
            reader.readAsDataURL(file);
        });
    </script> --}}
@endsection
