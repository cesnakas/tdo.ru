<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("Наши работы");
?>

<?/*
<ul class="breadcrumb-navigation">
<li><a href="/" title="Главная">Главная</a></li>- 
<li><a href="/catalog/vynosnoy_kholod/">Выносной холод</a></li>-
<li>Наши работы</li>
</ul>
*/?>




<style type="text/css">
.our-work-catalog{
    display:-webkit-box;
    display:-ms-flexbox;
    display:flex;
    flex-wrap: wrap;
    margin: 0 -15px;
    padding: 30px 0 0 0;
}
.our-work-catalog-item{
    /*width: 33.3%;*/
    width: 25%;
    padding: 0 15px;
    box-sizing: border-box;
    position: relative;
    margin: 0 0 60px;
}

.our-work-catalog-item:hover{
	/*border: 1px solid #C10016;
	border-radius: 5px;
	border-bottom: 0px;*/
}
.our-work-catalog-item:hover>figcaption{
	display: block;
}

.our-work-card{
    display: block;
    cursor: pointer;
    position: relative;
    padding: 100% 0 0 0;
    text-decoration: none;
    border: 1px solid #f2f2f2;
    border-radius: 5px;
}
.our-work-catalog-item:hover .our-work-card{
    border-color: #C10016;
    border-radius: 5px 5px 0 0;
    border-bottom-color: transparent;
}
.our-work-card__name{
    display: block;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px 10px 18px;
    /*font-size: 22px;*/
    font-size: 14px;
    line-height: 1.2;
    color: #282828;
    font-weight: 700;
    /*background-color: rgba(199,199,199,.7);*/
    transition: all ease .5s;
    box-sizing: border-box;
}
/*.our-work-card__img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}*/
.our-work-card__img {
    position: absolute;
    top: 5%;
    left: 20%;
    width: 60%;
    height: 60%;
}

/*.our-work-card:hover .our-work-card__name{
    color: #fff;
    background-color: rgba(227,10,10,.7);
}*/
.work-caption-wrap{
    background-color: rgba(255,255,255,.8);
    padding: 40px 50px;
    font-size: 13px;
    line-height: 1.6;
    color: #282828;
}
.work-caption-wrap h3{
    font-size: 20px;
    line-height: 1.2;
    margin: 0 0 10px;
    color: #444648;
    font-weight: bold;
}
.our-work-catalog-item figcaption{
    display: none;
    position: absolute;
    border: 1px solid #C10016;
    border-top: 0px;
    background: #fff;
    z-index: 10;
    padding: 0px 10px;
    left: 15px;
    right: 15px;
    border-radius: 0 0 5px 5px;
    font-size: 14px;
    top: 99%;
}

.work-counter{
    color: #d7d7d7;
    font-size: 22px;
    line-height: 1;
    display: block;
    padding: 0 0 15px;
}
.work-css .fancybox-close{
    width: 22px;
    height: 22px;
    background: url('/local/templates/tdo_shop/js/fancybox/images/close-fancy.svg') 0 0 no-repeat;
    top: 65px;
    right: 25px;
}
.work-css .fancybox-nav{
    width: 52px;
}
.work-css .fancybox-nav span{
    visibility: visible;
    opacity: .7;
    transition: all ease .5s;
}
.work-css .fancybox-nav:hover span{
    opacity: 1;
}
.work-css .fancybox-next span{
    width: 52px;
    height: 96px;
    background: url('/local/templates/tdo_shop/js/fancybox/images/prev-fancy.svg') 0 0 no-repeat;
    right: -105px;
    transform: translateY(-50%);
}
.work-css .fancybox-prev span{
    width: 52px;
    height: 96px;
    background: url('/local/templates/tdo_shop/js/fancybox/images/prev-fancy.svg') 0 0 no-repeat;
    left: -105px;
    transform: rotateY(180deg) translateY(-50%);
}
.our-work-detail-photo{
    display: none;
}

.fancybox-outer{
	overflow: inherit;
}

