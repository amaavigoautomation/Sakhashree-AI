@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            <!-- Breadcrumb -->
            @include('partials.breadcrumb')

            <div class="card-style mt-20">

                <h4 class="mb-20">Edit FAQ</h4>

                <form action="{{ route('faqs.update', $faq->id) }}" method="POST">

                    @csrf

                    @method('PUT')

                    <!-- FAQ Type -->
                    <div class="input-style-1">
                        <label>FAQ Type</label>
                        <select name="faq_type_id" class="form-control">
                            <option value="">Select FAQ Type</option>

                            @foreach ($faqTypes as $faqType)
                                <option value="{{ $faqType->id }}"
                                    {{ old('faq_type_id', $faq->faq_type_id) == $faqType->id ? 'selected' : '' }}>
                                    {{ $faqType->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('faq_type_id')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Question -->
                    <div class="input-style-1">

                        <label>Question</label>

                        <input type="text" name="question" value="{{ old('question', $faq->question) }}"
                            placeholder="Enter question">

                        @error('question')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    <!-- Answer -->
                    <div class="input-style-1">

                        <label>Answer</label>

                        <textarea name="answer" rows="5" placeholder="Enter answer">{{ old('answer', $faq->answer) }}</textarea>

                        @error('answer')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    <!-- Active -->

                    <div class="row mt-15">


                        <div class="col-sm-4">

                            <label>Active</label>
                            <br>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ old('active', $faq->active) == 1 ? 'checked' : '' }}>
                                Yes
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active', $faq->active) == 0 ? 'checked' : '' }}>
                                No
                            </label>

                            @error('active')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                    </div>


                    <!-- Buttons -->

                    <div class="row mt-15">
                        <div class="col-sm-3">


                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Update
                            </button>

                        </div>


                    </div>

                </form>

            </div>

        </div>

    </section>
@endsection
