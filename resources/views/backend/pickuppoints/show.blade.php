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
                            <th class="col-md-2"><h6>Name</h6></th>
                            <td><p>{{ $pickuppoint->name ?? '---' }}</p></td>
                        </tr>

                        <tr>
                            <th class="col-md-2"><h6>Status</h6></th>
                            <td>
                                @php
                                    $class = $pickuppoint->active == 1 ? 'activelabel' : 'inactivelabel';
                                    $statusText = $pickuppoint->active == 1 ? 'Active' : 'Inactive';
                                @endphp
                                <div class="{{ $class }}">{{ $statusText }}</div>
                            </td>
                        </tr>

                        <tr>
                            <th class="col-md-2"><h6>Created At</h6></th>
                            <td>
                                <p>
<<<<<<< HEAD
                                    {{ $pickuppoint->created_at ?? '---' }}
=======
                                    {{ $pickuppoint->created_at }}
>>>>>>> ffb6c2f7fb27aa4217726ba55298e2d7048534d2
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th class="col-md-2"><h6>Updated At</h6></th>
                            <td>
                                <p>
<<<<<<< HEAD
                                    {{ $pickuppoint->updated_at ?? '---' }}
=======
                                    {{ $pickuppoint->updated_at }}
>>>>>>> ffb6c2f7fb27aa4217726ba55298e2d7048534d2
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