.our-work-buttons{
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	margin: 20px 0;
}
.our-work-buttons a{
	display: block;
	padding: 10px 30px;
    border-radius: 3px;
}
.our-work-buttons .red-butt{
	background-color: #C10016;
	color: #fff;
}
.our-work-buttons .white-butt{
	color: #C10016;
	border: 1px solid #C10016;
}
.modal-our-work{
    display: none;
    padding: 45px 40px;
    border-radius: 3px;
    transition: all ease .5s;
    width: 820px;
    position: relative;
}
.our-work-fancy-wrap .fancybox-inner{
    width: 820px;
    margin: 0 auto;
}
.our-work-fancy-wrap .fancybox-skin{
    background: #fff;
}
.our-work-fancy-wrap .fancybox-button--arrow_left,
.our-work-fancy-wrap .fancybox-button--arrow_right{
    width: 70px;
    height: auto;
    top: -15px;
    bottom: -15px;
    opacity: 1;
    visibility: visible;
    cursor: pointer;
    background: transparent;
    opacity: 1;
    padding: 0;
}
.our-work-fancy-wrap .fancybox-button--arrow_left:after,
.our-work-fancy-wrap .fancybox-button--arrow_right:after{
    content: "";
    position: absolute;
    width: 30px;
    height: 30px;
    border-left: 5px solid #A9A9A9;
    border-bottom: 5px solid #A9A9A9;
    top: 50%;
    transition: all ease .5s;
    left: 0;
    transform: rotate(45deg) translateY(-50%);
}
.our-work-fancy-wrap .fancybox-button--arrow_left:hover:after,
.our-work-fancy-wrap .fancybox-button--arrow_right:hover:after{
    border-left-color: #C10016;
    border-bottom-color: #C10016;
}
.our-work-fancy-wrap .fancybox-button--arrow_left{
    left: -64px;
}
.our-work-fancy-wrap .fancybox-button--arrow_right{
    right: -64px;
    transform: rotateY(180deg);
}
.our-work-fancy-wrap .fancybox-button--arrow_left div,
.our-work-fancy-wrap .fancybox-button--arrow_right div{
    display: none;
}
.our-work-fancy-wrap .fancybox-button--arrow_left:disabled,
.our-work-fancy-wrap .fancybox-button--arrow_right:disabled{
    display: none;
}
.our-work-fancy-wrap .fancybox-close-small{
    background-image: none;
    top: 20px;
    right: 20px;
    width: 20px;
    height: 20px;
    padding: 0;
    background: transparent;
}
.our-work-fancy-wrap .fancybox-close-small svg{
    display: none;
}
.our-work-fancy-wrap .fancybox-close-small:after,
.our-work-fancy-wrap .fancybox-close-small:before{
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 2px;
    background: #C4C4C4;
    transition: all ease .5s;
    z-index: 1;
}
.our-work-fancy-wrap .fancybox-close-small:after{
    transform: translateY(-50%) rotate(-45deg);
}
.our-work-fancy-wrap .fancybox-close-small:before{
    transform: translateY(-50%) rotate(45deg);
    z-index: 2;
}
.our-work-fancy-wrap .fancybox-close-small:hover:after,
.our-work-fancy-wrap .fancybox-close-small:hover:before{
    background: #C10016;
}

.modal-our-work__inner{
    display: flex;
    margin: 0 -5px;
    justify-content: space-between;
    min-height: 500px;
}
.modal-our-work__content{
    width: 40%;
    padding: 45px 5px 55px;
    font-size: 16px;
    line-height: 1.2;
    color: #5B5B5B;
    position: relative;
}
.modal-our-work__gallery{
    width: 55%;
    padding: 0 5px;
    position: relative;
}
.modal-our-work:after{
    content: "";
    position: absolute;
    background-color: #fff;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transition: all ease .5s;
    opacity: 1;
    visibility: visible;
    z-index: 10;
}
.modal-our-work.close-b:after{
    opacity: 0;
    visibility: hidden;
    transition: all ease .5s;
}

