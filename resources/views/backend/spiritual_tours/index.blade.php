@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('spiritual_tours_listing.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">
                        Create
                    </button>
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

                                <form method="GET" action="{{ route('spiritual_tours_listing.index') }}">

                                    <div class="row">

                                        {{-- Title --}}
                                        <div class="col-sm-3">

                                            <div class="select-style-1">

                                                <label for="title">Title</label>

                                                <div class="select-position select-sm">

                                                    <select class="jSelectbox" id="title" name="title"
                                                        onchange="this.form.submit()">

                                                        <option value="">All</option>

                                                        @foreach ($titles as $title)
                                                            <option value="{{ $title }}"
                                                                {{ request('title') == $title ? 'selected' : '' }}>

                                                                {{ $title }}

                                                            </option>
                                                        @endforeach

                                                    </select>

                                                </div>

                                            </div>

                                        </div>


                                        {{-- Location --}}
                                        <div class="col-sm-3">

                                            <div class="select-style-1">

                                                <label for="location">Location</label>

                                                <div class="select-position select-sm">

                                                    <select class="jSelectbox" id="location" name="location"
                                                        onchange="this.form.submit()">

                                                        <option value="">select</option>

                                                        @foreach ($locations as $location)
                                                            <option value="{{ $location }}"
                                                                {{ request('location') == $location ? 'selected' : '' }}>

                                                                {{ $location }}

                                                            </option>
                                                        @endforeach

                                                    </select>

                                                </div>

                                            </div>

                                        </div>


                                        {{-- Status --}}
                                        <div class="col-sm-2">

                                            <div class="select-style-1">

                                                <label for="status">Status</label>

                                                <div class="select-position select-sm">

                                                    <select class="jSelectbox" id="status" name="status"
                                                        onchange="this.form.submit()">

                                                        <option value="">select</option>

                                                        <option value="1"
                                                            {{ request('status') == '1' ? 'selected' : '' }}>

                                                            Active

                                                        </option>

                                                        <option value="0"
                                                            {{ request('status') == '0' ? 'selected' : '' }}>

                                                            Inactive

                                                        </option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>


                                        {{-- Upcoming --}}
                                        <div class="col-sm-2">

                                            <div class="select-style-1">

                                                <label for="is_upcoming">Upcoming</label>

                                                <div class="select-position select-sm">

                                                    <select class="jSelectbox" id="is_upcoming" name="is_upcoming"
                                                        onchange="this.form.submit()">

                                                        <option value="">select</option>

                                                        <option value="1"
                                                            {{ request('is_upcoming') == '1' ? 'selected' : '' }}>

                                                            Yes

                                                        </option>

                                                        <option value="0"
                                                            {{ request('is_upcoming') == '0' ? 'selected' : '' }}>

                                                            No

                                                        </option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>


                                        {{-- Reset --}}
                                        <div class="col-sm-2">

                                            <a href="{{ route('spiritual_tours_listing.index') }}">

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



                <div class="table-wrapper table-responsive mt-10">

                    <table class="table striped-table">

                        <thead>
                            <tr>
                                <th>
                                    <h6>Image</h6>
                                </th>

                                <th>
                                    <h6>Title</h6>
                                </th>

                                <th>
                                    <h6>Date</h6>
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

                            @foreach ($spiritualTours as $tour)
                                <tr>

                                    <td>
                                        @if (!empty($tour->image_file))
                                            <img src="{{ asset('public/images/spiritual_tours/image_file/' . $tour->id . '/' . $tour->image_file) }}"
                                                id="imageBox">
                                        @endif
                                    </td>

                                    <td>
                                        <p>{{ $tour->title }}</p>
                                    </td>

                                    <td>
                                        <p>
                                            <span style="color: black;">Start Date - </span>
                                            <span style="color: red;">{{ $tour->start_date }}</span>
                                        </p>

                                        <p>
                                            <span style="color: black;">End Date - </span>
                                            <span style="color: blue;">{{ $tour->end_date }}</span>
                                        </p>

                                    </td>

                                    <td>

                                        @php
                                            $active = $tour->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp

                                        <input type="checkbox" id="toggle-{{ $tour->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $tour->id }}"
                                            data-model="SpiritualTour" {{ $checked }}>

                                        <label for="toggle-{{ $tour->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>

                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('spiritual_tours_listing.edit', $tour->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

        @include('partials.pagination', ['items' => $spiritualTours])

        </div>
    </section>
@endsection
