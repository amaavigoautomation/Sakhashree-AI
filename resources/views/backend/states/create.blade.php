@extends('layouts.backend')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')


    <!-- For Start Here -->
   <form method="POST" action="{{ route('states.store') }}" enctype="multipart/form-data">
  <div class="card-style mt-20">

       @csrf
      <div class="row mt-15">

         <!-- Country Name -->
         <div class="col-sm-4">
            <div class="select-style-1">
               <label>Country </label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="country_id" >
                  <option value="">Select</option>
                      @foreach ($countries as $country)
                     <option value="{{ $country->name }}">{{ $country->name }}</option>
                      @endforeach
               </select>
               </div>
            </div>
         </div>
          <!-- Name -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name</label>
            <input type="text" name="name" data-model="travel-guide"  id="model_name" placeholder="State Name"  />
            </div>
         </div>
         <div class="col-sm-4">
            <!-- Active Code -->
             <label>Active</label><br>
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
         <div class="col-sm-6">
            <div class="input-style-1">
               <label for="page_slug">Page Slug </label>
               <input type="text" id="page_slug" data-model="travel-guide"  name="page_slug" placeholder="Page Slug" />
           </div>
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
               <label for="page_title">Page Title </label>
               <input type="text" id="page_title" name="page_title" placeholder="Page Title" />
           </div>
         </div>
      </div>

      <div class="row mt-15">
         <div class="col-sm-12">
            <div class="input-style-1">
               <label>Page URL</label>
               <textarea rows="1" name="page_url" id="page_url" placeholder="Page URL"></textarea>
           </div>
         </div>
      </div>

      <div class="row mt-15">
         <div class="col-sm-6">
         <div class="input-style-1">
            <label>Meta Description</label>
            <textarea rows="5" name="meta_description" placeholder="Meta Description"></textarea>
        </div>
         </div>
        <div class="col-sm-6">
        <div class="input-style-1">
            <label>Meta Keyword</label>
            <textarea rows="5" name="meta_keyword" placeholder="Meta Keyword"></textarea>
        </div>
        </div>
      </div>

      <hr>
      <div class="row mt-15">
         <div class="col-sm-12">
            <div class="input-style-1">
               <label>Description</label>
               <textarea rows="5" name="description" class="rich-editor" placeholder="Description"></textarea>
           </div>
         </div>
      </div>

      <div class="row mt-15">
         <div class="col-sm-3">
            <label>Image</label>
            <div id="">
            <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}" alt="Selected Image">
            </div>
            <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
        </div>

        <div class="col-sm-3">
         <label>Banner Image</label>
         <div id="">
         <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="banner_image" id="imgupload" onchange="displayImage(this)">
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

