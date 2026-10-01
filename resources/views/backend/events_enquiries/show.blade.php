@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            {{-- Breadcrumb --}}
            @include('partials.breadcrumb')

            {{-- Event Enquiry Details --}}
            <div class="card-style mt-20">

                <div class="table-wrapper table-responsive mt-10">

                    <table class="table striped-table">

                        <tbody>

                            {{-- Event --}}
                            <tr>
                                <th class="col-md-2">
                                    <h6>Event</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ $eventEnquiry->event->title ?? '---' }}
                                    </p>
                                </td>
                            </tr>

                            {{-- Name --}}
                            <tr>
                                <th>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ $eventEnquiry->full_name ?? '---' }}
                                    </p>
                                </td>
                            </tr>

                            {{-- Email --}}
                            <tr>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ $eventEnquiry->email ?? '---' }}
                                    </p>
                                </td>
                            </tr>

                            {{-- Mobile --}}
                            <tr>
                                <th>
                                    <h6>Mobile</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ $eventEnquiry->calling_code ?? '' }}
                                        {{ $eventEnquiry->mobile ?? '---' }}
                                    </p>
                                </td>
                            </tr>

                            {{-- Country --}}
                            <tr>
                                <th>
                                    <h6>Country</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ $eventEnquiry->country->name ?? '---' }}
                                    </p>
                                </td>
                            </tr>

                            {{-- Description --}}
                            <tr>
                                <th>
                                    <h6>Description</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ $eventEnquiry->description ?? '---' }}
                                    </p>
                                </td>
                            </tr>

                            {{-- Created At --}}
                            <tr>
                                <th>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ $eventEnquiry->created_at ?? '---' }}
                                    </p>
                                </td>
                            </tr>

                            {{-- Updated At --}}
                            <tr>
                                <th>
                                    <h6>Updated At</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ $eventEnquiry->updated_at ?? '---' }}
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
