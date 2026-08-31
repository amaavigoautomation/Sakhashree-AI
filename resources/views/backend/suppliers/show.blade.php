@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <div class="card-style mt-20">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Supplier Details</h3>
                        <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <tbody>
                            <tr>
                                <th>
                                    <h6>Profile Image</h6>
                                </th>
                                <td>
                                    @php
                                        $imagePath = $supplier->image_file
                                            ? asset("public/images/suppliers/image_file/{$supplier->id}/{$supplier->image_file}")
                                            : asset('dist/no-image.png');
                                    @endphp
                                    <img src="{{ $imagePath }}" alt="Supplier Image" id="iconBox">
                                </td>
                            </tr>
                            <tr>
                                <th><h6>Unique Code</h6></th>
                                <td>
                                    <p>{{ $supplier->unique_code??'---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th><h6>Name</h6></th>
                                <td><p>{{ ($supplier->salutation->title ?? '') . ' ' . ($supplier->name ?? '---') }}</p></td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <td>
                                    <p>{{ $supplier->email ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th><h6>Date Of Birth</h6></th>
                                <td>
                                    <p><?php echo date_format(date_create($supplier->date_of_birth), 'F j, Y'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Contact No.</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ isset($supplier->country->calling_code) ? $supplier->country->calling_code . ' ' : ''}}
                                        {{ $supplier->contact_no ?? '---' }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Alternative No.</h6>
                                </th>
                                <td>
                                    <p>{{ $supplier->alternate_no ?? '---' }}</p>
                                </td>
                            </tr>

                             <tr>
                                <th>
                                    <h6>Active</h6>
                                </th>
                                <td>
                                    @php
                                        $activeClass = $supplier->active == 1 ? 'activelabel' : 'inactivelabel';
                                        $activeStatus = $supplier->active == 1 ? 'Active' : 'Inactive';
                                    @endphp
                                    <div class="{{ $activeClass }}">{{ $activeStatus }}</div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Is Approved</h6>
                                </th>
                                <td>
                                    @php
                                        $approvedClass = $supplier->its_approved == 1 ? 'activelabel' : 'inactivelabel';
                                        $approvedStatus = $supplier->its_approved == 1 ? 'Approved' : 'Not Approved';
                                    @endphp
                                    <div class="{{ $approvedClass }}">{{ $approvedStatus }}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    </div>
                    <div class="col-sm-6">
                        <h3>Address Details</h3>
                          <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <tbody>
                             <tr>
                                <th>
                                    <h6>Country</h6>
                                </th>
                                <td>
                                    <p>{{ $supplier->country->name ?? '---' }}</p>
                                </td>
                            </tr>
                             <tr>
                                <th>
                                    <h6> Timezone</h6>
                                </th>
                                <td>
                                    <p>{{ $supplier->timezone->name ?? '---'}}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>State</h6>
                                </th>
                                <td>
                                    <p>{{ $supplier->state->name ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>City</h6>
                                </th>
                                <td>
                                    <p>{{ $supplier->city->name ?? '---' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Zipcode</h6>
                                </th>
                                <td>
                                    <p>{{ $supplier->zipcode ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Address</h6>
                                </th>
                                <td>
                                    <p>{{ $supplier->address ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>

                              <tr>
                            <th class="col-md-2"><h6>Created At</h6></th>
                            <td>
                                <p>
                                    {{ $supplier->created_at}}
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th class="col-md-2"><h6>Updated At</h6></th>
                            <td>
                                <p>
                                    {{ $supplier->updated_at}}
                                </p>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                    </div>
                </div>
            </div>

            <br>

            <h3>Supplier Company</h3>
            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <tbody>
                            <tr>
                                <th>
                                    <h6>Company Name</h6>
                                </th>
                                <td>
                                    <p>{{ ($supplierCompany->company_name ?? '---') }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierCompany->email ?? '---' }}</p>
                                </td>
                            </tr>
                                <th>
                                    <h6>Contact No.</h6>
                                </th>
                                <td>
                                    <p>
                                        {{ $supplierCompany->contact ?? '---' }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Alternative No</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierCompany->alternate_no ?? '---' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6>Website</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierCompany->website ?? '---' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Company Address</h6>
                                </th>
                                <td>
                                    <p>{{ $supplierCompany->company_address ?? '---' }}</p>
                                </td>
                            </tr>
                                <th>
                                    <h6>Company Logo</h6>
                                </th>
                                <td>
                                    @php
                                        $imagePath = $supplierCompany->company_logo
                                            ? asset("public/images/supplier_company/company_logo/{$supplierCompany->id}/{$supplierCompany->company_logo}")
                                            : asset('dist/no-image.png');
                                    @endphp
                                    <img src="{{ $imagePath }}" alt="Supplier Image" id="imageBox">
                                </td>
                            </tr>
                              <tr>
                            <th class="col-md-2"><h6>Created At</h6></th>
                            <td>
                                <p>
                                    {{ $supplierCompany->created_at}}
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <th class="col-md-2"><h6>Updated At</h6></th>
                            <td>
                                <p>
                                    {{ $supplierCompany->updated_at}}
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




