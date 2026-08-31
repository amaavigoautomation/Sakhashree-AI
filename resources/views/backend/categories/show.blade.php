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
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $categories->name ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Page Title</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $categories->page_title ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Page Slug</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $categories->page_slug ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Page Url</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $categories->page_url ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Cover Image</h6>
                                </th>
                                <td class=''>
                                    <p>@php
                                        $firstImage = $categories->cover_image;
                                        $id = $categories->id;
                                        $imagePath = $firstImage
                                            ? asset("public/images/categories/cover_image/{$id}/{$firstImage}")
                                            : asset('dist/images/no-image.png');;
                                    @endphp

                                        @if (!empty($imagePath))
                                            <img src="{{ $imagePath }}" id="imageBox">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Thumbnail Image</h6>
                                </th>
                                <td class=''>
                                    <p>@php
                                        $firstImage = $categories->thumbnail_image;
                                        $id = $categories->id;
                                        $imagePath = $firstImage
                                            ? asset("public/images/categories/thumbnail_image/{$id}/{$firstImage}")
                                            : asset('dist/no-image.png');;
                                    @endphp

                                        @if (!empty($imagePath))
                                            <img src="{{ $imagePath }}" id="imageBox">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Meta Description</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $categories->meta_description ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Status</h6>
                                </th>
                                <td>
                                    @php if ($categories->active == '1') {
                                            $class = 'activelabel';
                                            $data = 'Active';
                                        } else {
                                            $class = 'inactivelabel';
                                            $data = 'Inactive';
                                    } @endphp
                                    <div class="{{ $class }}">{{ $data }}</div>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $categories->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Updated At</h6>
                                </th>
                                <td>
                                    <p>{{ $categories->updated_at }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
