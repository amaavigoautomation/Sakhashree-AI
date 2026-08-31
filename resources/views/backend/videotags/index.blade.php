@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('videotag.create') }}"><button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button></a></div>
	</div>

   <div class="container-fluid">
      <div class="card-style mt-20">
         <div class="row"></div>
         <div class="table-wrapper table-responsive mt-10">
            <table class="table striped-table">
               <thead>
               <tr>
                  <th class=""><h6>Name</h6></th>
                  <th class="text-left"><h6>Active</h6></th>
                  <th class="text-center"><h6>Action</h6></th>
               </tr>
               </thead>
               <tbody>
                @foreach ($videotags as $videotag)
                <tr>
                  <td><p> {{ $videotag->name }} </p></td>
                  <td class="text-center">
                    @php
                        $active = $videotag->active;
                        $checked = $active == 1 ? 'checked' : '';
                    @endphp
                    <input type="checkbox"  id="toggle-{{ $videotag->id }}" class="status-checkbox toggle-checkbox" data-id="{{ $videotag->id }}" data-model="VideoTag" {{ $checked }}>
                    <label for="toggle-{{ $videotag->id }}" class="toggle-label"><span class="toggle-slider"></span></label>
                    </td>
                  <td class="text-center"><a href="{{ route('videotag.edit',$videotag->id) }}"><i class="lni lni-pencil-alt"></i></a>
                  <a href="{{ route('videotag.show',$videotag->id) }}"><i class="lni lni-list"></i></a>
                  </td>

                 </tr>
                 @endforeach
               </tbody>
            </table>
         </div>
      </div>
      @include('partials.pagination', ['items' => $videotags])
   </div>
</section>
@endsection
