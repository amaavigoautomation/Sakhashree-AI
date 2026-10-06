@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            <!-- Breadcrumb -->
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('faqs.create') }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">
                        Create
                    </button>
                </a>
            </div>

            <!-- FAQ Section -->
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

                                <form method="GET" action="{{ route('faqs.index') }}">

                                    <div class="row">

                                        <!-- FAQ Type -->
                                        <div class="col-sm-4">

                                            <div class="select-style-1">

                                                <label for="faq_type_id">FAQ Type</label>
                                                <div class="select-position select-sm">
                                                    <select class="jSelectbox" id="faq_type_id" name="faq_type_id"
                                                        onchange="this.form.submit()">
                                                        <option value="">All</option>
                                                        @foreach ($faqTypes as $faqType)
                                                            <option value="{{ $faqType->id }}"
                                                                {{ request('faq_type_id') == $faqType->id ? 'selected' : '' }}>

                                                                {{ $faqType->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>


                                        <!-- Status -->
                                        <div class="col-sm-4">

                                            <div class="select-style-1">

                                                <label for="status">Status</label>

                                                <div class="select-position select-sm">

                                                    <select class="jSelectbox" id="status" name="status"
                                                        onchange="this.form.submit()">

                                                        <option value="">All</option>

                                                        <option value="1"
                                                            {{ request('status') == '1' ? 'selected' : '' }}>
                                                            Active
                                                        </option>

                                                        <option value="0"
                                                            {{ request('status') == '0' ? 'selected' : '' }}>
                                                            Inactive
                                                        </option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>


                                        <!-- Reset -->
                                        <div class="col-sm-2">

                                            <a href="{{ route('faqs.index') }}">

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

                <div class="table-wrapper table-responsive mt-10">

                    <table class="table striped-table">

                        <thead>
                            <tr>
                                 <th>
                                    <h6>Faq Type</h6>
                                </th>
                                <th>
                                    <h6>Question</h6>
                                </th>

                                <th>
                                    <h6>Answer</h6>
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

                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>
                                        <p> {{ $faq->faqType->name ?? '' }} </p>
                                    </td>

                                    <!-- Question -->
                                    <td>
                                        <p title="{{ $faq->question }}">
                                            {{ Str::limit($faq->question, 40) }}
                                        </p>
                                    </td>

                                    <!-- Answer -->
                                    <td>
                                        <p title="{{ strip_tags($faq->answer) }}">
                                            {{ Str::limit(strip_tags($faq->answer), 20) }}
                                        </p>
                                    </td>
                                    <!-- Status -->
                                    <td>

                                        @php
                                            $active = $faq->active;
                                            $checked = $active == 1 ? 'checked' : '';
                                        @endphp

                                        <input type="checkbox" id="toggle-{{ $faq->id }}"
                                            class="status-checkbox toggle-checkbox" data-id="{{ $faq->id }}"
                                            data-model="Faq" {{ $checked }}>

                                        <label for="toggle-{{ $faq->id }}" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>

                                    </td>

                                    <!-- Action -->
                                    <td class="text-center">

                                        <a href="{{ route('faqs.edit', $faq->id) }}">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>

                                        <a href="{{ route('faqs.show', $faq->id) }}">
                                            <i class="lni lni-list"></i>
                                        </a>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="mt-30">
            </div>

            @include('partials.pagination', ['items' => $faqs])

        </div>

    </section>
@endsection
