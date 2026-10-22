<!DOCTYPE html>
<html lang="en">

<head>
    <?php $defaultImage = secure_asset('/'); ?>
    <base href="{{ url('/') }}/">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ !empty($seoData['page_title']) ? $seoData['page_title'] : 'Sakhashree Neeta | Spiritual Guide & Healer' }}
    </title>
    <link rel="canonical" href="{{ !empty($seoData['page_url']) ? $seoData['page_url'] : '' }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="{{ $seoData['meta_keyword'] ?? 'Sakhashree' }}">
    <meta name="description"
        content="{{ $seoData['meta_description'] ?? 'Discover spiritual healing, workshops and guidance with Sakhashree Neeta.' }}">
    <meta data-react-helmet="true" property="og:image" content="{{ $seoData['meta_image'] ?? $defaultImage }}" />

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="websites" />
    <meta property="og:title" content="{{ $seoData['page_title'] ?? 'Sakhashree Neeta | Spiritual Guide & Healer' }}" />
    <meta property="og:description"
        content="{{ $seoData['meta_description'] ?? 'Discover spiritual healing, workshops and guidance with Sakhashree Neeta.' }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:site_name" content="Sakhashree" />


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon">


    <!-- External CSS Files -->
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/developer.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/form.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/fancybox.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/gallerypopup.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/menu.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/toastr/build/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/font-awesome.min.css') }}" />


    <link rel="stylesheet" href="{{ asset('/dist/fonts/frontend-fonts/fonts/css/all.css') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap"
        rel="stylesheet">


    <!-- Script -->
    <script src="{{ asset('dist/js/Frontend/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('dist/js/Frontend/jquery-latest.min.js') }} "></script>
    <script src="{{ asset('/dist/css/front-end/fancybox/fancybox.umd.js') }} "></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Fixed Header script start-->
    <script>
        $(window).on("scroll", function() {
            if ($(window).scrollTop() > 50) {
                $(".topband").addClass("active");
            } else {
                //remove the background property so it comes transparent again (defined in your css)
                $(".topband").removeClass("active");
            }
        });
    </script>
    <!-- Fixed Header script end-->

</head>

<body>
    <script src="{{ asset('dist/toastr/build/toastr.min.js') }}"></script>
    <script>
        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @elseif (session('error'))
            toastr.error('{{ session('error') }}');
        @endif

        // Toastr configuration (optional)
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <main class="mainwrapper">
        @include('partials.frontend.header')

        @yield('content')

        @include('partials.frontend.footer')
    </main>

    @if (request()->routeIs('home'))
        @include('partials.frontend.ai-guide-widget')
    @endif

    <script src="{{ asset('dist/js/Frontend/menu.js') }} "></script>
    <script src="{{ asset('dist/js/Frontend/swiper.js') }} "></script>
    <script src="{{ asset('dist/js/Frontend/swiper.min.js') }} "></script>
    <script src="{{ asset('dist/js/Frontend/fancybox.umd.js') }} "></script>
    <script src="{{ asset('dist/js/jq/jquery.select2.min.js') }}"></script>

    <script>
        $('.subnav a[href^="#"]').on('click', function(event) {

            var target = $(this.getAttribute('href'));
            var removeOffset = 0;
            if ($('#MidOffice').hasClass("fixed2")) {
                removeOffset = 190;
            } else {
                removeOffset = 190;
            }

            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: eval(target.offset().top) - eval(removeOffset)
                }, 200);

            }

        });
        //# sourceURL=pen.js
    </script>
    <script>
        $(document).ready(function() {
            /*DropDown Selectro*/
            $('.jSelectbox').select2();
        });

        $(document).ready(function() {

            $('#search_blogs').keyup(function() {

                let keyword = $(this).val().trim();

                if (keyword.length < 3) {
                    $('#blog_results').hide().html('');
                    return;
                }

                $.ajax({
                    url: "{{ route('search.blogs') }}",
                    type: "POST",
                    data: {
                        search: keyword,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#blog_results')
                            .html(response)
                            .show();
                    },
                    error: function() {
                        $('#blog_results').hide();
                    }
                });

            });

        });
    </script>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const testimonialModal = document.getElementById('VideoTestimonials');
            const testimonialIframe = document.getElementById('testimonialVideoIframe');

            testimonialModal.addEventListener('show.bs.modal', function(event) {
                const videoLink = event.relatedTarget?.getAttribute('data-video');
                if (!videoLink) {
                    testimonialIframe.src = '';
                    return;
                }

                let embedUrl = videoLink.trim();
                const match = embedUrl.match(/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([^&?\/]+)/);
                if (match) {
                    embedUrl = 'https://www.youtube.com/embed/' + match[1];
                }

                testimonialIframe.src = embedUrl + (embedUrl.includes('?') ? '&autoplay=1' : '?autoplay=1');
            });

            testimonialModal.addEventListener('hidden.bs.modal', function() {
                testimonialIframe.src = '';
            });

            const videoModal = document.getElementById('Videos');
            const videoIframe = document.getElementById('videoIframe');

            videoModal.addEventListener('show.bs.modal', function(event) {

                const button = event.relatedTarget;

                const videoLink = button.getAttribute('data-video');

                let videoId = '';

                const match = videoLink.match(
                    /(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([^&?\/]+)/
                );

                if (match) {
                    videoId = match[1];
                }

                videoIframe.src =
                    'https://www.youtube.com/embed/' + videoId;

            });


            videoModal.addEventListener('hidden.bs.modal', function() {

                videoIframe.src = '';

            });

        });
    </script>

        <script>
        function toggleSlides() {
            $('.toggler').click(function(e) {
                var id = $(this).attr('id');
                var widgetId = id.substring(id.indexOf('-') + 1, id.length);

                $('#' + widgetId).slideToggle();
                $(this).toggleClass('sliderExpanded');

                $('.closeSlider').click(function() {
                    $(this).parent().hide('slow');

                    var relatedToggler = 'toggler-' + $(this).parent().attr('id');

                    $('#' + relatedToggler).removeClass('sliderExpanded');
                });
            });
        }

        $(function() {
            toggleSlides();
        });
    </script>

    <script>
        const counters = document.querySelectorAll(".count");
        let hasAnimated = false;

        function animateCounters() {
            const duration = 2000; // smooth + slow

            counters.forEach(counter => {
                const target = +counter.getAttribute("data-target");
                const startTime = performance.now();

                function updateCounter(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);

                    const eased = progress * (2 - progress); // smooth easing

                    counter.innerText = Math.floor(eased * target);

                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target;
                    }
                }

                requestAnimationFrame(updateCounter);
            });
        }

        // Scroll trigger
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !hasAnimated) {
                        animateCounters();
                        hasAnimated = true;
                    }
                });
            }, {
                threshold: 0.4
            } // 40% visible
        );

        observer.observe(document.getElementById("statsSection"));
    </script>

    {{-- Photo Gallery script start here --}}
    <script>
        function openModal() {
            document.getElementById('myModalgallery').style.display = "block";
            document.body.style.overflow = "hidden";
        }

        function closeModal() {
            document.getElementById('myModalgallery').style.display = "none";
            document.body.style.overflow = "";
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
    {{-- Photo Gallery script end here --}}

    @stack('scripts')
</body>

</html>
