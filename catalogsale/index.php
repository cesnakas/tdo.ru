<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Распродажа");
$APPLICATION->SetPageProperty('title', 'Распродажа');
$APPLICATION->SetPageProperty('description', 'Распродажа');
$APPLICATION->AddChainItem('Каталог', '/catalog/');
$APPLICATION->AddChainItem('Распродажа');

$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
	"PATH"       => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID"    => "s2",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	"START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
),
                               false
);

global $arrFilter;

$arrFilter['PROPERTY_VYGRUZHAT_NA_SAYT_VALUE'] = 'Да';

?>

	<div class="sort">
		<div class="container">
			<h1 class="text-small-h"><? $APPLICATION->ShowTitle(false); ?></h1>

			<div class="sort-wrap">

				<? $APPLICATION->IncludeComponent(
					"bitrix:catalog.smart.filter",
					"",
					array(
						"IBLOCK_TYPE"           => "CRM_PRODUCT_CATALOG",
						"IBLOCK_ID"             => "26",
						"SECTION_ID"            => "",
						"SHOW_ALL_WO_SECTION"             => "Y",
						"FILTER_NAME"           => "arrFilter",
						"PRICE_CODE"            => array(
							0 => "BASE",
						),
						"CACHE_TYPE"            => "A",
						"CACHE_TIME"            => "36000000",
						"CACHE_GROUPS"          => "Y",
						"SAVE_IN_SESSION"       => "N",
						"FILTER_VIEW_MODE"      => "VERTICAL",
						"XML_EXPORT"            => "N",
						"SECTION_TITLE"         => "NAME",
						"SECTION_DESCRIPTION"   => "DESCRIPTION",
						"HIDE_NOT_AVAILABLE"    => "N",
						"TEMPLATE_THEME"        => "blue",
						"CONVERT_CURRENCY"      => "N",
						"CURRENCY_ID"           => null,
						"SEF_MODE" => "N",
						"SEF_RULE"              => "/catalogsale/filter/#SMART_FILTER_PATH#/",
						"SMART_FILTER_PATH"     => null,
						"PAGER_PARAMS_NAME"     => null,
						"INSTANT_RELOAD"        => "Y",
						"COMPONENT_TEMPLATE"    => "visual_vertical",
						"PREFILTER_NAME"        => "preFilter",
						"DISPLAY_ELEMENT_COUNT" => "Y",
						"SECTION_CODE"          => "",
						"SECTION_CODE_PATH"     => "",
					),
					false
				); ?>

				<div class="sort-goods-wrap">

					<div class="sort-goods-top">
						<?
						//sort variant
						$sortAr                   = [];
						$sortAr['name']           = 'По названию';
						$sortAr['SCALED_PRICE_6'] = 'По цене';
						$sortAr['shows']          = 'По популярности';
						//					$sortAr['sort']           = 'Нет';
						$sortAr['DATE_CREATE'] = 'По новизне';

						$methodAr = [
							'asc',
							'desc',
						];

						//defaults
						$sortDef   = $_SESSION['sort'] ? $_SESSION['sort'] : 'sort';
						$methodDef = $_SESSION['method'] ? $_SESSION['method'] : 'asc';

						$sortCurr   = $_GET["sort"] ? $_GET["sort"] : $sortDef;
						$methodCurr = $_GET["method"] ? $_GET["method"] : $methodDef;

						//if is not sended & not set
						if(!array_key_exists($sortCurr, $sortAr))
						{
							$sortCurr = $sortDef;
						}
						if(!in_array($methodCurr, $methodAr))
						{
							$methodCurr = $methodDef;
						}

						$_SESSION['sort']   = $sortCurr;
						$_SESSION['method'] = $methodCurr;

						$arParams["ELEMENT_SORT_FIELD2"] = $_SESSION['sort'];
						$arParams["ELEMENT_SORT_ORDER2"] = $_SESSION['method'];

						if($methodCurr == 'desc')
						{
							$methodCurr = 'asc';
						}
						else
						{
							$methodCurr = 'desc';
						}


						$request = \Bitrix\Main\Context::getCurrent()->getRequest();
						$action  = $request->get('action');


							global $arrFilter;
							$arrFilter['PROPERTY_PRIZNAK_TOVARA_VALUE'] = 'Распродажа';


						$arParams["ELEMENT_SORT_FIELD"] = 'CATALOG_QUANTITY';
						$arParams["ELEMENT_SORT_ORDER"] = 'desc';

						?>
						<form method="get" class="sort-select-wrap" action="">
							<input type="hidden" name="method" value="<?=$methodCurr?>" />
							<select class="sort-select" name="sort" onchange="this.form.submit()">
								<option value="">Сортировать</option>
								<?
								foreach ($sortAr as $skey => $title)
								{
									$selected = '';
									if($skey == $sortCurr)
									{
//									$selected = 'selected="selected"';
									}
									?>
									<option value="<?=$skey?>" <?=$selected?>><?=$title?></option><?
								}
								?>
							</select>
						</form>

						<?
						$request  = \Bitrix\Main\Context::getCurrent()->getRequest();
						$viewsort = $request->getCookieRaw('viewsort');

						if(empty($viewsort))
						{
							$viewsort = 'viewimage';
						}

						$cssView  = '';
						$cssGrid  = '';
						$cssImage = '';
						switch ($viewsort)
						{
							case 'view':
								$cssView = 'active';
								break;
							case 'view1grid':
								$cssGrid = 'active';
								break;
							case 'viewimage':
							default:
								$cssImage = 'active';
								break;
						}

						?>
						<div class="visual-sort-goods js-visual-sort-goods">
							<div class="ja-set-sort ja-set-sort--view sort-vis_item sort-vis_item__1 <?=$cssView?>"
							     data-style="view"></div>
							<div class="ja-set-sort ja-set-sort--viewimage sort-vis_item sort-vis_item__2 <?=$cssImage?>"
							     data-style="viewimage"></div>
							<div class="ja-set-sort ja-set-sort--view1grid sort-vis_item sort-vis_item__3 <?=$cssGrid?>"
							     data-style="view1grid"></div>
						</div>

						<div data-fancybox data-src="#sort-filter_modal"
						     class="show-filter_btn show-filter_btn--active">

						</div>
					</div>


					<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	".default", 
	array(
		"IBLOCK_TYPE" => "CRM_PRODUCT_CATALOG",
		"IBLOCK_ID" => "26",
		"ELEMENT_SORT_FIELD" => "CATALOG_QUANTITY",
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_FIELD2" => "DATE_CREATE",
		"ELEMENT_SORT_ORDER2" => "desc",
		"PROPERTY_CODE" => "",
		"PROPERTY_CODE_MOBILE" => array(
		),
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"BASKET_URL" => "/personal/order/make/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"FILTER_NAME" => "arrFilter",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"MESSAGE_404" => "",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"FILE_404" => "",
		"DISPLAY_COMPARE" => "N",
		"PAGE_ELEMENT_COUNT" => "24",
		"LINE_ELEMENT_COUNT" => "3",
		"PRICE_CODE" => array(
			0 => "Розница",
		),
		"USE_PRICE_COUNT" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRODUCT_PROPERTIES" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "tdo_nav",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_BASE_LINK" => "",
		"PAGER_PARAMS_NAME" => "",
		"LAZY_LOAD" => "Y",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"LOAD_ON_SCROLL" => "N",
		"OFFERS_CART_PROPERTIES" => "",
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => "",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFERS_LIMIT" => "5",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_URL" => "/catalog/#SECTION_CODE#/",
		"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"CONVERT_CURRENCY" => "N",
		"CURRENCY_ID" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"LABEL_PROP" => array(
		),
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":{\"1\":{\"CLASS_ID\":\"CondIBProp:26:200\",\"DATA\":{\"logic\":\"Equal\",\"value\":48626}},\"3\":{\"CLASS_ID\":\"CondIBProp:26:138\",\"DATA\":{\"logic\":\"Equal\",\"value\":47897}}}}",
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"ENLARGE_PRODUCT" => "STRICT",
		"ENLARGE_PROP" => "",
		"SHOW_SLIDER" => "N",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"OFFER_ADD_PICT_PROP" => "-",
		"OFFER_TREE_PROPS" => "",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_MAX_QUANTITY" => "N",
		"MESS_SHOW_MAX_QUANTITY" => "",
		"RELATIVE_QUANTITY_FACTOR" => "",
		"MESS_RELATIVE_QUANTITY_MANY" => "",
		"MESS_RELATIVE_QUANTITY_FEW" => "",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_BTN_COMPARE" => "Сравнение",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"DATA_LAYER_NAME" => "",
		"BRAND_PROPERTY" => "",
		"TEMPLATE_THEME" => "blue",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"SHOW_CLOSE_POPUP" => "N",
		"COMPARE_PATH" => "/catalog/compare/",
		"COMPARE_NAME" => "",
		"USE_COMPARE_LIST" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"COMPATIBLE_MODE" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_ALL_WO_SECTION" => "Y",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"RCM_TYPE" => "personal",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"SHOW_FROM_SECTION" => "N",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y"
	),
	false
); ?>


				</div>
			</div>
		</div>
	</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>