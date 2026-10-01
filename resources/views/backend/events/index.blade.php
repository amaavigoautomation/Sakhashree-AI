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

                                        {{-- City --}}
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="city_name">City</label>

                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="city_name" name="city_name"
                                                        onchange="this.form.submit()">

                                                        <option value="">select</option>

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

                                        {{-- Active Status --}}
                                        <div class="col-sm-3">
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

                                        {{-- Past Event --}}
                                        <div class="col-sm-2">
                                            <div class="select-style-1">
                                                <label for="is_past_event">Past Event</label>

                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="is_past_event" name="is_past_event"
                                                        onchange="this.form.submit()">

                                                        <option value="">select</option>

                                                        <option value="1"
                                                            {{ request('is_past_event') == '1' ? 'selected' : '' }}>
                                                            Yes
                                                        </option>

                                                        <option value="0"
                                                            {{ request('is_past_event') == '0' ? 'selected' : '' }}>
                                                            No
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
                                    <h6>Detail</h6>
                                </th>

                                <th>
                                    <h6>Active</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($events as $event)
                                <tr>

                                    <!-- Image -->
                                    <td>
                                        <p>
                                            @if (!empty($event->image_file))
                                                <img src="{{ asset('public/images/events/' . $event->id . '/' . $event->image_file) }}"
                                                    id="imageBox" alt="{{ $event->image_file }}">
                                            @else
                                                <img src="{{ asset('dist/images/no-image.png') }}" id="imageBox"
                                                    alt="No Image">
                                            @endif
                                        </p>
                                    </td>

                                    <!-- Title -->
                                    <td>
                                        <p>{{ $event->title }}</p>
                                    </td>

                                    <!-- Detail -->
                                    <!-- Detail -->
                                    <td>
                                        <p>
                                            <span style="color: black;">Date - </span>
                                            <span style="color: red;">{{ $event->date }}</span>
                                        </p>

                                        <p style="color: blue;">
                                            <span style="color: black;">Time - </span>
                                            {{ $carbon::parse($event->start_time)->format('g:i A') }}
                                            -
                                            {{ $carbon::parse($event->end_time)->format('g:i A') }}
                                        </p>

                                        <p>
                                            <span style="color: black;">Day - </span>
                                            <span style="color: green;">{{ $event->day }}</span>
                                        </p>

                                        <p>
                                            <span style="color: black;">City - </span>
                                            <span style="color: orange;">{{ $event->city_name ?? '---' }}</span>
                                        </p>
                                    </td>



                                    <!-- Active -->
                                    <td>

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

                                        <a href="{{ route('event.edit', $event->id) }}">
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
