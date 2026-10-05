@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')
            <form method="POST" action="{{ route('umrahproduct.update', ['umrahproduct' => $umrahproducts->id]) }}"
                enctype="multipart/form-data">
                <div class="card-style mt-20">
                    @method('PUT')
                    @csrf
                    <div class="row mt-15">
                        <!-- Id -->
                        <input type="hidden" name="id" value="{{ $umrahproducts->id }}" />


                        <div class="row mt-15">
                            <!-- Role Name -->
                            <div class="col-sm-4">
                                <div class="input-style-1">
                                    <label>Name<span class="mandatory">*</span></label>
                                    <input type="text" name="name" placeholder="Role Name"
                                        value="{{ $umrahproducts->name }}" />
                                </div>
                            </div>

                            <!-- Active Code -->
                            <div class="col-sm-4">
                                <label>Active</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="active" class="radio-inline" value="1"
                                        {{ $umrahproducts->active == 1 ? 'checked' : '' }}> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" class="radio-inline" value="0"
                                        {{ $umrahproducts->active == 0 ? 'checked' : '' }}> No
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-15">
                            <div class="col-sm-3">
                                <button type="submit" class="main-btn primary-btn btn-hover btn-xs">Update</button>
                            </div>
                        </div>

                    </div>
            </form>
    </section>
@endsection
