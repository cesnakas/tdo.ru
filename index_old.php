<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Интернет-магазин \"TDO\"");
?>


	<div class="main-screen">
		<div class="container main-screen-container main-screen-content-slider-wrap">


			<div class="main-screen-content">

				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"slider_home_top",
					Array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ADD_SECTIONS_CHAIN" => "N",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "N",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"DISPLAY_DATE" => "N",
						"DISPLAY_NAME" => "N",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "N",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array("ID", "DETAIL_PICTURE", ""),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "47",
						"IBLOCK_TYPE" => "SLIDERS",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"INCLUDE_SUBSECTIONS" => "N",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "20",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => ".default",
						"PAGER_TITLE" => "Новости",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"PROPERTY_CODE" => array("", ""),
						"SET_BROWSER_TITLE" => "N",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"SHOW_404" => "N",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_BY2" => "SORT",
						"SORT_ORDER1" => "DESC",
						"SORT_ORDER2" => "ASC",
						"STRICT_SECTION_CHECK" => "N"
					)
				);?>

				<?
				/*
				 * выводить по 1 из брендов, галочка показывать на главной
				 *
				 */
				?>
				<? $APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath("/include/home/main_screen_slider.php"),
					array(),
					array()
				); ?>
				<?

				/*
				//Бренды на главной
				$APPLICATION->IncludeComponent(
						"bitrix:catalog.section",
						"topGoodsOnHome",
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
							"AJAX_OPTION_STYLE"               => "N",
							"BACKGROUND_IMAGE"                => "-",
							"BASKET_URL"                      => "/personal/basket.php",
							"BROWSER_TITLE"                   => "-",
							"CACHE_FILTER"                    => "N",
							"CACHE_GROUPS"                    => "Y",
							"CACHE_TIME"                      => "36000000",
							"CACHE_TYPE"                      => "A",
							"COMPATIBLE_MODE"                 => "Y",
							"CONVERT_CURRENCY"                => "N",
							"CUSTOM_FILTER"                   => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
							"DETAIL_URL"                      => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
							"DISABLE_INIT_JS_IN_COMPONENT"    => "N",
							"DISPLAY_BOTTOM_PAGER"            => "N",
							"DISPLAY_COMPARE"                 => "N",
							"DISPLAY_TOP_PAGER"               => "N",
							"ELEMENT_SORT_FIELD"              => "rand",
							"ELEMENT_SORT_FIELD2"             => "id",
							"ELEMENT_SORT_ORDER"              => "desc",
							"ELEMENT_SORT_ORDER2"             => "desc",
							"ENLARGE_PRODUCT"                 => "STRICT",
							"FILTER_NAME"                     => "arrFilter",
							"HIDE_NOT_AVAILABLE"              => "N",
							"HIDE_NOT_AVAILABLE_OFFERS"       => "N",
							"IBLOCK_ID"                       => "26",
							"IBLOCK_TYPE"                     => "CRM_PRODUCT_CATALOG",
							"INCLUDE_SUBSECTIONS"             => "Y",
							"LABEL_PROP"                      => array(),
							"LAZY_LOAD"                       => "N",
							"LINE_ELEMENT_COUNT"              => "1",
							"LOAD_ON_SCROLL"                  => "N",
							"MESSAGE_404"                     => "",
							"MESS_BTN_ADD_TO_BASKET"          => "В корзину",
							"MESS_BTN_BUY"                    => "Купить",
							"MESS_BTN_DETAIL"                 => "Подробнее",
							"MESS_BTN_SUBSCRIBE"              => "Подписаться",
							"MESS_NOT_AVAILABLE"              => "Нет в наличии",
							"META_DESCRIPTION"                => "-",
							"META_KEYWORDS"                   => "-",
							"OFFERS_FIELD_CODE"               => array(
								0 => "",
								1 => "",
							),
							"OFFERS_LIMIT"                    => "3",
							"OFFERS_SORT_FIELD"               => "sort",
							"OFFERS_SORT_FIELD2"              => "id",
							"OFFERS_SORT_ORDER"               => "asc",
							"OFFERS_SORT_ORDER2"              => "desc",
							"PAGER_BASE_LINK_ENABLE"          => "N",
							"PAGER_DESC_NUMBERING"            => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL"                  => "N",
							"PAGER_SHOW_ALWAYS"               => "N",
							"PAGER_TEMPLATE"                  => ".default",
							"PAGER_TITLE"                     => "Товары",
							"PAGE_ELEMENT_COUNT"              => "3",
							"PARTIAL_PRODUCT_PROPERTIES"      => "N",
							"PRICE_CODE"                      => array(
								0 => "BASE",
							),
							"PRICE_VAT_INCLUDE"               => "Y",
							"PRODUCT_BLOCKS_ORDER"            => "price,props,sku,quantityLimit,quantity,buttons",
							"PRODUCT_DISPLAY_MODE"            => "N",
							"PRODUCT_ID_VARIABLE"             => "id",
							"PRODUCT_PROPS_VARIABLE"          => "prop",
							"PRODUCT_QUANTITY_VARIABLE"       => "quantity",
							"PRODUCT_ROW_VARIANTS"            => "[{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false}]",
							"PRODUCT_SUBSCRIPTION"            => "N",
							"PROPERTY_CODE_MOBILE"            => array(),
							"RCM_PROD_ID"                     => $_REQUEST["PRODUCT_ID"],
							"RCM_TYPE"                        => "personal",
							"SECTION_CODE"                    => $arResult['IBLOCK_SECTION_ID'],
							"SECTION_CODE_PATH"               => "",
							"SECTION_ID"                      => "",
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
							"SET_META_DESCRIPTION"            => "N",
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
							"SHOW_SLIDER"                     => "N",
							"SLIDER_INTERVAL"                 => "3000",
							"SLIDER_PROGRESS"                 => "N",
							"TEMPLATE_THEME"                  => "blue",
							"USE_ENHANCED_ECOMMERCE"          => "N",
							"USE_MAIN_ELEMENT_SECTION"        => "N",
							"USE_PRICE_COUNT"                 => "N",
							"USE_PRODUCT_QUANTITY"            => "N",
							"COMPONENT_TEMPLATE"              => "topGoodsOnHome",
						),
						false
					);
					*/
				?>

				<? $APPLICATION->IncludeComponent(
					"bitrix:catalog.section.list",
					"catalogListOnHomeTop",
					array(
						"ADD_SECTIONS_CHAIN"    => "Y",
						// Включать раздел в цепочку навигации
						"CACHE_FILTER"          => "N",
						// Кешировать при установленном фильтре
						"CACHE_GROUPS"          => "Y",
						// Учитывать права доступа
						"CACHE_TIME"            => "36000000",
						// Время кеширования (сек.)
						"CACHE_TYPE"            => "A",
						// Тип кеширования
						"COUNT_ELEMENTS"        => "N",
						// Показывать количество элементов в разделе
						"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
						// Показывать количество
						"FILTER_NAME"           => "sectionsFilter",
						// Имя массива со значениями фильтра разделов
						"IBLOCK_ID"             => "26",
						// Инфоблок
						"IBLOCK_TYPE"           => "CRM_PRODUCT_CATALOG",
						// Тип инфоблока
						"SECTION_CODE"          => "",
						// Код раздела
						"SECTION_FIELDS"        => array(    // Поля разделов
							0 => "NAME",
							1 => "",
						),
						"SECTION_ID"            => "#SECTION_CODE#/",
						// ID раздела
						"SECTION_URL"           => "/catalog/#SECTION_CODE#/",
						// URL, ведущий на страницу с содержимым раздела
						"SECTION_USER_FIELDS"   => array(    // Свойства разделов
							0 => "",
							1 => "",
						),
						"SHOW_PARENT_NAME"      => "Y",
						// Показывать название раздела
						"TOP_DEPTH"             => "2",
						// Максимальная отображаемая глубина разделов
						"VIEW_MODE"             => "TILE",
						// Вид списка подразделов
						"COMPONENT_TEMPLATE"    => ".default",
						"HIDE_SECTION_NAME"     => "N",
						// Не показывать названия подразделов
					),
					false
				); ?>

			</div>
		</div>
	</div>


