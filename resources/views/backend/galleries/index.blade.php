@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('galleries.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
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
                                    <h6>Status</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($galleries as $gallery)
                                <tr>
                                    <td>
                                        <p>
                                            <img src="{{ $gallery->image_url }}" id="imageBox">
                                        </p>
                                    </td>
                                    <td>
                                        @php
                                            $active = $gallery->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $gallery->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $gallery->id }}"
                                            data-model="Gallery" {{ $checked }}>
                                        <label for="toggle-{{ $gallery->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <a class="dropdown-item" href="{{ route('galleries.edit', $gallery->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                    </table>
                    <!-- end table -->
                </div>
            </div>
            @include('partials.pagination', ['items' => $galleries])
        </div>
    </section>
@endsection
