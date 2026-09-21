@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <div class="card-style mt-20">
                <form action="{{ route('packagetypes.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="input-style-1">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter package type name" value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <label>Status</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}> Yes
                            </label>
                            <label class="radio-inline ms-2">
                                <input type="radio" name="active" value="0" {{ old('active', 0) == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