<? $APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath("/include/home/our_triggers_top.php"),
	array(),
	array()
); ?>


	<div class="main-cat">
		<div class="container">

			<? $APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("/include/home/catlist_head.php"),
				array(),
				array()
			); ?>

			<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"catalogListOnHome_images", 
	array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "26",
		"IBLOCK_TYPE" => "CRM_PRODUCT_CATALOG",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "NAME",
			1 => "",
		),
		"SECTION_ID" => "#SECTION_CODE#/",
		"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
		"SECTION_USER_FIELDS" => array(
			0 => "UF_VYGRUZHAT_NA_SAYT",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "TILE",
		"COMPONENT_TEMPLATE" => "catalogListOnHome_images",
		"HIDE_SECTION_NAME" => "N"
	),
	false
); ?>

			<div class="main-cat__more">
				<a href="/catalog/?filter=forshop" class="main-cat__more-item main-cat__more-item--shop">
					<div class="main-cat__more-item-head__wrap">
						<div class="main-cat__more-item-head">Перечень оборудования</div>
						<div class="main-cat__more-item-head-cat">для магазинов</div>
					</div>

					<div class="main-cat__more-item__more"><span>Подробнее</span></div>
				</a>
				<a href="/catalog/?filter=forkafe" class="main-cat__more-item main-cat__more-item--cafe">
					<div class="main-cat__more-item-head__wrap">
						<div class="main-cat__more-item-head">Перечень оборудования</div>
						<div class="main-cat__more-item-head-cat">для кафе и ресторана</div>
					</div>

					<div class="main-cat__more-item__more"><span>Подробнее</span></div>
				</a>
			</div>

		</div>
	</div>

	<div class="advantages">
		<div class="container">
			<div class="section-head">
				<div class="section-head_item-opacity">Преимущества</div>

				<div class="advantages-container">
					<div class="advantages__item">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/advantages/delivery.svg" alt="">
						<p>Доставка по всей России</p>
					</div>
					<div class="advantages__item">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/advantages/credit.svg" alt="">
						<p>Выдаем кредит</p>
					</div>
					<div class="advantages__item">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/advantages/rent.svg" alt="">
						<p>Аренда оборудования</p>
					</div>
					<div class="advantages__item">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/advantages/ransom.svg" alt="">
						<p>Выкуп оборудования</p>
					</div>
					<div class="advantages__item">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/advantages/project.svg" alt="">
						<p>Проектирование под ключ</p>
					</div>
				</div>
			</div>
		</div>
	</div>


<? $APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath("/include/home/reduction.php"),
	array(),
	array()
); ?>

