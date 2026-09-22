@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <tbody>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Author Name</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blogauthor->author_name ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Image</h6>
                                </th>
                                <td class=''>
                                    <p>
                                        @php
                                            $firstImage = $blogauthor->author_image;
                                            $id = $blogauthor->id;
                                            $imagePath = $firstImage ? asset("public/images/blog_author/author_image/{$id}/{$firstImage}") : asset('dist/images/no-image.png');
                                        @endphp
                                        @if (!empty($imagePath))
                                            <img src="{{ $imagePath }}" id="imageBox">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Note</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blogauthor->note ?? '---'}}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Page Title</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blogauthor->page_title ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Page Slug</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blogauthor->page_slug  ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Page URL</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blogauthor->page_url  ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Meta description</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blogauthor->meta_description ?? '---' }}</p>
                                </td>
                            </tr>
                            {{-- <tr>
                                <th class='col-md-2'>
                                    <h6>Meta keyword</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $blogauthor->meta_keyword ?? '---' }}</p>
                                </td>
                            </tr> --}}
                            <tr>
                                <th>
                                    <h6>Status</h6>
                                </th>
                                <td>
                                    @php if ($blogauthor->active == '1') {
                                            $class = 'activelabel';
                                            $data = 'Active';
                                        } else {
                                            $class = 'inactivelabel';
                                            $data = 'Inactive';
                                    } @endphp
                                    <div class="{{ $class }}">{{ $data }}</div>
                                </td>
                            </tr>
                            {{-- <tr>
                                <th>
                                    <h6>Created At </h6>
                                </th>
                                <td>
                                    <p>{{ $blogauthor->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Updated At</h6>
                                </th>
                                <td>
                                    <p>{{ $blogauthor->updated_at }}</p>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>


        </div>


        <!--Add new section end here-->
        </div>
    </section>
@endsection
