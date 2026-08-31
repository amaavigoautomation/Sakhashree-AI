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
                    <table class="table striped-table">
                        <thead>
                            <tr>

                                <th>
                                    <h6>Name</h6>
                                </th>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <th>
                                    <h6>Country</h6>
                                </th>
                                <th>
                                    <h6>City</h6>
                                </th>
                                <th>
                                    <h6>Rating</h6>
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
                                        <p> {{ $testimonial->name ?? '' }} </p>
                                    </td>

                                    <td>
                                        <p> {{ $testimonial->email ?? '-' }} </p>
                                    </td>

                                    <td>
                                        <p> {{ $testimonial->country ?? '-' }} </p>
                                    </td>

                                    <td>
                                        <p> {{ $testimonial->city ?? '-' }} </p>
                                    </td>

                                    <td>
                                        <p> {{ $testimonial->rating ?? '' }} </p>
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
                                        <a href="{{ route('testimonials.show', $testimonial->id) }}"><i
                                                class="lni lni-list"></i></a>
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
