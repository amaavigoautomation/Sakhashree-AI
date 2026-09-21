@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')



            <!--Add new section start here-->
            <div class="card-style mt-20">

                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <tbody>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Enquiry Date</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->enquery_date }} </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Unique Code</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->unique_code }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->name }}</p>
                                </td>
                            </tr>
                             <tr>
                                <th class='col-md-2'>
                                    <h6>Contact No.</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->calling_code }} {{ $enquiry->mobile }} </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Email</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->email }} </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'><h6>Country</h6></th>
                                <td>
                                    <p>{{ $enquiry->Country->name }} </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'><h6>City</h6></th>
                                <td>
                                    <p>{{ $enquiry->city }} </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Company URL</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->company_url }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Company Name</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->company_name }} </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'><h6>Team Size</h6></th>
                                <td>
                                    <p>{{ $enquiry->team_size }} </p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>No of Branches</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->no_of_branches == 1 ? 'Yes' : 'No' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Designation</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->designation }} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Remark</h6>
                                </th>
                                <td>
                                    <p>{{ $enquiry->remark }} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Product</h6>
                                </th>
                                <td>
                                    @foreach ($enquiry->products as $product)
                                        <p>{{ $product->name }}</p>
                                    @endforeach
                                </td>
                            </tr>




                        </tbody>
                    </table>
                </div>
            </div>


        </div>


        <!--Add new section end here-->
        </div>
    </section>
@endsection
