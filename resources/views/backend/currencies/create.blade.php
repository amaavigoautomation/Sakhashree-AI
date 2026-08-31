@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
        </div>
        <div class="container-fluid">
            <div class="card-style mt-20">

                <form action="{{ route('currency.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Country </label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" name="country_id">
                                        @foreach ($countryNames as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="name">Name <span class="mandatory"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="iso_code">ISO Code <span class="mandatory"> *</span></label>
                                <input type="text" id="iso_code" name="iso_code" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="iso_code_num">ISO Code No <span class="mandatory"> *</span></label>
                                <input type="text" id="iso_code_num" name="iso_code_num" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-style-1">
                                <label for="sign">Sign <span class="mandatory"> *</span></label>
                                <input type="text" id="sign" name="sign" class="form-control" required>
                            </div>
                        </div>


                    </div>
                    {{-- row 2 --}}
                    <div class="row">

                        <div class="col-md-3">
                            <div class="input-style-1">
                                <label for="conversion_rate">Conversion Rate <span class="mandatory"> *</span></label>
                                <input type="text" id="conversion_rate" name="conversion_rate" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label>Blank </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="blank" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="blank" class="radio-inline" value="0" checked> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Format</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="format" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="format" class="radio-inline" value="0" checked> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Decimals </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="decimals" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="decimals" class="radio-inline" value="0" checked> No
                            </label>
                        </div>



                    </div>

                    {{-- row 3 --}}
                    <div class="row">

                        <div class="col-sm-3">
                            <label>Display on Frontend </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="display_on_frontend" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="display_on_frontend" class="radio-inline" value="0"
                                    checked> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Default Country </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="its_default_country" class="radio-inline" value="1">
                                Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="its_default_country" class="radio-inline" value="0"
                                    checked> No
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Active </label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0" checked> No
                            </label>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="main-btn primary-btn-outline btn-hover btn-xs">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
