@extends('layouts.frontend')

@section('content')
    <div class="maincontarea">

        @include('partials.frontend.collagearea')

        @include('partials.frontend.collagecontareamob')

        @include('partials.frontend.whatidoarea')

    </div>
@endsection

<!-- Success Stories Modal start -->
<div class="modal fade" id="SuccessStories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Success Stories
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">
                <iframe id="successStoryVideo" width="100%" height="315" src="" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('click', function(e) {

        const link = e.target.closest('.sucstoriesimg a[data-video]');

        if (!link) return;

        let videoUrl = link.getAttribute('data-video');

        if (!videoUrl) return;

        videoUrl += videoUrl.includes('?') ?
            '&autoplay=1' :
            '?autoplay=1';

        document.getElementById('successStoryVideo').src = videoUrl;
    });

    document.getElementById('SuccessStories').addEventListener('hidden.bs.modal', function() {
        document.getElementById('successStoryVideo').src = '';
    });
</script>
<!-- Success Stories Modal end -->

<!-- Add Reviews Modal start -->
<div class="modal fade" id="AddReviews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Add Reviews
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('testimonial.review.store') }}">

                    @csrf

                    <div class="mb-3">
                        <input type="text" name="name" class="form-control form-control-lg"
                            placeholder="Your Full Name" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" name="designation" class="form-control form-control-lg"
                            placeholder="Your Designation" value="{{ old('designation') }}" required>
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control form-control-lg"
                            placeholder="Enter Your Email ID" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" name="mobile" class="form-control form-control-lg"
                            placeholder="Mobile / Telephone" value="{{ old('mobile') }}" required>
                    </div>

                    <div>
                        <textarea name="description" class="form-control" rows="5" placeholder="Tell us about your challenges or concerns"
                            required>{{ old('description') }}</textarea>
                    </div>

                    <div class="topmargin20">
                        <button type="submit" class="secondrybtn btnmdfullwidth">
                            Send
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
<!-- Add Reviews Modal end -->
