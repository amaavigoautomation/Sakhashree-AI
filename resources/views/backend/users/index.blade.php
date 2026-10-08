@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('users.create') }}"><button type="button"
                        class="main-btn primary-btn btn-hover btn-xs">Create</button></a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Full Name</h6>
                                </th>

                                <th>
                                    <h6>Email Address / Username</h6>
                                </th>

                                <th>
                                    <h6>Contact Number</h6>
                                </th>

                                <th class="text-left">
                                    <h6>Status</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Actions</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <p> {{ $user->name ?? '' }} </p>
                                    </td>
                                    <td>
                                        <p> {{ $user->email ?? '' }} </p>
                                    </td>
                                    <td>
                                        <p> {{ $user->country->calling_code ?? '' }} {{ $user->contact_no ?? '' }} </p>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $active = $user->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $user->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $user->id }}"
                                            data-model="User" {{ $checked }}>
                                        <label for="toggle-{{ $user->id }}" class="toggle-label"><span
                                                class="toggle-slider"></span></label>
                                    </td>
                                    <td class="text-center"><a href="{{ route('users.edit', $user->id) }}"><i
                                                class="lni lni-pencil-alt"></i></a>
                                        {{-- <a href="{{ route('users.show', $user->id) }}"><i class="lni lni-list"></i></a> --}}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $users])
        </div>
    </section>
@endsection
