@extends('layouts.backend')

@section('content')

<section class="section">
	<div class="container-fluid">

     @include('partials.breadcrumb')

   <form method="POST" action="{{ route('videocategories.update', ['videocategory' => $videocategories->id]) }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
       @method('PUT')
       @csrf

     <div class="row mt-15">
      <input type="hidden"  name="id" value="{{ $videocategories->id }}"  />
      <!-- Slider Banner -->
    <div class="col-sm-1">
        <div class="input-style-1">
        <label>Order <span class="mandatory">*</span></label>
        <input type="number"  name="order" placeholder="Enter order" value="{{ $videocategories->order }}" />
        </div>
    </div>
    {{-- Short Note --}}
    <div class="col-sm-2">
        <div class="input-style-1">
        <label>Name <span class="mandatory">*</span></label>
        <input type="text"  name="name" placeholder="Enter short note" id="model_name" data-model="videos" required="true" value="{{ $videocategories->name }}" />
        </div>
    </div>
    <div class="col-sm-3">
        <div class="input-style-1">
        <label>Category Class <span class="mandatory">*</span></label>
        <input type="text"  name="category_class" required placeholder="Enter category" value="{{ $videocategories->category_class }}" />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="input-style-1">
        <label>Page Title </label>
        <input type="text"  name="page_title" placeholder="Enter short note"  value="{{ $videocategories->page_title }}" />
        </div>
    </div>
    <hr>
    <div class="col-sm-4">
        <div class="input-style-1">
        <label>Page Slug </label>
        <input type="text"  name="page_slug" id="page_slug" data-model="videos" placeholder="Enter short note"   value="{{ $videocategories->page_slug }}" />
        </div>
    </div>
    <div class="col-sm-8">
        <div class="input-style-1">
        <label>Page URL </label>
        <input type="text"  name="page_url" id="page_url" placeholder="Enter url"  value="{{ $videocategories->page_url }}" />
        </div>
    </div>

    <div class="col-sm-12">
        <div class="input-style-1">
        <label>Meta Description</label>
        <textarea rows="4" name="meta_description" placeholder="Enter meta description">{{ $videocategories->meta_description }}</textarea>
        </div>
    </div>

</div>
<hr>

    <div class="row mt-15">
        <!-- Image -->
        <div class="col-sm-2">
            <label>Image File</label>

                <img id="selectedImage" class="addedImage" src="{{ $videocategories->image_file ? asset('public/images/videocategories/image_file/' . $videocategories->id . '/' . $videocategories->image_file) : asset('oublic/images/no-image.png') }}"
                    alt="Selected Image">

            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
            <span id="iconImage">{{ $videocategories->image_file }}</span>
        </div>
        <!-- Active Code -->
        <div class="col-sm-4">
            <label>Active</label><br>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="1" {{ $videocategories->active == 1 ? 'checked' : '' }}> Yes
            </label>
           <label class="radio-inline">
           <input type="radio" name="active" class="radio-inline" value="0" {{ $videocategories->active == 0 ? 'checked' : '' }}> No
           </label>
       </div>

   <div><hr></div>
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

