<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain                 $APPLICATION
 * @var array                    $arParams
 * @var array                    $arResult
 * @var CatalogSectionComponent  $component
 * @var CBitrixComponentTemplate $this
 * @var string                   $templateName
 * @var string                   $componentPath
 * @var string                   $templateFolder
 */

$this->setFrameMode(true);
//$this->addExternalCss('/bitrix/css/main/bootstrap.css');

$templateLibrary = array('popup', 'fx');
$currencyList    = '';

if(!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList      = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME'   => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES'       => $currencyList,
	'ITEM'             => array(
		'ID'              => $arResult['ID'],
		'IBLOCK_ID'       => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS'       => $arResult['JS_OFFERS'],
	),
);
unset($currencyList, $templateLibrary);

$mainId  = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID'                    => $mainId,
	'DISCOUNT_PERCENT_ID'   => $mainId . '_dsc_pict',
	'STICKER_ID'            => $mainId . '_sticker',
	'BIG_SLIDER_ID'         => $mainId . '_big_slider',
	'BIG_IMG_CONT_ID'       => $mainId . '_bigimg_cont',
	'SLIDER_CONT_ID'        => $mainId . '_slider_cont',
	'OLD_PRICE_ID'          => $mainId . '_old_price',
	'PRICE_ID'              => $mainId . '_price',
	'DISCOUNT_PRICE_ID'     => $mainId . '_price_discount',
	'PRICE_TOTAL'           => $mainId . '_price_total',
	'SLIDER_CONT_OF_ID'     => $mainId . '_slider_cont_',
	'QUANTITY_ID'           => $mainId . '_quantity',
	'QUANTITY_DOWN_ID'      => $mainId . '_quant_down',
	'QUANTITY_UP_ID'        => $mainId . '_quant_up',
	'QUANTITY_MEASURE'      => $mainId . '_quant_measure',
	'QUANTITY_LIMIT'        => $mainId . '_quant_limit',
	'BUY_LINK'              => $mainId . '_buy_link',
	'ADD_BASKET_LINK'       => $mainId . '_add_basket_link',
	'BASKET_ACTIONS_ID'     => $mainId . '_basket_actions',
	'NOT_AVAILABLE_MESS'    => $mainId . '_not_avail',
	'COMPARE_LINK'          => $mainId . '_compare_link',
	'TREE_ID'               => $mainId . '_skudiv',
	'DISPLAY_PROP_DIV'      => $mainId . '_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
	'OFFER_GROUP'           => $mainId . '_set_group_',
	'BASKET_PROP_DIV'       => $mainId . '_basket_prop',
	'SUBSCRIBE_LINK'        => $mainId . '_subscribe',
	'TABS_ID'               => $mainId . '_tabs',
	'TAB_CONTAINERS_ID'     => $mainId . '_tab_containers',
	'SMALL_CARD_PANEL_ID'   => $mainId . '_small_card_panel',
	'TABS_PANEL_ID'         => $mainId . '_tabs_panel',
);
$obName  = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name    = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title   = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt     = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if($haveOffers)
{
	$actualItem         = isset($arResult['OFFERS'][ $arResult['OFFERS_SELECTED'] ])
		? $arResult['OFFERS'][ $arResult['OFFERS_SELECTED'] ]
		: reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem         = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps     = array();
$price        = $actualItem['ITEM_PRICES'][ $actualItem['ITEM_PRICE_SELECTED'] ];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][ $actualItem['ITEM_MEASURE_RATIO_SELECTED'] ]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription     = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn          = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName  = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn          = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe       = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY']                = $arParams['MESS_BTN_BUY'] ? : Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET']      = $arParams['MESS_BTN_ADD_TO_BASKET'] ? : Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE']          = $arParams['MESS_NOT_AVAILABLE'] ? : Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE']            = $arParams['MESS_BTN_COMPARE'] ? : Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE']     = $arParams['MESS_PRICE_RANGES_TITLE'] ? : Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB']        = $arParams['MESS_DESCRIPTION_TAB'] ? : Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB']         = $arParams['MESS_PROPERTIES_TAB'] ? : Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB']           = $arParams['MESS_COMMENTS_TAB'] ? : Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY']      = $arParams['MESS_SHOW_MAX_QUANTITY'] ? : Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ? : Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW']  = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ? : Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
	'left'   => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right'  => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top'    => 'product-item-label-top',
);

