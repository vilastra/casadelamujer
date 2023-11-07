jQuery(document).ready(function ($) {
    Fancybox.bind('[data-fancybox]', {
        // Custom options for all galleries
    });

    Fancybox.bind('[data-fancybox="gallery-a"]', {
        // Custom options for the first gallery
    });

    new Swiper('.servicios-slider', {
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
                spaceBetween: 40
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 60
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 80
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 120
            }
        }
    });
})