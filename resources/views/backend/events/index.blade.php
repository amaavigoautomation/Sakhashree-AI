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

                                <th>
                                    <h6>Time</h6>
                                </th>

                                <th>
                                    <h6>Day</h6>
                                </th>

                                <th>
                                    <h6>City</h6>
                                </th>

                                <th>
                                    <h6>Active</h6>
                                </th>

                                <th>
                                    <h6>Past Event</h6>
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

                                    <!-- Date -->
                                    <td>
                                        <p>{{ $event->date }}</p>
                                    </td>

                                    <!-- Time -->
                                    <td>
                                        <p>
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}
                                            -
                                            {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}
                                        </p>
                                    </td>

                                    <!-- Day -->
                                    <td>
                                        <p>{{ $event->day }}</p>
                                    </td>

                                    <!-- City -->
                                    <td>
                                        <p>{{ $event->city_name ?? '---' }}</p>
                                    </td>

                                    <!-- Active -->
                                    <td>
                                        <p>
                                            {{ $event->active == 1 ? 'Yes' : 'No' }}
                                        </p>
                                    </td>

                                    <!-- Past Event -->
                                    <td>
                                        <p>
                                            {{ $event->is_past_event == 1 ? 'Yes' : 'No' }}
                                        </p>
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