<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"instagram",
	array(
		"ACTIVE_DATE_FORMAT"              => "d.m.Y",
		"ADD_SECTIONS_CHAIN"              => "N",
		"AJAX_MODE"                       => "N",
		"AJAX_OPTION_ADDITIONAL"          => "",
		"AJAX_OPTION_HISTORY"             => "N",
		"AJAX_OPTION_JUMP"                => "N",
		"AJAX_OPTION_STYLE"               => "N",
		"CACHE_FILTER"                    => "N",
		"CACHE_GROUPS"                    => "Y",
		"CACHE_TIME"                      => "36000000",
		"CACHE_TYPE"                      => "A",
		"CHECK_DATES"                     => "Y",
		"COMPONENT_TEMPLATE"              => "instagram",
		"DETAIL_URL"                      => "",
		"DISPLAY_BOTTOM_PAGER"            => "N",
		"DISPLAY_DATE"                    => "Y",
		"DISPLAY_NAME"                    => "Y",
		"DISPLAY_PICTURE"                 => "Y",
		"DISPLAY_PREVIEW_TEXT"            => "Y",
		"DISPLAY_TOP_PAGER"               => "N",
		"FIELD_CODE"                      => array(
			0 => "NAME",
			1 => "SORT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"FILTER_NAME"                     => "arrFilter",
		"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
		"IBLOCK_ID"                       => "35",
		"IBLOCK_TYPE"                     => "photos",
		"INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
		"INCLUDE_SUBSECTIONS"             => "Y",
		"MESSAGE_404"                     => "",
		"NEWS_COUNT"                      => "100000",
		"PAGER_BASE_LINK_ENABLE"          => "N",
		"PAGER_DESC_NUMBERING"            => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL"                  => "N",
		"PAGER_SHOW_ALWAYS"               => "N",
		"PAGER_TEMPLATE"                  => ".default",
		"PAGER_TITLE"                     => "Исследоапния",
		"PARENT_SECTION"                  => "",
		"PARENT_SECTION_CODE"             => "",
		"PREVIEW_TRUNCATE_LEN"            => "",
		"PROPERTY_CODE"                   => array(
			0 => "",
			1 => "link",
			2 => "",
		),
		"SET_BROWSER_TITLE"               => "N",
		"SET_LAST_MODIFIED"               => "N",
		"SET_META_DESCRIPTION"            => "N",
		"SET_META_KEYWORDS"               => "N",
		"SET_STATUS_404"                  => "N",
		"SET_TITLE"                       => "N",
		"SHOW_404"                        => "N",
		"SORT_BY1"                        => "ID",
		"SORT_BY2"                        => "SORT",
		"SORT_ORDER1"                     => "ASC",
		"SORT_ORDER2"                     => "ASC",
		"STRICT_SECTION_CHECK"            => "N",
	),
	false
); ?>

