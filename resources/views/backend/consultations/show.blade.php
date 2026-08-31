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
                                <th class='col-md-2'>
                                    <h6>Consultation Type</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $consultation->consultationType->name ?? '' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $consultation->name ?? '' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Email</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $consultation->email ?? '' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Phone</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $consultation->phone ?? '' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>DOB</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $consultation->dob ?? '' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Concerns</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $consultation->concerns ?? '' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Message</h6>
                                </th>
                                <td class=''>
                                    <p>{{ $consultation->message ?? '' }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
