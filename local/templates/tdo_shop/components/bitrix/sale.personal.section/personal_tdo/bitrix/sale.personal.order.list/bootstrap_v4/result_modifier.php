<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

/**
 * @var array         $arParams
 * @var array         $arResult
 * @var SaleOrderAjax $component
 */

$prodIds = [];
foreach ($arResult['ORDERS'] as $order) {
	$_order      = $order['ORDER'];
	$basketItems = $order['BASKET_ITEMS'];
	foreach ($basketItems as $basket_item) {
		$prodIds[] = $basket_item['PRODUCT_ID'];
	}

	
}


$arSelect   = ["ID", "PREVIEW_PICTURE", 'SORT'];
$arFilter   = [
	"IBLOCK_ID" => 26,
	"ID"        => $prodIds,
];
$arOrder    = ["SORT" => "ASC"];
$arLimit    = [];
$res        = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
$arPreviewPicture = [];
while ($arResultPic = $res->getNext()) {
	$arPreviewPicture[$arResultPic['ID']] = $arResultPic['PREVIEW_PICTURE'];
}


$arResult['PREVIEW_PICTURES'] = $arPreviewPicture;

