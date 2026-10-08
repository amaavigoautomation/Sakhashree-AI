@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            {{-- <div class="right-mob-left">
                <a href="{{ route('seomodules.create') }}"><button type="button"
                        class="main-btn primary-btn btn-hover btn-xs">Create</button></a>
            </div> --}}
        </div>
        <div class="container-fluid">
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

                                <form action="{{ route('seomodules.index') }}" method="GET">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="page_name">Page</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="page_name" name="page_name"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($pageNames as $pageName)
                                                            <option value="{{ $pageName }}"
                                                                {{ request('page_name') == $pageName ? 'selected' : '' }}>
                                                                {{ $pageName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="select-style-1">
                                                <label for="page_title">Meta Title</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="page_title" name="page_title"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($pageTitles as $pageTitle)
                                                            <option value="{{ $pageTitle }}"
                                                                {{ request('page_title') == $pageTitle ? 'selected' : '' }}>
                                                                {{ $pageTitle }}
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
                                                        <option value="">All</option>
                                                        @foreach ($statuses as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ request('status') == $key ? 'selected' : '' }}>
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <a href="{{ route('seomodules.index') }}">
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
                <!-- Search Panel -->
                <div class="row"></div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Page</h6>
                                </th>

                                <th>
                                    <h6>Meta Title</h6>
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
                            @foreach ($seomodules as $seomodule)
                                <tr>
                                    <td>
                                        <p> {{ $seomodule->page_name }} </p>
                                    </td>
                                    <td>
                                        <p> {{ $seomodule->page_title }} </p>
                                    </td>

                                    <td>
                                        @php
                                            $active = $seomodule->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $seomodule->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $seomodule->id }}"
                                            data-model="SeoModule" {{ $checked }}>
                                        <label for="toggle-{{ $seomodule->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </td>
                                    <td class="text-center"><a href="{{ route('seomodules.edit', $seomodule->id) }}"><i
                                                class="lni lni-pencil-alt"></i></a>
                                        {{-- <a href="{{ route('seomodules.show',$seomodule->id) }}"><i class="lni lni-list"></i></a> --}}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $seomodules])
        </div>
    </section>
@endsection
