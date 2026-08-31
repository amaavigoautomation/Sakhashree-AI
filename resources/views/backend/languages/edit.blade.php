@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('languages.update', $language->id) }}">
                @csrf
                @method('PUT')
                <div class="card-style mt-20">

                    <div class="row mt-15">
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" id="model_name" value="{{ $language->name }}"
                                    required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="select-style-1">
                                <label>Country <span class="mandatory"> *</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="actionDropdown" name="country_id" required>
                                        <?php foreach ($countries as $country) {
                        $selected = ($country->id == $language->country_id) ? 'selected' : '';
                    ?>
                                        <option value="{{ $country->id }}" {{ $selected }}>{{ $country->name }}
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ $language->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline ms-2">
                                <input type="radio" name="active" value="0"
                                    {{ $language->active == 0 ? 'checked' : '' }}> No
                            </label>
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

        </div>
    </section>
@endsection
