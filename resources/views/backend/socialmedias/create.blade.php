@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('socialmedias.store') }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
         <!-- Name -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
           <input type="text"
               name="name"
               placeholder="Enter Name"
               value="{{ old('name') }}"
               required>
            </div>
         </div>
         <!-- Link -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Link<span class="mandatory">*</span></label>
            <input type="text"  name="link" placeholder="Enter Link" required="true" value="{{ old('link') }}" />
            </div>
         </div>
        </div>
        <hr>
       <div class="row mt-15">
        <!-- Image -->
        <div class="col-sm-2">
         <label>Image</label>
          <div id="">
         <img id="iconBox" class="addIcon" src="{{ asset('dist/images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="image_icon" id="imageInput" onchange="displayImage(this)">
        </div>
         <div class="col-sm-6">
            <!-- Active Code -->
             <label>Active</label><br>
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ old('active', 0) == 0 ? 'checked' : '' }}> No
            </label>
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
</form>
</section>
@endsection
<script>

</script>

