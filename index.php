<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Интернет-магазин \"TDO\"");
?>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "slider_home_top",
    array(
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
        "PROPERTY_CODE" => array("HREF", ""),
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
); ?>
<div class="container mb-5">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3 mb-4 mb-md-0">
            <div class="advantage-item">
                <div class="advantage-item-icon">
                    <img src="/local/templates/tdo_shop_new/new_design/img/advantage1.png">
                </div>
                <div class="advantage-item-label">
                    <span>Уникальные цены</span>
                    <div>Оптимизируй бюджет на открытие и развитие</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 mb-4 mb-md-0">
            <div class="advantage-item">
                <div class="advantage-item-icon">
                    <img src="/local/templates/tdo_shop_new/new_design/img/advantage2.png">
                </div>
                <div class="advantage-item-label">
                    <span>Заводская гарантия</span>
                    <div>Полноценная заводская гарантия на узлы и агрегаты</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 mb-4 mb-md-0">
            <div class="advantage-item">
                <div class="advantage-item-icon">
                    <img src="/local/templates/tdo_shop_new/new_design/img/advantage3.png">
                </div>
                <div class="advantage-item-label">
                    <span>Широкий ассортимент</span>
                    <div>Все для HoReCa, Retail и пищевых производств</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 mb-4 mb-md-0">
            <div class="advantage-item">
                <div class="advantage-item-icon">
                    <img src="/local/templates/tdo_shop_new/new_design/img/advantage4.png">
                </div>
                <div class="advantage-item-label">
                    <span>Безупречное качество</span>
                    <div>Уникальная процедура восстановления</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5 index-news-line">
    <div class="row">
        <div class="col-12 col-md-7 mb-4 mb-md-0">
            <div class="row">
                <div class="col-12 col-md-6 mb-4 mb-md-0  index-video-col">
                    <? $APPLICATION->IncludeFile(
                        SITE_TEMPLATE_PATH . "/include/catlist_head_frame.php",
                        array(),
                        array()
                    ); ?>
                </div>

                <? //news articles
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "slider_articles_home",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        // Формат показа даты
                        "ADD_SECTIONS_CHAIN" => "N",
                        // Включать раздел в цепочку навигации
                        "AJAX_MODE" => "N",
                        // Включить режим AJAX
                        "AJAX_OPTION_ADDITIONAL" => "",
                        // Дополнительный идентификатор
                        "AJAX_OPTION_HISTORY" => "N",
                        // Включить эмуляцию навигации браузера
                        "AJAX_OPTION_JUMP" => "N",
                        // Включить прокрутку к началу компонента
                        "AJAX_OPTION_STYLE" => "Y",
                        // Включить подгрузку стилей
                        "CACHE_FILTER" => "N",
                        // Кешировать при установленном фильтре
                        "CACHE_GROUPS" => "Y",
                        // Учитывать права доступа
                        "CACHE_TIME" => "36000000",
                        // Время кеширования (сек.)
                        "CACHE_TYPE" => "A",
                        // Тип кеширования
                        "CHECK_DATES" => "Y",
                        // Показывать только активные на данный момент элементы
                        "DETAIL_URL" => "",
                        // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        // Выводить под списком
                        "DISPLAY_DATE" => "N",
                        // Выводить дату элемента
                        "DISPLAY_NAME" => "N",
                        // Выводить название элемента
                        "DISPLAY_PICTURE" => "N",
                        // Выводить изображение для анонса
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        // Выводить текст анонса
                        "DISPLAY_TOP_PAGER" => "N",
                        // Выводить над списком
                        "FIELD_CODE" => array(    // Поля
                            0 => "NAME",
                            1 => "PREVIEW_TEXT",
                            2 => "PREVIEW_PICTURE",
                            3 => "",
                        ),
                        "FILTER_NAME" => "",
                        // Фильтр
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        // Скрывать ссылку, если нет детального описания
                        "IBLOCK_ID" => "45",
                        // Код информационного блока
                        "IBLOCK_TYPE" => "news",
                        // Тип информационного блока (используется только для проверки)
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        // Включать инфоблок в цепочку навигации
                        "INCLUDE_SUBSECTIONS" => "N",
                        // Показывать элементы подразделов раздела
                        "MESSAGE_404" => "",
                        // Сообщение для показа (по умолчанию из компонента)
                        "NEWS_COUNT" => "1",
                        // Количество новостей на странице
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        // Включить обработку ссылок
                        "PAGER_DESC_NUMBERING" => "N",
                        // Использовать обратную навигацию
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        // Время кеширования страниц для обратной навигации
                        "PAGER_SHOW_ALL" => "N",
                        // Показывать ссылку "Все"
                        "PAGER_SHOW_ALWAYS" => "N",
                        // Выводить всегда
                        "PAGER_TEMPLATE" => ".default",
                        // Шаблон постраничной навигации
                        "PAGER_TITLE" => "Новости",
                        // Название категорий
                        "PARENT_SECTION" => "",
                        // ID раздела
                        "PARENT_SECTION_CODE" => "",
                        // Код раздела
                        "PREVIEW_TRUNCATE_LEN" => "",
                        // Максимальная длина анонса для вывода (только для типа текст)
                        "PROPERTY_CODE" => array(    // Свойства
                            0 => "",
                            1 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        // Устанавливать заголовок окна браузера
                        "SET_LAST_MODIFIED" => "N",
                        // Устанавливать в заголовках ответа время модификации страницы
                        "SET_META_DESCRIPTION" => "N",
                        // Устанавливать описание страницы
                        "SET_META_KEYWORDS" => "N",
                        // Устанавливать ключевые слова страницы
                        "SET_STATUS_404" => "N",
                        // Устанавливать статус 404
                        "SET_TITLE" => "N",
                        // Устанавливать заголовок страницы
                        "SHOW_404" => "N",
                        // Показ специальной страницы
                        "SORT_BY1" => "ACTIVE_FROM",
                        // Поле для первой сортировки новостей
                        "SORT_BY2" => "SORT",
                        // Поле для второй сортировки новостей
                        "SORT_ORDER1" => "DESC",
                        // Направление для первой сортировки новостей
                        "SORT_ORDER2" => "ASC",
                        // Направление для второй сортировки новостей
                        "STRICT_SECTION_CHECK" => "N",
                        // Строгая проверка раздела для показа списка
                        "COMPONENT_TEMPLATE" => "flat",
                        "TEMPLATE_THEME" => "blue",
                        // Цветовая тема
                        "MEDIA_PROPERTY" => "",
                        // Свойство для отображения медиа
                        "SLIDER_PROPERTY" => "",
                        // Свойство с изображениями для слайдера
                        "SEARCH_PAGE" => "/search/",
                        // Путь к странице поиска
                        "USE_RATING" => "N",
                        // Разрешить голосование
                        "USE_SHARE" => "N",
                        // Отображать панель соц. закладок
                    ),
                    false
                ); ?>


            </div>
        </div>
        <div class="col-12 col-md-5">

            <? //news slider
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "slider_news_home",
                array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    // Формат показа даты
                    "ADD_SECTIONS_CHAIN" => "N",
                    // Включать раздел в цепочку навигации
                    "AJAX_MODE" => "N",
                    // Включить режим AJAX
                    "AJAX_OPTION_ADDITIONAL" => "",
                    // Дополнительный идентификатор
                    "AJAX_OPTION_HISTORY" => "N",
                    // Включить эмуляцию навигации браузера
                    "AJAX_OPTION_JUMP" => "N",
                    // Включить прокрутку к началу компонента
                    "AJAX_OPTION_STYLE" => "Y",
                    // Включить подгрузку стилей
                    "CACHE_FILTER" => "N",
                    // Кешировать при установленном фильтре
                    "CACHE_GROUPS" => "Y",
                    // Учитывать права доступа
                    "CACHE_TIME" => "36000000",
                    // Время кеширования (сек.)
                    "CACHE_TYPE" => "A",
                    // Тип кеширования
                    "CHECK_DATES" => "Y",
                    // Показывать только активные на данный момент элементы
                    "DETAIL_URL" => "",
                    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    // Выводить под списком
                    "DISPLAY_DATE" => "N",
                    // Выводить дату элемента
                    "DISPLAY_NAME" => "N",
                    // Выводить название элемента
                    "DISPLAY_PICTURE" => "N",
                    // Выводить изображение для анонса
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    // Выводить текст анонса
                    "DISPLAY_TOP_PAGER" => "N",
                    // Выводить над списком
                    "FIELD_CODE" => array(    // Поля
                        0 => "NAME",
                        1 => "PREVIEW_TEXT",
                        2 => "PREVIEW_PICTURE",
                        3 => "",
                    ),
                    "FILTER_NAME" => "",
                    // Фильтр
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    // Скрывать ссылку, если нет детального описания
                    "IBLOCK_ID" => "31",
                    // Код информационного блока
                    "IBLOCK_TYPE" => "news",
                    // Тип информационного блока (используется только для проверки)
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    // Включать инфоблок в цепочку навигации
                    "INCLUDE_SUBSECTIONS" => "N",
                    // Показывать элементы подразделов раздела
                    "MESSAGE_404" => "",
                    // Сообщение для показа (по умолчанию из компонента)
                    "NEWS_COUNT" => "1",
                    // Количество новостей на странице
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    // Включить обработку ссылок
                    "PAGER_DESC_NUMBERING" => "N",
                    // Использовать обратную навигацию
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    // Время кеширования страниц для обратной навигации
                    "PAGER_SHOW_ALL" => "N",
                    // Показывать ссылку "Все"
                    "PAGER_SHOW_ALWAYS" => "N",
                    // Выводить всегда
                    "PAGER_TEMPLATE" => ".default",
                    // Шаблон постраничной навигации
                    "PAGER_TITLE" => "Новости",
                    // Название категорий
                    "PARENT_SECTION" => "",
                    // ID раздела
                    "PARENT_SECTION_CODE" => "",
                    // Код раздела
                    "PREVIEW_TRUNCATE_LEN" => "",
                    // Максимальная длина анонса для вывода (только для типа текст)
                    "PROPERTY_CODE" => array(    // Свойства
                        0 => "",
                        1 => "",
                    ),
                    "SET_BROWSER_TITLE" => "N",
                    // Устанавливать заголовок окна браузера
                    "SET_LAST_MODIFIED" => "N",
                    // Устанавливать в заголовках ответа время модификации страницы
                    "SET_META_DESCRIPTION" => "N",
                    // Устанавливать описание страницы
                    "SET_META_KEYWORDS" => "N",
                    // Устанавливать ключевые слова страницы
                    "SET_STATUS_404" => "N",
                    // Устанавливать статус 404
                    "SET_TITLE" => "N",
                    // Устанавливать заголовок страницы
                    "SHOW_404" => "N",
                    // Показ специальной страницы
                    "SORT_BY1" => "ACTIVE_FROM",
                    // Поле для первой сортировки новостей
                    "SORT_BY2" => "SORT",
                    // Поле для второй сортировки новостей
                    "SORT_ORDER1" => "DESC",
                    // Направление для первой сортировки новостей
                    "SORT_ORDER2" => "ASC",
                    // Направление для второй сортировки новостей
                    "STRICT_SECTION_CHECK" => "N",
                    // Строгая проверка раздела для показа списка
                    "COMPONENT_TEMPLATE" => "flat",
                    "TEMPLATE_THEME" => "blue",
                    // Цветовая тема
                    "MEDIA_PROPERTY" => "",
                    // Свойство для отображения медиа
                    "SLIDER_PROPERTY" => "",
                    // Свойство с изображениями для слайдера
                    "SEARCH_PAGE" => "/search/",
                    // Путь к странице поиска
                    "USE_RATING" => "N",
                    // Разрешить голосование
                    "USE_SHARE" => "N",
                    // Отображать панель соц. закладок
                ),
                false
            ); ?>


        </div>
    </div>
