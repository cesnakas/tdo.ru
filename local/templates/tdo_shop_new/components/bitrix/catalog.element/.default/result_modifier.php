<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


//==============================================//
// Показывать все свойства в DISPLAY_PROPERTIES //
//==============================================//

/*$arResult["DISPLAY_PROPERTIES"] = array();
foreach ($arResult["PROPERTIES"] as $pid => &$arProp)
{
	// Не выводим для просмотра свойства с сортировкой мнеьше 0 (они будут у нас служебными)
	if ($arProp["SORT"] < 0)
		continue;

	if((is_array($arProp["VALUE"]) && count($arProp["VALUE"])>0) ||
	   (!is_array($arProp["VALUE"]) && strlen($arProp["VALUE"])>0))
	{
		$arResult["DISPLAY_PROPERTIES"][$pid] = CIBlockFormatProperties::GetDisplayValue($arResult, $arProp);
	}
}*/

$item        = &$arResult;
$ITEM_PRICES = &$item['ITEM_PRICES'];
$price = &$ITEM_PRICES[0];
$PRODUCT_ID = $item['ID'];

$price_result = CPrice::GetList(
	array(),
	array(
		"PRODUCT_ID" => $PRODUCT_ID,
		"CATALOG_GROUP_ID" => 5,
	)
);
$secondPrice = $price_result->Fetch();

if (!empty($secondPrice)) {
	$price['RATIO_BASE_PRICE'] = $secondPrice['PRICE'];
	$price['PRINT_RATIO_BASE_PRICE'] = CurrencyFormat($secondPrice['PRICE'], $secondPrice['CURRENCY']);
	$price['RATIO_DISCOUNT'] = $price['RATIO_BASE_PRICE'] - $price['RATIO_PRICE'];
	$price['PRINT_RATIO_DISCOUNT'] = CurrencyFormat($price['RATIO_DISCOUNT'], $price['CURRENCY']);
	$price['PERCENT'] = 1;
}

