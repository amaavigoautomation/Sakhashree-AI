@extends('layouts.backend')

@section('content')
<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')

        <div class="right-mob-left">
            <a href="{{ route('subcategories.create') }}">
                <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
            </a>

            <a href="{{ route('subcategories.export.pdf') }}" target="_blank">
                <button type="button" class="main-btn primary-btn btn-hover btn-xs">Export to PDF</button>
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
                    <form action="{{ route('subcategories.index') }}" method="GET">
                        <div class="row">
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="category_id">Category Name</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="category_id" name="category_id"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($categories as $cat)
                                                            <option value="{{ $cat->id }}"
                                                                {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                                                {{ $cat->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-sm-3">
                                        <div class="select-style-1">
                                            <label for="name">Subcategory Name</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="name" name="id" onchange="this.form.submit()">
                                                    <option value="">All</option>
                                                    @foreach ($subcategoriesArr as $subcategoryId => $subcategory)
                                                        <option value="{{ $subcategoryId }}" {{ request('id') == $subcategoryId ? 'selected' : '' }}>
                                                            {{ $subcategory }}
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
                                <a href="{{ route('subcategories.index') }}">
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

                            <th>Category</th>
                            <th>Subcategory Name</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>
                                <p>{{ $subcategory->category ? $subcategory->category->name : 'N/A' }}</p>
                            </td>
                            <td>
                                <p>{{ $subcategory->name }}</p>
                            </td>
                            <td class="text-center">
                                @php
                                    $active = $subcategory->active;
                                    $checked = $active == 1 ? 'checked' : '';
                                @endphp
                                <input type="checkbox" id="toggle-{{ $subcategory->id }}" class="status-checkbox toggle-checkbox" data-id="{{ $subcategory->id }}" data-model="SubCategory" {{ $checked }}>
                                <label for="toggle-{{ $subcategory->id }}" class="toggle-label">
                                    <span class="toggle-slider"></span>
                                </label>

                            </td>


                            <td class="text-center">
                                <a href="{{ route('subcategories.edit', $subcategory->id) }}"><i class="lni lni-pencil-alt"></i></a>
                                <a href="{{ route('subcategories.show', $subcategory->id) }}"><i class="lni lni-list"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('partials.pagination', ['items' => $subcategories])
    </div>
</section>
@endsection
