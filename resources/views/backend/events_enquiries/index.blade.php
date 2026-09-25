@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            {{-- Breadcrumb --}}
            @include('partials.breadcrumb')

            <div class="card-style mt-20">

                <div class="table-wrapper table-responsive mt-10">

                    <table class="table striped-table">

                        <thead>
                            <tr>

                                <th>
                                    <h6>Event</h6>
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
 
                            @foreach ($eventsEnquiries as $enquiry)
                                <tr>

                                    {{-- Event --}}
                                    <td>
                                        <p>
                                            {{ $enquiry->event->title ?? '-' }}
                                        </p>
                                    </td>

                                    {{-- Name --}}
                                    <td>
                                        <p>
                                            {{ $enquiry->full_name ?? '-' }}
                                        </p>
                                    </td>

                                    {{-- Contact --}}
                                    <td>
                                        <p>
                                            {{ $enquiry->calling_code ?? '' }}
                                            {{ $enquiry->mobile ?? '-' }}
                                        </p>

                                        <p>
                                            {{ $enquiry->email ?? '-' }}
                                        </p>
                                    </td>

                                    {{-- Enquiry Date --}}
                                    <td>
                                        <p>
                                            {{ $enquiry->created_at ? $enquiry->created_at->format('d-m-Y') : '-' }}
                                        </p>
                                    </td>

                                    {{-- Action --}}
                                    <td class="text-center">
                                        <a href= "#">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

            @include('partials.pagination', ['items' => $eventsEnquiries])

        </div>
    </section>
@endsection
