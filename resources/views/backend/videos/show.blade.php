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
                            <p>{{ $videos->order }}</p>
                        </td>
                    </tr>


                    <tr>
                        <th class=''><h6>Title </h6></th>
                        <td class=''>
                            <p>{{ $videos->title }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class=''><h6> Description </h6></th>
                        <td class=''>
                            <p>{!! $videos->description ?? '---' !!}</p>
                        </td>
                    </tr>

                   <tr>
                        <th class=''><h6>Image</h6></th>
                        <td class=''>
                            <p>@php
                                $firstImage = $videos->image_file;
                                $id = $videos->id;
                                $imagePath = $firstImage ? asset("public/images/videos/image_file/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" id="bannerBox">
                 @endif</p>
                        </td>
                    </tr>

                    <tr>
                    <th><h6>Active</h6></th>
                    <td>
                      @php if($videos->active == '1'){
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
                    {{-- <tr>
                        <th><h6>Is Display Homepage</h6></th>
                        <td>
                            <p>{{ $videos->is_display_homepage  == 1 ? 'Yes' : 'No' }}</p>
                        </td>
                     </tr>
                    <tr>
                        <th><h6>Is External Link</h6></th>
                        <td>
                            <p>{{ $videos->is_external_link == 1 ? 'Yes' : 'No' }}</p>
                        </td>
                    </tr> --}}
                    <tr>
                        <th><h6>Video Link</h6></th>
                        <td>
                            <p>{{ $videos->video_link }}</p>
                        </td>
                    </tr>

                    <tr>
                       <th><h6>Created At</h6></th>
                       <td>
                           <p>{{ $videos->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Updated At</h6></th>
                       <td>
                           <p>{{ $videos->updated_at }}</p>
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

