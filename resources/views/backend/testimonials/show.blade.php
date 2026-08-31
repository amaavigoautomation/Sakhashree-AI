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
                                <th>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p>{{ $testimonial->name }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <td>
                                    <p>{{ $testimonial->email ?? '---' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Country</h6>
                                </th>
                                <td>
                                    <p>{{ $testimonial->country }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>City</h6>
                                </th>
                                <td>
                                    <p>{{ $testimonial->city }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Rating</h6>
                                </th>
                                <td>
                                    <p>{{ $testimonial->rating }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Active</h6>
                                </th>
                                <td>
                                    @php
                                        if ($testimonial->active == 1) {
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

                            <tr>
                                <th>
                                    <h6>Description</h6>
                                </th>
                                <td>
                                    <p>{!! $testimonial->description ?? '---' !!}</p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
@endsection
