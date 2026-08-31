@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">

            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('timezones.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">

                    @csrf
                    <div class="row mt-15">
                        <div class="col-sm-4">
                            <div class="select-style-1">
                                <label for="country_id">Country</label>
                                <div class="select-position select-sm">
                                        <select id="country_id" name="country_id" class="jSelectbox">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $country) { ?>
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" placeholder="Enter Name" required="true" />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Value <span class="mandatory">*</span></label>
                                <input type="text" name="value" placeholder="Enter Value" required="true" />
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                        </div>
                    </div>

                </div>
            </form>
    </section>
@endsection
<script></script>