<? /* $APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath("/include/home/inst_block.php"),
	array(),
	array()
);*/ ?>

	<div class="big-form js-reg-excursion">
		<div class="container">

			<? $APPLICATION->IncludeComponent(
				"bitrix:form",
				"registration_excursion",
				array(
					"AJAX_MODE"              => "Y",    // Включить режим AJAX
					"SEF_MODE"               => "N",    // Включить поддержку ЧПУ
					"WEB_FORM_ID"            => "17",    // ID веб-формы
					"START_PAGE"             => "new",    // Начальная страница
					"SHOW_LIST_PAGE"         => "N",    // Показывать страницу со списком результатов
					"SHOW_EDIT_PAGE"         => "N",    // Показывать страницу редактирования результата
					"SHOW_VIEW_PAGE"         => "N",    // Показывать страницу просмотра результата
					"SUCCESS_URL"            => "",    // Страница с сообщением об успешной отправке
					"SHOW_ANSWER_VALUE"      => "N",    // Показать значение параметра ANSWER_VALUE
					"SHOW_ADDITIONAL"        => "N",    // Показать дополнительные поля веб-формы
					"SHOW_STATUS"            => "N",    // Показать текущий статус результата
					"EDIT_ADDITIONAL"        => "N",    // Выводить на редактирование дополнительные поля
					"EDIT_STATUS"            => "Y",    // Выводить форму смены статуса
					"NOT_SHOW_FILTER"        => array(    // Коды полей, которые нельзя показывать в фильтре
						0 => "",
						1 => "",
					),
					"NOT_SHOW_TABLE"         => array(    // Коды полей, которые нельзя показывать в таблице
						0 => "",
						1 => "",
					),
					"CHAIN_ITEM_TEXT"        => "",    // Название дополнительного пункта в навигационной цепочке
					"CHAIN_ITEM_LINK"        => "",    // Ссылка на дополнительном пункте в навигационной цепочке
					"IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
					"USE_EXTENDED_ERRORS"    => "Y",    // Использовать расширенный вывод сообщений об ошибках
					"CACHE_GROUPS"           => "N",
					"CACHE_TYPE"             => "A",    // Тип кеширования
					"CACHE_TIME"             => "3600000",    // Время кеширования (сек.)
					"AJAX_OPTION_JUMP"       => "N",    // Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE"      => "Y",    // Включить подгрузку стилей
					"AJAX_OPTION_HISTORY"    => "N",    // Включить эмуляцию навигации браузера
					"SHOW_LICENCE"           => "",
					"HIDDEN_CAPTCHA"         => "",
					"COMPONENT_TEMPLATE"     => ".default",
					"RESULT_ID"              => $_REQUEST[ RESULT_ID ],    // ID результата
					"AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
					"VARIABLE_ALIASES"       => array(
						"action" => "action",
					),
				),
				false
			); ?>

		</div>
	</div>

	<div class="new-good new-good-main"><?

		global $arrFilter;
		$arrFilter['PROPERTY_VYGRUZHAT_NA_SAYT_VALUE'] = 'Да';
		$arrFilter['>=PRICE_5'] = '100000';
		$now = new DateTime();
		$arrFilter['>DATE_CREATE'] = $now->modify('-7 day')->format('d.m.Y H:i:s');

		?>
		<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"popular_slider_home", 
	array(
		"IBLOCK_TYPE" => "CRM_PRODUCT_CATALOG",
		"IBLOCK_ID" => "26",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"ELEMENT_SORT_FIELD" => "timestamp_x",
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_FIELD2" => "sort",
		"ELEMENT_SORT_ORDER2" => "asc",
		"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"])?$arParams["LIST_PROPERTY_CODE"]:[]),
		"PROPERTY_CODE_MOBILE" => array(
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"BASKET_URL" => "/personal/order/make/",
		"ACTION_VARIABLE" => "",
		"PRODUCT_ID_VARIABLE" => "",
		"SECTION_ID_VARIABLE" => "",
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"DISPLAY_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "Розница распродажа",
			1 => "Розница",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PAGE_ELEMENT_COUNT" => "4",
		"FILTER_IDS" => array(
			0 => $elementId,
		),
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"PRICE_VAT_INCLUDE" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
		"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"])?$arParams["OFFERS_CART_PROPERTIES"]:[]),
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
		"OFFERS_SORT_FIELD" => "",
		"OFFERS_SORT_ORDER" => "",
		"OFFERS_SORT_FIELD2" => "",
		"OFFERS_SORT_ORDER2" => "",
		"OFFERS_LIMIT" => "4",
		"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
		"DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"CONVERT_CURRENCY" => "N",
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"LABEL_PROP" => array(
		),
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
		"ADD_PICT_PROP" => "-",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false}]",
		"ENLARGE_PRODUCT" => "STRICT",
		"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
		"SHOW_SLIDER" => "N",
		"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
		"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"HIDE_SECTION_DESCRIPTION" => "Y",
		"RCM_TYPE" => "personal",
		"RCM_PROD_ID" => "",
		"SHOW_FROM_SECTION" => "N",
		"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
		"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
		"SHOW_OLD_PRICE" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
		"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
		"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
		"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "Купить",
		"MESS_BTN_SUBSCRIBE" => "Уведомить о поступлении",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "товар отсутствует",
		"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
		"USE_ENHANCED_ECOMMERCE" => "N",
		"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
		"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
		"TEMPLATE_THEME" => "blue",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"SHOW_CLOSE_POPUP" => "N",
		"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
		"COMPARE_NAME" => $arParams["COMPARE_NAME"],
		"BACKGROUND_IMAGE" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"COMPONENT_TEMPLATE" => "popular_slider_home",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"SHOW_ALL_WO_SECTION" => "Y",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"LINE_ELEMENT_COUNT" => "3",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"BROWSER_TITLE" => "-",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"LAZY_LOAD" => "N",
		"LOAD_ON_SCROLL" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y",
		"SEF_RULE" => "",
		"SECTION_CODE_PATH" => ""
	),
	false
); ?>
	</div>

<?
///*
?>
	<div class="new-good">
		<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"popular_slider_home_sale", 
	array(
		"IBLOCK_TYPE" => "CRM_PRODUCT_CATALOG",
		"IBLOCK_ID" => "26",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"ELEMENT_SORT_FIELD" => "rand",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER2" => "",
		"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"])?$arParams["LIST_PROPERTY_CODE"]:[]),
		"PROPERTY_CODE_MOBILE" => array(
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"BASKET_URL" => "/personal/order/make/",
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => "",
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"DISPLAY_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "Розница распродажа",
			1 => "Розница",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PAGE_ELEMENT_COUNT" => "4",
		"FILTER_IDS" => array(
			0 => $elementId,
		),
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"PRICE_VAT_INCLUDE" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
		"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"])?$arParams["OFFERS_CART_PROPERTIES"]:[]),
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
		"OFFERS_SORT_FIELD" => "",
		"OFFERS_SORT_ORDER" => "",
		"OFFERS_SORT_FIELD2" => "",
		"OFFERS_SORT_ORDER2" => "",
		"OFFERS_LIMIT" => "",
		"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
		"DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"CONVERT_CURRENCY" => "N",
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"LABEL_PROP" => array(
		),
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
		"ADD_PICT_PROP" => "-",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false}]",
		"ENLARGE_PRODUCT" => "STRICT",
		"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
		"SHOW_SLIDER" => "N",
		"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
		"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"HIDE_SECTION_DESCRIPTION" => "Y",
		"RCM_TYPE" => "personal",
		"RCM_PROD_ID" => $elementId,
		"SHOW_FROM_SECTION" => "Y",
		"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
		"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
		"SHOW_OLD_PRICE" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
		"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
		"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
		"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "Купить",
		"MESS_BTN_SUBSCRIBE" => (isset($arParams["~MESS_BTN_SUBSCRIBE"])?$arParams["~MESS_BTN_SUBSCRIBE"]:""),
		"MESS_BTN_DETAIL" => (isset($arParams["~MESS_BTN_DETAIL"])?$arParams["~MESS_BTN_DETAIL"]:""),
		"MESS_NOT_AVAILABLE" => (isset($arParams["~MESS_NOT_AVAILABLE"])?$arParams["~MESS_NOT_AVAILABLE"]:""),
		"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
		"USE_ENHANCED_ECOMMERCE" => "N",
		"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
		"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
		"TEMPLATE_THEME" => "",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"SHOW_CLOSE_POPUP" => "N",
		"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
		"COMPARE_NAME" => $arParams["COMPARE_NAME"],
		"BACKGROUND_IMAGE" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"COMPONENT_TEMPLATE" => "popular_slider_home_sale",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"SHOW_ALL_WO_SECTION" => "Y",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:26:138\",\"DATA\":{\"logic\":\"Equal\",\"value\":47897}}]}",
		"LINE_ELEMENT_COUNT" => "3",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"BROWSER_TITLE" => "-",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"LAZY_LOAD" => "N",
		"LOAD_ON_SCROLL" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y"
	),
	false
); ?>
	</div>

