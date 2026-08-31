@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('languages.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>

            <div class="card-style mt-20">
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
                                <form action="{{ route('languages.index') }}" method="GET">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="name">Languages</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="name" name="id"
                                                        onchange="this.form.submit()">
                                                        <option value="">All</option>
                                                        @foreach ($languageArr as $languageId => $language)
                                                            <option value="{{ $languageId }}"
                                                                {{ request('id') == $languageId ? 'selected' : '' }}>
                                                                {{ $language }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="select-style-1">
                                                <label for="status">Status</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="status" name="status"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($statuses as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ request('status') == $key ? 'selected' : '' }}>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <a href="{{ route('languages.index') }}">
                                                <button type="button" class="main-btn primary-btn btn-hover btn-xs"
                                                    style="margin-top:28px">Reset</button>
                                            </a>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>Language</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $language)
                                <tr>
                                    <td>
                                        <p>
                                            @if ($language->country && $language->country->countryDetails->isNotEmpty())
                                                @php
                                                    $firstImage = $language->country->countryDetails->first()
                                                        ->icon_image;
                                                    $id = $language->country->countryDetails->first()->id;

                                                    $imagePath = $firstImage
                                                        ? asset(
                                                            "public/images/country_details/icon_image/{$id}/{$firstImage}",
                                                        )
                                                        : asset('dist/images/no-image.png');
                                                @endphp
                                                <img src="{{ $imagePath }}" class="countryIcon"
                                                    style="width:20px; height:20px; margin-right:6px;">
                                            @endif

                                            {{ $language->name }}
                                        </p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $active = $language->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $language->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $language->id }}"
                                            data-model="Language" {{ $checked }}>
                                        <label for="toggle-{{ $language->id }}" class="toggle-label"><span
                                                class="toggle-slider"></span></label>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('languages.edit', $language->id) }}"><i
                                                class="lni lni-pencil-alt"></i></a>
                                        <a href="{{ route('languages.show', $language->id) }}"><i
                                                class="lni lni-list"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @include('partials.pagination', ['items' => $languages])
        </div>
    </section>
@endsection
