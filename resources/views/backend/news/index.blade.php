@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('news_listing.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">
                        Create
                    </button>
                </a>
            </div>

            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">

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

                                    <form method="GET" action="{{ route('news_listing.index') }}">

                                        <div class="row">

                                            {{-- Title --}}
                                            <div class="col-sm-3">
                                                <div class="select-style-1">
                                                    <label for="title">News Title</label>
                                                    <div class="select-position select-sm">
                                                        <select class="jSelectbox" id="title" name="title" required
                                                            onchange="this.form.submit()">
                                                            <option value="">Select</option>
                                                            @foreach ($titles as $title)
                                                                <option value="{{ $title }}"
                                                                    {{ request('title') == $title ? 'selected' : '' }}>

                                                                    {{ $title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- Has Video --}}
                                            <div class="col-sm-3">
                                                <div class="select-style-1">
                                                    <label for="has_video">Video Available</label>
                                                    <div class="select-position select-sm">
                                                        <select class="jSelectbox" id="has_video" name="has_video"
                                                            onchange="this.form.submit()">
                                                            <option value="">Select</option>
                                                            <option value="1"
                                                                {{ request('has_video') == '1' ? 'selected' : '' }}> Yes
                                                            </option>

                                                            <option value="0"
                                                                {{ request('has_video') == '0' ? 'selected' : '' }}>No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Status --}}
                                            <div class="col-sm-3">
                                                <div class="select-style-1">
                                                    <label for="status">Status</label>
                                                    <div class="select-position select-sm">
                                                        <select class="jSelectbox" id="status" name="status"
                                                            onchange="this.form.submit()">
                                                            <option value="">Select</option>
                                                            <option value="1"
                                                                {{ request('status') == '1' ? 'selected' : '' }}> Active
                                                            </option>

                                                            <option value="0"
                                                                {{ request('status') == '0' ? 'selected' : '' }}>Inactive
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- Reset --}}
                                            <div class="col-sm-2">
                                                <a href="{{ route('news_listing.index') }}">
                                                    <button type="button" class="main-btn primary-btn btn-hover btn-xs"
                                                        style="margin-top:28px">
                                                        Reset
                                                    </button>
                                                </a>
                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <table class="table striped-table">

                        <thead>
                            <tr>
                                <th>
                                    <h6>Media</h6>
                                </th>

                                <th>
                                    <h6>Video Available</h6>
                                </th>

                                <th>
                                    <h6>News Title</h6>
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

                            @foreach ($news as $new)
                                <tr>

                                    <td>
                                        @if ($new->has_video && $new->video_link)
                                            @php
                                                preg_match(
                                                    '/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([^&?\/]+)/',
                                                    $new->video_link,
                                                    $matches,
                                                );

                                                $youtubeId = $matches[1] ?? null;
                                            @endphp

                                            @if ($youtubeId)
                                                <img src="https://img.youtube.com/vi/{{ $youtubeId }}/hqdefault.jpg"
                                                    id="imageBox" alt="{{ $new->title }}">
                                            @endif
                                        @elseif (!empty($new->image_file))
                                            <img src="{{ asset('public/images/news/image_file/' . $new->id . '/' . $new->image_file) }}"
                                                id="imageBox" alt="{{ $new->title }}">
                                        @else
                                            <img src="{{ asset('public/images/no-image.png') }}" id="imageBox"
                                                alt="No Image">
                                        @endif
                                    </td>

                                    <td>
                                        @if ($new->has_video == 1)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>

                                    <td>
                                        <p>{{ $new->title }}</p>
                                    </td>

                                    <td>

                                        @php
                                            $active = $new->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp

                                        <input type="checkbox" id="toggle-{{ $new->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $new->id }}"
                                            data-model="News" {{ $checked }}>

                                        <label for="toggle-{{ $new->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>

                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('news_listing.edit', $new->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>
            @include('partials.pagination', ['items' => $news])

        </div>


        </div>
    </section>
@endsection