$discountPositionClass = 'product-item-label-big';
if($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[ $pos ]) ? ' ' . $positionClassMap[ $pos ] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if(!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[ $pos ]) ? ' ' . $positionClassMap[ $pos ] : '';
	}
}


///********************
///


$QUANTITY   = $actualItem['PRODUCT']['QUANTITY'];//Доступное количество
$PROPERTIES = $actualItem['DISPLAY_PROPERTIES'];//Характеристики товара

//габариты
$SHIRINA = $PROPERTIES['TDO_WIDTH']['VALUE'];//ширина
$VYSOTA  = $PROPERTIES['TDO_HEIGHT']['VALUE'];//ширина
$GLUBINA = $PROPERTIES['TDO_DEPTH']['VALUE'];//глубина

$CONDITION          = $PROPERTIES['CONDITION'];//состояние
$restoredCcondition = false;

if($CONDITION['VALUE_XML_ID'] == '7773d866-64b8-11e8-8b97-000c2961bcc3')
{//Восстановленное
	$restoredCcondition = true;
}

//проверка на доп. изображения
$isMorePhoto = true;
if(empty($actualItem['MORE_PHOTO']))
{
	$isMorePhoto = false;

	$actualItem['MORE_PHOTO']   = [];
	$actualItem['MORE_PHOTO'][] = $arResult['DEFAULT_PICTURE'];//главное изображение
}

$mainBlockProperties = array_intersect_key($arResult['DISPLAY_PROPERTIES'], $arParams['MAIN_BLOCK_PROPERTY_CODE']);

