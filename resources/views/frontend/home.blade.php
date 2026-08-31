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
        @include('partials.frontend.howdochakrasarea')
        <!-- How do Chakras affect your life? section end -->

        <!-- Your journey starts here... section start -->
        @include('partials.frontend.journeystartsarea')
        <!-- Your journey starts here... section end -->

        <!-- Visit the Store section start -->
        @include('partials.frontend.visitstorearea')
        <!-- Visit the Store section end -->

        <!-- Sacred Healing Remedies section start -->
        @include('partials.frontend.sacredhealingarea')
        <!-- Sacred Healing Remedies section end -->

        <!-- TESTIMONIALS & Blogs section start -->
        @include('partials.frontend.blogstestimonialsarea')
        <!-- TESTIMONIALS & Blogs section end -->

    </div>
@endsection
