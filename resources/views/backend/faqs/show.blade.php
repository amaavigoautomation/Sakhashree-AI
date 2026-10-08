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

                        <tr>
                            <th class="col-md-2">
                                <h6>FAQ Category</h6>
                            </th>

                            <td>
                                <p>{{ $faq->faqType->name ?? '' }}</p>
                            </td>
                        </tr>

                        <!-- Question -->
                        <tr>
                            <th class="col-md-2">
                                <h6>Question</h6>
                            </th>

                            <td>
                                <p>{{ $faq->question ?? '' }}</p>
                            </td>
                        </tr>


                        <!-- Answer -->
                        <tr>
                            <th>
                                <h6>Answer</h6>
                            </th>

                            <td>
                                <p>{{ $faq->answer ?? '' }}</p>
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

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection
