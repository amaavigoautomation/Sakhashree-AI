@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('blogcategories.create') }}"><button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button></a></div>
	</div>

   <div class="container-fluid">
      <div class="card-style mt-20">

         <div class="row"></div>
         <div class="table-wrapper table-responsive mt-10">
            <table class="table striped-table" id="sortableTable">
               <thead>
                  <tr>
                        {{-- <th class=""><h6>Drag</h6></th> --}}
                        <th class=""><h6>Image</h6></th>
                        <th class=""><h6>Name</h6></th>
                        <th class="text-left"><h6>Active</h6></th>
                        <th class="text-center"><h6>Action</h6></th>
                  </tr>
               </thead>
               <tbody id="sortableBody">
               @foreach ($blogcategory as $blogcategories)
                  <tr data-id="{{ $blogcategories->id }}" data-model="BlogCategory">
                        {{-- <td><i class="lni lni-menu"></i></td> --}}
                        <td>
                           @php
                              $firstImage = $blogcategories->image_file;
                              $id = $blogcategories->id;
                              $imagePath = $firstImage ? asset("public/images/blogcategories/image_file/{$id}/{$firstImage}") : null;
                           @endphp
                           @if(!empty($imagePath))
                              <img src="{{ $imagePath }}" id="imageBox">
                           @endif
                        </td>
                        <td><p>{{ $blogcategories->name }}</p></td>
                        <td class="text-center">
                           @php $checked = $blogcategories->active ? 'checked' : ''; @endphp
                           <input type="checkbox" id="toggle-{{ $blogcategories->id }}" class="status-checkbox toggle-checkbox" data-id="{{ $blogcategories->id }}" data-model="BlogCategory" {{ $checked }}>
                           <label for="toggle-{{ $blogcategories->id }}" class="toggle-label"><span class="toggle-slider"></span></label>
                        </td>
                        <td class="text-center">
                           <div class="dropdown">
                              <button class="btn btn-link p-0" type="button" id="dropdownMenuButton{{ $blogcategories->id }}"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $blogcategories->id }}">
                                    <li>
                                       <a class="dropdown-item" href="{{ route('blogcategories.edit', $blogcategories->id) }}">
                                          <i class="lni lni-pencil-alt"></i> Edit
                                       </a>
                                    </li>
                                    <li>
                                       <a class="dropdown-item" href="{{ route('blogcategories.show', $blogcategories->id) }}">
                                          <i class="lni lni-list"></i> View
                                       </a>
                                    </li>
                              </ul>
                           </div>
                        </td>

                  </tr>
               @endforeach
            </tbody>

            </table>

         </div>
      </div>
      @include('partials.pagination', ['items' => $blogcategory])
   </div>
</section>
@endsection
