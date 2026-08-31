@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <!-- ========== Middle Content-wrapper start ========== -->
            <!-- Add New Button -->

            <!-- For Start Here -->
            <form method="POST" action="{{ route('blogs.update', ['blog' => $blog->id]) }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    <!-- Form Start Here -->
                    @method('PUT')
                    @csrf
                    <div class="row mt-15">
                        <!-- Id -->
                        <input type="hidden" name="id" value="{{ $blog->id }}" />
                        <div class="row mt-15">
                            <!-- Blog Date -->
                            <div class="col-sm-3">
                                <div class="input-style-1">
                                    <label>Date <span class="mandatory">*</span></label>
                                    <input type="date" name="blog_date" id="datepicker" class="date"
                                        value="{{ $blog->blog_date }}">
                                </div>
                            </div>

                            <!-- Blog Author -->
                            <div class="col-sm-3">
                                <div class="select-style-1">
                                    <label>Authors <span class="mandatory"> *</span></label>
                                    <div class="select-position select-sm">
                                        <select class="jSelectbox" id="actionDropdown" name="blog_author_id" required>
                                            @if ($blogAuthor)
                                                <option value="{{ $blogAuthor->id }}">{{ $blogAuthor->author_name }}
                                                </option>
                                            @endif
                                            @foreach ($blogAuthors as $blogAuthor)
                                                <option value="{{ $blogAuthor->id }}">{{ $blogAuthor->author_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="select-style-1">
                                    <label>Blog Tags</label>
                                    <div class="select-position select-sm">
                                        <select class="jSelectbox" id="actionDropdown" name="blogtags[]" multiple="true">
                                            @foreach ($blogtags as $blogtag)
                                                <option value="{{ $blogtag->id }}"
                                                    {{ in_array($blogtag->id, $selectedBlogTags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $blogtag->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="row mt-15">
                            <div class="col-sm-6">
                                <div class="input-style-1">
                                    <label>Title <span class="mandatory">*</span></label>
                                    <input type="text" name="title" placeholder="Title" id="model_name" data-model=""
                                        value="{{ $blog->title }}" required />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="input-style-1">
                                    <label>Page Title</label>
                                    <input type="text" id="page_title" name="page_title" placeholder="Page Title"
                                        value="{{ $blog->page_title }}" />
                                </div>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-style-1">
                                    <label>Page Slug <span class="mandatory">*</span></label>
                                    <input type="text" id="page_slug" data-model="" name="page_slug"
                                        placeholder="Page Slug" value="{{ $blog->page_slug }}" readonly />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-style-1">
                                    <label>Page Url</label>
                                    <input type="url" id="page_url" name="page_url" placeholder="Page URL"
                                        value="{{ $blog->page_url }}" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Meta Description</label>
                                    <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ $blog->meta_description }}  </textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Description</label>
                                    <textarea name="description" rows="10" class="rich-editor"> {{ $blog->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-15">
                            <div class="col-sm-3">
                                <label>Image</label>
                                <div>
                                    <img id="selectedImage" class="addedImage"
                                        src="{{ $blog->image_file ? asset('public/images/blog/image_file/' . $blog->id . '/' . $blog->image_file) : asset('dist/images/no-image.png') }}"
                                        alt="Selected Image">
                                </div>
                                <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
                                <span id="iconImage">{{ $blog->image_file }}</span>
                                {{-- <p>Width: 850 x Height: 480</p> --}}
                            </div>

                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Active</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="active" class="radio-inline" value="1"
                                                {{ $blog->active == 1 ? 'checked' : '' }}> Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="active" class="radio-inline" value="0"
                                                {{ $blog->active == 0 ? 'checked' : '' }}> No
                                        </label>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Its Video Link</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="its_video_link"
                                                class="radio-inline its_video_link " value="1"
                                                {{ $blog->its_video_link == 1 ? 'checked' : '' }}> Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="its_video_link"
                                                class="radio-inline its_video_link" value="0"
                                                {{ $blog->its_video_link == 0 ? 'checked' : '' }}> No
                                        </label>
                                    </div>
                                </div>

                                <div class="row mt-2" id="videoLinkRow">
                                    <div class="col-sm-12">
                                        <div class="input-style-1">
                                            <label>Video Link</label>
                                            <input type="url" id="video_link" name="video_link"
                                                placeholder="Video Link" value="{{ $blog->video_link }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <hr>
                        </div>
                        <div class="row mt-15">
                            <div class="col-sm-3">
                                <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                            </div>
                        </div>

                    </div>
            </form>
    </section>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            toggleVideoLink();

            // When radio changes
            $('.its_video_link').change(function() {
                toggleVideoLink();
            });

            function toggleVideoLink() {
                if ($('.its_video_link:checked').val() == "1") {
                    $('#video_link').closest('.row.mt-2').show();
                } else {
                    $('#video_link').closest('.row.mt-2').hide();
                }
            }
        });
    </script>
@endsection
