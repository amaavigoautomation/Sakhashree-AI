@extends('layouts.backend')

@section('content')
<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')


        <div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                        <tr class="hide">
                            <th class="col-md-2"><h6>ID</h6></th>
                            <td>
                                <p>{{ $timezone->id }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Country</h6></th>
                            <td>
                                <p>{{ $timezone->country ? $timezone->country->name : 'N/A' }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Timezone Name</h6></th>
                            <td>
                                <p>{{ $timezone->name }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Timezone Value</h6></th>
                            <td>
                                <p>{{ $timezone->value }}</p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection
