<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$title = 'Аренда теплового оборудования';

$APPLICATION->SetTitle($title);
$APPLICATION->SetPageProperty("description", "Аренда теплового оборудования с доставкой по Москве и всей России. Аренда теплового оборудования под ключ для выставок и мероприятий.");
$APPLICATION->SetPageProperty("title", "Аренда теплового оборудования для выставок и мероприятий");
$APPLICATION->SetTitle("Аренда теплового оборудования");
$APPLICATION->SetPageProperty('title', $title);
$APPLICATION->SetPageProperty('description', $title);
$APPLICATION->AddChainItem($title);

?>
<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
	"PATH"       => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID"    => "s2",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	"START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
),
                                  false
); ?>
    <div class="pagination-mob">
        <div class="container">
            <a class="pagination-mob_link" href="/serv/rental-of-commercial-equipment/">Аренда торгового оборудования</a>
        </div>
    </div>

    <div class="container">
        <div class="wrap-link-back">
            <a class="link-back" href="/serv/">Читать о других услугах</a>
        </div>
    </div>

    <div class="serv-content">
        <div class="text-block">

            <div class="serv-to-col">
                <div class="container">
                    <div class="serv-to-col-item">
                        <div class="text-small-h text-small-h-mob-hid">Аренда теплового оборудования</div>
                        <p class="text-p">Другие варианты аренды</p>

						<?
						$currPage = 'warm';
						?>

						<? $APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/rent/menu.php"),
							array(
								'currPage' => $currPage,
							),
							array('MODE' => 'text')
						); ?>

	                    <?
	                    global $arrFilter;
	                    $arrFilter['PROPERTY_VYGRUZHAT_NA_SAYT_VALUE'] = 'Да';
	                    ?>
						<? $APPLICATION->IncludeComponent(
                            "bitrix:catalog.section",
                            "rent",
                            array(
                                "ACTION_VARIABLE" => "action",
                                "ADD_PROPERTIES_TO_BASKET" => "Y",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "ADD_TO_BASKET_ACTION" => "ADD",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "BACKGROUND_IMAGE" => "-",
                                "BASKET_URL" => "/personal/basket.php",
                                "BROWSER_TITLE" => "-",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "COMPATIBLE_MODE" => "Y",
                                "CONVERT_CURRENCY" => "N",
                                "CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":{\"1\":{\"CLASS_ID\":\"CondIBProp:26:204\",\"DATA\":{\"logic\":\"Equal\",\"value\":49127}}}}",
                                "DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
                                "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_COMPARE" => "N",
                                "DISPLAY_TOP_PAGER" => "N",
                                "ELEMENT_SORT_FIELD" => "sort",
                                "ELEMENT_SORT_FIELD2" => "",
                                "ELEMENT_SORT_ORDER" => "asc",
                                "ELEMENT_SORT_ORDER2" => "",
                                "ENLARGE_PRODUCT" => "STRICT",
                                "FILTER_NAME" => "arrFilter",
                                "HIDE_NOT_AVAILABLE" => "Y",
                                "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                                "IBLOCK_ID" => "26",
                                "IBLOCK_TYPE" => "CRM_PRODUCT_CATALOG",
                                "INCLUDE_SUBSECTIONS" => "Y",
                                "LAZY_LOAD" => "N",
                                "LINE_ELEMENT_COUNT" => "1",
                                "LOAD_ON_SCROLL" => "N",
                                "MESSAGE_404" => "",
                                "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                                "MESS_BTN_BUY" => "Купить",
                                "MESS_BTN_DETAIL" => "Подробнее",
                                "MESS_BTN_SUBSCRIBE" => "Подписаться",
                                "MESS_NOT_AVAILABLE" => "Нет в наличии",
                                "META_DESCRIPTION" => "-",
                                "META_KEYWORDS" => "-",
                                "OFFERS_FIELD_CODE" => array(
                                    0 => "",
                                    1 => "TDO_WIDTH",
                                    2 => "TDO_DEPTH",
                                    3 => "PRICE_RENT",
                                    4 => "TDO_HEIGHT",
                                    5 => "",
                                ),
                                "OFFERS_LIMIT" => "6",
                                "OFFERS_SORT_FIELD" => "",
                                "OFFERS_SORT_FIELD2" => "id",
                                "OFFERS_SORT_ORDER" => "asc",
                                "OFFERS_SORT_ORDER2" => "desc",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "PAGER_DESC_NUMBERING" => "N",
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_SHOW_ALWAYS" => "N",
                                "PAGER_TEMPLATE" => "tdo_nav",
                                "PAGER_TITLE" => "Товары",
                                "PAGE_ELEMENT_COUNT" => "6",
                                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                                "PRICE_CODE" => array(
                                    0 => "Розница распродажа",
                                    1 => "Розница",
                                ),
                                "PRICE_VAT_INCLUDE" => "Y",
                                "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                                "PRODUCT_ID_VARIABLE" => "id",
                                "PRODUCT_PROPS_VARIABLE" => "prop",
                                "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                                "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false}]",
                                "PRODUCT_SUBSCRIPTION" => "Y",
                                "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
                                "RCM_TYPE" => "personal",
                                "SECTION_CODE" => "",
                                "SECTION_ID" => "261",
                                "SECTION_ID_VARIABLE" => "SECTION_ID",
                                "SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
                                "SECTION_USER_FIELDS" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "SEF_MODE" => "N",
                                "SET_BROWSER_TITLE" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "SHOW_ALL_WO_SECTION" => "Y",
                                "SHOW_CLOSE_POPUP" => "N",
                                "SHOW_DISCOUNT_PERCENT" => "N",
                                "SHOW_FROM_SECTION" => "N",
                                "SHOW_MAX_QUANTITY" => "N",
                                "SHOW_OLD_PRICE" => "N",
                                "SHOW_PRICE_COUNT" => "1",
                                "SHOW_SLIDER" => "Y",
                                "TEMPLATE_THEME" => "blue",
                                "USE_ENHANCED_ECOMMERCE" => "N",
                                "USE_MAIN_ELEMENT_SECTION" => "N",
                                "USE_PRICE_COUNT" => "N",
                                "USE_PRODUCT_QUANTITY" => "N",
                                "COMPONENT_TEMPLATE" => "rent",
                                "SLIDER_INTERVAL" => "3000",
                                "SLIDER_PROGRESS" => "N",
                                "PRODUCT_DISPLAY_MODE" => "N",
                                "ADD_PICT_PROP" => "-",
                                "LABEL_PROP" => array(
                                ),
                                "PROPERTY_CODE_MOBILE" => array(
                                    0 => "PRICE_RENT",
                                ),
                                "SEF_RULE" => "",
                                "SECTION_CODE_PATH" => ""
                            ),
                            false
                        ); ?>


                        <p class="text-p">Тепловое оборудование в аренду зачастую необходимо для участия в различных кулинарных мероприятиях, выставках, ярмарках, мастер-классах и презентациях. Ежегодно такая услуга пользуется большим спросом на региональных мероприятиях, поскольку это снижает затраты на логистику и экономит время на подготовку.</p>
                        <p class="text-p">Аренда теплового оборудования в компании ТДО – это выгодные условия и широкий ассортимент моделей: грили для кур, блинницы, тепловые витрины, кофемашины, роликовые грили, фритюрницы, конвекционные печи и многое другое.</p>

                        <div class="text-small-h text-small-h-16">Пароконвектоматы в аренду</div>
                        <p class="text-p">Компания ТДО предлагает пароконвектоматы в аренду для различных мероприятий на срок от 3-х до 30 дней. В нашем каталоге вы найдете 6-и и 10-уровневые модели пароконвектоматов Rational, Convotherm, Henny Penny, Zanussi, Lainox, Abat и других производителей.</p>
                        <p class="text-p">
                           Компания ТДО предоставляет оборудование без залоговой стоимости, при этом самостоятельно доставляем устройства на объект и забираем его по окончании мероприятия.
                        </p>
                        <p class="text-p">Стоимость доставки, монтажа, демонтажа и обслуживания вы можете уточнить по телефону: 8 (499) 520-0576 или оставьте заявку на сайте, и мы сами Вам перезвоним.</p>
                    </div>

                    <div class="serv-to-col-item form-wrap form-wrap-serv">
                        <div class="text-small-h" style="color: #7C7C7C; font-size: 20px; line-height: 22px">Если вас интересует аренда оборудования для выставки:</div>

						<? $APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/rent/formTitle.php"),
							array(),
							array('MODE' => 'text')
						); ?>

                        <div class="default-form rent-page">
							<?
							$APPLICATION->IncludeComponent(
								"bitrix:form",
								"leave_request",
								array(
									"AJAX_MODE"              => "Y",
									"SEF_MODE"               => "N",
									"WEB_FORM_ID"            => "14",
									"START_PAGE"             => "new",
									"SHOW_LIST_PAGE"         => "N",
									"SHOW_EDIT_PAGE"         => "N",
									"SHOW_VIEW_PAGE"         => "N",
									"SUCCESS_URL"            => "",
									"SHOW_ANSWER_VALUE"      => "N",
									"SHOW_ADDITIONAL"        => "N",
									"SHOW_STATUS"            => "N",
									"EDIT_ADDITIONAL"        => "N",
									"EDIT_STATUS"            => "Y",
									"NOT_SHOW_FILTER"        => array(
										0 => "",
										1 => "",
									),
									"NOT_SHOW_TABLE"         => array(
										0 => "",
										1 => "",
									),
									"CHAIN_ITEM_TEXT"        => "",
									"CHAIN_ITEM_LINK"        => "",
									"IGNORE_CUSTOM_TEMPLATE" => "N",
									"USE_EXTENDED_ERRORS"    => "Y",
									"CACHE_GROUPS"           => "N",
									"CACHE_TYPE"             => "A",
									"CACHE_TIME"             => "3600000",
									"AJAX_OPTION_JUMP"       => "N",
									"AJAX_OPTION_STYLE"      => "Y",
									"AJAX_OPTION_HISTORY"    => "N",
									"SHOW_LICENCE"           => "",
									"HIDDEN_CAPTCHA"         => "",
									"COMPONENT_TEMPLATE"     => ".default",
									"RESULT_ID"              => $_REQUEST[ RESULT_ID ],
									"AJAX_OPTION_ADDITIONAL" => "",
									"VARIABLE_ALIASES"       => array(
										"action" => "action",
									),
								),
								false
							); ?>


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>



<? require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php' ?>