<?
//*/
?>
<?/*?>
<? $APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath("/include/home/slider_red.php"),
	array(),
	array('MODE' => 'text')
);?>
<?*/?>
	<div class="container">
		<div class="section-head">
			<div class="call-us-slider-wrap-head section-head_item-opacity">Оборудование под ключ</div>
		</div>
	</div>


	<div class="call-us-slider-wrap">
		<div class="container">
			<? $APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"slider_turnkey_equipment",
				array(
					"ACTIVE_DATE_FORMAT"              => "d.m.Y",
					// Формат показа даты
					"ADD_SECTIONS_CHAIN"              => "N",
					// Включать раздел в цепочку навигации
					"AJAX_MODE"                       => "N",
					// Включить режим AJAX
					"AJAX_OPTION_ADDITIONAL"          => "",
					// Дополнительный идентификатор
					"AJAX_OPTION_HISTORY"             => "N",
					// Включить эмуляцию навигации браузера
					"AJAX_OPTION_JUMP"                => "N",
					// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE"               => "Y",
					// Включить подгрузку стилей
					"CACHE_FILTER"                    => "N",
					// Кешировать при установленном фильтре
					"CACHE_GROUPS"                    => "Y",
					// Учитывать права доступа
					"CACHE_TIME"                      => "36000000",
					// Время кеширования (сек.)
					"CACHE_TYPE"                      => "A",
					// Тип кеширования
					"CHECK_DATES"                     => "Y",
					// Показывать только активные на данный момент элементы
					"DETAIL_URL"                      => "",
					// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
					"DISPLAY_BOTTOM_PAGER"            => "N",
					// Выводить под списком
					"DISPLAY_DATE"                    => "N",
					// Выводить дату элемента
					"DISPLAY_NAME"                    => "N",
					// Выводить название элемента
					"DISPLAY_PICTURE"                 => "N",
					// Выводить изображение для анонса
					"DISPLAY_PREVIEW_TEXT"            => "N",
					// Выводить текст анонса
					"DISPLAY_TOP_PAGER"               => "N",
					// Выводить над списком
					"FIELD_CODE"                      => array(    // Поля
						0 => "DETAIL_PICTURE",
						1 => "",
					),
					"FILTER_NAME"                     => "",
					// Фильтр
					"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
					// Скрывать ссылку, если нет детального описания
					"IBLOCK_ID"                       => "36",
					// Код информационного блока
					"IBLOCK_TYPE"                     => "photos",
					// Тип информационного блока (используется только для проверки)
					"INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
					// Включать инфоблок в цепочку навигации
					"INCLUDE_SUBSECTIONS"             => "N",
					// Показывать элементы подразделов раздела
					"MESSAGE_404"                     => "",
					// Сообщение для показа (по умолчанию из компонента)
					"NEWS_COUNT"                      => "20",
					// Количество новостей на странице
					"PAGER_BASE_LINK_ENABLE"          => "N",
					// Включить обработку ссылок
					"PAGER_DESC_NUMBERING"            => "N",
					// Использовать обратную навигацию
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					// Время кеширования страниц для обратной навигации
					"PAGER_SHOW_ALL"                  => "N",
					// Показывать ссылку "Все"
					"PAGER_SHOW_ALWAYS"               => "N",
					// Выводить всегда
					"PAGER_TEMPLATE"                  => ".default",
					// Шаблон постраничной навигации
					"PAGER_TITLE"                     => "Новости",
					// Название категорий
					"PARENT_SECTION"                  => "",
					// ID раздела
					"PARENT_SECTION_CODE"             => "",
					// Код раздела
					"PREVIEW_TRUNCATE_LEN"            => "",
					// Максимальная длина анонса для вывода (только для типа текст)
					"PROPERTY_CODE"                   => array(    // Свойства
						0 => "",
						1 => "",
					),
					"SET_BROWSER_TITLE"               => "N",
					// Устанавливать заголовок окна браузера
					"SET_LAST_MODIFIED"               => "N",
					// Устанавливать в заголовках ответа время модификации страницы
					"SET_META_DESCRIPTION"            => "N",
					// Устанавливать описание страницы
					"SET_META_KEYWORDS"               => "N",
					// Устанавливать ключевые слова страницы
					"SET_STATUS_404"                  => "N",
					// Устанавливать статус 404
					"SET_TITLE"                       => "N",
					// Устанавливать заголовок страницы
					"SHOW_404"                        => "N",
					// Показ специальной страницы
					"SORT_BY1"                        => "ACTIVE_FROM",
					// Поле для первой сортировки новостей
					"SORT_BY2"                        => "SORT",
					// Поле для второй сортировки новостей
					"SORT_ORDER1"                     => "DESC",
					// Направление для первой сортировки новостей
					"SORT_ORDER2"                     => "ASC",
					// Направление для второй сортировки новостей
					"STRICT_SECTION_CHECK"            => "N",
					// Строгая проверка раздела для показа списка
					"COMPONENT_TEMPLATE"              => ".default",
				),
				false
			); ?>


			<? $APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("/include/home/call_us_slider.php"),
				array(),
				array('MODE' => 'text')
			); ?>


		</div>
	</div>


