@extends('layouts.backend')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('cities.update', ['city' => $city->id]) }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->
         <input type="hidden" name="id" value="{{ $city->id }}"  />
         <!-- Country -->
         <div class="col-sm-3">
            <div class="select-style-1">
               <label>Country <span class="mandatory"> *</span></label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="country_id" required>
                  <?php foreach ($countries as $country) { ?>
                     <option value="{{ $country->id }}" {{ $city->country_id == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                 <?php } ?>
               </select>
               </div>
            </div>
         </div>
         <!--State-->
          <div class="col-sm-3">
            <div class="select-style-1">
               <label>State</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="stateDropdown" name="state_id" required>
                  <?php foreach ($states as $state) { ?>
                     <option value="{{ $state->id }}" {{ $city->state_id == $state->id ? 'selected' : '' }}>
                        {{ $state->name }}
                    </option>
                 <?php } ?>
               </select>
               </div>
            </div>
         </div>
          <!-- Name -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Name <span class="mandatory">*</span></label>
            <input type="text" id="model_name" data-model="city"  name="name" placeholder="State Name" required value="{{ $city->name }}"  />
            </div>
         </div>
         <!-- Active Code -->
         <div class="col-sm-3">
             <label>Active</label><br>
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $city->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $city->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
      </div>
      <hr>

      <div class="row mt-15">
        <div class="col-sm-6">
           <div class="input-style-1">
              <label>Page Slug </label>
              <input type="text" id="page_slug" name="page_slug" placeholder="Page Slug" data-model="city"
                  value="{{ $city->page_slug }}" />
          </div>
        </div>
     
        <div class="col-sm-6">
           <div class="input-style-1">
              <label>Page Title <span class="mandatory">*</span></label>
              <input type="text" id="page_title"  name="page_title" placeholder="Page Title"
                  value="{{ $city->page_title }}" />
          </div>
        </div>
     </div>

     <div class="row mt-15">
        <div class="col-sm-12">
           <div class="input-style-1">
              <label>Page URL</label>
              <textarea rows="1" name="page_url"  data-model="city" id="page_url" placeholder="Page URL">{{ $city->page_url }}</textarea>
          </div>
        </div>
     </div>

     <div class="row mt-15">
        <div class="col-sm-6">
           <div class="input-style-1">
              <label>Meta Description</label>
              <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ $city->meta_description }}</textarea>
          </div>
        </div>
        <div class="col-sm-6">
           <div class="input-style-1">
              <label>Meta Keyword</label>
              <textarea rows="5" name="meta_keyword" placeholder="Meta Keyword">{{ $city->meta_keyword }}</textarea>
          </div>
        </div>
     </div>
     <hr>
     <div class="row mt-15">
        <div class="col-sm-12">
           <div class="input-style-1">
              <label>Description</label>
              <textarea rows="5" name="description" class="rich-editor" placeholder="Enter Description">{{ $city->description }}</textarea>
          </div>
        </div>
     </div>

     <hr>
      <div class="row mt-15">
        <div class="col-sm-2">
            <label>Image </label>

                <img id="selectedImage" class="addedImage" src="{{ $city->image_file ? asset('public/images/cities/image_file/' . $city->id . '/' . $city->image_file) : asset('public/images/no-image.png') }}"
                    alt="Selected Image">
            <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
            <span id="iconImage">{{ $city->image_file }}</span>
        </div>
      </div>
      <hr>
      <div class="row mt-15">
       <div class="col-sm-3">
        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>

        </div>
      </div>

	</div>
</form>
</section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Change event for the country dropdown
        $('#actionDropdown').on('change', function () {
            var countryId = $(this).val();
            if (countryId) {
                // Make an AJAX request to get the states based on the selected country
                $.ajax({
                    type: 'GET',
                    url: 'http://localhost/project/Laravel/Etos2/public/get-states/' + countryId, // Replace with the actual route to get states
                    success: function (data) {
                        // Clear the current options in the state dropdown
                        $('#stateDropdown').empty();
                        // Add the defualt select box
                        $('#stateDropdown').append('<option value="">Select</option>');
                        // Add the new options based on the response
                        $.each(data, function (key, value) {

                            $('#stateDropdown').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
             } else {
                // If no country is selected, clear the state dropdown
                $('#stateDropdown').empty();
            }
        });
    });
</script>


