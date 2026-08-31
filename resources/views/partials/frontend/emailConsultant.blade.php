<div class="modal fade" id="EmailConsult" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modeltopcontarea">
                <div class="d-flex justify-content-between gap-2">
                    <div>
                        <h4>Email Consultation Request</h4>
                    </div>
                    <div>
                        <button type="button" class="closebtn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="textwhite18 topmargin15">Includes detailed chakra analysis & personalized remedies</div>
                <div class="d-flex gap-1 topmargin30">
                    <div class="consultfeetext">Fee:</div>
                    <div class="consultfeetextbold">CAD 25</div>
                </div>
            </div>

            <div class="modal-body">
                <div class="modelcontarea">
                    <form action="{{ route('consultations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="consultation_type_id" value="1">

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
                                        id="email_career">
                                    <label class="form-check-label" for="email_career">Career</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]"
                                        value="Relationships" id="email_relationships">
                                    <label class="form-check-label" for="email_relationships">Relationships</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]" value="Finance"
                                        id="email_finance">
                                    <label class="form-check-label" for="email_finance">Finance</label>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]"
                                        value="Emotional Well-being" id="email_emotional">
                                    <label class="form-check-label" for="email_emotional">Emotional Well-being</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]"
                                        value="Spiritual Growth" id="email_spiritual">
                                    <label class="form-check-label" for="email_spiritual">Spiritual Growth</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]" value="Other"
                                        id="email_other">
                                    <label class="form-check-label" for="email_other">Other</label>
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
                                <div class="modaltextpointers topmargin10">
                                    <ul>
                                        <li>Personalized Chakra Analysis</li>
                                        <li>RRCT Remedies with Rudraksha & Gemstone</li>
                                        <li>Detailed Report via Email</li>
                                        {{-- <li>Meditation & Affirmations</li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 right-mob-left rowmargin20">
                                <button type="submit" class="primarybtn btnlg">Send Email</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
