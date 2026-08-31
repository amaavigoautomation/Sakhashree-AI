@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
     @include('partials.breadcrumb')


    <!-- For Start Here -->
   <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
  <div class="card-style mt-20">

       @csrf
      <div class="row mt-15">
         <!-- Name -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Name <span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Country Name" required />
            </div>
         </div>
         <!-- Alpha 2 Code -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Alpha 2 Code</label>
            <input type="text" maxlength="2"  name="alpha_2_code" placeholder="Alpha 2 Code"  />
            </div>
         </div>
         <!-- Alpha 3 Code -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Alpha 3 Code</label>
            <input type="text" maxlength="3"  name="alpha_3_code" placeholder="Alpha 3 Code"  />
            </div>
         </div>
         <!-- Calling Code -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label >Calling Code</label>
            <input type="text" maxlength="5"  name="calling_code" placeholder="Calling Code"  />
            </div>
         </div>
      </div>
      <div class="row mt-15">
         <div class="col-sm-3">
            <!-- Active Code -->
             <label>Active</label><br>
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" checked> No
            </label>
         </div>
          <!-- Cover Image -->
        <div class="col-sm-2">
         <label>Cover Image</label>
          <img id="selectedImage" class="addedImage" src="{{ asset('dist/images/no-image.png') }}" alt="Selected Image">
         <input type="file" name="cover_image" id="imageInput" onchange="displayImage(this)">
        </div>
            <!-- Icon Image -->
       <div class="col-sm-2">
         <label>Icon Image</label>
          <div>
         <img id="iconBox" class="addIcon" src="{{ asset('dist/images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="icon_image" id="imageInput" onchange="displayImage(this)">
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

