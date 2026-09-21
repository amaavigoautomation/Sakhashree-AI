@extends('layouts.backend')

@section('content')
<section class="section">
<div class="container-fluid">
@include('partials.breadcrumb')
<div class="card-style mt-20">
    {{-- <div class="right-mob-left">
        <a href="{{ route('export-enquiries.export', request()->query()) }}" class="main-btn primary-btn btn-hover btn-xs">
            <i class="fas fa-file-excel"></i> Export to Excel
        </a>
    </div> --}}

                <hr>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th class="col-sm-3">Client Detail</th>
                                <th class="col-sm-3">Demo Detail</th>
                                <th class="col-sm-3">Umrah Products</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enquiries as $enquiry)
                                <tr>

                                    <td>
                                        <p><strong>Name:</strong> {{ $enquiry->name ?? '---' }}</p>

                                        <p><strong>Company Name:</strong> {{ $enquiry->company_name ?? '---' }}</p>

                                        <p><strong>Designation:</strong> {{ $enquiry->designation ?? '---' }}</p>

                                        <p><strong>Email:</strong> {{ $enquiry->email ?? '---' }}</p>

                                        <p><strong>Mobile:</strong> {{ $enquiry->calling_code }} {{ $enquiry->mobile }}</p>

                                        @if (!empty($enquiry->company_url))
                                         <p><strong>Website:</strong>
                                            @php
                                                $url = $enquiry->company_url;
                                                if (!preg_match('/^https?:\/\//', $url)) {
                                                    $url = 'https://' . $url;
                                                }
                                            @endphp
                                            <a href="{{ $url }}" target="_blank">Website URL</a>
                                        @endif
                                    </p>
                                    </td>

                                    <td>
                                        <p><strong>EnquiryCode:</strong> {{ $enquiry->unique_code ?? '---' }}</p>
                                        <p><strong>Country:</strong> {{ $enquiry->Country->name ?? '---' }}</p>
                                        <p><strong>City:</strong> {{ $enquiry->city ?? '---' }}</p>
                                        <p><strong>TeamSize:</strong> {{ $enquiry->team_size ?? '---' }}</p>
                                        <p><strong>Enquiry Date:</strong>{{ date_format(date_create($enquiry->enquery_date), 'jS M Y') }}</p>
                                    </td>

                                    <td>
                                        @foreach ($enquiry->products as $product)
                                            <div style="background-color: #e0e0e0; padding: 2px 6px; margin: 2px 2px 2px 0; border-radius: 3px; font-size: 12px; display: inline-block;">
                                                {{ $product->name }}
                                            </div>
                                        @endforeach
                                    </td>



                                    <td>
                                        <p class="text-center"><strong></strong><a href="{{ route('enquiries.show', $enquiry->id) }}"><i class="lni lni-list" title="View Details"></i></a></p>
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
