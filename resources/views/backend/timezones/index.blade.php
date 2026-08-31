@extends('layouts.backend')

@section('content')
<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')

        <div class="right-mob-left">
            <a href="{{ route('timezones.create') }}">
                <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
            </a>
        </div>

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
                    <form action="{{ route('timezones.index') }}" method="GET">
                        <div class="row">
                            <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="category_id">Country</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="country_id" name="country_id"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ request('country_id') == $country->id ? 'selected' : '' }}>
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                            <div class="col-sm-3">
                                        <div class="select-style-1">
                                            <label for="name">Timezone Name</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="name" name="id" onchange="this.form.submit()">
                                                    <option value="">All</option>
                                                    @foreach ($timezonesArr as $timezonesId => $timezone)
                                                        <option value="{{ $timezonesId }}" {{ request('id') == $timezonesId ? 'selected' : '' }}>
                                                            {{ $timezone }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
{{-- 
                            <div class="col-md-3">
                                <div class="select-style-1">
                                    <label for="status">Status</label>
                                    <div class="select-position select-sm">
                                        <select class="jSelectbox" id="status" name="status"
                                            onchange="this.form.submit()">
                                            <option value="">Select</option>
                                            @foreach ($statuses as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ request('status') == $key ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-sm-2">
                                <a href="{{ route('timezones.index') }}">
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
                            {{-- <th>ID</th> --}}
                            <th>Country</th>
                            <th>Timezone Name</th>
                            <th>Timezone Value</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timezones as $timezone)
                        <tr>
                            {{-- <td>{{ $index + 1 }}</td> --}}
                            <td>
                                <p>{{ $timezone->country ? $timezone->country->name : 'N/A' }}</p>
                            </td>
                            <td>
                                <p>{{ $timezone->name }}</p>
                            </td>
                            <td>
                                <p>{{ $timezone->value }}</p>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('timezones.show', $timezone->id) }}">
                                    <i class="lni lni-list"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('partials.pagination', ['items' => $timezones])
    </div>
</section>
@endsection
