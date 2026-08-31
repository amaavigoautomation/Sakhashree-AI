@extends('layouts.backend')

@section('content')

<section class="section">
	<div class="container-fluid">
     @include('partials.breadcrumb')

   <form method="POST" action="{{ route('events.update', ['event' => $events->id]) }}" enctype="multipart/form-data">
  <div class="card-style mt-20">

       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->
         <input type="hidden" name="id" value="{{ $events->id }}"  />


           <div class="row mt-15">
           <!-- Role Name -->
             <div class="col-sm-4">
                <div class="input-style-1">
                <label>Name <span class="mandatory">*</span></label>
                <input type="text"  name="name" placeholder="Role Name" value="{{ $events->name }}"  />
                </div>
             </div>

           <!-- Active Code -->
            <div class="col-sm-4">
                <label>Active</label><br>
                <label class="radio-inline">
                <input type="radio" name="active" class="radio-inline" value="1" {{ $events->active == 1 ? 'checked' : '' }}> Yes
                </label>
                <label class="radio-inline">
                <input type="radio" name="active" class="radio-inline" value="0" {{ $events->active == 0 ? 'checked' : '' }}> No
                </label>
            </div>
        </div>

      </div>
       {{-- Event Images --}}
       <?php if(!empty($eventImageArr)){  ?>
        <hr>
        <div class="row mt-15">
            <h4>Event Images</h4>
            <table class="table" id="employee-documents-table dynamic-table table-bordered">
                <thead>
                    <tr>
                        <th class="col-sm-2">@lang('Order')</th>
                        <th class="col-sm-4">@lang('Image')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                    </tr>
                </thead>
                <tbody id="sortableBody">
                    <?php
                        $eventImages = $eventImageArr ?? [];
                        $numRows = count($eventImages) > 0 ? count($eventImages) : 1;

                        for ($i = 0; $i < $numRows; $i++) {
                        $id = $eventImages[$i]['id'] ?? '';
                        $imageFile = $eventImages[$i]['image_file'] ?? '';
                        $active = $eventImages[$i]['active'] ?? '';
                        $order = $eventImages[$i]['order'] ?? '';

                        $imagePath = ($imageFile) ? asset("public/images/event_images/image_file/{$imageFile}") : asset("dist/no-image.png");

                    ?>
                    {{-- <tr data-index="{{ $i }}" class="dynamic-row" data-model="EventImage"> --}}
                        <tr data-id="{{ $i }}" data-model="EventImage" class="dynamic-row">
                        <td>
                            <input type="hidden" name="EventImage[{{ $i }}][id]" value="{{ $id }}">
                            <input type="number" name="EventImage[{{ $i }}][order]" value="{{ $order }}" class="form-control">
                       </td>
                       <td>
                         <img src="{{ $imagePath }}" id="imageBox">
                         <input type="file" name="EventImage[{{ $i }}][image_file]" class="form-control">
                       </td>
                       <td>
                        <label class="radio-inline">
                            <input type="radio" name="EventImage[{{ $i }}][active]" class="radio-inline" value="1" {{ $active == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="EventImage[{{ $i }}][active]" class="radio-inline" value="0" {{ $active == 0 ? 'checked' : '' }}> No
                        </label>
                       </td>
                       <td>
                            @if ($id)
                                <a href="#" class="btn btn-xs btn-danger destroeRow"
                                data-id="{{$id}}"
                                data-url="{{ route('event_image.destroy', $id) }}" data-module="event_image">
                                    <i class="fa fa-trash"></i>
                                </a>
                            @else
                                <a href="#" class="btn btn-xs removeRow">
                                    <i class="fa fa-times"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <a href="#" class="main-btn primary-btn btn-hover btn-xs pull-right" onclick="addMoreRow(this)">
                                Add More
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php } ?>
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



