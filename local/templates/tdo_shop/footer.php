<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>


<footer>
    <div class="footer-top">
        <div class="container">

			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"footer",
				array(
					"ALLOW_MULTI_SELECT"    => "N",
					"CHILD_MENU_TYPE"       => "",
					"DELAY"                 => "N",
					"MAX_LEVEL"             => "1",
					"MENU_CACHE_GET_VARS"   => array(),
					"MENU_CACHE_TIME"       => "3600",
					"MENU_CACHE_TYPE"       => "N",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"ROOT_MENU_TYPE"        => "footer_serv",
					"USE_EXT"               => "N",
					"COMPONENT_TEMPLATE"    => "footer",
				),
				false
			); ?>
			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"footer",
				array(
					"ALLOW_MULTI_SELECT"    => "N",
					"CHILD_MENU_TYPE"       => "",
					"DELAY"                 => "N",
					"MAX_LEVEL"             => "1",
					"MENU_CACHE_GET_VARS"   => array(),
					"MENU_CACHE_TIME"       => "3600",
					"MENU_CACHE_TYPE"       => "N",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"ROOT_MENU_TYPE"        => "footer_help",
					"USE_EXT"               => "N",
					"COMPONENT_TEMPLATE"    => "footer",
				),
				false
			); ?>
			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"footer",
				array(
					"ALLOW_MULTI_SELECT"    => "N",
					"CHILD_MENU_TYPE"       => "",
					"DELAY"                 => "N",
					"MAX_LEVEL"             => "1",
					"MENU_CACHE_GET_VARS"   => array(),
					"MENU_CACHE_TIME"       => "3600",
					"MENU_CACHE_TYPE"       => "N",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"ROOT_MENU_TYPE"        => "footer_goods",
					"USE_EXT"               => "N",
					"COMPONENT_TEMPLATE"    => "footer",
				),
				false
			); ?>
			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"footer",
				array(
					"ALLOW_MULTI_SELECT"    => "N",
					"CHILD_MENU_TYPE"       => "",
					"DELAY"                 => "N",
					"MAX_LEVEL"             => "1",
					"MENU_CACHE_GET_VARS"   => array(),
					"MENU_CACHE_TIME"       => "3600",
					"MENU_CACHE_TYPE"       => "N",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"ROOT_MENU_TYPE"        => "footer_contacts",
					"USE_EXT"               => "N",
					"COMPONENT_TEMPLATE"    => "footer",
				),
				false
			); ?>


            <div class="footer-top-col">
                <div class="footer-phone-wrap"><? $APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("/include/phone_link.php"),
						array(),
						array('MODE' => 'html')
					); ?>
                </div>

                <div class="footer-time-work-today">
                    <span class="footer-time-work_text"><? $APPLICATION->IncludeFile(
		                    $APPLICATION->GetTemplatePath("/include/schedule_now.php"),
		                    array(),
		                    array('MODE' => 'html')
	                    ); ?></span>
                </div>

                <div class="footer-time-work"><? $APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("/include/schedule.php"),
						array(),
						array('MODE' => 'html')
					); ?>
                </div>
                <div class="footer-mail_box">
                    <div class="footer-mail-top">Оставить обращение</div>
                    <div class="wrap-mail">
						<? $APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/email_link.php"),
							array(),
							array('MODE' => 'html')
						); ?>
                    </div>
                    <div class="footer-all-contact-wrap">
                        <a href="/contacts/" class="footer-all-contact_link link-blue-right">Все контакты</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-adress">
        <div class="container">
            <div class="footer-adress_left">
                <div class="footer-adress_text">Наш адрес: г. Москва, Алтуфьевское ш., д.37, стр.2</div>
                <a href="/contacts/#contact-map" class="link-blue-right">Показать на карте</a>
            </div>
            <div class="footer-adress_right"><? $APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath("/include/socnet_footer.php"),
					array(),
					array('MODE' => 'html')
				); ?>
            </div>
        </div>
    </div>
    <div class="footer-nav">
        <div class="container">

			<? $APPLICATION->IncludeComponent("bitrix:menu", "empty", array(
				"ALLOW_MULTI_SELECT"    => "N",    // Разрешить несколько активных пунктов одновременно
				"CHILD_MENU_TYPE"       => "",    // Тип меню для остальных уровней
				"DELAY"                 => "N",    // Откладывать выполнение шаблона меню
				"MAX_LEVEL"             => "1",    // Уровень вложенности меню
				"MENU_CACHE_GET_VARS"   => "",    // Значимые переменные запроса
				"MENU_CACHE_TIME"       => "3600",    // Время кеширования (сек.)
				"MENU_CACHE_TYPE"       => "N",    // Тип кеширования
				"MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
				"ROOT_MENU_TYPE"        => "bottom",    // Тип меню для первого уровня
				"USE_EXT"               => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
				"COMPONENT_TEMPLATE"    => "bottom_menu",
			),
			                                  false
			); ?>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container"><? $APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("/include/copyright.php"),
				array(),
				array('MODE' => 'html')
			); ?>
        </div>
    </div>
