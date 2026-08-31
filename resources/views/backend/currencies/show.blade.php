@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <tbody>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Name</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->name }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>ISO Code</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->iso_code }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>ISO Code No</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->iso_code_num }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Sign</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->sign }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Blank</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->blank == 1 ? 'Yes' : 'No' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Format</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->format == 1 ? 'Yes' : 'No' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Decimals</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->decimals == 1 ? 'Yes' : 'No' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Conversion Rate</h6>
                                </th>
                                <td>
                                    <p> {{ $currencies->conversion_rate}} </p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Display on Frontend</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->display_on_frontend == 1 ? 'Yes' : 'No' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Default Country</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->its_default_country == 1 ? 'Yes' : 'No' }}</p>
                                </td>
                            </tr>

                            <tr>
                                <th><h6>Active</h6></th>
                                <td>
                                    @php if($currencies->active == '1'){
                                      $class = 'activelabel';
                                      $data = 'Active';
                                      }
                                      else{
                                      $class = 'inactivelabel';
                                      $data = 'Inactive';
                                      } @endphp
                                      <div class="{{ $class; }}">{{ $data }}</div>
                                  </td>
                                </tr>

                            <tr>
                                <th class='col-md-2'>
                                    <h6>Created At</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->created_at }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class='col-md-2'>
                                    <h6>Updated At</h6>
                                </th>
                                <td>
                                    <p>{{ $currencies->updated_at }}</p>
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