</div>


<? $APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "catalogListOnHomeTop",
    array(
        "ADD_SECTIONS_CHAIN" => "Y",
        // Включать раздел в цепочку навигации
        "CACHE_FILTER" => "N",
        // Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y",
        // Учитывать права доступа
        "CACHE_TIME" => "36000000",
        // Время кеширования (сек.)
        "CACHE_TYPE" => "A",
        // Тип кеширования
        "COUNT_ELEMENTS" => "N",
        // Показывать количество элементов в разделе
        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
        // Показывать количество
        "FILTER_NAME" => "sectionsFilter",
        // Имя массива со значениями фильтра разделов
        "IBLOCK_ID" => "26",
        // Инфоблок
        "IBLOCK_TYPE" => "CRM_PRODUCT_CATALOG",
        // Тип инфоблока
        "SECTION_CODE" => "",
        // Код раздела
        "SECTION_FIELDS" => array(    // Поля разделов
            0 => "NAME",
            1 => "",
        ),
        "SECTION_ID" => "#SECTION_CODE#/",
        // ID раздела
        "SECTION_URL" => "/catalog/#SECTION_CODE#/",
        // URL, ведущий на страницу с содержимым раздела
        "SECTION_USER_FIELDS" => array(    // Свойства разделов
            0 => "",
            1 => "",
        ),
        "SHOW_PARENT_NAME" => "Y",
        // Показывать название раздела
        "TOP_DEPTH" => "2",
        // Максимальная отображаемая глубина разделов
        "VIEW_MODE" => "TILE",
        // Вид списка подразделов
        "COMPONENT_TEMPLATE" => ".default",
        "HIDE_SECTION_NAME" => "N",
        // Не показывать названия подразделов
    ),
    false
); ?>


