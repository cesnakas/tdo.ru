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
if (empty($PRODUCT_PREVIEW)) {
	$PRODUCT_PREVIEW = $this->GetFolder() . '/images/line-empty.png';
}

?>

<div class="goods_item">
    <div style="background-image: url('<?=$PRODUCT_PREVIEW?>');" class="goods_item_image"></div>
    <div class="goods_item-content">
        <div>
            <a class="goods_item_name" href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>" ><?=$productTitle?></a>
        </div>

		<?
		if(!empty($price)) {
			?>
            <div class="goods_item_price" id="<?=$itemIds['PRICE']?>"><?=$price['PRINT_RATIO_PRICE']?></div>
		<? } ?>
    </div>
</div>