.modal-our-work__title{
    margin: 0 0 20px;
    font-size: 32px;
    line-height: 1.2;
    font-weight: 700;
    color: #4F4F4F;
}
.modal-our-work__content .our-work-buttons{
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: 5;
    margin: 0;
}
.modal-our-work__content .our-work-buttons .red-butt{
    min-width: 230px;
    text-align: center;
    padding: 16px 10px;
    font-size: 16px;
    line-height: 1;
    font-weight: 700;
}
.sliderworkMain .swiper-slide__img{
    position: relative;
    padding: 100% 0 0 0;
}
.sliderworkThumbs .swiper-slide__img{
    position: relative;
    padding: 100% 0 0 0;
    cursor: pointer;
    border: 2px solid #f2f2f2;
    transition: all ease .5s;
    border-radius: 3px;
    overflow: hidden;
}
.sliderworkThumbs .slick-current .swiper-slide__img{
    border-color: #C10016;
}
.sliderworkMain{
    margin: 0 0 10px;
}
.sliderworkMain .swiper-slide__img img,
.sliderworkThumbs .swiper-slide__img img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.sliderworkThumbs .slick-list{
    margin: 0 -5px;
}
.sliderworkThumbs .slick-slide{
    margin: 0 5px;
}
.sliderworkThumbs .slick-track{
    margin: 0;
}
.sliderworkMain .slick-dots{
    margin: 10px 0 0 0;
    padding: 0;
    list-style-type: none;
    display:flex;
    align-items: flex-start;
    justify-content: center;
    height: 14px;
}
.sliderworkMain .slick-dots li{
    padding: 0;
    margin: 0 5px;
}
.sliderworkMain .slick-dots li:before{
    display: none;
}
.sliderworkMain .slick-dots li button{
    width: 14px;
    height: 14px;
    border-radius: 50%;
    overflow: hidden;
    padding: 0;
    white-space: nowrap;
    text-indent: 100%;
    background: #f2f2f2;
    border: none;
}
.sliderworkMain .slick-dots li.slick-active button{
    background: #C10016;
}

@media (max-width: 1199px) {
    .our-work-card__name{
        /*font-size: 20px;*/
        font-size: 14px;
        padding: 15px 10px 13px;
    }
    .our-work-catalog-item{
        padding: 0 15px;
        margin: 0 0 30px;
    }
    .our-work-buttons a{
        padding: 10px 15px;
    }
}
@media (max-width: 991px) {
    .our-work-catalog-item{
        width: 33.3%;
        padding: 0 10px;
        margin: 0 0 20px;
    }
    .our-work-catalog{
        margin: 0 -10px;
    }
    .our-work-catalog-item figcaption{
        left: 10px;
        right: 10px;
    }
    .our-work-fancy-wrap .fancybox-inner{
        width: 620px;
    }
    .modal-our-work{
        width: 620px;
        padding: 25px 20px;
    }
    .modal-our-work__inner{
        min-height: 300px;
    }
    .modal-our-work__content{
        padding: 15px 5px 55px;
        font-size: 14px;
    }
    .our-work-fancy-wrap .fancybox-button--arrow_left, 
    .our-work-fancy-wrap .fancybox-button--arrow_right{
        width: 50px;
    }
    .our-work-fancy-wrap .fancybox-button--arrow_left{
        left: -44px;
    }
    .our-work-fancy-wrap .fancybox-button--arrow_right{
        right: -44px;
    }
    .modal-our-work__title{ font-size: 24px; }
}
@media (max-width: 767px) {
    .our-work-card__name{
        /*font-size: 16px;*/
        font-size: 14px;
    }
    .our-work-catalog-item{
        width: 50%;
    }
    .our-work-catalog-item figcaption{
        position: relative;
        top: inherit;
        right: inherit;
        left: inherit;
        display: block;
        border-color: #f2f2f2;
    }
    .our-work-card__text{
        display: none;
    }
    .our-work-card{
        border-radius: 5px 5px 0 0;
        border-bottom: none;
    }
    .our-work-catalog-item:hover figcaption{
        border-color: #C10016;
    }
    .our-work-catalog-item figcaption .our-work-buttons{
        margin: 0;
        padding: 20px 0;
    }
    .our-work-fancy-wrap .fancybox-inner{
        width: 450px;
    }
    .modal-our-work{
        width: 450px;
        padding: 15px 10px;
    }
    .modal-our-work__inner{
        min-height: inherit;
        position: relative;
        display: block;
        padding: 0 0 55px;
    }
    .modal-our-work__content{
        position: static;
        padding: 0 5px 15px;
        width: 100%;
        font-size: 12px;
    }
    .modal-our-work__gallery{
        width: 100%;
    }
    .sliderworkThumbs{
        display: none;
    }
    .sliderworkMain .swiper-slide__img{
        padding: 50% 0 0 0;
    }
    .sliderworkMain .swiper-slide__img img{
        object-fit: contain;
    }
    .modal-our-work__title{
        font-size: 18px;
        margin: 0 0 10px;
    }
    .modal-our-work__content .our-work-buttons{
        right: 0;
    }
    .modal-our-work__content .our-work-buttons .red-butt{
        min-width: 170px;
        padding: 14px 10px;
        font-size: 14px;
        margin: 0 auto;
    }
    .our-work-fancy-wrap .fancybox-close-small{
        top: 10px;
        right: 10px;
    }
}
@media (max-width: 576px) {
    .our-work-catalog-item{
        width: 100%;
    }
    .our-work-fancy-wrap .fancybox-inner,
    .modal-our-work{
        width: 350px;
    }
    .our-work-fancy-wrap .fancybox-button--arrow_left, 
    .our-work-fancy-wrap .fancybox-button--arrow_right{
        width: 30px;
    }
    .our-work-fancy-wrap .fancybox-button--arrow_left{
        left: -26px;
    }
    .our-work-fancy-wrap .fancybox-button--arrow_right{
        right: -26px;
    }
    .our-work-fancy-wrap .fancybox-button--arrow_left::after, .our-work-fancy-wrap .fancybox-button--arrow_right::after{
        width: 20px;
        height: 20px;
    }
}
@media (max-width: 420px) {
    .our-work-catalog-item{
        padding: 10px 10px 0;
        margin: 0 0 8px;
    }
    .our-work-fancy-wrap .fancybox-inner,
    .modal-our-work{
        width: 260px;
    }
}
</style>

