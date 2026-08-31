@extends('layouts.backend')

@section('content')

<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')

        <form method="POST" action="{{ route('packagetypes.update', $packagetype->id) }}">
            @csrf
            @method('PUT')
            <div class="card-style mt-20">

                <div class="row mt-15">
                    <div class="col-sm-6">
                        <div class="input-style-1">
                            <label>Name <span class="mandatory">*</span></label>
                            <input type="text" name="name" id="model_name" value="{{ $packagetype->name }}" required />
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label>Active</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="1" {{ $packagetype->active == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline ms-2">
                            <input type="radio" name="active" value="0" {{ $packagetype->active == 0 ? 'checked' : '' }}> No
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
