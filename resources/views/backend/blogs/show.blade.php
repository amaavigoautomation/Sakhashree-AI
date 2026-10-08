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
                                <th class="col-md-2">
                                    <h6>Blog Image</h6>
                                </th>
                                <td>
                                    @php
                                        $firstImage = $blog->image_file;
                                        $id = $blog->id;

                                        $imagePath = $firstImage
                                            ? asset("public/images/blog/image_file/{$id}/{$firstImage}")
                                            : asset('dist/images/no-image.png');
                                    @endphp

                                    @if (!empty($imagePath))
                                        <img src="{{ $imagePath }}" height="70px" alt="Blog Image">
                                    @else
                                        <p>---</p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="col-md-2">
                                    <h6>Blog Date</h6>
                                </th>
                                <td>
                                    <p>{{ date('jS F Y', strtotime($blog->blog_date)) }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class="col-md-2">
                                    <h6>Blog Category</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ !empty($blog->blogcategory->name) ? $blog->blogcategory->name : '---' }}
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <th class="col-md-2">
                                    <h6>Blog Title</h6>
                                </th>
                                <td>
                                    <p>{{ $blog->title }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class="col-md-2">
                                    <h6>Blog Description</h6>
                                </th>
                                <td>
                                    <p>{!! $blog->description !!}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class="col-md-2">
                                    <h6>Meta Title</h6>
                                </th>
                                <td>
                                    <p>{{ $blog->page_title ?: '---' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class="col-md-2">
                                    <h6>Meta Description</h6>
                                </th>
                                <td>
                                    <p>{{ $blog->meta_description ?: '---' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Status</h6>
                                </th>
                                <td>
                                    @php
                                        if ($blog->active == '1') {
                                            $class = 'activelabel';
                                            $data = 'Active';
                                        } else {
                                            $class = 'inactivelabel';
                                            $data = 'Inactive';
                                        }
                                    @endphp

                                    <div class="{{ $class }}">{{ $data }}</div>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </section>
@endsection
