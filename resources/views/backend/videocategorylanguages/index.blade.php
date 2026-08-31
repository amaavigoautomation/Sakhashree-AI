@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <div class="right-mob-left">
          <a href="{{ route('videocategorylanguages.create', ['video_category_id' => $video_category_id]) }}">
    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
</a>
        </div>

            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>Video Category</th>
                                <th>Language</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videocategorylanguages as $vcl)
                                <tr>
                                    <td>
                                        <p>{{ $vcl->videocategory ? $vcl->videocategory->name : '---' }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $vcl->languages ? $vcl->languages->name : '---' }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $vcl->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $checked = $vcl->active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $vcl->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $vcl->id }}"
                                            data-model="videoCategoryLanguage" {{ $checked }}>
                                        <label for="toggle-{{ $vcl->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('videocategorylanguages.edit', $vcl->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        {{-- <a href="{{ route('videocategorylanguages.show', $vcl->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a> --}}
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
