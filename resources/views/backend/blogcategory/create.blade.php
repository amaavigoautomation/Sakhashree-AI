@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
     @include('partials.breadcrumb')
    <!-- For Start Here -->
   <form method="POST" action="{{ route('blogcategories.store') }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
       <div class="row mt-15">
        <!-- Order -->
        <div class="col-sm-2">
            <div class="input-style-1">
                <label>Order <span class="mandatory">*</span></label>
                <input type="number" name="order" placeholder="Enter Order" value="{{ old('order') }}" required />
            </div>
         </div>
         <!-- Name -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name <span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Enter Name" id="model_name"  data-model="blog" value="{{ old('name') }}" required />
            </div>
         </div>

          <!-- Page Title -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Page Title <span class="mandatory">*</span></label>
            <input type="text" id="page_title"  name="page_title" placeholder="Enter Page Title" value="{{ old('page_title') }}" required />
            </div>
         </div>
         <div class="col-sm-2">
            <!-- Active Code -->
             <label>Active</label><br>
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline"  value="1" {{ old('active') == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ old('active') == 0 ? 'checked' : '' }}> No
            </label>
         </div>
       </div>
       <hr>
    <div class="row mt-15">
    <!-- Page Slug -->
     <div class="col-sm-4">
            <div class="input-style-1">
            <label>Page Slug</label>
            <input type="text" id="page_slug" name="page_slug" placeholder="Enter Page Slug"  data-model="blog" value="{{ old('page_slug') }}" />
            </div>
     </div>

    <!-- Page Url -->
     <div class="col-sm-8">
            <div class="input-style-1">
            <label>Page Url</label>
            <input type="text" id="page_url" name="page_url" placeholder="Page Url" readonly />
            </div>
     </div>
     <div><hr></div>
     <!-- Meta Description -->
     <div class="row mt-15">
        <div class="col-sm-12">
            <div class="input-style-1">
            <label>Meta Description</label>
            <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
            </div>
        </div>
     </div>
     <div><hr></div>
     <div class="row mt-15">
        <div class="col-sm-3">
            <label>Image File</label>
             <div id=""><img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}" alt="Selected Image"></div>
             <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
        </div>
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
	</div>
</form>
@endsection


