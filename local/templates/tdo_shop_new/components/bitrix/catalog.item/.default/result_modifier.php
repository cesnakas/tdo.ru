<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent  $component
 */

$component = $this->getComponent();

$item        = &$arResult['ITEM'];
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
	$price['PRINT_RATIO_BASE_PRICE'] = CurrencyFormat($secondPrice['PRICE'], $secondPrice['CURRENCY']);;
}





