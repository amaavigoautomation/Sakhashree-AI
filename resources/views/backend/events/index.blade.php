@php
    $carbon = \Carbon\Carbon::class;
@endphp

@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('event.create') }}">
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

                                <form method="GET" action="{{ route('event.index') }}">

                                    <div class="row">

                                        {{-- Event Title --}}
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="title">Event Title</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="title" name="title"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>

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

                                        {{-- Event Location --}}
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="city_name">Event Location</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="city_name" name="city_name"
                                                        onchange="this.form.submit()">

                                                        <option value="">Select</option>

                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city }}"
                                                                {{ request('city_name') == $city ? 'selected' : '' }}>
                                                                {{ $city }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Status --}}
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="status">Status</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="status" name="status"
                                                        onchange="this.form.submit()">

                                                        <option value="">Select</option>

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

                                        {{-- Event Type --}}
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="is_past_event">Event Type</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="is_past_event" name="is_past_event"
                                                        onchange="this.form.submit()">

                                                        <option value="">Select</option>

                                                        <option value="0"
                                                            {{ request('is_past_event') == '0' ? 'selected' : '' }}>
                                                            Upcoming Event
                                                        </option>

                                                        <option value="1"
                                                            {{ request('is_past_event') == '1' ? 'selected' : '' }}>
                                                            Past Event
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Reset --}}
                                        <div class="col-sm-1">
                                            <a href="{{ route('event.index') }}">
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

                    <table class="table striped-table align-middle">

                        <thead>
                            <tr>
                                <th>
                                    <h6>Event Image</h6>
                                </th>
                                <th>
                                    <h6>Event Title</h6>
                                </th>
                                <th>
                                    <h6>Event Details</h6>
                                </th>
                                <th>
                                    <h6>Status</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Actions</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($events as $event)
                                <tr>

                                    <!-- Image -->
                                    <td>
                                        @if (!empty($event->image_file))
                                            <img src="{{ asset('public/images/events/' . $event->id . '/' . $event->image_file) }}"
                                                id="imageBox" alt="{{ $event->image_file }}" width="80"
                                                class="img-thumbnail rounded" loading="lazy">
                                        @else
                                            <img src="{{ asset('dist/images/no-image.png') }}" id="imageBox"
                                                alt="No Image" width="80" class="img-thumbnail rounded">
                                        @endif
                                    </td>

                                    <!-- Title -->
                                    <td>
                                        <p class="mb-0">
                                            <strong>{{ $event->title ?? '' }}</strong>
                                        </p>
                                    </td>

                                    <!-- Details -->
                                    <td>
                                        <p class="mb-1">
                                            <strong>Date:</strong>
                                            {{ $event->date }}
                                        </p>

                                        <p class="mb-1">
                                            <strong>Time:</strong>
                                            {{ $carbon::parse($event->start_time)->format('g:i A') }}
                                            -
                                            {{ $carbon::parse($event->end_time)->format('g:i A') }}
                                        </p>

                                        <p class="mb-1">
                                            <strong>Day:</strong>
                                            {{ $event->day ?? '' }}
                                        </p>

                                        <p class="mb-0">
                                            <strong>Event Location:</strong>
                                            {{ $event->city_name ?? '' }}
                                        </p>
                                    </td>

                                    <!-- Active -->
                                    <td class="text-center">

                                        @php
                                            $active = $event->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp

                                        <input type="checkbox" id="toggle-{{ $event->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $event->id }}"
                                            data-model="Event" {{ $checked }}>

                                        <label for="toggle-{{ $event->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>

                                    </td>

                                    <!-- Action -->
                                    <td class="text-center">
                                        <a href="{{ route('event.edit', $event->id) }}" title="Edit">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

            @include('partials.pagination', ['items' => $events])

        </div>
    </section>
@endsection
