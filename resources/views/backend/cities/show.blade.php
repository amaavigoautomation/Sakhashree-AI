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
                        <th class='col-md-2 hide'><h6>Id</h6></th>
                        <td class='hide'>
                            <p>{{ $city->id }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th><h6>Image</h6></th>
                         <td>
                            <p>

                              @php
                                  $firstImage = $city->image_file;
                                  $id = $city->id;
                                  $imagePath = $firstImage ? asset("public/images/cities/image_file/{$id}/{$firstImage}") : null;
                              @endphp

                              @if(!empty($imagePath))
                                  <img src="{{ $imagePath }}" height="30px">
                              @endif

                             </p>
                         </td>
                      </tr>
                    <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                            <p>{{ $city->country->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>State</h6></th>
                        <td class=''>
                            <p>{{ $city->state->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>City</h6></th>
                        <td class=''>
                            <p>{{ $city->name }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Page Title</h6></th>
                        <td class=''>
                            <p>{{ $city->page_title }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Page Slug</h6></th>
                        <td class=''>
                            <p>{{ $city->page_slug }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Page URL</h6></th>
                        <td class=''>
                            <p>{{ $city->page_url }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Meta Description</h6></th>
                        <td class=''>
                            <p>{{ $city->meta_description}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Meta Keyword</h6></th>
                        <td class=''>
                            <p>{{ $city->meta_keyword }}</p>
                        </td>
                    </tr>

                    <tr>
                    <th><h6>Status</h6></th>
                    <td>
                      @php if($city->active == '1'){
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
                           <p>{{ $city->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Updated At</h6></th>
                       <td>
                           <p>{{ $city->updated_at }}</p>
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

