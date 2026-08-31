@extends('layouts.backend')

@section('content')
<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')
        <div class="right-mob-left">
            <a href="{{ route('currency.create') }}">
                <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
            </a>
        </div>
        <div class="table-wrapper table-responsive mt-10">
            <div class="card-style mt-20">
                <form method="GET" action="{{ route('currency.index') }}">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="country_id">Country</label>
                                <div class="select-position select-sm">
                                    <select name="country_id" id="country_id" class="jSelectbox" onchange="this.form.submit()">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{ request('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="name">Currency Name</label>
                                <div class="select-position select-sm">
                                    <select name="name" id="name" class="jSelectbox" onchange="this.form.submit()">
                                        <option value="">Select Currency</option>
                                        @foreach ($currencyNames as $currencyName)
                                            <option value="{{ $currencyName }}" {{ request('name') == $currencyName ? 'selected' : '' }}>{{ $currencyName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="iso_code">ISO Code</label>
                                <div class="select-position select-sm">
                                    <select name="iso_code" id="iso_code" class="jSelectbox" onchange="this.form.submit()">
                                        <option value="">Select ISO Code</option>
                                        @foreach ($isoCodes as $isoCode)
                                            <option value="{{ $isoCode }}" {{ request('iso_code') == $isoCode ? 'selected' : '' }}>{{ $isoCode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="status">Status</label>
                                <div class="select-position select-sm">
                                    <select name="status" id="status" class="jSelectbox" onchange="this.form.submit()">
                                        <option value="">All</option>
                                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <a href="{{ route('currency.index') }}">
                                <button type="button" class="main-btn dark-btn btn-hover btn-xs" style="margin-top:28px">Reset</button>
                            </a>
                        </div>
                    </div>
                </form>
                <hr>
                <table class="table striped-table">
                    <thead>
                        <tr>
                            <th><h6>Country</h6></th>
                            <th><h6>Name</h6></th>
                            <th><h6>ISO Code</h6></th>
                            <th><h6>Sign</h6></th>
                            <th><h6>Conversion Rate</h6></th>
                            <th><h6>Status</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($currencies as $currency)
                            <tr>
                                <td><p>{{ $currency->country->name ?? '---' }}</p></td>
                                <td><p>{{ $currency->name }}</p></td>
                                <td><p>{{ $currency->iso_code }}</p></td>
                                <td><p>{{ $currency->sign }}</p></td>
                                <td><p>{{ $currency->conversion_rate ? $currency->conversion_rate : '---' }}</p></td>
                                <td class="text-center">
                                    @php
                                        $active = $currency->active;
                                        $checked = $active == 1 ? 'checked' : '';
                                    @endphp
                                    <input type="checkbox"  id="toggle-{{ $currency->id }}" class="status-checkbox toggle-checkbox" data-id="{{ $currency->id }}" data-model="Currency" {{ $checked }}>
                                    <label for="toggle-{{ $currency->id }}" class="toggle-label"><span class="toggle-slider"></span></label>
                                    </td>
                                <td class="text-center"><a href="{{ route('currency.edit',$currency->id) }}"><i class="lni lni-pencil-alt"></i></a>
                                    <a href="{{ route('currency.show',$currency->id) }}"><i class="lni lni-list"></i></a>
                                    </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('partials.pagination', ['items' => $currencies])
    </div>
</section>
@endsection
