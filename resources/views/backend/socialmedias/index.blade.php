@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->
     <!-- Add New Button -->
     <div class="right-mob-left">
        <!-- <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button>  -->
        <a href="{{ route('socialmedias.create') }}"><button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button></a></div>
	</div>
   <div class="container-fluid">
      <div class="card-style mt-20">
         <!-- <div class="create_update">Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
         <!-- Search Panel -->
         <div class="row"></div>
         <div class="table-wrapper table-responsive mt-10">
            <table class="table striped-table">
               <thead>
               <tr>
                  <th><h6>Name</h6></th>
                  <th class=""><h6>Link</h6></th>
                  <th class=""><h6>Image</h6></th>
                  <th class="text-left"><h6>Active</h6></th>
                  <th class="text-left"><h6>Action</h6></th>
               </tr>
               </thead>
               <tbody>
                @foreach ($socialmedias as $socialmedia)
                <tr>
                  <td><p> {{ $socialmedia->name }} </p></td>
                  <td><p> {{ $socialmedia->link }} </p></td>
                  <td><p>
                            @php
                                $firstImage = $socialmedia->image_icon;
                                $id = $socialmedia->id;
                                $imagePath = $firstImage ? asset("public/images/socialmedias/image_icon/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" height="50px">
                            @endif  </p>
                  </td>

                  <td>
                     @php
                     $active = $socialmedia->active;
                     $checked = $active == 1 ? 'checked' : '';
                     @endphp
                     <input type="checkbox" id="toggle-{{ $socialmedia->id }}"
                             class="status-checkbox toggle-checkbox" data-id="{{ $socialmedia->id }}"
                             data-model="SocialMedia" {{ $checked }}>
                     <label for="toggle-{{ $socialmedia->id }}" class="toggle-label">
                             <span class="toggle-slider"></span>
                     </label>
                     </td>
                  <td class="text-center"><a href="{{ route('socialmedias.edit',$socialmedia->id) }}"><i class="lni lni-pencil-alt"></i></a>
                  <a href="{{ route('socialmedias.show',$socialmedia->id) }}"><i class="lni lni-list"></i></a>
                  </td>

                 </tr>
                 @endforeach
               </tbody>
            </table>
         </div>
      </div>
      @include('partials.pagination', ['items' => $socialmedias])
   </div>
</section>
@endsection
