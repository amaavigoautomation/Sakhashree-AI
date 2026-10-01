@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            {{-- Breadcrumb --}}
            @include('partials.breadcrumb')

            {{-- Spiritual Tour Enquiry Details --}}
            <div class="card-style mt-20">

                <div class="table-wrapper table-responsive mt-10">

                    <table class="table striped-table">

                        <tbody>

                            {{-- Spiritual Tour --}}
                            <tr>
                                <th class="col-md-2">
                                    <h6>Spiritual Tour</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ $spiritualTourEnquiry->spiritualTour->title ?? '---' }}
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
                                        {{ $spiritualTourEnquiry->full_name ?? '---' }}
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
                                        {{ $spiritualTourEnquiry->email ?? '---' }}
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
                                        {{ $spiritualTourEnquiry->calling_code ?? '' }}
                                        {{ $spiritualTourEnquiry->mobile ?? '---' }}
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
                                        {{ $spiritualTourEnquiry->country->name ?? '---' }}
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
                                        {{ $spiritualTourEnquiry->description ?? '---' }}
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
