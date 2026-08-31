@extends('layouts.backend')

@section('content')
<section class="section">
  <div class="container-fluid">
     <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('availablesizes.create') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
        </a>
    </div>
     
    <!--Add new section start here-->
<div class="card-style mt-20">
<div class="row">

<div class="col-sm-4">
<div class="filtertext">
<ul>
<!-- <li>1 Selected</li> -->
<!--<li><a href="#"><i class="lni lni-pencil"></i> Edit</a></li>-->
<!-- <li><a href="#"><i class="lni lni-trash-can"></i> Delete</a></li> -->
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
<th class="text-left"><h6>Status</h6></th>    
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@foreach ($availablesizes as $availablesize)    

<tr>

<td><p> {{ $availablesize->name }} </p></td>


<td>
  @php
  $active = $availablesize->active;
  $checked = $active == 1 ? 'checked' : '';
  @endphp
  <input type="checkbox" id="toggle-{{ $availablesize->id }}"
  class="status-checkbox toggle-checkbox" data-id="{{ $availablesize->id }}"
  data-model="AvailableSize" {{ $checked }}>
  <label for="toggle-{{ $availablesize->id }}" class="toggle-label">
  <span class="toggle-slider"></span>
  </label>
  </td> 
<td class="text-center"><a href="{{ route('availablesizes.edit',$availablesize->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('availablesizes.show',$availablesize->id) }}"><i class="lni lni-list"></i></a>
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
@include('partials.pagination', ['items' => $availablesizes])
  </div>
</section>  
@endsection

