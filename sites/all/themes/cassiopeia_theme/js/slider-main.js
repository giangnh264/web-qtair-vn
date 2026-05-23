/**
 * Created by VDP on 05/05/2017.
 */

(function($) {
    $(document).ready(function() {
        var smain_slider = [];
        console.log(123);
        $('#main-slider .swiper-container').each(function(index, element) {
            $(this).addClass('s' + index);
            var slider = new Swiper('#main-slider .swiper-container.s' + index, {
                slidesPerView: 1,
                // direction: 'vertical',
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                loop: false,
                paginationClickable: false,
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                effect: 'fade',
                lazyLoading: true,
                autoplay: {
                    delay: 5000,
                },
                fade: {
                    crossFade: true
                }
            });
            smain_slider.push(slider);
            var _nextButton = $(this).find('.swiper-button-next');
            var _prevButton = $(this).find('.swiper-button-prev');

            _nextButton.click(function() {
                console.log(smain_slider);
                for (var i = 0; i < smain_slider.length; i++) {
                    if (smain_slider[i] !== slider) {
                        smain_slider[i].slideTo(slider.activeIndex);
                    }
                }
            });
            _prevButton.click(function() {
                for (var i = 0; i < smain_slider.length; i++) {
                    if (smain_slider[i] !== slider) {
                        smain_slider[i].slideTo(slider.activeIndex);
                    }
                }
            });

        });
        $("#cassiopeia-custom-user-login-form button").click(function() {
            console.log(123);
            return false;
        });

        $(".customer-comment-slider").owlCarousel({

            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });


    });
})(jQuery);