@extends('layouts.backend')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

   <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
  <div class="card-style mt-20">

       @csrf
      <div class="row mt-15">
          <!-- Name -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name <span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Name" required="true" />
            </div>
         </div>

         <div  class="col-sm-4">
            <div class="input-style-1">
              <label>Add Images <span class="mandatory">*</span></label>
              <input type="file" name="image_file[]" class="form-control" multiple required>
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
       <div class="col-sm-3">
        <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
        </div>
      </div>

	</div>
</form>
</section>
@endsection

