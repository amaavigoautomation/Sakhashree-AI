<section class="homemidcontarea">
    <div class="container">

        {{-- healing offerings --}}
        @include('partials.frontend.healing_offerings')

        {{-- consultations --}}
        @include('partials.frontend.personal_consultation')

        {{-- workshop and retreats --}}
        @include('partials.frontend.workshop_and_retreats')

        <!-- Transformation Stories Desktop start -->
        @include('partials.frontend.transformation_stories_desktop')
        <!-- Transformation Stories Desktop end -->

        <!-- Transformation Stories Mobile start -->
        @include('partials.frontend.transformation_stories_mobile')
        <!-- Transformation Stories Mobile end -->

        <!-- Transformation Stories slider start -->
        @include('partials.frontend.transformation_stories')
        <!-- Transformation Stories slider end -->

        <!-- Videos section start here -->
        @include('partials.frontend.videos')
        <!-- Videos section end here -->

        <!-- Blogs section start here -->
        @include('partials.frontend.blogs')
        <!-- Blogs section end here -->

        <!-- News section start here -->
        @include('partials.frontend.news')
        <!-- News section end here -->
    </div>
</section>
