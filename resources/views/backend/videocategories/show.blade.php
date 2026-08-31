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
                        <th class=''><h6>Order</h6></th>
                        <td class=''>
                            <p>{{ $videocategories->order }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class=''><h6>Name </h6></th>
                        <td class=''>
                            <p>{{ $videocategories->name }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class=''><h6>Page Title </h6></th>
                        <td class=''>
                            <p>{{ $videocategories->page_title }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class=''><h6>Page Slug </h6></th>
                        <td class=''>
                            <p>{{ $videocategories->page_slug }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class=''><h6>Category Class </h6></th>
                        <td class=''>
                            <p>{{ $videocategories->category_class }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class=''><h6>Page URL </h6></th>
                        <td class=''>
                            <p>{{ $videocategories->page_url ? $videocategories->page_url: '---';  }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class=''><h6>Meta Description </h6></th>
                        <td class=''>
                            <p>{{ $videocategories->meta_description ? $videocategories->meta_description: '---';  }}</p>
                        </td>
                    </tr>

                   <tr>
                        <th class=''><h6>Image</h6></th>
                        <td class=''>
                            <p>@php
                                $firstImage = $videocategories->image_file;
                                $id = $videocategories->id;
                                $imagePath = $firstImage ? asset("public/images/videocategories/image_file/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" id="bannerBox">
                 @endif</p>
                        </td>
                    </tr>

                    <tr>
                    <th><h6>Active</h6></th>
                    <td>
                      @php if($videocategories->active == '1'){
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
                           <p>{{ $videocategories->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Updated At</h6></th>
                       <td>
                           <p>{{ $videocategories->updated_at }}</p>
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

