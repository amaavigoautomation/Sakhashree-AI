$(document).ready(function () {
    new Swiper('.swiper-container', {
        loop: false,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        pagination: '.swiper-pagination',
        paginationClickable: true,
        slidesPerView: 3,
        spaceBetween: 0,
        autoplay: 3000,
        speed: 800,
        breakpoints: {
            1920: {
                slidesPerView: 3,
                //spaceBetween: 20
            },
            1440: {
                slidesPerView: 3,
                //spaceBetween: 20
            },
            1080: {
                slidesPerView: 3,
                //spaceBetween: 20
            },
            992: {
                slidesPerView: 2,
                //spaceBetween: 20
            },
            480: {
                slidesPerView: 1,
                //spaceBetween: 10
            }
        }
    });
});


$(document).ready(function () {
    setTimeout(function () {
        $('.swiper-wrapper').each(function () {
            var $wrapper = $(this);
            var slideCount = $wrapper.find('.swiper-slide').length;

            $wrapper.removeClass('swiperleft swipercenter'); // reset

            if (slideCount >= 4) {
                $wrapper.addClass('swiperleft');
            } else {
                $wrapper.addClass('swipercenter');
            }
        });
    }, 100);
});



$(document).ready(function () {
    new Swiper('.swiper-container1', {
        loop: false,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        pagination: '.swiper-pagination',
        paginationClickable: true,
        slidesPerView: 4,
        spaceBetween: 20,
        autoplay: 3000,
        speed: 800,
        breakpoints: {
            1920: {
                slidesPerView: 5,
                spaceBetween: 15
            },
            1440: {
                slidesPerView: 4,
                spaceBetween: 15
            },
            1080: {
                slidesPerView: 3,
                spaceBetween: 15
            },
            992: {
                slidesPerView: 2,
                spaceBetween: 15
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 15
            }
        }
    });
});