<!--link href="/local/templates/tdo_shop/js/fancybox/jquery.fancybox.css" type="text/css"  data-template-style="true"  rel="stylesheet" /-->

<div class="container">

<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
	"PATH"       => "",
	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID"    => "s2",
	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	"START_FROM" => "0",
	// Номер пункта, начиная с которого будет построена навигационная цепочка
),
                                  false
); ?>



<h1 class="header_grey">Наши работы. Индивидуальные решения.</h1>


<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"works", 
	array(
		"COMPONENT_TEMPLATE" => "works",
		"IBLOCK_TYPE" => "photos",
		"IBLOCK_ID" => "50",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "MORE_PHOTO",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>

</div>

<script>

    $(".our-work-fancy").fancybox({
        backFocus : false,
        baseClass: "our-work-fancy-wrap",
        infobar : false,
        afterShow : function( instance, current ) {
            $('.sliderworkMain-js').slick('refresh');
            $('.sliderworkThumbs-js').slick('refresh');
            $('.modal-our-work').addClass('close-b');
        },
        beforeShow: function( instance, current ) {
            $('.modal-our-work').removeClass('close-b');
        }
    });

    $('.sliderworkMain-js').slick({
        slidesToShow: 1,
        arrows: false,
        asNavFor: '.sliderworkThumbs-js',
        draggable: false,
        responsive: [
            {
              breakpoint: 767,
              settings: {
                dots: true,
              }
            },
        ]
    });

    $('.sliderworkThumbs-js').slick({
        slidesToShow: 4,
        arrows: false,
        asNavFor: '.sliderworkMain-js',
        focusOnSelect: true,
        draggable: false,
    });

    $('.want-same-btn').on('click', function() {
        var title = $(this).attr('data-title');
        $('.modal-head').text(title);
    })

    $('.hed-tel-but').on('click', function() {
        var title_tel = $(this).attr('data-title');
        $('.modal-head').text(title_tel);
    })

</script>
<!--script src="/local/templates/tdo_shop/js/fancybox/jquery.fancybox.pack.js"></script-->


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>