@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            {{-- Breadcrumb --}}
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('workshop_enquiries.export') }}"><button type="button"
                        class="main-btn primary-btn btn-hover btn-xs">Export to Excel</button></a>
            </div>

            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">

                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Workshop</h6>
                                </th>
                                <th>
                                    <h6>Name</h6>
                                </th>
                                <th>
                                    <h6>Contact</h6>
                                </th>

                                <th>
                                    <h6>Enquiry Date</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($workshopEnquiries as $enquiry)
                                <tr>
                                    <td>
                                        <p>
                                            {{ $enquiry->workshop->name ?? '-' }} </p>
                                    </td>

                                    <td>
                                        <p>
                                            {{ $enquiry->full_name ?? '-' }}
                                        </p>
                                    </td>

                                    <td>
                                        <p>
                                            @php
                                                $countryDetail = $enquiry->country?->countryDetails?->first();
                                            @endphp

                                            @if ($countryDetail?->icon_image)
                                                <img src="{{ asset('public/images/country_details/icon_image/' . $countryDetail->id . '/' . $countryDetail->icon_image) }}"
                                                    alt="{{ $enquiry->country->name ?? '' }}" class="countryIcon">
                                            @endif

                                            {{ $enquiry->calling_code ?? '' }}
                                            {{ $enquiry->mobile ?? '-' }}
                                        </p>

                                        <p>
                                            {{ $enquiry->email ?? '-' }}
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ $enquiry->created_at ? $enquiry->created_at->format('d-m-Y') : '-' }}
                                        </p>
                                    </td>

                                    <td class="text-center">
                                        <a
                                            href="{{ route('workshop_enquiries.show', ['workshop_enquiry' => $enquiry->id]) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

            @include('partials.pagination', ['items' => $workshopEnquiries])

        </div>
    </section>
@endsection
