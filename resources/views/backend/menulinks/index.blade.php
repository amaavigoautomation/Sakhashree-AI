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
                <a href="{{ route('menulink.add') }}"><button type="button"
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

                                <form action="{{ route('menulink.index') }}" method="GET" enctype="multipart/form-data"
                                    id="filterForm" controller='menulink'>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label>Parent </label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="actionDropdown" name="parent_id"
                                                        required>
                                                        <option value="">Select</option>
                                                        <?php
                                                            foreach ($parentlinkArr as $parentId => $parent){
                                                            $selected = ($selectedParentId == $parentId) ? 'selected' : '';
                                                         ?>
                                                        <option value="{{ $parentId }}" <?php echo $selected; ?>>
                                                            {{ $parent }}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="select-style-1">
                                                <label>Title</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="actionDropdown" name="id" required>
                                                        <option value="">Select</option>
                                                        <?php
                                                            foreach ($menuLinkTitleArr as $menuId => $menu){
                                                            $selected = ($selectedId == $menuId) ? 'selected' : '';
                                                         ?>
                                                        <option value="{{ $menuId }}" <?php echo $selected; ?>>
                                                            {{ $menu }}</option>
                                                        <?php } ?>
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
                                                        <option value="">All</option>
                                                        @foreach ($statuses as $key => $value)
                                                            <option value="{{ $key }}"
                                                                {{ request('status') == $key ? 'selected' : '' }}>
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <a href="{{ route('menulink.index') }}">
                                                <button type="button" class="main-btn dark-btn btn-hover btn-xs" style="margin-top:28px">Reset</button>
                                            </a>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                            <hr>
                            <!-- Search Panel -->
                            <div class="row"></div>
                            <div class="table-wrapper table-responsive mt-10">
                                <table class="table striped-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>Order</h6>
                                            </th>
                                            <th>
                                                <h6>Parent</h6>
                                            </th>
                                            <th>
                                                <h6>Title</h6>
                                            </th>
                                            <th>
                                                <h6>Link</h6>
                                            </th>
                                            <th class="text-center">
                                                <h6>Active</h6>
                                            </th>
                                            <th class="text-center">
                                                <h6>Action</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menulinks as $menulink)
                                            <tr>
                                                <td>
                                                    <p><?php echo $menulink->order; ?></p>
                                                </td>
                                                <!-- <td><p><?php echo !empty($menulink->parent_id) ? '' : '---'; ?></p></td> -->
                                                <td>
                                                    <p>
                                                        @if ($menulink->parent)
                                                            {{ $menulink->parent->title }}
                                                            <!-- Replace 'name' with your actual parent field name -->
                                                        @else
                                                            ---
                                                        @endif
                                                    </p>
                                                </td>
                                                <td>
                                                    <p><?php echo $menulink->title; ?></p>
                                                </td>
                                                <td>
                                                    @php
                                                        $routeKey = $menulink->link;
                                                        $url = $routeKey != '#' ? route($routeKey) : '';
                                                    @endphp
                                                    <p> <a href="{{ $url }}" target="_blank">Link</a></p>
                                                </td>
                                                <!-- Active | Inactive -->
                                                @php
                                                    $active = $menulink->active;
                                                    $class = $active == 1 ? 'activelabel' : 'inactivelabel';
                                                    $activeText = $active == 1 ? 'Active' : 'Inactive';
                                                @endphp
                                                <td class="text-center">
                                                    <div class="{{ $class }}">{{ $activeText }}</div>
                                                </td>
                                                <!-- Action -->
                                                <td class="text-center">
                                                    <a href="{{ route('menulink.edit', ['id' => $menulink->id]) }}"
                                                        title="Update"><i class="lni lni-pencil-alt"></i></a>
                                                    <a href="{{ route('menulink.view', ['id' => $menulink->id]) }}"
                                                        title="View"><i class="lni lni-menu"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @include('partials.pagination', ['items' => $menulinks])
                    </div>
    </section>
@endsection
