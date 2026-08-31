@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <!--         <a href="{{ route('countries.index') }}">
                <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button>
                </a> -->
                <a href="{{ route('countries.add') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>

            <!--Add new section start here-->
            <div class="card-style mt-20">
                <div class="accordion" id="filterAccordion">
                    <div class="accordion-item">
                        @php
                            $show = !empty(request()->all()) ? 'show' : '';
                        @endphp
                        <h2 class="accordion-header" id="headingFilter">
                            <button class="accordion-button {{ $show ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFilter"
                                aria-expanded="{{ $show ? 'true' : 'false' }}" aria-controls="collapseFilter">
                                <i class="lni lni-search-alt"></i>&nbsp;&nbsp;Search..
                            </button>
                        </h2>
                        <div id="collapseFilter" class="accordion-collapse collapse {{ $show }}"
                            aria-labelledby="headingFilter" data-bs-parent="#filterAccordion">
                            <div class="accordion-body">
                                <form method="GET" action="{{ route('countries.index') }}" enctype="multipart/form-data"
                                    id="filterForm" controller='countries'>
                                    <div class="row">
                                        <!-- Countries -->
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label>Country</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="actionDropdown" name="country_id"
                                                        required>
                                                        <option value="">Select</option>
                                                        <?php
                                                            foreach ($countryList as $countryId => $country){
                                                            $selected = ($selectedCountryId == $countryId) ? 'selected' : '';
                                                        ?>
                                                        <option value="{{ $countryId }}" {{ $selected }}>
                                                            {{ $country }}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Country Status -->
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label>Status</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="status" name="active" required>
                                                        <option value="">Select</option>
                                                        <?php
                                                            foreach ($countryStatus as $display => $value) {
                                                            $checked = ($statusValue == $value) ? 'selected' : '';
                                                        ?>
                                                        <option value="{{ $value }}" {{ $checked }}>
                                                            {{ $display }}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Resate -->
                                        <div class="col-sm-2">
                                            <a href="{{ route('countries.index') }}">
                                                <button type="button" class="main-btn primary-btn btn-hover btn-xs"
                                                    style="margin-top:28px">Reset</button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Country </h6>
                                </th>
                                <th>
                                    <h6> Alpha 2 Code </h6>
                                </th>
                                <th>
                                    <h6>Alpha 3 Code</h6>
                                </th>
                                <th>
                                    <h6>Calling Code</h6>
                                </th>
                                <th class="text-left">
                                    <h6>Status</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                                <tr>
                                    <td>
                                        <p>
                                            @if ($country->countryDetails->isNotEmpty())
                                                @php
                                                    $firstImage = $country->countryDetails->first()->icon_image;

                                                    $id = $country->countryDetails->first()->id;

                                                    $imagePath = $firstImage
                                                        ? asset(
                                                            "public/images/country_details/icon_image/{$id}/{$firstImage}",
                                                        )
                                                        : asset('dist/images/no-image.png');

                                                    //dd($imagePath);

                                                @endphp
                                                @if (!empty($imagePath))
                                                    <img src="{{ $imagePath }}" class='countryIcon'>
                                                @endif
                                            @endif
                                            {{ $country->name }}
                                        </p>
                                    </td>
                                    <td>
                                        <p>{{ $country->alpha_2_code }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $country->alpha_3_code }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $country->calling_code }}</p>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $active = $country->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $country->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $country->id }}"
                                            data-model="Country" {{ $checked }}>
                                        <label for="toggle-{{ $country->id }}" class="toggle-label"><span
                                                class="toggle-slider"></span></label>
                                    </td>
                                    <td class="text-center"><a href="{{ route('countries.edit', $country->id) }}"><i
                                                class="lni lni-pencil-alt"></i></a>
                                        <a href="{{ route('countries.show', $country->id) }}"><i
                                                class="lni lni-list"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            <!-- end table row -->


                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
            <!-- Pagination Start Here -->
            @include('partials.pagination', ['items' => $countries])
            <!-- Pagination End here -->
            <!--Add new section end here-->
        </div>
    </section>
@endsection
