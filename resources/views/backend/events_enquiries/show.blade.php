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
                                        @php
                                            $countryDetail = $eventEnquiry->country?->countryDetails?->first();
                                        @endphp

                                        @if ($countryDetail?->icon_image)
                                            <img src="{{ asset('public/images/country_details/icon_image/' . $countryDetail->id . '/' . $countryDetail->icon_image) }}"
                                                alt="{{ $eventEnquiry->country->name ?? '' }}" class="countryIcon">
                                        @endif

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

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>
@endsection
