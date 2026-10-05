@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <!-- ========== Middle Content-wrapper start ========== -->
            <!-- Add New Button -->
            <div class="right-mob-left">
                <!-- <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button>  -->
                <a href="{{ route('blogauthors.create') }}"><button type="button"
                        class="main-btn primary-btn btn-hover btn-xs">Create</button></a>
            </div>
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
                                <form method="GET" action="{{ route('blogauthors.index') }}" id="filterForm">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="name"> Name</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="name" name="name"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($names as $name)
                                                            @if ($name)
                                                                <option value="{{ $name }}"
                                                                    {{ request('name') == $name ? 'selected' : '' }}>
                                                                    {{ $name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="select-style-1">
                                                <label for="active">Status</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="active" name="active"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($statuses as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ request('active') == $key ? 'selected' : '' }}>
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-2">
                                            <a href="{{ route('blogauthors.index') }}">
                                                <button type="button" class="main-btn dark-btn btn-hover btn-xs"
                                                    style="margin-top:28px">Reset</button>
                                            </a>
                                        </div>

                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <hr>

                <div class="row"></div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                {{-- <th class="col-sm-2">
                                    <h6>Image</h6>
                                </th> --}}
                                <th class="col-sm-2">
                                    <h6>Author</h6>
                                </th>
                                {{-- <th class="col-sm-4">
                                    <h6>Note</h6>
                                </th> --}}
                                <th class="col-sm-2 text-left">
                                    <h6>Active</h6>
                                </th>
                                <th class="col-sm-2 text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogauthors as $blogauthor)
                                <tr>
                                    {{-- <td>
                                        <p> @php
                                            $firstImage = $blogauthor->author_image;
                                            $id = $blogauthor->id;
                                            $imagePath = $firstImage
                                                ? asset("public/images/blog_author/author_image/{$id}/{$firstImage}")
                                                : null;
                                        @endphp

                                            @if (!empty($imagePath))
                                                <img src="{{ $imagePath }}" id="imageBox">
                                            @endif
                                        </p>
                                    </td> --}}
                                    <td>
                                        <p> {{ $blogauthor->author_name }} </p>
                                    </td>

                                    {{-- <td>
                                        <p> {{ $blogauthor->note }} </p>
                                    </td> --}}
                                    <td>
                                        @php
                                            $active = $blogauthor->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $blogauthor->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $blogauthor->id }}"
                                            data-model="BlogAuthor" {{ $checked }}>
                                        <label for="toggle-{{ $blogauthor->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </td>
                                    <td class="text-center"><a href="{{ route('blogauthors.edit', $blogauthor->id) }}"><i
                                                class="lni lni-pencil-alt"></i></a>
                                        {{-- <a href="{{ route('blogauthors.show', $blogauthor->id) }}"><i
                                                class="lni lni-list"></i></a> --}}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $blogauthors])
        </div>
    </section>
@endsection
