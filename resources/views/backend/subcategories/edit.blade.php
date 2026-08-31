@extends('layouts.backend')

@section('content')

<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')

        <form method="POST" action="{{ route('subcategories.update', ['subcategory' => $subcategory->id]) }}">
            <div class="card-style mt-20">
                @method('PUT')
                @csrf

                <input type="hidden" name="id" value="{{ $subcategory->id }}" />

                <div class="row mt-15">


                    <div class="col-sm-4">
                        <div class="select-style-1">
                            <label>Category <span class="mandatory">*</span></label>
                            <div class="select-position select-sm">
                                <select name="category_id" class="jSelectbox" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="input-style-1">
                            <label>Subcategory Name</label>
                            <input type="text" name="name" placeholder="Subcategory Name" value="{{ $subcategory->name }}" required />
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <label>Active</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="1" {{ $subcategory->active == 1 ? 'checked' : '' }}> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="active" value="0" {{ $subcategory->active == 0 ? 'checked' : '' }}> No
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
