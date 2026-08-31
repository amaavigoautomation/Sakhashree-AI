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
                                    <h6>Blog Date</h6>
                                </th>
                                <td class=''>
                                    <p>{{ date('jS F Y', strtotime($blog->blog_date)) }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Image</h6>
                                </th>
                                <td class=''>
                                    <p>@php
                                        $firstImage = $blog->image_file;
                                        $id = $blog->id;
                                        $imagePath = $firstImage
                                            ? asset("public/images/blog/image_file/{$id}/{$firstImage}")
                                            : asset('dist/images/no-image.png');
                                    @endphp

                                        @if (!empty($imagePath))
                                            <img src="{{ $imagePath }}" id="imageBox">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Blog Author</h6>
                                </th>
                                <td class=''>
                                    <p>{{ !empty($blog->blogauthor->author_name) ? $blog->blogauthor->author_name : '---' }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Title</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blog->title }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Page Title</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blog->page_title }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Page Slug</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blog->page_slug }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Page Url</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blog->page_url }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Description</h6>
                                </th>
                                <td class=''>
                                    <p>{!! $blog->description !!}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Status</h6>
                                </th>
                                <td>
                                    @php if ($blog->active == '1') {
                                            $class = 'activelabel';
                                            $data = 'Active';
                                        } else {
                                            $class = 'inactivelabel';
                                            $data = 'Inactive';
                                    } @endphp
                                    <div class="{{ $class }}">{{ $data }}</div>
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
