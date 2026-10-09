@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            {{-- Breadcrumb --}}
            @include('partials.breadcrumb')

            {{-- Workshop Enquiry Details --}}
            <div class="card-style mt-20">

                <div class="table-wrapper table-responsive mt-10">

                    <table class="table striped-table">

                        <tbody>

                            {{-- Workshop --}}
                            <tr>
                                <th class="col-md-2">
                                    <h6>Workshop</h6>
                                </th>
                                 <td>
                                    <p>{{ $workshopEnquiry->workshop->name ?? '---' }}</p>
                                </td>
                            </tr>

                            {{-- Name --}}
                            <tr>
                                <th>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p>{{ $workshopEnquiry->full_name ?? '---' }}</p>
                                </td>
                            </tr>

                            {{-- Email --}}
                            <tr>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <td>
                                    <p>{{ $workshopEnquiry->email ?? '---' }}</p>
                                </td>
                            </tr>

                            {{-- Mobile --}}
                            <tr>
                                <th>
                                    <h6>Mobile</h6>
                                </th>
                                <td>
                                    <p>
                                        @php
                                            $countryDetail = $workshopEnquiry->country?->countryDetails?->first();
                                        @endphp

                                        @if ($countryDetail?->icon_image)
                                            <img src="{{ asset('public/images/country_details/icon_image/' . $countryDetail->id . '/' . $countryDetail->icon_image) }}"
                                                alt="{{ $workshopEnquiry->country->name ?? '' }}" class="countryIcon">
                                        @endif

                                        {{ $workshopEnquiry->calling_code ?? '' }}
                                        {{ $workshopEnquiry->mobile ?? '---' }}
                                    </p>
                                </td>
                            </tr>

                            {{-- Country --}}
                            <tr>
                                <th>
                                    <h6>Country</h6>
                                </th>
                                <td>
                                    <p>{{ $workshopEnquiry->country->name ?? '---' }}</p>
                                </td>
                            </tr>

                            {{-- Description --}}
                            <tr>
                                <th>
                                    <h6>Description</h6>
                                </th>
                                <td>
                                    <p>{{ $workshopEnquiry->description ?? '---' }}</p>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </section>
@endsection
