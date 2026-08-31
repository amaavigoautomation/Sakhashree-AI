@extends('layouts.backend')

@section('content')

<section class="section">
	<div class="container-fluid">
     @include('partials.breadcrumb')

   <form method="POST" action="{{ route('videotag.update', ['videotag' => $videotags->id]) }}" enctype="multipart/form-data">
  <div class="card-style mt-20">

       @method('PUT')
       @csrf
      <div class="row mt-15">
         <!-- Name -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name <span class="mandatory">*</span></label>
            <input type="text"  name="name" id="model_name" data-model="video_tags" placeholder="Enter Name" required="true" value="{{ $videotags->name  }}" />
            </div>
         </div>

          <!-- Page Title -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Page Title <span class="mandatory">*</span></label>
            <input type="text" id="page_title" name="page_title" placeholder="Enter Page Title" required="true" value="{{ $videotags->page_title  }}" />
            </div>
         </div>

         <!-- Active Code -->
         <div class="col-sm-3">
             <label>Active</label><br>
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $videotags->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $videotags->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
      </div>
      <hr>
<div class="row mt-15">
            <!-- Page Slug -->
     <div class="col-sm-4">
            <div class="input-style-1">
            <label>Page Slug</label>
            <input type="text" id="page_slug" data-model="video_tags" name="page_slug" placeholder="Enter Page Slug" readonly value="{{ $videotags->page_slug  }}"/>
            </div>
     </div>

    <!-- Page Url -->
     <div class="col-sm-8">
            <div class="input-style-1">
            <label>Page Url</label>
            <input type="text" id="page_url" name="page_url" placeholder="Page Url" readonly value="{{ $videotags->page_url  }}" />
            </div>
     </div>
     <div><hr></div>
     <!-- Meta Description -->
     <div class="col-sm-12">
            <div class="input-style-1">
            <label>Meta Description</label>
            <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ $videotags->meta_description  }}  </textarea>
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
</form>
</section>
@endsection

