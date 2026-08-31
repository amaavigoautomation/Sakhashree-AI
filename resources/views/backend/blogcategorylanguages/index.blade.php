@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('blogcategorylanguages.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>

            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>Blog Category</th>
                                <th>Language</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogcategorylanguages as $bcl)
                                <tr>
                                    <td>
                                        <p>{{ $bcl->blogcategory ? $bcl->blogcategory->name : '---' }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $bcl->languages ? $bcl->languages->name : '---' }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $bcl->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $checked = $bcl->active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $bcl->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $bcl->id }}"
                                            data-model="BlogCategoryLanguage" {{ $checked }}>
                                        <label for="toggle-{{ $bcl->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('blogcategorylanguages.edit', $bcl->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('blogcategorylanguages.show', $bcl->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
