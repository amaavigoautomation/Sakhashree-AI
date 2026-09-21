@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            <!-- Breadcrumb -->
            @include('partials.breadcrumb')



            <div class="card-style mt-20">

                <h4 class="mb-20">Create FAQ</h4>

                <form action="{{ route('faqs.store') }}" method="POST">

                    @csrf

                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}


                    <!-- FAQ Type -->
                    <div class="col-sm-3">
                        <div class="input-style-1">
                            <label class="form-label">FAQ Type</label>


                            <select name="faq_type_id" class=" jSelectbox form-control" required>
                                <option value="">Select FAQ Type</option>

                                @foreach ($faqTypes as $faqType)
                                    <option value="{{ $faqType->id }}"
                                        {{ old('faq_type_id') == $faqType->id ? 'selected' : '' }}>
                                        {{ $faqType->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('faq_type_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Question -->
                    <div class="input-style-1">
                        <label>Question</label>

                        <input type="text" name="question" value="{{ old('question') }}" placeholder="Enter question">

                    </div>


                    <!-- Answer -->
                    <div class="input-style-1">
                        <label>Answer</label>

                        <textarea name="answer" rows="5" placeholder="Enter answer">{{ old('answer') }}</textarea>


                    </div>

                    <!-- Active -->
                    <div class="row mt-15">

                        <div class="col-sm-4">

                            <label>Active</label>
                            <br>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ old('active', 1) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active') === '0' ? 'checked' : '' }}>
                                No
                            </label>

                        </div>


                    </div>

                    <!-- Buttons -->

                    <div class="row mt-15">
                        <div class="col-sm-3">


                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Save
                            </button>

                            <a href="{{ route('faqs.index') }}" class="main-btn light-btn btn-hover btn-xs">
                                Cancel
                            </a>

                        </div>


                    </div>

                </form>

            </div>

        </div>

    </section>
@endsection
