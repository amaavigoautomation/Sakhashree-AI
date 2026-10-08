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

                                    <form method="GET" action="{{ route('testimonials_videos.index') }}">

                                        <div class="row">

                                            {{-- Name --}}
                                            <div class="col-sm-3">

                                                <div class="select-style-1">
                                                    <label for="name">Name</label>
                                                    <div class="select-position select-sm">
                                                        <select class="jSelectbox" id="name" name="name"
                                                            onchange="this.form.submit()">
                                                            <option value="">Select</option>
                                                            @foreach ($names as $name)
                                                                <option value="{{ $name }}"
                                                                    {{ request('name') == $name ? 'selected' : '' }}>
                                                                    {{ $name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- Designation --}}
                                            <div class="col-sm-3">

                                                <div class="select-style-1">
                                                    <label for="designation">Profession</label>
                                                    <div class="select-position select-sm">
                                                        <select class="jSelectbox" id="designation" name="designation"
                                                            onchange="this.form.submit()">

                                                            <option value="">Select</option>

                                                            @foreach ($designations as $designation)
                                                                <option value="{{ $designation }}"
                                                                    {{ request('designation') == $designation ? 'selected' : '' }}>

                                                                    {{ $designation }}

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


                                            {{-- Reset --}}
                                            <div class="col-sm-2">

                                                <a href="{{ route('testimonials_videos.index') }}">

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
                    <table class="table striped-table">

                        <thead>
                            <tr>
                                <th>
                                    <h6>Testimonial Image</h6>
                                </th>

                                <th>
                                    <h6>Name</h6>
                                </th>

                                <th>
                                    <h6>Profession </h6>
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
