@extends('layouts.backend')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('states.update', ['state' => $states->id]) }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->
         <input type="hidden"  name="id" value="{{ $states->id }}"  />
         <!-- Country Name -->
         {{-- <div class="col-sm-4">
            <div class="select-style-1">
               <label>Country </label>
               <div class="select-position select-sm">
                    <select class="jSelectbox" id="actionDropdown" name="country_id" >
                      <option value="">Select Country</option>
                      @foreach ($countries as $country)
                         <option value="{{ $country->id }}"
                            {{ $states->country_id == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                         </option>
                      @endforeach
                   </select>
               </div>
            </div>
         </div> --}}
         <div class="col-sm-4">
            <div class="select-style-1">
               <label>Country <span class="mandatory"> *</span></label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="country_id" required>
                  <?php foreach ($countries as $country) {
                        $selected = ($country->id == $states->country_id) ? 'selected' : '';
                    ?>
                     <option value="{{ $country->id }}" {{ $selected }}>{{ $country->name }}</option>
                 <?php } ?>
               </select>
               </div>
            </div>
         </div>
          <!-- Name -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name</label>
            <input type="text"  name="name" data-model="travel-guide"  id="model_name" placeholder="State Name" value="{{ $states->name }}" />
            </div>
         </div>
         <!-- Active Code -->
         <div class="col-sm-4">
             <label>Active</label><br>
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $states->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $states->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
      </div>
      <hr>
      <div class="row mt-15">
         <div class="col-sm-6">
            <div class="input-style-1">
               <label>Page Slug </label>
               <input type="text" id="page_slug" name="page_slug" placeholder="Page Slug" data-model="travel-guide"
                   value="{{ $states->page_slug }}" />
           </div>
         </div>

         <div class="col-sm-6">
            <div class="input-style-1">
               <label>Page Title <span class="mandatory">*</span></label>
               <input type="text" id="page_title" name="page_title" placeholder="Page Title"
                   value="{{ $states->page_title }}" />
           </div>
         </div>
      </div>


      <div class="row mt-15">
         <div class="col-sm-12">
            <div class="input-style-1">
               <label>Page URL</label>
               <textarea rows="1" name="page_url" id="page_url" data-model="" placeholder="Page URL">{{ $states->page_url }}</textarea>
           </div>
         </div>
      </div>

      <div class="row mt-15">
         <div class="col-sm-6">
            <div class="input-style-1">
               <label>Meta Description</label>
               <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ $states->meta_description }}</textarea>
           </div>
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
               <label>Meta Keyword</label>
               <textarea rows="5" name="meta_keyword" placeholder="Meta Keyword">{{ $states->meta_keyword }}</textarea>
           </div>
         </div>
      </div>
      <hr>
      <div class="row mt-15">
         <div class="col-sm-12">
            <div class="input-style-1">
               <label>Description</label>
               <textarea rows="5" name="description" class="rich-editor" placeholder="Enter Description">{{ $states->description }}</textarea>
           </div>
         </div>
      </div>

      <div class="row mt-15">
         <div class="col-sm-3">
         <label>Image</label>
         <div id="">
         <img id="bannerBox" class="addIcon" src="{{ $states->image_file ? asset('public/images/states/image_file/' . $states->id . '/' . $states->image_file) : asset('public/images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="image_file" id="imageInput" onchange="displayIcon(this)" >
         <span id="iconImage">{{ $states->image_file }}</span>
         </div>

         <div class="col-sm-3">
            <label>Banner Image</label>
             <div id="">
            <img id="bannerBox" class="addIcon" src="{{ $states->banner_image ? asset('public/images/states/banner_image/' . $states->id . '/' . $states->banner_image) : asset('public/images/no-image.png') }}" alt="Selected Image">
            </div>
            <input type="file" name="banner_image" id="imageInput" onchange="displayIcon(this)" >
             <span id="iconImage">{{ $states->banner_image }}</span>
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


