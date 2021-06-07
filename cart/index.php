<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>
<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
	"PATH"       => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID"    => "s2",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	"START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
),
                                  false
); ?>


    <div class="cart">
        <div class="container">
			<? $APPLICATION->IncludeComponent(
				"bitrix:sale.basket.basket",
				"tdo_cart",
				array(
					"ACTION_VARIABLE"               => "action1",
					"COLUMNS_LIST"                  => array(
						0 => "NAME",
						1 => "PROPS",
						2 => "DELETE",
						3 => "DELAY",
						4 => "PRICE",
						5 => "QUANTITY",
						6 => "SUM",
					),
					"COMPONENT_TEMPLATE"            => "bootstrap_v4",
					"COUNT_DISCOUNT_4_ALL_QUANTITY" => "Y",
					"HIDE_COUPON"                   => "N",
					"OFFERS_PROPS"                  => array(
						0 => "BRAND",
						1 => "SIZE",
						2 => "COLOR",
					),
					"PATH_TO_ORDER"                 => "/cart/",
					"PRICE_VAT_SHOW_VALUE"          => "Y",
					"QUANTITY_FLOAT"                => "Y",
					"SET_TITLE"                     => "Y",
					"USE_PREPAYMENT"                => "Y",
					"DEFERRED_REFRESH"              => "N",
					"USE_DYNAMIC_SCROLL"            => "Y",
					"SHOW_FILTER"                   => "N",
					"SHOW_RESTORE"                  => "N",
					"COLUMNS_LIST_EXT"              => array(
						0 => "PREVIEW_PICTURE",
						1 => "DISCOUNT",
						2 => "DELETE",
						3 => "DELAY",
						4 => "TYPE",
						5 => "SUM",
					),
					"COLUMNS_LIST_MOBILE"           => array(
						0 => "PREVIEW_PICTURE",
						1 => "DISCOUNT",
						2 => "DELETE",
						3 => "DELAY",
						4 => "TYPE",
						5 => "SUM",
					),
					"TEMPLATE_THEME"                => "blue",
					"TOTAL_BLOCK_DISPLAY"           => array(
						0 => "bottom",
					),
					"DISPLAY_MODE"                  => "extended",
					"PRICE_DISPLAY_MODE"            => "Y",
					"SHOW_DISCOUNT_PERCENT"         => "N",
					"DISCOUNT_PERCENT_POSITION"     => "bottom-right",
					"PRODUCT_BLOCKS_ORDER"          => "props,sku,columns",
					"USE_PRICE_ANIMATION"           => "Y",
					"LABEL_PROP"                    => array(),
					"CORRECT_RATIO"                 => "Y",
					"AUTO_CALCULATION"              => "Y",
					"COMPATIBLE_MODE"               => "Y",
					"EMPTY_BASKET_HINT_PATH"        => "/",
					"ADDITIONAL_PICT_PROP_26"       => "-",
					"ADDITIONAL_PICT_PROP_27"       => "-",
					"ADDITIONAL_PICT_PROP_32"       => "-",
					"ADDITIONAL_PICT_PROP_33"       => "-",
					"ADDITIONAL_PICT_PROP_37"       => "-",
					"ADDITIONAL_PICT_PROP_38"       => "-",
					"ADDITIONAL_PICT_PROP_39"       => "-",
					"BASKET_IMAGES_SCALING"         => "adaptive",
					"USE_GIFTS"                     => "N",
					"USE_ENHANCED_ECOMMERCE"        => "N",
				),
				false
			); ?>


			<? $APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("/include/cart/triggers.php"),
				array(),
				array('MODE' => 'text')
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


        </div>
    </div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>