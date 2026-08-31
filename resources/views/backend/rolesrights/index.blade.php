@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        {{-- <a href="{{ route('roles-rights.index') }}">
        <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button>
        </a> --}}
        <a href="{{ route('roles-rights.create') }}">
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
{{-- <div class="col-sm-4 rowmargin10">
<div class="right-mob-left"><button type="button" class="main-btn dark-btn btn-hover btn-xs">Export</button></div>
</div> --}}
</div>

<div class="table-wrapper table-responsive mt-10">
<table class="table striped-table">
<thead>
<tr>
<th width="25"><div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1"></div></th>
<th><h6><a href="#">Role Name<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">Role Description<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th class="text-left"><h6>Status</h6></th>
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@foreach ($roles as $role)

<tr>
<td>
<div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1" ></div>
</td>
<td><p> {{ $role->role_name }} </p></td>
<td><p> {{ $role->role_description }} </p></td>

<td>
    @php
        $active = $role->active;
        $checked = $active == 1 ? 'checked' : '';
    @endphp
    <input type="checkbox" id="toggle-{{ $role->id }}"
        class="status-checkbox toggle-checkbox" data-id="{{ $role->id }}"
        data-model="RolesRight" {{ $checked }}>
    <label for="toggle-{{ $role->id }}" class="toggle-label">
        <span class="toggle-slider"></span>
    </label>
</td>
<td class="text-center"><a href="{{ route('roles-rights.edit',$role->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('roles-rights.show',$role->id) }}"><i class="lni lni-list"></i></a>
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
<div class="row">
<div class="col-sm-6">

</div>


</div>
</div>
    <!--Add new section end here-->
    @include('partials.pagination', ['items' => $roles])
	</div>
</section>
@endsection

