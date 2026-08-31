@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Type</h6>
                                </th>
                                <th>
                                    <h6>Name</h6>
                                </th>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <th>
                                    <h6>Phone</h6>
                                </th>
                                <th>
                                    <h6>DOB</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($consultations as $c)
                                <tr>
                                    <td>
                                        {{ $c->consultationType->name ?? '' }}
                                    </td>
                                    <td>
                                        <p>{{ $c->name ?? '' }}</p>
                                    </td>

                                    <td>{{ $c->email ?? '' }}</td>
                                    <td>{{ $c->phone ?? '' }}</td>
                                    <td>{{ $c->dob ?? '' }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('consultations.show', $c->id) }}"><i class="lni lni-list"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @include('partials.pagination', ['items' => $consultations])

        </div>
    </section>
@endsection
