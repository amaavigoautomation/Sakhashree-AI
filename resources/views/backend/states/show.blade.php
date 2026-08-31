@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')



    <!--Add new section start here-->
<div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                    <tr>
                        <th class='col-md-2 hide'><h6>ID</h6></th>
                        <td class='hide'>
                            <p>{{ $states->id }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                            <p>{{ $states->country->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>State</h6></th>
                        <td class=''>
                            <p>{{ $states->name }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Page Title</h6></th>
                        <td class=''>
                            <p>{{ $states->page_title }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Page Slug</h6></th>
                        <td class=''>
                            <p>{{ $states->page_slug }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Page URL</h6></th>
                        <td class=''>
                            <p>{{ $states->page_url }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Meta Keyword</h6></th>
                        <td class=''>
                            <p>{{ $states->meta_keyword }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Meta Description</h6></th>
                        <td class=''>
                            <p>{{ $states->meta_description }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th><h6> Image File</h6></th>
                         <td>
                            <p>
                              @php
                                  $firstImage = $states->image_file;
                                  $id = $states->id;
                                  $imagePath = $firstImage ? asset("public/images/states/image_file/{$id}/{$firstImage}") : null;
                              @endphp
                              @if(!empty($imagePath))
                                  <img src="{{ $imagePath }}" height="30px">
                              @endif
                             </p>
                         </td>
                      </tr>
                      <tr>
                        <th><h6>Meta Image</h6></th>
                         <td>
                            <p>
                              @php
                                  $firstImage = $states->banner_image;
                                  $id = $states->id;
                                  $imagePath = $firstImage ? asset("public/images/states/banner_image/{$id}/{$firstImage}") : null;
                              @endphp
                              @if(!empty($imagePath))
                                  <img src="{{ $imagePath }}" height="30px">
                              @endif
                             </p>
                         </td>
                      </tr>
                    <tr>
                        <th class='col-md-2'><h6>Description</h6></th>
                        <td class=''>
                            <p>{{ $states->description }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>State</h6></th>
                        <td class=''>
                            <p>{{ $states->name }}</p>
                        </td>
                    </tr>
                    <tr>
                    <th><h6>Status</h6></th>
                    <td>
                      @php if($states->active == '1'){
                        $class = 'activelabel';
                        $data = 'Active';
                        }
                        else{
                        $class = 'inactivelabel';
                        $data = 'Inactive';
                        } @endphp
                        <div class="{{ $class; }}">{{ $data }}</div>
                    </td>
                    </tr>
                    <tr>
                       <th><h6>Created At</h6></th>
                       <td>
                           <p>{{ $states->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Updated At</h6></th>
                       <td>
                           <p>{{ $states->updated_at }}</p>
                       </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


</div>


    <!--Add new section end here-->
	</div>
</section>
@endsection