<div class="container mb-4 p-4">
    <div class="row p-0 gray-row">
        <div class="col-12 col-sm-8 col-md-6 p-0">
            <div class="index-brand-text">
                <img src="/local/templates/tdo_shop_new/new_design/img/alternova-logo.png">
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/catlist_head.php",
                    array(),
                    array()
                ); ?>
            </div>
        </div>
        <div class="col-12 col-sm-4 col-md-6 p-0">
            <div class="index-brand-img">
                <img src="/local/templates/tdo_shop_new/new_design/img/alternova-place.png">
            </div>
        </div>
    </div>
</div>




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
		"CACHE_TIME" => "3600000",
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
		"PRICE_VAT_INCLUDE" => "Y",
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
		"SECTION_URL" => "/catalog/#SECTION_CODE#/",
		"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
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



<div class="container mb-4 p-4">
    <h4 class="index-h4-title" style="margin-left: -12px;">Оборудование под ключ</h4>
    <div class="row p-0 gray-row">
        <div class="col-12 col-sm-4 col-md-6 p-0 index-desc-img">
            <img src="/local/templates/tdo_shop_new/new_design/img/burgers.png">
        </div>
        <div class="col-12 col-sm-8 col-md-6 p-0">
            <div class="index-desc-text">


                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/catlist_head_2.php",
                    array(),
                    array()
                ); ?>


                <div class="d-flex index-desc-later-wrap">
                    <div class="d-flex index-desc-text-img-wrap">
                        <img src="/local/templates/tdo_shop_new/new_design/img/himeicon.png">
                    </div>
                    <div class="index-desc-later">
                        <? $APPLICATION->IncludeFile(
                            SITE_TEMPLATE_PATH . "/include/catlist_head_3.php",
                            array(),
                            array()
                        ); ?>

                    </div>
                </div>

                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/catlist_head_4.php",
                    array(),
                    array()
                ); ?>

            </div>
        </div>
    </div>
