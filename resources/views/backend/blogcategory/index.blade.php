@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <div class="right-mob-left">
                <a href="{{ route('blogcategories.create') }}"><button type="button"
                        class="main-btn primary-btn btn-hover btn-xs">Create</button></a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card-style mt-20">

                <div class="row"></div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table" id="sortableTable">
                        <thead>
                            <tr>
                                <th class="">
                                    <h6>Name</h6>
                                </th>
                                <th class="text-left">
                                    <h6>Status</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                             </tr>
                        </thead>
                        <tbody id="">
                            @foreach ($blogcategory as $blogcategories)
                                <tr data-id="{{ $blogcategories->id }}" data-model="BlogCategory">
                                    <td>
                                        <p>{{ $blogcategories->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $active = $blogcategories->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp

                                        <input type="checkbox" id="toggle-{{ $blogcategories->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $blogcategories->id }}"
                                            data-model="BlogCategory" {{ $checked }}>

                                        <label for="toggle-{{ $blogcategories->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('blogcategories.edit', $blogcategories->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            <!-- No Records -->
                            @if ($blogcategory->count() == 0)
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <p>No Blog Categories Found.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>

                    </table>

                </div>
            </div>
            @include('partials.pagination', ['items' => $blogcategory])
        </div>
    </section>
@endsection
