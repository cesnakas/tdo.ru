$(document).ready(function () {


    $('.main-screen-content__slider').slick({
        slidesToShow: 1,
        arrows: false,
        fade: true,
        autoplay: true,
        dots: true,
        dotsClass: 'slider-dots',
        asNavFor: '.main-screen-content__thumbnails',

    });


    $('.main-screen-content__thumbnails').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.main-screen-content__slider',
        dots: false,
        fade: true,
        arrows: false,
        focusOnSelect: true
    });

    $('.good-popup_wrap-radio').on('click', function () {
        $('.good_radio_img').removeClass('good_radio_img--active');
        $(this).find('.good_radio_img').addClass('good_radio_img--active');

    });


    $(window).resize(function () {
        blogSliderHeight = $('.blog-slider').height();
        if (window.matchMedia("(max-width: 768px)").matches) {
            $('.blog-slider .slick-next').css('top', blogSliderHeight);
            $('.blog-slider-768-shadow').css('height', blogSliderHeight);

        } else {
            $('.blog-slider-768-shadow').css('display', 'none');
        }
    });

    $('.sort-wrap .sort_filter-check_wrap .checkbox-custom-hidd').on('click', function () {
        if ($(this).prop("checked")) {
            $('.sort_filter-check_wrap').removeClass('sort_filter-check_wrap--active');
            $(this).closest('.sort_filter-check_wrap').addClass('sort_filter-check_wrap--active');

        } else {
            $(this).closest('.sort_filter-check_wrap').removeClass('sort_filter-check_wrap--active');
        }
    });

    var numStatus = 20 * $('.good-page_rating_right-status-line-long span').text();

    console.log(numStatus);

    $('.good-page_rating_right-status-line-long').css('width', numStatus + '%');

    $('.region-select').styler();
    $('.sort-select').styler();

    $('.clear-input').on('click', function () {
        $(this).next('.input').val('').parent('.wrap-input').removeClass('wrap-input--active');
    });


    $('.good-page_slider').slick({
        slidesToShow: 1,
        arrows: true,
        asNavFor: '.good-page_slider-nav',

    });

    $('.good-page_slider-nav').slick({
        slidesToShow: 4,
        vertical: true,
        arrows: false,
        verticalSwiping: true,
        asNavFor: '.good-page_slider',
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1139,
                settings: {
                    vertical: false,
                    verticalSwiping: false,
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 372,
                settings: {
                    vertical: false,
                    verticalSwiping: false,
                    slidesToShow: 3,
                }
            },
        ]
    });

    $('.inner-blog-slider').slick({
        slidesToShow: 2,
        arrows: false,
        autoplay: true,
        responsive: [
            {
                breakpoint: 584,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.goods-slider').slick({
        slidesToShow: 5,
        responsive: [
            {
                breakpoint: 1053,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 763,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 585,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 399,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });


    $('.radio-hid:checked').parents('.good-popup_wrap-radio').addClass('class_name');
    var countActivate = 0;
    $('#good-popup-btn').fancybox({
        touch: false,
    });
    $('#addCart-popup-btn').fancybox({
        touch: false,
        onInit: function (instance, current) {
            if (countActivate === 0) {
                $('.goods-slider-var-popup').slick({
                    slidesToShow: 4,
                    infinite: false,
                    responsive: [
                        {
                            breakpoint: 740,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 458,
                            settings: {
                                slidesToShow: 2,
                            }
                        },
                    ]
                });
            }
            countActivate += 1;

        }

    })
    $('#goods-slider-var').slick({
        slidesToShow: 4,
        responsive: [
            {
                breakpoint: 1053,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 893,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 683,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 490,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    })

    $('.video-slider-wrap').slick({
        slidesToShow: 4,
        responsive: [
            {
                breakpoint: 1221,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 519,
                settings: {
                    slidesToShow: 3,
                }
            },

        ]
    });

    $('.call-us-slider').slick({
        slidesToShow: 1,
        autoplay: true
    })
    $('.blog-slider').slick({
        slidesToShow: 4,
        responsive: [
            {
                breakpoint: 820,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 585,
                settings: {
                    slidesToShow: 2,

                }
            },


        ]
    });

    $('.big-form').on('focus', '.input', function () {
        $(this).parent('.wrap-input').addClass('wrap-input--active');
    });

    $('.big-form').on('focusout', '.input', function () {

        if ($(this).val().length == 0) {
            $(this).parent('.wrap-input').removeClass('wrap-input--active');
        }

    });

    $('.burger').on('click', function () {
        $('.menu-mask').addClass('menu-mask_active');
        $('body').addClass('body-active');
    });

    $('.close-menu-mask').on('click', function () {
        $('.menu-mask').removeClass('menu-mask_active');
        $('body').removeClass('body-active');
    });

    $('.cat-btn').on('click', function () {
        $('.header-bottom-main-screen').toggleClass('header-bottom-main-screen--active');
        $('.catalog-mask_wrap').toggleClass('catalog-mask--active');
        $('body').toggleClass('body-active');
        $(this).toggleClass('cat-btn--active');
    });

    $('.catalog-left-item').on('click', function (e) {
        e.preventDefault();
        if (window.matchMedia("(max-width: 750px)").matches) {
            $('.catalog-left-item').removeClass('catalog-left-item--active');
            $(this).addClass('catalog-left-item--active');
            $('.catalog-left-item_dropdown').slideUp(300);
            $(this).children('.catalog-left-item_dropdown').slideDown(300);
        }
    });

    $('.catalog-mask-close').on('click', function () {
        $('body').removeClass('body-active');
        $('.catalog-mask_wrap').removeClass('catalog-mask--active');
        $('.cat-btn').removeClass('cat-btn--active');
        $('.header-bottom-main-screen').removeClass('header-bottom-main-screen--active');
    });

    // $(window).scroll(function(){
    // 	var scrtollY = $(this).scrollTop();
    // 	console.log(scrtollY);
    // 	if (scrtollY > 1000) {
    // 		$('.header-bottom').addClass('header-bottom-scroll')
    // 	}else{
    // 		$('.header-bottom').removeClass('header-bottom-scroll')
    // 	}

    // });

    var blogSliderHeight = $('.blog-slider').height();
    if (window.matchMedia("(max-width: 768px)").matches) {
        blogSliderHeight = $('.blog-slider').height();
        $('.blog-slider .slick-next').css('top', blogSliderHeight);
        $('.blog-slider-wrap:after').css('height', blogSliderHeight);
        $('.blog-slider-768-shadow').css('height', blogSliderHeight);
        console.log(blogSliderHeight);
    } else {
        $('.blog-slider-768-shadow').css('display', 'none');
    }
});
