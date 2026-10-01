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
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->full_name ?? '---' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->email ?? '---' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Country</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->country->name ?? '---' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Subject</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->subject->name ?? '---' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Description</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->description ?? '---' }}</p>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>
@endsection
