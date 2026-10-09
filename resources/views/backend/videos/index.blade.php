@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('videos.create') }}"><button type="button"
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
                                <form method="GET" action="{{ route('videos.index') }}">
                                    <div class="row">

                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="title">Video Title</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" name="title" onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        @foreach ($titles as $title)
                                                            <option value="{{ $title->title }}"
                                                                {{ request('title') == $title->title ? 'selected' : '' }}>
                                                                {{ $title->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label for="active">Status</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="active" name="active"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        <option value="active"
                                                            {{ request('active') == 'active' ? 'selected' : '' }}>Active
                                                        </option>
                                                        <option value="inactive"
                                                            {{ request('active') == 'inactive' ? 'selected' : '' }}>Inactive
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <a href="{{ route('videos.index') }}">
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
                <div class="row"></div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                {{-- <th class="text-left">
                                    <h6>Order</h6>
                                </th> --}}
                                {{-- <th class="">
                                    <h6>Image</h6>
                                </th> --}}
                                <th class="">
                                    <h6>Video Title</h6>
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
                            @foreach ($videos as $video)
                                <tr data-id="{{ $video->id }}" data-model="Video">
                                    {{-- <tr> --}}
                                    {{-- <td class="text-left">
                                        <p>{{ $video->order }} </p>
                                    </td> --}}
                                    {{-- <td>
                                        <p>
                                            @php
                                                $firstImage = $video->image_file;
                                                $id = $video->id;
                                                $imagePath = $firstImage
                                                    ? asset("public/images/videos/image_file/{$id}/{$firstImage}")
                                                    : asset('public/images/no-image.png');
                                            @endphp
                                            @if (!empty($imagePath))
                                                <img src="{{ $imagePath }}" id="imageBox">
                                            @endif
                                        </p>
                                    </td> --}}
                                    <td>
                                        <p>{{ $video->title }} </p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $active = $video->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $video->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $video->id }}"
                                            data-model="Video" {{ $checked }}>
                                        <label for="toggle-{{ $video->id }}" class="toggle-label"><span
                                                class="toggle-slider"></span></label>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('videos.edit', $video->id) }}"><i
                                                class="lni lni-pencil-alt"></i></a>
                                        <a href="{{ route('videos.show', $video->id) }}"><i class="lni lni-list"></i></a>
                                    </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $videos])
        </div>
    @endsection
