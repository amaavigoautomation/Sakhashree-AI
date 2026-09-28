@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <div class="right-mob-left">
                <a href="{{ route('workshops_listing.create') }}"><button type="button"
                        class="main-btn primary-btn btn-hover btn-xs">Create</button></a>
            </div>
        </div>

        <div class="container-fluid">
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

                                <form method="GET" action="{{ route('workshops_listing.index') }}">

                                    <div class="row">

                                        {{-- Name --}}
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="name">Name</label>

                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="name" name="name"
                                                        onchange="this.form.submit()">

                                                        <option value="">all</option>

                                                        @foreach ($name as $workshopName)
                                                            <option value="{{ $workshopName }}"
                                                                {{ request('name') == $workshopName ? 'selected' : '' }}>
                                                                {{ $workshopName }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- City --}}
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="city">City</label>

                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="city" name="city"
                                                        onchange="this.form.submit()">

                                                        <option value="">select</option>

                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city }}"
                                                                {{ request('city') == $city ? 'selected' : '' }}>
                                                                {{ $city }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Active Status --}}
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="status">Status</label>

                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="status" name="status"
                                                        onchange="this.form.submit()">

                                                        <option value="">select</option>

                                                        <option value="active"
                                                            {{ request('status') == 'active' ? 'selected' : '' }}>
                                                            Active
                                                        </option>

                                                        <option value="inactive"
                                                            {{ request('status') == 'inactive' ? 'selected' : '' }}>
                                                            Inactive
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Latest Workshop --}}
                                        <div class="col-sm-2">
                                            <div class="select-style-1">
                                                <label for="is_latest">Latest Event</label>

                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="is_latest" name="is_latest"
                                                        onchange="this.form.submit()">

                                                        <option value="">select</option>

                                                        <option value="1"
                                                            {{ request('is_latest') == '1' ? 'selected' : '' }}>
                                                            Yes
                                                        </option>

                                                        <option value="0"
                                                            {{ request('is_latest') == '0' ? 'selected' : '' }}>
                                                            No
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Reset --}}
                                        <div class="col-sm-1">
                                            <a href="{{ route('workshops_listing.index') }}">
                                                <button type="button" class="main-btn primary-btn btn-hover btn-xs"
                                                    style="margin-top:28px">
                                                    Reset
                                                </button>
                                            </a>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row"></div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Image</h6>
                                </th>

                                <th>
                                    <h6>Name</h6>
                                </th>

                                <th>
                                    <h6>City</h6>
                                </th>

                                <th>
                                    <h6>Date</h6>
                                </th>

                                <th class="text-left">
                                    <h6>Active</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workshops as $workshop)
                                <tr>
                                    <td>
                                        @if (!empty($workshop->image_file))
                                            <img src="{{ asset('public/images/workshops/image_file/' . $workshop->id . '/' . $workshop->image_file) }}"
                                                id="imageBox">
                                        @endif
                                    </td>
                                    <td>
                                        <p> {{ $workshop->name }} </p>
                                    </td>
                                    <td>
                                        <p> {{ $workshop->city }} </p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ $workshop->created_at ? $workshop->created_at->format('d-m-Y') : '-' }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $active = $workshop->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $workshop->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $workshop->id }}"
                                            data-model="Workshop" {{ $checked }}>
                                        <label for="toggle-{{ $workshop->id }}" class="toggle-label"><span
                                                class="toggle-slider"></span></label>
                                    </td>
                                    <td class="text-center"><a
                                            href="{{ route('workshops_listing.edit', $workshop->id) }}"><i
                                                class="lni lni-pencil-alt"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $workshops])
        </div>
    </section>
@endsection
