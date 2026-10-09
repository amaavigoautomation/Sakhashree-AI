@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
     @include('partials.breadcrumb')

    <!-- For Start Here -->
   <form method="POST" action="{{ route('blogtags.store') }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
       <div class="row mt-15">
         <!-- Name -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name <span class="mandatory">*</span></label>
            <input type="text"  name="name" id="model_name" data-model="blog-tags" placeholder="Enter Name" required="true" />
            </div>
         </div>

          <!-- Page Title -->
         <div class="col-sm-4">
            <div class="input-style-1">
                <label for="page_title">Meta Title <span class="mandatory">*</span></label>
                <input type="text" id="page_title"  name="page_title" placeholder="Meta Title" required />
            </div>
         </div>

         <!-- Active Code -->
         <div class="col-sm-4">
             <label>Status</label><br>
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1"> Active
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" checked> Inactive
            </label>
         </div>
       </div>
       <hr>

    <div class="row mt-15">
    <!-- Page Slug -->
     <div class="col-sm-6">
            <div class="input-style-1">
            <label>Meta Slug</label>
            <input type="text" id="page_slug"  name="page_slug" placeholder="Enter Meta Slug" />
            </div>
     </div>

    <!-- Page Url -->
     <div class="col-sm-6">
            <div class="input-style-1">
            <label>Meta Url</label>
            <input type="text" id="page_url" name="page_url" placeholder="Meta Url" />
            </div>
     </div>
     <div><hr></div>

     <!-- Meta Description -->
     <div class="col-sm-12">
            <div class="input-style-1">
            <label>Meta Description</label>
            <textarea rows="5" name="meta_description" placeholder="Meta Description"></textarea>
            </div>
    </div>
    </div>
    <hr>
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


