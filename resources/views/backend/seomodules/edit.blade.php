@extends('layouts.backend')

@section('content')
<!-- The Modal -->
<div class="modal fade modal-lg" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Menu Links</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
             <div class="row mt-15">
                <div class="col-sm-6">
                  <div class="select-style-1">
                     <label>Controller</label>
                     <div class="select-position select-sm">
                     <select class="jSelectbox" id="controllerDropdown" name="controoler">
                       <option value="">Select Controller</option>
                     @foreach ($controllers as $controller)
                         <option value="{{ $controller }}">{{ $controller }}</option>
                     @endforeach
                     </select>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="select-style-1">
                     <label>Action</label>
                     <div class="select-position select-sm">
                     <select class="jSelectbox" id="methods" name="action">
                        <option value="">Select Action</option>
                     </select>
                     </div>
                  </div>
               </div>
             </div>
        </div>

      </div>
    </div>
  </div>
<section class="section">
	<div class="container-fluid">
     @include('partials.breadcrumb')

    <form method="POST" action="{{ route('seomodules.update', ['seomodule' => $seomodule->id]) }}" enctype="multipart/form-data">
      <div class="card-style mt-20">

           @method('PUT')
           @csrf
          <div class="row mt-15">
             <div class="col-sm-3">
                <div class="input-style-1">
                <label>Page Name <span class="mandatory">*</span></label>
                <input type="text"  name="page_name" id="model_name" data-model="" placeholder="Enter Page Name" required value="{{ $seomodule->page_name }}" />
                </div>
             </div>

             <div class="col-sm-3">
                <div class="input-style-1">
                <label>Page Slug </label>
                <input type="text" id="page_slug" name="page_slug" placeholder="Page Slug" name="page_slug" placeholder="Enter Slug Name"  value="{{ $seomodule->page_slug }}" />
                </div>
             </div>

             <div class="col-sm-6">
                <div class="input-style-1">
                <label>Page Title <span class="mandatory">*</span></label>
                <input type="text" id="page_title" data-model=""  name="page_title" placeholder="Enter Page Title" required value="{{ $seomodule->page_title }}" />
                </div>
             </div>
            </div>
            <hr>
            <div class="row mt-15">
                <!-- Link -->
                <div class="col-sm-6">
                <div class="input-style-1">
                <label>Link <span class="mandatory">*</span></label>
                <div class="input-group">
                <input type="hidden" placeholder="" name='controller' id="controller" class="form-control" value="{{ $seomodule->controller }}">
                <input type="hidden" placeholder="" name='action' id="actionName" class="form-control" value="{{ $seomodule->action }}">
                <input type="text" placeholder="" name='link' id="menuLinkUrl" class="form-control" value="{{ $seomodule->link }}" required>
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary addAppendBtn" type="button">
                        <i class="fa fa-plus"></i>
                    </button>
                    </div>
                </div>
                </div>
                </div>

                <div class="col-sm-3">
                    <!-- Active Code -->
                     <label>Active</label><br>
                     <label class="radio-inline">
                     <input type="radio" name="active" class="radio-inline" value="1" {{ $seomodule->active == 1 ? 'checked' : '' }}> Yes
                     </label>
                    <label class="radio-inline">
                    <input type="radio" name="active" class="radio-inline" value="0" {{ $seomodule->active == 0 ? 'checked' : '' }}> No
                    </label>
                 </div>
            </div>
            <hr>
           <div class="row mt-15">

            <!-- Page Url -->
            <div class="col-sm-12">
               <div class="input-style-1">
               <label>Page Url </label>
               <input type="text" id="page_url" name="page_url" placeholder="Page URL"  value="{{ $seomodule->page_url }}" />
               </div>
            </div>


           </div>

    <hr>
        <div class="row mt-15">

             <div class="col-sm-6">
                <div class="input-style-1">
                <label>Meta Keyword</label>
                <textarea rows="5" name="meta_keyword" placeholder="Meta Keyword">{{ $seomodule->meta_keyword }}</textarea>
                </div>
             </div>

             <div class="col-sm-6">
                <div class="input-style-1">
                <label>Meta Description</label>
                <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ $seomodule->meta_description }}
                </textarea>
                </div>
             </div>

        </div>

        <hr>
        <div class="col-sm-3">
            <label>Image</label>
             <div id="">
            <img id="selectedImage" class="addedImage" src="{{ $seomodule->meta_image ? asset('public/images/seomodules/meta_image/' . $seomodule->id . '/' . $seomodule->meta_image) : asset('dist/images/no-image.png') }}" alt="Selected Image">
            </div>
            <input type="file" name="meta_image" id="imageInput" onchange="displayImage(this)" >
             <span id="iconImage">{{ $seomodule->meta_image }}</span>
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

