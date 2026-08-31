@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')
            <form method="POST" action="{{ route('blogcomments.update', $blogcomments->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-style mt-20">
                    <!-- Form Start Here -->
                    <div class="row mt-15">
                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>name <span class="mandatory">*</span></label>
                                <input type="text" name="name" value="{{ $blogcomments->name }}" placeholder="Enter Name" required="true"/>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-style-1">
                                <label>email <span class="mandatory">*</span></label>
                                <input type="email" name="email" value="{{ $blogcomments->email }}" placeholder="Enter email" required="true"/>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label>Active</label><br>
                            <label class="radio-inline">
                            <input type="radio" name="active" class="radio-inline" value="1" {{ $blogcomments->active == 1 ? 'checked' : '' }}> Yes
                            </label>
                           <label class="radio-inline">
                           <input type="radio" name="active" class="radio-inline" value="0" {{ $blogcomments->active == 0 ? 'checked' : '' }}> No
                           </label>
                       </div>

                    </div>

                    <hr>
                    <div class="row mt-15">
                        <div class="col-sm-12">
                            <div class="input-style-1">
                                <label>Remark</label>
                                <textarea name="remark" rows="10" class="form-control"> {{ $blogcomments->remark }}</textarea>
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
