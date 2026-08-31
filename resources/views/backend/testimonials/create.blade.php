@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <form method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                <div class="card-style mt-20">
                    @csrf
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Name <span class="mandatory"> *</span></label>
                                <input type="text" name="name" placeholder="Name" required />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>Country</label>
                                <input type="text" name="country" placeholder="Enter Country" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-style-1">
                                <label>City</label>
                                <input type="text" name="city" placeholder="Enter City" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label>Rating <span class="mandatory"> *</span></label>
                                <div class="select-position select-sm">
                                    <select class="jSelectbox" id="actionDropdown" name="rating" required>
                                        <option value="">Select Rating</option>
                                        <?php foreach ($ratings as $rating){ ?>
                                        <option value="{{ $rating }}">{{ $rating }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label>Active</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1" checked> Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"> No
                            </label>
                        </div>

                        <div class="row mt-15">
                            <div class="col-sm-12">
                                <div class="input-style-1">
                                    <label>Description</label>
                                    <textarea name="description" rows="10" class="rich-editor"></textarea>
                                </div>
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
