@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('videocategories.create') }}"><button type="button"
                        class="main-btn primary-btn btn-hover btn-xs">Create</button></a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <div class="row"></div>
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                {{-- <th class=""><h6>Order</h6></th> --}}
                                <th class="col-sm-3">
                                    <h6>Image</h6>
                                </th>
                                <th class="">
                                    <h6>Name</h6>
                                </th>
                                <th class="text-left">
                                    <h6>Active</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="sortableBody">
                            @foreach ($videocategories as $videocategory)
                                <tr data-id="{{ $videocategory->id }}" data-model="VideoCategory">
                                    {{-- <td><p>{{ $videocategory->order}} </p></td> --}}
                                    <td>
                                        <p> @php
                                            $firstImage = $videocategory->image_file;
                                            $id = $videocategory->id;
                                            $imagePath = $firstImage
                                                ? asset("public/images/videocategories/image_file/{$id}/{$firstImage}")
                                                : null;
                                        @endphp

                                            @if (!empty($imagePath))
                                                <img src="{{ $imagePath }}" id="imageBox">
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <p>{{ $videocategory->name }} </p>
                                    </td>

                                    <td class="text-center">
                                        @php
                                            $active = $videocategory->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp
                                        <input type="checkbox" id="toggle-{{ $videocategory->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $videocategory->id }}"
                                            data-model="VideoCategory" {{ $checked }}>
                                        <label for="toggle-{{ $videocategory->id }}" class="toggle-label"><span
                                                class="toggle-slider"></span></label>
                                    </td>

                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('videocategories.edit', $videocategory->id) }}">
                                                        <i class="lni lni-pencil-alt"></i> Edit</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('videocategories.show', $videocategory->id) }}">
                                                        <i class="lni lni-list"></i> View </a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $videocategories])
        </div>
    @endsection
