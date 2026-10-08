@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('testimonials.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>

            <!--Add new section start here-->
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

                                    <form method="GET" action="{{ route('testimonials.index') }}">

                                        <div class="row">

                                            {{-- Name --}}
                                            <div class="col-sm-3">

                                                <div class="select-style-1">

                                                    <label for="name">Testimonial Name</label>

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


                                            {{-- Country --}}
                                            <div class="col-sm-3">

                                                <div class="select-style-1">

                                                    <label for="country">Country</label>

                                                    <div class="select-position select-sm">

                                                        <select class="jSelectbox" id="country" name="country"
                                                            onchange="this.form.submit()">

                                                            <option value="">Select</option>

                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country }}"
                                                                    {{ request('country') == $country ? 'selected' : '' }}>

                                                                    {{ $country }}

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

                                                <a href="{{ route('testimonials.index') }}">

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
                                    <h6>Testimonial Name</h6>
                                </th>

                                <th>
                                    <h6>Country</h6>
                                </th>
                                <th>
                                    <h6>City</h6>
                                </th>

                                <th>
                                    <h6>Status</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>

                                    <td>
                                        <p>
                                            @if (!empty($testimonial->icon))
                                                <img src="{{ asset('public/images/testimonials/' . $testimonial->id . '/' . $testimonial->icon) }}"
                                                    width="50" height="50" alt="{{ $testimonial->icon }}">
                                            @else
                                                <img src="{{ asset('dist/images/no-image.png') }}" width="50"
                                                    height="50" alt="No Image">
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <p> {{ $testimonial->name ?? '' }} </p>
                                    </td>

                                    <td>
                                        <p> {{ $testimonial->country->name ?? '-' }} </p>
                                    </td>

                                    <td>
                                        <p> {{ $testimonial->city ?? '-' }} </p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $active = $testimonial->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $testimonial->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $testimonial->id }}"
                                            data-model="Testimonial" {{ $checked }}>
                                        <label for="toggle-{{ $testimonial->id }}" class="toggle-label"><span
                                                class="toggle-slider"></span></label>
                                    </td>
                                    <td class="text-center"><a href="{{ route('testimonials.edit', $testimonial->id) }}"><i
                                                class="lni lni-pencil-alt"></i></a>
                                        {{-- <a href="{{ route('testimonials.show', $testimonial->id) }}"><i
                                                class="lni lni-list"></i></a> --}}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
            @include('partials.pagination', ['items' => $testimonials])
        </div>
    </section>
@endsection
