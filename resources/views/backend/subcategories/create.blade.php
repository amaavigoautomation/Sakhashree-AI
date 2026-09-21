@extends('layouts.backend')

@section('content')
<section class="section">
    <div class="container-fluid">

        @include('partials.breadcrumb')

        <form method="POST" action="{{ route('subcategories.store') }}">
            <div class="card-style mt-20">
                @csrf

                <div class="row mt-15">




                    <div  class="col-sm-4">
                        <div class="select-style-1">
                        <label>Category <span class="mandatory"> *</span></label>
                        <div class="select-position select-sm">
                        <select class="jSelectbox" id="actionDropdown" name="category_id" required>
                            <option value="">Select Category</option>
                            <?php
                                foreach ($category as $categories){
                            ?>
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                            <?php } ?>
                        </select>
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label>Subcategory Name </label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Subcategory Name" />
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <label>Active</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="0" {{ old('active', 0) == 0 ? 'checked' : '' }}> No
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
