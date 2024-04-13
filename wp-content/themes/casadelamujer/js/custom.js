jQuery(document).ready(function ($) {
    Fancybox.bind('[data-fancybox]', {
        // Custom options for all galleries
    });

    Fancybox.bind('[data-fancybox="gallery-a"]', {
        // Custom options for the first gallery
    });
    Fancybox.bind('[data-fancybox="gallery-b"]', {
        // Custom options for the first gallery
    });

    new Swiper('.galeria-slider', {
        speed: 400,
        loop: false,
        centeredSlidesBounds:true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                slidesPerGroup: 1,
                spaceBetween: 40
            },
            480: {
                slidesPerView: 1,
                slidesPerGroup: 1,
                spaceBetween: 60
            },
            640: {
                slidesPerView: 3,
                slidesPerGroup: 3,
                spaceBetween: 80
            },
            992: {
                slidesPerView: 4,
                slidesPerGroup: 4,
                spaceBetween: 120
            }
        }
    });

    new Swiper('.video-slider', {
        speed: 400,
        loop: false,
        centeredSlidesBounds:true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 40
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 60
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 80
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 80
            }
        }
    });

    var portfolioIsotope = $('.equipo-container').isotope({
        itemSelector: '.equipo-item',
        layoutMode: 'fitRows'
    });
    $('#equipo-flters li').on('click', function () {
        $("#equipo-flters li").removeClass('active');
        $(this).addClass('active');

        portfolioIsotope.isotope({filter: $(this).data('filter')});
    });
})