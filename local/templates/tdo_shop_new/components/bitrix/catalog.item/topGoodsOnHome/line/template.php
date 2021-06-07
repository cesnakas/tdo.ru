<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain                $APPLICATION
 * @var array                   $arParams
 * @var array                   $item
 * @var array                   $actualItem
 * @var array                   $minOffer
 * @var array                   $itemIds
 * @var array                   $price
 * @var array                   $measureRatio
 * @var bool                    $haveOffers
 * @var bool                    $showSubscribe
 * @var array                   $morePhoto
 * @var bool                    $showSlider
 * @var bool                    $itemHasDetailUrl
 * @var string                  $imgTitle
 * @var string                  $productTitle
 * @var string                  $buttonSizeClass
 * @var CatalogSectionComponent $component
 */


$PRODUCT_PREVIEW = $item['PRODUCT_PREVIEW']['SRC'];
if(empty($PRODUCT_PREVIEW)) {
	$PRODUCT_PREVIEW = $this->GetFolder() . '/images/line-empty.png';
}


$section = $actualItem['SECTION']['DATA'];

$CML2_MANUFACTURER = $actualItem['PROPERTIES']['CML2_MANUFACTURER']['VALUE_XML_ID'];

$PREVIEW_PICTURE = $this->GetFolder() . '/images/line-empty.png';
if(!empty($CML2_MANUFACTURER)) {
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
	while ($arResultBrand = $res->fetch()) {
		break;
	}
	$arResultBrand['ELEMENT_CODE'] = $arResultBrand['CODE'];
	$arResultBrand['SITE_DIR']     = '/';

	$arResultBrand['DETAIL_PAGE_URL_SEF'] = \CIBlock::ReplaceDetailUrl($arResultBrand['DETAIL_PAGE_URL'], $arResultBrand, true);

	$image    = CIntranetUtils::InitImage($arResultBrand['PREVIEW_PICTURE'], 56, 20);
	$imageSrc = $image['CACHE']['src'];

	$PREVIEW_PICTURE = $image['CACHE']['src'];

}
?>

<a href="<?=$item['DETAIL_PAGE_URL']?>" class="main-screen_good-item" data-entity="item">
    <span class="main-screen_good-item_img" style="background-image: url('<?=$PRODUCT_PREVIEW?>')">

    </span>
    <span class="main-screen_good-item_content">
        <span class="main-screen_good-item_logo" style="background-image: url('<?=$PREVIEW_PICTURE?>')">

        </span>
        <span class="main-screen_good-item_name"><?=$productTitle?></span>
        <span class="main-screen_good-item_red-price"><?=$price['PRINT_RATIO_PRICE']?></span><?
		if($price['PRINT_BASE_PRICE'] <> $price['PRINT_RATIO_PRICE']) {
			?>
            <span class="main-screen_good-item_old-price"><?=$price['PRINT_BASE_PRICE']?></span>
			<?
		}
		?>

    </span>
</a>