</footer>
</div>

<div id="rent-me" class="modal rent-me js-rent-me">
    <div class="call-me-inner">
        <div class="call-me-left">
            <div class="name-call-man"><? $APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath("/include/feedback_popup.php"),
					array(),
					array('MODE' => 'html')
				); ?>
            </div>

        </div>

        <div class="call-me-content">
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

<div id="addCart-popup" class="addCart-popup">
	<div class="addCart-popup_good">
		<div class="addCart-popup_good-top">
			<div class="good-popup_head">Товар добавлен в корзину</div>
			<div class="addCart-popup_item">
				<div class="addCart-popup_item-left">
					<div class="addCart-popup_item-img js-img"></div>
					<div class="addCart-popup_item-text"><span class="js-name"></span></div>
				</div>

				<div class="addCart-popup_item-right">
					<div class="cart-content-count-wrap">
						<form class="cart-content-count">
							<button class="cart-content-count_min js-add-to-cart-popup" data-quantity="-1">-</button>
							<input value="1" class="cart-content-count-input js-quantity" type="text" value="1">
							<button class="cart-content-count_plus js-add-to-cart-popup" data-quantity="1">+</button>
						</form>
					</div>
					<div class="cart-content_price"><span class="js-totalItem"></span></div>
				</div>

			</div>
		</div>

		<div class="addCart-popup_good-bottom">
			<div class="addCart-popup_good-bottom-text">
				<a href="/personal/order/make/">В корзине <span class="js-totalQuantity"></span> товара</a> на сумму <span class="js-totalBasket"></span>

			</div>
			<div class="addCart-popup_good-bottom-btn-wrap">
				<a class="add-cart_btn add-cart_btn--blue" onclick="$.fancybox.close();" href="javascript:void(0);">Добавить другие товары</a>
				<a class="add-cart_btn add-cart_btn--red" href="/personal/order/make/">Оформить заказ</a>
			</div>
		</div>

	</div>

	<div class="addCart-popup_slider">
		<div class="addCart-popup_slider-head">С этим товаром дополнительно покупают</div>
		<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"popular_slider_popup", 
	array(
		"IBLOCK_TYPE" => "CRM_PRODUCT_CATALOG",
		"IBLOCK_ID" => "26",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"ELEMENT_SORT_FIELD" => "shows",
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
		"OFFERS_LIMIT" => "10",
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
		"COMPONENT_TEMPLATE" => "popular_slider_popup",
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



</div>



<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(73480831, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/73480831" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<script>
	$('[name="form_text_104"], [name="form_text_84"], [name="form_text_80"], [name="phone"], [name="ORDER_PROP_41"]').mask('+7 (999) 999-99-99');
	
</script>
<script>
    (function(w, d, s, h, id) {
        w.roistatProjectId = id; w.roistatHost = h;
        var p = d.location.protocol == "https:" ? "https://" : "http://";
        var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
        var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com', '2f47f9b1ba0ed74e83dcfd6a1ad954da');
</script>
<!-- Begin Bitrix 24 Widget -->
<script>
    window.roistatVisitCallback = function (visitId) {
        (function (w, d, u) {
            var s = d.createElement('script');
            s.async = true;
            s.src = u + '?' + (Date.now() / 60000 | 0);
            var h = d.getElementsByTagName('script')[0];
            h.parentNode.insertBefore(s, h);
        })(window, document, 'https://portal.tdobu.ru/upload/crm/site_button/loader_1_7bez0m.js');
        window.Bitrix24WidgetObject = window.Bitrix24WidgetObject || {};
        window.Bitrix24WidgetObject.handlers = {
            'form-init': function (form) {
                form.presets = {
                    'roistatID': visitId
                };
            }
        };
    }
</script>

<!-- End of Bitrix 24 Widget -->
<!-- BEGIN BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->
<script>
    (function (w, d, s, h) {
        w.roistatLanguage = '';
        var p = d.location.protocol == "https:" ? "https://" : "http://";
        var u = "/static/marketplace/Bitrix24Widget/script.js";
        var js = d.createElement(s);
        js.async = 1;
        js.src = p + h + u;
        var js2 = d.getElementsByTagName(s)[0];
        js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com');
</script>
<!-- END BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->
</body>
</html>



