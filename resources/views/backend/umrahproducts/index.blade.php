@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('umrahproduct.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>

            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Name</h6>
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
                            @foreach ($umrahproducts as $umrahproduct)
                                <tr>
                                    <td>
                                        <p> {{ $umrahproduct->name }} </p>
                                    </td>

                                    <td class="text-center">
                                    @php
                                        $active = $umrahproduct->active;
                                        $checked = $active == 1 ? 'checked' : '';
                                    @endphp
                                    <input type="checkbox"  id="toggle-{{ $umrahproduct->id }}" class="status-checkbox toggle-checkbox" data-id="{{ $umrahproduct->id }}" data-model="UmrahProduct" {{ $checked }}>
                                    <label for="toggle-{{ $umrahproduct->id }}" class="toggle-label"><span class="toggle-slider"></span></label>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i> 
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="{{ route('umrahproduct.edit', $umrahproduct->id) }}">
                                                        <i class="lni lni-pencil-alt"></i> Edit <!-- Edit icon -->
                                                    </a></li>
                                                <li><a class="dropdown-item" href="{{ route('umrahproduct.show', $umrahproduct->id) }}">
                                                        <i class="lni lni-list"></i> View <!-- View icon -->
                                                    </a></li>

                                                <li><a class="dropdown-item"
                                                        href="{{ route('productdetail.index', ['umrah_product_id' => $umrahproduct->id]) }}">
                                                        <i class="lni lni-gallery"></i> Videos 
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $umrahproducts])
        </div>
    </section>
@endsection