</div>


<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "brandListBottom",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        // Формат показа даты
        "ADD_SECTIONS_CHAIN" => "N",
        // Включать раздел в цепочку навигации
        "AJAX_MODE" => "N",
        // Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "",
        // Дополнительный идентификатор
        "AJAX_OPTION_HISTORY" => "N",
        // Включить эмуляцию навигации браузера
        "AJAX_OPTION_JUMP" => "N",
        // Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y",
        // Включить подгрузку стилей
        "CACHE_FILTER" => "N",
        // Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y",
        // Учитывать права доступа
        "CACHE_TIME" => "36000000",
        // Время кеширования (сек.)
        "CACHE_TYPE" => "A",
        // Тип кеширования
        "CHECK_DATES" => "Y",
        // Показывать только активные на данный момент элементы
        "DETAIL_URL" => "",
        // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        "DISPLAY_BOTTOM_PAGER" => "N",
        // Выводить под списком
        "DISPLAY_DATE" => "N",
        // Выводить дату элемента
        "DISPLAY_NAME" => "Y",
        // Выводить название элемента
        "DISPLAY_PICTURE" => "Y",
        // Выводить изображение для анонса
        "DISPLAY_PREVIEW_TEXT" => "N",
        // Выводить текст анонса
        "DISPLAY_TOP_PAGER" => "N",
        // Выводить над списком
        "FIELD_CODE" => array(    // Поля
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",
        // Фильтр
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        // Скрывать ссылку, если нет детального описания
        "IBLOCK_ID" => "43",
        // Код информационного блока
        "IBLOCK_TYPE" => "lists",
        // Тип информационного блока (используется только для проверки)
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        // Включать инфоблок в цепочку навигации
        "INCLUDE_SUBSECTIONS" => "N",
        // Показывать элементы подразделов раздела
        "MEDIA_PROPERTY" => "",
        // Свойство для отображения медиа
        "MESSAGE_404" => "",
        // Сообщение для показа (по умолчанию из компонента)
        "NEWS_COUNT" => "11",
        // Количество новостей на странице
        "PAGER_BASE_LINK_ENABLE" => "N",
        // Включить обработку ссылок
        "PAGER_DESC_NUMBERING" => "N",
        // Использовать обратную навигацию
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        // Время кеширования страниц для обратной навигации
        "PAGER_SHOW_ALL" => "N",
        // Показывать ссылку "Все"
        "PAGER_SHOW_ALWAYS" => "N",
        // Выводить всегда
        "PAGER_TEMPLATE" => ".default",
        // Шаблон постраничной навигации
        "PAGER_TITLE" => "Новости",
        // Название категорий
        "PARENT_SECTION" => "",
        // ID раздела
        "PARENT_SECTION_CODE" => "",
        // Код раздела
        "PREVIEW_TRUNCATE_LEN" => "",
        // Максимальная длина анонса для вывода (только для типа текст)
        "PROPERTY_CODE" => array(    // Свойства
            0 => "",
            1 => "",
        ),
        "SEARCH_PAGE" => "/search/",
        // Путь к странице поиска
        "SET_BROWSER_TITLE" => "N",
        // Устанавливать заголовок окна браузера
        "SET_LAST_MODIFIED" => "N",
        // Устанавливать в заголовках ответа время модификации страницы
        "SET_META_DESCRIPTION" => "N",
        // Устанавливать описание страницы
        "SET_META_KEYWORDS" => "N",
        // Устанавливать ключевые слова страницы
        "SET_STATUS_404" => "N",
        // Устанавливать статус 404
        "SET_TITLE" => "N",
        // Устанавливать заголовок страницы
        "SHOW_404" => "N",
        // Показ специальной страницы
        "SLIDER_PROPERTY" => "",
        // Свойство с изображениями для слайдера
        "SORT_BY1" => "SORT",
        // Поле для первой сортировки новостей
        "SORT_BY2" => "",
        // Поле для второй сортировки новостей
        "SORT_ORDER1" => "ASC",
        // Направление для первой сортировки новостей
        "SORT_ORDER2" => "",
        // Направление для второй сортировки новостей
        "STRICT_SECTION_CHECK" => "N",
        // Строгая проверка раздела для показа списка
        "TEMPLATE_THEME" => "blue",
        // Цветовая тема
        "USE_RATING" => "N",
        // Разрешить голосование
        "USE_SHARE" => "N",
        // Отображать панель соц. закладок
    ),
    false
); ?>


