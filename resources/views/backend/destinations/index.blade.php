@extends('layouts.backend')

@section('content')
<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')


        <div class="right-mob-left">
            <a href="{{ route('destinations.create') }}">
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
                    <form action="{{ route('destinations.index') }}" method="GET">
                        <div class="row">

                            <div class="col-sm-3">
                                        <div class="select-style-1">
                                            <label for="name">Destination Name</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="name" name="id" onchange="this.form.submit()">
                                                    <option value="">All</option>
                                                    @foreach ($destinationsArr as $destinationsId => $destination)
                                                        <option value="{{ $destinationsId }}" {{ request('id') == $destinationsId ? 'selected' : '' }}>
                                                            {{ $destination }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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
                            </div>

                            <div class="col-sm-2">
                                <a href="{{ route('destinations.index') }}">
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
                            <th>Name</th>
                            <th>Country</th>
                            <th>Active</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($destinations as $destination)
                        <tr>
                            <td><p>{{ $destination->name }}</p></td>

                            <td><p>{{ $destination->country ? $destination->country->name : '---' }}</p></td>

                            <td class="text-center">
                                @php
                                    $active = $destination->active;
                                    $checked = $active == 1 ? 'checked' : '';
                                @endphp
                                <input type="checkbox" id="toggle-{{ $destination->id }}" class="status-checkbox toggle-checkbox" data-id="{{ $destination->id }}" data-model="Destination" {{ $checked }}>
                                <label for="toggle-{{ $destination->id }}" class="toggle-label">
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('destinations.edit', $destination->id) }}"><i class="lni lni-pencil-alt"></i></a>
                                <a href="{{ route('destinations.show', $destination->id) }}"><i class="lni lni-list"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('partials.pagination', ['items' => $destinations])
    </div>
</section>
@endsection
