@extends('layouts.backend')

@section('content')
    <section class="section">

        <div class="container-fluid">

            <!-- Breadcrumb -->
            @include('partials.breadcrumb')

            <div class="card-style mt-20">
                <form action="{{ route('faqs.store') }}" method="POST">
                    @csrf
                    <!-- FAQ Category -->
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="select-style-1">
                                <label for="faq_type_id">
                                    FAQ Category <span class="mandatory">*</span>
                                </label>
                                <div class="select-position select-sm">
                                    <select name="faq_type_id" id="faq_type_id" class="jSelectbox" required>
                                        <option value="">Select</option>
                                        @foreach ($faqTypes as $faqType)
                                            <option value="{{ $faqType->id }}"
                                                {{ old('faq_type_id') == $faqType->id ? 'selected' : '' }}>
                                                {{ $faqType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Active -->
                        <div class="col-sm-2">
                            <label>Status</label>
                            <br>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="1"
                                    {{ old('active', 1) == 1 ? 'checked' : '' }}>
                                Active
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="active" class="radio-inline" value="0"
                                    {{ old('active') === '0' ? 'checked' : '' }}>
                                Inactive
                            </label>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <!-- Question -->
                        <div class="input-style-1">
                            <label>Question <span class="mandatory">*</span></label>
                            <input type="text" name="question" value="{{ old('question') }}" required
                                placeholder="Enter question">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Answer -->
                        <div class="input-style-1">
                            <label>Answer <span class="mandatory">*</span></label>
                            <textarea name="answer" required rows="5" placeholder="Enter answer">{{ old('answer') }}</textarea>
                        </div>
                    </div>

                    <hr>

                    <!-- Buttons -->
                    <div class="row mt-15">
                        <div class="col-sm-3">
                            <button type="submit" class="main-btn primary-btn btn-hover btn-xs">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
