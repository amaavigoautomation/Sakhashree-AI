@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')
            {{-- export button --}}
            <div class="right-mob-left">
                <a href="{{ route('enquiries.export') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">
                        Export to Excel
                    </button>
                </a>
            </div>
            <div class="card-style mt-20">

                <div class="table-wrapper table-responsive mt-10">

                    <table class="table striped-table">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Mobile No</th>
                                {{-- <th>Description</th> --}}
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($enquiries as $enquiry)
                                <tr>
                                    <td>
                                        {{ $enquiry->full_name ?? '---' }} </td>

                                    <td>
                                        {{ $enquiry->email ?? '---' }}
                                    </td>

                                    <td>
                                        {{ $enquiry->country->name ?? '---' }}
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
                                            {{ $enquiry->phone ?? '---' }}
                                        </p>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('enquiries.show', $enquiry->id) }}">
                                            <i class="lni lni-list" title="View Details"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

            @include('partials.pagination', ['items' => $enquiries])

        </div>
    </section>
@endsection