<div class="container index-about mb-4 index-about-wrap">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="collapse_users_button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">

                        <? $APPLICATION->IncludeFile(
                            SITE_TEMPLATE_PATH . "/include/catlist_head_5.php",
                            array(),
                            array()
                        ); ?>


                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapseIndexText collapse" aria-labelledby="headingOne"
                 data-parent="#accordionExample">
                <div class="card-body">
                    <? $APPLICATION->IncludeFile(
                        SITE_TEMPLATE_PATH . "/include/catlist_head_6.php",
                        array(),
                        array()
                    ); ?>
                </div>
            </div>
        </div>
    </div>
    <!--<h4 class="index-h4-title">Торговое оборудование</h4>
        <p>
        Компания <b>«Торговый Дом Оборудования»</b> была создана в период становления отечественного рынка торгового спецоборудования, и за 20 лет успешной работы мы помогли тысячам предприятий развить свой бизнес, сэкономив бюджеты. Сегодня ТДО - официальный дилер завода по восстановлению торгового и технологического оборудования Alternova.
        Основным направлением деятельности нашей Компании является продажа и аренда восстановленного оборудования.
        </p>
        <p>
        Мы рады предложить своим Партнерам и Клиентам широкий спектр холодильного, теплового, пекарского и технологического спецоборудования для предприятий торговли и общественного питания.
        </p>
        <p>
        Многолетний опыт работы наших специалистов по сборке и наладке оборудования позволяет предложить каждому клиенту высокий уровень профессионального сервиса, и реализовывать восстановленное б/у спецоборудование с характеристиками и свойствами нового.
        </p>
        <p>
        Именно поэтому мы смело предоставляем гарантию на все реализуемое оборудование!
        </p>
        <p>
        У нас Вы всегда найдете то, что искали! В нашем демонстрационном зале представлены тысячи единиц оборудования на торговых площадях более 3000 м2.
        </p>
        <p>
        Мы понимаем, что зачастую трудно принять решение о переходе на восстановленное б/у оборудование, но цифры говорят сами за себя: 9 клиентов из 10 переходят
        на бывшее в употреблении оборудование, что сокращает их затраты на 50-70%!
        </p>-->
</div>

<? $APPLICATION->IncludeFile(
    SITE_TEMPLATE_PATH . "/include/catlist_head_7.php",
    array(),
    array()
); ?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
    
	