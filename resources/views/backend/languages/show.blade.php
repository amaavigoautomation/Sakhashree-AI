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
                            <td><p>{{ $language->name ?? '---' }}</p></td>
                        </tr>

                         <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                            <p>{{ $language->country->name ?? '---' }}</p>
                        </td>
                    </tr>

                        <tr>
                            <th class="col-md-2"><h6>Status</h6></th>
                            <td>
                                @php
                                    $class = $language->active == 1 ? 'activelabel' : 'inactivelabel';
                                    $statusText = $language->active == 1 ? 'Active' : 'Inactive';
                                @endphp
                                <div class="{{ $class }}">{{ $statusText }}</div>
                            </td>
                        </tr>



                        <tr>
                            <th class="col-md-2"><h6>Created At</h6></th>
                            <td>
                                <p>
                                    {{ $language->created_at ?? '---' }}
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th class="col-md-2"><h6>Updated At</h6></th>
                            <td>
                                <p>
                                    {{ $language->updated_at ?? '---' }}
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