<? //news slider
$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"slider_news_home",
	array(
		"ACTIVE_DATE_FORMAT"              => "d.m.Y",
		// Формат показа даты
		"ADD_SECTIONS_CHAIN"              => "N",
		// Включать раздел в цепочку навигации
		"AJAX_MODE"                       => "N",
		// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL"          => "",
		// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY"             => "N",
		// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP"                => "N",
		// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE"               => "Y",
		// Включить подгрузку стилей
		"CACHE_FILTER"                    => "N",
		// Кешировать при установленном фильтре
		"CACHE_GROUPS"                    => "Y",
		// Учитывать права доступа
		"CACHE_TIME"                      => "36000000",
		// Время кеширования (сек.)
		"CACHE_TYPE"                      => "A",
		// Тип кеширования
		"CHECK_DATES"                     => "Y",
		// Показывать только активные на данный момент элементы
		"DETAIL_URL"                      => "",
		// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER"            => "N",
		// Выводить под списком
		"DISPLAY_DATE"                    => "N",
		// Выводить дату элемента
		"DISPLAY_NAME"                    => "N",
		// Выводить название элемента
		"DISPLAY_PICTURE"                 => "N",
		// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT"            => "N",
		// Выводить текст анонса
		"DISPLAY_TOP_PAGER"               => "N",
		// Выводить над списком
		"FIELD_CODE"                      => array(    // Поля
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"FILTER_NAME"                     => "",
		// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
		// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID"                       => "31",
		// Код информационного блока
		"IBLOCK_TYPE"                     => "news",
		// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
		// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS"             => "N",
		// Показывать элементы подразделов раздела
		"MESSAGE_404"                     => "",
		// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT"                      => "20",
		// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE"          => "N",
		// Включить обработку ссылок
		"PAGER_DESC_NUMBERING"            => "N",
		// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL"                  => "N",
		// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS"               => "N",
		// Выводить всегда
		"PAGER_TEMPLATE"                  => ".default",
		// Шаблон постраничной навигации
		"PAGER_TITLE"                     => "Новости",
		// Название категорий
		"PARENT_SECTION"                  => "",
		// ID раздела
		"PARENT_SECTION_CODE"             => "",
		// Код раздела
		"PREVIEW_TRUNCATE_LEN"            => "",
		// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE"                   => array(    // Свойства
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE"               => "N",
		// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED"               => "N",
		// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION"            => "N",
		// Устанавливать описание страницы
		"SET_META_KEYWORDS"               => "N",
		// Устанавливать ключевые слова страницы
		"SET_STATUS_404"                  => "N",
		// Устанавливать статус 404
		"SET_TITLE"                       => "N",
		// Устанавливать заголовок страницы
		"SHOW_404"                        => "N",
		// Показ специальной страницы
		"SORT_BY1"                        => "ACTIVE_FROM",
		// Поле для первой сортировки новостей
		"SORT_BY2"                        => "SORT",
		// Поле для второй сортировки новостей
		"SORT_ORDER1"                     => "DESC",
		// Направление для первой сортировки новостей
		"SORT_ORDER2"                     => "ASC",
		// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK"            => "N",
		// Строгая проверка раздела для показа списка
		"COMPONENT_TEMPLATE"              => "flat",
		"TEMPLATE_THEME"                  => "blue",
		// Цветовая тема
		"MEDIA_PROPERTY"                  => "",
		// Свойство для отображения медиа
		"SLIDER_PROPERTY"                 => "",
		// Свойство с изображениями для слайдера
		"SEARCH_PAGE"                     => "/search/",
		// Путь к странице поиска
		"USE_RATING"                      => "N",
		// Разрешить голосование
		"USE_SHARE"                       => "N",
		// Отображать панель соц. закладок
	),
	false
); ?>
<? //news articles
$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"slider_articles_home",
	array(
		"ACTIVE_DATE_FORMAT"              => "d.m.Y",
		// Формат показа даты
		"ADD_SECTIONS_CHAIN"              => "N",
		// Включать раздел в цепочку навигации
		"AJAX_MODE"                       => "N",
		// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL"          => "",
		// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY"             => "N",
		// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP"                => "N",
		// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE"               => "Y",
		// Включить подгрузку стилей
		"CACHE_FILTER"                    => "N",
		// Кешировать при установленном фильтре
		"CACHE_GROUPS"                    => "Y",
		// Учитывать права доступа
		"CACHE_TIME"                      => "36000000",
		// Время кеширования (сек.)
		"CACHE_TYPE"                      => "A",
		// Тип кеширования
		"CHECK_DATES"                     => "Y",
		// Показывать только активные на данный момент элементы
		"DETAIL_URL"                      => "",
		// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER"            => "N",
		// Выводить под списком
		"DISPLAY_DATE"                    => "N",
		// Выводить дату элемента
		"DISPLAY_NAME"                    => "N",
		// Выводить название элемента
		"DISPLAY_PICTURE"                 => "N",
		// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT"            => "N",
		// Выводить текст анонса
		"DISPLAY_TOP_PAGER"               => "N",
		// Выводить над списком
		"FIELD_CODE"                      => array(    // Поля
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"FILTER_NAME"                     => "",
		// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
		// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID"                       => "45",
		// Код информационного блока
		"IBLOCK_TYPE"                     => "news",
		// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
		// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS"             => "N",
		// Показывать элементы подразделов раздела
		"MESSAGE_404"                     => "",
		// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT"                      => "20",
		// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE"          => "N",
		// Включить обработку ссылок
		"PAGER_DESC_NUMBERING"            => "N",
		// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL"                  => "N",
		// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS"               => "N",
		// Выводить всегда
		"PAGER_TEMPLATE"                  => ".default",
		// Шаблон постраничной навигации
		"PAGER_TITLE"                     => "Новости",
		// Название категорий
		"PARENT_SECTION"                  => "",
		// ID раздела
		"PARENT_SECTION_CODE"             => "",
		// Код раздела
		"PREVIEW_TRUNCATE_LEN"            => "",
		// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE"                   => array(    // Свойства
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE"               => "N",
		// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED"               => "N",
		// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION"            => "N",
		// Устанавливать описание страницы
		"SET_META_KEYWORDS"               => "N",
		// Устанавливать ключевые слова страницы
		"SET_STATUS_404"                  => "N",
		// Устанавливать статус 404
		"SET_TITLE"                       => "N",
		// Устанавливать заголовок страницы
		"SHOW_404"                        => "N",
		// Показ специальной страницы
		"SORT_BY1"                        => "ACTIVE_FROM",
		// Поле для первой сортировки новостей
		"SORT_BY2"                        => "SORT",
		// Поле для второй сортировки новостей
		"SORT_ORDER1"                     => "DESC",
		// Направление для первой сортировки новостей
		"SORT_ORDER2"                     => "ASC",
		// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK"            => "N",
		// Строгая проверка раздела для показа списка
		"COMPONENT_TEMPLATE"              => "flat",
		"TEMPLATE_THEME"                  => "blue",
		// Цветовая тема
		"MEDIA_PROPERTY"                  => "",
		// Свойство для отображения медиа
		"SLIDER_PROPERTY"                 => "",
		// Свойство с изображениями для слайдера
		"SEARCH_PAGE"                     => "/search/",
		// Путь к странице поиска
		"USE_RATING"                      => "N",
		// Разрешить голосование
		"USE_SHARE"                       => "N",
		// Отображать панель соц. закладок
	),
	false
); ?>

