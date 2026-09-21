@extends('layouts.frontend')

@section('content')
    <div class="maincontarea">
        <!-- Breadcrumb section start -->
        <section class="breadcrumbarea">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                    </ol>
                </nav>
            </div>
        </section>
        <!-- Breadcrumb section end -->

        <!-- Middle section start -->
        <section class="middlecontarea">
            <div class="container">
                <div class="d-flex justify-content-center gap-2 mb-4">
                    <div><a href="{{ route('gallery') }}"><button type="button"
                                class="primarybtnol btnmd">Reviews</button></a></div>
                    <div><button type="button" class="primarybtn btnmd">Testimonials</button></div>
                </div>

                @if (!empty($testimonials) && $testimonials->count() > 0)

                    @foreach ($testimonials as $testimonial)
                        <div class="testimonialsbg mb-4">
                            <div class="testimonialsbox mt-0">

                                {{-- Description --}}
                                <div class="testimonialstext">
                                    {!! $testimonial->description !!}
                                </div>

                                {{-- Name --}}
                                <div class="testimonialsname topmargin30">
                                    {{ $testimonial->name }}
                                </div>

                                {{-- Location --}}
                                <div class="testimonialsdesig">
                                    {{ implode(', ', array_filter([$testimonial->city, $testimonial->country])) }}
                                </div>

                                {{-- Rating --}}
                                <div class="testimonialsrating mt-3">
                                    <div class="testimonialsline"></div>

                                    <div class="testimonialsstar">
                                        @if ($testimonial->rating > 0)
                                            <div class="testimonialsstar">
                                                @for ($i = 1; $i <= $testimonial->rating; $i++)
                                                    <div>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                @endfor
                                            </div>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">No testimonials available.</p>
                @endif

            </div>
        </section>
        <!-- Middle section end -->
    </div>
@endsection
