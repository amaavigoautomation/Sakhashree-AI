@extends('layouts.backend')

@section('content')
<section class="section">
  <div class="container-fluid">
     <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('events.create') }}">
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
<th class="text-left"><h6>Status</h6></th>
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@foreach ($events as $event)

<tr>

<td><p> {{ $event->name }} </p></td>

<td>
  @php
  $active = $event->active;
  $checked = $active == 1 ? 'checked' : '';
  @endphp
  <input type="checkbox" id="toggle-{{ $event->id }}"
          class="status-checkbox toggle-checkbox" data-id="{{ $event->id }}"
          data-model="Events" {{ $checked }}>
  <label for="toggle-{{ $event->id }}" class="toggle-label">
          <span class="toggle-slider"></span>
  </label>
  </td>
<td class="text-center"><a href="{{ route('events.edit',$event->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('events.show',$event->id) }}"><i class="lni lni-list"></i></a>
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
@include('partials.pagination', ['items' => $events])
  </div>
</section>
@endsection

