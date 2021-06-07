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

//not available section
$noAvailableText = '<div class="goods_item-var_cat"></div>';
if(!$haveOffers) {
	if(!$actualItem['CAN_BUY']) {
		$noAvailableText = '<div class="goods_item-var_cat">Наличие уточняйте у менеджера</div>';
	}
}

$section = $actualItem['SECTION']['DATA'];

?>

<div class="goods_item">
    <div data-entity="image-wrapper">
        <div
                id="<?=$itemIds['PICT']?>"
                style="background-image: url('<?=$PRODUCT_PREVIEW?>');" class="goods_item_image"></div>

        <span class="product-item-image-alternative" id="<?=$itemIds['PICT_SLIDER']?>"
              style="background-image: url('<?=$PRODUCT_PREVIEW?>'); display: none;"></span>
        <span class="product-item-image-alternative" id="<?=$itemIds['SECOND_PICT']?>"
              style="background-image: url('<?=$PRODUCT_PREVIEW?>'); display: none;"></span>
    </div>


    <div class="goods_item-content">

        <div class="goods_item_price">
            <span class="new-price" id="<?=$itemIds['PRICE']?>"><?=$price['PRINT_RATIO_PRICE']?></span>
			<?
			if($price['RATIO_PRICE'] <> $price['RATIO_BASE_PRICE']) {
				?>
                <span class="old-price"><?=$price['PRINT_RATIO_BASE_PRICE']?></span>
				<?
			}
			?>
        </div>
        <div class="goods_item-var_name-wrap">
            <a class="goods_item_name" href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>"><?=$productTitle?></a>
        </div>
        <div>
            <a class="goods_item_cat" href="<?=$section['SECTION_PAGE_URL']?>"><?=$section['NAME']?></a>
        </div>

		<?=$noAvailableText?>

    </div>
</div>


