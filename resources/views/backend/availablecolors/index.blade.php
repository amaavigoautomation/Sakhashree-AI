@extends('layouts.backend')

@section('content')
<section class="section">
  <div class="container-fluid">
     <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('availablecolors.create') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
        </a>
    </div>
     
    <!--Add new section start here-->
<div class="card-style mt-20">
<div class="row">

<div class="col-sm-4">
<div class="filtertext">
<ul>

</ul>   
</div>  
</div>  
<div class="col-sm-4 rowmargin10">
<div class="right-mob-left"></div>
</div>  
</div>
    
<div class="table-wrapper table-responsive mt-10">
<table class="table striped-table">
<thead>
<tr>

<th><h6>Name</h6></th>
<th><h6>Color Code</h6></th>
<th class="text-left"><h6>Status</h6></th>    
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@foreach ($availablecolors as $availablecolor)    

<tr>

<td><p> {{ $availablecolor->name }} </p></td>
<td><p> {{ $availablecolor->color_code }} </p></td>

<td>
  @php
  $active = $availablecolor->active;
  $checked = $active == 1 ? 'checked' : '';
  @endphp
  <input type="checkbox" id="toggle-{{ $availablecolor->id }}"
  class="status-checkbox toggle-checkbox" data-id="{{ $availablecolor->id }}"
  data-model="AvailableColor" {{ $checked }}>
  <label for="toggle-{{ $availablecolor->id }}" class="toggle-label">
  <span class="toggle-slider"></span>
  </label>
  </td> 
<td class="text-center"><a href="{{ route('availablecolors.edit',$availablecolor->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('availablecolors.show',$availablecolor->id) }}"><i class="lni lni-list"></i></a>
</td>

</tr>

@endforeach
<!-- end table row -->

 
</tbody>
</table>
<!-- end table -->
</div>
</div>
<div class="mt-30"> 
</div>  
@include('partials.pagination', ['items' => $availablecolors])
  </div>
</section>  
@endsection

