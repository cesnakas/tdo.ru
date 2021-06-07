<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$strSectionEdit        = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete      = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));


$sectionFilter = [];
?>
    <div class="catalog">
        <div class="inner-page_main-screen inner-page_main-screen-cat-item">
            <div class="container">
	            <?
	            /*
	             ?>
                <div style="background-image: url(/local/templates/tdo_shop/img/catitemimg.png);" class="inner-page_main-screen-img">

                </div>
	            <?
	             */
	            ?>

                <div class="inner-page_main-screen-content">
                    <div class="inner-page_main-screen-content_head"><?=$arResult['SECTION']['NAME']?></div>

                    <div class="inner-page_main-screen-content_trig-wrap"><?
	                    global $sectionHaveSale;
	                    if ($sectionHaveSale) {
	                        ?><a class="big-trig-item big-trig-item-sale" href="?action=sale">Скидки</a><?
	                    }
	                    ?>

                        <a class="big-trig-item big-trig-item-new" href="?method=desc&sort=DATE_CREATE">Новинки</a>
                        <a class="big-trig-item big-trig-item-populare" href="?method=desc&sort=shows">Популярные товары</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="catalog-elem-content">
            <div class="container">
                <div class="cat-wrap">
					<?
					$mainCats  = [];
					$childCats = [];
					$mainCatId = 0;
					foreach ($arResult['SECTIONS'] as &$arSection) {
						switch ($arSection['RELATIVE_DEPTH_LEVEL']) {
							case 1:
								$mainCats[] = $arSection;
								$mainCatId  = $arSection['ID'];
								break;
							default:
								$childCats[ $mainCatId ][] = $arSection;
								break;
						}
					}

					$intCurrentDepth = 1;
					foreach ($mainCats as &$arSection) {
						$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
						$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

						$mainCatId = $arSection['ID'];

						$sectionFilter[] = $mainCatId;

						$imageSrc = $this->GetFolder() . '/images/line-empty.png';
						if(!empty($arSection["PICTURE"]["SRC"])) {
							$image    = CIntranetUtils::InitImage($arSection["PICTURE"]["ID"], 120, 140);
							$imageSrc = $image['CACHE']['src'];
						}

						?>
                        <a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="cat-item" style="background-image: url('<?=$imageSrc?>');"
                           id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                            <span class="cat-item_head"><?=$arSection["NAME"]?></span>
                            <div class="cat-item_arrow"></div>
                        </a>
					<? } ?>
                </div>

				<?
				global $arrFilter;
				$arrFilter['PROPERTY_VYGRUZHAT_NA_SAYT_VALUE'] = 'Да';


				$arParams["FOLDER"]        = "/catalog/";
				$arParams["URL_TEMPLATES"] = array(
					"sections"     => "",
					"section"      => "#SECTION_CODE_PATH#/",
					"element"      => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
					"compare"      => "compare.php?action=#ACTION_CODE#",
					"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
				);

				$arParams['PRICE_CODE']           = array(
					0 => "Розница распродажа",
					1 => "Розница",
				);
				$arParams["USE_PRICE_COUNT"]      = "N";
				$arParams["SHOW_PRICE_COUNT"]      = "1";

				//вывод товаров только из родительского раздела
				//Популярные товары
				$APPLICATION->IncludeComponent(
					'bitrix:catalog.section',
					'popular_prod',
					$settings = array(
						'IBLOCK_TYPE'               => $arParams['IBLOCK_TYPE'],
						'IBLOCK_ID'                 => $arParams['IBLOCK_ID'],
						'SECTION_ID'                => $arResult['SECTION']['ID'],
						'SECTION_CODE'              => $arResult['VARIABLES']['SECTION_CODE'],
						'ELEMENT_SORT_FIELD'        => 'shows',
						'ELEMENT_SORT_ORDER'        => 'desc',
						'ELEMENT_SORT_FIELD2'       => 'sort',
						'ELEMENT_SORT_ORDER2'       => 'asc',
						'PROPERTY_CODE'             => (isset($arParams['LIST_PROPERTY_CODE']) ? $arParams['LIST_PROPERTY_CODE'] : []),
						'PROPERTY_CODE_MOBILE'      => $arParams['LIST_PROPERTY_CODE_MOBILE'],
						'INCLUDE_SUBSECTIONS'       => $arParams['INCLUDE_SUBSECTIONS'],
						'BASKET_URL'                => $arParams['BASKET_URL'],
						'ACTION_VARIABLE'           => $arParams['ACTION_VARIABLE'],
						'PRODUCT_ID_VARIABLE'       => $arParams['PRODUCT_ID_VARIABLE'],
						'SECTION_ID_VARIABLE'       => $arParams['SECTION_ID_VARIABLE'],
						'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
						'PRODUCT_PROPS_VARIABLE'    => $arParams['PRODUCT_PROPS_VARIABLE'],
						'CACHE_TYPE'                => $arParams['CACHE_TYPE'],
						'CACHE_TIME'                => $arParams['CACHE_TIME'],
						'CACHE_FILTER'              => $arParams['CACHE_FILTER'],
						'CACHE_GROUPS'              => $arParams['CACHE_GROUPS'],
						'DISPLAY_COMPARE'           => $arParams['USE_COMPARE'],
						'PRICE_CODE'                => $arParams['PRICE_CODE'],
						'USE_PRICE_COUNT'           => $arParams['USE_PRICE_COUNT'],
						'SHOW_PRICE_COUNT'          => $arParams['SHOW_PRICE_COUNT'],
						'PAGE_ELEMENT_COUNT'        => 20,
						'FILTER_IDS'                => '',

						"SET_TITLE"            => "N",
						"SET_BROWSER_TITLE"    => "N",
						"SET_META_KEYWORDS"    => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_LAST_MODIFIED"    => "N",
						"ADD_SECTIONS_CHAIN"   => "N",

						'PRICE_VAT_INCLUDE'          => $arParams['PRICE_VAT_INCLUDE'],
						'USE_PRODUCT_QUANTITY'       => $arParams['USE_PRODUCT_QUANTITY'],
						'ADD_PROPERTIES_TO_BASKET'   => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
						'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
						'PRODUCT_PROPERTIES'         => (isset($arParams['PRODUCT_PROPERTIES']) ? $arParams['PRODUCT_PROPERTIES'] : []),

						'OFFERS_CART_PROPERTIES' => (isset($arParams['OFFERS_CART_PROPERTIES']) ? $arParams['OFFERS_CART_PROPERTIES'] : []),
						'OFFERS_FIELD_CODE'      => $arParams['LIST_OFFERS_FIELD_CODE'],
						'OFFERS_PROPERTY_CODE'   => (isset($arParams['LIST_OFFERS_PROPERTY_CODE']) ? $arParams['LIST_OFFERS_PROPERTY_CODE'] : []),
						'OFFERS_SORT_FIELD'      => $arParams['OFFERS_SORT_FIELD'],
						'OFFERS_SORT_ORDER'      => $arParams['OFFERS_SORT_ORDER'],
						'OFFERS_SORT_FIELD2'     => $arParams['OFFERS_SORT_FIELD2'],
						'OFFERS_SORT_ORDER2'     => $arParams['OFFERS_SORT_ORDER2'],
						'OFFERS_LIMIT'           => (isset($arParams['LIST_OFFERS_LIMIT']) ? $arParams['LIST_OFFERS_LIMIT'] : 0),

						'SECTION_URL'               => $arParams['FOLDER'] . $arParams['URL_TEMPLATES']['section'],
						'DETAIL_URL'                => $arParams['FOLDER'] . $arParams['URL_TEMPLATES']['element'],
						'USE_MAIN_ELEMENT_SECTION'  => $arParams['USE_MAIN_ELEMENT_SECTION'],
						'CONVERT_CURRENCY'          => $arParams['CONVERT_CURRENCY'],
						'CURRENCY_ID'               => $arParams['CURRENCY_ID'],
						'HIDE_NOT_AVAILABLE'        => 'Y',
						'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',

						'LABEL_PROP'           => $arParams['LABEL_PROP'],
						'LABEL_PROP_MOBILE'    => $arParams['LABEL_PROP_MOBILE'],
						'LABEL_PROP_POSITION'  => $arParams['LABEL_PROP_POSITION'],
						'ADD_PICT_PROP'        => $arParams['ADD_PICT_PROP'],
						'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
						'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
						'PRODUCT_ROW_VARIANTS' => "[{'VARIANT':'3','BIG_DATA':false}]",
						'ENLARGE_PRODUCT'      => $arParams['LIST_ENLARGE_PRODUCT'],
						'ENLARGE_PROP'         => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
						'SHOW_SLIDER'          => $arParams['LIST_SHOW_SLIDER'],
						'SLIDER_INTERVAL'      => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
						'SLIDER_PROGRESS'      => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

						'DISPLAY_TOP_PAGER'        => 'N',
						'DISPLAY_BOTTOM_PAGER'     => 'N',
						'HIDE_SECTION_DESCRIPTION' => 'Y',

						'RCM_TYPE'          => isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : '',
						'RCM_PROD_ID'       => $elementId,
						'SHOW_FROM_SECTION' => 'Y',

						'OFFER_ADD_PICT_PROP'         => $arParams['OFFER_ADD_PICT_PROP'],
						'OFFER_TREE_PROPS'            => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
						'PRODUCT_SUBSCRIPTION'        => $arParams['PRODUCT_SUBSCRIPTION'],
						'SHOW_DISCOUNT_PERCENT'       => $arParams['SHOW_DISCOUNT_PERCENT'],
						'DISCOUNT_PERCENT_POSITION'   => $arParams['DISCOUNT_PERCENT_POSITION'],
						'SHOW_OLD_PRICE'              => $arParams['SHOW_OLD_PRICE'],
						'SHOW_MAX_QUANTITY'           => $arParams['SHOW_MAX_QUANTITY'],
						'MESS_SHOW_MAX_QUANTITY'      => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
						'RELATIVE_QUANTITY_FACTOR'    => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
						'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
						'MESS_RELATIVE_QUANTITY_FEW'  => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
						'MESS_BTN_BUY'                => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
						'MESS_BTN_ADD_TO_BASKET'      => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
						'MESS_BTN_SUBSCRIBE'          => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
						'MESS_BTN_DETAIL'             => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
						'MESS_NOT_AVAILABLE'          => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
						'MESS_BTN_COMPARE'            => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

						'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
						'DATA_LAYER_NAME'        => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
						'BRAND_PROPERTY'         => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

						'TEMPLATE_THEME'               => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
						'ADD_TO_BASKET_ACTION'         => $basketAction,
						'SHOW_CLOSE_POPUP'             => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
						'COMPARE_PATH'                 => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
						'COMPARE_NAME'                 => $arParams['COMPARE_NAME'],
						'BACKGROUND_IMAGE'             => '',
						'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),
					),
					$component
				);
				

				
				?>


				<?
				$arParams['SHOW_OLD_PRICE']       = 'Y';
				$arParams['PRODUCT_DISPLAY_MODE'] = 'Y';
				$arParams['PRICE_VAT_INCLUDE']    = 'N';
				$arParams['PRICE_CODE']           = array(
					0 => "Розница распродажа",
					1 => "Розница",
				);
				$arParams["SHOW_OLD_PRICE"]       = "Y";
				$arParams["SHOW_PRICE_COUNT"]     = "";
				$arParams["USE_PRICE_COUNT"]      = "N";

				$arParams["FOLDER"]        = "/catalog/";
				$arParams["URL_TEMPLATES"] = array(
					"sections"     => "",
					"section"      => "#SECTION_CODE_PATH#/",
					"element"      => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
					"compare"      => "compare.php?action=#ACTION_CODE#",
					"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
				);

				global $arrFilter, $USER; //где arrFilter - название фильтра
				$IBLOCK_ID  = $arParams['IBLOCK_ID'];
				$SECTION_ID = $arResult['SECTION']['ID'];

				$sectionFilter[] = $SECTION_ID;

				$arElements = sortBySale::getFull(
					array(
						"IBLOCK_ID"         => $IBLOCK_ID,
						"SECTION_ID"        => $sectionFilter,
						'ACTIVE'            => "Y",
						'CATALOG_AVAILABLE' => "Y",
					),
					$arSelect = array()
				);

				if(isset($arElements['IDS']) && !empty($arElements['IDS'])) {
					$GLOBALS["arrFilterSale"] = array("ID" => $arElements['IDS']);

					//Скидки
					$APPLICATION->IncludeComponent(
						'bitrix:catalog.section',
						'sales',
						array(
							'IBLOCK_TYPE'               => $arParams['IBLOCK_TYPE'],
							'IBLOCK_ID'                 => $arParams['IBLOCK_ID'],
							'SECTION_ID'                => $arResult['SECTION']['ID'],
							'SECTION_CODE'              => $arResult['VARIABLES']['SECTION_CODE'],
							"FILTER_NAME"               => "arrFilterSale",
							"ELEMENT_SORT_FIELD"        => "sort",
							"ELEMENT_SORT_FIELD2"       => "sort",
							"ELEMENT_SORT_ORDER"        => "asc",
							"ELEMENT_SORT_ORDER2"       => "asc",
							'PROPERTY_CODE'             => (isset($arParams['LIST_PROPERTY_CODE']) ? $arParams['LIST_PROPERTY_CODE'] : []),
							'PROPERTY_CODE_MOBILE'      => $arParams['LIST_PROPERTY_CODE_MOBILE'],
							'INCLUDE_SUBSECTIONS'       => $arParams['INCLUDE_SUBSECTIONS'],
							'BASKET_URL'                => $arParams['BASKET_URL'],
							'ACTION_VARIABLE'           => $arParams['ACTION_VARIABLE'],
							'PRODUCT_ID_VARIABLE'       => $arParams['PRODUCT_ID_VARIABLE'],
							'SECTION_ID_VARIABLE'       => $arParams['SECTION_ID_VARIABLE'],
							'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
							'PRODUCT_PROPS_VARIABLE'    => $arParams['PRODUCT_PROPS_VARIABLE'],
							'CACHE_TYPE'                => $arParams['CACHE_TYPE'],
							'CACHE_TIME'                => $arParams['CACHE_TIME'],
							'CACHE_FILTER'              => $arParams['CACHE_FILTER'],
							'CACHE_GROUPS'              => $arParams['CACHE_GROUPS'],
							'DISPLAY_COMPARE'           => $arParams['USE_COMPARE'],
							'PRICE_CODE'                => $arParams['PRICE_CODE'],
							'USE_PRICE_COUNT'           => $arParams['USE_PRICE_COUNT'],
							'SHOW_PRICE_COUNT'          => $arParams['SHOW_PRICE_COUNT'],
							'PAGE_ELEMENT_COUNT'        => 20,
							'FILTER_IDS'                => array($elementId),

							"SET_TITLE"            => "N",
							"SET_BROWSER_TITLE"    => "N",
							"SET_META_KEYWORDS"    => "N",
							"SET_META_DESCRIPTION" => "N",
							"SET_LAST_MODIFIED"    => "N",
							"ADD_SECTIONS_CHAIN"   => "N",

							'PRICE_VAT_INCLUDE'          => $arParams['PRICE_VAT_INCLUDE'],
							'USE_PRODUCT_QUANTITY'       => $arParams['USE_PRODUCT_QUANTITY'],
							'ADD_PROPERTIES_TO_BASKET'   => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
							'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
							'PRODUCT_PROPERTIES'         => (isset($arParams['PRODUCT_PROPERTIES']) ? $arParams['PRODUCT_PROPERTIES'] : []),

							'OFFERS_CART_PROPERTIES' => (isset($arParams['OFFERS_CART_PROPERTIES']) ? $arParams['OFFERS_CART_PROPERTIES'] : []),
							'OFFERS_FIELD_CODE'      => $arParams['LIST_OFFERS_FIELD_CODE'],
							'OFFERS_PROPERTY_CODE'   => (isset($arParams['LIST_OFFERS_PROPERTY_CODE']) ? $arParams['LIST_OFFERS_PROPERTY_CODE'] : []),
							'OFFERS_SORT_FIELD'      => $arParams['OFFERS_SORT_FIELD'],
							'OFFERS_SORT_ORDER'      => $arParams['OFFERS_SORT_ORDER'],
							'OFFERS_SORT_FIELD2'     => $arParams['OFFERS_SORT_FIELD2'],
							'OFFERS_SORT_ORDER2'     => $arParams['OFFERS_SORT_ORDER2'],
							'OFFERS_LIMIT'           => (isset($arParams['LIST_OFFERS_LIMIT']) ? $arParams['LIST_OFFERS_LIMIT'] : 0),

							'SECTION_URL'               => $arParams['FOLDER'] . $arParams['URL_TEMPLATES']['section'],
							'DETAIL_URL'                => $arParams['FOLDER'] . $arParams['URL_TEMPLATES']['element'],
							'USE_MAIN_ELEMENT_SECTION'  => $arParams['USE_MAIN_ELEMENT_SECTION'],
							'CONVERT_CURRENCY'          => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID'               => $arParams['CURRENCY_ID'],
							'HIDE_NOT_AVAILABLE'        => $arParams['HIDE_NOT_AVAILABLE'],
							'HIDE_NOT_AVAILABLE_OFFERS' => $arParams['HIDE_NOT_AVAILABLE_OFFERS'],

							'LABEL_PROP'           => $arParams['LABEL_PROP'],
							'LABEL_PROP_MOBILE'    => $arParams['LABEL_PROP_MOBILE'],
							'LABEL_PROP_POSITION'  => $arParams['LABEL_PROP_POSITION'],
							'ADD_PICT_PROP'        => $arParams['ADD_PICT_PROP'],
							'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
							'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
							'PRODUCT_ROW_VARIANTS' => "[{'VARIANT':'3','BIG_DATA':false}]",
							'ENLARGE_PRODUCT'      => $arParams['LIST_ENLARGE_PRODUCT'],
							'ENLARGE_PROP'         => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
							'SHOW_SLIDER'          => $arParams['LIST_SHOW_SLIDER'],
							'SLIDER_INTERVAL'      => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
							'SLIDER_PROGRESS'      => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

							'DISPLAY_TOP_PAGER'        => 'N',
							'DISPLAY_BOTTOM_PAGER'     => 'N',
							'HIDE_SECTION_DESCRIPTION' => 'Y',

							'RCM_TYPE'          => isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : '',
							'RCM_PROD_ID'       => $elementId,
							'SHOW_FROM_SECTION' => 'Y',

							'OFFER_ADD_PICT_PROP'         => $arParams['OFFER_ADD_PICT_PROP'],
							'OFFER_TREE_PROPS'            => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
							'PRODUCT_SUBSCRIPTION'        => $arParams['PRODUCT_SUBSCRIPTION'],
							'SHOW_DISCOUNT_PERCENT'       => $arParams['SHOW_DISCOUNT_PERCENT'],
							'DISCOUNT_PERCENT_POSITION'   => $arParams['DISCOUNT_PERCENT_POSITION'],
							'SHOW_OLD_PRICE'              => $arParams['SHOW_OLD_PRICE'],
							'SHOW_MAX_QUANTITY'           => $arParams['SHOW_MAX_QUANTITY'],
							'MESS_SHOW_MAX_QUANTITY'      => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
							'RELATIVE_QUANTITY_FACTOR'    => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
							'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
							'MESS_RELATIVE_QUANTITY_FEW'  => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
							'MESS_BTN_BUY'                => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
							'MESS_BTN_ADD_TO_BASKET'      => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
							'MESS_BTN_SUBSCRIBE'          => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
							'MESS_BTN_DETAIL'             => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
							'MESS_NOT_AVAILABLE'          => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
							'MESS_BTN_COMPARE'            => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

							'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
							'DATA_LAYER_NAME'        => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
							'BRAND_PROPERTY'         => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

							'TEMPLATE_THEME'               => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
							'ADD_TO_BASKET_ACTION'         => $basketAction,
							'SHOW_CLOSE_POPUP'             => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
							'COMPARE_PATH'                 => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
							'COMPARE_NAME'                 => $arParams['COMPARE_NAME'],
							'BACKGROUND_IMAGE'             => '',
							'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),
						),
						$component
					);
				}

				//news slider
				/*$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"slider_news_cat",
					array(
						"ACTIVE_DATE_FORMAT"              => "d.m.Y",    // Формат показа даты
						"ADD_SECTIONS_CHAIN"              => "N",    // Включать раздел в цепочку навигации
						"AJAX_MODE"                       => "N",    // Включить режим AJAX
						"AJAX_OPTION_ADDITIONAL"          => "",    // Дополнительный идентификатор
						"AJAX_OPTION_HISTORY"             => "N",    // Включить эмуляцию навигации браузера
						"AJAX_OPTION_JUMP"                => "N",    // Включить прокрутку к началу компонента
						"AJAX_OPTION_STYLE"               => "Y",    // Включить подгрузку стилей
						"CACHE_FILTER"                    => "N",    // Кешировать при установленном фильтре
						"CACHE_GROUPS"                    => "Y",    // Учитывать права доступа
						"CACHE_TIME"                      => "36000000",    // Время кеширования (сек.)
						"CACHE_TYPE"                      => "A",    // Тип кеширования
						"CHECK_DATES"                     => "Y",    // Показывать только активные на данный момент элементы
						"DETAIL_URL"                      => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
						"DISPLAY_BOTTOM_PAGER"            => "N",    // Выводить под списком
						"DISPLAY_DATE"                    => "N",    // Выводить дату элемента
						"DISPLAY_NAME"                    => "N",    // Выводить название элемента
						"DISPLAY_PICTURE"                 => "N",    // Выводить изображение для анонса
						"DISPLAY_PREVIEW_TEXT"            => "N",    // Выводить текст анонса
						"DISPLAY_TOP_PAGER"               => "N",    // Выводить над списком
						"FIELD_CODE"                      => array(    // Поля
							0 => "NAME",
							1 => "PREVIEW_TEXT",
							2 => "PREVIEW_PICTURE",
							3 => "",
						),
						"FILTER_NAME"                     => "",    // Фильтр
						"HIDE_LINK_WHEN_NO_DETAIL"        => "N",    // Скрывать ссылку, если нет детального описания
						"IBLOCK_ID"                       => "31",    // Код информационного блока
						"IBLOCK_TYPE"                     => "news",    // Тип информационного блока (используется только для проверки)
						"INCLUDE_IBLOCK_INTO_CHAIN"       => "N",    // Включать инфоблок в цепочку навигации
						"INCLUDE_SUBSECTIONS"             => "N",    // Показывать элементы подразделов раздела
						"MESSAGE_404"                     => "",    // Сообщение для показа (по умолчанию из компонента)
						"NEWS_COUNT"                      => "20",    // Количество новостей на странице
						"PAGER_BASE_LINK_ENABLE"          => "N",    // Включить обработку ссылок
						"PAGER_DESC_NUMBERING"            => "N",    // Использовать обратную навигацию
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
						"PAGER_SHOW_ALL"                  => "N",    // Показывать ссылку "Все"
						"PAGER_SHOW_ALWAYS"               => "N",    // Выводить всегда
						"PAGER_TEMPLATE"                  => ".default",    // Шаблон постраничной навигации
						"PAGER_TITLE"                     => "Новости",    // Название категорий
						"PARENT_SECTION"                  => "",    // ID раздела
						"PARENT_SECTION_CODE"             => "",    // Код раздела
						"PREVIEW_TRUNCATE_LEN"            => "",    // Максимальная длина анонса для вывода (только для типа текст)
						"PROPERTY_CODE"                   => array(    // Свойства
							0 => "",
							1 => "",
						),
						"SET_BROWSER_TITLE"               => "N",    // Устанавливать заголовок окна браузера
						"SET_LAST_MODIFIED"               => "N",    // Устанавливать в заголовках ответа время модификации страницы
						"SET_META_DESCRIPTION"            => "N",    // Устанавливать описание страницы
						"SET_META_KEYWORDS"               => "N",    // Устанавливать ключевые слова страницы
						"SET_STATUS_404"                  => "N",    // Устанавливать статус 404
						"SET_TITLE"                       => "N",    // Устанавливать заголовок страницы
						"SHOW_404"                        => "N",    // Показ специальной страницы
						"SORT_BY1"                        => "ACTIVE_FROM",    // Поле для первой сортировки новостей
						"SORT_BY2"                        => "SORT",    // Поле для второй сортировки новостей
						"SORT_ORDER1"                     => "DESC",    // Направление для первой сортировки новостей
						"SORT_ORDER2"                     => "ASC",    // Направление для второй сортировки новостей
						"STRICT_SECTION_CHECK"            => "N",    // Строгая проверка раздела для показа списка
						"COMPONENT_TEMPLATE"              => "flat",
						"TEMPLATE_THEME"                  => "blue",    // Цветовая тема
						"MEDIA_PROPERTY"                  => "",    // Свойство для отображения медиа
						"SLIDER_PROPERTY"                 => "",    // Свойство с изображениями для слайдера
						"SEARCH_PAGE"                     => "/search/",    // Путь к странице поиска
						"USE_RATING"                      => "N",    // Разрешить голосование
						"USE_SHARE"                       => "N",    // Отображать панель соц. закладок
					),
					false
				);*/
				?>
				<div class="inner-page_main-screen-content_p"><?=$arResult['SECTION']['DESCRIPTION']?></div>
            </div>

        </div>
    </div>

<?



/*$arElements = sortBySale::getFull(
	array(
		"IBLOCK_ID"         => $IBLOCK_ID,
		"SECTION_ID"        => $sectionFilter,
		'ACTIVE'            => "Y",
		'CATALOG_AVAILABLE' => "Y",
	),
	$arSelect = array()
);

if(isset($arElements['IDS']) && !empty($arElements['IDS'])) {
	$GLOBALS["arrFilterSale"] = array("ID" => $arElements['IDS']);
}
*/


