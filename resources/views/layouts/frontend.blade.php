<!DOCTYPE html>
<html lang="en">

<head>
    <?php $defaultImage = secure_asset('/'); ?>
    <base href="{{ url('/') }}/">
    <meta charset="UTF-8">
    <title>{{ !empty($seoData['page_title']) ? $seoData['page_title'] : 'Gopinathan Chakra Healer' }}</title>
    <link rel="canonical" href="{{ !empty($seoData['page_url']) ? $seoData['page_url'] : '' }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="{{ $seoData['meta_keyword'] ?? 'Gopinathan Chakra Healer' }}">
    <meta name="description" content="{{ $seoData['meta_description'] ?? 'Gopinathan Chakra Healer' }}">
    <meta data-react-helmet="true" property="og:image" content="{{ $seoData['meta_image'] ?? $defaultImage }}" />

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="websites" />
    <meta property="og:title" content="{{ $seoData['page_title'] ?? 'Gopinathan Chakra Healer' }}" />
    <meta property="og:description" content="{{ $seoData['meta_description'] ?? 'Gopinathan Chakra Healer' }}" />
    <meta property="og:url" content="{{ $seoData['page_url'] ?? 'Gopinathan Chakra Healer' }}" />
    <meta property="og:site_name" content="Gopinathan Chakra Healer" />


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('dist/img/favicon.ico') }}" type="image/x-icon">


    <!-- External CSS Files -->
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/developer.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/form.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/menu.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/fancybox/fancybox.css') }}" />

    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/developer.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/js/Frontend/swipperslider/swiper.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('/dist/fonts/frontend-fonts/fonts/css/all.css') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap"
        rel="stylesheet">


    <!-- Script -->
    <script src="{{ asset('dist/js/jquery-latest.min.js') }} "></script>
    <script src="{{ asset('dist/js/Frontend/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('/dist/css/front-end/fancybox/fancybox.umd.js') }} "></script>


    <script>
        $(document).ready(function() {
            $('#search_blogs').keyup(function() {
                let keyword = $(this).val();

                var data = {
                    search: keyword,
                    _token: '{{ csrf_token() }}'
                }

                if (keyword.length >= 3) {
                    $.ajax({
                        url: 'search-blogs',
                        method: 'POST',
                        data: data,
                        success: function(response) {
                            $("#blog_results").html(response).show();
                        }
                    });
                } else {
                    $("#blog_results").hide();
                }

            });
        });
    </script>


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
        <!-- Header Section -->
        @include('partials.frontend.header')
        <!-- Page Content -->
        @yield('content')
        <!-- Footer Section -->

        @include('partials.frontend.footer')
    </main>

    <!-- Email Consultation Modal start -->
    @include('partials.frontend.emailConsultant')
    <!-- Email Consultation Modal end -->

    <!-- Video Consultation Modal start -->
    @include('partials.frontend.videoConsultant')
    <!-- Video Consultation Modal end -->

    <!-- Whatsapp fixed icon start -->
    <div class="whatsappfixedicon"><a
            href="https://api.whatsapp.com/send?phone=+16473000249&amp;text=Hi,%20I%20came%20across%20your%20website%20and%20I%20want%20to%20know%20more%20about%20chakra%20healing%20with%20rudraksha%20and%20gemstone."
            target="_blank"><img src="{{ asset('dist/img/whatsapp_icon.svg') }}"></a></div>
    <!-- Whatsapp fixed icon end -->



    <script src="{{ asset('dist/js/Frontend/menu.js') }} "></script>
    <script type="text/javascript" src="{{ asset('/dist/js/Frontend/swipperslider/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/Frontend/swipperslider/swiper.js') }}"></script>
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
    </script>

</body>

</html>
