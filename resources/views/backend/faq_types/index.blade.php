@extends('layouts.backend')

 @section('content')
     <section class="section">

         <div class="container-fluid">

             <!-- Breadcrumb -->
             @include('partials.breadcrumb')


             <!-- Create Button -->
             <div class="right-mob-left">

                 <a href="{{ route('faq_types.create') }}">

                     <button type="button" class="main-btn primary-btn btn-hover btn-xs">

                         Create

                     </button>

                 </a>

             </div>


             <!-- FAQ Type Section -->
             <div class="card-style mt-20">

                 <div class="row">

                     <div class="col-sm-4">

                         <div class="filtertext">

                             <ul>
                             </ul>

                         </div>

                     </div>


                     <div class="col-sm-4 rowmargin10">

                         <div class="right-mob-left">
                         </div>

                     </div>

                 </div>


                 <!-- Table -->
                 <div class="table-wrapper table-responsive mt-10">

                     <table class="table striped-table">

                         <!-- Table Header -->
                         <thead>

                             <tr>

                                 <th class="col-sm-2">
                                     <h6>Image</h6>
                                 </th>

                                 <th>
                                     <h6>Name</h6>
                                 </th>

                                 <th class="text-left">
                                     <h6>Status</h6>
                                 </th>

                                 <th class="text-center">
                                     <h6>Action</h6>
                                 </th>

                             </tr>

                         </thead>


                         <!-- Table Body -->
                         <tbody>

                             @foreach ($faqTypes as $faqType)
                                 <tr>


                                     <!-- Image -->
                                     <td>

                                         <p>

                                             @if (!empty($faqType->icon))
                                                 <img src="{{ asset('public/images/icon/' . $faqType->id . '/' . $faqType->icon) }}"
                                                     id="imageBox" alt="{{ $faqType->icon }}">
                                             @else
                                                 <img src="{{ asset('dist/images/no-image.png') }}" id="imageBox"
                                                     alt="No Image">
                                             @endif

                                         </p>

                                     </td>


                                     <!-- Name -->
                                     <td>

                                         <p>
                                             {{ $faqType->name }}
                                         </p>

                                     </td>


                                     <!-- Status -->
                                     <td>

                                         @php

                                             $active = $faqType->active;

                                             $checked = $active == 1 ? 'checked' : '';

                                         @endphp


                                         <input type="checkbox" id="toggle-{{ $faqType->id }}"
                                             class="status-checkbox toggle-checkbox" data-id="{{ $faqType->id }}"
                                             data-model="FaqType" {{ $checked }}>


                                         <label for="toggle-{{ $faqType->id }}" class="toggle-label">

                                             <span class="toggle-slider"></span>

                                         </label>

                                     </td>


                                     <!-- Action -->
                                     <td class="text-center">

                                         <!-- Edit -->
                                         <a href="{{ route('faq_types.edit', $faqType->id) }}">

                                             <i class="lni lni-pencil-alt"></i>

                                         </a>


                                         <!-- View -->
                                         {{-- <a href="{{ route('faq_types.show', $faqType->id) }}">

                                             <i class="lni lni-list"></i>

                                         </a> --}}

                                     </td>


                                 </tr>
                             @endforeach


                             <!-- No Records -->
                             @if ($faqTypes->count() == 0)
                                 <tr>

                                     <td colspan="4" class="text-center">

                                         <p>No FAQ Types Found.</p>

                                     </td>

                                 </tr>
                             @endif

                         </tbody>

                     </table>

                 </div>

             </div>


             <!-- Pagination -->
             <div class="mt-30">
             </div>

             @include('partials.pagination', [
                 'items' => $faqTypes,
             ])

         </div>

     </section>
 @endsection