?>

	<div class="good-page_right-head"><?=$name?></div>
	<div class="good-page_content" id="<?=$itemIds['ID']?>">

		<div class="good-page_slider-wrap" id="<?=$itemIds['BIG_SLIDER_ID']?>">
			<?
			if($isMorePhoto)
			{
				?>
				<div class="good-page_slider-nav"><?
					foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
					{

						$arPhotoSmall = CFile::ResizeImageGet(
							$photo['ID'],
							array(
								'width'  => 87,
								'height' => 87,
							),
							BX_RESIZE_IMAGE_PROPORTIONALDETAIL_PICTURE,
							array(
								"name"      => "sharpen",
								"precision" => 0,
							)
						);

						?>
						<div class="good-page_slider-nav_item"
						     data-entity="image"
						     data-id="<?=$photo['ID']?>"
						>
							<img src="<?=$arPhotoSmall['src']?>" alt="<?=$alt?>" title="<?=$title?>">
						</div>
					<? } ?>
				</div>
			<? } ?>


			<div class="good-page_slider" data-entity="images-container"><?
				if(!empty($actualItem['MORE_PHOTO']))
				{
					foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
					{
						?>
						<div
								style="background-image: url('<?=$photo['SRC']?>')"
								class="good-page_slider_item"
						></div>
						<?
					}
				}
				?>
			</div>

		</div>
		<div class="good-page_right">

			<div class="good-page_right-size_wrap">
				<div class="good-page_right-size_left">
					<?
					if($SHIRINA && $VYSOTA && $GLUBINA)
					{
						?>
						<span class="good-page_right-size"><?=$SHIRINA?> × <?=$VYSOTA?> × <?=$GLUBINA?></span>
						<?
					}
					?>
				</div>

				<?

				if(!empty($actualItem['PROPERTIES']['CML2_TRAITS']['VALUE']))
				{
					$CML2_TRAITS_VALUE       = $actualItem['PROPERTIES']['CML2_TRAITS']['VALUE'];
					$CML2_TRAITS_DESCRIPTION = $actualItem['PROPERTIES']['CML2_TRAITS']['DESCRIPTION'];
					$article                 = '';
					foreach ($CML2_TRAITS_DESCRIPTION as $key => $CML2_TRAITS_DESCRIPTION_)
					{
						if($CML2_TRAITS_DESCRIPTION_ == 'Код')
						{
							$article = $CML2_TRAITS_VALUE[ $key ];
						}
					}

					if($article)
					{
						?>
						<div class="good-page_right-size_right">Код товара <?=$article?></div>
						<?
					}
				}
				?>
			</div>
			<?
			if($showDiscount)
			{
				?>
				<div class="good-page_factory-price" id="<?=$itemIds['OLD_PRICE_ID']?>">
					<div class="good-page_factory-left">Цена производителя</div>
					<div class="good-page_factory-right"><?=$price['PRINT_RATIO_BASE_PRICE']?></div>
				</div>
				<?
			}
			?>

			<?
			if($restoredCcondition)
			{
				?>
				<? $APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("/include/catalog/restoredBanner.php"),
				array(),
				array('MODE' => 'text')
			); ?>
				<?
			}
			if($showDiscount)
			{
				?>
				<div class="good-page_right_sale" id="<?=$itemIds['DISCOUNT_PRICE_ID']?>">
					<span class="good-page_right_sale-text">С нами вы сэкономите</span>
					<span class="good-page_right_sale-price"><?=$price['PRINT_RATIO_DISCOUNT']?></span>
				</div>
				<?
			}
			?>

			<div class="good-page_right_price-wrap">
				<div class="good-page_right_price-text">Цена</div>
				<div class="good-page_right_price" id="<?=$itemIds['PRICE_ID']?>"><?=$price['PRINT_RATIO_PRICE']?></div>
			</div>

			<div class="good-page_right_availability">
				<div class="good-page_right_availability-text">
					В наличии <?=$QUANTITY?> штук
				</div>
				<div class="good-page_right_availability-garant">
					+ Гарантия от Alternova
				</div>
			</div>

			<?
			if(!empty($price))
			{
				?>

				<div class="good-page_right_buttons" data-entity="main-button-container">

					<?
					if($QUANTITY)
					{
						/*
							<a id="<?=$itemIds['ADD_BASKET_LINK']?>"
							   class="btn big-btn btn-red"
							   href="javascript:void(0);"
							>В корзину</a>
						 */
						?>
						<div id="<?=$itemIds['BASKET_ACTIONS_ID']?>">

							<a class="btn big-btn btn-red js-add-to-cart"
							   href="javascript:void(0);"
							   data-pid="<?=$actualItem['ID']?>"
							   data-img="<?=$actualItem['MORE_PHOTO'][0]['SRC']?>"
							>В корзину</a>

						</div>

						<a data-fancybox=""
						   data-src="#pay-click"
						   href="javascript:void(0);"
						   class="btn big-btn btn-gray"
						>Купить в 1 клик</a>
						<div id="pay-click" class="pay-click modal js-pay-click" style="display: none;">
							<div class="call-me-inner">
								<div class="pay-me-left">
									<div class="pay-me-left_title"><?=$name?></div>
									<div style="background-image: url('<?=$arPhotoSmall['src']?>')"
									     class="pay-me-left__image">

									</div>
									<div class="pay-me__price"><?=$price['PRINT_RATIO_PRICE']?></div>
								</div>
								<form class="call-me-content js-pay-click-form" action="/ajax/ajax.php" method="post">
									<input type="hidden" name="prod_name" value="<?=$name?>">

									<div class="modal-head">Купить в 1 клик</div>
									<input class="input" type="text" name="username" placeholder="Ваше имя *" required>
									<input class="input" type="text" name="phone" placeholder="Контактный телефон *"
									       required>
									<textarea placeholder="Комментарий к заказу" name="comment"></textarea>
									<button class="btn big-btn btn-gray">Отправить заказ</button>

									<div class="polit-conf">
										<input id="polit44" class="checkbox-custom-hidd" type="checkbox" name="agree"
										       value="Y" required>
										<label class="checkbox-custom" for="polit44"></label>
										<label for="polit44">Отправляя свои данные, вы соглашаетесь <br><a href="#">Политикой
												конфиденциальности</a></label>
									</div>
								</form>
							</div>
						</div>

						<a data-fancybox=""
						   data-src="#pay-credit"
						   href="javascript:void(0);"
						   class="btn big-btn btn-gray"
						>В кредит</a>
						<div id="pay-credit" class="pay-click modal js-pay-credit" style="display: none;">
							<div class="call-me-inner">
								<div class="pay-me-left">
									<div class="pay-me-left_title"><?=$name?></div>
									<div style="background-image: url('<?=$arPhotoSmall['src']?>')"
									     class="pay-me-left__image">

									</div>
									<div class="pay-me__price"><?=$price['PRINT_RATIO_PRICE']?></div>
								</div>
								<form class="call-me-content js-pay-credit-form" action="/ajax/ajax.php" method="post">
									<input type="hidden" name="prod_name" value="<?=$name?>">

									<div class="modal-head">Купить в кредит</div>
									<input class="input" type="text" name="username" placeholder="Ваше имя *" required>
									<input class="input" type="text" name="phone" placeholder="Контактный телефон *"
									       required>
									<textarea placeholder="Комментарий к заказу" name="comment"></textarea>
									<button class="btn big-btn btn-gray">Отправить заказ</button>

									<div class="polit-conf">
										<input id="polit-credit" class="checkbox-custom-hidd" type="checkbox"
										       name="agree"
										       value="Y" required>
										<label class="checkbox-custom" for="polit-credit"></label>
										<label for="polit-credit">Отправляя свои данные, вы соглашаетесь <br><a
													href="#">Политикой
												конфиденциальности</a></label>
									</div>
								</form>
							</div>
						</div>
						<?
					}
					else
					{
						?>
						<a data-fancybox=""
						   data-src="#pay-under-order"
						   href="javascript:void(0);"
						   class="btn big-btn btn-red"
						>Под заказ</a>
						<div id="pay-under-order" class="pay-click modal js-pay-under-order" style="display: none;">
							<div class="call-me-inner">
								<div class="pay-me-left">
									<div class="pay-me-left_title"><?=$name?></div>
									<div style="background-image: url('<?=$arPhotoSmall['src']?>')"
									     class="pay-me-left__image">

									</div>
									<div class="pay-me__price"><?=$price['PRINT_RATIO_PRICE']?></div>
								</div>
								<form class="call-me-content js-pay-under-order-form" action="/ajax/ajax.php"
								      method="post">
									<input type="hidden" name="prod_name" value="<?=$name?>">

									<div class="modal-head">Под заказ</div>
									<input class="input" type="text" name="username" placeholder="Ваше имя *" required>
									<input class="input" type="text" name="phone" placeholder="Контактный телефон *"
									       required>
									<textarea placeholder="Комментарий к заказу" name="comment"></textarea>
									<button class="btn big-btn btn-gray">Отправить заказ</button>

									<div class="polit-conf">
										<input id="polit44" class="checkbox-custom-hidd" type="checkbox" name="agree"
										       value="Y" required>
										<label class="checkbox-custom" for="polit44"></label>
										<label for="polit44">Отправляя свои данные, вы соглашаетесь <br><a href="#">Политикой
												конфиденциальности</a></label>
									</div>
								</form>
							</div>
						</div>
						<?
					}
					?>


				</div>
				<?
			}
			?>
		</div>
	</div>

	<div class="good-page_charact-wrap">
		<div class="good-page_charact">
			<div class="good-page_charact-left">

				<div class="good-page_charact-content">
					<div class="good-page_charact-content-head">Характеристики модели</div>
					<?
					/*

					<div class="good-page_charact-content-desc text-p">
						<span class="text-p--red">Внимание! </span>У модели есть <a href="#">другие разновидности</a>
					</div>
					 */
					?>
				</div>
				<div class="good-page_param-head">Основные параметры</div>
				<div class="good-page_param-content">


					<?
					if(!empty($mainBlockProperties))
					{
						?>
						<?
						foreach ($mainBlockProperties as $property)
						{
							?>
							<div class="good-page_param-content_item">
								<span><?=$property['NAME']?></span>
								<span><?=(is_array($property['DISPLAY_VALUE'])
										? implode(' / ', $property['DISPLAY_VALUE'])
										: $property['DISPLAY_VALUE'])?></span>
							</div>
							<?
						}
						unset($property);
						?>
						<?
					}

					?>


				</div>
			</div>
			<?

            if(!empty($arResult['PROPERTIES']['CML2_MANUFACTURER']['VALUE_XML_ID'])){

			$CML2_MANUFACTURER = $arResult['PROPERTIES']['CML2_MANUFACTURER']['VALUE_XML_ID'];

			$iblockId   = 43;
			$arSelect   = [
				"NAME",
				"ID",
				"CODE",
				"DETAIL_PAGE_URL",
				"PROPERTY_COUNTRY",
				"PREVIEW_PICTURE",
			];
			$arFilter   = [
				"IBLOCK_ID"   => $iblockId,
				"ACTIVE"      => "Y",
				"EXTERNAL_ID" => $CML2_MANUFACTURER,
			];
			$arOrder    = ["SORT" => "ASC"];
			$arLimit    = ["nTopCount" => 1];
			$res        = CIBlockElement::GetList($arOrder, $arFilter, false, $arLimit, $arSelect);
			$arElements = [];
			while ($arResultBrand = $res->fetch())
			{
				break;
			}
			$arResultBrand['ELEMENT_CODE'] = $arResultBrand['CODE'];
			$arResultBrand['SITE_DIR']     = '/';

			$arResultBrand['DETAIL_PAGE_URL_SEF'] = \CIBlock::ReplaceDetailUrl($arResultBrand['DETAIL_PAGE_URL'],
			                                                                   $arResultBrand, true);

			$image    = CIntranetUtils::InitImage($arResultBrand['PREVIEW_PICTURE'], 65);
			$imageSrc = $image['CACHE']['src'];

			$arResultBrand['PREVIEW_PICTURE'] = $image['CACHE'];
			?>
			<div class="good-page_charact-right">
				<div style="background-image: url('<?=$arResultBrand['PREVIEW_PICTURE']['src']?>')"
				     class="good-page_charact-logo">
				</div>
				<div class="good-page_charact-country "><b>Страна:</b> <?=$arResultBrand['PROPERTY_COUNTRY_VALUE']?>
				</div>
				<a href="<?=$arResultBrand['DETAIL_PAGE_URL_SEF']?>" class="good-page_charact-link ">О производителе</a>
			</div>
        <?}?>
		</div>

		<? $APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("/include/catalog/prodPropInfoMess.php"),
			array(),
			array('MODE' => 'text')
		); ?>
	</div>

	<div class="good-page_descript">
		<div class="good-page_descript-head">
			Описание
		</div>
		<div class="good-page_descript-text"><?=$arResult['DETAIL_TEXT']?></div>
		<? /*$APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("/include/catalog/prodPropInfoLink.php"),
			array(),
			array('MODE' => 'text')
		);*/ ?>
	</div>


