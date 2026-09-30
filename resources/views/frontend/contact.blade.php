@extends('layouts.frontend')

@section('content')
    <div class="innercontbg">


        <!-- Middle section start here -->
        <section class="innermidcontarea">

            <div class="container">

                <!-- Breadcrumb start here -->
                <div class="breadcrumbarea">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Contact us
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb end here -->


                <div class="mainheading topmargin5">
                    <h1 class="text-uppercase">
                        <span class="second-color">Let’s Begin Your</span><br>
                        Healing Journey
                    </h1>
                </div>


                <div class="innercolinfotext">
                    Whether you have questions about consultations,
                    <br class="hidemob">
                    workshops, RRCT or Rudraksha guidance,
                    <br class="hidemob">
                    We’re here to help.
                </div>


                <!-- Contact Box Area -->
                <div class="contactboxarea topmargin40">

                    <!-- Contact Information -->
                    <div class="contactbox">

                        <!-- Visit Us -->
                        <div class="contactinfoarea">
                            <div class="contacticon">
                                <img src="{{ asset('dist/img/location_icon1.svg') }}">
                            </div>

                            <div>
                                <h5>Visit us</h5>
                                <div>
                                    D-320, Neelkanth Business Park, Nathani Road,
                                    Behind Vidyavihar Railway Station,
                                    Vidyavihar (W), Mumbai- 400086, INDIA.
                                </div>
                            </div>
                        </div>


                        <!-- Call Us -->
                        <div class="contactinfoarea">
                            <div class="contacticon">
                                <img src="{{ asset('dist/img/call_icon.svg') }}">
                            </div>

                            <div>
                                <h5>Call us</h5>
                                <div>
                                    <a href="tel:+919326762293">
                                        +91 9326762293
                                    </a>
                                </div>
                            </div>
                        </div>


                        <!-- WhatsApp -->
                        <div class="contactinfoarea">
                            <div class="contacticon">
                                <img src="{{ asset('dist/img/whatsapp_icon.svg') }}">
                            </div>

                            <div>
                                <h5>WhatsApp</h5>
                                <div>
                                    <a href="https://api.whatsapp.com/send?phone=919326762293&text=Hello!" target="_blank">
                                        +91 9326762293
                                    </a>
                                </div>
                            </div>
                        </div>


                        <!-- Email -->
                        <div class="contactinfoarea">
                            <div class="contacticon">
                                <img src="{{ asset('dist/img/email_icon1.svg') }}">
                            </div>

                            <div>
                                <h5>Email us</h5>
                                <div>
                                    <a href="mailto:contact@sakhashree.com">
                                        contact@sakhashree.com
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Contact Information End -->


                    <!-- Enquiry Box -->
                    <div class="enquirybox">

                        <div class="enquiryheadarea">

                            <div class="enquiryheadcont">

                                <div class="mainheading">
                                    <h2 class="mb-0">
                                        Send us an Enquiry
                                    </h2>
                                </div>

                                <div class="ornament" aria-hidden="true">
                                    <img src="{{ asset('dist/img/sidebarhead.svg') }}">
                                </div>

                            </div>

                        </div>


                        <!-- Enquiry Form -->
                        <form action="{{ route('enquiries.store') }}" method="POST">

                            @csrf

                            <div class="row topmargin30">

                                <!-- Full Name -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <input type="text" name="full_name" class="form-control" required
                                            placeholder="Full Name" value="{{ old('full_name') }}">
                                        @error('full_name')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <input type="email" name="email" required class="form-control"
                                            placeholder="Email Address" value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Country -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <select name="country_id" id="country_id" required class="form-select">
                                            <option value="">Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    data-code="{{ $country->calling_code }}"
                                                    {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Phone Number -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <div class="row padding5pxarea">
                                            <div class="col-5 padding5px">
                                                <input type="text" name="calling_code" id="calling_code"
                                                    class="form-control" placeholder="Code" readonly
                                                    value="{{ old('calling_code') }}">
                                            </div>

                                            <div class="col-7 padding5px">
                                                <input type="text" name="phone" required class="form-control"
                                                    placeholder="Phone Number" value="{{ old('phone') }}"
                                                    inputmode="numeric" pattern="[0-9]{1,12}" maxlength="12"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);">
                                            </div>
                                        </div>

                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Subject -->
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <select name="subject_id" class="form-select">
                                            <option value=""> Subject </option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}"
                                                    {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                                    {{ $subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subject_id')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Description -->
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <textarea name="description" required class="form-control" rows="5"
                                            placeholder="Tell us about your challenges or concerns">{{ old('description') }}</textarea>
                                        @error('description')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="mb-2">
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}">
                                    </div>

                                    @error('g-recaptcha-response')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}

                            </div>


                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="secondrybtn btnmd">
                                    Send Enquiry
                                </button>
                            </div>

                        </form>
                        <!-- Enquiry Form End -->

                    </div>
                    <!-- Enquiry Box End -->

                </div>
                <!-- Contact Box Area End -->


                <!-- Visit Us Heading -->
                <div class="innerheadarea topmargin50">

                    <div class="innerheadcont">

                        <div class="ornament" aria-hidden="true">
                            <img src="{{ asset('dist/img/sidebarhead1.svg') }}">
                        </div>

                        <div class="mainheading text-center">
                            <h2 class="mb-0">
                                Visit Us
                            </h2>
                        </div>

                        <div class="ornament" aria-hidden="true">
                            <img src="{{ asset('dist/img/sidebarhead.svg') }}">
                        </div>

                    </div>

                </div>
                <!-- Visit Us Heading End -->


                <!-- Google Map -->
                <div class="contactmapbox topmargin30">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3795.1799586772768!2d72.8960602!3d19.0799295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ce7623f39289%3A0x58b37e853f989643!2sRudra%20Centre%20(Rudraksha%20Ratna)!5e1!3m2!1sen!2sin!4v1787576576255!5m2!1sen!2sin"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin">
                    </iframe>

                </div>
                <!-- Google Map End -->

            </div>

        </section>
        <!-- Middle section end here -->


    </div>
    <script>
        document.getElementById('country_id').addEventListener('change', function() {
            const code = this.options[this.selectedIndex].getAttribute('data-code');
            document.getElementById('calling_code').value = code ? '' + code : '';
        });
    </script>
@endsection
