@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('category.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
                {{-- <a href="{{ route('export-categories.export', request()->query()) }}" class="main-btn primary-btn btn-hover btn-xs">
                    <i class="fas fa-file-excel"></i> Export to Excel
                </a> --}}
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
                    <form action="{{ route('category.index') }}" method="GET">
                        <div class="row">
                            <div class="col-sm-3">
                                        <div class="select-style-1">
                                            <label for="name">Category Name</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="name" name="id" onchange="this.form.submit()">
                                                    <option value="">All</option>
                                                    @foreach ($categoriesArr as $categoryId => $category)
                                                        <option value="{{ $categoryId }}" {{ request('id') == $categoryId ? 'selected' : '' }}>
                                                            {{ $category }}
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
                                <a href="{{ route('category.index') }}">
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
                                <th>
                                    <h6>Thumnail Image</h6>
                                </th>
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
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <p>
                                            @php
                                                $firstImage = $category->thumbnail_image;
                                                $id = $category->id;
                                                $imagePath = $firstImage
                                                    ? asset(
                                                        "public/images/categories/thumbnail_image/{$id}/{$firstImage}",
                                                    )
                                                    : asset('dist/no-image.png');
                                            @endphp

                                            @if (!empty($imagePath))
                                                <img src="{{ $imagePath }}" id="imageBox">
                                            @endif
                                        </p>
                                    </td>

                                    <td>
                                        <p> {{ $category->name ?? '---' }} </p>
                                    </td>

                                    <td>
                                        @php
                                            $active = $category->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $category->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $category->id }}"
                                            data-model="Category" {{ $checked }}>
                                        <label for="toggle-{{ $category->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('category.edit', $category->id) }}"><i
                                                class="lni lni-pencil-alt"></i></a>
                                        <a href="{{ route('category.show', $category->id) }}"><i
                                                class="lni lni-list"></i></a>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $categories])
        </div>
    </section>
@endsection
