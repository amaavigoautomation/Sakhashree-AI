@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <div class="card-style mt-20">
                <form method="POST" action="{{ route('galleries.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <!-- Preview Container -->
                            <div id="previewContainer" style="margin:10px 0px; display:flex; gap:10px; flex-wrap:wrap;"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Add Images <span class="mandatory">*</span></label>
                                <input type="file" name="image_file[]" id="imageInput" class="form-control" multiple
                                    required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" checked> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"> No
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
    <script>
        let selectedFiles = [];

        $('#imageInput').on('change', function(event) {
            selectedFiles = Array.from(this.files); // store current files
            renderPreviews();
        });

        // Render preview thumbnails
        function renderPreviews() {
            let preview = $('#previewContainer');
            preview.html('');

            selectedFiles.forEach((file, index) => {
                let reader = new FileReader();

                reader.onload = function(e) {
                    let imgBox = $(`
                        <div style="position:relative; width:100px; height:100px;">
                            <img src="${e.target.result}"
                                style="width:100%; height:100%; object-fit:cover;
                                        border:1px solid #ccc; border-radius:6px;">
                            <button data-index="${index}"
                                    class="deleteImage"
                                    style="position:absolute; top:2px; right:2px;
                                        background:red; color:white; border:none;
                                        border-radius:50%; width:22px; height:22px;
                                        cursor:pointer; font-size:12px; line-height:20px;">
                                ×
                            </button>
                        </div>
                    `);
                    preview.append(imgBox);
                };

                reader.readAsDataURL(file);
            });

            updateInputFiles();
        }

        // Remove image from array
        $(document).on('click', '.deleteImage', function() {
            let index = $(this).data('index');
            selectedFiles.splice(index, 1);
            renderPreviews();
        });

        // Replace the original input's FileList
        function updateInputFiles() {
            let input = document.getElementById('imageInput');
            let dataTransfer = new DataTransfer();

            selectedFiles.forEach(file => dataTransfer.items.add(file));

            input.files = dataTransfer.files; // set updated file list
        }
    </script>
@endsection
