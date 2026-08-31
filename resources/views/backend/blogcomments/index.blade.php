@extends('layouts.backend')

@section('content')
<section class="section">
<div class="container-fluid">
@include('partials.breadcrumb')
<div class="right-mob-left">
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
                    <form method="GET" action="{{ route('blogcomments.index') }}">
                        <div class="row">

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="name">Name</label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" name="name" onchange="this.form.submit()">
                                        <option value="">All</option>
                                        <?php foreach ($names as $name) { ?>
                                            <option value="{{ $name->name }}"
                                                {{ request('name') == $name->name ? 'selected' : '' }}>
                                                {{ $name->name ?? '---' }}
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="active">Active</label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="active" name="active"onchange="this.form.submit()">
                                        <option value="">All</option><option value="active"
                                            {{ request('active') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive"{{ request('active') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Reset -->
                        <div class="col-sm-2">
                            <a href="{{ route('blogcomments.index') }}">
                                <button type="button" class="main-btn primary-btn btn-hover btn-xs"style="margin-top:28px">Reset</button>
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
                    <th><h6>Name</h6></th>
                    <th><h6>Remarks</h6></th>
                    <th class="text-left"><h6>Active</h6></th>
                    <th class="text-center"><h6>Action</h6></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogcomments as $blogcomment) { ?>
                <tr>
                    <td>{{$blogcomment->name}}</td>
                    <td>{{$blogcomment->remark}}</td>
                    <td class="text-center">
                        @php
                            $active = $blogcomment->active;
                            $checked = $active == 1 ? 'checked' : '';
                        @endphp
                        <input type="checkbox"  id="toggle-{{ $blogcomment->id }}" class="status-checkbox toggle-checkbox" data-id="{{ $blogcomment->id }}" data-model="BlogComment" {{ $checked }}>
                        <label for="toggle-{{ $blogcomment->id }}" class="toggle-label"><span class="toggle-slider"></span></label>
                    </td>

                    <td class="text-center">
                    <div class="dropdown">
                        <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i> <!-- Using a gear icon as the dropdown toggle -->
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('blogcomments.edit', $blogcomment->id) }}">
                                <i class="lni lni-pencil-alt"></i> Edit <!-- Edit icon -->
                            </a></li>
                        </ul>
                    </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
@include('partials.pagination', ['items' => $blogcomments])
</div>
@endsection
