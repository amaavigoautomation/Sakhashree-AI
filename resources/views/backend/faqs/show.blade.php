@extends('layouts.backend')

@section('content')

<section class="section">

    <div class="container-fluid">

        <!-- Breadcrumb -->
        @include('partials.breadcrumb')

        <!-- FAQ Details -->
        <div class="card-style mt-20">

            <div class="table-wrapper table-responsive mt-10">

                <table class="table striped-table">

                    <tbody>

                        <!-- Question -->
                        <tr>
                            <th class="col-md-2">
                                <h6>Question</h6>
                            </th>

                            <td>
                                <p>{{ $faq->question ?? '---' }}</p>
                            </td>
                        </tr>


                        <!-- Answer -->
                        <tr>
                            <th>
                                <h6>Answer</h6>
                            </th>

                            <td>
                                <p>{{ $faq->answer ?? '---' }}</p>
                            </td>
                        </tr>


                        <!-- Status -->
                        <tr>
                            <th>
                                <h6>Status</h6>
                            </th>

                            <td>

                                @php
                                    if ($faq->active == '1') {
                                        $class = 'activelabel';
                                        $data = 'Active';
                                    } else {
                                        $class = 'inactivelabel';
                                        $data = 'Inactive';
                                    }
                                @endphp

                                <div class="{{ $class }}">
                                    {{ $data }}
                                </div>

                            </td>
                        </tr>


                        <!-- Created At -->
                        <tr>
                            <th>
                                <h6>Created At</h6>
                            </th>

                            <td>
                                <p>{{ $faq->created_at ?? '---' }}</p>
                            </td>
                        </tr>


                        <!-- Updated At -->
                        <tr>
                            <th>
                                <h6>Updated At</h6>
                            </th>

                            <td>
                                <p>{{ $faq->updated_at ?? '---' }}</p>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection