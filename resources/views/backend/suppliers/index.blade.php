@extends('layouts.backend')

@section('content')
<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')


        <div class="right-mob-left">
            <a href="{{ route('supplier.create') }}">
                <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
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
                            <form action="{{ route('supplier.index') }}" method="GET">
                                <div class="row mt-15">

                                    {{-- Unique Code --}}
                                    <div class="col-sm-3">
                                        <div class="select-style-1">
                                            <label for="unique_code">Unique Code</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="unique_code" name="unique_code" onchange="this.form.submit()">
                                                    <option value="">All</option>
                                                    @foreach ($codes as $unique_code)
                                                        <option value="{{ $unique_code }}" {{ request('unique_code') == $unique_code ? 'selected' : '' }}>
                                                            {{ $unique_code }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Name --}}
                                    <div class="col-sm-3">
                                        <div class="select-style-1">
                                            <label for="name">Suppliers</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="name" name="id" onchange="this.form.submit()">
                                                    <option value="">All</option>
                                                    @foreach ($suppliersArr as $supplierId => $supplier)
                                                        <option value="{{ $supplierId }}" {{ request('id') == $supplierId ? 'selected' : '' }}>
                                                            {{ $supplier }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-sm-3">
                                        <div class="select-style-1">
                                            <label for="email">Email</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="email" name="email" onchange="this.form.submit()">
                                                    <option value="">All</option>
                                                    @foreach ($emails as $email)
                                                        <option value="{{ $email }}" {{ request('email') == $email ? 'selected' : '' }}>
                                                            {{ $email }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Contact No --}}
                                    <div class="col-sm-3">
                                        <div class="select-style-1">
                                            <label for="contact_no">Contact No</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="contact_no" name="contact_no" onchange="this.form.submit()">
                                                    <option value="">All</option>
                                                    @foreach ($contacts as $contact_no)
                                                        <option value="{{ $contact_no }}" {{ request('contact_no') == $contact_no ? 'selected' : '' }}>
                                                            {{ $contact_no }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Is Approved --}}
                                    <div class="col-md-3">
                                        <div class="select-style-1">
                                            <label for="its_approved">Is Approved</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="its_approved" name="its_approved" onchange="this.form.submit()">
                                                    <option value="">Select</option>
                                                    @foreach ($approvalStatuses as $key => $value)
                                                        <option value="{{ $key }}" {{ request('its_approved') == (string) $key ? 'selected' : '' }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-3">
                                        <div class="select-style-1">
                                            <label for="status">Status</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="status" name="status" onchange="this.form.submit()">
                                                    <option value="">Select</option>
                                                    @foreach ($statuses as $key => $value)
                                                        <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Country --}}
                                    <div class="col-md-3">
                                        <div class="select-style-1">
                                            <label for="status">Country</label>
                                            <div class="select-position select-sm">
                                                <select class="jSelectbox" id="country" name="country_id" onchange="this.form.submit()">
                                                    <option value="">Select</option>
                                                    @foreach ($countries as $key => $country)
                                                        <option value="{{ $key }}" {{ request('country_id') == $key ? 'selected' : '' }}>
                                                            {{ $country }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Reset Button --}}
                                    <div class="col-sm-2">
                                        <a href="{{ route('supplier.index') }}">
                                            <button type="button" class="main-btn primary-btn btn-hover btn-xs" style="margin-top:28px">Reset</button>
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
                            <th>Unique Code</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Country</th>
                            <th class="text-center">Approval</th>
                            <th>Active</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                        <?php
                            $approvedClass = ($supplier->its_approved == true) ? 'success-btn' : 'danger-btn';
                            $approvedText = ($supplier->its_approved == true) ? 'Approved' : 'Unapproved';
                            $disabled = ($supplier->its_approved == true) ? 'disabled' : '';
                        ?>
                        <tr>
                            <td>{{ $supplier->unique_code ?? '---' }}</td>

                            <td>{{ $supplier->name }}</td>

                            <td>{{ $supplier->email }}</td>

                            <td>{{ $supplier->calling_code . $supplier->contact_no }}</td>

                            <td >{{ $supplier->country->name ?? '---' }}</td>

                            <td class="text-center" id="approval-box-{{ $supplier->id }}">
                                <button type="button"
                                    class="btn-toggle-approve main-btn {{ $approvedClass }} btn-xs"
                                    data-id="{{ $supplier->id }}"
                                    {{ $disabled }}
                                    >
                                    {{ $approvedText }}
                                </button>


                            </td>





                            <td class="text-center">
                                @php
                                    $active = $supplier->active;
                                    $checked = $active == 1 ? 'checked' : '';
                                @endphp
                                <input type="checkbox" id="toggle-{{ $supplier->id }}" class="status-checkbox toggle-checkbox" data-id="{{ $supplier->id }}" data-model="Supplier" {{ $checked }}>
                                <label for="toggle-{{ $supplier->id }}" class="toggle-label">
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('supplier.edit', $supplier->id) }}"><i class="lni lni-pencil-alt"></i></a>
                                <a href="{{ route('supplier.show', $supplier->id) }}"><i class="lni lni-list"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('partials.pagination', ['items' => $suppliers])
    </div>
</section>
@endsection
