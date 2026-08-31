<div class="modal fade" id="AboutConsult" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modeltopcontarea">
                <div class="d-flex justify-content-between gap-2">
                    <div>
                        <h4>Consultation Request</h4>
                    </div>
                    <div>
                        <button type="button" class="closebtn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="modelcontarea">
                    <form action="{{ route('consultations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="consultation_type_id" id="about_type_id" value="1">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label textblack14bold mb-2">Full Name</label>
                                    <input class="form-control" name="name" placeholder="Your full name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label textblack14bold mb-2">Email Address</label>
                                    <input class="form-control" name="email" placeholder="Enter your email address"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label textblack14bold mb-2">Phone Number</label>
                                    <input class="form-control" name="phone" placeholder="Enter your contact number"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label textblack14bold mb-2">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" required>
                                </div>
                            </div>
                        </div>

                        <div class="textblack16bold">Your Concerns</div>
                        <div class="row topmargin10">
                            <div class="col-lg-3 col-md-4 col-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]" value="Career"
                                        id="about_career">
                                    <label class="form-check-label" for="about_career">Career</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]"
                                        value="Relationships" id="about_relationships">
                                    <label class="form-check-label" for="about_relationships">Relationships</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]" value="Finance"
                                        id="about_finance">
                                    <label class="form-check-label" for="about_finance">Finance</label>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]"
                                        value="Emotional Well-being" id="about_emotional">
                                    <label class="form-check-label" for="about_emotional">Emotional Well-being</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]"
                                        value="Spiritual Growth" id="about_spiritual">
                                    <label class="form-check-label" for="about_spiritual">Spiritual Growth</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]" value="Other"
                                        id="about_other">
                                    <label class="form-check-label" for="about_other">Other</label>
                                </div>
                            </div>
                        </div>

                        {{-- Consultation Type Toggle --}}
                        <div class="d-flex gap-4 topmargin20">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="about_consult_toggle"
                                    id="about_toggle_email" value="email" checked>
                                <label class="form-check-label textblack14bold" for="about_toggle_email">Email</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="about_consult_toggle"
                                    id="about_toggle_video" value="video">
                                <label class="form-check-label textblack14bold" for="about_toggle_video">Video</label>
                            </div>
                        </div>

                        {{-- Price: Email --}}
                        <div class="d-flex gap-2 topmargin10" id="about_price_email"
                            style="display:flex !important;">
                            <div class="textblack14bold">Fee:</div>
                            <div class="textblack16bold">CAD 25</div>
                        </div>

                        {{-- Price: Video --}}
                        <div id="about_price_video" style="display:none !important;">
                            <div class="d-flex gap-5 topmargin10">
                                <div>
                                    <div class="textblack14bold">Fee:</div>
                                    <div class="textblack16bold">CAD 25</div>
                                    <div class="textblack16bold">45 Minutes</div>
                                </div>
                                <div>
                                    <div class="textblack14bold">Fee:</div>
                                    <div class="textblack16bold">CAD 75</div>
                                    <div class="textblack16bold">75 Minutes</div>
                                </div>
                            </div>
                        </div>

                        <div class="textblack16bold topmargin30">Describe Your Situation</div>
                        <div class="topmargin10">
                            <textarea class="form-control" name="message" rows="5"
                                placeholder="Tell us about your challenges or concerns"></textarea>
                        </div>

                        <div class="row topmargin30 align-items-end">
                            <div class="col-md-8">
                                <div class="textblack16bold">What You'll Receive</div>
                                <div class="modaltextpointers topmargin10" id="about_benefits_email"
                                    style="display:block !important;">
                                    <ul>
                                        <li>Personalized Chakra Analysis</li>
                                        <li>RRCT Remedies with Rudraksha & Gemstone</li>
                                        <li>Detailed Report via Email</li>
                                    </ul>
                                </div>
                                <div class="modaltextpointers topmargin10" id="about_benefits_video"
                                    style="display:none !important;">
                                    <ul>
                                        <li>One-on-one live consultation</li>
                                        <li>Personalized Chakra Analysis</li>
                                        <li>RRCT Remedies with Rudraksha & Gemstone</li>
                                        <li>Detailed Report via Email</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 right-mob-left rowmargin20">
                                <button type="submit" class="primarybtn btnlg" id="about_submit_btn">Send
                                    Email</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('input[name="about_consult_toggle"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var isVideo = this.value === 'video';

            document.getElementById('about_type_id').value = isVideo ? '2' : '1';

            document.getElementById('about_price_email').style.cssText = isVideo ?
                'display:none !important;' : 'display:flex !important;';
            document.getElementById('about_price_video').style.cssText = isVideo ?
                'display:block !important;' : 'display:none !important;';

            document.getElementById('about_benefits_email').style.cssText = isVideo ?
                'display:none !important;' : 'display:block !important;';
            document.getElementById('about_benefits_video').style.cssText = isVideo ?
                'display:block !important;' : 'display:none !important;';

            document.getElementById('about_submit_btn').textContent = isVideo ?
                'Send Video Call Request' : 'Send Email';
        });
    });
</script>