<?
/*
$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"slider_news",
	array(
		"ACTIVE_DATE_FORMAT"              => "d.m.Y",
		// Формат показа даты
		"ADD_SECTIONS_CHAIN"              => "N",
		// Включать раздел в цепочку навигации
		"AJAX_MODE"                       => "N",
		// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL"          => "",
		// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY"             => "N",
		// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP"                => "N",
		// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE"               => "Y",
		// Включить подгрузку стилей
		"CACHE_FILTER"                    => "N",
		// Кешировать при установленном фильтре
		"CACHE_GROUPS"                    => "Y",
		// Учитывать права доступа
		"CACHE_TIME"                      => "36000000",
		// Время кеширования (сек.)
		"CACHE_TYPE"                      => "A",
		// Тип кеширования
		"CHECK_DATES"                     => "Y",
		// Показывать только активные на данный момент элементы
		"DETAIL_URL"                      => "",
		// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER"            => "N",
		// Выводить под списком
		"DISPLAY_DATE"                    => "N",
		// Выводить дату элемента
		"DISPLAY_NAME"                    => "N",
		// Выводить название элемента
		"DISPLAY_PICTURE"                 => "N",
		// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT"            => "N",
		// Выводить текст анонса
		"DISPLAY_TOP_PAGER"               => "N",
		// Выводить над списком
		"FIELD_CODE"                      => array(    // Поля
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"FILTER_NAME"                     => "",
		// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
		// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID"                       => "31",
		// Код информационного блока
		"IBLOCK_TYPE"                     => "news",
		// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
		// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS"             => "N",
		// Показывать элементы подразделов раздела
		"MESSAGE_404"                     => "",
		// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT"                      => "20",
		// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE"          => "N",
		// Включить обработку ссылок
		"PAGER_DESC_NUMBERING"            => "N",
		// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL"                  => "N",
		// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS"               => "N",
		// Выводить всегда
		"PAGER_TEMPLATE"                  => ".default",
		// Шаблон постраничной навигации
		"PAGER_TITLE"                     => "Новости",
		// Название категорий
		"PARENT_SECTION"                  => "",
		// ID раздела
		"PARENT_SECTION_CODE"             => "",
		// Код раздела
		"PREVIEW_TRUNCATE_LEN"            => "",
		// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE"                   => array(    // Свойства
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE"               => "N",
		// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED"               => "N",
		// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION"            => "N",
		// Устанавливать описание страницы
		"SET_META_KEYWORDS"               => "N",
		// Устанавливать ключевые слова страницы
		"SET_STATUS_404"                  => "N",
		// Устанавливать статус 404
		"SET_TITLE"                       => "N",
		// Устанавливать заголовок страницы
		"SHOW_404"                        => "N",
		// Показ специальной страницы
		"SORT_BY1"                        => "ACTIVE_FROM",
		// Поле для первой сортировки новостей
		"SORT_BY2"                        => "SORT",
		// Поле для второй сортировки новостей
		"SORT_ORDER1"                     => "DESC",
		// Направление для первой сортировки новостей
		"SORT_ORDER2"                     => "ASC",
		// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK"            => "N",
		// Строгая проверка раздела для показа списка
		"COMPONENT_TEMPLATE"              => "flat",
		"TEMPLATE_THEME"                  => "blue",
		// Цветовая тема
		"MEDIA_PROPERTY"                  => "",
		// Свойство для отображения медиа
		"SLIDER_PROPERTY"                 => "",
		// Свойство с изображениями для слайдера
		"SEARCH_PAGE"                     => "/search/",
		// Путь к странице поиска
		"USE_RATING"                      => "N",
		// Разрешить голосование
		"USE_SHARE"                       => "N",
		// Отображать панель соц. закладок
	),
	false
);
//*/
?>

