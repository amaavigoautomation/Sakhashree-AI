@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <div class="right-mob-left">
                <a href="{{ route('workshops_listing.create') }}"><button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button></a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card-style mt-20">
                <div class="row"></div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th class="">
                                    <h6>Name</h6>
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
                                        <p> {{ $workshop->name }} </p>
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
                                    <td class="text-center"><a href="{{ route('workshops_listing.edit', $workshop->id) }}"><i
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
