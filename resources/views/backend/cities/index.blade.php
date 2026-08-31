@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('cities.create') }}">
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
                                <form method="GET" action="{{ route('cities.index') }}" enctype="multipart/form-data"
                                    id="filterForm" controller='cities'>
                                    <div class="row">
                                        <!-- City -->
                                        <div class="col-sm-3">
                                            <label>City</label>
                                            <div class="searchfield position-relative">
                                                <input type="text" placeholder="Search..." id="search_city" autocomplete="off" value="{{ $selectedCityName }}">
                                                <input type="hidden" id="selected_city_id" name="city_id" value="{{ $selectedCityId }}">
                                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                                                <div id="city_suggestions"></div>
                                            </div>
                                        </div>
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
                                        <!-- State -->
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label>State</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="actionDropdown" name="state_id" required>
                                                        <option value="">Select</option>
                                                        <?php
                                                            foreach ($stateList as $stateId => $state){
                                                            $selected = ($selectedStateId == $stateId) ? 'selected' : '';
                                                        ?>
                                                        <option value="{{ $stateId }}" {{ $selected }}>
                                                            {{ $state }}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- City Status -->
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label>Status</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="status" name="active" required>
                                                        <option value="">Select</option>
                                                        <?php
                                                            foreach ($cityStatus as $display => $value) {
                                                            $checked = ($statusValue == $value) ? 'selected' : '';
                                                        ?>
                                                        <option value="{{ $value }}" {{ $checked }}>
                                                            {{ $display }}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Reset -->
                                        <div class="col-sm-2">
                                            <a href="{{ route('cities.index') }}">
                                                <button type="button" class="main-btn dark-btn btn-hover btn-xs"
                                                    style="margin-top:28px">Reset</button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="table-wrapper table-responsive mt-10">
                        <table class="table striped-table">
                            <thead>
                                <tr>
                                    <th width="25">
                                        <div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1"></div>
                                    </th>
                                    <th>
                                        <h6>Banner</h6>
                                    </th>
                                    <th>
                                        <h6>Country <i class="lni lni-sort-alpha-asc"></i></h6>
                                    </th>
                                    <th>
                                        <h6>State <i class="lni lni-sort-alpha-asc"></i></h6>
                                    </th>
                                    <th>
                                        <h6>City <i class="lni lni-sort-alpha-asc"></i></h6>
                                    </th>
                                    <th class="text-left">
                                        <h6>Status</h6>
                                    </th>
                                    <th class="text-center">
                                        <h6>Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr>
                                        <td>
                                            <div class="check-input-primary"><input class="form-check-input" type="checkbox"
                                                    id="checkbox-1"></div>
                                        </td>
                                        <td>
                                            <p>
                                                @php
                                                    $firstImage = $city->image_file;
                                                    $id = $city->id;
                                                    $imagePath = $firstImage ? asset("public/images/cities/image_file/{$id}/{$firstImage}"): null;
                                                @endphp
                                                @if (!empty($imagePath))
                                                    <img src="{{ $imagePath }}" id="bannerBox">
                                                @endif
                                            </p>
                                        </td>
                                        <td>
                                            <p> {{ $city->country->name }} </p>
                                        </td>
                                        <td>
                                            <p>{{ $city->state->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $city->name }}</p>
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $active = $city->active;
                                                $checked = $active == 1 ? 'checked' : '';
                                            @endphp
                                            <input type="checkbox" id="toggle-{{ $city->id }}"
                                                class="status-checkbox toggle-checkbox" data-id="{{ $city->id }}"
                                                data-model="City" {{ $checked }}>
                                            <label for="toggle-{{ $city->id }}" class="toggle-label"><span
                                                    class="toggle-slider"></span></label>
                                        </td>
                                        <td class="text-center"><a href="{{ route('cities.edit', $city->id) }}"><i
                                                    class="lni lni-pencil-alt"></i></a>
                                            <a href="{{ route('cities.show', $city->id) }}"><i
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
                <!--Add new section end here-->
            </div>
            @include('partials.pagination', ['items' => $cities])
    </section>
@endsection
