@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <form method="POST" action="{{ route('testimonials.update', $testimonial->id) }}">
                @csrf
                @method('PUT')

                <div class="card-style mt-20">

                    <div class="row mt-15">

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory">*</span></label>
                                <input type="text" name="name" value="{{ $testimonial->name }}" required />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $testimonial->email }}" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Country</label>
                                <input type="text" name="country" value="{{ $testimonial->country }}" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>City</label>
                                <input type="text" name="city" value="{{ $testimonial->city }}" />
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Rating <span class="mandatory">*</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" name="rating" required>
                                        <option value="">Select Rating</option>
                                        @foreach ($ratings as $rating)
                                            <option value="{{ $rating }}"
                                                {{ $testimonial->rating == $rating ? 'selected' : '' }}>
                                                {{ $rating }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Active</label><br>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="1"
                                    {{ $testimonial->active == 1 ? 'checked' : '' }}> Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" value="0"
                                    {{ $testimonial->active == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>

                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Description</label>
                                    <textarea name="description" rows="10" class="rich-editor">
                                        {{ $testimonial->description }}
                                </textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Save
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
