@extends('layouts.frontend')

@section('content')
    <div class="maincontarea">

        <!-- Collage section start -->
        @include('partials.frontend.collagearea')
        <!-- Collage section end -->

        <!-- Collage content mobile section start -->
        @include('partials.frontend.collagecontareamob')
        <!-- Collage content mobile section end -->

        <!-- WHAT I DO section start -->
        @include('partials.frontend.whatidoarea')
        <!-- WHAT I DO section end -->

        <!-- How do Chakras affect your life? section start -->
        {{-- @include('partials.frontend.howdochakrasarea') --}}
        <!-- How do Chakras affect your life? section end -->

        <!-- Your journey starts here... section start -->
        {{-- @include('partials.frontend.journeystartsarea') --}}
        <!-- Your journey starts here... section end -->

        <!-- Visit the Store section start -->
        {{-- @include('partials.frontend.visitstorearea') --}}
        <!-- Visit the Store section end -->

        <!-- Sacred Healing Remedies section start -->
        {{-- @include('partials.frontend.sacredhealingarea') --}}
        <!-- Sacred Healing Remedies section end -->

        <!-- TESTIMONIALS & Blogs section start -->
        {{-- @include('partials.frontend.blogstestimonialsarea') --}}
        <!-- TESTIMONIALS & Blogs section end -->

    </div>
@endsection

<!-- Success Stories Modal start -->
<div class="modal fade" id="SuccessStories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success Stories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/nlBqht22MOM?si=k-WDv9euCoNe1y-w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<!-- Success Stories Modal end -->

<!-- Add Reviews Modal start -->
<div class="modal fade" id="AddReviews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Reviews</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <input class="form-control form-control-lg" placeholder="Your Full Name">
        </div>
        <div class="mb-3">
          <input class="form-control form-control-lg" placeholder="Enter Your Email ID">
        </div>
        <div class="mb-3">
          <input class="form-control form-control-lg" placeholder="Mobile / Telephone">
        </div>
        <div class=""><textarea class="form-control" rows="5">Tell us about your challenges or concerns</textarea></div>
        <div class="topmargin20"><button class="secondrybtn btnmdfullwidth">Send</button></div>
      </div>
    </div>
  </div>
</div>
<!-- Add Reviews Modal end -->
