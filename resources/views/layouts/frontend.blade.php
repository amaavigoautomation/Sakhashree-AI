<!DOCTYPE html>
<html lang="en">

<head>
    <?php $defaultImage = secure_asset('/'); ?>
    <base href="{{ url('/') }}/">
    <meta charset="UTF-8">
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
    <meta property="og:url" content="{{ $seoData['page_url'] ?? 'Sakhashree' }}" />
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
    <main class="mainwrapper">
        @include('partials.frontend.header')

        @yield('content')

        @include('partials.frontend.footer')
    </main>

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

    @stack('scripts')
</body>

</html>