<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"brandListBottom",
	array(
		"ACTIVE_DATE_FORMAT"              => "d.m.Y",
		// Формат показа даты
		"ADD_SECTIONS_CHAIN"              => "N",
		// Включать раздел в цепочку навигации
		"AJAX_MODE"                       => "N",
		// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL"          => "",
		// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY"             => "N",
		// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP"                => "N",
		// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE"               => "Y",
		// Включить подгрузку стилей
		"CACHE_FILTER"                    => "N",
		// Кешировать при установленном фильтре
		"CACHE_GROUPS"                    => "Y",
		// Учитывать права доступа
		"CACHE_TIME"                      => "36000000",
		// Время кеширования (сек.)
		"CACHE_TYPE"                      => "A",
		// Тип кеширования
		"CHECK_DATES"                     => "Y",
		// Показывать только активные на данный момент элементы
		"DETAIL_URL"                      => "",
		// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER"            => "N",
		// Выводить под списком
		"DISPLAY_DATE"                    => "N",
		// Выводить дату элемента
		"DISPLAY_NAME"                    => "Y",
		// Выводить название элемента
		"DISPLAY_PICTURE"                 => "Y",
		// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT"            => "N",
		// Выводить текст анонса
		"DISPLAY_TOP_PAGER"               => "N",
		// Выводить над списком
		"FIELD_CODE"                      => array(    // Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME"                     => "",
		// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
		// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID"                       => "43",
		// Код информационного блока
		"IBLOCK_TYPE"                     => "lists",
		// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
		// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS"             => "N",
		// Показывать элементы подразделов раздела
		"MEDIA_PROPERTY"                  => "",
		// Свойство для отображения медиа
		"MESSAGE_404"                     => "",
		// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT"                      => "11",
		// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE"          => "N",
		// Включить обработку ссылок
		"PAGER_DESC_NUMBERING"            => "N",
		// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL"                  => "N",
		// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS"               => "N",
		// Выводить всегда
		"PAGER_TEMPLATE"                  => ".default",
		// Шаблон постраничной навигации
		"PAGER_TITLE"                     => "Новости",
		// Название категорий
		"PARENT_SECTION"                  => "",
		// ID раздела
		"PARENT_SECTION_CODE"             => "",
		// Код раздела
		"PREVIEW_TRUNCATE_LEN"            => "",
		// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE"                   => array(    // Свойства
			0 => "",
			1 => "",
		),
		"SEARCH_PAGE"                     => "/search/",
		// Путь к странице поиска
		"SET_BROWSER_TITLE"               => "N",
		// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED"               => "N",
		// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION"            => "N",
		// Устанавливать описание страницы
		"SET_META_KEYWORDS"               => "N",
		// Устанавливать ключевые слова страницы
		"SET_STATUS_404"                  => "N",
		// Устанавливать статус 404
		"SET_TITLE"                       => "N",
		// Устанавливать заголовок страницы
		"SHOW_404"                        => "N",
		// Показ специальной страницы
		"SLIDER_PROPERTY"                 => "",
		// Свойство с изображениями для слайдера
		"SORT_BY1"                        => "SORT",
		// Поле для первой сортировки новостей
		"SORT_BY2"                        => "",
		// Поле для второй сортировки новостей
		"SORT_ORDER1"                     => "ASC",
		// Направление для первой сортировки новостей
		"SORT_ORDER2"                     => "",
		// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK"            => "N",
		// Строгая проверка раздела для показа списка
		"TEMPLATE_THEME"                  => "blue",
		// Цветовая тема
		"USE_RATING"                      => "N",
		// Разрешить голосование
		"USE_SHARE"                       => "N",
		// Отображать панель соц. закладок
	),
	false
); ?>


<? $APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	array(
		"AREA_FILE_SHOW"     => "file",
		"AREA_FILE_SUFFIX"   => "inc",
		"EDIT_TEMPLATE"      => "",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH"               => "/include/useful_information.php",
	),
	false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>