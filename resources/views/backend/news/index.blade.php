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

                    <table class="table striped-table">

                        <thead>
                            <tr>
                                <th>
                                    <h6>Image/Video</h6>
                                </th>

                                <th>
                                    <h6>Has Video</h6>
                                </th>

                                <th>
                                    <h6>Title</h6>
                                </th>

                                <th class="text-left">
                                    <h6>Status</h6>
                                </th>

                                <th class="text-center">
                                    <h6>Action</h6>
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
                                                    $matches
                                                );

                                                $youtubeId = $matches[1] ?? null;
                                            @endphp

                                            @if ($youtubeId)
                                                <img src="https://img.youtube.com/vi/{{ $youtubeId }}/hqdefault.jpg"
                                                    id="imageBox"
                                                    alt="{{ $new->title }}">
                                            @endif

                                        @elseif (!empty($new->image_file))

                                            <img src="{{ asset('public/images/news/image_file/' . $new->id . '/' . $new->image_file) }}"
                                                id="imageBox"
                                                alt="{{ $new->title }}">

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
