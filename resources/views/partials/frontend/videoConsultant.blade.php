<div class="modal fade" id="VideoConsult" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modeltopcontarea">
                <div class="d-flex justify-content-between gap-2">
                    <div>
                        <h4>Video Consultation Request</h4>
                    </div>
                    <div>
                        <button type="button" class="closebtn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="textwhite18 topmargin15">Connect one-on-one with an expert for a deeper, guided chakra
                    healing experience.</div>
                <div class="d-flex topmargin30">
                    <div class="d-flex gap-5">
                        <div>
                            <div class="consultfeetextbold">Fee: CAD 25</div>
                            <div class="textwhite12bold text-end">45 Minutes</div>
                        </div>
                        <div>
                            <div class="consultfeetextbold">CAD 75</div>
                            <div class="textwhite12bold text-end">75 Minutes</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="modelcontarea">
                    <form action="{{ route('consultations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="consultation_type_id" value="2">

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
                                        id="video_career">
                                    <label class="form-check-label" for="video_career">Career</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]"
                                        value="Relationships" id="video_relationships">
                                    <label class="form-check-label" for="video_relationships">Relationships</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]" value="Finance"
                                        id="video_finance">
                                    <label class="form-check-label" for="video_finance">Finance</label>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]"
                                        value="Emotional Well-being" id="video_emotional">
                                    <label class="form-check-label" for="video_emotional">Emotional Well-being</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]"
                                        value="Spiritual Growth" id="video_spiritual">
                                    <label class="form-check-label" for="video_spiritual">Spiritual Growth</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="concerns[]" value="Other"
                                        id="video_other">
                                    <label class="form-check-label" for="video_other">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="textblack16bold topmargin30">Describe Your Situation</div>
                        <div class="topmargin10">
                            <textarea class="form-control" name="message" rows="5"
                                placeholder="Tell us about your challenges or concerns"></textarea>
                        </div>

                        <div class="row topmargin30 align-items-end">
                            <div class="col-lg-8">
                                <div class="textblack16bold">What You'll Receive</div>
                                <div class="modaltextpointers topmargin10">
                                    <ul>
                                        <li>One-on-one live consultation</li>
                                        <li>Personalized Chakra Analysis</li>
                                        <li>RRCT Remedies with Rudraksha & Gemstone</li>
                                        <li>Detailed Report via Email</li>
                                        {{-- <li>Root cause analysis of your challenges</li>
                                        <li>Chakra imbalance identification</li>
                                        <li>Practical healing guidance</li>
                                        <li>Q&A with expert</li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 right-mobtab-left rowmargintabmob20">
                                <button type="submit" class="primarybtn btnlg">Send Video Call Request</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
