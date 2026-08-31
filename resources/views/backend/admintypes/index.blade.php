@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('admintypes.create') }}">
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
                                    <h6>Status</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($admintypes as $admintype)
                                <tr>

                                    <td>
                                        <p> {{ $admintype->name }} </p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $active = $admintype->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $admintype->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $admintype->id }}"
                                            data-model="AdminType" {{ $checked }}>
                                        <label for="toggle-{{ $admintype->id }}" class="toggle-label"><span
                                                class="toggle-slider"></span></label>
                                    </td>
                                    <td class="text-center"><a href="{{ route('admintypes.edit', $admintype->id) }}"><i
                                                class="lni lni-pencil-alt"></i></a>
                                        <a href="{{ route('admintypes.show', $admintype->id) }}"><i
                                                class="lni lni-list"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
            @include('partials.pagination', ['items' => $admintypes])
        </div>
    </section>
@endsection
