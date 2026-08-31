@extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
		@include('partials.breadcrumb')

		<div class="card-style mt-20">
			<div class="table-wrapper table-responsive mt-10">
				<table class="table striped-table">
					<tbody>
						<tr>
							<th class="col-md-2"><h6>Order</h6></th>
							<td><p>{{ $destinations->order ?? '---' }}</p></td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Country</h6></th>
							<td><p>{{ $destinations->country->name ?? '---' }}</p></td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Name</h6></th>
							<td><p>{{ $destinations->name ?? '---' }}</p></td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Page Slug</h6></th>
							<td><p>{{ $destinations->page_slug ?? '---' }}</p></td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Page URL</h6></th>
							<td><p>{{ $destinations->page_url ?? '---' }}</p></td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Page Title</h6></th>
							<td><p>{{ $destinations->page_title ?? '---' }}</p></td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Meta Description</h6></th>
							<td><p>{{ $destinations->meta_description ?? '---' }}</p></td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Description</h6></th>
							<td><p>{!! $destinations->description ?? '---' !!}</p></td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Display on Homepage</h6></th>
							<td><p>{{ $destinations->display_on_homepage ? 'Yes' : 'No' }}</p></td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Cover Image</h6></th>
							<td>
								@php
									$coverImage = $destinations->cover_image;
									$id = $destinations->id;
									$coverImagePath = $coverImage ? asset("public/images/destinations/cover_image/{$id}/{$coverImage}") : asset('public/images/no-image.png');
								@endphp
								<img src="{{ $coverImagePath }}" id="imageBox">
							</td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Thumbnail Image</h6></th>
							<td>
								@php
									$thumbImage = $destinations->thumbnail_image;
									$thumbImagePath = $thumbImage ? asset("public/images/destinations/thumbnail_image/{$id}/{$thumbImage}") : asset('public/images/no-image.png');
								@endphp
								<img src="{{ $thumbImagePath }}" id="imageBox">
							</td>
						</tr>

						<tr>
							<th class="col-md-2"><h6>Status</h6></th>
							<td>
								@php
									$class = $destinations->active == 1 ? 'activelabel' : 'inactivelabel';
									$statusText = $destinations->active == 1 ? 'Active' : 'Inactive';
								@endphp
								<div class="{{ $class }}">{{ $statusText }}</div>
							</td>
						</tr>

                        <tr>
                            <th class="col-md-2"><h6>Created At</h6></th>
                            <td>
                                <p>
                                    {{ $destinations->created_at ?? '---' }}
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th class="col-md-2"><h6>Updated At</h6></th>
                            <td>
                                <p>
                                    {{ $destinations->updated_at ?? '---' }}
                                </p>
                            </td>
                        </tr>


					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection
