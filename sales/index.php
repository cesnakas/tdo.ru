<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description",
                              "Успейте купить фигурки FUNKO POP, комиксы и атрибутику из игр, сериалов, фильмов и аниме с огромными скидками по низкой цене!");
$APPLICATION->SetPageProperty("title",
                              "Распродажа фигурок FUNKO POP, комиксов и атрибутики из игр, сериалов, фильмов и аниме");
$APPLICATION->AddChainItem("Распродажа", "/sale/");


$APPLICATION->SetPageProperty("show_sections", "Y"); // для  разделов  в фильтре


global $preFilter;
$preFilter = ["PROPERTY_RASPRODAZHNAYA_POZITSIYA_ROZNITSA" => "12380"];

?>
	<link href="<?=SITE_TEMPLATE_PATH?>/new_design_files/css/price_slider_css/jquery-ui-1.9.2.custom.css"
	      rel="stylesheet">
	<!-- Range slider -->
	<div class="catalog-page main-section-catalog inner-section-container">
	<div class="container container-title">
		<h1 class="title-global" data-title="<?php echo $APPLICATION->ShowTitle(true) ?>">
			<?php echo $APPLICATION->ShowTitle(true) ?>
		</h1>
	</div>
	<div class="container container-catalog">
	<div class="catalog-page-content">


		<? /// filter?>
		<div class="filter-panel-mobile" id="filter-panel-mobile"></div>
		<div class="filter-mask"></div>


		<div class="filters-block">


			<h3>Фильтр</h3>

			<?
			$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter", 
	"visual_vertical",
	array(
				"IBLOCK_ID" => "26",
				"IBLOCK_TYPE" => "CRM_PRODUCT_CATALOG",
				"SECTION_ID" => "",
				"SHOW_ALL_WO_SECTION" => "Y",
				"FILTER_NAME" => "arrFilter",
				"PREFILTER_NAME" => "preFilter",
				"PRICE_CODE" => array(
					0 => "BASE",
					1 => "Розница распродажа",
				),
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"SAVE_IN_SESSION" => "N",
				"FILTER_VIEW_MODE" => "vertical",
				"XML_EXPORT" => "N",
				"SECTION_TITLE" => "NAME",
				"SECTION_DESCRIPTION" => "DESCRIPTION",
				"HIDE_NOT_AVAILABLE" => "N",
				"SEF_MODE" => "N",
				"SEF_RULE" => "/salet/filter/#SMART_FILTER_PATH#/apply/",
				"SMART_FILTER_PATH" => null,
				"PAGER_PARAMS_NAME" => null,
				"COMPONENT_TEMPLATE" => ".default",
				"SECTION_CODE" => "",
				"TEMPLATE_THEME" => "blue",
				"POPUP_POSITION" => "left",
				"DISPLAY_ELEMENT_COUNT" => "Y",
				"CONVERT_CURRENCY" => "N"
			),
	false
);
			?>


		</div><!--./filters-block-->


		<? /// !filter?>

		<? //////////////section?>

		<div class="catalog-block">
			<div class="catalog-block-header" STYLE="border: none !important;">
				<div class="catalog-block-title">
					<?php echo $APPLICATION->ShowTitle(true) ?>
				</div>
				<div class="show-filter-btn">
					Фильтр
				</div>


				<div class="catalog-selectors-block">
					<div class="catalog-selector-wrap">
						<form role="form" id="price_sort" method="post">
							<div class="select-block sort-mod">
								<div class="selected-value" name="sort">
									<?
									if(empty($_GET["sort"]))
									{ ?> Сначала дешевле<? }
									elseif($_GET["sort"] == "catalog_price_7-asc")
									{
										?>Сначала дешевле <? }
									else
									{
										?>                                            Сначала дороже
									<? } ?>
								</div>
								<ul class="ul-select">
									<li data-value="catalog_price_7-asc"
									    <? if($_GET["sort"] == "catalog_price_7-asc") { ?>selected<? } ?>>
										Сначала дешевле
									</li>
									<li data-value="catalog_price_7-desc"
									    <? if($_GET["sort"] == "catalog_price_7-desc") { ?>selected<? } ?>>
										Сначала дороже
									</li>
								</ul>
							</div>
						</form>
					</div>
					<div class="catalog-selector-wrap">
						<p>Показать:</p>
						<form role="form" id="form_limit" method="post">
							<div class="select-block limit-mod">
								<div class="selected-value" name="limit">
									<?
									if(empty($_GET["limit"]))
									{ ?> 20<? }
									else
									{
										echo $_GET["limit"];
									} ?> </div>
								<ul class="ul-select">
									<li data-value="20" <? if($_GET['limit'] == 20) { ?>selected<? } ?>>
										20
									</li>
									<li data-value="30" <? if($_GET['limit'] == 30) { ?>selected<? } ?>>
										30
									</li>
									<li data-value="40" <? if($_GET['limit'] == 40) { ?>selected<? } ?>>
										40
									</li>
									<li data-value="50" <? if($_GET['limit'] == 50) { ?>selected<? } ?>>
										50
									</li>
									<li data-value="100" <? if($_GET['limit'] == 100) { ?>selected<? } ?>>
										100
									</li>
								</ul>
							</div>
						</form>
					</div>
				</div>

			</div>


			<? //section?>

			<?
			if($_GET["sort"])
			{
				$sort                           = explode("-", $_GET["sort"]);
				$arParams["ELEMENT_SORT_FIELD"] = strtoupper($sort[0]);
				$arParams["ELEMENT_SORT_ORDER"] = $sort[1];
			}
			else
			{
				$arParams["ELEMENT_SORT_FIELD"] = 'CATALOG_PRICE_7';
				$arParams["ELEMENT_SORT_ORDER"] = 'ASC';
			}

			if($_GET["limit"])
			{
				$arParams["PAGE_ELEMENT_COUNT"] = (int)$_GET["limit"];
			}
			else
			{
				$arParams["PAGE_ELEMENT_COUNT"] = "20";
			}
			//			$arrFilter["PROPERTY_RASPRODAZHNAYA_POZITSIYA_ROZNITSA"] = "12380";
			//			$arrFilter[">CATALOG_PRICE_7"]                           = 0;
			?>

			<?
			$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				'',
				array(
					"ACTION_VARIABLE"                 => "action",
					"ADD_PICT_PROP"                   => "-",
					"ADD_PROPERTIES_TO_BASKET"        => "Y",
					"ADD_SECTIONS_CHAIN"              => "N",
					"ADD_TO_BASKET_ACTION"            => "ADD",
					"AJAX_MODE"                       => "N",
					"AJAX_OPTION_ADDITIONAL"          => "",
					"AJAX_OPTION_HISTORY"             => "N",
					"AJAX_OPTION_JUMP"                => "N",
					"AJAX_OPTION_STYLE"               => "Y",
					"BACKGROUND_IMAGE"                => "-",
					"BASKET_URL"                      => "/personal/basket.php",
					"BROWSER_TITLE"                   => "-",
					"CACHE_FILTER"                    => "N",
					"CACHE_GROUPS"                    => "Y",
					"CACHE_TIME"                      => "36000000",
					"CACHE_TYPE"                      => "A",
					"COMPATIBLE_MODE"                 => "Y",
					"CONVERT_CURRENCY"                => "N",
					"DETAIL_URL"                      => "",
					"DISABLE_INIT_JS_IN_COMPONENT"    => "N",
					"DISPLAY_BOTTOM_PAGER"            => "Y",
					"DISPLAY_COMPARE"                 => "N",
					"DISPLAY_TOP_PAGER"               => "N",
					"ELEMENT_SORT_FIELD"              => $arParams["ELEMENT_SORT_FIELD"],
					"ELEMENT_SORT_FIELD2"             => "id",
					"ELEMENT_SORT_ORDER"              => $arParams["ELEMENT_SORT_ORDER"],
					"ELEMENT_SORT_ORDER2"             => "desc",
					"ENLARGE_PRODUCT"                 => "STRICT",
					"FILTER_NAME"                     => "arrFilter",
					"HIDE_NOT_AVAILABLE"              => "N",
					"HIDE_NOT_AVAILABLE_OFFERS"       => "N",
					"IBLOCK_ID"                       => "26",
					"IBLOCK_TYPE"                     => "1c_catalog",
					"INCLUDE_SUBSECTIONS"             => "Y",
					"LABEL_PROP"                      => array(),
					"LAZY_LOAD"                       => "N",
					"LINE_ELEMENT_COUNT"              => "3",
					"LOAD_ON_SCROLL"                  => "N",
					"MESSAGE_404"                     => "",
					"MESS_BTN_ADD_TO_BASKET"          => "В корзину",
					"MESS_BTN_BUY"                    => "Купить",
					"MESS_BTN_DETAIL"                 => "Подробнее",
					"MESS_BTN_SUBSCRIBE"              => "Подписаться",
					"MESS_NOT_AVAILABLE"              => "Нет в наличии",
					"META_DESCRIPTION"                => "-",
					"META_KEYWORDS"                   => "-",
					"OFFERS_CART_PROPERTIES"          => "",
					"OFFERS_FIELD_CODE"               => array(
						0 => "",
						1 => "",
					),
					"OFFERS_LIMIT"                    => "5",
					"OFFERS_PROPERTY_CODE"            => array(
						0 => "",
						1 => "",
					),
					"OFFERS_SORT_FIELD"               => "sort",
					"OFFERS_SORT_FIELD2"              => "id",
					"OFFERS_SORT_ORDER"               => "asc",
					"OFFERS_SORT_ORDER2"              => "desc",
					"PAGER_BASE_LINK_ENABLE"          => "N",
					"PAGER_DESC_NUMBERING"            => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL"                  => "N",
					"PAGER_SHOW_ALWAYS"               => "N",
					"PAGER_TEMPLATE"                  => "forum",
					"PAGER_TITLE"                     => "Товары",
					"PAGE_ELEMENT_COUNT"              => $arParams["PAGE_ELEMENT_COUNT"],
					"PARTIAL_PRODUCT_PROPERTIES"      => "N",
					"PRICE_CODE"                      => array(
						0 => "Распродажный прайс РОЗНИЦА",
						1 => "Типовое розница",
					),
					"PRICE_VAT_INCLUDE"               => "Y",
					"PRODUCT_BLOCKS_ORDER"            => "price,props,sku,quantityLimit,quantity,buttons",
					"PRODUCT_DISPLAY_MODE"            => "N",
					"PRODUCT_ID_VARIABLE"             => "id",
					"PRODUCT_PROPERTIES"              => array(),
					"PRODUCT_PROPS_VARIABLE"          => "prop",
					"PRODUCT_QUANTITY_VARIABLE"       => "quantity",
					"PRODUCT_ROW_VARIANTS"            => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
					"PRODUCT_SUBSCRIPTION"            => "Y",
					"PROPERTY_CODE"                   => array(
						0 => "FRANSHIZA_RU",
						1 => "FRANSHIZA_EN",
						2 => "",
					),
					"PROPERTY_CODE_MOBILE"            => array(),
					"RCM_PROD_ID"                     => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE"                        => "personal",
					"SECTION_CODE"                    => "",
					"SECTION_CODE_PATH"               => "",
					"SECTION_ID"                      => [
						361,
						362,
					],
					"SECTION_ID_VARIABLE"             => "SECTION_ID",
					"SECTION_URL"                     => "",
					"SECTION_USER_FIELDS"             => array(
						0 => "",
						1 => "",
					),
					"SEF_MODE"                        => "N",
					"SEF_RULE"                        => "",
					"SET_BROWSER_TITLE"               => "N",
					"SET_LAST_MODIFIED"               => "N",
					"SET_META_DESCRIPTION"            => "Y",
					"SET_META_KEYWORDS"               => "Y",
					"SET_STATUS_404"                  => "N",
					"SET_TITLE"                       => "N",
					"SHOW_404"                        => "N",
					"SHOW_ALL_WO_SECTION"             => "N",
					"SHOW_CLOSE_POPUP"                => "N",
					"SHOW_DISCOUNT_PERCENT"           => "N",
					"SHOW_FROM_SECTION"               => "N",
					"SHOW_MAX_QUANTITY"               => "N",
					"SHOW_OLD_PRICE"                  => "N",
					"SHOW_PRICE_COUNT"                => "1",
					"SHOW_SLIDER"                     => "Y",
					"SLIDER_INTERVAL"                 => "3000",
					"SLIDER_PROGRESS"                 => "N",
					"TEMPLATE_THEME"                  => "blue",
					"USE_ENHANCED_ECOMMERCE"          => "N",
					"USE_MAIN_ELEMENT_SECTION"        => "N",
					"USE_PRICE_COUNT"                 => "N",
					"USE_PRODUCT_QUANTITY"            => "N",
					"COMPONENT_TEMPLATE"              => "toys_novinli",
					"CUSTOM_FILTER"                   => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
				),
				false
			);
			?>


		</div>
	</div>

	<script src="<?=SITE_TEMPLATE_PATH?>/new_design_files/js/price_slider_js/jquery-1.8.3.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/new_design_files/js/price_slider_js/jquery-ui-1.9.2.custom.js"></script>
	<script type="text/javascript"
	        src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/new_design_files/js/hammer.js"></script>

	<script>
        $(document).ready(function () {

            $('#form_limit li').click(function () {
                var sort = "<?=$_GET['sort']?>";
                var url = "<?$APPLICATION->GetCurUri()?>";
                var limit = $(this).attr("data-value");
                console.log(limit);
                if (sort) {
                    window.location.href = url + "?sort=" + sort + "&limit=" + limit;
                } else {
                    window.location.href = url + "?limit=" + limit;
                }
            });
            $('#price_sort li').click(function () {
                var limit = "<?=$_GET['limit']?>";
                var url = "<?$APPLICATION->GetCurUri()?>";
                var sort = $(this).attr("data-value");
                ;
                if (limit) {
                    window.location.href = url + "?sort=" + sort + "&limit=" + limit;
                } else {
                    window.location.href = url + "?sort=" + sort;
                }
            });
        });
	</script>


	<script>
        $(document).ready(function () {

            var filter_b = document.querySelector(".filter-panel-mobile");
            var filter_b_m = document.querySelector(".filters-mobile-nav-block");

            Hammer(filter_b).on("swipeleft", function () {
                $('.filter-mask').addClass('active');
                $('.filters-block').addClass('show');
                $('.header').css('z-index', '0');
                $('#filter-panel-mobile').addClass('active');
            });

            Hammer(filter_b).on("tap", function () {
                $('.filter-mask').removeClass('active');
                $('.filters-block').removeClass('show');

                function h_close_c() {
                    $('#filter-panel-mobile').removeClass('active');
                }

                setTimeout(h_close_c, 100);

                function explode() {
                    $('.header').css('z-index', '6')
                }

                setTimeout(explode, 300);
            });

            Hammer(filter_b).on("swiperight", function () {
                $('.filter-mask').removeClass('active');
                $('.filters-block').removeClass('show');
                $('#filter-panel-mobile').removeClass('active');

                function explode() {
                    $('.header').css('z-index', '6')
                }

                setTimeout(explode, 300);
            });

            Hammer(filter_b_m).on("swiperight", function () {
                $('.filter-mask').removeClass('active');
                $('.filters-block').removeClass('show');
                $('#filter-panel-mobile').removeClass('active');

                function explode() {
                    $('.header').css('z-index', '6')
                }

                setTimeout(explode, 300);
            });


        });
	</script>
<? $APPLICATION->SetTitle("Распродажа"); ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>