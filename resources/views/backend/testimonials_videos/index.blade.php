@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            <!-- Breadcrumb -->
            @include('partials.breadcrumb')

            <!-- Create Button -->
            <div class="right-mob-left">
                <a href="{{ route('testimonials_videos.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">
                        Create
                    </button>
                </a>
            </div>

            <!-- Testimonial Video Section -->
            <div class="card-style mt-20">

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
                                    <h6>Designation</h6>
                                </th>

                                <th>
                                    <h6>Video Link</h6>
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

                            @foreach ($testimonialVideos as $testimonialVideo)
                                <tr>
                                    <!-- Image -->
                                    <td>
                                        @if (!empty($testimonialVideo->image))
                                            <img src="{{ asset('public/images/testimonials_video/' . $testimonialVideo->id . '/' . $testimonialVideo->image) }}"
                                                alt="{{ $testimonialVideo->name }}"
                                                style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <p>---</p>
                                        @endif
                                    </td>
                                    <!-- Name -->
                                    <td>
                                        <p>
                                            {{ $testimonialVideo->name }}
                                        </p>
                                    </td>

                                    <!-- Designation -->
                                    <td>
                                        <p>
                                            {{ $testimonialVideo->designation }}
                                        </p>
                                    </td>


                                    <!-- Video Link -->
                                    <td>
                                        @if (!empty($testimonialVideo->video_link))
                                            <a href="{{ $testimonialVideo->video_link }}" target="_blank"
                                                rel="noopener noreferrer">
                                                Video Link
                                            </a>
                                        @else
                                            <p>---</p>
                                        @endif
                                    </td>
                                    <!-- Status -->
                                    <td>

                                        @php
                                            $active = $testimonialVideo->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp

                                        <input type="checkbox" id="toggle-{{ $testimonialVideo->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $testimonialVideo->id }}"
                                            data-model="TestimonialVideo" {{ $checked }}>

                                        <label for="toggle-{{ $testimonialVideo->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>

                                    </td>

                                    <!-- Action -->
                                    <td class="text-center">

                                        <a href="{{ route('testimonials_videos.edit', $testimonialVideo->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="mt-30">
            </div>

            @include('partials.pagination', ['items' => $testimonialVideos])

        </div>

    </section>
@endsection