<?
if($haveOffers)
{
	$offerIds   = array();
	$offerCodes = array();

	$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

	foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer)
	{
		$offerIds[]   = (int)$jsOffer['ID'];
		$offerCodes[] = $jsOffer['CODE'];

		$fullOffer   = $arResult['OFFERS'][ $ind ];
		$measureName = $fullOffer['ITEM_MEASURE']['TITLE'];

		$strAllProps         = '';
		$strMainProps        = '';
		$strPriceRangesRatio = '';
		$strPriceRanges      = '';

		if($arResult['SHOW_OFFERS_PROPS'])
		{
			if(!empty($jsOffer['DISPLAY_PROPERTIES']))
			{
				foreach ($jsOffer['DISPLAY_PROPERTIES'] as $property)
				{
					$current     = '<dt>' . $property['NAME'] . '</dt><dd>' . (
						is_array($property['VALUE'])
							? implode(' / ', $property['VALUE'])
							: $property['VALUE']
						) . '</dd>';
					$strAllProps .= $current;

					if(isset($arParams['MAIN_BLOCK_OFFERS_PROPERTY_CODE'][ $property['CODE'] ]))
					{
						$strMainProps .= $current;
					}
				}

				unset($current);
			}
		}

		if($arParams['USE_PRICE_COUNT'] && count($jsOffer['ITEM_QUANTITY_RANGES']) > 1)
		{
			$strPriceRangesRatio = '(' . Loc::getMessage(
					'CT_BCE_CATALOG_RATIO_PRICE',
					array(
						'#RATIO#' => ($useRatio
								? $fullOffer['ITEM_MEASURE_RATIOS'][ $fullOffer['ITEM_MEASURE_RATIO_SELECTED'] ]['RATIO']
								: '1'
						             ) . ' ' . $measureName,
					)
				) . ')';

			foreach ($jsOffer['ITEM_QUANTITY_RANGES'] as $range)
			{
				if($range['HASH'] !== 'ZERO-INF')
				{
					$itemPrice = false;

					foreach ($jsOffer['ITEM_PRICES'] as $itemPrice)
					{
						if($itemPrice['QUANTITY_HASH'] === $range['HASH'])
						{
							break;
						}
					}

					if($itemPrice)
					{
						$strPriceRanges .= '<dt>' . Loc::getMessage(
								'CT_BCE_CATALOG_RANGE_FROM',
								array('#FROM#' => $range['SORT_FROM'] . ' ' . $measureName)
							) . ' ';

						if(is_infinite($range['SORT_TO']))
						{
							$strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
						}
						else
						{
							$strPriceRanges .= Loc::getMessage(
								'CT_BCE_CATALOG_RANGE_TO',
								array('#TO#' => $range['SORT_TO'] . ' ' . $measureName)
							);
						}

						$strPriceRanges .= '</dt><dd>' . ($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']) . '</dd>';
					}
				}
			}

			unset($range, $itemPrice);
		}

		$jsOffer['DISPLAY_PROPERTIES']            = $strAllProps;
		$jsOffer['DISPLAY_PROPERTIES_MAIN_BLOCK'] = $strMainProps;
		$jsOffer['PRICE_RANGES_RATIO_HTML']       = $strPriceRangesRatio;
		$jsOffer['PRICE_RANGES_HTML']             = $strPriceRanges;
	}

	$templateData['OFFER_IDS']   = $offerIds;
	$templateData['OFFER_CODES'] = $offerCodes;
	unset($jsOffer, $strAllProps, $strMainProps, $strPriceRanges, $strPriceRangesRatio, $useRatio);

	$jsParams = array(
		'CONFIG'          => array(
			'USE_CATALOG'              => $arResult['CATALOG'],
			'SHOW_QUANTITY'            => $arParams['USE_PRODUCT_QUANTITY'],
			'SHOW_PRICE'               => true,
			'SHOW_DISCOUNT_PERCENT'    => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
			'SHOW_OLD_PRICE'           => $arParams['SHOW_OLD_PRICE'] === 'Y',
			'USE_PRICE_COUNT'          => $arParams['USE_PRICE_COUNT'],
			'DISPLAY_COMPARE'          => $arParams['DISPLAY_COMPARE'],
			'SHOW_SKU_PROPS'           => $arResult['SHOW_OFFERS_PROPS'],
			'OFFER_GROUP'              => $arResult['OFFER_GROUP'],
			'MAIN_PICTURE_MODE'        => $arParams['DETAIL_PICTURE_MODE'],
			'ADD_TO_BASKET_ACTION'     => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP'         => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
			'SHOW_MAX_QUANTITY'        => $arParams['SHOW_MAX_QUANTITY'],
			'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
			'TEMPLATE_THEME'           => $arParams['TEMPLATE_THEME'],
			'USE_STICKERS'             => true,
			'USE_SUBSCRIBE'            => $showSubscribe,
			'SHOW_SLIDER'              => $arParams['SHOW_SLIDER'],
			'SLIDER_INTERVAL'          => $arParams['SLIDER_INTERVAL'],
			'ALT'                      => $alt,
			'TITLE'                    => $title,
			'MAGNIFIER_ZOOM_PERCENT'   => 200,
			'USE_ENHANCED_ECOMMERCE'   => $arParams['USE_ENHANCED_ECOMMERCE'],
			'DATA_LAYER_NAME'          => $arParams['DATA_LAYER_NAME'],
			'BRAND_PROPERTY'           => !empty($arResult['DISPLAY_PROPERTIES'][ $arParams['BRAND_PROPERTY'] ])
				? $arResult['DISPLAY_PROPERTIES'][ $arParams['BRAND_PROPERTY'] ]['DISPLAY_VALUE']
				: null,
		),
		'PRODUCT_TYPE'    => $arResult['PRODUCT']['TYPE'],
		'VISUAL'          => $itemIds,
		'DEFAULT_PICTURE' => array(
			'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
			'DETAIL_PICTURE'  => $arResult['DEFAULT_PICTURE'],
		),
		'PRODUCT'         => array(
			'ID'       => $arResult['ID'],
			'ACTIVE'   => $arResult['ACTIVE'],
			'NAME'     => $arResult['~NAME'],
			'CATEGORY' => $arResult['CATEGORY_PATH'],
		),
		'BASKET'          => array(
			'QUANTITY'         => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'BASKET_URL'       => $arParams['BASKET_URL'],
			'SKU_PROPS'        => $arResult['OFFERS_PROP_CODES'],
			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
		),
		'OFFERS'          => $arResult['JS_OFFERS'],
		'OFFER_SELECTED'  => $arResult['OFFERS_SELECTED'],
		'TREE_PROPS'      => $skuProps,
	);
}
else
{
	$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
	if($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties)
	{
		?>
		<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
			<?
			if(!empty($arResult['PRODUCT_PROPERTIES_FILL']))
			{
				foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo)
				{
					?>
					<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]"
					       value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
					<?
					unset($arResult['PRODUCT_PROPERTIES'][ $propId ]);
				}
			}

			$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
			if(!$emptyProductProperties)
			{
				?>
				<table>
					<?
					foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo)
					{
						?>
						<tr>
							<td><?=$arResult['PROPERTIES'][ $propId ]['NAME']?></td>
							<td>
								<?
								if(
									$arResult['PROPERTIES'][ $propId ]['PROPERTY_TYPE'] === 'L'
									&& $arResult['PROPERTIES'][ $propId ]['LIST_TYPE'] === 'C'
								)
								{
									foreach ($propInfo['VALUES'] as $valueId => $value)
									{
										?>
										<label>
											<input type="radio"
											       name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]"
											       value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"checked"' : '')?>>
											<?=$value?>
										</label>
										<br>
										<?
									}
								}
								else
								{
									?>
									<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]">
										<?
										foreach ($propInfo['VALUES'] as $valueId => $value)
										{
											?>
											<option value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"selected"' : '')?>>
												<?=$value?>
											</option>
											<?
										}
										?>
									</select>
									<?
								}
								?>
							</td>
						</tr>
						<?
					}
					?>
				</table>
				<?
			}
			?>
		</div>
		<?
	}

	$jsParams = array(
		'CONFIG'       => array(
			'USE_CATALOG'              => $arResult['CATALOG'],
			'SHOW_QUANTITY'            => $arParams['USE_PRODUCT_QUANTITY'],
			'SHOW_PRICE'               => !empty($arResult['ITEM_PRICES']),
			'SHOW_DISCOUNT_PERCENT'    => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
			'SHOW_OLD_PRICE'           => $arParams['SHOW_OLD_PRICE'] === 'Y',
			'USE_PRICE_COUNT'          => $arParams['USE_PRICE_COUNT'],
			'DISPLAY_COMPARE'          => $arParams['DISPLAY_COMPARE'],
			'MAIN_PICTURE_MODE'        => $arParams['DETAIL_PICTURE_MODE'],
			'ADD_TO_BASKET_ACTION'     => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP'         => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
			'SHOW_MAX_QUANTITY'        => $arParams['SHOW_MAX_QUANTITY'],
			'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
			'TEMPLATE_THEME'           => $arParams['TEMPLATE_THEME'],
			'USE_STICKERS'             => true,
			'USE_SUBSCRIBE'            => $showSubscribe,
			'SHOW_SLIDER'              => $arParams['SHOW_SLIDER'],
			'SLIDER_INTERVAL'          => $arParams['SLIDER_INTERVAL'],
			'ALT'                      => $alt,
			'TITLE'                    => $title,
			'MAGNIFIER_ZOOM_PERCENT'   => 200,
			'USE_ENHANCED_ECOMMERCE'   => $arParams['USE_ENHANCED_ECOMMERCE'],
			'DATA_LAYER_NAME'          => $arParams['DATA_LAYER_NAME'],
			'BRAND_PROPERTY'           => !empty($arResult['DISPLAY_PROPERTIES'][ $arParams['BRAND_PROPERTY'] ])
				? $arResult['DISPLAY_PROPERTIES'][ $arParams['BRAND_PROPERTY'] ]['DISPLAY_VALUE']
				: null,
		),
		'VISUAL'       => $itemIds,
		'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
		'PRODUCT'      => array(
			'ID'                           => $arResult['ID'],
			'ACTIVE'                       => $arResult['ACTIVE'],
			'PICT'                         => reset($arResult['MORE_PHOTO']),
			'NAME'                         => $arResult['~NAME'],
			'SUBSCRIPTION'                 => true,
			'ITEM_PRICE_MODE'              => $arResult['ITEM_PRICE_MODE'],
			'ITEM_PRICES'                  => $arResult['ITEM_PRICES'],
			'ITEM_PRICE_SELECTED'          => $arResult['ITEM_PRICE_SELECTED'],
			'ITEM_QUANTITY_RANGES'         => $arResult['ITEM_QUANTITY_RANGES'],
			'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
			'ITEM_MEASURE_RATIOS'          => $arResult['ITEM_MEASURE_RATIOS'],
			'ITEM_MEASURE_RATIO_SELECTED'  => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
			'SLIDER_COUNT'                 => $arResult['MORE_PHOTO_COUNT'],
			'SLIDER'                       => $arResult['MORE_PHOTO'],
			'CAN_BUY'                      => $arResult['CAN_BUY'],
			'CHECK_QUANTITY'               => $arResult['CHECK_QUANTITY'],
			'QUANTITY_FLOAT'               => is_float($arResult['ITEM_MEASURE_RATIOS'][ $arResult['ITEM_MEASURE_RATIO_SELECTED'] ]['RATIO']),
			'MAX_QUANTITY'                 => $arResult['PRODUCT']['QUANTITY'],
			'STEP_QUANTITY'                => $arResult['ITEM_MEASURE_RATIOS'][ $arResult['ITEM_MEASURE_RATIO_SELECTED'] ]['RATIO'],
			'CATEGORY'                     => $arResult['CATEGORY_PATH'],
		),
		'BASKET'       => array(
			'ADD_PROPS'        => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
			'QUANTITY'         => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'PROPS'            => $arParams['PRODUCT_PROPS_VARIABLE'],
			'EMPTY_PROPS'      => $emptyProductProperties,
			'BASKET_URL'       => $arParams['BASKET_URL'],
			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
		),
	);
	unset($emptyProductProperties);
}

if($arParams['DISPLAY_COMPARE'])
{
	$jsParams['COMPARE'] = array(
		'COMPARE_URL_TEMPLATE'        => $arResult['~COMPARE_URL_TEMPLATE'],
		'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
		'COMPARE_PATH'                => $arParams['COMPARE_PATH'],
	);
}
?>
	<script>
        BX.message({
            ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
            TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
            TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
            BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
            BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
            BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
            BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
            BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
            TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
            COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
            COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
            COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
            BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
            PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
            PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
            RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
            RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
            SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
        });

        var <?=$obName?> =
            new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
	</script>
<?
unset($actualItem, $itemIds, $jsParams);