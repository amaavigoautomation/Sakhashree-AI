@extends('layouts.backend')

@section('content')
    <section class="section">
    </section>
    <section class="section">
        <div class="container-fluid">
            @include('partials.breadcrumb')

            <div class="card-style mt-4">
                @php
                    $boxes = [
                        [
                            'label' => 'Blogs',
                            'count' => $Blog,
                            'route' => route('blogs.index'),
                            'icon' => 'fa-newspaper-o',
                            'color' => '#ffc107',
                        ],
                        [
                            'label' => 'Blog Tags',
                            'count' => $BlogTag,
                            'route' => route('blogtags.index'),
                            'icon' => 'fa-tags',
                            'color' => '#686458',
                        ],
                        [
                            'label' => 'Videos',
                            'count' => $Video,
                            'route' => route('videos.index'),
                            'icon' => 'fa-video-camera',
                            'color' => '#dc3545',
                        ],
                        [
                            'label' => 'Testimonials',
                            'count' => $Testimonial,
                            'route' => route('testimonials.index'),
                            'icon' => 'fa-solid fa-bullhorn',
                            'color' => '#24b6cf',
                        ],
                        // [
                        //     'label' => 'Enquiries',
                        //     'count' => $Consultation,
                        //     'route' => route('consultations.index'),
                        //     'icon' => 'fa-users',
                        //     'color' => '#6f42c1',
                        // ],
                    ];

                    $chunks = array_chunk($boxes, 6);
                @endphp

                @foreach ($chunks as $row)
                    <div class="row g-3 mb-3">
                        @foreach ($row as $box)
                            <div class="col-md-2">
                                <div class="ModuleBox">
                                    <a href="{{ $box['route'] }}">
                                        <i class="fa {{ $box['icon'] }} fa-2x" style="color: {{ $box['color'] }};"></i>
                                        <div>{{ $box['label'] }}</div>
                                        <div>({{ $box['count'] }})</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    @push('styles')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    @endpush
@endsection
