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
                        <th class='col-md-2'><h6>Order</h6></th>
                        <td class=''>
                            <p>{{ $blogcategory->order ?? '---' ;}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Image</h6></th>
                        <td class=''>
                        <p>@php
                                $firstImage = $blogcategory->image_file;
                                $id = $blogcategory->id;
                                $imagePath = $firstImage ? asset("public/images/blogcategories/image_file/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" id="imageBox">
                        @endif</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                            <p>{{ $blogcategory->name }}</p>
                        </td>
                    </tr>
                   <tr>
                        <th class='col-md-2'><h6>Page Title</h6></th>
                        <td class=''>
                            <p>{{ $blogcategory->page_title }}</p>
                        </td>
                    </tr>
                   <tr>
                        <th class='col-md-2'><h6>Page Slug</h6></th>
                        <td class=''>
                            <p>{{ $blogcategory->page_slug }}</p>
                        </td>
                    </tr>
                   <tr>
                        <th class='col-md-2'><h6>Page Url</h6></th>
                        <td class=''>
                            <p>{{ $blogcategory->page_url }}</p>
                        </td>
                   </tr>
                   <tr>
                        <th class='col-md-2'><h6>Meta Description</h6></th>
                        <td class=''>
                            <p>{{ $blogcategory->meta_description }}</p>
                        </td>
                   </tr>
                   <tr>
                    <th class='col-md-2'><h6>Meta Keyword</h6></th>
                    <td class=''>
                        <p>{{ $blogcategory->meta_keyword }}</p>
                    </td>
               </tr>
               <tr>
                <th><h6>Active</h6></th>
                <td>
                  @php if($blogcategory->active == '1'){
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
                           <p>{{ $blogcategory->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Updated At</h6></th>
                       <td>
                           <p>{{ $blogcategory->updated_at }}</p>
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

