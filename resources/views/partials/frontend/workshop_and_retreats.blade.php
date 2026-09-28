<!-- Workshops & Retreats section start here -->
<div class="row topmargin60">

    {{-- Workshops --}}
    @if ($workshops->isNotEmpty())
        <div class="col-lg-6">

            <div class="d-flex gap-3">
                <div class="mainheading">
                    <h2>Workshops</h2>
                </div>

                <div class="viewalltext topmargin10">
                    | <a href="{{ route('workshop') }}">View all Workshops</a>
                </div>
            </div>

            <div class="row">

                @foreach ($workshops->take(2) as $workshop)
                    <div class="col-md-6">

                        <div class="wrvbcardarea">
                            <a href="{{ route('workshop') }}">

                                <div class="wrvbcard">

                                    <div class="wrvbcardimg">
                                        @if ($workshop->image_file)
                                            <img src="{{ asset('public/images/workshops/image_file/' . $workshop->id . '/' . $workshop->image_file) }}"
                                                alt="{{ $workshop->title }}">
                                        @else
                                            <img src="{{ asset('dist/img/no-image.png') }}"
                                                alt="{{ $workshop->name }}">
                                        @endif
                                    </div>

                                    <div class="wrcardtitle">
                                        <h6>{{ $workshop->name }}</h6>
                                    </div>

                                </div>

                            </a>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    @endif


    {{-- Retreats --}}
    @if ($spiritualTours->isNotEmpty())
        <div class="col-lg-6 rowmargin10">

            <div class="d-flex gap-3">
                <div class="mainheading">
                    <h2>Retreats</h2>
                </div>

                <div class="viewalltext topmargin10">
                    | <a href="{{ route('spiritual_tours') }}">View all Retreats</a>
                </div>
            </div>

            <div class="row">

                @foreach ($spiritualTours->take(2) as $tour)
                    <div class="col-md-6">

                        <div class="wrvbcardarea">
                            <a href="{{ route('spiritual_tours') }}">

                                <div class="wrvbcard">

                                    <div class="wrvbcardimg">
                                        @if ($tour->image_file)
                                            <img src="{{ asset('public/images/spiritual_tours/image_file/' . $tour->id . '/' . $tour->image_file) }}"
                                                alt="{{ $tour->title }}">
                                        @else
                                            <img src="{{ asset('dist/img/no-image.png') }}"
                                                alt="{{ $tour->title }}">
                                        @endif
                                    </div>

                                    <div class="wrcardtitle">
                                        <h6>{{ $tour->title }}</h6>
                                    </div>

                                </div>

                            </a>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    @endif

</div>

<!-- Workshops & Retreats section end here -->
