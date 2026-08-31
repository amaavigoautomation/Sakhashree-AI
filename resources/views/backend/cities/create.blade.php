@extends('layouts.backend')

@section('content')

<section class="section">
	<div class="container-fluid">
     @include('partials.breadcrumb')
     <div class="card-style mt-20">
   <form method="POST" action="{{ route('cities.store') }}" enctype="multipart/form-data">
       @csrf
      <div class="row mt-15">
         <!-- Country Name -->
         <div class="col-sm-3">
            <div class="select-style-1">
               <label>Country <span class="mandatory"> *</span></label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="country_id" required>
                  <option value="">Select</option>
                   <?php
                        foreach ($countries as $country) { ?>
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    <?php } ?>
               </select>
               </div>
            </div>
         </div>
         <!-- State Name -->
          <div class="col-sm-3">
            <div class="select-style-1">
               <label>States <span class="mandatory"> *</span></label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="state_id" required>
                  <option value="">Select State</option>
                   <?php
                        foreach ($states as $state) { ?>
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    <?php } ?>
               </select>
               </div>
            </div>
         </div>
         {{--  name --}}
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Name <span class="mandatory">*</span></label>
            <input type="text"  name="name" data-model="city" id="model_name" placeholder="City Name" required />
            </div>
         </div>

         <!-- Active Code -->
         <div class="col-sm-3">
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
                <input type="text" id="page_slug"  data-model="city" name="page_slug" placeholder="Page Slug" />
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
                  <textarea rows="1" name="page_url" data-model="" id="page_url" placeholder="Page URL"></textarea>
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

       <hr>
       <!-- Row 2 -->
       <div class="row mt-15">
        <div class="col-sm-3">
            <label>Image</label>
            <div id="">
                <img id="selectedImage" class="addedImage" src="{{ asset('public/images/no-image.png') }}"
                    alt="Selected Image"></div>
            <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
        </div>

      </div>
      <hr>
      <div class="row mt-15">
       <div class="col-sm-3">
        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
        </div>
      </div>

    </form>
	</div>
</section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#actionDropdown').on('change', function () {
            var countryId = $(this).val();
            var baseUrl = "{{ secure_url('/') }}";

            if (countryId) {
                $.ajax({
                    type: 'GET',
                    url: baseUrl + '/get-states/' + countryId,
                    success: function (data) {
                        $('#stateDropdown').empty().append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('#stateDropdown').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: baseUrl + '/get-countrydata/' + countryId,
                    success: function (data) {
                        $('#CountryName').val(data.countryName);
                        $('#CountryCode').val(data.countryCode);
                    }
                });
            } else {
                $('#stateDropdown').empty();
            }
        });
    });
    </script>


