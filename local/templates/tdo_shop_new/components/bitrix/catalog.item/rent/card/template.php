<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
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


$OFFERS_FIELD_CODE   = array_flip($arParams['OFFERS_FIELD_CODE']);
$mainBlockProperties = array_intersect_key($item['DISPLAY_PROPERTIES'], $OFFERS_FIELD_CODE);


$PRICE_RENT = $mainBlockProperties['PRICE_RENT']['DISPLAY_VALUE'];


if(empty($item['PRODUCT_PREVIEW']['SRC']))
{
	$item['PRODUCT_PREVIEW']['SRC'] = $this->GetFolder() . '/images/line-empty.png';
}


?>
	<div class="goods_item">
	<div style="background-image: url(<?=$item['PRODUCT_PREVIEW']['SRC']?>);" class="goods_item_image"></div>
	<div class="goods_item-content">
		<div class="goods_item-content_top"><?
			$PRICE_RENT_TEXT = '';
			if($PRICE_RENT)
			{
				$PRICE_RENT_TEXT = 'от ' . $PRICE_RENT . ' ₽';
			}
			?>
			<div class="goods_item_price"><?=$PRICE_RENT_TEXT?></div>
			<div>
				<a class="goods_item_name" href="<?=$item['DETAIL_PAGE_URL']?>"
				   title="<?=$productTitle?>"><?=$productTitle?></a>
			</div>

			<?=$item["PREVIEW_TEXT"]?>


			<?
			if(!empty($mainBlockProperties))
			{
				?>
				<?
				foreach ($mainBlockProperties as $code => $displayProperty)
				{
					if($code == 'PRICE_RENT')
					{
						continue;
					}
					?>

					<div class="goods_item-spec">
						<span class="goods_item-spec-name"><?=$displayProperty['NAME']?>:</span>
						<span class="goods_item-spec-text"><?=$displayProperty['DISPLAY_VALUE']?></span>
					</div>
					<?
				}
				?>
				<?
			}
			?>

		</div>

<!--		<div class="goods_item-content_bottom">-->
<!--			<a class="goods_item-buy js-rent2request" href="#">Арендовать</a>-->
<!--		</div>-->

	</div>
	</div><?



