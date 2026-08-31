@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('blogtags.create') }}"><button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button></a></div>
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
                @php $class = '';
                      $data = '';
                @endphp

                @foreach ($blogtags as $blogtag)
                <tr>
                  <td><p> {{ $blogtag->name }} </p></td>
                  <td class="text-center">
                    @php
                        $active = $blogtag->active;
                        $checked = $active == 1 ? 'checked' : '';
                    @endphp
                    <input type="checkbox"  id="toggle-{{ $blogtag->id }}" class="status-checkbox toggle-checkbox" data-id="{{ $blogtag->id }}" data-model="BlogTag" {{ $checked }}>
                    <label for="toggle-{{ $blogtag->id }}" class="toggle-label"><span class="toggle-slider"></span></label>
                    </td>
                  <td class="text-center"><a href="{{ route('blogtags.edit',$blogtag->id) }}"><i class="lni lni-pencil-alt"></i></a>
                  <a href="{{ route('blogtags.show',$blogtag->id) }}"><i class="lni lni-list"></i></a>
                  </td>

                 </tr>
                 @endforeach
               </tbody>
            </table>
         </div>
      </div>
      @include('partials.pagination', ['items' => $blogtags])
   </div>
</section>
@endsection
